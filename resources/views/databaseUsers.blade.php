@extends('layouts.app')
@extends('layouts.table')

@section('content')

    <h1>Database Users</h1>

    <table class="pure-table pure-table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><button>Delete</button></td>
            </tr>
        @endforeach
    </table>

    <h2>Add a new User</h2>
    <form method="POST" href="/database/users">
        {{ csrf_field() }}
        Name: <br>
        <input type="text" name="name"><br>
        Email: <br>
        <input type="text" name="email"><br>
        Password: <br>
        <input type="text" name="password"><br>
        <input type="submit" value="submit">
    </form>

@endsection
