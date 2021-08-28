<table>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Device Role</th>
        <th scope="col">Slot</th>
        <th scope="col">Slot Usage</th>
        <th scope="col">Card Type</th>
        <th scope="col">Port Usage</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ports as $port)
        <tr>
            <th scope="row">{{ $port->id }}</th>
            <td>{{ $port->name }}</td>
            <td>{{ $port->device_role }}</td>
            <td>{{ $port->slot }}</td>
            <td>{{ $port->slot_usage }}</td>
            <td>{{ $port->card_type }}</td>
            <td>{{ $port->port_type }}</td>
            <td>{{ $port->created_at->format('Y-m-d') }}</td>
            <td>{{ $port->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
