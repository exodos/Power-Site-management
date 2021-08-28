<table>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Board Name</th>
        <th scope="col">Slot Number</th>
        <th scope="col">Type</th>
        <th scope="col">Number Of Free Ports</th>
        <th scope="col">Number Of Used Ports</th>
        <th scope="col">Direction</th>
        <th scope="col">SubRack Id</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roadmBoards as $roadmBoard)
        <tr>
            <th scope="row">{{ $roadmBoard->id }}</th>
            <td>{{ $roadmBoard->board_name }}</td>
            <td>{{ $roadmBoard->slot_number }}</td>
            <td>{{ $roadmBoard->type }}</td>
            <td>{{ $roadmBoard->number_free_ports }}</td>
            <td>{{ $roadmBoard->number_used_ports }}</td>
            <td>{{ $roadmBoard->direction }}</td>
            <td>{{ $roadmBoard->transmission_equipment_id }}</td>
            <td>{{ $roadmBoard->transmission_site_id }}</td>
            <td>{{ $roadmBoard->created_at->format('Y-m-d') }}</td>
            <td>{{ $roadmBoard->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
