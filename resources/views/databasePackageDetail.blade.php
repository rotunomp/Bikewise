@extends('layouts.app')
@extends('layouts.table')

@section('content')

    <h1>{{$package->name}}</h1>
    <h3><strong>ID:</strong> {{$package->id}}</h3>
    <h3><strong>Price:</strong> {{$package->price}}</h3>
    <h3><strong>Created:</strong> {{$package->created_at}}</h3>
    <h3><strong>Shop Package?:</strong> {{$package->isShopPackage ? 'yes' : 'no'}}</h3>
    </br>
    <h4><strong>Light:</strong> {{$package->accessoryLight ? $keyedAccessories[$package->accessoryLight] : 'None'}}</h4>
    <h4>
        <strong>Kickstand:</strong> {{$package->accessoryKickstand ? $keyedAccessories[$package->accessoryKickstand] : 'None'}}
    </h4>
    <h4><strong>Lock:</strong> {{$package->accessoryLock ? $keyedAccessories[$package->accessoryLock] : 'None'}}</h4>
    <h4><strong>Back:</strong> {{$package->accessoryBack ? $keyedAccessories[$package->accessoryBack] : 'None'}}</h4>
    <h4><strong>Accessory 5:</strong> {{$package->accessory5 ? $keyedAccessories[$package->accessory5] : 'None'}}</h4>
    <h4><strong>Accessory 6:</strong> {{$package->accessory6 ? $keyedAccessories[$package->accessory6] : 'None'}}</h4>
    <h4><strong>Accessory 7:</strong> {{$package->accessory7 ? $keyedAccessories[$package->accessory7] : 'None'}}</h4>
    <h4><strong>Accessory 8:</strong> {{$package->accessory8 ? $keyedAccessories[$package->accessory8] : 'None'}}</h4>
    <h4><strong>Accessory 9:</strong> {{$package->accessory9 ? $keyedAccessories[$package->accessory9] : 'None'}}</h4>
    <h4><strong>Accessory 10:</strong> {{$package->accessory10 ? $keyedAccessories[$package->accessory10] : 'None'}}
    </h4>
    <h4><strong>Accessory 11:</strong> {{$package->accessory11 ? $keyedAccessories[$package->accessory11] : 'None'}}
    </h4>
    <h4><strong>Accessory 12:</strong> {{$package->accessory12 ? $keyedAccessories[$package->accessory12] : 'None'}}
    </h4>
    <h4><strong>Accessory 13:</strong> {{$package->accessory13 ? $keyedAccessories[$package->accessory13] : 'None'}}
    </h4>
    <h4><strong>Accessory 14:</strong> {{$package->accessory14 ? $keyedAccessories[$package->accessory14] : 'None'}}
    </h4>
    <h4><strong>Accessory 15:</strong> {{$package->accessory15 ? $keyedAccessories[$package->accessory15] : 'None'}}
    </h4>
    </br>
    <form action={{"/database/packages/edit/" . $package->id}}>
        <input type="submit" value="Edit">
    </form>



@endsection
