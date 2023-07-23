@extends('layouts/app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Account') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>Профиль</h3>
                    @if(Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" alt="" width="100px">
                    @endif
                    <h3>Привет, {{ Auth::user()->name }}</h3>
                    <br>
                    @if(Auth::user()->isAdmin)
                    <p><a href="{{ route('admin.home') }}">Панель администратора</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection