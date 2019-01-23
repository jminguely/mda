<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>
<div id="app">
    @include('parts.header')
        <div class="container">
            @yield('main')
        </div>

        <div class="sidebar">
            @section('sidebar') 
                <p>Sidebar section from the "main" layout file.</p>
            @show
        </div>
    @include('parts.footer')
</div>
<?php wp_footer(); ?>
</body>
</html>