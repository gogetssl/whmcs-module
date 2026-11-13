<?php

namespace ModulesGarden\ggsmodule\Core\Hook;

use Illuminate\Support\Arr;
use ModulesGarden\ggsmodule\Core\FileReader\Reader;
use ModulesGarden\ggsmodule\Core\ModuleConstants;

/**
 * Description of Config
 */
class Config
{
    /**
     * @var type
     */
    protected $data = [];

    public function __construct()
    {
        $this->data = Reader::read(ModuleConstants::getDevConfigDir() . DIRECTORY_SEPARATOR . 'hooks.yml')->get('name', []);
    }

    /**
     * @param string $name
     * @return bool
     */
    public function checkHook(string $name): bool
    {
        if (isset($this->data) && count($this->data) != 0)
        {
            return (bool)\ModulesGarden\ggsmodule\Core\Support\Arr::get($this->data, $name, true);
        }

        return true;
    }
}
