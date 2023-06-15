@extends('layouts/admin')
@section('content')
    <form method="post" action="{{ route('admin.category.store') }}" class="col col-md-10">
            @csrf
            <h3>Добавление категории</h3>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Название</label>
               <input type="text" name="name" class="form-control" placeholder="Название">
           </div>
           <button type="submit" class="btn btn-sm btn-outline-secondary">Добавить</button>
    </form>
@endsection