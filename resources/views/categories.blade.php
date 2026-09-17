<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Categories</title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <table border="1">
        <thead>
            <tr>
                <td>id</td>
                <td>user_id</td>
                <td>name</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->user_id }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </body>
</html>
