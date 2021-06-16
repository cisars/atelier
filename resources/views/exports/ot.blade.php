<h4>Servicios</h4>
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
    @foreach($arrayValues->ordenes_servicios as $servicio)
        <tr>
            <td>{{ $servicio->descripcion }}</td>
            <td>{{ $servicio->pivot->cantidad }}</td>
            <td>{{ $servicio->precio_venta }}</td>
            <td>{{ $servicio->precio }}</td>
            <td>{{ $value->repuesto->unidad->descripcion }}</td>
            <td>{{ $value->cantidad }}</td>
            <td>{{ $value->sector->descripcion }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
