<?php
namespace App\Model\Entity;

use Cake\ORM\Behavior\Translate\TranslateTrait;
use Cake\ORM\Entity;

class Board extends Entity
{
    use TranslateTrait;

    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
