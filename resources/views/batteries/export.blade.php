<table>
    <thead>
    <tr>
        <th scope="col">Battery Id</th>
        <th scope="col">Battery Type</th>
        <th scope="col">Battery Model</th>
        <th scope="col">Battery Voltage</th>
        <th scope="col">Battery Capacity</th>
        <th scope="col">Number Of Batteries Banks</th>
        <th scope="col">Battery Holding Time</th>
        <th scope="col">Commission Date</th>
        <th scope="col">LLD Number</th>
        <th scope="col">Site Id</th>
        <th scope="col">Word Order Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($batteries as $battery)
        <tr>
            <th scope="row">{{ $battery->id }}</th>
            <td>{{ $battery->batteries_type }}</td>
            <td>{{ $battery->batteries_model }}</td>
            <td>{{ $battery->batteries_voltage }}</td>
            <td>{{ $battery->batteries_capacity }}</td>
            <td>{{ $battery->number_of_batteries_banks }}</td>
            <td>{{ $battery->battery_holding_time }}</td>
            <td>{{ $battery->commission_date }}</td>
            <td>{{ $battery->lld_number }}</td>
            <td>{{ $battery->site_id }}</td>
            <td>{{$battery->work_order_id}}</td>
            <td>{{ $battery->created_at->format('Y-m-d')}}</td>
            <td>{{ $battery->updated_at->format('Y-m-d')}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
