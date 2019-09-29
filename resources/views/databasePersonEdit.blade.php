@extends('layouts.app')

@section('content')

    <h1>Edit Person</h1>

    <form method="POST" action={{"/database/people/edit/" . $person->id}}>
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        Last Name: <br>
        <input type="text" name="lastName" value={{$person->lastName}}><br>
        First Name: <br>
        <input type="text" name="firstName" value={{$person->firstName}}><br>
        Home Phone: <br>
        <input type="text" name="homePhone" value={{$person->homePhone}}><br>
        Home Street Address: <br>
        <input type="text" name="homeStreetAddress" value={{$person->homeStreetAddress}}><br>
        Home City: <br>
        <input type="text" name="homeCity" value={{$person->homeCity}}><br>
        Home State: <br>
        <input type="text" name="homeState" value={{$person->homeState}}><br>
        Home Zip Code: <br>
        <input type="text" name="homeZipCode" value={{$person->homeZipCode}}><br>
        Driver's License Number: <br>
        <input type="text" name="driversLicenseNumber" value={{$person->driversLicenseNumber}}><br>
        State of Driver's License: <br>
        <input type="text" name="stateOfDriversLicense" value={{$person->stateOfDriversLicense}}><br>
        Local Address: <br>
        <input type="text" name="localAddress" value={{$person->localAddress}}><br>
        Cell Phone: <br>
        <input type="text" name="cellPhone" value={{$person->cellPhone}}><br>
        Email: <br>
        <input type="text" name="email" value={{$person->email}}><br>
        Height in Inches: <br>
        <input type="text" name="heightInches" value={{$person->heightInches}}><br>
        Inseam: <br>
        <input type="text" name="inseam" value={{$person->inseam}}><br>
        <input type="submit" value="submit">
    </form>


@endsection