<?php

namespace ModulesGarden\GGSModule\Core\Http;

use ModulesGarden\GGSModule\Core\Traits\IsAdmin;
use ModulesGarden\GGSModule\Core\Traits\OutputBuffer;

/**
 * Description of AbstractController
 */
class AbstractController
{
    use IsAdmin;
    use OutputBuffer;
}
