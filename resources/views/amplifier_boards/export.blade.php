<table>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Board Name</th>
        <th scope="col">Slot Number</th>
        <th scope="col">Type</th>
        <th scope="col">Gain</th>
        <th scope="col">direction</th>
        <th scope="col">SubRack Id</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($amplifierBoards as $amplifierBoard)
        <tr>
            <th scope="row">{{ $amplifierBoard->id }}</th>
            <td>{{ $amplifierBoard->board_name }}</td>
            <td>{{ $amplifierBoard->slot_number }}</td>
            <td>{{ $amplifierBoard->type }}</td>
            <td>{{ $amplifierBoard->gain }}</td>
            <td>{{ $amplifierBoard->direction }}</td>
            <td>{{ $amplifierBoard->transmission_equipment_id }}</td>
            <td>{{ $amplifierBoard->transmission_site_id }}</td>
            <td>{{ $amplifierBoard->created_at->format('Y-m-d') }}</td>
            <td>{{ $amplifierBoard->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
