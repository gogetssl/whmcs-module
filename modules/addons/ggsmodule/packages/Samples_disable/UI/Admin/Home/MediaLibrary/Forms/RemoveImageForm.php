<?php

namespace ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Home\MediaLibrary\Forms;

use ModulesGarden\GGSModule\Components\HiddenField\HiddenField;
use ModulesGarden\GGSModule\Components\MediaLibrary\RemoveForm;
use ModulesGarden\GGSModule\Packages\Samples\UI\Admin\Home\MediaLibrary\Providers\MediaLibraryProvider;

class RemoveImageForm extends RemoveForm
{
    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->setProvider(new MediaLibraryProvider());
        $this->addField((new HiddenField('id')));

        $this->provider->read();

    }
}
