<?php

namespace Orders\V1\Rest\Products;

class ProductsResourceFactory
{

    public function __invoke($services)
    {
        $repository = $services->get( ProductsRepository::class );
        return new ProductsResource($repository);
    }

}
