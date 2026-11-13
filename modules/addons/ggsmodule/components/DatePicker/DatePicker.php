<?php

namespace ModulesGarden\ggsmodule\Components\DatePicker;

use ModulesGarden\ggsmodule\Components\DatePicker\Enums\Format;
use ModulesGarden\ggsmodule\Components\DatePicker\Enums\Type;
use ModulesGarden\ggsmodule\Components\DatePicker\Traits\DisableDateTrait;

class DatePicker extends AbstractPicker
{
    use DisableDateTrait;

    public function __construct()
    {
        parent::__construct();

        $this->setFormat(Format::YYYY_MM_DD)
            ->setType(Type::Date);
    }

    public function disableBeforeToday():self
    {
        return $this->disableBeforeDate(new \DateTime('NOW'));
    }

    public function disableAfterToday():self
    {
        return $this->disableAfterDate(new \DateTime('NOW'));
    }
}