<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Taller</th>
        <th>OT</th>
        <th>Cliente</th>
        <th>Vehiculo</th>
        <th>Empleado</th>
        <th>Fecha</th>
        <th>Observación</th>
    </tr>
    </thead>
    <tbody>
    @foreach($arrayValues as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->taller->descripcion }}</td>
            <td>{{ $value->orden_trabajo->id }}</td>
            <td>{{ $value->cliente->razon_social }}</td>
            <td>{{ $value->vehiculo->full_desc }}</td>
            <td>{{ ($value->empleado->nombres ?? ''). ' ' . ($value->empleado->apellidos ?? '') }}</td>
            <td>{{ $value->fecha }}</td>
            <td>{{ $value->observacion }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
