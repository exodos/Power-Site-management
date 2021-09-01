<table>
    <thead>
    <tr>
        <th scope="col">Link Id</th>
        <th scope="col">Link Name</th>
        <th scope="col">Fiber Type</th>
        <th scope="col">Used Core</th>
        <th scope="col">Free Core</th>
        <th scope="col">Number Of Splice Points</th>
        <th scope="col">Average Link Loss</th>
        <th scope="col">OFC Type</th>
        <th scope="col">A-End ODF Connector Type</th>
        <th scope="col">Z-End ODF Connector Type</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fiberLinks as $fiberLink)
        <tr>
            <th scope="row">{{ $fiberLink->id }}</th>
            <td>{{ $fiberLink->link_name }}</td>
            <td>{{ $fiberLink->fiber_type }}</td>
            <td>{{ $fiberLink->used_core }}</td>
            <td>{{ $fiberLink->free_core}}</td>
            <td>{{ $fiberLink->number_splice_points }}</td>
            <td>{{ $fiberLink->average_link_loss }}</td>
            <td>{{ $fiberLink->ofc_type }}</td>
            <td>{{ $fiberLink->a_end_odf_connector_type }}</td>
            <td>{{ $fiberLink->z_end_odf_connector_type }}</td>
            <td>{{ $fiberLink->transmission_site_id }}</td>
            <td>{{ $fiberLink->created_at->format('Y-m-d') }}</td>
            <td>{{ $fiberLink->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
