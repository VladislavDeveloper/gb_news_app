@extends('layouts/adminPanel')
@section('content')
<div class="table-responsive small">
      <div class="d-flex justify-content-between">
        <h3>Категории</h3>
        <a href="{{ route('admin.category.create') }}" type="button" class="btn btn-sm btn-outline-secondary me-3">Добавить категорию</a>
      </div>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Название</th>
            <th scope="col">Действия</th>
          </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td>
                  <td><a href="{{ route('admin.category.edit', ['category' => $category]) }}">Редактировать</a>&nbsp; 
                  <a href="#" onclick="deleteRequest({{ $category->id }})" style="color:red">Delete</a> </td>
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
@endsection


<script>

  async function deleteRequest(id){

    const response = await fetch(`category/destroy/${id}`, {
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