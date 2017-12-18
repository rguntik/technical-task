<?php

namespace Lib\Zoo;

abstract class AnimalAbstract
{
    protected $name;
    protected $skills;

    public function __construct()
    {
        $this->name = (new \ReflectionClass($this))->getShortName();

        return $this;
    }

    /**
     * @return array
     */
    public function getSkills()
    {
        if (!$this->skills) {
            $reflection = new \ReflectionClass($this);
            $skills = [];
            foreach ($reflection->getMethods() as $val) {
                if (strpos($val, '@skill') != false) {
                    $skills[] = $val->getName();
                }
            }
            $this->skills = $skills;
        }

        return $this->skills;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @skill
     * @return string
     */
    public function walk()
    {
        return $this->name . ' walking';
    }
}
