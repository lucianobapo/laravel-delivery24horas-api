<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>Laravel</title>
{{--        <link href="{{ elixir('css/app.compiled.css') }}" rel="stylesheet">--}}
{{--        <link href="{{ elixir('css/ionic.css') }}" rel="stylesheet">--}}
        <link href="//code.ionicframework.com/nightly/css/ionic.css" rel="stylesheet">

        <!-- ionic/angularjs js -->
        {{--<script src="{{ elixir('js/app.compiled.js') }}"></script>--}}
        <script src="//code.ionicframework.com/nightly/js/ionic.bundle.js"></script>

        <script type="text/javascript">
            angular.module('ionicApp', ['ionic'])

                    .controller('MainCtrl', function($scope, $ionicSideMenuDelegate) {

                        $scope.toggleLeft = function() {
                            $ionicSideMenuDelegate.toggleLeft();
                        };

                    });
        </script>
    </head>

    <body ng-app="ionicApp" ng-controller="MainCtrl">

    <ion-side-menus>

        <ion-side-menu-content>
            <ion-header-bar class="bar-positive">
                <button class="button button-icon ion-navicon" ng-click="toggleLeft()" ng-hide="$exposeAside.active"></button>
                <h1 class="title">Content</h1>
            </ion-header-bar>
            <ion-content class="padding">
                <p>
                    On a small viewport (less than 768px window width), the left menu will be hidden, but can be shown by swiping left to right, or toggling the button in the top left of the header. On a large viewport (greater than or equal to 768px), the left menu will stay open.
                </p>
                <p>
                    Using <code>large</code> as the attribute's value is an alias to <code>(min-width:768px)</code> since it is the most common use-case. However, for added flexibility, any valid media query could be added as the value, such as <code>(min-width:600px)</code> or even multiple queries such as <code>(min-width:750px) and (max-width:1200px)</code>.
                </p>
            </ion-content>
        </ion-side-menu-content>

        <ion-side-menu expose-aside-when="large">
            <ion-header-bar class="bar-royal">
                <h1 class="title">Left Menu</h1>
            </ion-header-bar>
            <ion-content>
                <div class="list">
                    <div class="item">
                        A few
                    </div>
                    <div class="item">
                        of my
                    </div>
                    <div class="item">
                        favorite
                    </div>
                    <div class="item">
                        things
                    </div>
                </div>
            </ion-content>
        </ion-side-menu>

    </ion-side-menus>

    </body>
</html>