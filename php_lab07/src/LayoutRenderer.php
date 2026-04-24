<?php

namespace User\PhpLab07;

use User\PhpLab07\Contracts\RendererInterface;

class LayoutRenderer implements RendererInterface
{
    public function __construct(
        private readonly RendererInterface $renderer,
        private readonly string            $layout)
    {
    }

    public function render(View $view): string
    {
        $content = $this->renderer->render($view);

        $layoutData = new View($this->layout, [
            'content' => $content
        ]);

        return $this->renderer->render($layoutData);
    }
}