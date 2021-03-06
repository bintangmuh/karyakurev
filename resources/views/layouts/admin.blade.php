<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('/css/admin/style.min.css') }}">
        <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}" type="image/x-icon">
        @stack('css')
        <meta name="theme-color" content="#0093E9">
        <title>@yield('title') Administrator Karyaku</title>
        <style>
            @media screen and (max-width: 992px) {
                .app-body {
                    padding-top: 55px !important;
                    margin-top: 0px !important;
                }
            }
            .sidebar {
                min-height: calc(100vh - 55px);
            }
        </style>
    </head>
    <body>
        @include('components.adminnavbar')
        
        <main class="main">
            @yield('content')        
        </main>
        </div>        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.min.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="{{ asset('/js/admin/app.js') }}"></script>
        @stack('js')
    </body>
</html>