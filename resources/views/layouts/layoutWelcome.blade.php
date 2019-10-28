<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/mycss.css">
        <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
        <link href="/css/jquery-ui.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">



        @yield('titleWelcome')




        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="/js/jquery-ui.js"></script>
        <script src="/js/bootstrap.js"></script>
        <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
        <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>

    </head>
    <body>
        <header>
            <div class="container-fluid myheader align-items-center">
                <div class="row h-100">
                    <div class="col-md-2 col-12 text-center my-auto">
                        <a class="titleHeader" href="/"><h1>TrouveTonResto</h1></a>
                    </div>
                    <div class="offset-md-6 col-md-2 ">
                        @auth
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                              <button type="submit" class="btn btn-primary btn-lg mybut">Se deconnecter</button>
                            </form>
                        @else
                            <a class="btn btn-primary btn-lg mybut" type="button" href="{{ route('register') }}">S'inscrire</a>
                        @endif
                    </div>
                    <div class="col-md-2 text-right">
                        @guest
                            <a class="btn btn-primary btn-lg mybut" type="button" href="{{ route('login') }}">Se connecter</a>
                        @else
                            <a class="btn btn-primary btn-lg mybut" type="button" href="{{ url('/myAccount') }}">Mon compte</a>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        @yield('contentWelcome')

    </body>
</html>
