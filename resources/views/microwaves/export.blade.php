<table>
    <thead>
    <tr>
        <th scope="col">Microwave Site Id</th>
        <th scope="col">Microwave Site Name</th>
        <th scope="col">Microwave Site Type</th>
        <th scope="col">Installed Capacity</th>
        <th scope="col">Maximum Capacity</th>
        <th scope="col">Polarization</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($microwaves as $microwave)
        <tr>
            <th scope="row">{{ $microwave->id }}</th>
            <td>{{ $microwave->site_name }}</td>
            <td>{{ $microwave->site_type }}</td>
            <td>{{ $microwave->installed_capacity }}</td>
            <td>{{ $microwave->maximum_capacity}}</td>
            <td>{{ $microwave->polarization }}</td>
            <td>{{ $microwave->transmission_site_id }}</td>
            <td>{{ $microwave->created_at->format('Y-m-d') }}</td>
            <td>{{ $microwave->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
