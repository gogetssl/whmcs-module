<?php

namespace ModulesGarden\GGSModule\Core\Database;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\MySqlBuilder;
use ModulesGarden\GGSModule\Core\Database\Builders\ModuleMySqlBuilder;

class DatabaseManager
{
    public function dropAllModuleTables()
    {
        $builder = new ModuleMySqlBuilder(Manager::connection());
        $builder->dropAllTables();
    }
}