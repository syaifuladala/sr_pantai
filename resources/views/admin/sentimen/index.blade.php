@extends('template/admin')
@section('container')

<div class="container">
    <table class="table" width="100%">
        <tr>
            <td width="85%">
                <h5><b>Data Sentimen</b></h5>
            </td>
            <td align="right" width=15%><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahdataModal">Tambah Data</button></td>
        </tr>
        <tr>
            <td colspan="3"></td>
        </tr>
    </table>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari ..">
    <table class="table" id="myTable">
        <tr class="header">
            <th width="5%">No</th>
            <th width="35%">Nama Pantai</th>
            <th width="15%">Positif</th>
            <th width="15%">Negatif</th>
            <th width="15%">Total</th>
            <th width="15%">Aksi</th>
        </tr>
        @foreach($sentimen as $data)
        <tr class="myTable-content">
            <td>{{$loop->iteration}}</td>
            <td>{{$data->nama}}</td>
            <td>{{$data->s_positif}}</td>
            <td>{{$data->s_negatif}}</td>
            <td>{{$data->s_total}}</td>
            <td>
                <a href="{{url('/sentimen/'.$data->id)}}"><button type="button" class="btn btn-success">Edit</button></a>
                <a href="{{url('/sentimen/delete/'.$data->id)}}"><button type="button" class="btn btn-danger">Hapus</button></a>
            </td>
        </tr>
        @endforeach
    </table>
</div>



<!-- Tambah Data Modal -->
<form action="{{url('/sentimen/update')}}" method="POST">
    @method('patch')
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
                                <td colspan="3">
                                    <small class="form-text text-muted">Nama Pantai</small>
                                    <select class="form-control" id="exampleFormControlSelect1" name="id_pantai">
                                        <option selected hidden>- Pilih Pantai -</option>
                                        @foreach ($insert as $insert)
                                        <option value="{{$insert->id}}">{{$insert->nama}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="33%">
                                    <small class="form-text text-muted">Positif</small>
                                    <input type="text" class="form-control" name="s_positif">
                                </td>
                                <td width="33%">
                                    <small class="form-text text-muted">Negatif</small>
                                    <input type="text" class="form-control" name="s_negatif">
                                </td>
                                <td width="34%">
                                    <small class="form-text text-muted">Total</small>
                                    <input type="text" class="form-control" name="s_total">
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
</script>

@endsection