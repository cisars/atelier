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
    <h1 style="margin-top: 380px; background-color: #eeeeee">Entregas</h1>
</center>
<p style="  font-size: 12px">
    Fecha de emisión: {{date('d/m/Y')}}
</p>


<table  style="font-size: 12px; width: 100%" cellspacing="0" border="0" >
    <thead>
    <tr style=" background-color: black; color: white">
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
            <td style="alignment: left; text-align: left">{{ $value->id }}</td>
            <td style="alignment: left; text-align: left">{{ $value->taller->descripcion }}</td>
            <td style="alignment: left; text-align: left">{{ $value->orden_trabajo->id }}</td>
            <td style="alignment: left; text-align: left">{{ $value->cliente->razon_social }}</td>
            <td style="alignment: left; text-align: left">{{ $value->vehiculo->full_desc }}</td>
            <td style="alignment: left; text-align: left">{{ ($value->empleado->nombres ?? ''). ' ' . ($value->empleado->apellidos ?? '') }}</td>
            <td style="alignment: left; text-align: left">{{ $value->fecha }}</td>
            <td style="alignment: left; text-align: left">{{ $value->observacion }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
