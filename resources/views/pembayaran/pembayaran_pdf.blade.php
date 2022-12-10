<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Custom Theme Style -->
  

    <title>Koperasi </title>
  </head>
  <style>
    h1{
        text-align: center;
    }
  </style>

  <div class="container-fluid">
    <h1>Faktur Invoice</h1>
    <hr>   

      @foreach($faktur as $index => $k) 
      <table style="width:100%">
        <tbody>
          <tr>
            <td style="width: 150px;">Kode Faktur</td>
            <td style="width: 20px;">:</td>
            <td> {{ $k->kode_faktur }}</td>
          </tr>
          <tr>
            <td style="width: 150px;">Nomor Faktur</td>
            <td style="width: 20px;">:</td>
            <td> {{ $k->nomor_faktur }}</td>
          </tr>
          <tr>
            <td style="width: 150px;">Nomor Tagihan</td>
            <td style="width: 20px;">:</td>
            <td> {{ $k->nomor_tagihan }}</td>
          </tr>
        <tr>
          <td style="width: 150px;">Tanggal Faktur</td>
          <td style="width: 20px;">:</td>
          <td>{{ $k->tanggal_faktur }}</td>
        </tr>
        <tr>
          <td style="width: 150px;">Tanggal Tagihan</td>
          <td style="width: 20px;">:</td>
          <td>{{ $k->tanggal_tagihan }}</td>
        </tr>
        <tr>
          <td style="width: 150px;">Uraian</td>
          <td style="width: 20px;">:</td>
          <td>{{ $k->uraian }}</td>
        </tr>
        <tr>
          <td style="width: 150px;">Nama Tujuan</td>
          <td style="width: 20px;">:</td>
          <td>{{ $k->nama_tujuan }}</td>
        </tr>
        <tr>
          <td style="width: 150px;">Nilai Tagihan</td>
          <td style="width: 20px;">:</td>
          <td>{{ $k->nilai_tagihan }}</td>
        </tr>
        </tbody>
    </table>
      @endforeach

      <div class="right" style="float: right; margin: 10% 10% 0px 0px; text-align:center">

      <p>
        <span>MANAGER</span>

        <br>
        <br>
        <br>
        <br>
        <br>
        <span>TEGUH SUPODO</span>
      </p>
    
    </div>

  </div>

  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5704997521.js" crossorigin="anonymous"></script>

      <!-- Custom Theme Scripts -->


  </body>
</html>