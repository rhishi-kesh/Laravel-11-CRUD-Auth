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
        @auth
            <a href="{{ route('add') }}">Add</a>
            <a href="">Logout</a>
        @endauth
        <a href="">Login</a>
    </div>
    <hr>
    <div>
        <table>
            <thead>
                <tr>
                    <td>SL</td>
                    <td align="center">Name</td>
                    <td align="center">Email</td>
                    <td align="center">Date</td>
                    <td align="center">Action</td>
                </tr>
            </thead>
            <tbody>
                @php
                  $i = 1;
                @endphp
                @forelse($users as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ route('edit', $item->id) }}">Edit</a>
                        <a href="{{ route('delete', $item->id) }}">Delete</a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td>No Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
