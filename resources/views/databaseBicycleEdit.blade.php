@extends('layouts.app')

@section('content')

    <h1>Edit Bicycle</h1>

    <form method="POST" action={{"/database/bicycles/edit/" . $bicycle->id }} enctype="multipart/form-data">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        Name: <br>
        <input type="text" name="name" value={{$bicycle->name}}><br>
        Price: <br>
        <input type="text" name="price" value={{$bicycle->price}}><br>
        Bike type: <br>
        <input type="radio" name="bikeType" value="hybrid"
        <?php if ($bicycle['bikeType'] == 'hybrid'){ echo 'checked'; } ?>>Hybrid<br>
        <input type="radio" name="bikeType" value="mountain"
        <?php if ($bicycle['bikeType'] == 'mountain'){ echo 'checked'; } ?>>Mountain<br>
        Year: <br>
        <input type="text" name="year" value={{$bicycle->year}}><br>
        Manufacturer: <br>
        <input type="text" name="manufacturer" value={{$bicycle->manufacturer}}><br>
        Is it available? <br>
        <input type="radio" name="isAvailable" value="1"
        <?php if ($bicycle['isAvailable']){ echo 'checked'; } ?>>Yes<br>
        <input type="radio" name="isAvailable" value="0"
        <?php if (!$bicycle['isAvailable']){ echo 'checked'; } ?>>No<br>
        Description: <br>
        <textarea rows="4" cols="50" name="description" value={{$bicycle->description}}>{{$bicycle->description}}
        </textarea><br>
        <br>
        Original Image: <br>
        <img src="{{'/images/' . $bicycle['pictureFileName']}}">
        <br>
        <br>
        New Image (optional):
        <input type="file" name="pictureFileName" class="form-control">
        <br>
        <input type="submit" value="submit">
    </form>


@endsection