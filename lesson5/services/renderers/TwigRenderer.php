<?php


namespace app\services\renderers;
use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
    public function render($template, $params = [])
    {
        $loader = new Twig_Loader_Array([
            'index.html' => 'Hello {{ name }}!',
        ]);
        $twig = new Twig_Environment($loader);

        echo $twig->render('index.html', ['name' => 'roma']);
    }

}