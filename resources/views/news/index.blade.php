@extends('layouts/app')
@section('title') Новости @parent  @stop
@section('content')
        
    <div class="container">
            @if(isset($category))
                <h3 class="mt-3 mb-3 ps-2">{{ $category['name'] }}</h3>
            @else
             <h3 class="mt-3 mb-3 ps-2">Новости</h3>
            @endif

            <div class="album py-5 bg-body-tertiary">
                <div class="container">
                  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($news as $element)
                      <div class="col">
                        <div class="card shadow-sm">
                          <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                          <div class="card-body">
                            <h3>{{ $element->title }}</h3>
                            <p class="card-text">{{ $element->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('news.show', ['news' => $element])}}">Читать подробнее...</a>
                              <small class="text-body-secondary">Добавлено: <b>{{ $element->created_at }}</b></small>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </div>
        </div>

@endsection