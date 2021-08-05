<table>
    <thead>
    <tr>
        <th scope="col">Air Conditioner Id</th>
        <th scope="col">Air Conditioner Type</th>
        <th scope="col">Air Conditioner Model</th>
        <th scope="col">Air Conditioner Capacity</th>
        <th scope="col">Functional Type</th>
        <th scope="col">Gas Type</th>
        <th scope="col">LLD Number</th>
        <th scope="col">Commission Date</th>
        <th scope="col">Site Id</th>
        <th scope="col">Work Order Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($airconditioners as $airconditioner)
        <tr>
            <th scope="row">{{ $airconditioner->id }}</th>
            <td>{{ $airconditioner->air_conditioners_type }}</td>
            <td>{{ $airconditioner->air_conditioners_model }}</td>
            <td>{{ $airconditioner->air_conditioners_capacity }}</td>
            <td>{{ $airconditioner->functional_type }}</td>
            <td>{{ $airconditioner->gas_type }}</td>
            <td>{{ $airconditioner->lld_number }}</td>
            <td>{{ $airconditioner->commission_date }}</td>
            <td>{{ $airconditioner->site_id }}</td>
            <td>{{ $airconditioner->work_order_id }}</td>
            <td>{{ $airconditioner->created_at->format('Y-m-d') }}</td>
            <td>{{ $airconditioner->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
