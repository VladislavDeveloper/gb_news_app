@extends('layouts/adminPanel')
@section('content')


    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif


    <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" enctype="multipart/form-data" class="col col-md-10">
        @csrf
        @method('put')

        <h3>Редактировать новость</h3>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}" />
            </div>
            <div class="form-group">
                <label for="title">Автор</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ $news->author }}" />
            </div>
            <div class="form-group">
                <label for="title">Категории</label>
                <select class="form-control" multiple name="categories[]" id="categories">
                        @foreach($categories as $category)
                            <option @if(in_array($category->id, $news->categories->pluck('id')->toArray())) selected @endif value="{{ $category->id}}"> {{ $category->name }} </option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" name="image" id="image" class="form-control" />
            </div>

            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{{ $news->description }}</textarea>
            </div>

            <br />
        <button type="submit" class="btn btn-sm btn-outline-secondary">Обновить</button>
    </form>
@endsection