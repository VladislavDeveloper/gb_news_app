@extends('layouts/adminPanel')
@section('content')
<div class="table-responsive small">
      <div class="d-flex justify-content-between">
        <h3>Источники</h3>
        <a href="{{ route('admin.parse') }}" type="button" class="btn btn-sm btn-outline-secondary me-3">Обновить данные</a>
        <a href="{{ route('admin.resources.create') }}" type="button" class="btn btn-sm btn-outline-secondary me-3">Добавить источник</a>
      </div>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">URL</th>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
          </tr>
        </thead>
        <tbody>
            @foreach($resources as $resource)
                <tr>
                  <td>{{ $resource->id }}</td>
                  <td>{{ $resource->url }}</td>
                  <td>{{ $resource->title }}</td>
                  <td><a href="{{ route('admin.resources.edit', ['resource' => $resource]) }}">Редактировать</a>&nbsp; 
                  <a href="#" onclick="deleteRequest({{ $resource->id }})" style="color:red">Delete</a> </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection


<script>

  async function deleteRequest(id){

    const response = await fetch(`resources/destroy/${id}`, {
      method: 'DELETE',
      headers: { 
          'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content,
      }
    }).catch(e => console.log(e))

    if(response.status == 200){
      location.reload()
    }

  }

</script>