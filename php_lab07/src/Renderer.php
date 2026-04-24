<?php

namespace User\PhpLab07;

use User\PhpLab07\Contracts\RendererInterface;

class Renderer implements RendererInterface
{
    public function __construct(
        private readonly string $viewPath
    )
    {
    }

    public function render(View $view): string
    {
        $templatePath = $this->viewPath . '/' . $view->getTemplate() . '.php';

        if (!file_exists($templatePath)) {
            throw new \RuntimeException("The file does not exists");
        }

        $data = $view->getData();

        extract($data);

        ob_start();

        include $templatePath;

        return ob_get_clean();

    }
}