<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Larablog') }}</title>

        <title>Blog Home - Start Bootstrap Template</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @if ($flash = session('message'))
            <div id="flash-message" class="alert alert-success" role="alert">
                {{ $flash }}
            </div>
        @endif

        <div class="app">
            <!-- Navigation -->
            @include ('layouts._navigation')
            @yield ('content')
        </div>
        
        <!-- Footer -->
        @include ('layouts._footer')

        <!--
        <script>
            $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
        </script>
        -->
    </body>
</html>