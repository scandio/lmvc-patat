<?php

namespace controllers;

use Scandio\lmvc;
use Scandio\lmvc\Controller;
use Scandio\lmvc\modules\registration\controllers;
use \models;
use \forms;
use \util;
use Scandio\lmvc\modules\security;

class Registration extends controllers\Registration
{
    public static function register()
    {
        static::render();
    }

    public static function getHandle($restaurant = null, $handle = null)
    {
        return static::renderJson([
            'handle'        => \util\String::urlSlug($restaurant),
            'isUsed'        => strlen($handle) <= 5 || strlen($restaurant) <= 5 ? true : \models\Locations::findBy('handle', $handle)->count() > 0,
            'restaurant'    => $restaurant
        ]);
    }

    public static function postSignup($redirect = true)
    {
        $signupForm = new forms\Signup();
        $signupForm->validate(static::request());

        if (! $signupForm->isValid()) {
            return static::render([
                'error'     => true,
                'errors'    => $signupForm->getErrors(),
                'user'      => static::request()
            ]);
        } else {
            $parentResponse = parent::postSignup(false);

            if ($parentResponse) {
                $location = new \models\Locations();

                $location->user_id      = $parentResponse->id;
                $location->longitude    = static::request()->longitude;
                $location->latitude     = static::request()->latitude;
                $location->accuracy     = static::request()->accuracy;
                $location->restaurant   = static::request()->restaurant;
                $location->handle       = static::request()->handle;
                $location->city         = static::request()->city;
                $location->zip          = static::request()->zip;
                $location->street       = static::request()->place;

                $location->insert();

                return static::render([
                    'success'   => true
                ]);

            } else {
                # This does not imply a form-validation error, its the last resort...
                static::redirect('Registration::failure');
            }
        }
    }

    public static function edit($redirect = true)
    {
        $userId             = security\Security::get()->currentUser()-id;
        $userModel          = \models\Users::query()
                                ->select('*')
                                ->innerJoin(new \models\Locations(), 'Users.id = Locations.user_id')
                                ->where('Users.id = :user_id', ['user_id' => $userId])->one();

        return static::render([
            'user' => $userModel
        ]);
    }

    public static function postEdit($redirect = true)
    {
        $signupForm = new forms\Signup();
        $signupForm->validate(static::request());

        if (!$signupForm->isValid()) {
            return static::render([
                'error'     => true,
                'errors'    => $signupForm->getErrors(),
                'user'      => static::request()
            ]);
        } else {
            $parentResponse     = parent::postEdit(false);
            $userId             = security\Security::get()->currentUser()-id;

            if ($parentResponse) {
                $location               = new \models\Locations();
                $location               = $location::findBy('user_id', $userId);
                $location->user_id      = $userId;
                $location->longitude    = static::request()->longitude;
                $location->latitude     = static::request()->latitude;
                $location->accuracy     = static::request()->accuracy;
                $location->restaurant   = static::request()->restaurant;
                $location->handle       = static::request()->handle;
                $location->city         = static::request()->city;
                $location->zip          = static::request()->zip;
                $location->street       = static::request()->place;

                $location->save();

                static::render([
                    'success'   => true,
                    'user'      => static::request()
                ]);
            } else {
                # This does not imply a form-validation error, its the last resort...
                static::redirect('Registration::failure');
            }
        }
    }
}