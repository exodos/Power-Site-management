<table>
    <thead>
    <tr>
        <th scope="col">IGenerator d</th>
        <th scope="col">Generator Type</th>
        <th scope="col">Generator Capacity</th>
        <th scope="col">Engine Model</th>
        <th scope="col">Fuel Tanker Capacity</th>
        <th scope="col">Alternator Model</th>
        <th scope="col">Alternator Capacity</th>
        <th scope="col">Controller Mode Model</th>
        <th scope="col">ATS Model</th>
        <th scope="col">ATS Capacity</th>
        <th scope="col">Generator Foundation Size</th>
        <th scope="col">Fuel Tank Foundation Size</th>
        <th scope="col">Fuel Tanker Type</th>
        <th scope="col">Fuel Tank Qty</th>
        <th scope="col">Starter Battery Capacity</th>
        <th scope="col">Starter Battery Type</th>
        <th scope="col">Functional Status</th>
        <th scope="col">DG Commission Date</th>
        <th scope="col">DG LLD Number</th>
        <th scope="col">Grid Power Line Voltage And Transformer Capacity
        </th>
        <th scope="col">Transformer Installation Date</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($powers as $power)
        <tr>
            <th scope="row">{{ $power->id }}</th>
            <td>{{ $power->generator_type }}</td>
            <td>{{ $power->generator_capacity }}</td>
            <td>{{ $power->engine_model }}</td>
            <td>{{ $power->fuel_tanker_capacity }}</td>
            <td>{{ $power->alternator_model }}</td>
            <td>{{ $power->alternator_capacity }}</td>
            <td>{{ $power->controller_mode_model }}</td>
            <td>{{ $power->ats_model }}</td>
            <td>{{ $power->ats_capacity }}</td>
            <td>{{ $power->generator_foundation_size }}</td>
            <td>{{ $power->fuel_tank_foundation_size }}</td>
            <td>{{ $power->fuel_tanker_type }}</td>
            <td>{{ $power->fuel_tank_Qty }}</td>
            <td>{{ $power->starter_battery_capacity }}</td>
            <td>{{ $power->starter_battery_type }}</td>
            <td>{{ $power->functionality_status }}</td>
            <td>{{ $power->dg_commission_date }}</td>
            <td>{{ $power->dg_lld_number }}</td>
            <td>{{ $power->grid_power_line_voltage_and_transformer_capacity }}</td>
            <td>{{ $power->transformer_installation_date }}</td>
            <td>{{ $power->site_id }}</td>
            <td>{{ $power->created_at->format('Y-m-d') }}</td>
            <td>{{ $power->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
