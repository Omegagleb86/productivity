<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Categories</title>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    @if ($category)
        <table border="1">
            <thead>
                <tr>
                    <td>id</td>
                    <td>user_id</td>
                    <td>name</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->user_id }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
            </tbody>
            </table>
    @else
        <h2>Такого id нету</h2>
    @endif
    </body>
</html>
