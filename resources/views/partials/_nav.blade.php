<nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Shopping</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <li  class="{{ Request::is('/')? "active":"" }}"><a href="/"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            @if(Auth::check())
                <li><a href="{{ route('profile.index') }}">Profile</a></li>
            @endif
                <li><a href="#">All Transactions</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Electronics</a></li>
                    <li><a href="#">Tech</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Track Order</a></li>
                    </ul>
                    </li>
                </ul>
                @if (Auth::check())

            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Request::is('shopping-cart')? "active":"" }}"><a href="{{ route('products.shoppingCart') }}"><span class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">{{ Session::has('cart')? Session::get('cart')->
                totalQty:'' }}</span></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>
                        <span>{{ Auth::user()->name }} </span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('products.create') }}">Add Product</a></li>
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li><a href="{{ route('products.index') }}">Shop</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
                @else
                <a href="{{ route('register') }}" class="pull-right btn btn-primary btn-sm">Sign Up</a>
                <a href="{{ route('login') }}" class="pull-right btn btn-info btn-sm">Login</a>
            @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
