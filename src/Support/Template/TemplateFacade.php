<?php

namespace Zzld\Foundation\Support\Template;

use Illuminate\Support\Facades\Facade;

class TemplateFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'tpl';
    }
}
