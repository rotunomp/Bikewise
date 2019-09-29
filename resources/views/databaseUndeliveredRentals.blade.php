@extends('layouts.app')
@extends('layouts.table')


@section('content')

    <h1>Undelivered Rentals</h1>
    @include('layouts.rentalButtons')

    @include('layouts.rentalTable')

@endsection