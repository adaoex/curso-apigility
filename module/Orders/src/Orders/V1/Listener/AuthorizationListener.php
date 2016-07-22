<?php

namespace Orders\V1\Listener;

use Orders\V1\Rest\Users\UsersEntity;
use ZF\ApiProblem\ApiProblem;
use ZF\MvcAuth\Authorization\AclAuthorization;
use ZF\MvcAuth\MvcAuthEvent;

class AuthorizationListener
{

    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        /** @var AclAuthorization $authorization */
        $authorization = $mvcAuthEvent->getAuthorizationService();
        $services = $mvcAuthEvent->getMvcEvent()->getApplication()->getServiceManager();
        $userRepository = $services->get('Orders\\V1\\Rest\\Users\\UsersRepository');
        $user_name = $mvcAuthEvent->getIdentity()->getRoleId();
        $user = $userRepository->findOneByUsername($user_name);

        if ( $user_name == 'guest' ){
            return;
        }
        
        if (!$user instanceof UsersEntity) {
            return;
        }

        if ($user->getRole() == 'admin') {
            // regras permissões admin
        }

        if ($user->getRole() == 'salesman') {
            $authorization->deny(null, 'Orders\\V1\\Rest\\Clients\\Controller::collection', 'POST');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Clients\\Controller::entity', 'PUT');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Clients\\Controller::entity', 'PATCH');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Clients\\Controller::entity', 'DELETE');

            $authorization->deny(null, 'Orders\\V1\\Rest\\Products\\Controller::collection', 'POST');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Products\\Controller::entity', 'PUT');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Products\\Controller::entity', 'PATCH');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Products\\Controller::entity', 'DELETE');

            $authorization->deny(null, 'Orders\\V1\\Rest\\Users\\Controller::collection', 'GET');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Users\\Controller::collection', 'POST');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Users\\Controller::entity', 'GET');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Users\\Controller::entity', 'PUT');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Users\\Controller::entity', 'PATCH');
            $authorization->deny(null, 'Orders\\V1\\Rest\\Users\\Controller::entity', 'DELETE');

            /* para permitir
              $authorization->addRole($user_name);
              $authorization->allow($user_name, 'Orders\\V1\\Rest\\Orders\\Controller::collection', 'GET');
             */
        }
    }

}
