<!-- navbar from bootstrap 3 doc http://getbootstrap.com/components/#navbar -->

<nav class="navbar navbar-default navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::route('home')}}">
                {{ $setting->app_name }}
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if (count($categories))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Categories
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li>
                                    {!! link_to_route('post.category', $category->name, $category->slug) !!}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
                @if (count($projects))
                    <li>
                        {!! link_to_route('portfolio', 'Portfolio') !!}
                    </li>
                @endif
                {!! Form::open(['route'=>'post.search', 'class'=>'navbar-form navbar-left', 'method'=>'get']) !!}
                    <div class="input-group">
                        {!! Form::text('q', Request::get('q'), ['class'=>'form-control col-lg-8', 'placeholder'=>'Search']) !!}
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                {!! Form::close() !!}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/auth/logout">Logout</a>
                            </li>
                            @if (Auth::user()->superuser)
                                <li class="divider"></li>
                                <li>
                                    {!! link_to_route('admin.home', 'Admin') !!}
                                </li>
                            @endif
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="/auth/login">Connexion</a>
                    </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>