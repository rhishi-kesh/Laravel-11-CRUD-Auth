<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="{{ route('editPost', $user->id) }}" method="POST">
            @csrf
            <div>
                <input type="text" name="name" placeholder="Name" value="{{ $user->name }}">
                @error('name')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div>
                <input type="email" name="email" placeholder="Email" value="{{ $user->email }}">
                @error('email')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
