<!DOCTYPE html>
<html lang="en">
@foreach ($news as $element)
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $element['title']}}</title>
    </head>
    <body>
        <div>
            <hr>
                <h2>{{ $element['title']}}</h2>
                <h4>Опубликовано: {{$element['created_at']}}</h4>
                <p>{{$element['description']}}</p>
                <h3>Автор: {{$element['author']}}</h3>
                <a href="/news">Назад</a>
            <hr>
        </div>
        
    </body>
@endforeach
</html>