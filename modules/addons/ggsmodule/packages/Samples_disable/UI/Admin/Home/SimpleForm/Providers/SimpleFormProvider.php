<?php

namespace ModulesGarden\ggsmodule\Packages\Samples\UI\Admin\Home\SimpleForm\Providers;

use ModulesGarden\ggsmodule\Core\Components\Actions\Redirect;
use ModulesGarden\ggsmodule\Core\Components\Response\Response;
use ModulesGarden\ggsmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\ggsmodule\Packages\MediaLibrary\Helpers\LibraryPathHelper;
use ModulesGarden\ggsmodule\Packages\MediaLibrary\Services\GalleryFileManager;

class SimpleFormProvider extends CrudProvider
{
    public function read()
    {
        $this->availableValues['configoptions[dropdown][]'] = [
            '0' => 'DUP!',
            '2' => 'sfsfesfe',
            '5' => 'w3r4w34w34',
        ];

        $this->data['configoptions[dupa]'] = '#F00';
        $this->data['color']               = '#F00';

        $this->data['switcher_def'] = 0;

        if ($firstFoundImage = $this->getFirstImageFromGallery()) {
            $this->data->set('imageSelector', $firstFoundImage);
            $this->data->set('imagePicker', $firstFoundImage);
        }
    }

    public function create()
    {
        //return (new Response())->setActions([(new Redirect('https://google.com'))]);
        throw new \Exception('CXXX');
    }

    protected function getFirstImageFromGallery()
    {
        $libraryPath        = LibraryPathHelper::getPath();
        $galleryFileManager = new GalleryFileManager($libraryPath);
        return $galleryFileManager->getUploadedFilesList()[0];
    }
}
