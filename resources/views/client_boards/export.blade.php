<table>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Board Name</th>
        <th scope="col">Slot Number</th>
        <th scope="col">Port Capacity</th>
        <th scope="col">Number Of Free Ports</th>
        <th scope="col">Number Of Used Ports</th>
        <th scope="col">Number Of Ports With Modules</th>
        <th scope="col">SubRack Id</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clientBoards as $clientBoard)
        <tr>
            <th scope="row">{{ $clientBoard->id }}</th>
            <td>{{ $clientBoard->board_name }}</td>
            <td>{{ $clientBoard->slot_number }}</td>
            <td>{{ $clientBoard->port_capacity }}</td>
            <td>{{ $clientBoard->number_free_ports }}</td>
            <td>{{ $clientBoard->number_used_ports }}</td>
            <td>{{ $clientBoard->number_ports_modules }}</td>
            <td>{{ $clientBoard->transmission_equipment_id }}</td>
            <td>{{ $clientBoard->transmission_site_id }}</td>
            <td>{{ $clientBoard->created_at->format('Y-m-d') }}</td>
            <td>{{ $clientBoard->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
