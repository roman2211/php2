<?php


namespace app\services\renderers;


use app\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
  public function render($template, $params = [])
{
ob_start();

  if ($template == 'main') {
$templatePath = TEMPLATES_DIR . "layouts/$template" . ".php";

  } else {
    $templatePath = TEMPLATES_DIR . "{$params['className']}/$template" . ".php";
  }
extract($params);
include $templatePath;

return ob_get_clean();}
}