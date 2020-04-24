<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Guillermo BTC</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
    </head>
    <body>
    	<div id="app"></div>

    	<script type="text/javascript" src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
