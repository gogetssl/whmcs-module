<?php
// phpcs:ignoreFile

use ModulesGarden\GGSModule\Core\App\AppContext;

if (!defined('WHMCS'))
{
    die('This file cannot be accessed directly');
}

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'AppContext.php';

function GGSModule_CreateAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_SuspendAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_UnsuspendAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_TerminateAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_ChangePassword(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_ChangePackage(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_TestConnection(array $params)
{
    try
    {
        #MGLICENSE_CHECK_THROW_EXCEPTION#
    }
    catch (\Exception $ex)
    {
        return [
            'error' => $ex->getMessage()
        ];
    }

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_UsageUpdate(array $params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_ConfigOptions($params = [])
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_ServiceSingleSignon($params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_MetaData()
{
    return (new AppContext())->runServerModule(__FUNCTION__, []);
}

function GGSModule_AdminSingleSignOn($params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function GGSModule_AdminServicesTabFields($params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

if (defined('CLIENTAREA'))
{
    function GGSModule_ClientArea($params)
    {
        #MGLICENSE_CHECK_RETURN#

        return (new AppContext())->runServerModule(__FUNCTION__, $params);
    }
}