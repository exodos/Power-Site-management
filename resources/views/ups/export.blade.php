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
        <th scope="col">Work Order Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ups as $up)
        <tr>
            <th scope="row">{{ $up->id }}</th>
            <td>{{ $up->ups_type }}</td>
            <td>{{ $up->ups_model }}</td>
            <td>{{ $up->ups_capacity }}</td>
            <td>{{ $up->input_pob_type }}</td>
            <td>{{ $up->input_pob_capacity }}</td>
            <td>{{ $up->number_of_ups_model }}</td>
            <td>{{ $up->battery_type }}</td>
            <td>{{ $up->numbers_of_battery_banks }}</td>
            <td>{{ $up->battery_capacity }}</td>
            <td>{{ $up->battery_holding_time }}</td>
            <td>{{ $up->lld_number }}</td>
            <td>{{ $up->commission_date }}</td>
            <td>{{ $up->site_id }}</td>
            <td>{{$up->work_order_id}}</td>
            <td>{{ $up->created_at->format('Y-m-d') }}</td>
            <td>{{ $up->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
