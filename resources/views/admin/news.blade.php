@extends('layouts/admin')
@section('content')
    <div class="table-responsive small">
      <div class="d-flex justify-content-between">
        <h3>Новости</h3>
        <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary me-3">Добавить новость</a>
      </div>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Действия</th>
          </tr>
        </thead>
        <tbody>
            @foreach($newsList as $news)
                <tr>
                  <td>{{ $news->id }}</td>
                  <td>{{ $news->title }}</td>
                  <td>{{ $news->description }}</td>
                  <td>{{ $news->created_at }}</td>
                  <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Редактировать</a>&nbsp; <a href="javascript:;" style="color:red">Delete</a> </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection