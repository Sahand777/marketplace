<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://ogp.me/ns/fb#">
    <head>
        @include('partials.head')
    </head>
    <body>
        <header class="fixed_header" style="background:transparent">
            <section class="top-banner @if(!Auth::guest()) dashboardHeader @endif">
                <div class="container">
                    <div class="row menuAndLogoCont">
                                <a href="http://firmogram.com/"><img height="100" width="300" src="https://firmogram.com/wp-content/uploads/2017/07/Logo-04-300x96.png" alt="Firmogram" /></a>
                    </div>
                </div>
            </section>
        </header>
        @yield('page-content')
       
    </body>
</html>