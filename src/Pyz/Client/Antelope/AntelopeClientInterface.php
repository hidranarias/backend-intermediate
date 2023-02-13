<?php

namespace Pyz\Client\Antelope;

interface AntelopeClientInterface
{
    /**
     * @param string $name
     *
     * @return array
     */
    public function getAntelopeByName(string $name): array;
}
