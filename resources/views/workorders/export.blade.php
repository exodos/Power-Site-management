<table>
    <thead>
    <tr class="bg-primary">
        <th scope="col">Work Order Id</th>
        <th scope="col">Work Order Number</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
    </tr>
    </thead>
    <tbody>
    @foreach($workorders as $workorder)
        <tr>
            <th scope="row">{{ $workorder->id }}</th>
            <td>{{ $workorder->work_orders_number }}</td>
            <td>{{ $workorder->created_at->format('Y-m-d') }}</td>
            <td>{{ $workorder->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
