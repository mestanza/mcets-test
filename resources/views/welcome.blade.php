<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projecto CRUD</title>

        <link rel="stylesheet" href="css/app.css">
        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script src="//cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    </head>

    <style>
    /* ---- reset ---- */ 
body{ margin:0; font:normal 75% Arial, Helvetica, sans-serif; } 
canvas{ display: block; vertical-align: bottom; } 

/* ---- particles.js container ---- */ 
#particles-js{ 
    position:absolute; 
    width: 100%; 
    height: 100%; 
    background-color: #2663F2; 
    background-repeat: no-repeat; 
    background-size: 20%; 
    background-position: 50% 50%; 
} 

/* ---- stats.js ---- */ 
.count-particles{ 
    background: purple; 
    position: absolute; 
    top: 48px; 
    left: 0; 
    width: 80px; 
    color: #13E8E9; 
    font-size: .8em; 
    text-align: left; 
    text-indent: 4px; 
    line-height: 14px; 
    padding-bottom: 2px; 
    font-family: Helvetica, Arial, sans-serif; 
    font-weight: bold; 
} 

.js-count-particles{ 
    font-size: 1.1em; 
} 
#stats, .count-particles{ 
    -webkit-user-select: none; 
    margin-top: 5px; margin-left: 5px; 
} 

#stats{ 
    border-radius: 3px 3px 0 0; 
    overflow: hidden; 
} 

.count-particles{ 
    border-radius: 0 0 3px 3px; 
}
    </style>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
             <a class="navbar-brand" href="#">Logo de la Empresa</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">

                    @if (Route::has('login'))

                        <div class="top-right links">
                            @auth

                                <li class="nav-item active">
                                    <a href="{{ url('/home') }}">Home</a>
                                </li>

                            @else
                            <li class="nav-item">
                            <a class="nav-item nav-link active" href="{{ route('login') }}">Login <span class="sr-only">(current)</span></a>
                                <li class="nav-item">
                                    {{-- <a href="{{ route('login') }}">Login</a> --}}
                                    {{-- <a href="{{ route('register') }}">Register</a> --}}
                                </li>

                            @endauth
                        </div>
                    @endif
                </ul>
                <span class="navbar-text">
                    Evolucionando la Empresa
                </span>
            </div>
        </nav>
        <div id="particles-js"></div>
            <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
        
            <script src="js/demo.js"></script>
    </body>
    
</html>
