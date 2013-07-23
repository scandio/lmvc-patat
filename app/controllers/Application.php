<?php

namespace controllers;

use Scandio\lmvc\modules\security\AnonymousController;
use Scandio\lmvc\LVC;

class Application extends AnonymousController
{
    public static function index()
    {
        return static::render();
    }
}