<table>
    <thead>
    <tr class="bg-primary">
        <th scope="col">Ups Id</th>
        <th scope="col">Ups Type</th>
        <th scope="col">Ups Model</th>
        <th scope="col">Ups Capacity</th>
        <th scope="col">Input POB Type</th>
        <th scope="col">Input POB Capacity</th>
        <th scope="col">Number Of Ups Model</th>
        <th scope="col">Battery Type</th>
        <th scope="col">Numbers Of Battery Banks</th>
        <th scope="col">Battery Capacity</th>
        <th scope="col">Battery Holding Time</th>
        <th scope="col">LLD Number</th>
        <th scope="col">Commission Date</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ups as $ups)
        <tr>
            <th scope="row">{{ $ups->id }}</th>
            <td>{{ $ups->ups_type }}</td>
            <td>{{ $ups->ups_model }}</td>
            <td>{{ $ups->ups_capacity }}</td>
            <td>{{ $ups->input_pob_type }}</td>
            <td>{{ $ups->input_pob_capacity }}</td>
            <td>{{ $ups->number_of_ups_model }}</td>
            <td>{{ $ups->battery_type }}</td>
            <td>{{ $ups->numbers_of_battery_banks }}</td>
            <td>{{ $ups->battery_capacity }}</td>
            <td>{{ $ups->battery_holding_time }}</td>
            <td>{{ $ups->lld_number }}</td>
            <td>{{ $ups->commission_date }}</td>
            <td>{{ $ups->site_id }}</td>
            <td>{{ $ups->created_at->format('Y-m-d') }}</td>
            <td>{{ $ups->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
