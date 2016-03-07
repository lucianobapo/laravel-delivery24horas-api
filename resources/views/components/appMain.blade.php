<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
        <title>Laravel</title>
{{--        <link href="{{ elixir('css/app.compiled.css') }}" rel="stylesheet">--}}
        <link href="{{ elixir('css/ionic.css') }}" rel="stylesheet">
        <!-- ionic/angularjs js -->
        <script src="{{ elixir('js/app.compiled.js') }}"></script>
    </head>
    <body ng-app="starter" ng-controller="ReportController">

    <ion-nav-bar class="bar-positive">
        <ion-nav-back-button>
        </ion-nav-back-button>
    </ion-nav-bar>

    <ion-nav-view></ion-nav-view>


    <script id="templates/tabs.html" type="text/ng-template">
        <ion-tabs class="tabs-icon-top tabs-positive">

            <ion-tab title="Home" icon="ion-home" href="#/tab/home">
                <ion-nav-view name="home-tab"></ion-nav-view>
            </ion-tab>

            <ion-tab title="About" icon="ion-ios-information" href="#/tab/about">
                <ion-nav-view name="about-tab"></ion-nav-view>
            </ion-tab>

            <ion-tab title="Contact" icon="ion-ios-world" ui-sref="tabs.contact">
                <ion-nav-view name="contact-tab"></ion-nav-view>
            </ion-tab>

        </ion-tabs>
    </script>

    <script id="templates/home.html" type="text/ng-template">
        <ion-view view-title="Home">
            <ion-content class="padding">
                <p>
                    <a class="button icon icon-right ion-chevron-right" href="#/tab/{{ $primeiro=key($mesesContent) }}">{{ $mesesContent[$primeiro]['titulo'] }}</a>
                </p>
            </ion-content>
        </ion-view>
    </script>

    @foreach($mesesContent as $timestamp=>$conteudo)
        <script type="text/javascript">
            modApp.config(function($stateProvider) {
                $stateProvider
                        .state('tabs.{{ $timestamp }}', {
                            url: "/{{ $timestamp }}",
                            views: {
                                'home-tab': {
                                    templateUrl: "templates/{{ $timestamp }}.html"
                                }
                            }
                        });
            });
        </script>
        <script id="templates/{{ $timestamp }}.html" type="text/ng-template">
            <ion-view view-title="{{ $conteudo['titulo'] }}">
                <ion-content class="padding">
                    @include('components.table', ['matriz'=>$conteudo['matriz'],'somaMatriz'=>$conteudo['somaMatriz']])
                    <p>
                        <a class="button icon ion-home" href="#/tab/home"> Home</a>
                        @if(isset($conteudo['depois']))
                            <a class="button icon icon-right ion-chevron-right" href="#/tab/{{ $conteudo['depois'] }}">Próximo</a>
                        @endif
                    </p>
                </ion-content>
            </ion-view>
        </script>
    @endforeach

    <script id="templates/about.html" type="text/ng-template">
        <ion-view view-title="About">
            <ion-content class="padding">
                <h3>Create hybrid mobile apps with the web technologies you love.</h3>
                <p>Free and open source, Ionic offers a library of mobile-optimized HTML, CSS and JS components for building highly interactive apps.</p>
                <p>Built with Sass and optimized for AngularJS.</p>
                <p>
                    <a class="button icon icon-right ion-chevron-right" href="#/tab/navstack">Tabs Nav Stack</a>
                </p>
            </ion-content>
        </ion-view>
    </script>

    <script id="templates/nav-stack.html" type="text/ng-template">
        <ion-view view-title="Tab Nav Stack">
            <ion-content class="padding">
                <p><img src="http://ionicframework.com/img/diagrams/tabs-nav-stack.png" style="width:100%"></p>
            </ion-content>
        </ion-view>
    </script>

    <script id="templates/contact.html" type="text/ng-template">
        <ion-view title="Contact">
            <ion-content>
                <div class="list">
                    <div class="item">
                        @IonicFramework
                    </div>
                    <div class="item">
                        @DriftyTeam
                    </div>
                </div>
            </ion-content>
        </ion-view>
    </script>
    </body>
</html>