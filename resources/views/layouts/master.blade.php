<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .bottom-right {
             position: absolute;
             right: 22%;
             top: 10px;
         }

        .bottom-right * {
           border: 1px solid black;

        }

        .bottom-right *:hover {
            border: 2px solid gray;
            color: red;
            opacity: 0.7;
        }

        .content {
            text-align: center;
        }
        .title {
            font-size: 84px;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }

        td {
            color: darkolivegreen;
            font-family: Ebrima;
            text-align: center;
        }

        td a {
            color: cornflowerblue;
            font-family: Ebrima;
        }

        td input[value='Delete']{
            background-color: indianred;
            border: 1px solid black;
        }

        td input[value='Delete']:hover{
            background-color: darkred;

        }

        td input[value='Edit']{
            background-color: yellow;
            border: 1px solid black;
            width: 100%;
        }

        td input[value='Edit']:hover{
            background-color: yellowgreen;
        }

         button[type=submit]{
            background-color: yellow !important;
            border: 1px solid black;
            width: 100%;
        }

         button[type=submit]:hover{
            background-color: yellowgreen !important;
        }

        td input[value='Restore']{
            background-color: limegreen;
            border: none;
            width: 100%;
        }

        td input[value='Restore']:hover{
            background-color: darkolivegreen;
        }

        td input[value='Restore All']{
            background-color: limegreen;
            border: none;
            width: 100%;
        }

        td input[value='Restore All']:hover{
            background-color: forestgreen;
        }

        #itemt {
            width: 100%;
            border: 1px solid black;
            background-color: white;
        }

        #itemt:hover {
            opacity: 0.7;
            background-color: wheat;
            color: #1c7430;
            cursor: pointer;
        }

        button[type=submit]{
            background-color: limegreen;
            border: 1px solid black;
            width:150px;
            height: 38px;
        }
         input {
            padding:5px;
        }

        .pagina {
            color: darkolivegreen;
            font-family: Ebrima;
        }

        label {
            font-size: 16px;
            color: black !important;
            font-family: Bahnschrift;
            padding-left: 20px;
        }
        table * {
            text-align: center;

        }
        table th {
            padding:10px;
        }

        input[type=submit]:hover{
            cursor: pointer;
        }

        button:hover{
            cursor: pointer;
        }
    </style>
</head>
<body>
<br><br>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@yield('content')
@auth
<div class="bottom-right links">
    <a href="{{ route('items.index') }}">Items</a>
    <a href="{{ route('items.deleted') }}">Deleted Items</a>
    <a href="{{ route('categories.index') }}">Categories</a>
    <a href="{{ route('categories.deleted') }}">Deleted Categories</a>
    <a href="{{ route('materials.index') }}">Materials</a>
    <a href="{{ route('materials.deleted') }}">Deleted Materials</a>
</div>
@endauth
</body>
</html>