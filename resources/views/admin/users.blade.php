@extends('layouts/adminPanel')
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
            <th scope="col">Email-адрес</th>
            <th scope="col">Имя пользователя</th>
            <th scope="col">Админ</th>
            <th scope="col">Действия</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->isAdmin ? 'Да' : 'Нет' }}</td>
                  <td><a href="{{ route('admin.users.edit', ['user' => $user]) }}">Редактировать</a>&nbsp; <a href="javascript:;" style="color:red">Delete</a> </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection