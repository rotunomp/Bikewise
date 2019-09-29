@extends('layouts.app')

@section('content')

    <h1>Edit Rental</h1>

    <form method="POST" action={{"/database/rentals/edit/" . $rental->id }} enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        Bike ID: <br>
        <input type="text" name="bikeId" value={{$rental->bikeId}}><br>
        <br>
        Accessory Package ID: <br>
        <input type="text" name="accessoryListId" value={{$rental->accessoryListId}}><br>
        <br>
        Person ID: <br>
        <input type="text" name="personId" value={{$rental->personId}}><br>
        <br>
        Price: <br>
        <input type="text" name="price" value={{$rental->price}}><br>
        <br>
        Delivered?: <br>
        <input type="radio" name="isDelivered" value="1"
        <?php if ($rental['isDelivered']){ echo 'checked'; } ?>>Yes<br>
        <input type="radio" name="isDelivered" value="0"
        <?php if (!$rental['isDelivered']){ echo 'checked'; } ?>>No<br>
        <br>
        Returned?: <br>
        <input type="radio" name="isReturned" value="1"
        <?php if ($rental['isReturned']){ echo 'checked'; } ?>>Yes<br>
        <input type="radio" name="isReturned" value="0"
        <?php if (!$rental['isReturned']){ echo 'checked'; } ?>>No<br>
        <br>
        Paid?: <br>
        <input type="radio" name="isPaid" value="1"
        <?php if ($rental['isPaid']){ echo 'checked'; } ?>>Yes<br>
        <input type="radio" name="isPaid" value="0"
        <?php if (!$rental['isPaid']){ echo 'checked'; } ?>>No<br>
        <br>


        <input type="submit" value="submit">
    </form>


@endsection