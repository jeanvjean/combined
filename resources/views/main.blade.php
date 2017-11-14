@include('partials._head')
    <body>
        @include('partials._nav')
        <div class="container">
            @include('partials._messages')
            @yield('content')

        </div>
            <div class="">
                <div class="copy-w3right">
            		<div class="">
                        @if (Auth::check())
                            <div class="top-nav bottom-w3lnav">
                                <ul>
                                    <li><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="{{ url('showDesign') }}">Designs</a></li>
                                    <li><a href="{{ route('products.index') }}">Shop</a></li>
                                    <li><a href="typo.html">Typography</a></li>
                                    <li><a href="{{ url('contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        @endif
            			<p align="center">&copy DevsMan 2017 </p>
            		</div>
            	</div>

            </div>
        @include('partials._scripts')
    </body>
</html>
