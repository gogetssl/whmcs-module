<?php

namespace ModulesGarden\ggsmodule\Core\Database\Builders;

use ModulesGarden\ggsmodule\Core\ModuleConstants;

class ModuleMySqlBuilder extends \Illuminate\Database\Schema\MySqlBuilder
{
    public function getAllTables()
    {
        return array_filter(parent::getAllTables(),function ($table) {
            return str_contains($table->Tables_in_db, ModuleConstants::getPrefixDataBase());
        });
    }
}