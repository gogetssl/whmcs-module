<?php

namespace ModulesGarden\ggsmodule\Core\UI\View;

use ModulesGarden\ggsmodule\Components\AppNavBar\AppNavBar;
use ModulesGarden\ggsmodule\Components\NavBarItem\NavBarItem;
use ModulesGarden\ggsmodule\Core\DependencyInjection;
use ModulesGarden\ggsmodule\Core\Events\Events\NavBarBuilderBeforeCreateMenu;
use ModulesGarden\ggsmodule\Core\Helper\BuildUrl;
use ModulesGarden\ggsmodule\Core\Http\View\MainMenu;
use ModulesGarden\ggsmodule\Core\ModuleConstants;
use ModulesGarden\ggsmodule\Core\Support\Facades\Config;
use ModulesGarden\ggsmodule\Core\Support\Facades\Menu;
use ModulesGarden\ggsmodule\Core\Support\Facades\Router;
use ModulesGarden\ggsmodule\Core\Support\Facades\Translator;
use function ModulesGarden\ggsmodule\Core\fire;

class NavBarBuilder
{
    /** admin tabs always visible in the bar; the other sections live in the "More" dropdown (Lovable plugin-nav) */
    const PRIMARY = ['home', 'products', 'pricing', 'certificateLog', 'emails', 'settings'];

    protected AppNavBar $navbar;

    public function __construct()
    {
        //@todo refactor
        $this->navbar = new AppNavBar();
    }

    public function createAdminArea(): AppNavBar
    {
        $this->createMenu();
        $this->configureNavbar();

        return $this->navbar;
    }

    public function createClientArea(): AppNavBar
    {
        $this->createMenu();

        return $this->navbar;
    }

    public function createProductConfiguration(): AppNavBar
    {
        $this->configureNavbar();

        return $this->navbar;
    }

    function configureNavbar(): void
    {
        $icon = \ModulesGarden\ggsmodule\Core\Support\Facades\Config::get('configuration.moduleIcon', 'modulesgarden_base');
        $this->navbar->setModuleLogo(BuildUrl::getAssetsURL('/img/products/' . $icon . '.png'), str_replace('_', '-', $icon));
        $this->navbar->setVendorLogo(BuildUrl::getAssetsURL('/img/modules-garden-logo.svg'));
        $this->navbar->setMainUrl(BuildUrl::getUrl());
        // the header shows the edition's name (GoGetSSL Module / TheSSLStore Plugin)
        $this->navbar->setModuleName(\ModulesGarden\ggsmodule\App\Libs\Edition::name());
        $this->navbar->setModuleVersion(Config::get('configuration.version'));
    }

    protected function createMenu(): void
    {
        //@todo - move this to service
        $mainMenu = DependencyInjection::create(MainMenu::class);
        $level    = ModuleConstants::getLevel();

        fire(NavBarBuilderBeforeCreateMenu::class);

        $more = null;

        /**
         * @var \ModulesGarden\ggsmodule\Core\UI\Menu\Item $menuItem
         */
        foreach (Menu::getItems() as $menuItem)
        {
            $item = new NavBarItem();
            $item->setTitle(Translator::get($level . '.menu.' . $menuItem->getName()));
            $item->setUrl($menuItem->getUrl());
            $item->setTarget($menuItem->getTarget());
            $item->setIcon($menuItem->getIcon());
            if (Router::getCurrentRoute()->is($menuItem->getName()))
            {
                $item->setActive(true);
            }

            if ($menuItem->hasItems())
            {
                /**
                 * @var \ModulesGarden\ggsmodule\Core\UI\Menu\Item $subMenuItem
                 */
                foreach ($menuItem->getItems() as $subMenuItem)
                {
                    $subitem = new NavBarItem();
                    $subitem->setTitle(Translator::get($level . '.menu.' . $menuItem->getName() . '_' . $subMenuItem->getName()));
                    $subitem->setUrl($subMenuItem->getUrl());
                    if (Router::getCurrentRoute()->is($menuItem->getName(), $subMenuItem->getName()))
                    {
                        $subitem->setActive(true);
                    }


                    $item->addItem($subitem);
                }
            }

            if ($level === ModuleConstants::LEVEL_ADMIN && !in_array($menuItem->getName(), self::PRIMARY, true))
            {
                if (!$more)
                {
                    $more = new NavBarItem();
                    $more->setTitle(Translator::get($level . '.menu.more'));
                    $more->setUrl('#');
                    $more->setIcon('dots-horizontal');
                }
                // the dropdown shows the open section's name instead of "More"
                if (Router::getCurrentRoute()->is($menuItem->getName()))
                {
                    $more->setActive(true);
                    $more->setTitle(Translator::get($level . '.menu.' . $menuItem->getName()));
                }
                $more->addItem($item);

                continue;
            }

            $this->navbar->addMenuItem($item);
        }

        if ($more)
        {
            $this->navbar->addMenuItem($more);
        }

        foreach (Menu::getToolbarElements() as $toolbarElement)
        {
            $this->navbar->addToolbarElement($toolbarElement);
        }
    }
}