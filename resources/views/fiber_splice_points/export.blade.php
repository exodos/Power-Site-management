<table>
    <thead>
    <tr>
        <th scope="col">Fiber Splice Point Id</th>
        <th scope="col">Latitude</th>
        <th scope="col">Longitude</th>
        <th scope="col">Link Id</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $fiberSplices as $fiberSplice)
        <tr>
            <th scope="row">{{ $fiberSplice->id }}</th>
            <td>{{ $fiberSplice->latitude }}</td>
            <td>{{ $fiberSplice->longitude }}</td>
            <td>{{ $fiberSplice->fiber_links_id }}</td>
            <td>{{ $fiberSplice->transmission_site_id}}</td>
            <td>{{ $fiberSplice->created_at->format('Y-m-d') }}</td>
            <td>{{ $fiberSplice->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
