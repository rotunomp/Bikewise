@extends('layouts.app')
@extends('layouts.table')


@section('content')

    <h1>Unreturned Rentals</h1>
    @include('layouts.rentalButtons')

    @include('layouts.rentalTable')

@endsection