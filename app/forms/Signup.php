<?php

namespace forms;

use Scandio\lmvc\modules\registration\forms;

class Signup extends forms\Signup
{
    public $restaurant = [
        'mandatory' => ['message' => 'Der Name ihrer Lokalität ist ein Pflichtfeld!'],
    ];
    public $city = [
        'mandatory' => ['message' => 'Die Stadt ist Pflichtfeld!']
    ];
    public $zip = [
        'mandatory' => ['message' => 'Eine Postleitzahl wird noch benötigt!']
    ];
    public $place = [
        'mandatory' => ['message' => 'Die Straße- und Hausnummer sind verpflichtend!']
    ];
    public $username = [
        'check-username' => ['message' => 'Der Benutzername: "%s" ist etwas kurz!'],
        'mandatory' => ['message' => 'Bitte einen Benutzername angeben!']
    ];
    public $email = [
        'check-email' => ['message' => 'Die E-Mail: "%s" ist nicht gültig!'],
        'mandatory' => ['message' => 'Bitte eine E-Mail angeben!!']
    ];
    public $password = [
        'check-password' => ['message' => 'Das Passwort ist zu schwach!'],
        'mandatory' => ['message' => 'Später einloggen ohne Passwort: interesante Idee!']
    ];
    public $passwordRetyped = [
        'mandatory' => ['message' => 'Bitte das Passwort zweimal eingeben!'],
        'check-password-retyped' => ['message' => 'Die Passwörter stimmen nicht überein!']
    ];
    public $handle = [
        'mandatory' => ['message' => 'Bitte eine Url wählen!'],
        'check-handle' => ['message' => 'Die Url wird bereits verwendet oder ist zu kurz:']
    ];

    protected function checkHandle($name)
    {
        if (!empty($this->request()->$name) && strlen($this->request()->$name) <= 3
            || (\models\Locations::findBy('handle', $this->request()->$name)->count() > 0)
        ) {
            $this->setError($name, array($this->request()->$name));
        }
    }
}