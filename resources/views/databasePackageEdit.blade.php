@extends('layouts.app')

@section('content')

    <h1>Edit Package</h1>

    <form method="POST" action={{"/database/packages/edit/" . $package->id }}>
        {{ csrf_field() }}
        {{method_field('PATCH')}}

        Name: <br>
        <input type="text" name="name" value={{$package->name}}><br>
        Price: <br>
        <input type="text" name="price" value={{$package->price}}><br>
        Description: <br>
        <textarea rows="4" cols="50" name="description" value={{$package->description}}>{{$package->description}}
        </textarea><br>

        <h2>Lights</h2>
        @foreach($lights as $light)
            <input type="radio" name="accessoryLight"
                   value={{$light->id}} <?php if ($package['accessoryLight'] == $light->id) {
                echo 'checked';
            } ?>>{{$light->name}}<br>
        @endforeach

        <h2>Back Accessories</h2>
        @foreach($backs as $back)
            <input type="radio" name="accessoryBack"
                   value={{$back->id}} <?php if ($package['accessoryBack'] == $back->id) {
                echo 'checked';
            } ?>>{{$back->name}}<br>
        @endforeach

        <h2>Kickstands</h2>
        @foreach($kickstands as $kickstand)
            <input type="radio" name="accessoryKickstand"
                   value={{$kickstand->id}} <?php if ($package['accessoryKickstand'] == $kickstand->id) {
                echo 'checked';
            } ?>>{{$kickstand->name}}<br>
        @endforeach

        <h2>Locks</h2>
        @foreach($locks as $lock)
            <input type="radio" name="accessoryLock"
                   value={{$lock->id}} <?php if ($package['accessoryLock'] == $lock->id) {
                echo 'checked';
            } ?>>{{$lock->name}}<br>
        @endforeach

        <h2>Additional Accessories</h2>
        @foreach($otherAccessories as $otherAccessory)
            <input type="checkbox" name="accessoryOthers[]" value={{$otherAccessory->id}}

            <?php foreach ($packageAccessories as $packageAccessory) {
                if ($packageAccessory == $otherAccessory->id) {
                    echo 'checked';
                }
            }
                ?>>

            {{$otherAccessory->name}}
            <br>
        @endforeach

        <input type="hidden" name="isShopPackage" value={{$package->isShopPackage}}>

        <input type="submit" value="submit">

    </form>


@endsection