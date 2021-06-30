<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; background-color: #ffffff; color: #718096; height: 100%; line-height: 1.4; margin: 0; padding: 0; width: 100% !important;">
<style>
    @media only screen and (max-width: 600px) {
        .inner-body {
            width: 100% !important;
        }

        .footer {
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 500px) {
        .button {
            width: 100% !important;
        }
    }
</style>

<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #343a40; margin: 0; padding: 0; width: 100%;">
    <tr>
        <td align="center" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
            <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; margin: 0; padding: 0; width: 100%;">
                <tr>
                    <td class="header" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; padding: 25px 0; text-align: center;">
                        <a href="http://localhost" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #ffffff; font-size: 19px; font-weight: bold; text-decoration: none; display: inline-block;">
                            .: Taller Atelier :.
                        </a>
                    </td>
                </tr>

                <!-- Email Body -->
                <tr>
                    <td class="body" width="100%" cellpadding="0" cellspacing="0" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%; background-color: #343a40; border-bottom: 1px solid #343a40; border-top: 1px solid #343a40; margin: 0; padding: 0; width: 100%;">
                        <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; background-color: #ffffff; border-color: #343a40; border-radius: 2px; border-width: 1px; box-shadow: 0 2px 0 rgba(0, 0, 150, 0.025), 2px 4px 0 rgba(0, 0, 150, 0.015); margin: 0 auto; padding: 0; width: 570px;">
                            <!-- Body content -->
                            <tr>
                                <td class="content-cell" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding: 32px;">
                                    <br />
                                    <h1 style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; color: #ab0a4e; font-size: 18px; font-weight: bold; margin-top: 0; text-align: left;">
                                        Cierre de Orden de Trabajo  </h1>
                                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">
                                        Señor {{ $orden->cliente->razon_social }}, <br>

                                        Taller Atelier le informa que se ha generado la factura nro {{ $orden->id }}, de <b>Gs. {{ $orden->importe_total }}</b> sobre la OT Nro {{ $orden->id }}


                                    </p>
                                    <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0"
                                           role="presentation" style="
                                           box-sizing: border-box;
                                           font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif,
                                           'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';
                                           position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0;
                                           -premailer-width: 570px; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                                        <tr style="background-color:#eeeeee;">
                                            <td class="content-cell" align="left" style="box-sizing:
                                            border-box;  font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding: 5px;">
                                                Servicios
                                            </td>
                                            <td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding:   5px;">
                                                Cant.
                                            </td>
                                            <td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding:  5px;">
                                                Precio
                                            </td>
                                            <td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding: 5px;">
                                                Subtotal
                                            </td>
                                            {{--<td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding:  5px;">
                                                Verificado
                                            </td>--}}
                                        </tr>
                                        @foreach ($orden->ordenes_servicios as $servicio)
                                            <tr>
                                                <td class="content-cell" align="left" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    {{ $servicio->descripcion }}
                                                </td>
                                                <td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    {{ $servicio->pivot->cantidad }}
                                                </td>
                                                <td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    {{ number_format(($servicio->precio_venta), 0, ',', '.') }}
                                                </td>
                                                <td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    {{ number_format(($servicio->precio_venta * $servicio->pivot->cantidad), 0, ',', '.') }}
                                                </td>
                                                {{--<td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    SI
                                                </td>--}}
                                            </tr>
                                        @endforeach
                                        @foreach ($orden->ordenes_repuestos as $repuesto)
                                            <tr>
                                                <td class="content-cell" align="left" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    {{ $repuesto->descripcion }}
                                                </td>
                                                <td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    {{ $repuesto->pivot->cantidad }}
                                                </td>
                                                <td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    {{ number_format($repuesto->precio_venta, 0, ',', '.') }}
                                                </td>
                                                <td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    {{ number_format(($repuesto->precio_venta * $repuesto->pivot->cantidad), 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tfooter>
                                            <tr>
                                                <td colspan="3" class="content-cell" align="left" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    <b>Total</b>
                                                </td>
                                                <td class="content-cell" align="center" style="box-sizing:
                                            border-box; font-family: -apple-system, BlinkMacSystemFont,
                                            'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji',
                                            'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; ">
                                                    <b>{{ number_format(($orden->importe_total), 0, ',', '.') }}</b>
                                                </td>
                                            </tr>
                                        </tfooter>
                                    </table>
                                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Gracias,<br>
                                        Atelier</p>



                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative;">
                        <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px; margin: 0 auto; padding: 0; text-align: center; width: 570px;">
                            <tr>
                                <td class="content-cell" align="center" style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; max-width: 100vw; padding: 32px;">
                                    <p style="box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; line-height: 1.5em; margin-top: 0; color: #b0adc5; font-size: 12px; text-align: center;">© 2021 Atelier. All rights reserved.</p>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
