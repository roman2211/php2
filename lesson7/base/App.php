<?php

namespace app\base;

use app\interfaces\IRenderer;
use app\services\Db;
use app\services\Request;
use app\traits\TSingltone;

/**
 * Class App
 * @package app\base
 * @property Db $db;
 * @property Request $request;
 * @property IRenderer $renderer;
 */
class App
{
    use TSingltone;

    public $config;
    /** @var  Storage */
    public $components;

    public static function call()
    {
        return static::getInstance();
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    protected function runController(){

        $controllerName = App::call()->request->getControllerName() ?: $this->config['defaultController'];
        $actionName = App::call()->request->getActionName();

        $controllerClass = $this->config['controllerNamespace'] . ucfirst($controllerName) . "Controller";

        if(class_exists($controllerClass)){
            /** @var \app\controllers\Controller $controller */
            $controller = new $controllerClass(
                new \app\services\renderers\TemplateRenderer()
            );
            try {
                $controller->runAction($actionName);
            } catch (\Exception $e) {
                echo "404";
            }
        }
    }

    public function createComponent($name)
    {
        if($params = $this->config['components'][$name]){
            $class = $params['class'];
            if(class_exists($class)){
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
            throw new \Exception("Не определен класс компонента");
        }
        throw new \Exception("Компонент {$name} не найден");
    }

    public function __get($name) //request
    {
        return $this->components->get($name);
    }
}