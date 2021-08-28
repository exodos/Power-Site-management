<table>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Direction Name</th>
        <th scope="col">Cabling Method</th>
        <th scope="col">Fiber Type</th>
        <th scope="col">Core Number</th>
        <th scope="col">Next Hope NE Id</th>
        <th scope="col">Next Hope Distance</th>
        <th scope="col">Ne Id</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($siteLines as $siteLine)
        <tr>
            <th scope="row">{{ $siteLine->id }}</th>
            <td>{{ $siteLine->direction_name }}</td>
            <td>{{ $siteLine->cabling_method }}</td>
            <td>{{ $siteLine->fiber_type }}</td>
            <td>{{ $siteLine->core_number }}</td>
            <td>{{ $siteLine->next_hope_ne_id }}</td>
            <td>{{ $siteLine->next_hope_distance }}</td>
            <td>{{ $siteLine->transmission_otn_nes_id }}</td>
            <td>{{ $siteLine->transmission_site_id }}</td>
            <td>{{ $siteLine->created_at->format('Y-m-d') }}</td>
            <td>{{ $siteLine->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
