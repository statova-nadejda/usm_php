<?php

namespace User\PhpLab07;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use User\PhpLab07\Contracts\RendererInterface;
use Twig\TwigFilter;

class TwigRenderer implements RendererInterface
{
    private Environment $twig;

    public function __construct(string $viewPath)
    {
        $loader = new FilesystemLoader($viewPath);

        $this->twig = new Environment($loader, [
            'cache' => false,
            'autoescape' => 'html',
        ]);

        $this->twig->addFilter(new TwigFilter('currency', function ($amount, string $currency = 'EUR') {
            $amount = (float) $amount;

            $symbols = [
                'EUR' => '€',
                'USD' => '$',
                'GBP' => '£',
            ];

            $symbol = $symbols[$currency] ?? $currency;

            return $symbol . number_format($amount, 2, '.', ',');
        }));
    }

    public function render(View $view): string
    {
        return $this->twig->render(
            $view->getTemplate() . '.html.twig',
            $view->getData()
        );
    }
}