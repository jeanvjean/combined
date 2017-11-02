@include('partials._head')
    <body>
        @include('partials._nav')
        <div class="container">
            @include('partials._messages')
            @yield('content')

        </div>
        <div class="">
            <footer class="text-center">&copy DevsMan</footer>
        </div>
        @include('partials._scripts')
    </body>
</html>
