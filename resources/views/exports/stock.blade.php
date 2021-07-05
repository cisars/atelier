

{{--<img src="http://64.227.4.210/img/atelier1.png">--}}
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
<h1 style="margin-top: 380px; background-color: #eeeeee">Stock de Manejo</h1>
</center>
<p style="  font-size: 12px">
    Fecha de emisión: {{date('d/m/Y')}}
</p>

<table  style="font-size: 12px; width: 100%" cellspacing="0" border="0" >

    <thead >
    <tr style=" background-color: black; color: white">
        <th width="10" > </th>
        <th height="25" style="alignment: left; text-align: left">Repuesto</th>
        <th height="25">Medida</th>
        <th height="25">Cantidad</th>
        <th height="25">Sector</th>
    </tr>
    </thead>
    <tbody>
    @foreach($arrayValues as $value)
        <tr>
            <td> </td>
            <td>{{ $value->repuesto->descripcion }}</td>
            <td  style="alignment: center; text-align: center">{{ $value->repuesto->unidad->descripcion }}</td>
            <td  style="alignment: center; text-align: center">{{ $value->cantidad }}</td>
            <td  style="alignment: center; text-align: center">{{ $value->sector->descripcion }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
