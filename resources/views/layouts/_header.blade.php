<header class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <div class="col-md-offset-1 col-md-10">
      <a href="{{ route('home') }}" id="logo">Craigslist</a>
      <nav>
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::check())



            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user-circle fa-x " aria-hidden="true"></i>
                {{ Auth::user()->username }}
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="{{ route('users.show', Auth::user()->id) }}">
                    <i class="fa fa-vcard" aria-hidden="true"></i>
                    <span class="">Your Account</span>
                  </a>
                </li>

                <li>
                  <a href="{{ route('users.posting', Auth::user()->id) }}">
                    <i class="fa fa-photo" aria-hidden="true"></i>
                    <span class="">Your Postings</span>
                  </a>
                </li>

                <!-- @if (Auth::user()->id == '1')
                @can('index', Auth::user())
                <li>
                  <a href="{{ route('users.index') }}">
                    <button class="btn btn-sm btn-primary">All Users</button>
                  </a>
                </li>
                @endcan
                @endif -->


                <li class="divider"></li>
                <li >
                  <a href="{{ route('products.create') }}">
                    <i class="fa fa-plus-circle fa-x" aria-hidden="true"></i>
                    <span class="">New Post</span>
                  </a>
                </li>

                <li >
                  <a href="{{ route('users.wishlist', Auth::user()->id) }}">
                    <i class="fa fa-heart-o fa-x" aria-hidden="true"></i>
                    <span class="">Wishlist</span>
                  </a>
                </li>
                
                <li class="divider"></li>
                <li>
                  <a id="logout" href="#">
                    <form action="{{ route('logout') }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="btn btn-block btn-danger" type="submit" name="button">log out</button>
                    </form>
                  </a>
                </li>
              </ul>
            </li>

          @else
            <li><a href="{{ route('login') }}">login</a></li>
            <li><a href="{{ route('signup') }}">sign up</a></li>
          @endif
        </ul>
      </nav>
    </div>
  </div>
</header>