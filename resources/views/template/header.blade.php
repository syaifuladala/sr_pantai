<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">

    <!-- MAPS API -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <!-- LINE CHART -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <title>Rekomendasi Pantai Jogja</title>
</head>

<body>
    <div class="card">
        <img class="card-img-top" src="/storage/image/card_background.png">
        <div class="card-img-overlay">

            <div class="heading">
                <h2>Sistem Rekomendasi Wisata Pantai Yogyakarta</h2>
                <h5>kasus New Normal Pandemi Covid-19</h5>

            </div>
            <div class="button-nav">
                <table width="100%">
                    <tr>
                        <td width="43%" align="right"><a href="{{ url('/home') }}"><button><img src="/storage/image/data_pantai.png"> Data Pantai</button></a></td>
                        <td width="4%" align="center"></td>
                        <td width="43%" align="left"><a href="{{ url('/rekomendasi') }}"><button><img src="/storage/image/rekomendasi.png">Rekomendasi</button></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    @yield('container')

    <!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXq6SrhkVUqLI4XqCDTmgpTizJLMzrv_o&callback=initMap" type="text/javascript"></script>

</body>

</html>