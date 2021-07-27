@extends('template/admin')
@section('container')


<div class="container">
    <form action="{{url('/prokes/update')}}" method="POST">
        @method('patch')
        @csrf
        <input type="hidden" name="id" value="{{$data->id}}">
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
                                    <small class="form-text text-muted">Jenis Protokol</small>
                                    <textarea type="text" class="form-control" rows="5" name="prokes">{{$data->prokes}}</textarea>
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