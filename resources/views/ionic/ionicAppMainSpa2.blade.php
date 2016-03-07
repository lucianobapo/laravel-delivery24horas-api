<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>Laravel</title>
{{--        <link href="{{ elixir('css/app.compiled.css') }}" rel="stylesheet">--}}
{{--        <link href="{{ elixir('css/ionic.css') }}" rel="stylesheet">--}}
        <link href="//code.ionicframework.com/nightly/css/ionic.css" rel="stylesheet">
        <link href="//cdn.jsdelivr.net/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        {{--<link href="/css/bootstrap.min.css" rel="stylesheet">--}}

        <!-- ionic/angularjs js -->
        {{--<script src="{{ elixir('js/app.compiled.js') }}"></script>--}}
        <script src="//code.ionicframework.com/nightly/js/ionic.bundle.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular-i18n/1.5.0/angular-locale_pt-br.js"></script>
        {{--<script src="//cdn.jsdelivr.net/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}

        {{--<script src="/js/bootstrap.min.js"></script>--}}

        <script type="text/javascript">
            angular.module('ionicApp', ['ionic'])

                    .config(function($stateProvider, $urlRouterProvider) {

                        $stateProvider
                                .state('eventmenu', {
                                    url: "/event",
                                    abstract: true,
                                    templateUrl: "templates/event-menu.html"
                                })
                                .state('eventmenu.home', {
                                    url: "/home?categ",
                                    views: {
                                        'menuContent' :{
                                            templateUrl: "templates/home.html"
                                        }
                                    }
                                })
                                .state('eventmenu.checkin', {
                                    url: "/check-in",
                                    views: {
                                        'menuContent' :{
                                            templateUrl: "templates/check-in.html",
                                            controller: "CheckinCtrl"
                                        }
                                    }
                                })
                                .state('eventmenu.attendees', {
                                    url: "/attendees",
                                    views: {
                                        'menuContent' :{
                                            templateUrl: "templates/attendees.html",
                                            controller: "AttendeesCtrl"
                                        }
                                    }
                                })

                        $urlRouterProvider.otherwise("/event/home");
                    })

                    .controller('MainCtrl', function($scope, $ionicSideMenuDelegate, $rootScope) {
                        $rootScope.rootCategoriaSelecionada = 'Todas';
                        $scope.attendees = [
                            { firstname: 'Nicolas', lastname: 'Cage' },
                            { firstname: 'Jean-Claude', lastname: 'Van Damme' },
                            { firstname: 'Keanu', lastname: 'Reeves' },
                            { firstname: 'Steven', lastname: 'Seagal' }
                        ];

                        $scope.toggleLeft = function() {
                            $ionicSideMenuDelegate.toggleLeft();
                        };

                        $rootScope.loadCategoria = function ($nome) {
                            $rootScope.rootCategoriaSelecionada = $nome;
                        };

                    })
                    .controller('CategoriasCtrl', ['$http', '$scope', '$rootScope', function ($http, $scope, $rootScope){
                        $scope.loadItems = function () {
                            $http.get('http://localhost:8000/json/categorias')
                                    .success(function(data){
                                        $scope.categorias = data;
                                    });
                        };

                        $scope.doRefresh = function(){
                            $scope.loadItems();
                            $scope.$broadcast('scroll.refreshComplete');
                            $scope.$apply();
                        };

                        $scope.loadItems();
                    }])
                    .controller('ProdutosCtrl', ['$http', '$scope', '$rootScope', '$stateParams', function ($http, $scope, $rootScope, $stateParams){
//                        console.log($stateParams);
                        if (typeof $stateParams.categ == 'undefined') $stateParams.categ = 'todas';

                        $scope.loadItems = function () {
                            $http.get('http://localhost:8000/json/produtosDelivery/'+$stateParams.categ)
                                    .success(function(data){
                                        $scope.produtos = data;
                                    });
                        };

                        $scope.doRefresh = function(){
                            $scope.loadItems();
                            $scope.$broadcast('scroll.refreshComplete');
                            $scope.$apply();
                        };
                        $scope.loadItems();
                    }])

                    .controller('CheckinCtrl', function($scope) {
                        $scope.showForm = true;

                        $scope.shirtSizes = [
                            { text: 'Large', value: 'L' },
                            { text: 'Medium', value: 'M' },
                            { text: 'Small', value: 'S' }
                        ];

                        $scope.attendee = {};
                        $scope.submit = function() {
                            if(!$scope.attendee.firstname) {
                                alert('Info required');
                                return;
                            }
                            $scope.showForm = false;
                            $scope.attendees.push($scope.attendee);
                        };

                    })

                    .controller('AttendeesCtrl', function($scope) {

                        $scope.activity = [];
                        $scope.arrivedChange = function(attendee) {
                            var msg = attendee.firstname + ' ' + attendee.lastname;
                            msg += (!attendee.arrived ? ' has arrived, ' : ' just left, ');
                            msg += new Date().getMilliseconds();
                            $scope.activity.push(msg);
                            if($scope.activity.length > 3) {
                                $scope.activity.splice(0, 1);
                            }
                        };

                    });
        </script>
        <style type="text/css">
            .delivery-product-block {
                float: left;
            }
            .delivery-product-block>.thumbnail {
                display: inline-block;
                width: 200px;
                height: 310px;
            }
            @media (max-width:360px){
                .deliveryProductBlockCenter {
                    width: 320px;
                }
            }


            .delivery-product-list {
                display: block;
            }

            .caption {
                height: 130px;
                overflow: hidden;
            }

            .caption h4 {
                white-space: nowrap;
            }

            .ratings {
                padding-right: 10px;
                padding-left: 10px;
                color: #d17581;
            }
        </style>
    </head>

    <body ng-app="ionicApp" ng-controller="MainCtrl">

    <ion-nav-view></ion-nav-view>

    <script id="templates/event-menu.html" type="text/ng-template">
        <ion-side-menus enable-menu-with-back-views="false">

            <ion-side-menu-content>
                <ion-nav-bar class="bar-stable">
                    <ion-nav-back-button></ion-nav-back-button>

                    <ion-nav-buttons side="left">
                        {{--<button class="button button-icon button-clear ion-navicon" menu-toggle="left"></button>--}}
                        <button class="button button-icon button-clear ion-navicon" ng-click="toggleLeft()" ng-hide="$exposeAside.active"></button>
                    </ion-nav-buttons>
                    <ion-nav-buttons side="right">
                        <button class="button button-clear">
                            <i class="ion-android-cart"></i> (Vazio)
                        </button>
                    </ion-nav-buttons>
                </ion-nav-bar>

                <ion-nav-view name="menuContent"></ion-nav-view>
            </ion-side-menu-content>

            {{--<ion-side-menu side="left">--}}
            <ion-side-menu expose-aside-when="large">
                <ion-header-bar class="bar-stable">
                    <h1 class="title">Categorias</h1>
                </ion-header-bar>
                <ion-content ng-controller="CategoriasCtrl">
                    <ion-refresher pulling-text="Deslize para Atualizar" on-refresh="doRefresh()"></ion-refresher>
                    <div class="list list-inset">
                        <a href="#/event/home" class="item item-icon-left" menu-close>
                            <i class="icon ion-beer"></i>
                            Todas
                        </a>
                        <a ng-repeat="item in categorias" href="#/event/home?categ=@{{ item.id }}" class="item item-icon-left" menu-close ng-click="loadCategoria(item.nome)">
                            <i class="@{{ item.icon }}"></i>
                            @{{ item.nome }}
                        </a>
                        {{--<a href="#/event/check-in" class="item item-icon-left" menu-close>--}}
                            {{--<i class="icon ion-beer"></i>--}}
                            {{--Cervejas--}}
                        {{--</a>--}}
                        {{--<a href="#/event/attendees" class="item item-icon-left" menu-close>--}}
                            {{--<i class="icon ion-pizza"></i>--}}
                            {{--Lanches--}}
                        {{--</a>--}}
                    </div>
                    {{--<ul class="list">--}}
                        {{--<!-- Note each link has the 'menu-close' attribute so the menu auto closes when clicking on one of these links -->--}}
                        {{--<a href="#/event/check-in" class="item" menu-close>Cervejas</a>--}}
                        {{--<a href="#/event/attendees" class="item" menu-close>Lanches</a>--}}
                    {{--</ul>--}}
                </ion-content>
            </ion-side-menu>

        </ion-side-menus>
    </script>

    <script id="templates/home.html" type="text/ng-template">
        <ion-view view-title="delivery24horas.com" ng-controller="ProdutosCtrl">
            <div class="bar bar-subheader bar-stable item-input-inset">
                <i class="icon ion-search placeholder-icon"></i>
                <input type="search" placeholder="Busca de produtos" ng-model="query" style="width: 100%">
            </div>
            <ion-content class="has-subheader padding">
                <ion-refresher pulling-text="Deslize para Atualizar" on-refresh="doRefresh()"></ion-refresher>
                <div class="row responsive-lg row-center">
                    <div class="col col-33 text-center">
                        <img src="/img/logo-delivery.png" class="" style="width: 200px">
                    </div>
                    <div class="col col-33 padding">
                        <h3>Categoria: @{{ rootCategoriaSelecionada }}</h3>
                        <p ng-hide="$exposeAside.active"><< Mais categorias no Menu</p>
                    </div>
                </div>

                <div class="row delivery-product-list">
                    <div class="padding delivery-product-block text-center" ng-repeat="produto in produtos | filter: query" ng-class="{deliveryProductBlockCenter: true}">
                        <div class="thumbnail">
                            <img ng-src="https://s3.amazonaws.com/delivery-images/images/@{{ produto.imagem }}" alt="Imagem do produto @{{ produto.nome }}" title="Imagem do produto @{{ produto.nome }}">
                            <div class="caption">
                                <h4 class="pull-right">@{{ produto.valorUnitVenda | currency }}</h4>
                                <h4>&nbsp;</h4>
                                <p>@{{ produto.nome }}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">1 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </ion-content>
        </ion-view>
    </script>


    <script id="templates/check-in.html" type="text/ng-template">
        <ion-view view-title="Event Check-in">
            <ion-content>
                <form class="list" ng-show="showForm">
                    <div class="item item-divider">
                        Attendee Info
                    </div>
                    <label class="item item-input">
                        <input type="text" placeholder="First Name" ng-model="attendee.firstname">
                    </label>
                    <label class="item item-input">
                        <input type="text" placeholder="Last Name" ng-model="attendee.lastname">
                    </label>
                    <div class="item item-divider">
                        Shirt Size
                    </div>
                    <ion-radio ng-repeat="shirtSize in shirtSizes"
                               ng-value="shirtSize.value"
                               ng-model="attendee.shirtSize">
                        @{{ shirtSize.text }}
                    </ion-radio>
                    <div class="item item-divider">
                        Lunch
                    </div>
                    <ion-toggle ng-model="attendee.vegetarian">
                        Vegetarian
                    </ion-toggle>
                    <div class="padding">
                        <button class="button button-block" ng-click="submit()">Checkin</button>
                    </div>
                </form>

                <div ng-hide="showForm">
                    <pre ng-bind="attendee | json"></pre>
                    <a href="#/event/attendees">View attendees</a>
                </div>
            </ion-content>
        </ion-view>
    </script>

    <script id="templates/attendees.html" type="text/ng-template">
        <ion-view view-title="Event Attendees">
            <ion-content>
                <div class="list">
                    <ion-toggle ng-repeat="attendee in attendees | orderBy:'firstname' | orderBy:'lastname'"
                                ng-model="attendee.arrived"
                                ng-change="arrivedChange(attendee)">
                        @{{ attendee.firstname }}
                        @{{ attendee.lastname }}
                    </ion-toggle>
                    <div class="item item-divider">
                        Activity
                    </div>
                    <div class="item" ng-repeat="msg in activity">
                        @{{ msg }}
                    </div>
                </div>
            </ion-content>
        </ion-view>
    </script>

    </body>
</html>