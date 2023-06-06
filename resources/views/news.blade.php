<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новости</title>
</head>
<body>
    <h2>Новости</h2>

    @if(isset($category))
        <h3>{{ $category['name'] }}</h3>
    @endif

    @foreach ($news as $element)

    <div>
        <hr>
        <h3>{{$element['title']}}</h3>
        <p>Опубликовано: {{$element['created_at']}} Пользователем: {{$element['author']}}</p>
        <a href="/news/{{$element['id']}}">Открыть</a>
        <hr>
    </div>
        
    @endforeach
    
</body>
</html>