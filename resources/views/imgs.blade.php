<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>imgs</title>
</head>
<body>
    <div>
        
        {{-- @dd($album['name']) --}}
        
        {{-- <h1>Album Name: {{$albums->name}}</h1> --}}
        @foreach ($data as  $item )
        {{-- @dd($data) --}}
        @foreach ($item as $value )      
        <h1>{{$value['id']}}</h1>
        <h3>{{$value['name']}}</h3>
        <h3>{{$value['size']}}</h3>
        <img src="{{$value['url']}}" width="250" height="250" alt="">
        @endforeach
          
          {{-- <h1>{{}}</h1> --}}
          @endforeach
        
  
    </div>
</body>
</html>