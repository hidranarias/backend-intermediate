<?php

namespace Pyz\Yves\Antelope\Plugin\Router;

use Spryker\Yves\Router\Plugin\RouteProvider\AbstractRouteProviderPlugin;
use Spryker\Yves\Router\Route\RouteCollection;

class AntelopeRouteProviderPlugin extends AbstractRouteProviderPlugin
{
    public const ANTELOPE_INDEX = 'antelope-index';

    /**
     * @inheritDoc
     */
    public function addRoutes(RouteCollection $routeCollection): RouteCollection
    {
        return $this->addAntelopeIndexRoute($routeCollection);
    }

    /**
     * @param RouteCollection $routeCollection
     *
     * @return RouteCollection
     */
    private function addAntelopeIndexRoute(RouteCollection $routeCollection): RouteCollection
    {
        $route = $this->buildRoute('/antelope/{name}', 'Antelope', 'Index')
            ->setMethods(['GET']);
        $routeCollection->add(static::ANTELOPE_INDEX, $route);

        return $routeCollection;
    }
}
