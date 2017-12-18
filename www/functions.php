<?php

function loader($className)
{
    $nameSpace = getLoadPath($className);
    if ($nameSpace) {
        $classPath = $nameSpace[0];

        foreach (explode("\\", $nameSpace[1]) as $val) {
            $path = $classPath . '/' . $val;

            if (is_dir($path)) {
                $classPath = $path;
            } elseif (is_file($path . '.php')) {
                $classPath = $path . '.php';
                break;
            } else {
                $valWithoutCamel = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $val));
                $pathWithoutCamel = $classPath . '/' . $valWithoutCamel;

                if ($valWithoutCamel != $val && is_dir($pathWithoutCamel)) {
                    $classPath = $pathWithoutCamel;
                } else {
                    $classPath = null;
                    break;
                }
            }
        }

        if (!$classPath) {
            throw new \Exception("Class {$className} not found.");
        }

        include_once $classPath;
    }
}

function getLoadPath($className)
{
    $conf = [
        'App' => '/controller',
        'Lib' => '/libs',
    ];

    foreach ($conf as $key => $val) {
        if (preg_match("/^($key)\\\(.*)/", $className, $match)) {
            return [__DIR__ . $val, $match[2]];
        }
    }

    return false;
}

function dump($var) {
    foreach (func_get_args() as $var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}
