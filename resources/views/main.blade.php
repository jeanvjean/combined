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
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                    <li><a href="icons.html">Icons</a></li>
                                    <li><a href="typo.html">Typography</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        @endif
            			<p>&copy DevsMan © 2017 Attire<a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
            		</div>
            	</div>

            </div>
        @include('partials._scripts')
    </body>
</html>
