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
            <th scope="col">Категория</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Действия</th>
          </tr>
        </thead>
        <tbody>
            @foreach($newsList as $news)
                <tr>
                  <td>{{ $news['id'] }}</td>
                  <td>{{ $news['title'] }}</td>
                  <td>{{ $news['description'] }}</td>
                  <td>{{ $news['category_id'] }}</td>
                  <td>{{ $news['created_at'] }}</td>
                  <td>
                    <div class="btn-group me-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Редактировать</button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">Удалить</button>
                    </div>
                  </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection