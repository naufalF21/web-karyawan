<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permohonan Cuti</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .text-center {
            text-align: center;
        }

        p {
            margin-block-start: 0.3rem;
            margin-block-end: 0.3rem;
        }

        .mb-1 {
            margin-bottom: 1.5rem;
        }

        .mb-2 {
            margin-bottom: 3rem;
        }

        .mb-5 {
            margin-bottom: 5rem;
        }

        .pr-15 {
            padding-right: 15rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h4 class="uppercase text-center">Surat Permohonan Cuti</h4>
        <div class="mb-1">
            <p>Hal : Permohonan Cuti {{ $data->jenis }}</p>
            <p>Tanggal : {{ $data->created_at->format('F d, Y') }}</p>
        </div>
        <div class="mb-1">
            <p>Kepada Yth.</p>
            <p>CEO Algostudio</p>
        </div>
        <div class="mb-1">
            <p>Dengan Hormat,</p>
            <p>Yang bertanda tangan di bawah ini</p>
        </div>
        <div class="mb-1">
            <p>Nama : {{ $data->user->name }}</p>
            <p>Email : {{ $data->user->email }}</p>
            <p>Handphone : {{ $data->user->contact }}</p>
            <p>Divisi : {{ $data->user->divisi }}</p>
            @if ($data->jenis == 'Harian')
                <p>Keterangan : {{ $data->keterangan }}</p>
            @endif
        </div>
        <div class="mb-1">
            @if ($data->jenis == 'Harian')
                <p>Bermaksud mengajukan cuti Perjam dari jam {{ $data->mulai_jam_cuti }} s/d
                    jam {{ $data->sd_jam_cuti }}</p>
            @else
                <p>Bermaksud mengajukan cuti Harian ({{ $data->jenis }}) dari tanggal {{ $data->tanggal }} s/d
                    tanggal {{ $data->sd_tanggal }}</p>
            @endif

        </div>
        <div class="mb-1">
            <p>
                Demikian Permohonan ini saya sampaikan untuk mendapat tindakan lanjut, atas perhatianya
                saya ucapkan terimakasih.
            </p>
        </div>
        <div>
            <table class="text-center" style="margin: 0 auto;">
                <tr>
                    <td class="pr-15">
                        Menyetujui, <br />
                        CEO Algostudio
                    </td>
                    <td>Hormat Saya,</td>
                </tr>
                <tr>
                    <td><br><br><br><br></td>
                </tr>
                <tr>
                    <td class="pr-15">M. Faizal Sukma Dika</td>
                    <td>{{ $data->user->name }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
