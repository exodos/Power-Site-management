<table>
    <thead>
    <tr>
        <th scope="col">Class B</th>
        <th scope="col">Class C</th>
        <th scope="col">Usage</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ipAddresses as $ipAddress)
        <tr>
            <th scope="row">{{ $ipAddress->class_b }}</th>
            <td>{{ $ipAddress->class_c }}</td>
            <td>{{ $ipAddress->usage }}</td>
            <td>{{ $ipAddress->created_at->format('Y-m-d') }}</td>
            <td>{{ $ipAddress->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
