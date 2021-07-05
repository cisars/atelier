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
    <h1 style="margin-top: 380px; background-color: #eeeeee">Órdenes de Trabajos</h1>
</center>
<p style="  font-size: 12px">
    Fecha de emisión: {{date('d/m/Y')}}
</p>


<table  style="font-size: 12px; width: 100%" cellspacing="0" border="0" >
    <thead>
    <tr style=" background-color: black; color: white">
        <th>ID</th>
        <th>Cliente</th>
        <th>Vehiculo</th>
        <th>Empleado</th>
{{--        <th>Taller</th>--}}
{{--        <th>Para Fecha</th>--}}
        <th>Recepcion</th>
        <th>Grupo</th>
{{--        <th>Tipo</th>--}}
        <th>Prioridad</th>
        <th>Estado</th>
{{--        <th>Descripcion</th>--}}
        <th>Importe Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($arrayValues as $value)
        <tr>
            <td style="alignment: center; text-align: center">{{ $value->id }}</td>
            <td style="alignment: center; text-align: center">{{ $value->cliente->razon_social }}</td>
            <td style="alignment: center; text-align: center">{{ $value->vehiculo->full_desc }}</td>
            <td style="alignment: center; text-align: center">{{ $value->empleado->nombres . ' ' . $value->empleado->apellidos }}</td>
{{--           style="alignment: center; text-align: center" <td>{{ $value->taller->descripcion }}</td>--}}
            <td style="alignment: center; text-align: center">{{ $value->recepcion->created_at }}</td>
{{--           style="alignment: center; text-align: center" <td>{{ $value->para_fecha }}</td>--}}
            <td style="alignment: center; text-align: center">{{ $value->grupo->descripcion }}</td>
{{--           style="alignment: center; text-align: center" <td>{{ $value->tipo_desc }}</td>--}}
            <td style="alignment: center; text-align: center">{{ substr($value->prioridad_desc, 9)    }}</td>

            <td style="alignment: center; text-align: center">{{ substr($value->estado_desc, 6)    }}</td>
{{--           style="alignment: center; text-align: center" <td>{{ $value->descripcion }}</td>--}}
            <td style="alignment: center; text-align: center">{{ $value->importe_total }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
