<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matricula</title>
</head>
<body>
    <table>
        <tr style="text-align: center; font-size: 8pt; width: 200%;">
            <td><img src="{{ url($configuracion->logo) }}" width="60px"><br>
                <b>{{ $configuracion->nombre }}</b><br>
                {{ $configuracion->Direccion }}<br>
                {{ $configuracion->telefono }}<br>
                {{ $configuracion->correo_electronico }}
            </td>
            <td style="width: 300px"><br><br><br><b><h2><u> MATRICULA DEL ESTUDIANTE</u></h2></b></td>
            <td style="width: 200px"><p>
                 FOTOGRAFIA</p>
                 <img src="{{ url($matriculacion->estudiante->foto) }}"  width="60px">
            </td>
        </tr>
    </table>
    <br>
    <table border="0" cellpadding="5" style="margin-left: 50px">
  <tr>
    <td style="width: 100px"><b>Gestión:</b></td>
    <td style="width: 170px">{{ $matriculacion->gestion->nombre }}</td>
    <td style="width: 100px"><b>Nombres:</b></td>
    <td style="width: 220px">{{ $matriculacion->estudiante->nombres }}</td>
  </tr>
  <tr>
    <td><b>Turno:</b></td>
    <td>{{ $matriculacion->turno->nombre }}</td>
    <td><b>Apellidos:</b></td>
    <td>{{ $matriculacion->estudiante->apellidos }}</td>
  </tr>
  <tr>
    <td><b>Nivel:</b></td>
    <td>{{ $matriculacion->nivel->nombre }}</td>
    <td><b>C.I.:</b></td>
    <td>{{ $matriculacion->estudiante->ci }}</td>
  </tr>
  <tr>
    <td><b>Grado:</b></td>
    <td>{{ $matriculacion->grado->nombre }}</td>
    <td><b>Género:</b></td>
    <td>{{ $matriculacion->estudiante->genero }}</td>
  </tr>
  <tr>
    <td><b>Paralelo:</b></td>
    <td>{{ $matriculacion->paralelo->nombre }}</td>
    <td><b>Teléfono:</b></td>
    <td>{{ $matriculacion->estudiante->telefono }}</td>
  </tr>
</table>
<hr>
    <p style="margin: 40px; text-align: justify;">
        <b>NORMAS PARA EL ESTUDIANTE:</b>
        <ol>
            <li>El estudiante debe portar este comprobante de matrícula en todo momento dentro de la unidad educativa.</li>
            <li>Los datos del comprobante deben ser verificados y actualizados en caso de cambios.</li>
            <li>La falsificación o alteración de este comprobante está prohibida y será sancionada.</li>
            <li>El comprobante debe presentarse ante cualquier autoridad educativa que lo solicite.</li>
            <li>En caso de extravío, comunicar inmediatamente a la dirección para su reposición.</li>
        </ol>
    </p>
    <br>
    {{ 'Fecha: '.now()->locale('es')->isoFormat('D \d\e MMMM \d\e YYYY') }}
    <br> <br>  <br>
    <table style="width: 100%; margin: 30px;">
        <tr>
            <td style="text-align: center;">
                ___________________________<br>
                <b>Firma del Director</b>
            </td>
            <td style="text-align: center;">
                ___________________________<br>
                <b>Firma del Profesor</b>
            </td>
        </tr>
    </table>
</body>
</html>
