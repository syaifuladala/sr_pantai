@extends('template/header')

@section('container')

<script type="text/javascript">
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer1", {
            animationEnabled: true,
            data: [{
                    type: "line",
                    dataPoints: [{
                            y: 1,
                            x: <?= $request->covidrendaha; ?>
                        },
                        {
                            y: 0,
                            x: <?= $request->covidrendahb; ?>
                        }
                    ]
                }, {
                    type: "line",
                    dataPoints: [{
                            y: 0,
                            x: <?= $request->covidsedanga; ?>
                        },
                        {
                            y: 1,
                            x: <?= ($request->covidsedanga + $request->covidsedangb) / 2; ?>
                        },
                        {
                            y: 0,
                            x: <?= $request->covidsedangb; ?>
                        }

                    ]
                },
                {
                    type: "line",
                    dataPoints: [{
                            y: 0,
                            x: <?= $request->covidtinggia; ?>
                        },
                        {
                            y: 1,
                            x: <?= $request->covidtinggib; ?>
                        }
                    ]
                }
            ]
        });

        // PROKES
        var chart2 = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            data: [{
                    type: "line",
                    dataPoints: [{
                            y: 1,
                            x: <?= $request->prokeslonggara; ?>
                        },
                        {
                            y: 0,
                            x: <?= $request->prokeslonggarb; ?>
                        }
                    ]
                }, {
                    type: "line",
                    dataPoints: [{
                            y: 0,
                            x: <?= $request->prokesstandara; ?>
                        },
                        {
                            y: 1,
                            x: <?= ceil(($request->prokesstandara + $request->prokesstandarb) / 2); ?>
                        },
                        {
                            y: 0,
                            x: <?= $request->prokesstandarb; ?>
                        }

                    ]
                },
                {
                    type: "line",
                    dataPoints: [{
                            y: 0,
                            x: <?= $request->prokesketata; ?>
                        },
                        {
                            y: 1,
                            x: <?= $request->prokesketatb; ?>
                        }
                    ]
                }
            ]
        });

        // SENTIMEN
        var chart3 = new CanvasJS.Chart("chartContainer3", {
            animationEnabled: true,
            data: [{
                    type: "line",
                    dataPoints: [{
                            y: 1,
                            x: <?= $request->sentimenburuka; ?>
                        },
                        {
                            y: 0,
                            x: <?= $request->sentimenburukb; ?>
                        }
                    ]
                }, {
                    type: "line",
                    dataPoints: [{
                            y: 0,
                            x: <?= $request->sentimencukupa; ?>
                        },
                        {
                            y: 1,
                            x: <?= ($request->sentimencukupa + $request->sentimencukupb) / 2; ?>
                        },
                        {
                            y: 0,
                            x: <?= $request->sentimencukupb; ?>
                        }

                    ]
                },
                {
                    type: "line",
                    dataPoints: [{
                            y: 0,
                            x: <?= $request->sentimenbaika; ?>
                        },
                        {
                            y: 1,
                            x: <?= $request->sentimenbaikb; ?>
                        }
                    ]
                }
            ]
        });
        chart.render();
        chart2.render();
        chart3.render();
    }
</script>

<div class="container">

    <table width="99%">
        <tr align="center">
            <td width="33%">
                <h5>Penyebaran Covid</h5>
            </td>
            <td width="33%">
                <h5>Protokol Kesehatan</h5>
            </td>
            <td width="33%">
                <h5>Sentimen Publik</h5>
            </td>
        </tr>
        <tr align="center">
            <td>
                <div id="chartContainer1" style="height: 150px; width: 95%;"></div>
            </td>
            <td>
                <div id="chartContainer2" style="height: 150px; width: 95%;"></div>
            </td>
            <td>
                <div id="chartContainer3" style="height: 150px; width: 95%;"></div>
            </td>
        </tr>
    </table>



    <br><br>
    <h5>Tabel Derajat Keanggotaan</h5>
    <table class="table" width=100%>
        <tr align="center">
            <td rowspan="2">No</td>
            <td rowspan="2" width="15%">Nama Pantai</td>
            <td colspan="3">Persebaran Covid</td>
            <td colspan="3">Protokol Kesehatan</td>
            <td colspan="3">Sentimen Publik</td>
            <td>FireStrength</td>
        </tr>
        <tr>
            <td>Rendah</td>
            <td>Sedang</td>
            <td>Tinggi</td>
            <td>Longgar</td>
            <td>Standar</td>
            <td>Ketat</td>
            <td>Buruk</td>
            <td>Biasa</td>
            <td>Baik</td>
        </tr>
        @foreach ($derajat_keanggotaan as $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->covid_rendah}}</td>
            <td>{{$data->covid_sedang}}</td>
            <td>{{$data->covid_tinggi}}</td>
            <td>{{$data->prokes_longgar}}</td>
            <td>{{$data->prokes_standar}}</td>
            <td>{{$data->prokes_ketat}}</td>
            <td>{{$data->sentimen_buruk}}</td>
            <td>{{$data->sentimen_cukup}}</td>
            <td>{{$data->sentimen_baik}}</td>
            <td>{{$data->firestrength}}</td>
        </tr>
        @endforeach
    </table>


    <h5>Hasil Rekomendasi</h5>
    <table class="table" width="100%">
        <tr>
            <td>Peringkat</td>
            <td>Nama Pantai</td>
            <td>Nilai Fire Strength</td>
            <td>Detail</td>
        </tr>
        @foreach ($rekomendasi as $rekomendasi)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$rekomendasi->nama}}</td>
            <td>{{$rekomendasi->firestrength}}</td>
            <td width="15%"><a href="{{ url('/detail/'.$data->id) }}"><button class="btn btn-primary" width="100%">Detail</button></a></td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4">
                <a href="{{url('crank')}}"><button class="btn btn-primary" width="100%">Cek Consistency Rank</button></a>
            </td>
        </tr>
    </table>

</div>

@endsection