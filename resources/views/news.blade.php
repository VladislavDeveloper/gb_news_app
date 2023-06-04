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

    @foreach ($news as $element)
        <p><b>{{$element['title']}}</b></p>
    @endforeach
    
</body>
</html>