@extends('layouts/admin')
@section('content')
<div class="table-responsive small">
      <div class="d-flex justify-content-between">
        <h3>Заказы</h3>
        <a href="{{ route('admin.orders.create') }}" type="button" class="btn btn-sm btn-outline-secondary me-3">Создать заказ</a>
      </div>
      @if(isset($orders))
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Заказчик</th>
              <th scope="col">Действия</th>
            </tr>
          </thead>
          <tbody>
              @foreach($orders as $order)
                  <tr>
                    <td>{{ $order['id'] }}</td>
                    <td>{{ $order['name'] }}</td>
                    <td>
                      <div class="btn-group me-2">
                          <button type="button" class="btn btn-sm btn-outline-secondary">Редактировать</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Удалить</button>
                      </div>
                    </td>
                  </tr>
              @endforeach
              @else
              <h4>Нет созданных заказов</h4>
          </tbody>
        </table>
      @endif
    </div>
@endsection