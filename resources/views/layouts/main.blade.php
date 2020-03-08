<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="format-detection" content="telephone=no">
        <title>
            Web page analyst — @yield('title')
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <header class="page-header">
            @section('navbar')
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">Web page analyst</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item @yield('linkHome')">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item @yield('linkHistory')">
                            <a class="nav-link" href="{{ route('domains.history') }}">History</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <main>
            <div>
                @yield('content')
            </div>

            @show
        </main>

        <footer>

        </footer>

        <script   src="https://code.jquery.com/jquery-3.4.1.min.js"   integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="   crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
