@include('partials._head')
    <body>
        <div class="container">
            @include('partials._nav')
            @include('partials._messages')
            @yield('content')
            <footer class="text-center">&copy DevsMan</footer>
        </div>
        @include('partials._scripts')
    </body>
</html>
