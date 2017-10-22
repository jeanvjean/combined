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
                <li  class="{{ Request::is('/')? "active":"" }}"><a href="/"><span class="fa fa-home fa-2x"></span> Home</a></li>
            @if(Auth::check())
                <li class="{{ Request::is('profile')? "active":"" }}"><a href="{{ url('profile') }}/{{ Auth::user()->slug }}"><span class="fa fa-street-view fa-2x"></span>Profile</a></li>
                <li><a href="{{ url('/requests') }}"><span class="fa fa-pied-piper-alt fa-2x"></span>Followers</a></li>
                <li><a href="{{ url('/findFriends') }}"><span class="fa fa-users fa-2x"></span></a></li>
                <li class="dropdown">
                               <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                  role="button" aria-expanded="false">
                                   <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
                                   <span class="badge"
                                         style="background:gray; position: relative; top: -15px; left:-10px">
                                {{App\Notification::where('status', 1)
                                    ->where('followed', Auth::user()->id)
                                    ->count()}}
                                   </span>
                               </a>
                                  <?php
                                  $messages = DB::table('users')
                                       ->leftJoin('notifications', 'users.id', 'notifications.follower')
                                       ->where('followed', Auth::user()->id)
                                       //->where('status', 1) //unread message
                                       ->orderBy('notifications.created_at', 'desc')
                                       ->get();
                                  ?>

                                  <ul class="dropdown-menu" role="menu">
                                      @foreach($messages as $message)
                                         <a href="{{url('/notifications')}}/{{$message->id}}">
                                           @if($message->status==1)
                                       <li style="background:#E4E9F2; padding:10px">
                                         @else
                                         <li style="padding:10px">
                                           @endif
                                        <div class="row">
                                         <div class="col-md-2">
                                           <img src="{{url('../')}}/img/{{$message->img}}"
                                            style="width:50px; padding:5px; background:#fff; border:1px solid #eee" class="img-rounded">
                                         </div>

                                       <div class="col-md-10">

                                        <b style="color:green; font-size:90%">{{ucwords($message->firstname)}}</b>
                                         <span style="color:#000; font-size:90%">{{$message->message}}</span>
                                         <br/>
                                         <small style="color:#90949C"> <i aria-hidden="true"></i>
                                           {{date('F j, Y', strtotime($message->created_at))}}
                                         at {{date('H: i', strtotime($message->created_at))}}</small>
                                       </div>

                                       </div>
                                       </li></a>
                                      @endforeach
                                  </ul>
                               </li>
            @endif
                <li class="dropdown">

                    <ul class="dropdown-menu">
                        <li>

                        </li>
                    </ul>
                    </li>
                </ul>
                @if (Auth::check())

            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Request::is('shopping-cart')? "active":"" }}"><a href="{{ route('products.shoppingCart') }}">
                    <span class="fa fa-shopping-cart fa-2x"></span> Cart <span class="badge">{{ Session::has('cart')? Session::get('cart')->
                totalQty:'' }}</span></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span><img src="{{ url('../') }}/img/{{ Auth::user()->img }}" width="30px" height="30px" class="img-rounded"></span>
                        <span>{{ Auth::user()->name }} </span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('products.create') }}">Add Product</a></li>
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li><a href="{{ route('products.index') }}">Shop</a></li>
                        <li><a href="{{ url('editProfile') }}/{{ Auth::user()->slug }}">Edit Profile</a></li>
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
