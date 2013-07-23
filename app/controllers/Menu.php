<?php

namespace controllers;

use Scandio\lmvc\modules\security\SecureController;
use Scandio\lmvc\modules\security\Security;

class Menu extends SecureController {

    public static function index()
    {
        $userId = \models\Users::findBy('username', Security::get()->currentUser()->username)->one()->id;

        $dishes = \models\Dishes::findBy('user_id', $userId);

        return static::render(['dishes' => $dishes]);
    }

    public static function edit($id = null)
    {
        $isPost = static::request()->save;

        if (is_null($id)) {
            $dish = new \models\Dishes();
        } else {
            $dishModel = new \models\Dishes();
            $dish = $dishModel->getDishByUser(Security::get()->currentUser()->id, $id);
        }

        $form = new \forms\Dish();
        $form->validate(static::request());

        if ($isPost) {
            $dish->user_id = \models\Users::findBy('username', Security::get()->currentUser()->username)->one()->id;
            $dish->setName(static::request()->name);
            $dish->setImg(static::request()->img);
            $dish->setPrice(static::request()->price);
            $dish->setDescription(static::request()->description);
            $dish->setAdvertised(static::request()->advertised ? static::request()->advertised : "0");
        }

        if ($form->isValid() && $dish->save()) {
            return static::redirect('Menu::index');
        } else {
            return static::render([
                'dish'      => $dish,
                'img'       => static::request()->img,
                'errors'    => $isPost ? $form->getErrors() : []
            ]);
        }

        return static::render(['dish' => $dish]);
    }

    public static function delete($id)
    {
        \models\Dishes::find($id)->delete();

        return static::redirect('Menu::index');
    }
}