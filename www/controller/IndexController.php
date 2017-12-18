<?php

namespace App;

use Lib\Zoo\AnimalAbstract;
use Lib\Zoo\AnimalFactory;

class IndexController
{
    public function __construct()
    {
        $animalsList = ['cat', 'dog', 'sparrow', 'rat'];

        $animals = AnimalFactory::getAnimals($animalsList);
        array_walk($animals, function (AnimalAbstract $animal) {
            foreach ($animal->getSkills() as $skill) {
                echo call_user_func_array([$animal, $skill], []) . '<br />';
            }
            echo '<br />';
        });
    }
}

