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
                <td>category_id</td>
                <td>name</td>
                <td>status</td>
                <td>score_points</td>
                <td>importance</td>
                <td>urgency</td>
                <td>date_start</td>
                <td>date_end</td>
                <td>parent_id</td>
                <td>completed_at</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->category_id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->score_points }}</td>
                    <td>{{ $task->importance }}</td>
                    <td>{{ $task->urgency }}</td>
                    <td>{{ $task->date_start }}</td>
                    <td>{{ $task->date_end }}</td>
                    <td>{{ $task->parent_id }}</td>
                    <td>{{ $task->compleated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </body>
</html>
