<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pago</title>
    <style>
        @media print {
            body {
                margin: 0.5cm;
                padding: 0;
            }
            .receipt-container {
                page-break-inside: avoid !important;
            }
            .no-print {
                display: none;
            }
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .receipt-wrapper {
            width: 100%;
            margin: 0 auto;
        }
        .receipt-container {
            border: 1px solid #eee;
            padding: 20px;
            margin-bottom: 25px;
        }
        .header-table {
            width: 100%;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .header-table td {
            vertical-align: middle;
        }
        .logo {
            width: 80px;
        }
        .school-info {
            text-align: center;
        }
        .receipt-title {
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            margin: 0;
        }
        .receipt-meta {
            text-align: right;
        }
        .codigo-box {
            border: 1px dashed #333;
            padding: 8px;
            font-size: 11pt;
            text-align: center;
            width: 130px;
            margin-top: 10px;
            display: inline-block;
        }
        .info-section {
            margin-top: 20px;
        }
        .info-table {
            width: 100%;
        }
        .info-table td {
            padding: 4px 8px;
            font-size: 11pt;
        }
        .payment-section-title {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        .payment-table {
            width: 100%;
            border-collapse: collapse;
        }
        .payment-table th, .payment-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            font-size: 11pt;
        }
        .payment-table th {
            background-color: #f9f9f9;
        }
        .separator {
            border-top: 2px dashed #000;
            margin: 30px 0;
        }
    </style>
</head>

<body>
    <div class="receipt-wrapper">
        <div class="receipt-container">
            <table class="header-table">
                <tr>
                    <td style="width: 25%; text-align: left;">
                        <img src="{{ url($configuracion->logo) }}" alt="Logo" class="logo">
                    </td>
                    <td style="width: 50%;" class="school-info">
                        <div class="receipt-title">COMPROBANTE DE PAGO</div>
                        <b>{{ $configuracion->nombre }}</b><br>
                        {{ $configuracion->Direccion }}<br>
                        {{ $configuracion->telefono }}
                    </td>
                    <td style="width: 25%;" class="receipt-meta">
                        <p><b>ORIGINAL</b></p>
                        <div class="codigo-box">
                            <b>Código:</b><br>
                            COD-{{ $pago->id }}
                        </div>
                    </td>
                </tr>
            </table>

            <div class="info-section">
                <table class="info-table">
                    <tr>
                        <td><b>Gestión:</b> {{ $matricula->gestion->nombre }}</td>
                        <td><b>Nombres:</b> {{ $matricula->estudiante->nombres }}</td>
                    </tr>
                    <tr>
                        <td><b>Turno:</b> {{ $matricula->turno->nombre }}</td>
                        <td><b>Apellidos:</b> {{ $matricula->estudiante->apellidos }}</td>
                    </tr>
                    <tr>
                        <td><b>Nivel:</b> {{ $matricula->nivel->nombre }}</td>
                        <td><b>C.I.:</b> {{ $matricula->estudiante->ci }}</td>
                    </tr>
                    <tr>
                        <td><b>Grado:</b> {{ $matricula->grado->nombre }}</td>
                        <td><b>Paralelo:</b> {{ $matricula->paralelo->nombre }}</td>
                    </tr>
                </table>
            </div>

            <div class="payment-section-title">DETALLES DEL PAGO</div>
            <table class="payment-table">
                <thead>
                    <tr>
                        <th>Monto</th>
                        <th>Método de Pago</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pago->monto }}</td>
                        <td>{{ $pago->metodo_pago }}</td>
                        <td>{{ $pago->descripcion }}</td>
                        <td>{{ $pago->fecha_pago }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="separator no-print"></div>

        <div class="receipt-container">
            <table class="header-table">
                <tr>
                    <td style="width: 25%; text-align: left;">
                        <img src="{{ url($configuracion->logo) }}" alt="Logo" class="logo">
                    </td>
                    <td style="width: 50%;" class="school-info">
                        <div class="receipt-title">COMPROBANTE DE PAGO</div>
                        <b>{{ $configuracion->nombre }}</b><br>
                        {{ $configuracion->Direccion }}<br>
                        {{ $configuracion->telefono }}
                    </td>
                    <td style="width: 25%;" class="receipt-meta">
                        <p><b>COPIA</b></p>
                        <div class="codigo-box">
                            <b>Código:</b><br>
                            COD-{{ $pago->id }}
                        </div>
                    </td>
                </tr>
            </table>

            <div class="info-section">
                <table class="info-table">
                    <tr>
                        <td><b>Gestión:</b> {{ $matricula->gestion->nombre }}</td>
                        <td><b>Nombres:</b> {{ $matricula->estudiante->nombres }}</td>
                    </tr>
                    <tr>
                        <td><b>Turno:</b> {{ $matricula->turno->nombre }}</td>
                        <td><b>Apellidos:</b> {{ $matricula->estudiante->apellidos }}</td>
                    </tr>
                    <tr>
                        <td><b>Nivel:</b> {{ $matricula->nivel->nombre }}</td>
                        <td><b>C.I.:</b> {{ $matricula->estudiante->ci }}</td>
                    </tr>
                    <tr>
                        <td><b>Grado:</b> {{ $matricula->grado->nombre }}</td>
                        <td><b>Paralelo:</b> {{ $matricula->paralelo->nombre }}</td>
                    </tr>
                </table>
            </div>

            <div class="payment-section-title">DETALLES DEL PAGO</div>
            <table class="payment-table">
                <thead>
                    <tr>
                        <th>Monto</th>
                        <th>Método de Pago</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pago->monto }}</td>
                        <td>{{ $pago->metodo_pago }}</td>
                        <td>{{ $pago->descripcion }}</td>
                        <td>{{ $pago->fecha_pago }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
