@extends('layouts/admin')
@section('content')
    <form method="post" action="{{ route('admin.category.update', ['category' => $category]) }}" enctype="multipart/form-data" class="col col-md-10">
            @csrf
            @method('put')

            <h3>Редактировать категорию</h3>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Название</label>
               <input type="text" name="name" class="form-control" placeholder="Название" value="{{ $category->name}}">
           </div>
           <button type="submit" class="btn btn-sm btn-outline-secondary">Добавить</button>
    </form>
@endsection