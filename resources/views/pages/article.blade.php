@extends('layouts/main')
@section('title') {{ $news->title }} @parent  @stop
@section('content')
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="back-arrow">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                        <a href="{{ route('news' )}}">Назад</a>
                    </div>

                <svg class="bd-placeholder-img card-img-top" width="100%" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <h5 class="card-title">{{ $news->title }}</h5>
                    <p class="card-text">{{ $news->description }}</p>
                    <p class="card-text">Автор: {{ $news->author }}</p>
                    <p class="card-text"><small class="text-muted">Опубликовано: {{ $news->created_at }}</small></p>
                </div>
            </div>
        </div>
@endsection