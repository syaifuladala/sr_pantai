@extends('template/header')

@section('container')

<div class="container">
    <form action="{{ url('/hasil') }}" method="POST">
    @csrf
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Petunjuk Input Batas Data
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                    <div  class="img-petunjuk1">
                        <img src="storage/image/petunjuk1.png">
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="input-domain">
            <table class="table" width=100%>
                <tr>
                    <th colspan="2">Persebaran Covid</th>
                    <th colspan="2">Protokol Kesehatan</th>
                    <th colspan="2">Sentimen Publik</th>
                </tr>
                <tr>
                    <td width="15%">Rendah</td>
                    <td width="18%" align="right">
                        <input type="number" step="1" min="0" max="200" name="covidrendaha" value="<?=$min_covid;?>">
                        <input type="number" step="1" min="0" max="500" name="covidrendahb" value="<?=$max_covid;?>">
                    </td>
                    <td width="15%">Longgar</td>
                    <td width="18%" align="right">
                        <input type="number" step="1" min="0" max="11" name="prokeslonggara" value="<?=$min_prokes;?>">
                        <input type="number" step="1" min="0" max="11" name="prokeslonggarb" value="<?=$max_prokes?>">
                    </td>
                    <td width="16%">Buruk</td>
                    <td width="18%" align="right">
                        <input type="number" step="1" min="0" max="100" name="sentimenburuka" value="<?=$min_sentimen;?>">
                        <input type="number" step="1" min="0" max="100" name="sentimenburukb" value="<?=$max_sentimen;?>">
                    </td>
                </tr>
                <tr>
                    <td width="15%">Sedang</td>
                    <td width="18%" align="right">
                        <input type="number" step="1" min="0" max="200" name="covidsedanga" value="<?=$min_covid;?>">
                        <input type="number" step="1" min="0" max="500" name="covidsedangb" value="<?=$max_covid;?>">
                    </td>
                    <td width="15%">Standar</td>
                    <td width="18%" align="right">
                        <input type="number" step="1" min="0" max="11" name="prokesstandara" value="<?=$min_prokes;?>">
                        <input type="number" step="1" min="0" max="11" name="prokesstandarb" value="<?=$max_prokes;?>">
                    </td>
                    <td width="16%">Cukup</td>
                    <td width="18%" align="right">
                        <input type="number" step="1" min="0" max="100" name="sentimencukupa" value="<?=$min_sentimen;?>">
                        <input type="number" step="1" min="0" max="100" name="sentimencukupb" value="<?=$max_sentimen;?>">
                    </td>
                </tr>
                <tr>
                    <td width="15%">Tinggi</td>
                    <td width="18%" align="right">
                        <input type="number" step="1" min="0" max="200" name="covidtinggia" value="<?=$min_covid;?>">
                        <input type="number" step="1" min="0" max="500" name="covidtinggib" value="<?=$max_covid;?>">
                    </td>
                    <td width="15%">Ketat</td>
                    <td width="18%" align="right">
                        <input type="number" step="1" min="0" max="11" name="prokesketata" value="<?=$min_prokes;?>">
                        <input type="number" step="1" min="0" max="11" name="prokesketatb" value="<?=$max_prokes;?>">
                    </td>
                    <td width="16%">Baik</td>
                    <td width="18%" align="right">
                        <input type="number" step="1" min="0" max="100" name="sentimenbaika" value="<?=$min_sentimen;?>">
                        <input type="number" step="1" min="0" max="100" name="sentimenbaikb" value="<?=$max_sentimen;?>">
                    </td>
                </tr>
            </table>
        </div>


        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Petunjuk Input Data Parameter Kriteria
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                    <div  class="img-petunjuk2">
                        <img src="storage/image/petunjuk2.png">
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- INPUT -->
        <div class="input-parameter">
            <table width=100%>
                <tr>
                    <td width="25%" align="center">
                        <label>Persebaran Covid</label>
                        <select class="form-control" name="covid">
                            <option selected hidden>Kriteria</option>
                            <option value="covid_rendah">Rendah</option>
                            <option value="covid_sedang">Sedang</option>
                            <option value="covid_tinggi">Tinggi</option>
                        </select>
                    </td>
                    <td width="12,5%" align="center">
                        <label>_</label>
                        <select class="form-control" name="operator1">
                            <option selected hidden>Operator</option>
                            <option value="and">AND</option>
                            <option value="or">OR</option>
                        </select>
                    </td>
                    <td width="25%" align="center">
                        <label>Jumlah Prokes</label>
                        <select class="form-control" name="prokes">
                            <option selected hidden>Kriteria</option>
                            <option value="prokes_longgar">Longgar</option>
                            <option value="prokes_standar">Standar</option>
                            <option value="prokes_ketat">Ketat</option>
                        </select>
                    </td>
                    <td width="12,5%" align="center">
                        <label>_</label>
                        <select class="form-control" name="operator2">
                            <option selected hidden>Operator</option>
                            <option value="and">AND</option>
                            <option value="or">OR</option>
                        </select>
                    </td>
                    <td width="25%" align="center">
                        <label>Sentimen Publik</label>
                        <select class="form-control" name="sentimen">
                            <option selected hidden>Kriteria</option>
                            <option value="sentimen_buruk">Buruk</option>
                            <option value="sentimen_cukup">Cukup</option>
                            <option value="sentimen_baik">Baik</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="center">
                        <div class="button-rekomendasi">
                            <button type="submit" class="btn btn-outline-primary">Buat Rekomendasi</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <!-- END INPUT -->
    </form>
</div>

@endsection