<table>
    <thead>
    <tr>
        <th>Repuesto</th>
        <th>Medida</th>
        <th>Cantidad</th>
        <th>Sector</th>
    </tr>
    </thead>
    <tbody>
    @foreach($arrayValues as $value)
        <tr>
            <td>{{ $value->repuesto->descripcion }}</td>
            <td>{{ $value->repuesto->unidad->descripcion }}</td>
            <td>{{ $value->cantidad }}</td>
            <td>{{ $value->sector->descripcion }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
