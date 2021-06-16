<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Taller</th>
        <th>Cliente</th>
        <th>Vehiculo</th>
        <th>Fecha</th>
        <th>Para fecha</th>
        <th>Empleado</th>
        <th>Estado</th>
        <th>Forma Reserva</th>
        <th>Prioridad</th>
        <th>Observación</th>
        <th>Usuario</th>
        <th>Para hora</th>
        <th>Sector</th>
        <th>Ticket</th>
    </tr>
    </thead>
    <tbody>
    @foreach($arrayValues as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->taller->descripcion }}</td>
            <td>{{ $value->cliente->razon_social }}</td>
            <td>{{ $value->vehiculo->full_desc }}</td>
            <td>{{ $value->fecha }}</td>
            <td>{{ $value->para_fecha }}</td>
            <td>{{ ($value->empleado->nombres ?? ''). ' ' . ($value->empleado->apellidos ?? '') }}</td>
            <td>{{ $value->estado_desc }}</td>
            <td>{{ $value->forma_desc }}</td>
            <td>{{ $value->prioridad_desc }}</td>
            <td>{{ $value->observacion }}</td>
            <td>{{ $value->usuario }}</td>
            <td>{{ $value->para_hora }}</td>
            <td>{{ $value->sector }}</td>
            <td>{{ $value->ticket }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
