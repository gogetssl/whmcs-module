<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Settings\Index\Providers;

use ModulesGarden\GGSModule\App\Libs\FinancePolicy;
use ModulesGarden\GGSModule\App\Libs\GeneralSettings;
use ModulesGarden\GGSModule\App\Libs\Helpers;
use ModulesGarden\GGSModule\App\Libs\RenewalPrices;
use ModulesGarden\GGSModule\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\GGSModule\Core\DataProviders\CrudProvider;

/**
 * Settings > Finance. The margin and the exchange rate live in "financeSettings" (read by the price update and the
 * order code), everything else in the general settings.
 */
class FinanceSettingsProvider extends CrudProvider
{
    const FINANCE  = ['profitMargin', 'rate'];
    const GENERAL  = ['minProfit', 'termMarginStep', 'priceRounding', 'keepMarginOnSync', 'belowCostAction', 'belowCostEmail', 'renewalPriceMode',
                      'renewalPriceClientEmail', 'renewalPriceEmailText', 'rateSource', 'currencyBuffer', 'terminateUnpaidOnExpiry',
                      'pendingPaymentWaitCertificate', 'balanceAlert', 'catalogueSyncMode', 'catalogueChangesEmail'];
    const SWITCHES = ['keepMarginOnSync', 'belowCostEmail', 'renewalPriceClientEmail', 'terminateUnpaidOnExpiry', 'balanceAlert', 'catalogueChangesEmail'];

    public function read()
    {
        $configuration = (new AddonModuleRepository())->getModuleConfiguration();
        foreach((array)($configuration['financeSettings'] ?? []) as $key => $value)
        {
            $this->data[$key] = $value;
        }
        foreach(self::GENERAL as $key)
        {
            $this->data[$key] = in_array($key, self::SWITCHES, true) ? GeneralSettings::enabled($key) : GeneralSettings::get($key);
        }
        if(trim((string)$this->data['renewalPriceEmailText']) === '')
        {
            $this->data['renewalPriceEmailText'] = RenewalPrices::defaultEmailText();
        }

        $options = function($prefix, array $values) {
            $result = [];
            foreach($values as $value)
            {
                $result[(string)$value] = $this->translate($prefix . '_' . $value);
            }

            return $result;
        };
        $this->availableValues['priceRounding']    = $options('rounding', FinancePolicy::ROUNDING);
        $this->availableValues['belowCostAction']  = $options('belowCost', FinancePolicy::BELOW_COST);
        $this->availableValues['renewalPriceMode'] = $options('renewal', FinancePolicy::RENEWAL_MODES);
        $this->availableValues['rateSource']       = $options('rateSource', FinancePolicy::RATE_SOURCES);
        $this->availableValues['pendingPaymentWaitCertificate'] = $options('pendingWait', \ModulesGarden\GGSModule\App\Libs\RenewalPolicy::PENDING_WAIT_OPTIONS);
        // as a string: the dropdown takes a numeric 0 for "nothing chosen"
        $this->data['pendingPaymentWaitCertificate'] = (string)\ModulesGarden\GGSModule\App\Libs\RenewalPolicy::pendingWait(\ModulesGarden\GGSModule\App\Libs\RenewalPolicy::CERTIFICATE);
        $this->availableValues['currency'] = Helpers::getCurrencyOptions();
        $this->availableValues['catalogueSyncMode'] = $options('catalogueSync', \ModulesGarden\GGSModule\App\Libs\CatalogueSync::MODES);
        $this->data['catalogueSyncMode']            = \ModulesGarden\GGSModule\App\Libs\CatalogueSync::mode();
    }

    public function update()
    {
        $data = $this->formData->toArray();

        // financeSettings: only the posted keys change (the rate is posted only when WHMCS has no USD currency)
        $repository = new AddonModuleRepository();
        $finance    = (array)($repository->getModuleConfiguration()['financeSettings'] ?? []);
        foreach(self::FINANCE as $key)
        {
            if(array_key_exists($key, $data))
            {
                $finance[$key] = $key === 'profitMargin' ? max(0, (float)$data[$key]) : (float)str_replace(',', '.', (string)$data[$key]);
            }
        }
        $repository->saveFinanceSettings($finance);

        $general = array_intersect_key($data, array_flip(self::GENERAL));
        foreach(self::SWITCHES as $key)
        {
            if(array_key_exists($key, $general))
            {
                $general[$key] = !empty($general[$key]) && !in_array($general[$key], ['off', 'false', '0'], true);
            }
        }
        foreach(['minProfit', 'termMarginStep', 'currencyBuffer'] as $key)
        {
            if(array_key_exists($key, $general))
            {
                $general[$key] = max(0, (float)str_replace(',', '.', (string)$general[$key]));
            }
        }
        foreach(['pendingPaymentWaitCertificate'] as $key)
        {
            if(array_key_exists($key, $general))
            {
                $general[$key] = max(0, (int)$general[$key]);
            }
        }
        if(isset($general['catalogueSyncMode']) && !in_array($general['catalogueSyncMode'], \ModulesGarden\GGSModule\App\Libs\CatalogueSync::MODES, true))
        {
            $general['catalogueSyncMode'] = \ModulesGarden\GGSModule\App\Libs\CatalogueSync::DEFAULT_MODE;
        }
        // the default text is shown in the field; keep it empty when unchanged so later wording updates reach it
        if(isset($general['renewalPriceEmailText']) && trim(str_replace("\r", '', (string)$general['renewalPriceEmailText'])) === trim(RenewalPrices::defaultEmailText()))
        {
            $general['renewalPriceEmailText'] = '';
        }
        GeneralSettings::save($general);
    }
}
