<?php

namespace ModulesGarden\ggsmodule\App\Models;

use ModulesGarden\ggsmodule\Core\Models\ExtendedEloquentModel;

class CronCheck extends ExtendedEloquentModel
{

    public    $timestamps = true;
    protected $table      = 'CronsCheck';
    protected $fillable   = ['type', 'last_run', 'last_error'];
    protected $primaryKey = 'id';

}
