@extends('layouts/admin')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('admin.news.store') }}" class="col col-md-10">
        @csrf
        <h3>Добавление новости</h3>
            @if($errors->has('title'))
                <div class="alert alert-danger">
                    @foreach($errors->get('title') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" name="title" id="title" class="form-control" />
            </div>

            @if($errors->has('author'))
                <div class="alert alert-danger">
                    @foreach($errors->get('author') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-group">
                <label for="title">Автор</label>
                <input type="text" name="author" id="author" class="form-control" />
            </div>

            @if($errors->has('categories'))
                <div class="alert alert-danger">
                    @foreach($errors->get('categories') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-group">
                <label for="title">Категории</label>
                <select class="form-control" multiple name="categories[]" id="categories">
                    @if(isset($categories))
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        @else
                        <option>Нет категорий</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" name="image" id="image" class="form-control" />
            </div>

            @if($errors->has('status'))
                <div class="alert alert-danger">
                    @foreach($errors->get('status') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>

            @if($errors->has('description'))
                <div class="alert alert-danger">
                    @foreach($errors->get('description') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>

            <br />
        <button type="submit" class="btn btn-sm btn-outline-secondary">Добавить</button>
    </form>
@endsection