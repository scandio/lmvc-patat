<?php

namespace forms;

use Scandio\lmvc\modules\form\Form;

class Dish extends Form
{
    public $name = [
        'mandatory' => ['message' => 'Name ist ein Pflichtfeld!']
    ];
    public $description = [
        'check-description' => ['message' => 'Die Bescheibung "%s" ist etwas kurz!'],
        'mandatory' => ['message' => 'Eine Beschreibung ist verpflichtend!']
    ];
    public $price = [
        'mandatory' => ['message' => 'Der Preis ist ein Pflichtfeld!'],
        'check-price' => ['message' => 'Der Preis ist nicht gültig!']
    ];

    protected function checkDescription($name)
    {
        if (!empty($this->request()->$name) && strlen(trim($this->request()->$name)) < 15) {
            $this->setError($name, array($this->request()->$name));
        }
    }

    protected function checkPrice($name)
    {
        if (!preg_match('=^\d*\,?\d*$=is', $this->request()->$name)
        ) {
            $this->setError($name, array($this->request()->$name));
        }
    }
}