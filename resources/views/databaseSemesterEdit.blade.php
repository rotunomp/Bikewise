@extends('layouts.app')

@section('content')

    <h1>Edit Semester</h1>

    <form method="POST" action={{"/database/semesters/edit/" . $semester->id}}>
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        Year: <br>
        <input type="text" name="year" value={{$semester->year}}><br>
        Season: <br>
        <input type="text" name="season" value={{$semester->season}}><br>
        Start Date: <br>
        <input type="date" name="startDate" value={{$semester->startDate}}><br>
        End Date: <br>
        <input type="date" name="endDate" value={{$semester->endDate}}><br>
        <input type="submit" value="submit">
    </form>


@endsection