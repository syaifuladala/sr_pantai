@extends('template/admin')

@section('container')

<div class="container">
    <table class="table" width="100%">
        <tr border-bottom="1">
            <td>
                <h5><b>Data Informasi Pantai</b></h5>
            </td>
            <td align="right" width=15%><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdataModal">Tambah Data</button></td>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>
    </table>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Pantai..">
    <table class="myTable" id="myTable">
        <tr class="header">
            <th width="2%">No</th>
            <th width="15%">Nama</th>
            <th width="4%">Latitude</th>
            <th width="4%">Longitude</th>
            <th width="10%">Kecamatan</th>
            <th width="40%">Alamat</th>
            <th width="25%">Aksi</th>
        </tr>
        @foreach($pantai as $pantai)
        <tr class="myTable-content">
            <td>{{$loop->iteration}}</td>
            <td>{{$pantai->nama}}</td>
            <td>{{$pantai->latitude}}</td>
            <td>{{$pantai->longitude}}</td>
            <td>{{$kecamatan[$pantai->id_kecamatan-1]->kecamatan}}</td>
            <td>{{$pantai->alamat}}</td>
            <td>
                <a href="{{url('/pantai/'.$pantai->id)}}"><button type="button" class="btn btn-success">Edit</button></a>
                <a href="{{url('/pantai/delete/'.$pantai->id)}}"><button type="button" class="btn btn-danger">Hapus</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>



<!-- Tambah Data Modal -->
<form action="{{url('/pantai/create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <div class="modal fade" id="tambahdataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table class="table">
                            <tr>
                                <td colspan="2">
                                    <small class="form-text text-muted">Nama Pantai</small>
                                    <input type="text" class="form-control" name="nama">
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <small class="form-text text-muted">Latitude</small>
                                    <input type="text" class="form-control" name="latitude">
                                </td>
                                <td width="50%">
                                    <small class="form-text text-muted">Longitude</small>
                                    <input type="text" class="form-control" name="longitude">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <small class="form-text text-muted">Kecamatan</small>
                                    <select class="form-control" id="exampleFormControlSelect1" name="id_kecamatan">
                                        <option selected hidden>- Pilih Kecamatan -</option>
                                        @foreach ($kecamatan as $kecamatan)
                                        <option value="{{$kecamatan->id}}">{{$kecamatan->kecamatan}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <small class="form-text text-muted">Alamat</small>
                                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <small class="form-text text-muted">Gambar</small>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="customFile">
                                        <label class="custom-file-label">Pilih Gambar</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="input" class="btn btn-primary">Tambahkan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



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

    $(document).ready(function () {
        $(document).on('change','#customFile',function () {
            let gambar = $('#customFile').val()
            $('.custom-file-label').text(gambar)
        })
    });
</script>

@endsection