<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('layouts.head')
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('layouts.header')
            @include('layouts.sidebar')
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
        @include('layouts.scripts')
    </body>
</html>
