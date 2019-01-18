<?php


namespace app\services\renderers;

use app\interfaces\IRenderer;

/**
 * Class TemplateRenderer
 * @package app\services\renderers
 * Отвечает за отображение пхп-шаблонов
 */
class TemplateRenderer implements IRenderer
{
    public function render($template, $params = [])
    {
        ob_start();
        $templatePath = TEMPLATES_DIR . $template . ".php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}