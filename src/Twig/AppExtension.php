<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('price', [$this, 'formatPrice']),
            new TwigFilter('resume', [$this, 'limitWord']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('globals', [$this, 'getGlobals']),
        ];
    }

    public function formatPrice($number, $decimals = 0, $decPoint = ',', $thousandsSep = ',', $curency = '€')
    {
        $price = number_format($number, $decimals, $decPoint, $thousandsSep);
        return $curency == '€' ? $price.$curency : $curency.$price;
    }

    public function limitWord($text, $numPalabras = 15)
    {
        $palabras = explode(' ', strip_tags($text));
        return implode(' ', array_splice($palabras, 0, $numPalabras)) . (($numPalabras >= count($palabras)) ? '' : '...');
    }

    public function getGlobals()
    {
        return [
            'currency' => '€',
            'comida' => 'pizza',
            'bebida' => 'refresco'
        ];
    }
}
