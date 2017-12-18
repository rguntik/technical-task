<?php

namespace Lib\Zoo\Animals;

use Lib\Zoo\MammalAbstract;

class Cat extends MammalAbstract
{
    /**
     * @skill
     * @return string
     */
    public function meow()
    {
        return $this->name . ' meow';
    }
}
