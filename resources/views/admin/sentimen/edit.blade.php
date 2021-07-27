@extends('template/admin')
@section('container')


<div class="container">
    <form action="{{url('/sentimen/update')}}" method="POST">
        @method('patch')
        @csrf
        <input type="hidden" name="id_pantai" value="{{$data->id}}">
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
                                    <input type="text" class="form-control" name="nama" value="{{$data->nama}}">
                                </td>
                            </tr>
                            <tr>
                                <td width="33%">
                                    <small class="form-text text-muted">Positif</small>
                                    <input type="text" class="form-control" name="s_positif" value="{{$data->s_positif}}">
                                </td>
                                <td width="33%">
                                    <small class="form-text text-muted">Negatif</small>
                                    <input type="text" class="form-control" name="s_negatif" value="{{$data->s_negatif}}">
                                </td>
                                <td width="34%">
                                    <small class="form-text text-muted">Total</small>
                                    <input type="text" class="form-control" name="s_total" value="{{$data->s_total}}">
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

@endsection