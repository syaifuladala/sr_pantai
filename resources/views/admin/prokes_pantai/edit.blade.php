@extends('template/admin')
@section('container')


<div class="container">
    <center>
        <div class="card w-50">
            <div class="card">
                <div class="card-header">
                    Edit Data Protokol Kesehatan
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td colspan="3">
                                <small class="form-text text-muted">Nama Pantai</small>
                                <input type="text" class="form-control" value="{{$data[0]->nama}}">
                            </td>
                        </tr>
                        @foreach($data as $data)
                        <form action="{{url('/prokes_pantai/update')}}" method="POST">
                        @method('patch')
                        @csrf
                        <input type="hidden" name="id_pantai" value="{{$data->id_pantai}}">
                            <tr>
                                <td width="55%">
                                    <label>{{$data->prokes}}</label>
                                    <input type="hidden" name="id_prokes" value="{{$data->id_prokes}}">
                                </td>
                                <td width="25%">
                                    <select name="status" class="form-control">
                                        <option value="NULL" <?php
                                                                if ($data->status == NULL) {
                                                                    echo "selected";
                                                                }
                                                                ?>>- Status -</option>
                                        <option value="1" <?php
                                                            if ($data->status == TRUE) {
                                                                echo "selected";
                                                            }
                                                            ?>>Ada</option>
                                        <option value="0" <?php
                                                            if ($data->status == FALSE) {
                                                                echo "selected";
                                                            }
                                                            ?>>Tidak</option>
                                    </select>
                                </td>
                                <td width="20%"><input type="submit" class="btn btn-primary" value="Simpan"></td>
                            </tr>
                        </form>
                        @endforeach
                    </table>
                    <input type="reset" class="btn btn-danger" value="Reset">
                    <a href="/prokes_pantai"><input type="submit" class="btn btn-primary" value="Kembali"></a>
                </div>
            </div>
        </div>
    </center>
</div>

@endsection