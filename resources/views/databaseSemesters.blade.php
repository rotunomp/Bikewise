@extends('layouts.app')
@extends('layouts.table')

@section('content')

    <h1>Semesters</h1>

    <table class="pure-table pure-table-bordered">
        <tr>
            <th>ID</th>
            <th>Year</th>
            <th>Season</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        @foreach($semesters as $semester)
            <tr>
                <td>{{$semester->id}}</td>
                <td>{{$semester->year}}</td>
                <td>{{$semester->season}}</td>
                <td>{{$semester->startDate}}</td>
                <td>{{$semester->endDate}}</td>
                <td>
                    <form method="POST" action={{"/database/semesters/" . $semester->id}}>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <input type="submit" value="Delete" onclick="return confirm('Are you sure you want to delete this item?');">

                    </form>
                </td>
                <td>
                    <form action={{"/database/semesters/edit/" . $semester->id}}>
                        <input type="submit" value="Edit">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <h2>Add a new Semester</h2>
    <form method="POST" href="/database/semesters">
        {{ csrf_field() }}
        Year: <br>
        <input type="text" name="year" required><br>
        Season: <br>
        <input type="text" name="season" required><br>
        Start Date: <br>
        <input type="date" name="startDate" required><br>
        End Date: <br>
        <input type="date" name="endDate" required><br>

        <input type="submit" value="submit">
    </form>

@endsection
