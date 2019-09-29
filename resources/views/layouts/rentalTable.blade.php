<table class="pure-table pure-table-bordered">
    <tr>
        <th>ID</th>
        <th>Bike</th>
        <th>Accessory Package</th>
        <th>Person Name</th>
        <th>Gender</th>
        <th>Date Created</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Price</th>
        <th>Length</th>
        <th>Delivered?</th>
        <th>Returned?</th>
        <th>Paid?</th>
        <th>Frame Size</th>
        <th>Serial Number</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    @foreach($rentals as $rental)
        <tr>
            <td>{{$rental->id}}</td>
            <td>{{$keyedBicycles[$rental->bikeId]}}</td>
            <td>
                <a href={{'/database/packages/' . $rental->accessoryListId}}>
                    {{$keyedPackages[$rental->accessoryListId]}}
                </a>
            </td>
            <td>
                {{$keyedPeople[$rental->personId]}}
            </td>
            <td>{{$rental->gender}}</td>
            <td>{{$rental->dateCreated}}</td>
            <td>{{$rental->startDate}}</td>
            <td>{{$rental->endDate}}</td>
            <td>{{$rental->price}}</td>
            <td>{{$rental->length}}</td>
            <td>{{$rental->isDelivered? 'yes' : 'no'}}</td>
            <td>{{$rental->isReturned? 'yes' : 'no'}}</td>
            <td>{{$rental->isPaid? 'yes' : 'no'}}</td>
            <td>{{$rental->frameSize}}</td>
            <td>{{$rental->serialNumber}}</td>
            <td>
                <form method="POST" action={{"/database/rentals/" . $rental->id}}>
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    <input type="submit" value="Delete"
                           onclick="return confirm('Are you sure you want to delete this item?');">
                </form>
            </td>
            <td>
                <form action={{"/database/rentals/edit/" . $rental->id}}>
                    <input type="submit" value="Edit">
                </form>
            </td>

        </tr>
    @endforeach
</table>
