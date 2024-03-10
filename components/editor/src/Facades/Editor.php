<?php

namespace TheVosCache\Editor\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TheVosCache\Editor\Editor
 */
class Editor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \TheVosCache\Editor\Editor::class;
    }
}
