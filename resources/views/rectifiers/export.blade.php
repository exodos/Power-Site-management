<table>
    <thead>
    <tr class="bg-primary">
        <th scope="col">Rectifier Id</th>
        <th scope="col">Rectifier Model</th>
        <th scope="col">Rectifier Capacity</th>
        <th scope="col">Rectifiers Module Model</th>
        <th scope="col">Number Of Rectifiers Model Slots</th>
        <th scope="col">Rectifiers Module Capacity</th>
        <th scope="col">Rectifier Module Qty</th>
        <th scope="col">LLVD Capacity</th>
        <th scope="col">BLVD Capacity</th>
        <th scope="col">Battery Fuess Qty</th>
        <th scope="col">Power Of MSAG/MSAN Connected Company</th>
        <th scope="col">Monitoring System Name</th>
        <th scope="col">LLD Number</th>
        <th scope="col">Commission Date</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rectifiers as $rectifier)
        <tr>
            <th scope="row">{{ $rectifier->id }}</th>
            <td>{{ $rectifier->rectifiers_model }}</td>
            <td>{{ $rectifier->rectifiers_capacity }}</td>
            <td>{{ $rectifier->rectifiers_module_model }}</td>
            <td>{{ $rectifier->number_of_rectifiers_model_slots }}</td>
            <td>{{ $rectifier->rectifiers_module_capacity }}</td>
            <td>{{ $rectifier->rectifier_module_Qty }}</td>
            <td>{{ $rectifier->llvd_capacity }}</td>
            <td>{{ $rectifier->blvd_capacity }}</td>
            <td>{{ $rectifier->battery_fuess_Qty }}</td>
            <td>{{ $rectifier->power_of_msag_msan_connected_company }}</td>
            <td>{{ $rectifier->monitoring_system_name }}</td>
            <td>{{ $rectifier->lld_number }}</td>
            <td>{{ $rectifier->commission_date }}</td>
            <td>{{ $rectifier->site_id }}</td>
            <td>{{ $rectifier->created_at->format('Y-m-d') }}</td>
            <td>{{ $rectifier->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
