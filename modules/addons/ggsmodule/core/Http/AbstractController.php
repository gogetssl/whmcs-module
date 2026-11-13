<?php

namespace ModulesGarden\ggsmodule\Core\Http;

use ModulesGarden\ggsmodule\Core\Traits\IsAdmin;
use ModulesGarden\ggsmodule\Core\Traits\OutputBuffer;

/**
 * Description of AbstractController
 */
class AbstractController
{
    use IsAdmin;
    use OutputBuffer;
}
