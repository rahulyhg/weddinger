<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Weddinger</title>

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="stylesheet" href="/css/vendor.css">        
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">        
        <link href='http://fonts.googleapis.com/css?family=Bree+Serif' rel='stylesheet' type='text/css'>
    </head>
    <body>

        @include('layouts.navbars.navbar')
    
        <div class="container main-container">
            @yield('content')
        </div>
        
        <script type="text/javascript" src="/js/vendor.js"/>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?= csrf_token() ?>'
                }
            });
        </script>
        @include('layouts.scripts')
        @yield('scripts')
    </body>
</html>
