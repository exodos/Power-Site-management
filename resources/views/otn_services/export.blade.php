<table>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Service Name</th>
        <th scope="col">Customer Name</th>
        <th scope="col">SLA Type</th>
        <th scope="col">Rate</th>
        <th scope="col">Source NE</th>
        <th scope="col">Source Port Number</th>
        <th scope="col">Sink NE</th>
        <th scope="col">Sink Board Id</th>
        <th scope="col">Sink Port Number</th>
        <th scope="col">Source Board Id</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($otnServices as $otnService)
        <tr>
            <th scope="row">{{ $otnService->id }}</th>
            <td>{{ $otnService->service_name }}</td>
            <td>{{ $otnService->customer_name }}</td>
            <td>{{ $otnService->sla_type }}</td>
            <td>{{ $otnService->rate }}</td>
            <td>{{ $otnService->source_ne }}</td>
            <td>{{ $otnService->source_port_number }}</td>
            <td>{{ $otnService->sink_ne }}</td>
            <td>{{ $otnService->sink_board_id }}</td>
            <td>{{ $otnService->sink_port_number }}</td>
            <td>{{ $otnService->transmission_client_boards_id }}</td>
            <td>{{ $otnService->transmission_site_id }}</td>
            <td>{{ $otnService->created_at->format('Y-m-d') }}</td>
            <td>{{ $otnService->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
