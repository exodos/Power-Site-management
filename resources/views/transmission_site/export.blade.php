<table>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Latitude</th>
        <th scope="col">Longitude</th>
        <th scope="col">City</th>
        <th scope="col">Region</th>
        <th scope="col">Et Region/Zone</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($transmissionSites as $transmissionSite)
        <tr>
            <th scope="row">{{ $transmissionSite->id }}</th>
            <td>{{ $transmissionSite->site_name }}</td>
            <td>{{ $transmissionSite->latitude }}</td>
            <td>{{ $transmissionSite->longitude }}</td>
            <td>{{ $transmissionSite->city }}</td>
            <td>{{ $transmissionSite->region }}</td>
            <td>{{ $transmissionSite->et_region_zone }}</td>
            <td>{{ $transmissionSite->created_at->format('Y-m-d') }}</td>
            <td>{{ $transmissionSite->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
