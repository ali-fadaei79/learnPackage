<?php

namespace parsaco\authtestpackage;

use Illuminate\Support\Facades\Facade;

class authTestFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'authTest';
    }
}
