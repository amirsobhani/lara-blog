@extends('layout')


@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $article->title }}</h1>

    <!-- Author -->
    <p class="lead">
        ارسال شده توسط <a href="index.php">{{ $article->user->name }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> ارسال شده در تاریخ  {{verta($article->created_at)->formatWord('d F ').verta($article->created_at)->year}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="http://placehold.it/900x300" alt="">

    <hr>

    <!-- Post Content -->
    {!! $article->content !!}
    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    @if(auth()->check())
        <div class="well">
            @include('layouts.errors')

            <h4>ارسال کامنت :</h4>
            <hr>
            <form role="form" action="{{ route('comment.store' , ['article' => $article->slug]) }}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="title">عنوان : </label>
                    <input type="text" class="form-control" name="title" rows="3"/>
                </div>
                <div class="form-group">
                    <label for="content">متن : </label>
                    <textarea class="form-control" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">ارسال</button>
            </form>
        </div>

        <hr>
    @else
        <div class="success">
            برای ارسال نظر وارد حساب کاربری خود شوید.
            <a href="/login">ورود به حساب کاربری</a>
        </div>
    @endif

    <!-- Posted Comments -->

    <!-- Comment -->
    @foreach($comments as $comment)
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->name }}
                    <small>{{verta($comment->created_at)->formatWord('d F ').verta($comment->created_at)->year}}</small>
                </h4>
                {{ $comment->content }}
            </div>
        </div>
    @endforeach

    {{--<!-- Comment -->--}}
    {{--<div class="media">--}}
        {{--<div class="media-body">--}}
            {{--<h4 class="media-heading">علی موسوی--}}
                {{--<small>ارسال شده در تاریخ  فرودین 1396</small>--}}
            {{--</h4>--}}
            {{--لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید--}}
            {{--<!-- Nested Comment -->--}}
            {{--<div class="media">--}}
                {{--<div class="media-body">--}}
                    {{--<h4 class="media-heading">حسام موسوی--}}
                        {{--<small>ارسال شده در تاریخ  فرودین 1396</small>--}}
                    {{--</h4>--}}
                    {{--لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<!-- End Nested Comment -->--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection