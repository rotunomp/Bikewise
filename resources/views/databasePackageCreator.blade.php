@extends('layouts.app')

@section('content')

    <h1>Create New Package</h1>
    <form method="POST" action="/database/packageCreator">
        {{ csrf_field() }}

        Name: <br>
        <input type="text" name="name" required><br>
        Price: <br>
        <input type="text" name="price" required><br>
        Description: <br>
        <textarea rows="4" cols="50" name="description">
        </textarea><br>


        <h2>Lights</h2>
        @foreach($lights as $light)
            <input type="radio" name="accessoryLight" value={{$light->id}}>{{$light->name}}<br>
        @endforeach

        <h2>Back Accessories</h2>
        @foreach($backs as $back)
            <input type="radio" name="accessoryBack" value={{$back->id}}>{{$back->name}}<br>
        @endforeach

        <h2>Kickstands</h2>
        @foreach($kickstands as $kickstand)
            <input type="radio" name="accessoryKickstand" value={{$kickstand->id}}>{{$kickstand->name}}<br>
        @endforeach

        <h2>Locks</h2>
        @foreach($locks as $lock)
            <input type="radio" name="accessoryLock" value={{$lock->id}}>{{$lock->name}}<br>
        @endforeach

        <h2>Additional Accessories</h2>
        @foreach($otherAccessories as $otherAccessory)
            <input type="checkbox" name="accessoryOthers[]" value={{$otherAccessory->id}}>{{$otherAccessory->name}}
            <br>
        @endforeach

        <input type="hidden" name="isShopPackage" value="1">

        <input type="submit" value="submit">
    </form>



@endsection