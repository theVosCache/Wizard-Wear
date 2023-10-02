<?php

namespace App\DropBlockEditor\Blocks;

use Jeffreyvr\DropBlockEditor\Blocks\Block;

class Row extends Block
{
    public $title = 'Row';

    public $data = [];

    public $blockEditComponent = 'row';

    public function render()
    {
        return <<<'blade'
            <div></div>
        blade;
    }
}
