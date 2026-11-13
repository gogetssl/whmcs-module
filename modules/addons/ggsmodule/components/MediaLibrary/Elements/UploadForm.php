<?php

namespace ModulesGarden\ggsmodule\Components\MediaLibrary\Elements;

use ModulesGarden\ggsmodule\Components\Form\Form;


abstract class UploadForm extends Form
{
    protected const UPLOAD_ACTION = 'upload';
    protected $providerAction = self::UPLOAD_ACTION;

 
}
