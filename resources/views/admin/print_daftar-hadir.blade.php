<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Daftar Hadir {{ $notulensi->event->nomor_rapat }}</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      margin: 4.5cm 2.54cm 4cm;
      font-family: 'Times New Roman', serif;
      font-size: 12pt;
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
      font-size: 12pt;
      text-align: center
    }

    table {
      width: 100% !important;
      border-collapse: collapse;
    }

    .details td {
      padding: 0 .5em;
    }
    .details tr td:nth-child(2),
    .details tr:first-child td:nth-child(5) {
      padding: 0;
    }

    .content-header {
      border: 1px solid black;
      border-bottom: none;
    }
    .content-header th:first-child,
    .content-header th:nth-child(2) {
      border-right: 1px solid black;
    }
    .content-header th:first-child {
      width: 1cm;
    }
    .content-header th:nth-child(2) {
      width: 8.59cm;
    }
    .content-header th:last-child {
      width: 6.25cm;
    }

    .main-content {
      border: 1px solid black;
    }
    .main-content td {
      padding: 7px 0;
      border-bottom: 1px solid black;
    }
    .main-content td:first-child {
      width: calc(1cm - 5px);
      padding-right: 5px;
      text-align: right;
      border-right: 1px solid black;
    }
    .main-content td:nth-child(2) {
      width: calc(8.59cm - 5px);
      padding-left: 5px;
      border-right: 1px solid black;
    }
    .main-content td:nth-child(3) {
      width: calc(6.25cm / 2 - 5px);
      padding-left: 5px;
      border-right: 1px solid black;
    }
    .main-content td:last-child {
      width: calc(6.25cm / 2 - 5px);
      padding-left: 5px;
    }

    .signature-container {
      position: relative;
    }
    .signature {
      width: 80px;
      position: absolute;
      top: 0;
    }
  </style>
</head>
<body>
  <header>
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/logo-udinus.png'))) }}" alt="Logo UDINUS">
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/unggul.png'))) }}" alt="Logo Unggul">
  </header>

  <h1>DAFTAR HADIR</h1>

  <br>

  <table class="details">
    <tr>
      <td>Hari/tanggal</td>
      <td>:</td>
      <td>{{ Carbon\Carbon::parse($notulensi->event->tanggal_rapat)->translatedFormat('l/d F Y') }}</td>
      <td>Perihal</td>
      <td>:</td>
      <td>{{ $notulensi->event->hal }}</td>
    </tr>
    <tr>
      <td>Tempat</td>
      <td>:</td>
      <td>{{ $notulensi->event->tempat_rapat }}</td>
    </tr>
  </table>

  <br>

  <div class="content">
    <table class="content-header">
      <th>No.</th>
      <th>Nama</th>
      <th>Tanda Tangan</th>
    </table>
    @if (count($event_peserta) > 0)
      <table class="main-content">
        @foreach ($event_peserta as $index => $e)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $e->pesertas->name }}</td>
            <td class="signature-container">
              @if (($index + 1) % 2 === 1)
                {{ $index + 1 }}
                @if ($e->signature)
                  <img src="#" alt="{{ $e->pesertas->name }}'s signature" class="signature">
                @endif
              @endif
            </td>
            <td class="signature-container">
              @if (($index + 1) % 2 === 0)
                {{ $index + 1 }}
                @if ($e->signature)
                  <img src="#" alt="{{ $e->pesertas->name }}'s signature" class="signature">
                @endif
              @endif
            </td>
          </tr>
        @endforeach
      </table>
    @else
      <table class="main-content">
        <tr>
          <td>1</td>
          <td></td>
          <td>1</td>
          <td></td>
        </tr>
        <tr>
          <td>2</td>
          <td></td>
          <td></td>
          <td>2</td>
        </tr>
        <tr>
          <td>3</td>
          <td></td>
          <td>3</td>
          <td></td>
        </tr>
        <tr>
          <td>4</td>
          <td></td>
          <td></td>
          <td>4</td>
        </tr>
        <tr>
          <td>5</td>
          <td></td>
          <td>5</td>
          <td></td>
        </tr>
        <tr>
          <td>6</td>
          <td></td>
          <td></td>
          <td>6</td>
        </tr>
        <tr>
          <td>7</td>
          <td></td>
          <td>7</td>
          <td></td>
        </tr>
        <tr>
          <td>8</td>
          <td></td>
          <td></td>
          <td>8</td>
        </tr>
        <tr>
          <td>9</td>
          <td></td>
          <td>9</td>
          <td></td>
        </tr>
        <tr>
          <td>10</td>
          <td></td>
          <td></td>
          <td>10</td>
        </tr>
        <tr>
          <td>11</td>
          <td></td>
          <td>11</td>
          <td></td>
        </tr>
        <tr>
          <td>12</td>
          <td></td>
          <td></td>
          <td>12</td>
        </tr>
        <tr>
          <td>13</td>
          <td></td>
          <td>13</td>
          <td></td>
        </tr>
        <tr>
          <td>14</td>
          <td></td>
          <td></td>
          <td>14</td>
        </tr>
        <tr>
          <td>15</td>
          <td></td>
          <td>15</td>
          <td></td>
        </tr>
        <tr>
          <td>16</td>
          <td></td>
          <td></td>
          <td>16</td>
        </tr>
        <tr>
          <td>17</td>
          <td></td>
          <td>17</td>
          <td></td>
        </tr>
        <tr>
          <td>18</td>
          <td></td>
          <td></td>
          <td>18</td>
        </tr>
        <tr>
          <td>19</td>
          <td></td>
          <td>19</td>
          <td></td>
        </tr>
        <tr>
          <td>20</td>
          <td></td>
          <td></td>
          <td>20</td>
        </tr>
      </table>
    @endif
  </div>
</body>
</html>