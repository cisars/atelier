<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @page {
            size: 8.5in 11in;
            margin: .5in;
            font-family: Arial, Helvetica, sans-serif;
        }
        #bgimg {
            position: fixed;
            left: -.5in;
            top: -.5in;

            z-index: -999
        }
    </style>
</head>
<body>
<img id="bgimg" src="data:image/png;base64,{{ $encabezado}}"/>

<center>
    <h1 style="margin-top: 380px; background-color: #eeeeee">Reservas</h1>
</center>
<p style="  font-size: 12px">
    Fecha de emisión: {{date('d/m/Y')}}
</p>


<table  style="font-size: 12px; width: 100%" cellspacing="0" border="0" >
    <thead>
    <tr style=" background-color: black; color: white">
        <th>ID</th>
{{--        <th>Taller</th>--}}
        <th>Cliente</th>
        <th>Vehiculo</th>
        <th>Fecha</th>
        <th>Para fecha</th>
        <th>Empleado</th>
        <th>Estado</th>
        <th>Forma Reserva</th>
        <th>Prioridad</th>
{{--        <th>Observación</th>--}}
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
{{--            <td>{{ $value->taller->descripcion }}</td>--}}
            <td>{{ $value->cliente->razon_social }}</td>
            <td>{{ $value->vehiculo->full_desc }}</td>
            <td>{{ $value->fecha }}</td>
            <td>{{ $value->para_fecha }}</td>
            <td>{{ ($value->empleado->nombres ?? ''). ' ' . ($value->empleado->apellidos ?? '') }}</td>
            <td>{{ $value->estado_desc }}</td>
            <td>{{ $value->forma_desc }}</td>
            <td>{{ $value->prioridad_desc }}</td>
{{--            <td>{{ $value->observacion }}</td>--}}
            <td>{{ $value->usuario }}</td>
            <td>{{ $value->para_hora }}</td>
            <td>{{ $value->sector }}</td>
            <td>{{ $value->ticket }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
