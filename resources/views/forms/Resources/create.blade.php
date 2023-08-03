@extends('layouts/adminPanel')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif
    
    <form method="post" action="{{ route('admin.resources.store') }}" class="col col-md-10">
            @csrf
            <h3>Добавить новый источник</h3>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">RSS-ссылка: </label>
               <input type="url" name="url" class="form-control" placeholder="RSS - ссылка">
           </div>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Название</label>
               <input type="title" name="title" class="form-control" placeholder="Название">
           </div>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Описание</label>
               <input type="description" name="description" class="form-control" placeholder="Описание">
           </div>
           <button type="submit" class="btn btn-sm btn-outline-secondary">Добавить</button>
    </form>
@endsection