<?php

namespace ModulesGarden\GGSModule\App\UI\Admin\AutomationQueue\Index;

use ModulesGarden\GGSModule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\DataTable;
use ModulesGarden\GGSModule\App\Libs\Icons;
use ModulesGarden\GGSModule\Components\Container\Container;
use ModulesGarden\GGSModule\Components\Text\Text;
use ModulesGarden\GGSModule\Core\Contracts\Components\AdminAreaInterface;

class AutomationQueueContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        if(!\ModulesGarden\GGSModule\App\Libs\GeneralSettings::enabled('hideInfoMessages'))
        {
            $text = new Text();
            $text->setCss('ggs-html');
            $text->setText($this->explanation());
            $this->addElement($text);
        }

        $this->addElement(new DataTable());
    }

    protected function explanation(): string
    {
        $t    = function($key) { return htmlspecialchars((string)$this->translate($key), ENT_QUOTES); };
        $item = function($key) use ($t) { return '<li>' . $t($key) . '</li>'; };

        return '<div class="ggs-explain"><span class="ggs-explain__icon">' . Icons::svg('information-outline') . '</span><div>'
            . '<h3>' . $t('about_title') . '</h3>'
            . '<p>' . $t('about_intro') . '</p>'
            . '<ul>' . $item('about_validate') . $item('about_install') . $item('about_reissue') . $item('about_status') . $item('about_error') . '</ul>'
            . '</div></div>';
    }
}
