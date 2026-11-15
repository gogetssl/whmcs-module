<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\Products\Index;

use ModulesGarden\GGSModule\App\UI\Admin\Products\Index\DataTables\Products\ArrayDataProvider\DataTable;
use ModulesGarden\GGSModule\Components\Alert\Alert;
use ModulesGarden\GGSModule\App\Http\Admin\Products as ProductsController;
use ModulesGarden\GGSModule\Components\Alert\AlertDanger;
use ModulesGarden\GGSModule\Components\Alert\AlertInfo;
use ModulesGarden\GGSModule\Components\Alert\AlertSuccess;
use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\App\Libs\Icons;
use ModulesGarden\GGSModule\App\Libs\CatalogueSync;
use ModulesGarden\GGSModule\Components\Tab\Tab;
use ModulesGarden\GGSModule\Components\TabsWidget\TabsWidget;
use ModulesGarden\GGSModule\Components\Text\Text;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class ProductsContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $session = $_SESSION[ProductsController::SESSION] ?? [];
        unset($_SESSION[ProductsController::SESSION]);
        if(!empty($session['error']))
        {
            $this->addElement((new AlertDanger())->setText(htmlspecialchars((string)$session['error'], ENT_QUOTES, 'UTF-8', false)));
        }
        if(!empty($session['notice']))
        {
            $notice = $session['notice'];
            $this->addElement((new AlertSuccess())->setText($this->translate('notice_' . $notice['key'], ['product' => htmlspecialchars((string)$notice['product'], ENT_QUOTES, 'UTF-8', false), 'detail' => $notice['detail'] !== '' ? htmlspecialchars((string)$notice['detail'], ENT_QUOTES, 'UTF-8', false) : '-'])));
        }

        $productsTab = new Tab();
        $productsTab->setTitle($this->translate('productsTab', [], ['admin.products']));
        if(!\ModulesGarden\GGSModule\App\Libs\GeneralSettings::enabled('hideInfoMessages'))
        {
            $text = new Text();
            $text->setCss('ggs-html');
            $text->setText($this->explanation());
            $productsTab->addElement($text);
        }
        $productsTab->addElement(new DataTable());

        // what changed in the provider's catalogue (M-16)
        $changes = CatalogueSync::recent();
        $week    = date('Y-m-d H:i:s', strtotime('-7 days'));
        $recent  = 0;
        foreach($changes as $change)
        {
            $recent += $change->created_at >= $week ? 1 : 0;
        }
        $changesTab = new Tab();
        $changesTab->setTitle($this->translate('catalogueTab', [], ['admin.products']) . ($recent ? ' (' . $recent . ')' : ''));
        $changesText = new Text();
        $changesText->setCss('ggs-html');
        $changesText->setText($this->changesHtml($changes));
        $changesTab->addElement($changesText);

        $tabs = new TabsWidget();
        $tabs->addTab($productsTab);
        $tabs->addTab($changesTab);
        $this->addElement($tabs);
    }

    /** The catalogue changes of the last 90 days, newest first */
    protected function changesHtml($changes): string
    {
        $t     = function($key, array $vars = []) { return htmlspecialchars((string)$this->translate($key, $vars, ['admin.products']), ENT_QUOTES); };
        $h     = function($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); };

        $html = '<div class="ggs-changes"><p class="ggs-changes__intro">' . $t('catalogue_intro', [':days' => CatalogueSync::TAB_DAYS])
            . ' ' . $t('catalogue_mode', [':mode' => (string)$this->translate('catalogueSync_' . CatalogueSync::mode(), [], ['admin.settings.index.providers.finance_settings_provider'])])
            . ' <a href="addonmodules.php?module=GGSModule&amp;mg-page=settings&amp;settings-page=financeSettings">' . $t('catalogue_settings') . '</a></p>';

        if(!count($changes))
        {
            return $html . '<p class="ggs-changes__empty">' . $t('catalogue_empty') . '</p></div>';
        }

        $labels = CatalogueSync::typeLabels();
        $html  .= '<div class="ggs-changes__scroll"><table class="ggs-changes__table"><thead><tr><th>' . $t('catalogue_date') . '</th><th>' . $t('catalogue_type') . '</th><th>' . $t('catalogue_product')
            . '</th><th>' . $t('catalogue_change') . '</th><th>' . $t('catalogue_before') . '</th><th>' . $t('catalogue_now') . '</th><th>' . $t('catalogue_action') . '</th></tr></thead><tbody>';
        foreach($changes as $row)
        {
            $product = $h($row->product_name !== '' ? $row->product_name : $row->remote_id);
            if((int)$row->whmcs_pid)
            {
                $product = '<a href="configproducts.php?action=edit&amp;id=' . (int)$row->whmcs_pid . '">' . $product . '</a> <span class="ggs-changes__muted">#' . (int)$row->whmcs_pid . '</span>';
            }
            $html .= '<tr><td class="ggs-changes__date">' . $h(substr((string)$row->created_at, 0, 16)) . '</td>'
                . '<td><span class="ggs-changes__badge ggs-changes__badge--' . $h($row->type) . '">' . $h($labels[$row->type] ?? $row->type) . '</span></td>'
                . '<td>' . $product . ' <span class="ggs-changes__muted">' . $h($row->vendor) . '</span></td>'
                . '<td>' . $h($row->field !== '' ? CatalogueSync::fieldLabel($row->field) : '') . '</td>'
                . '<td>' . $h($row->old_value) . '</td><td>' . $h($row->new_value) . '</td><td>' . $h($row->action) . '</td></tr>';
        }

        return $html . '</tbody></table></div></div>';
    }

    /** What the page is for and what the actions in the Manage column do */
    protected function explanation(): string
    {
        $t    = function($key) { return htmlspecialchars((string)$this->translate($key, [], ['admin.products']), ENT_QUOTES); };
        $item = function($key) use ($t) { return '<li><b>' . $t($key . '_name') . '</b>: ' . $t($key) . '</li>'; };

        return '<div class="ggs-explain"><span class="ggs-explain__icon">' . Icons::svg('information-outline') . '</span><div>'
            . '<h3>' . $t('about_title') . '</h3>'
            . '<p>' . $t('about_intro') . '</p>'
            . '<ul>' . $item('about_import') . $item('about_hide') . $item('about_retire') . $item('about_fix') . $item('about_cancel') . '</ul>'
            . '</div></div>';
    }
}
