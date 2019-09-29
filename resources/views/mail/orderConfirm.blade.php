@extends('layouts.mail')

@section('content')

<h1>Thanks {{$_SESSION['firstName']}} for renting from us!</h1>
<h2>We hope you will enjoy your new bike</h2>
<p>Confirmation Code {{$_SESSION['confirmation code']}}</p>


@endsection
