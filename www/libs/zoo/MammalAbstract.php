<?php

namespace Lib\Zoo;

abstract class MammalAbstract extends AnimalAbstract
{
    /**
     * @skill
     * @return string
     */
    public function pi()
    {
        return $this->name . ' pi';
    }

    /**
     * @skill
     * @param string $object
     * @return string
     */
    public function byte(string $object = 'man')
    {
        return $this->name . ' has bitten ' . $object;
    }
}
