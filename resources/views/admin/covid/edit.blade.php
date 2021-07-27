@extends('template/admin')
@section('container')


<div class="container">
    <form action="{{url('/covid/update')}}" method="POST">
        @method('patch')
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
        <center>
            <div class="card w-50">
                <div class="card">
                    <div class="card-header">
                        Edit Data Covid (Kecamatan)
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td colspan="3">
                                    <small class="form-text text-muted">Nama Kecamatan</small>
                                    <input type="text" class="form-control" name="kecamatan" value="{{$data->kecamatan}}">
                                </td>
                            </tr>
                            <tr>
                                <td width="33%">
                                    <small class="form-text text-muted">Positif</small>
                                    <input type="text" class="form-control" name="positif" value="{{$data->positif}}">
                                </td>
                                <td width="33%">
                                    <small class="form-text text-muted">Meninggal</small>
                                    <input type="text" class="form-control" name="meninggal" value="{{$data->meninggal}}">
                                </td>
                                <td width="34%">
                                    <small class="form-text text-muted">Sembuh</small>
                                    <input type="text" class="form-control" name="sembuh" value="{{$data->sembuh}}">
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