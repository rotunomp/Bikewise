@extends('layouts.app')
@extends('layouts.table')

@section('content')

    <h1>Accessories. Cannot delete an accessory if it exists in a package</h1>

<table class="pure-table pure-table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Available</th>
        <th>Location on Bike</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    @foreach($accessories as $accessory)
        <tr>
            <td>{{$accessory->id}}</td>
            <td>{{$accessory->name}}</td>
            <td>{{$accessory->price}}</td>
            <td>{{$accessory->isAvailable ? 'yes' : 'no'}}</td>
            <td>{{$accessory->locationOnBike}}</td>
            <td>
                <form method="POST" action={{"/database/accessories/" . $accessory->id}}>
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');">

                </form>
            </td>
            <td>
                <form action={{"/database/accessories/edit/" . $accessory->id}}>
                    <input type="submit" value="Edit">
                </form>
            </td>
        </tr>
    @endforeach
</table>

<h2>Add a new Accessory</h2>
<form method="POST" href="/database/accessories">
    {{ csrf_field() }}
    Name: <br>
    <input type="text" name="name" required><br>
    Price: <br>
    <input type="text" name="price" required><br>
    Is it available? <br>
    <input type="radio" name="isAvailable" value="1">Yes<br>
    <input type="radio" name="isAvailable" value="0">No<br>
    Location on Bike: <br>
    <input type="radio" name="locationOnBike" value="light">Light<br>
    <input type="radio" name="locationOnBike" value="back">Back<br>
    <input type="radio" name="locationOnBike" value="front">Front<br>
    <input type="radio" name="locationOnBike" value="lock">Lock<br>
    <input type="radio" name="locationOnBike" value="other">Other<br>
    <br>
    <input type="submit" value="submit">
</form>

    @endsection
