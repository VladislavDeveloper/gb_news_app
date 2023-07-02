<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BreakingNews Admin</title>
</head>
<body>
    <div class="container">
        <header class="border-bottom lh-1 py-3">
          <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
              <a class="link-secondary" href="#">Санкт-Петербург, Россия</a>
            </div>
            <div class="col-4 text-center">
              <a class="blog-header-logo text-body-emphasis text-decoration-none" href="{{ route('admin.home') }}">BreakingNews</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <div class="btn-group">
                    <button class="btn btn-secondary btn-sm dropdown-toggle d-flex flex-row align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <label>Администратор </label> 
                        <ion-icon class="ms-3" name="person-circle-outline" size="large"></ion-icon> 
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link-menu" href="#">Мой профиль</a></li>
                        <li><a class="nav-link-menu" href="#">Выйти</a></li>
                    </ul>
                  </div>
                
            </div>
          </div>
        </header>
    </div>

    <main>
        <div class="container">
            <h3>Панель администратора</h3>
            <div class="admin-dashbord row row-cols-2 d-flex justify-content-around">
                 <nav class="nav flex-column col col-md-2">
                    <a class="nav-link active" href="{{ route('admin.home') }}">Главная</a>
                    <a class="nav-link active" aria-current="page" href="{{ route('admin.category.index') }}">Категории</a>
                    <a class="nav-link" href="{{ route('admin.news.index') }}">Новости</a>
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">Выгрузка</a>
                </nav>
                <section class="col col-md-10">
                    <x-alert :type="request()->get('type', 'success')" message="Some message"></x-alert>
                    @yield('content')
                </section>
            </div>   
    </main>

    <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <p class="mb-0">
          <a href="#">Back to top</a>
        </p>
    </footer>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>