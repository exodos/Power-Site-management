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
    @foreach($muxDemuxBoards as $muxDemuxBoard)
        <tr>
            <th scope="row">{{ $muxDemuxBoard->id }}</th>
            <td>{{ $muxDemuxBoard->board_name }}</td>
            <td>{{ $muxDemuxBoard->slot_number }}</td>
            <td>{{ $muxDemuxBoard->type }}</td>
            <td>{{ $muxDemuxBoard->number_free_ports }}</td>
            <td>{{ $muxDemuxBoard->number_used_ports }}</td>
            <td>{{ $muxDemuxBoard->direction }}</td>
            <td>{{ $muxDemuxBoard->transmission_equipment_id }}</td>
            <td>{{ $muxDemuxBoard->transmission_site_id }}</td>
            <td>{{ $muxDemuxBoard->created_at->format('Y-m-d') }}</td>
            <td>{{ $muxDemuxBoard->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
