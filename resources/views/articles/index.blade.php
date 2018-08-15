@extends('layout')

@section('content')

    <h1 class="page-header">
        مقالات سایت
    </h1>

    <!-- First Blog Post -->
    @foreach( $articles as $article )

        <div>
            <h2>
                <a href="{{route('article.show', ['articleSlug'=> $article->slug])}}">{{ $article->title }}</a>
            </h2>
            <p class="lead">
                ارسال شده توسط <a href="index.php">{{ $article->user->name }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>ارسال شده در تاریخ  {{verta($article->created_at)->formatWord('d F ').verta($article->created_at)->year}}</p>

                <ul>
                    @foreach($article->categories()->pluck('name') as $cat)
                        <li><a href="/articles/category/{{$cat}}">{{$cat}}</a></li>
                    @endforeach
                </ul>

            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>{!! $article->body !!}</p>
            <a class="btn btn-primary" href="{{route('article.show', ['articleSlug'=> $article->slug])}}">ادامه  مطلب <span class="glyphicon glyphicon-chevron-left"></span></a>
        </div>

        @if(! $loop->last )
            <hr>
        @endif

    @endforeach


    <!-- Pager -->
    <div style="text-align:center;">
       {!! $articles->render() !!}
    </div>

@endsection