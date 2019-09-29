@extends('layouts.app')

@section('content')
    <div class="">

        <h1>Welcome to the Database Editor!</h1>

        <h2>Databases</h2>
        <table>
            <tr>
                <th>Table Name</th>
                <th></th>
            </tr>
            <tr>
                <td>Bicycles</td>
                <td>
                    <form action="/database/bicycles">
                        <input type="submit" value="See all bicycles"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td>People</td>
                <td>
                    <form action="/database/people">
                        <input type="submit" value="See all people"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Accessories</td>
                <td>
                    <form action="/database/accessories">
                        <input type="submit" value="See all accessories"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Packages</td>
                <td>
                    <form action="/database/packages">
                        <input type="submit" value="See all accessory packages"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Rentals</td>
                <td>
                    <form action="/database/rentals">
                        <input type="submit" value="See all rentals"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Semesters</td>
                <td>
                    <form action="/database/semesters">
                        <input type="submit" value="See all semesters"/>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Database Users</td>
                <td>
                    <form action="/database/users">
                        <input type="submit" value="See all database users"/>
                    </form>
                </td>
            </tr>
        </table>
    </div>
@endsection
