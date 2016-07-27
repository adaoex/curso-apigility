angular.module('starter.controllers', [])

    .controller('LoginCtrl', ['$scope','$http','$state','OAuth', 'OAuthToken',
        function($scope, $http, $state, OAuth, OAuthToken){
            
            $scope.login = function(data){
                
                OAuth.getAccessToken(data).then(function(){
                    $state.go('tabs.orders');
                }, function(){
                    $scope.error_login = "Usuário ou senha inválidos";
                });
                
            };
        }
    ])
    .controller('OrdersCtrl', ['$scope', '$http', '$state', 
        function($scope, $http, $state){
            $scope.getOrders = function(){
                $http.get('http://apigility.app/orders').then(
                        function(data){
                            $scope.orders = data.data._embedded.orders;
                        });
            };
            
            $scope.doRefresh = function(){
                $scope.getOrders();
                $scope.$broadcast('scroll.refreshComplete');
            };
            
            $scope.onOrderDelete = function(order){
                $http.delete('http://apigility.app/orders/' + order.id).then(
                        function(){
                            $scope.getOrders();
                        });
            };
            
            $scope.getOrders();
            
            
        }
    ])