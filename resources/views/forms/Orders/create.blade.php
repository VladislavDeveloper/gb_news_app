@extends('layouts/admin')
@section('content')

    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error" ></x-alert>
        @endforeach
    @endif
    
    <form method="post" action="{{ route('admin.orders.store') }}" class="col col-md-10">
            @csrf
            <h3>Запрос на получение данных</h3>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Имя заказчика</label>
               <input type="text" name="customer" class="form-control" placeholder="Имя заказчика">
           </div>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Номер телефона</label>
               <input type="phone" name="phone" class="form-control" placeholder="Номер телефона">
           </div>
           <div class="mb-3">
               <label for="exampleFormControlInput1" class="form-label">Email</label>
               <input type="email" name="email" class="form-control" placeholder="Email">
           </div>
           <div class="mb-3">
           <label for="description">Запрос на получение данных</label>
                <textarea class="form-control" name="order" id="order"></textarea>
           </div>
           <button type="submit" class="btn btn-sm btn-outline-secondary">Отправить</button>
    </form>
@endsection