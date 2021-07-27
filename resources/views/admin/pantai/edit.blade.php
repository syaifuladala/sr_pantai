@extends('template/admin')
@section('container')


<div class="container">
    <form action="{{url('/pantai/update')}}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <center>
            <div class="card w-50">
                <div class="card">
                    <div class="card-header">
                        Edit Data Pantai
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td colspan="2">
                                    <small class="form-text text-muted">Nama Pantai</small>
                                    <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <small class="form-text text-muted">Latitude</small>
                                    <input type="text" class="form-control" name="latitude" value="{{$data->latitude}}">
                                </td>
                                <td width="50%">
                                    <small class="form-text text-muted">Longitude</small>
                                    <input type="text" class="form-control" name="longitude" value="{{$data->latitude}}">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <small class="form-text text-muted">Kecamatan</small>
                                    <select class="form-control" id="exampleFormControlSelect1" name="id_kecamatan">
                                        <option selected hidden>- Pilih Kecamatan -</option>
                                        @foreach ($kecamatan as $kecamatan)
                                        <option value="{{$kecamatan->id}}" <?php
                                                                            if ($data->id_kecamatan == $kecamatan->id) {
                                                                                echo "selected";
                                                                            }
                                                                            ?>>{{$kecamatan->kecamatan}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <small class="form-text text-muted">Alamat</small>
                                    <textarea class="form-control" name="alamat" rows="3">{{$data->alamat}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <small class="form-text text-muted">Gambar</small>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="gambar" id="customFile">
                                        <label class="custom-file-label">{{$data->gambar}}</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <input type="reset" class="btn btn-danger" value="Reset">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </div>
            </div>
        </center>
    </form>
</div>

<script>
    $(document).ready(function () {
        $(document).on('change','#customFile',function () {
            let gambar = $('#customFile').val()
            $('.custom-file-label').text(gambar)
        })
    });
</script>

@endsection