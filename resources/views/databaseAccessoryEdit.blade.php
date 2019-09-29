@extends('layouts.app')

@section('content')

    <h1>Edit Accessory</h1>

    <form method="POST" action={{"/database/accessories/edit/" . $accessory->id}}>
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        Name: <br>
        <input type="text" name="name" value={{$accessory->name}}><br>
        Price: <br>
        <input type="text" name="price" value={{$accessory->price}}><br>
        Is it available? <br>
        <input type="radio" name="isAvailable" value="1" <?php if ($accessory['isAvailable'] == '1'){ echo 'checked'; } ?>>Yes<br>
        <input type="radio" name="isAvailable" value="0" <?php if ($accessory['isAvailable'] == '0'){ echo 'checked'; } ?>>No<br>
        Location on Bike: <br>
        <input type="text" name="locationOnBike" value={{$accessory->locationOnBike}}><br>
        <input type="submit" value="submit">
    </form>


@endsection