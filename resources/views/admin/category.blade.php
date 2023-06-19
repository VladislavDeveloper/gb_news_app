@extends('layouts/admin')
@section('content')
<div class="table-responsive small">
      <div class="d-flex justify-content-between">
        <h3>Категории</h3>
        <a href="{{ route('admin.category.create') }}" type="button" class="btn btn-sm btn-outline-secondary me-3">Добавить категорию</a>
      </div>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
          </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
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