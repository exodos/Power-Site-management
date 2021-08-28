<table>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Trail Name</th>
        <th scope="col">Working Mode</th>
        <th scope="col">Source Ne</th>
        <th scope="col">Source Port Number</th>
        <th scope="col">Source Port WaveLength</th>
        <th scope="col">Sink Ne</th>
        <th scope="col">Sink Board Id</th>
        <th scope="col">Sink Port Number</th>
        <th scope="col">Sink Port WaveLength</th>
        <th scope="col">Source Board Id</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($lineBoardWdmTrails as $lineBoardWdmTrail)
        <tr>
            <th scope="row">{{ $lineBoardWdmTrail->id }}</th>
            <td>{{ $lineBoardWdmTrail->trail_name }}</td>
            <td>{{ $lineBoardWdmTrail->working_mode }}</td>
            <td>{{ $lineBoardWdmTrail->source_ne }}</td>
            <td>{{ $lineBoardWdmTrail->source_port_number }}</td>
            <td>{{ $lineBoardWdmTrail->source_port_wave_length }}</td>
            <td>{{ $lineBoardWdmTrail->sink_ne }}</td>
            <td>{{ $lineBoardWdmTrail->sink_board_id }}</td>
            <td>{{ $lineBoardWdmTrail->sink_port_number }}</td>
            <td>{{ $lineBoardWdmTrail->sink_port_wave_length }}</td>
            <td>{{ $lineBoardWdmTrail->transmission_line_boards_id }}</td>
            <td>{{ $lineBoardWdmTrail->transmission_site_id }}</td>
            <td>{{ $lineBoardWdmTrail->created_at->format('Y-m-d') }}</td>
            <td>{{ $lineBoardWdmTrail->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
