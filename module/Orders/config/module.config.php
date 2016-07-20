<?php
return array(
    'router' => array(
        'routes' => array(
            'orders.rest.ptypes' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/ptypes[/:ptypes_id]',
                    'defaults' => array(
                        'controller' => 'Orders\\V1\\Rest\\Ptypes\\Controller',
                    ),
                ),
            ),
            'orders.rest.clients' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/clients[/:clients_id]',
                    'defaults' => array(
                        'controller' => 'Orders\\V1\\Rest\\Clients\\Controller',
                    ),
                ),
            ),
            'orders.rest.products' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/products[/:products_id]',
                    'defaults' => array(
                        'controller' => 'Orders\\V1\\Rest\\Products\\Controller',
                    ),
                ),
            ),
            'orders.rest.users' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/users[/:users_id]',
                    'defaults' => array(
                        'controller' => 'Orders\\V1\\Rest\\Users\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'orders.rest.ptypes',
            2 => 'orders.rest.clients',
            3 => 'orders.rest.products',
            4 => 'orders.rest.users',
        ),
    ),
    'zf-rest' => array(
        'Orders\\V1\\Rest\\Ptypes\\Controller' => array(
            'listener' => 'Orders\\V1\\Rest\\Ptypes\\PtypesResource',
            'route_name' => 'orders.rest.ptypes',
            'route_identifier_name' => 'ptypes_id',
            'collection_name' => 'ptypes',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Orders\\V1\\Rest\\Ptypes\\PtypesEntity',
            'collection_class' => 'Orders\\V1\\Rest\\Ptypes\\PtypesCollection',
            'service_name' => 'ptypes',
        ),
        'Orders\\V1\\Rest\\Clients\\Controller' => array(
            'listener' => 'Orders\\V1\\Rest\\Clients\\ClientsResource',
            'route_name' => 'orders.rest.clients',
            'route_identifier_name' => 'clients_id',
            'collection_name' => 'clients',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Orders\\V1\\Rest\\Clients\\ClientsEntity',
            'collection_class' => 'Orders\\V1\\Rest\\Clients\\ClientsCollection',
            'service_name' => 'clients',
        ),
        'Orders\\V1\\Rest\\Products\\Controller' => array(
            'listener' => 'Orders\\V1\\Rest\\Products\\ProductsResource',
            'route_name' => 'orders.rest.products',
            'route_identifier_name' => 'products_id',
            'collection_name' => 'products',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Orders\\V1\\Rest\\Products\\ProductsEntity',
            'collection_class' => 'Orders\\V1\\Rest\\Products\\ProductsCollection',
            'service_name' => 'products',
        ),
        'Orders\\V1\\Rest\\Users\\Controller' => array(
            'listener' => 'Orders\\V1\\Rest\\Users\\UsersResource',
            'route_name' => 'orders.rest.users',
            'route_identifier_name' => 'users_id',
            'collection_name' => 'users',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Orders\\V1\\Rest\\Users\\UsersEntity',
            'collection_class' => 'Orders\\V1\\Rest\\Users\\UsersCollection',
            'service_name' => 'users',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Orders\\V1\\Rest\\Ptypes\\Controller' => 'HalJson',
            'Orders\\V1\\Rest\\Clients\\Controller' => 'HalJson',
            'Orders\\V1\\Rest\\Products\\Controller' => 'HalJson',
            'Orders\\V1\\Rest\\Users\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Orders\\V1\\Rest\\Ptypes\\Controller' => array(
                0 => 'application/vnd.orders.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Orders\\V1\\Rest\\Clients\\Controller' => array(
                0 => 'application/vnd.orders.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Orders\\V1\\Rest\\Products\\Controller' => array(
                0 => 'application/vnd.orders.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Orders\\V1\\Rest\\Users\\Controller' => array(
                0 => 'application/vnd.orders.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Orders\\V1\\Rest\\Ptypes\\Controller' => array(
                0 => 'application/vnd.orders.v1+json',
                1 => 'application/json',
            ),
            'Orders\\V1\\Rest\\Clients\\Controller' => array(
                0 => 'application/vnd.orders.v1+json',
                1 => 'application/json',
                2 => 'application/x-www-form-urlencoded',
            ),
            'Orders\\V1\\Rest\\Products\\Controller' => array(
                0 => 'application/vnd.orders.v1+json',
                1 => 'application/json',
                2 => 'application/x-www-form-urlencoded',
            ),
            'Orders\\V1\\Rest\\Users\\Controller' => array(
                0 => 'application/vnd.orders.v1+json',
                1 => 'application/json',
                2 => 'application/x-www-form-urlencoded',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Orders\\V1\\Rest\\Ptypes\\PtypesEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'orders.rest.ptypes',
                'route_identifier_name' => 'ptypes_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Orders\\V1\\Rest\\Ptypes\\PtypesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'orders.rest.ptypes',
                'route_identifier_name' => 'ptypes_id',
                'is_collection' => true,
            ),
            'Orders\\V1\\Rest\\Clients\\ClientsEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'orders.rest.clients',
                'route_identifier_name' => 'clients_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Orders\\V1\\Rest\\Clients\\ClientsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'orders.rest.clients',
                'route_identifier_name' => 'clients_id',
                'is_collection' => true,
            ),
            'Orders\\V1\\Rest\\Products\\ProductsEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'orders.rest.products',
                'route_identifier_name' => 'products_id',
                'hydrator' => 'Zend\\Hydrator\\ClassMethods',
            ),
            'Orders\\V1\\Rest\\Products\\ProductsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'orders.rest.products',
                'route_identifier_name' => 'products_id',
                'is_collection' => true,
            ),
            'Orders\\V1\\Rest\\Users\\UsersEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'orders.rest.users',
                'route_identifier_name' => 'users_id',
                'hydrator' => 'Zend\\Hydrator\\ClassMethods',
            ),
            'Orders\\V1\\Rest\\Users\\UsersCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'orders.rest.users',
                'route_identifier_name' => 'users_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-apigility' => array(
        'db-connected' => array(
            'Orders\\V1\\Rest\\Ptypes\\PtypesResource' => array(
                'adapter_name' => 'DbAdapter',
                'table_name' => 'ptypes',
                'hydrator_name' => 'Zend\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'Orders\\V1\\Rest\\Ptypes\\Controller',
                'entity_identifier_name' => 'id',
            ),
            'Orders\\V1\\Rest\\Clients\\ClientsResource' => array(
                'adapter_name' => 'DbAdapter',
                'table_name' => 'clients',
                'hydrator_name' => 'Zend\\Hydrator\\ArraySerializable',
                'controller_service_name' => 'Orders\\V1\\Rest\\Clients\\Controller',
                'entity_identifier_name' => 'id',
                'table_service' => 'Orders\\V1\\Rest\\Clients\\ClientsResource\\Table',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Orders\\V1\\Rest\\Ptypes\\Controller' => array(
            'input_filter' => 'Orders\\V1\\Rest\\Ptypes\\Validator',
        ),
        'Orders\\V1\\Rest\\Clients\\Controller' => array(
            'input_filter' => 'Orders\\V1\\Rest\\Clients\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Orders\\V1\\Rest\\Ptypes\\Validator' => array(
            0 => array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '45',
                        ),
                    ),
                ),
            ),
        ),
        'Orders\\V1\\Rest\\Clients\\Validator' => array(
            0 => array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '60',
                        ),
                    ),
                ),
            ),
            1 => array(
                'name' => 'document',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '45',
                        ),
                    ),
                ),
            ),
            2 => array(
                'name' => 'address',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '200',
                        ),
                    ),
                ),
            ),
            3 => array(
                'name' => 'zipcode',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            4 => array(
                'name' => 'city',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '60',
                        ),
                    ),
                ),
            ),
            5 => array(
                'name' => 'state',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
            ),
            6 => array(
                'name' => 'responsible',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '60',
                        ),
                    ),
                ),
            ),
            7 => array(
                'name' => 'email',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '100',
                        ),
                    ),
                ),
            ),
            8 => array(
                'name' => 'phone',
                'required' => true,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '15',
                        ),
                    ),
                ),
            ),
            9 => array(
                'name' => 'obs',
                'required' => false,
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StringTrim',
                    ),
                    1 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                    ),
                ),
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\StringLength',
                        'options' => array(
                            'min' => 1,
                            'max' => '65535',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Orders\\V1\\Rest\\Products\\ProductsResource' => 'Orders\\V1\\Rest\\Products\\ProductsResourceFactory',
            'Orders\\V1\\Rest\\Products\\ProductsRepository' => 'Orders\\V1\\Rest\\Products\\ProductsRepositoryFactory',
            'Orders\\V1\\Rest\\Users\\UsersResource' => 'Orders\\V1\\Rest\\Users\\UsersResourceFactory',
            'Orders\\V1\\Rest\\Users\\UsersRepository' => 'Orders\\V1\\Rest\\Users\\UsersRepositoryFactory',
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(),
    ),
);
