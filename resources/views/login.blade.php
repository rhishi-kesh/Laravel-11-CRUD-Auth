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
        @error('error')
            <div style="color: red">{{ ($message) }}</div>
        @enderror
        <form action="{{ route('loginPost') }}" method="POST">
            @csrf
            <div>
                <input type="email" name="email" placeholder="Email">
                @error('email')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div>
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <div style="color: red">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
