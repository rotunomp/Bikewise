@extends('layouts.app')
@extends('layouts.table')
@section('content')

    <h1>Packages</h1>

    <table class="pure-table pure-table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Light</th>
            <th>Kickstand</th>
            <th>Lock</th>
            <th>Back Accessory</th>
            <th>Accessory 5</th>
            <th>Accessory 6</th>
            <th>Accessory 7</th>
            <th>Accessory 8</th>
            <th>Accessory 9</th>
            <th>Accessory 10</th>
            <th>Accessory 11</th>
            <th>Accessory 12</th>
            <th>Accessory 13</th>
            <th>Accessory 14</th>
            <th>Accessory 15</th>
            <th>Shop Package?</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        @foreach($packages as $package)
            <tr>
                <td>{{$package->id}}</td>
                <td>{{$package->name}}</td>
                <td>{{$package->price}}</td>
                <td>{!! $package->description !!}</td>
                <td>{{$package->accessoryLight ? $keyedAccessories[$package->accessoryLight] : 'None'}}</td>

                <td>{{$package->accessoryKickstand ? $keyedAccessories[$package->accessoryKickstand] : 'None'}}</td>

                <td>{{$package->accessoryLock ? $keyedAccessories[$package->accessoryLock] : 'None'}}</td>

                <td>{{$package->accessoryBack ? $keyedAccessories[$package->accessoryBack] : 'None'}}</td>

                <td>{{$package->accessory5 ? $keyedAccessories[$package->accessory5] : 'None'}}</td>

                <td>{{$package->accessory6 ? $keyedAccessories[$package->accessory6] : 'None'}}</td>

                <td>{{$package->accessory7 ? $keyedAccessories[$package->accessory7] : 'None'}}</td>

                <td>{{$package->accessory8 ? $keyedAccessories[$package->accessory8] : 'None'}}</td>

                <td>{{$package->accessory9 ? $keyedAccessories[$package->accessory9] : 'None'}}</td>

                <td>{{$package->accessory10 ? $keyedAccessories[$package->accessory10] : 'None'}}</td>

                <td>{{$package->accessory11 ? $keyedAccessories[$package->accessory11] : 'None'}}</td>

                <td>{{$package->accessory12 ? $keyedAccessories[$package->accessory12] : 'None'}}</td>

                <td>{{$package->accessory13 ? $keyedAccessories[$package->accessory13] : 'None'}}</td>

                <td>{{$package->accessory14 ? $keyedAccessories[$package->accessory14] : 'None'}}</td>

                <td>{{$package->accessory15 ? $keyedAccessories[$package->accessory15] : 'None'}}</td>

                <td>{{$package->isShopPackage ? 'yes' : 'no'}}</td>
                <td>
                    <form method="POST" action={{"/database/packages/" . $package->id}}>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <input type="submit" value="Delete"
                               onclick="return confirm('Are you sure you want to delete this item?');">

                    </form>
                </td>
                <td>
                    <form action={{"/database/packages/edit/" . $package->id}}>
                        <input type="submit" value="Edit">
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
    </br>
    <form action="/database/packageCreator">
        <input type="submit" value="Package Creator"/>
    </form>

@endsection
