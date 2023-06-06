<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории</title>
</head>
<body>
    <h2>Категории</h2>

    @foreach ($categories as $element)

        <div>
            <hr>
            <h3>{{$element['name']}}</h3>
            <a href="/news/category/{{$element['id']}}">Открыть</a>
            <hr>
        </div>
        
    @endforeach
    
</body>
</html>