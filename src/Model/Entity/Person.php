<?php

namespace App\Model\Entity;

use Cake\ORM\Behavior\Translate\TranslateTrait;
use Cake\ORM\Entity;

class Person extends Entity
{
    use TranslateTrait;

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
