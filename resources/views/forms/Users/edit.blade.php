@extends('layouts/adminPanel')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif

    
    <form method="post" action="{{ route('admin.users.update', ['user' => $user] ) }}" class="col col-md-10">
            @csrf
            @method('put')

            <h3>Пользователь</h3>
            <div>
                <label>Имя: {{ $user->name }}</label> 
            </div>
           
            <div>
                <label>Email-адрес: {{ $user->email }}</label>
            </div>

            <div>
                <label>Роль: </label>
                <select name="roles" class="form-control" id="roles">
                            <option value="user">Пользователь</option>
                            <option value="admin">Администратор</option>
                </select>
            </div>
           <button type="submit" class="btn btn-sm btn-outline-secondary">Изменить</button>
    </form>
@endsection