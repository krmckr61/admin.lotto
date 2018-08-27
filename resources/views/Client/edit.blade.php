@extends('layouts.app')
@section('title') Oyuncu Düzenle @endsection
@section('css')
    <!-- DataTables CSS -->
    <link href="{!! url('asset/vendor/datatables-plugins/dataTables.bootstrap.css') !!}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{!! url('asset/vendor/datatables-responsive/dataTables.responsive.css') !!}" rel="stylesheet">
@endsection
@section('js')
    <!-- DataTables JavaScript -->
    <script src="{!! url('asset/vendor/datatables/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! url('asset/vendor/datatables-plugins/dataTables.bootstrap.min.js') !!}"></script>
    <script src="{!! url('asset/vendor/datatables-responsive/dataTables.responsive.js') !!}"></script>
@endsection
@section('content')
    <div class="col-lg-12">
        <form method="POST" action="{!! url('/clients/update/' . ((isset($client->id)) ? $client->id : 'new')) !!}">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group">
                    <label>Kullanıcı Adı</label>
                    <input type="text" name="name" class="form-control" value="{!! $client->name !!}">
                </div>
                <div class="form-group">
                    <label>Parola</label>
                    <input type="text" name="password" class="form-control" value="{!! $client->password !!}">
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Kaydet</button>
            </div>
        </form>
    </div>
@endsection