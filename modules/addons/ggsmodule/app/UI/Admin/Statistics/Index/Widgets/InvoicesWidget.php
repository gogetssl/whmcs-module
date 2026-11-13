<?php

namespace ModulesGarden\ggsmodule\App\UI\Admin\Statistics\Index\Widgets;

use ModulesGarden\ggsmodule\App\Libs\Helpers;
use ModulesGarden\ggsmodule\Components\Label\LabelDanger;
use ModulesGarden\ggsmodule\Components\Label\LabelSuccess;
use ModulesGarden\ggsmodule\Components\TableSimple\Column\Column;
use ModulesGarden\ggsmodule\Components\TableSimple\Record\Record;
use ModulesGarden\ggsmodule\Components\TableSimple\TableSimple;
use ModulesGarden\ggsmodule\Components\Widget\Widget;
use ModulesGarden\ggsmodule\Core\WHMCS\Models\Currency;
use Illuminate\Database\Capsule\Manager as Capsule;

class InvoicesWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setIcon('file-document-outline');

        $table = new TableSimple;

        $table->setColumns(
            [
                new Column($this->translate('invoiceId')),
                new Column($this->translate('client')),
                new Column($this->translate('status')),
                new Column($this->translate('amount')),
                new Column($this->translate('date')),
            ]
        );

        $rows = Capsule::table('tblinvoices')
                       ->join('tblinvoiceitems', 'tblinvoiceitems.invoiceid', '=', 'tblinvoices.id')
                       ->join('tblhosting', 'tblhosting.id', '=', 'tblinvoiceitems.relid')
                       ->join('tblproducts', 'tblhosting.packageid', '=', 'tblproducts.id')
                       ->where('tblinvoiceitems.type', 'Hosting')
                       ->where('tblproducts.servertype', 'ggsmodule')
                       ->select(['tblinvoices.*'])
                       ->groupBy('tblinvoices.id')
                       ->orderBy('tblinvoices.id', 'DESC')
                       ->limit(5)
                       ->get();

        foreach($rows as $row)
        {
            $invoiceId      = $row->id;
            $clientId       = $row->userid;
            $amount         = Helpers::clientCurrencyToDefaultCurrency($row->total, $clientId);
            $amountFormated = Helpers::formatDefaultCurrency($amount);
            $status         = $row->status;
            $date           = $row->date;
            $label          = (($status == 'Paid') ? (new LabelSuccess()) : (new LabelDanger()))->setText($status);
            $link           = Helpers::getAdminAreaClientLink($clientId);

            $record = new Record([$invoiceId, $link, $label, $amountFormated, $date]);
            $table->addRecord($record);
        }

        $this->addElement($table);
    }
}