@extends('layouts/admin')
@section('content')
    <form action="" class="col col-md-10">
            <h3>Добавление новости</h3>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Название</label>
               <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Название">
           </div>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Категория</label>
               <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Категория">
           </div>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Статус</label>
               <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Статус">
           </div>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Изображение</label>
               <input type="file" >
           </div>
           <div class="mb-3">
               <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
               <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
           </div>
    </form>
@endsection