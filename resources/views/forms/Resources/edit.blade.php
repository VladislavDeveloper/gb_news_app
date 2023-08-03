@extends('layouts/adminPanel')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('admin.resources.update', ['resource' => $resource]) }}" enctype="multipart/form-data" class="col col-md-10">
            @csrf
            @method('put')

            <h3>Обновить источник</h3>
            <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">RSS-ссылка: </label>
               <input type="url" name="url" class="form-control" placeholder="RSS - ссылка" value="{{ $resource->url}}">
           </div>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Название</label>
               <input type="title" name="title" class="form-control" placeholder="Название" value="{{ $resource->title}}">
           </div>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Описание</label>
               <input type="description" name="description" class="form-control" placeholder="Описание" value="{{ $resource->description}}">
           </div>
           <button type="submit" class="btn btn-sm btn-outline-secondary">Обновить</button>
    </form>
@endsection