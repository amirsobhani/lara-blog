<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">راکت</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">درباره ما</a>
                </li>
                <li>
                    <a href="#">سرویس ها</a>
                </li>
                <li>
                    <a href="#">تماس با ما</a>
                </li>
            </ul>
            @if(auth()->check())
                <div class="nav navbar-left" style="margin-top: 10px">
                    <form action="{{route('logout')}}" method="post">
                        {!! csrf_field() !!}
                        <button class="btn btn-danger btn-xs">خروج از حساب کاربری</button>
                    </form>
                </div>
            @else
                <div class="nav navbar-left" style="margin-top: 10px">
                    <a class="btn btn-success btn-xs" href="/login">ورود به حساب کاربری</a>
                    {{--<form action="{{route('login')}}" method="post">--}}
                        {{--{!! csrf_field() !!}--}}
                        {{--<button class="btn btn-success btn-xs">ورود به حساب کاربری</button>--}}
                    {{--</form>--}}
                </div>
            @endif
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
