@extends('template/header')

@section('container')


<div class="container">
    <!-- LIST PANTAI -->
    <div class="content">

        <!-- SEARCH TOOLS -->
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Pantai..">

        <table class="myTable" id="myTable">

            @foreach ($pantai as $data)
            <tr class="list-pantai">
                <td width="10%">
                    <a href="{{ url('/detail/'.$data->id) }}"><img src="/storage/{{ $data->gambar }}"></a>
                </td>
                <td width="90%">
                    <a href="{{ url('/detail/'.$data->id) }}">
                        <h5 class="mb-1">Pantai {{ $data->nama }}</h5>
                    </a>
                    <small class="text-muted">{{ $data->latitude }} , {{ $data->longitude }}</small>
                    <p class="mb-1">{{ $data->alamat }}</p>

                    <div class="flex-container">
                        <div class="kriteria-bar">
                            <small> Penyebaran Covid-19 </small>
                            <div class="w3-light-grey w3-tiny">
                                <div class="w3-container w3-blue" style="width:<?= round(($data->positif / $max_covid) * 100 , 2); ?>%"><span>{{ $data->positif }}</span></div>
                            </div>
                            <small>Protokol Kesehatan</small>
                            <div class="w3-light-grey w3-tiny">
                                <div class="w3-container w3-blue" style="width:<?= round(($jml_prokes[$data->id] / $max_prokes) * 100 ,2); ?>%"><span><?= $jml_prokes[$data->id]; ?></span></div>
                            </div>
                            <small>Sentimen Publik</small>
                            <div class="w3-light-grey w3-tiny">
                                <div class="w3-container w3-blue" style="width:<?= round(($data->s_positif / $data->s_total)*100 , 2); ?>%"><span>{{ round(($data->s_positif / $data->s_total)*100 , 2) }}</span></div>
                            </div>
                        </div>
                        <div class="detail-button">
                            <a href="{{ url('/detail/'.$data->id) }}"><button class="btn btn-outline-primary">Lihat Detail</button></a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>



<script>
    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
<style>
    #myInput {
        background-image: url('/css/searchicon.png');
        /* Add a search icon to input */
        background-position: 10px 12px;
        /* Position the search icon */
        background-repeat: no-repeat;
        /* Do not repeat the icon image */
        width: 100%;
        /* Full-width */
        font-size: 16px;
        /* Increase font-size */
        padding: 12px 20px 12px 40px;
        /* Add some padding */
        border: 1px solid #ddd;
        /* Add a grey border */
        margin-bottom: 12px;
        /* Add some space below the input */
    }

    #myTable {
        border-collapse: collapse;
        /* Collapse borders */
        width: 100%;
        /* Full-width */
        border: 1px solid #ddd;
        /* Add a grey border */
        font-size: 18px;
        /* Increase font-size */
    }

    #myTable th,
    #myTable td {
        text-align: left;
        /* Left-align text */
        padding: 12px;
        /* Add padding */
    }

    #myTable tr {
        /* Add a bottom border to all table rows */
        border-bottom: 1px solid #ddd;
    }

    #myTable tr.header,
    #myTable tr:hover {
        /* Add a grey background color to the table header and on hover */
        background-color: #f1f1f1;
    }
</style>
@endsection