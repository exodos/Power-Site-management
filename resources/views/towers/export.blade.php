<table>
    <thead>
    <tr class="bg-primary">
        <th scope="col">Tower Id</th>
        <th scope="col">Tower Type</th>
        <th scope="col">Tower Height</th>
        <th scope="col">Tower Brand</th>
        <th scope="col">Tower Soil Type</th>
        <th scope="col">Tower Foundation Type</th>
        <th scope="col">Tower Design Load Capacity</th>
        <th scope="col">Tower Sharing Operator</th>
        <th scope="col">Tower Used Load Capacity</th>
        <th scope="col">Ethio Antenna Weight</th>
        <th scope="col">Ethio Antenna Height</th>
        <th scope="col">Operator Antenna Height</th>
        <th scope="col">Operator Tower Load</th>
        <th scope="col">Operator Antenna Weight</th>
        <th scope="col">Tower Installation Date</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($towers as $tower)
        <tr>
            <th scope="row">{{ $tower->id }}</th>
            <td>{{ $tower->towers_type }}</td>
            <td>{{ $tower->towers_height }}</td>
            <td>{{ $tower->towers_brand }}</td>
            <td>{{ $tower->towers_soil_type }}</td>
            <td>{{ $tower->towers_foundation_type }}</td>
            <td>{{ $tower->towers_design_load_capacity }}</td>
            <td>{{ $tower->towers_sharing_operator }}</td>
            <td>{{ $tower->tower_used_load_capacity }}</td>
            <td>{{ $tower->ethio_antenna_weight }}</td>
            <td>{{ $tower->ethio_antenna_height }}</td>
            <td>{{ $tower->operator_antenna_height }}</td>
            <td>{{ $tower->operator_tower_load }}</td>
            <td>{{ $tower->operator_antenna_weight }}</td>
            <td>{{ $tower->tower_installation_date }}</td>
            <td>{{ $tower->site_id }}</td>
            <td>{{ $tower->created_at->format('Y-m-d') }}</td>
            <td>{{ $tower->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
