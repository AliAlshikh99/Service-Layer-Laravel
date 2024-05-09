<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Album</title>
</head>

<body>
    <h1>Create Album</h1>
    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">

        <label for="">Name:</label>
        <input type="text" name="name">
        <select name="user_id[]" id="" multiple>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach

        </select>
        <input type="file" name="photos[]" multiple>

        <button type="submit">Send</button>
    </form>

    <div>
        {{-- @forelse ( $albums as $item )
        
    <h1>{{$item->name}}</h1>
        <img src="{{$item->original_url}}" alt="" width="250" height="250" srcset="">
    @empty
        <h1>no found</h1>
    @endforelse --}}
        {{-- @dd($item) --}}

    </div>
</body>

</html>
