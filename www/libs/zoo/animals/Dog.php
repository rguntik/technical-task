<?php

namespace Lib\Zoo\Animals;

use Lib\Zoo\MammalAbstract;

class Dog extends MammalAbstract
{
    /**
     * @skill
     * @return string
     */
    public function wuf()
    {
        return $this->name . ' wuf';
    }
}
