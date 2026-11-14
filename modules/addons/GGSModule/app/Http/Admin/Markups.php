<?php

namespace ModulesGarden\GGSModule\App\Http\Admin;

use ModulesGarden\GGSModule\App\Libs\Markups as MarkupRules;
use ModulesGarden\GGSModule\App\Libs\CsrfToken;
use ModulesGarden\GGSModule\App\UI\Admin\Markups\Index\MarkupsContainer;
use ModulesGarden\GGSModule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\GGSModule\Core\Helper;
use ModulesGarden\GGSModule\Core\Http\AbstractController;

/**
 * Client markups: list, add / change (POST), delete (link with the admin token)
 */
class Markups extends AbstractController implements AdminAreaInterface
{
    const SESSION = 'ggs_markups';

    public function index()
    {
        return Helper\view()->addElement(MarkupsContainer::class);
    }

    public function save()
    {
        return $this->run('saved', function() {
            MarkupRules::set((int)($_POST['client_id'] ?? 0), (int)($_POST['product_id'] ?? 0), str_replace(',', '.', trim((string)($_POST['markup'] ?? ''))));
        });
    }

    public function delete()
    {
        return $this->run('deleted', function() {
            MarkupRules::delete((int)($_REQUEST['id'] ?? 0));
        });
    }

    protected function run($notice, callable $action)
    {
        try
        {
            if(!CsrfToken::valid($_REQUEST['token'] ?? ''))
            {
                throw new \RuntimeException('Invalid or expired security token. Reload the page and try again.');
            }
            $action();
            $_SESSION[self::SESSION]['notice'] = $notice;
        }
        catch(\Throwable $e)
        {
            $_SESSION[self::SESSION]['error'] = $e->getMessage();
        }

        return Helper\redirect('markups', 'index');
    }
}
