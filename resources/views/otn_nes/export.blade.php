<table>
    <thead>
    <tr>
        <th scope="col">NE Id</th>
        <th scope="col">NE Name</th>
        <th scope="col">NE Type</th>
        <th scope="col">NE Vendor</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($otnNes as $otnNe)
        <tr>
            <th scope="row">{{ $otnNe->id }}</th>
            <td>{{ $otnNe->ne_name }}</td>
            <td>{{ $otnNe->ne_type }}</td>
            <td>{{ $otnNe->ne_vendor }}</td>
            <td>{{ $otnNe->transmission_site_id }}</td>
            <td>{{ $otnNe->created_at->format('Y-m-d') }}</td>
            <td>{{ $otnNe->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
