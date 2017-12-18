<?php

namespace Lib\Zoo;

class AnimalFactory
{
    public static function getAnimals(array $names)
    {
        array_walk($names, function (&$val) {
            $val = self::getAnimal($val);
        });

        return $names;
    }

    public static function getAnimal(string $name)
    {
        $className = join("\\", [
            __NAMESPACE__,
            "Animals",
            ucfirst($name)
        ]);

        $parentClassName = __NAMESPACE__ . "\\AnimalAbstract";

        $class = new \ReflectionClass($className);
        if (!$class->isSubclassOf($parentClassName)) {
            throw new \Exception("Class '$className' must be an instance of '$parentClassName'");
        }

        return $class->newInstance();
    }
}
