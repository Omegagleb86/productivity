<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task Create</title>
        <style> .is_invalid{color: red;} </style>
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <h2>Добавление товара</h2>
        <form method="post" action={{url('task')}}>
        @csrf
        <label>Наименование</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name')
        <div class="is_invalid">
            {{$message}}
        </div>
        @enderror
        <br>
        <label>Категория</label>
        <select name="category_id" value={{old('category_id')}}>
                <option style="display: none"></option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif>{{$category->name}}
                </option>
            @endforeach
        </select>
        @error('category_id')
        <div class="is_invalid">
            {{$message}}
        </div>
        @enderror
        <br>
        <label>Статус</label>
            <select name="status" value={{ old('status') }}>
                <option style="display: none"></option>
                @foreach ([0 => "Не начато", 1 => "В процессе", 2 => "Сделанно"] as $status_value => $status_name)
                    <option value="{{ $status_value }}" @if (old('status') == $status_value) selected @endif> {{$status_name}}
                    </option>
                @endforeach
            </select>
        @error('status')
        <div class="is_invalid">
            {{$message}}
        </div>
        @enderror
        <br>
        <label>Сложность</label>
            <select name="score_points" value={{ old('score_points') }}>
                <option style="display: none"></option>
                @foreach ([1, 2, 3, 5, 8, 13, 21] as $point)
                    <option value="{{$point}}" @if(old('score_points') == $point) selected @endif> {{$point}}
                    </option>
                @endforeach
            </select>
        @error('score_points')
        <div class="is_invalid">
            {{$message}}
        </div>
        @enderror
        <br>
        <label>Важность</label>
        <input type="checkbox" name="importance" value="1">
        @error('importance')
        <div class="is_invalid">
            {{$message}}
        </div>
        @enderror
        <br>
        <label>Срочность</label>
        <input type="checkbox" name="urgency" value="1">
        @error('urgency')
        <div class="is_invalid">
            {{$message}}
        </div>
        @enderror
        <br>
        <label>Дата начала</label>
        <input type="date" name="date_start" value="{{ old('date_start') }}">
        @error('date_start')
        <div class="is_invalid">
            {{$message}}
        </div>
        @enderror
        <br>
        <label>Дедлайн</label>
        <input type="date" name="date_end" value="{{ old('date_end') }}">
        @error('date_end')
        <div class="is_invalid">
            {{$message}}
        </div>
        @enderror
        <input type="submit">
        </form>
    </body>
</html>
