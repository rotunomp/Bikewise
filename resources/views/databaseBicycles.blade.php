@extends('layouts.app')
@extends('layouts.table')

@section('content')

    <h1>Bicycles</h1>
    <table class="pure-table pure-table-bordered">
        <tbody>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Type</th>
            <th>Year</th>
            <th>Manufacturer</th>
            <th>Available?</th>
            <th>Description</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <tbody>
        @foreach($bicycles as $bicycle)
            <tr>
                <td>{{$bicycle->id}}</td>
                <td>{{$bicycle->name}}</td>
                <td>{{$bicycle->price}}</td>
                <td>{{$bicycle->bikeType}}</td>
                <td>{{$bicycle->year}}</td>
                <td>{{$bicycle->manufacturer}}</td>
                <td>{{$bicycle->isAvailable ? 'yes' : 'no'}}</td>
                <td>{{$bicycle->description}}</td>
                <td>
                    <form method="POST" action={{"/database/bicycles/" . $bicycle->id}}>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <input type="submit" value="Delete"
                               onclick="return confirm('Are you sure you want to delete this item?');">

                    </form>
                </td>
                <td>
                    <form action={{"/database/bicycles/edit/" . $bicycle->id}}>
                        <input type="submit" value="Edit">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Add a new Bike</h2>

    <form method="POST" action="/database/bicycles" enctype="multipart/form-data">
        {{ csrf_field() }}
        Name: <br>
        <input type="text" name="name" required><br>
        Price: <br>
        <input type="text" name="price" required><br>
        Bike type: <br>
        <input type="radio" name="bikeType" value="hybrid">Hybrid<br>
        <input type="radio" name="bikeType" value="mountain">Mountain<br>
        Year: <br>
        <input type="text" name="year"><br>
        Manufacturer: <br>
        <input type="text" name="manufacturer"><br>
        Is it available? <br>
        <input type="radio" name="isAvailable" value="1">Yes<br>
        <input type="radio" name="isAvailable" value="0">No<br>
        Description: <br>
        <textarea rows="4" cols="50" name="description">
        </textarea><br>
        Image <br>
        <input type="file" name="pictureFileName" class="form-control">
        <br>
        <input type="submit" value="submit">
    </form>

@endsection
