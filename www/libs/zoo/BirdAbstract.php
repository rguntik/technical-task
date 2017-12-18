<?php

namespace Lib\Zoo;

abstract class BirdAbstract extends AnimalAbstract
{
    /**
     * @skill
     * @return string
     */
    public function somethingLikePi()
    {
        return $this->name . ' doing something like pi)';
    }

    /**
     * @skill
     * @return string
     */
    public function fly()
    {
        return $this->name . ' fly';
    }
}
