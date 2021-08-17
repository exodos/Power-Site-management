<table>
    <thead>
    <tr class="bg-primary">
        <th scope="col">Site Id</th>
        <th scope="col">Site Name</th>
        <th scope="col">Power Source Configuration</th>
        <th scope="col">Monitoring Status</th>
        <th scope="col">Site Latitude</th>
        <th scope="col">Site Longitude</th>
        <th scope="col">Site Region/Zone</th>
        <th scope="col">Site Political Region</th>
        <th scope="col">Site Location</th>
        <th scope="col">Site Class</th>
        <th scope="col">Site Value</th>
        <th scope="col">TSite ype</th>
        <th scope="col">Maintenance Center</th>
        <th scope="col">Distance From Mc</th>
        <th scope="col">List Of NE</th>
        <th scope="col">Number Of Towers</th>
        <th scope="col">Number Of Generator</th>
        <th scope="col">Number Of Air Conditioners</th>
        <th scope="col">Number Of Rectifiers</th>
        <th scope="col">Number Of Solar System</th>
        <th scope="col">Work Order Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sites as $site)
        <tr>
            <th scope="row">{{ $site->id }}</th>
            <td>{{ $site->sites_name }}</td>
            <td>{{ $site->ps_configuration }}</td>
            <td>{{ $site->monitoring_status }}</td>
            <td>{{ $site->sites_latitude }}</td>
            <td>{{ $site->sites_longitude }}</td>
            <td>{{ $site->sites_region_zone }}</td>
            <td>{{ $site->sites_political_region }}</td>
            <td>{{ $site->sites_location }}</td>
            <td>{{ $site->sites_class }}</td>
            <td>{{ $site->sites_value }}</td>
            <td>{{ $site->sites_type }}</td>
            <td>{{ $site->maintenance_center }}</td>
            <td>{{ $site->distance_mc }}</td>
            <td>{{ $site->list_of_ne }}</td>
            <td>{{ $site->number_of_towers }}</td>
            <td>{{ $site->number_of_generator }}</td>
            <td>{{ $site->number_of_airconditioners }}</td>
            <td>{{ $site->number_of_rectifiers }}</td>
            <td>{{ $site->number_of_solar_system }}</td>
            <td>{{$site->work_order_id}}</td>
            <td>{{ $site->created_at->format('Y-m-d') }}</td>
            <td>{{ $site->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
