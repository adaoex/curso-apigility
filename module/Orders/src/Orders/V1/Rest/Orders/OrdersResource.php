<?php

namespace Orders\V1\Rest\Orders;

use Orders\V1\Rest\Users\UsersEntity;
use Orders\V1\Rest\Users\UsersRepository;
use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class OrdersResource extends AbstractResourceListener
{

    private $repository;
    private $repositoryUsers;
    private $service;

    public function __construct(
            OrdersRepository $repository, 
            UsersRepository $repositoryUsers, 
            OrdersService $service
    ){
        $this->repository = $repository;
        $this->repositoryUsers = $repositoryUsers;
        $this->service = $service;
    }

    /**
     * Create a resource - POST
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $data['user_id'] = $this->getUser()->getId();
        $result = $this->service->insert($data);

        if ($result == 'error') {
            return new ApiProblem(405, "Erro na inclusão do Pedido");
        }
        return $result;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        if ($this->getUser()->getRole() == "salesman") {
            $order = $this->repository->findOneByUser($id, $this->getUser()->getId());
            if (!$order instanceof OrdersEntity){
                return new ApiProblem(403, 'Pedido não localizado para o vendedor logado');
            }
        }
        
        $result = $this->service->delete($id);
        if ($result == 'error') {
            return new ApiProblem(405, "Erro na inclusão do Pedido");
        }
        return $result;
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        if ($this->getUser()->getRole() == "salesman") {
            return $this->repository->findOneByUser($id, $this->getUser()->getId());
        }
        return $this->repository->find($id);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        if ($this->getUser()->getRole() == "salesman") {
            return $this->repository->findByUser($this->getUser()->getId());
        }
        return $this->repository->findAll();
    }

    /** @return UsersEntity usuario logado */
    private function getUser()
    {
        $user_name = $this->getIdentity()->getRoleId();
        $user = $this->repositoryUsers->findOneByUsername($user_name);
        return $user;
    }
    
    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        $result = $this->service->update($id, $data);
        if ($result == 'error') {
            return new ApiProblem(405, "Erro na atualização do Pedido");
        }
        return $result;
    }

    /**
     * PUT - update a collections resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource : PUT
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $result = $this->service->update($id, $data);
        if ($result == 'error') {
            return new ApiProblem(500, "Erro na atualização do Pedido");
        }
        return $result;
    }

}
