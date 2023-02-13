<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\AntelopesRestApi\Processor\Antelopes;

use Generated\Shared\Transfer\RestErrorMessageTransfer;
use Pyz\Client\Antelope\AntelopeClientInterface;
use Pyz\Glue\AntelopesRestApi\AntelopesRestApiConfig;
use Pyz\Glue\AntelopesRestApi\Processor\Mapper\AntelopesResourceMapperInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceBuilderInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResourceInterface;
use Spryker\Glue\GlueApplication\Rest\JsonApi\RestResponseInterface;
use Spryker\Glue\GlueApplication\Rest\Request\Data\RestRequestInterface;
use Symfony\Component\HttpFoundation\Response;

class AntelopesReader implements AntelopesReaderInterface
{
    public function __construct(
        protected AntelopeClientInterface $antelopeClient,
        protected RestResourceBuilderInterface $restResourceBuilder,
        protected AntelopesResourceMapperInterface $antelopesResourceMapper,
    ) {
    }

    public function getAntelope(RestRequestInterface $restRequest): RestResponseInterface
    {
        $response = $this->restResourceBuilder->createRestResponse();

        $resourceIdentifier = $restRequest->getResource()->getId();

        $restResource = $this->findAntelopeByName($resourceIdentifier, $restRequest);

        if (!$restResource) {
            return $this->addAntelopeNotFoundError($response);
        }

        return $response->addResource($restResource);
    }

    public function findAntelopeByName(string $name, RestRequestInterface $restRequest): ?RestResourceInterface
    {
        $antelopeData = $this->antelopeClient->getAntelopeByName($name);

        if (!$antelopeData) {
            return null;
        }

        return $this->createRestResourceFromAntelopeSearchData($antelopeData, $restRequest);
    }

    protected function createRestResourceFromAntelopeSearchData(
        array $antelopeData,
        RestRequestInterface $restRequest,
    ): RestResourceInterface {
        $restAntelopeAttributesTransfer = $this->antelopesResourceMapper
        ->mapAntelopeDataToAntelopeRestAttributes($antelopeData);

        return $this->restResourceBuilder->createRestResource(
            AntelopesRestApiConfig::RESOURCE_ANTELOPES,
            $restAntelopeAttributesTransfer->getName(),
            $restAntelopeAttributesTransfer,
        );
    }

    protected function addAntelopeNotFoundError(RestResponseInterface $response): RestResponseInterface
    {
        $restErrorTransfer = (new RestErrorMessageTransfer())
        ->setCode(AntelopesRestApiConfig::RESPONSE_CODE_CANT_FIND_ANTELOPE)
        ->setStatus(Response::HTTP_NOT_FOUND)
        ->setDetail(AntelopesRestApiConfig::RESPONSE_DETAIL_CANT_FIND_ANTELOPE);

        return $response->addError($restErrorTransfer);
    }

    public function getAntelopes(RestRequestInterface $restRequest): RestResponseInterface
    {
        $response = $this->restResourceBuilder->createRestResponse();

        $antelopeData = $this->antelopeClient->getAntelopes();

        if (!$antelopeData) {
            return $this->addAntelopeNotFoundError($response);
        }
        $restResources = $this->createRestResourcesFromAntelopeSearchData($antelopeData, $restRequest);

        foreach ($restResources as $restResource) {
            $response->addResource($restResource);
        }

        return $response;
    }

    protected function createRestResourcesFromAntelopeSearchData(
        array $antelopeData,
        RestRequestInterface $restRequest,
    ): array {
        $restAntelopeAttributesTransfer = $this->antelopesResourceMapper
        ->mapAntelopesDataToAntelopeRestAttributes($antelopeData);
        $response = [];

        foreach ($restAntelopeAttributesTransfer as $antelope) {
            $resource = $this->restResourceBuilder->createRestResource(
                AntelopesRestApiConfig::RESOURCE_ANTELOPES,
                $antelope->getName(),
                $antelope,
            );
            $response[] = $resource;
        }

        return $response;
    }

    protected function addAntelopeNameSpecifiedError(RestResponseInterface $response): RestResponseInterface
    {
        $restErrorTransfer = (new RestErrorMessageTransfer())
        ->setCode(AntelopesRestApiConfig::RESPONSE_CODE_ANTELOPE_NAME_IS_NOT_SPECIFIED)
        ->setStatus(Response::HTTP_BAD_REQUEST)
        ->setDetail(AntelopesRestApiConfig::RESPONSE_DETAIL_ANTELOPE_NAME_IS_NOT_SPECIFIED);

        return $response->addError($restErrorTransfer);
    }
}
