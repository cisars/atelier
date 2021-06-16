<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Vehiculo</th>
        <th>Empleado</th>
        <th>Taller</th>
        <th>Para Fecha</th>
        <th>Recepcion</th>
        <th>Grupo</th>
        <th>Tipo</th>
        <th>Prioridad</th>
        <th>Estado</th>
        <th>Descripcion</th>
        <th>Importe Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($arrayValues as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->cliente->razon_social }}</td>
            <td>{{ $value->vehiculo->full_desc }}</td>
            <td>{{ $value->empleado->nombres . ' ' . $value->empleado->apellidos }}</td>
            <td>{{ $value->taller->descripcion }}</td>
            <td>{{ $value->recepcion->creted_at }}</td>
            <td>{{ $value->para_fecha }}</td>
            <td>{{ $value->grupo->descripcion }}</td>
            <td>{{ $value->tipo_desc }}</td>
            <td>{{ $value->prioridad_desc }}</td>
            <td>{{ $value->estado_desc }}</td>
            <td>{{ $value->descripcion }}</td>
            <td>{{ $value->importe_total }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
