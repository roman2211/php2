<?php


namespace app\services;


class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;
    protected $params;
    protected $requestMethod;
    protected $referrer;

    protected $pattern = '#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui';

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->referrer = $_SERVER['HTTP_REFERER'];

        $this->parseRequest();
    }


    public function parseRequest()
    {
        if(preg_match_all($this->pattern, $this->requestString, $matches)){
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
            $this->params = $_REQUEST;
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getRequestMethod()
    {
        return $this->requestMethod;
    }

    public function isGet()
    {
        return $this->requestMethod == "GET";
    }

    public function isPost()
    {
        return $this->requestMethod == "POST";
    }

    public function isAjax()
    {
        return $_SERVER['HTTP_X_REQUEST_WITH'] === 'XMLHttpRequest';
    }

    public function getReferrer()
    {
        return $this->referrer;
    }
}