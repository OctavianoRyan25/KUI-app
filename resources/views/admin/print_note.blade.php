<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Notulensi {{ $notulensi->event->nomor_rapat }}</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      margin: 2.54cm;
      font-family: arial, sans-serif;
      font-size: 10pt;
      line-height: 1.15;
    }

    @page {
      margin: 2.54cm 0;
    }

    header {
      opacity: .5;
      position: fixed;
      top: 1.25cm;
      left: 2.54cm;
    }
    header img:first-child {
      width: 1.66cm;
    }
    header img:last-child {
      width: 1.1cm;
      position: relative;
      top: -1px;
      left: 5px;
    }

    h1 {
      font-size: 13pt;
      text-align: center
    }

    table {
      width: 100% !important;
      border-collapse: collapse;
    }

    .details td {
      padding: 0 .5em;
      border: 1px solid black;
    }
    .details td:first-child,
    .details td:nth-child(4) {
      border-right: none;
    }
    .details td:nth-child(2),
    .details td:nth-child(5) {
      padding: 0;
      border-right: none;
      border-left: none;
    }
    .details td:nth-child(3),
    .details td:last-child {
      border-left: none;
    }

    .content-header th {
      border: 1px solid black;
      border-bottom: none;
    }
    .content-header th:first-child,
    .content td:first-child {
      width: 8%;
    }
    .content-header th:nth-child(2),
    .content td:nth-child(2) {
      width: 35%;
    }
    .content-header th:last-child,
    .content td:last-child {
      width: 57%;
    }

    .content td {
      padding: .5em .5em;
      border: 1px solid black;
    }
    .content td:first-child,
    .content td:nth-child(2) {
      text-align: center
    }
    .content .no-content td {
      height: 18.39cm;
    }

    .presence {
      width: 18% !important;
    }
    .presence td:last-child {
      padding: 0 0.5em;
    }

    .notulis-mark {
      text-align: center;
      float: right;
    }

    .opacity-0 {
      opacity: 0;
    }
  </style>
</head>
<body>
  <header>
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/logo-udinus.png'))) }}" alt="Logo UDINUS">
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/unggul.png'))) }}" alt="Logo Unggul">
  </header>

  <h1>NOTULEN RAPAT</h1>

  <table class="details">
    <tr>
      <td>Hari/tanggal</td>
      <td>:</td>
      <td>{{ Carbon\Carbon::parse($notulensi->event->tanggal_rapat)->translatedFormat('l/d F Y') }}</td>
      <td>Tempat</td>
      <td>:</td>
      <td>{{ $notulensi->event->tempat_rapat }}</td>
    </tr>
    <tr>
      <td>Perihal</td>
      <td>:</td>
      <td>{{ $notulensi->event->hal }}</td>
      <td>Halaman</td>
      <td>:</td>
      <td><span class="opacity-0">iiiiii</span> dari <span class="opacity-0">iiiiii</span></td>
    </tr>
  </table>

  <br>

  <div class="content">
    <table class="content-header">
      <th>No.</th>
      <th>Topik</th>
      <th>Pembahasan</th>
    </table>
    @if ($notulensi->content)
      {!! $notulensi->content !!}
    @else
      <table class="no-content">
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </table>
      <br>
    @endif
  </div>

  <table class="presence">
    <tr>
      <td>Hadir</td>
      <td>:</td>
      <td>{{ $present }}</td>
    </tr>
    <tr>
      <td>Tidak hadir</td>
      <td>:</td>
      <td>{{ $no_present }}</td>
    </tr>
  </table>

  <div class="notulis-mark">
    <p>Semarang, {{ Carbon\Carbon::parse($notulensi->event->tanggal_rapat)->translatedFormat('d F Y') }}</p>
    <p>Notulis,</p>
    <br><br>
    <p>(&Tab; <span class="opacity-0">{{ $notulensi->event->responsible }}</span> &Tab;)</p>
  </div>
</body>
</html>