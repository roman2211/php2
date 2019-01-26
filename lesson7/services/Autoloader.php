<?php

namespace app\services;

class Autoloader
{

    public $fileExtension = ".php";

    public function loadClass($className)
    {

        $className = str_replace(["app\\", "\\"],[ROOT_DIR, "/"], $className);
        $className .= $this->fileExtension;

        if (file_exists($className)) {
            include $className;
        }else{
            echo "Файл не найден";
        }
    }
}