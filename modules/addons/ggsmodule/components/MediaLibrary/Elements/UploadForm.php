<?php

namespace ModulesGarden\GGSModule\Components\MediaLibrary\Elements;

use ModulesGarden\GGSModule\Components\Form\Form;


abstract class UploadForm extends Form
{
    protected const UPLOAD_ACTION = 'upload';
    protected $providerAction = self::UPLOAD_ACTION;

 
}
