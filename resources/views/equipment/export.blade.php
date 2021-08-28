<table>
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">SubRack Name</th>
        <th scope="col">SubRack Type</th>
        <th scope="col">Equipment Type</th>
        <th scope="col">Number Of Used Slots</th>
        <th scope="col">Number Of Free Slots</th>
        <th scope="col">Vendor</th>
        <th scope="col">Ne Id</th>
        <th scope="col">Site Id</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transmissionEquipments as $transmissionEquipment)
        <tr>
            <th scope="row">{{ $transmissionEquipment->id }}</th>
            <td>{{ $transmissionEquipment->subrack_name }}</td>
            <td>{{ $transmissionEquipment->subrack_type }}</td>
            <td>{{ $transmissionEquipment->equipment_type }}</td>
            <td>{{ $transmissionEquipment->number_used_slots }}</td>
            <td>{{ $transmissionEquipment->number_free_slots }}</td>
            <td>{{ $transmissionEquipment->vendor }}</td>
            <td>{{ $transmissionEquipment->transmission_otn_nes_id }}</td>
            <td>{{ $transmissionEquipment->transmission_site_id }}</td>
            <td>{{ $transmissionEquipment->created_at->format('Y-m-d') }}</td>
            <td>{{ $transmissionEquipment->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
