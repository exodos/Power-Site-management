<table>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Board Name</th>
        <th scope="col">Slot Number</th>
        <th scope="col">Port Capacity</th>
        <th scope="col">Number Of Free Ports</th>
        <th scope="col">Number Of Free Ports</th>
        <th scope="col">Number Of Ports With Modules</th>
        <th scope="col">SubRack Id</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($lineBoards as $lineBoard)
        <tr>
            <th scope="row">{{ $lineBoard->id }}</th>
            <td>{{ $lineBoard->board_name }}</td>
            <td>{{ $lineBoard->slot_number }}</td>
            <td>{{ $lineBoard->port_capacity }}</td>
            <td>{{ $lineBoard->number_free_ports }}</td>
            <td>{{ $lineBoard->number_used_ports }}</td>
            <td>{{ $lineBoard->number_ports_modules }}</td>
            <td>{{ $lineBoard->transmission_equipment_id }}</td>
            <td>{{ $lineBoard->transmission_site_id }}</td>
            <td>{{ $lineBoard->created_at->format('Y-m-d') }}</td>
            <td>{{ $lineBoard->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
