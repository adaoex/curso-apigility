<?php

namespace Orders\V1\Rest\Users;

class UsersResourceFactory
{

    public function __invoke($services)
    {
        $repository = $services->get(UsersRepository::class);
        return new UsersResource($repository);
    }

}
