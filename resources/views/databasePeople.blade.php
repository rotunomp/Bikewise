@extends('layouts.app')
@extends('layouts.table')

@section('content')

    <h1>People</h1>

<table class="pure-table pure-table-bordered">
    <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Home Phone</th>
        <th>Home Street Address</th>
        <th>Home City</th>
        <th>Home State</th>
        <th>Home Zip Code</th>
        <th>Driver's License</th>
        <th>State of License</th>
        <th>Local Address</th>
        <th>Cell Phone</th>
        <th>Email</th>
        <th>Height in Inches</th>
        <th>Inseam</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    @foreach($people as $person)
        <tr>
            <td>{{$person->id}}</td>
            <td>{{$person->lastName}}</td>
            <td>{{$person->firstName}}</td>
            <td>{{$person->homePhone}}</td>
            <td>{{$person->homeStreetAddress}}</td>
            <td>{{$person->homeCity}}</td>
            <td>{{$person->homeState}}</td>
            <td>{{$person->homeZipCode}}</td>
            <td>{{$person->driversLicenseNumber}}</td>
            <td>{{$person->stateOfDriversLicense}}</td>
            <td>{{$person->localAddress}}</td>
            <td>{{$person->cellPhone}}</td>
            <td>{{$person->email}}</td>
            <td>{{$person->heightInches}}</td>
            <td>{{$person->inseam}}</td>
            <td>
                <form method="POST" action={{"/database/people/" . $person->id}}>
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');">

                </form>
            </td>
            <td>
                <form action={{"/database/people/edit/" . $person->id}}>
                    <input type="submit" value="Edit">
                </form>
            </td>
        </tr>
    @endforeach
</table>

<h2>Add a new Person</h2>
<form method="POST" href="/database/people">
    {{ csrf_field() }}

    Last Name: <br>
    <input type="text" name="lastName"><br>
    First Name: <br>
    <input type="text" name="firstName"><br>
    Home Phone: <br>
    <input type="text" name="homePhone"><br>
    Home Street Address: <br>
    <input type="text" name="homeStreetAddress"><br>
    Home City: <br>
    <input type="text" name="homeCity"><br>
    Home State: <br>
    <input type="text" name="homeState"><br>
    Home Zip Code: <br>
    <input type="text" name="homeZipCode"><br>
    Driver's License Number: <br>
    <input type="text" name="driversLicenseNumber"><br>
    State of Driver's License: <br>
    <input type="text" name="stateOfDriversLicense"><br>
    Local Address: <br>
    <input type="text" name="localAddress"><br>
    Cell Phone: <br>
    <input type="text" name="cellPhone"><br>
    Email: <br>
    <input type="text" name="email"><br>
    Height in Inches: <br>
    <input type="text" name="heightInches"><br>
    Inseam: <br>
    <input type="text" name="inseam"><br>

    <input type="submit" value="submit">
</form>

@endsection