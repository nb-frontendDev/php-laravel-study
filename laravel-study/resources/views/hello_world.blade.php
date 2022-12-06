<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Hellow world</title>
    </head>
    <body class="antialiased">
        <h1>Hello world!!</h1>
        <p>こんにちは{{$name}}さん</p>
        <p>本コースでは{{$course}}を学習します</p>
    </body>
</html>
