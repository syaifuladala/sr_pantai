@extends('template/header')

@section('container')

<div class="container">
    <center>
        <h5>Hasil Rekomendasi</h5><br>
    </center>

    <table width="100%" class="table">
        <tr align="center">
            <td colspan="3" align="center"><b>DENGAN SENTIMEN (Kriteria Opini)</b></td>
            <td></td>
            <td colspan="3" align="center"><b>TANPA SENTIMEN (Kriteria Non-Opini)</b></td>
        </tr>
        <tr align="center">
            <td>Peringkat</td>
            <td>Nama Pantai</td>
            <td>Nilai Fire Strength</td>
            <td width="5%"> - </td>
            <td>Peringkat</td>
            <td>Nama Pantai</td>
            <td>Nilai Fire Strength</td>
        </tr>
        <?php $konsisten = 0;
        for ($i = 0; $i < $jumlah; $i++) {
            if ($firestrength[$i]->id_pantai == $fscrank[$i]->id_pantai) {
                $konsisten = $konsisten + 1;
                $color = "#cecece";
            } else {
                $color = "#FFFBF5";
            } ?>
            <tr style="background-color:<?= $color ?>" align="center">
                <td>{{$i+1}}</td>
                <td align="left">{{$firestrength[$i]->nama}}</td>
                <td>{{$firestrength[$i]->firestrength}}</td>
                <td width="5%"> </td>
                <td>{{$i+1}}</td>
                <td align="left">{{$fscrank[$i]->nama}}</td>
                <td>{{$fscrank[$i]->fscrank}}</td>
            </tr>
        <?php } ?>
    </table>

    <br>
    <center>
        <h4>Consistency Rank</h4><br>
        <h5>Jumlah Data Konsisten / Jumlah Data x 100 =</h5>
        <h5><?= "(" . $konsisten . " / " . $jumlah . ") x 100 = " . round($konsisten / $jumlah * 100, 2); ?>%</h5><br>
    </center>

</div>

@endsection