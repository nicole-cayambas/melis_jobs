<?php

namespace Job\View\Helper;

use Laminas\View\Helper\AbstractHelper;

class TableCellStatusHelper extends AbstractHelper
{
    const SUCCESS = 'green';
    const ERROR = 'red';
    const WARNING = 'yellow';
    const INFO = 'blue';
    const NEUTRAL = 'gray';

    public function renderCell($id, $cellData, $variant = 'outlined', $color = self::NEUTRAL)
    {
        $buttonStyle = 'border-radius: 20px; padding-inline: 10px; width: fit-content;';
        $containerStart = $variant == 'outlined'
            ? "<button class='tableStatus' data-id='$id' style='border: 2px solid $color; $buttonStyle'>"
            : "<button class='tableStatus' data-id='$id' style='background-color: $color; $buttonStyle'>";
        $containerEnd = '</button>';

        return "{$containerStart}{$cellData}{$containerEnd}";
    }
}