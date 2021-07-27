@extends('template/header')

@section('container')

@foreach ($pantai as $pantai)

<div class="container">
    <center>
        <h3>Pantai {{ $pantai->nama }}</h3>
        <img src="/storage/<?= $pantai->gambar ?>" style="width:60%;height:300px;">
        <p><?= $pantai->latitude; ?> , <?= $pantai->longitude; ?></p>
    </center>
    <table border="0" class="table" width="100%">
        <tr>
            <td colspan="2" class="header-detail-tabel">
                <h5>Alamat Lengkap</h5>
            </td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td>
                <table width="100%">
                    <tr>
                        <td><?= $pantai->alamat; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2" class="header-detail-tabel">
                <h5>Tingkat Penyebaran Covid-19</h5>
            </td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td>
                <table width="100%">
                    <tr>
                        <td width="30%">Kecamatan</td>
                        <td><?= $pantai->kecamatan; ?></td>
                    </tr>
                    <tr>
                        <td>Positif aktif (dirawat)</td>
                        <td><?= $pantai->positif; ?></td>
                    </tr>
                    <tr>
                        <td>Sembuh</td>
                        <td><?= $pantai->sembuh; ?></td>
                    </tr>
                    <tr>
                        <td>Meninggal</td>
                        <td><?= $pantai->meninggal; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2" class="header-detail-tabel">
                <h5>Protokol Kesehatan</h5>
            </td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td>
                <table width="100%" border="0">
                    @foreach ($prokes as $prokes)
                    <tr>
                        <td width="70%"><?= $prokes->prokes; ?></td>
                        <td width="30%" align="center"><?php if ($prokes_pantai[$loop->iteration - 1]->status == "1") {
                                                            echo "Ada";
                                                        } else {
                                                            echo "Tidak";
                                                        } ?></td>
                    </tr>
                    @endforeach
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2" class="header-detail-tabel">
                <h5>Sentimen Publik</h5>
            </td>
        </tr>
        <tr>
            <td width="5%"></td>
            <td>
                <table width="100%">
                    <tr>
                        <td width="30%">Positif</td>
                        <td><?= $pantai->s_positif." ulasan (".round($pantai->s_positif / $pantai->s_total * 100 , 2)."%)"; ?></td>
                    </tr>
                    <tr>
                        <td>Negatif</td>
                        <td><?= $pantai->s_negatif." ulasan (".round($pantai->s_negatif / $pantai->s_total * 100 , 2)."%)"; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <br><br>
                <a href="{{ url('/home') }}"><button class="btn btn-primary">Kembali ke Beranda</button></a>
            </td>
        </tr>
    </table>
</div>

@endforeach

@endsection