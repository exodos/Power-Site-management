<table>
    <thead>
    <tr class="bg-primary">
        <th scope="col">Id</th>
        <th scope="col">Number Of Solar System</th>
        <th scope="col">Solar Panel Type</th>
        <th scope="col">Solar Panel Module Capacity</th>
        <th scope="col">Number Of Arrays</th>
        <th scope="col">Solar Controller Type</th>
        <th scope="col">Regulator Capacity</th>
        <th scope="col">Solar Regulator Qty</th>
        <th scope="col">Number Of Structure Group</th>
        <th scope="col">Solar Structure Front Height</th>
        <th scope="col">Solar Structure Rear Height</th>
        <th scope="col">Commission Date</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($solarpanels as $solarpanel)
        <tr>
            <th scope="row">{{ $solarpanel->id }}</th>
            <th scope="row">{{ $solarpanel->number_solar_system }}</th>
            <td>{{ $solarpanel->solar_panel_type }}</td>
            <td>{{ $solarpanel->solar_panels_module_capacity }}</td>
            <td>{{ $solarpanel->number_of_arrays }}</td>
            <td>{{ $solarpanel->solar_controller_type }}</td>
            <td>{{ $solarpanel->regulator_capacity }}</td>
            <td>{{ $solarpanel->solar_regulator_Qty }}</td>
            <td>{{ $solarpanel->number_of_structure_group }}</td>
            <td>{{ $solarpanel->solar_structure_front_height }}</td>
            <td>{{ $solarpanel->solar_structure_rear_height }}</td>
            <td>{{ $solarpanel->commission_date }}</td>
            <td>{{ $solarpanel->site_id }}</td>
            <td>{{ $solarpanel->created_at->format('Y-m-d') }}</td>
            <td>{{ $solarpanel->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
