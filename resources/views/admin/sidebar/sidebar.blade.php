<nav class="px-nav px-nav-left">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
        <span class="px-nav-toggle-arrow"></span>
        <span class="navbar-toggle-icon"></span>
        <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">
        <li class="px-nav-box p-a-3 b-b-1" id="demo-px-nav-box">
            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <img src="/assets/demo/avatars/1.jpg" alt="" class="pull-xs-left m-r-2 border-round" style="width: 54px; height: 54px;">
            <div class="font-size-16"><span class="font-weight-light">Welcome, </span><strong>{{ Auth::user()->name }}</strong></div>
            <div class="btn-group" style="margin-top: 4px;">
                <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-envelope"></i></a>
                <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-user"></i></a>
                <a href="#" class="btn btn-xs btn-primary btn-outline"><i class="fa fa-cog"></i></a>
                <a href="#" class="btn btn-xs btn-danger btn-outline"><i class="fa fa-power-off"></i></a>
            </div>
        </li>
        <li class="px-nav-item">
            <a href="#"><i class="px-nav-icon ion-ios-analytics"></i><span class="px-nav-label">Главная</span></a>
        </li>
        <li class="px-nav-item px-nav-dropdown">
            <a href="#"><i class="px-nav-icon ion-ios-pulse-strong"></i><span class="px-nav-label">Настройки<span class="label label-danger">5</span></span></a>

            <ul class="px-nav-dropdown-menu">
                <li class="px-nav-item"><a href="#"><span class="glyphicon glyphicon-user"></span><span class="px-nav-label">&nbsp;&nbsp;Аккаунт</span></a></li>
                <li class="px-nav-item"><a href="{{route('channel')}}"><i class="dropdown-icon  fa fa-paper-plane"></i><span class="px-nav-label">&nbsp;&nbsp;Каналы</span></a></li>
                <li class="px-nav-item"><a href="{{route('victoriansAdd')}}"><i class="dropdown-icon  fa fa-paper-plane"></i><span class="px-nav-label">&nbsp;&nbsp;Викторины</span></a></li>
                <li class="px-nav-item"><a href="{{route('questionsAdd')}}"><i class="dropdown-icon  fa fa-paper-plane"></i><span class="px-nav-label">&nbsp;&nbsp;Вопросы</span></a></li>

            </ul>
        </li>

    </ul>
</nav>

<nav class="navbar px-navbar">
    <!-- Header -->
    <div class="navbar-header">
        <a class="navbar-brand px-demo-brand" href="#"><span class="px-demo-logo bg-primary"><span class="px-demo-logo-1"></span><span class="px-demo-logo-2"></span><span class="px-demo-logo-3"></span><span class="px-demo-logo-4"></span><span class="px-demo-logo-5"></span><span class="px-demo-logo-6"></span><span class="px-demo-logo-7"></span><span class="px-demo-logo-8"></span><span class="px-demo-logo-9"></span></span></a>
    </div>

    <!-- Navbar togglers -->
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#px-demo-navbar-collapse" aria-expanded="false"><i class="navbar-toggle-icon"></i></button>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="px-demo-navbar-collapse">


        <ul class="nav navbar-nav navbar-right">


            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="/assets/demo/avatars/1.jpg" alt="" class="px-navbar-image">
                    <span class="hidden-md">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href=""><span class="label label-warning pull-xs-right"><i class="fa fa-asterisk"></i></span>Profile</a></li>
                    <li><a href="">Account</a></li>

                    <li><a href="{{route('channel')}}"><i class="dropdown-icon  fa fa-paper-plane"></i>&nbsp;&nbsp;Каналы</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}<i class="dropdown-icon fa fa-power-off"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></li>
                </ul>
            </li>

        </ul>
    </div><!-- /.navbar-collapse -->
</nav>