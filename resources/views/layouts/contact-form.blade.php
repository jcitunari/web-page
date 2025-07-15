
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Mensaje desde formulario de contacto</title>
</head>


<div width="100%" style="margin:0; padding:0; background-color:#f2f2f2">
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="500" style="margin: 0 auto">
        <tbody>
            <tr>
                <td style="padding: 20px 0; background-color:#f2f2f2">
                
                </td>
            </tr>
            <tr><td align="center" style="padding:0;font-family: sans-serif;font-size:18px;background-color:#f2f2f2;color:#262626;text-align:center;margin:0"><b>NUEVO MENSAJE DESDE EL SITIO WEB<br>jcitunari.com/postulacion</b></td></tr>
        </tbody>
    </table>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="500" style="margin: 0 auto">
        <tbody>
            <tr>
                <td style="padding: 10px 0; background-color:#f2f2f2"></td>
                <td style="padding: 10px 0; background-color:#f2f2f2"></td>
            </tr>
            <tr>
                <td width="25%" style="padding:10px;font-family: sans-serif;font-size:16px;background-color:#f2f2f2;color:#262626;margin:0"><b>Nombre:</b></td>
                <td width="75%" style="padding:10px;font-family: sans-serif;font-size:16px;background-color:#f2f2f2;color:#262626;margin:0">{{ $data['name'] }}</td>
            </tr>
            <tr>
                <td width="25%" style="padding:10px;font-family: sans-serif;font-size:16px;background-color:#f2f2f2;color:#262626;margin:0"><b>Asunto:</b></td>
                <td width="75%" style="padding:10px;font-family: sans-serif;font-size:16px;background-color:#f2f2f2;color:#262626;margin:0">{{ $data['subject'] }}</td>
            </tr>
            <tr>
                <td width="25%" style="padding:10px;font-family: sans-serif;font-size:16px;background-color:#f2f2f2;color:#262626;margin:0"><b>Mensaje:</b></td>
                <td width="75%" style="padding:10px;font-family: sans-serif;font-size:16px;background-color:#f2f2f2;color:#262626;margin:0">{{ $data['message'] }}</td>
            </tr>
            <tr>
                <td width="25%" style="padding:10px;font-family: sans-serif;font-size:16px;background-color:#f2f2f2;color:#262626;margin:0"><b>Celular:</b></td>
                <td width="75%" style="padding:10px;font-family: sans-serif;font-size:16px;background-color:#f2f2f2;color:#262626;margin:0">{{ $data['phone'] }}</td>
            </tr>
            <tr>
                <td width="25%" style="padding:10px;font-family: sans-serif;font-size:16px;background-color:#f2f2f2;color:#262626;margin:0"><b>Email:</b></td>
                <td width="75%" style="padding:10px;font-family: sans-serif;font-size:16px;background-color:#f2f2f2;color:#262626;margin:0">{{ $data['email'] }}</td>
            </tr>
            
        </tbody>
    </table>
    <table align="center" cellspacing="0" cellpadding="0" border="0" width="500" style="margin: 0 auto">
        <tbody>
            <tr>
                <td style="padding: 20px 0; background-color:#f2f2f2">
                
                </td>
            </tr>
            <tr><td align="center" style="padding:0;background-color:#f2f2f2;color:#262626;text-align:center;margin:0"><img src="{{ url('/') }}/images/logos/logo.png" alt="" width="50%" height=""></td></tr>
            <td style="padding: 20px 0; background-color:#f2f2f2">
                
            </td>
        </tbody>
    </table>
</div>

