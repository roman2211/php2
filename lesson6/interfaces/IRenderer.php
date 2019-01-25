<?php


namespace app\interfaces;

interface IRenderer
{
function render ($template, $params=[]);
}