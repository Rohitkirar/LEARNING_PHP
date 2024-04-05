<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>with blade template engine : Post Page with id {{$id}} and name {{$name}}</h2>

    <h2>with php : Post Page with id <?php echo $id . " and name " . $name ?></h2>
    <h1>People List</h1>
    <ul>  
        @if(count($people))

            @foreach($people as $value)
                <li>{{$value}}</li>
            @endforeach
        
        @else 
            <li>No People Found!</li>
        @endif
    </ul>
</body>
</html>