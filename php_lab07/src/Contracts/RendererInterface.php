<?php

namespace User\PhpLab07\Contracts;

use User\PhpLab07\View;
interface RendererInterface
{
    public function render(View $view) : string;
}