@extends('layouts.app')
@section('title') Ayar Düzenle @endsection
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
        <form method="POST" action="{!! url('/settings/update/' . $setting->id) !!}">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group">
                    <label>Ayar</label>
                    <input type="text" name="name" class="form-control disabled" disabled value="{!! $setting->displayname !!}">
                </div>
                <div class="form-group">
                    <label>Değer</label>
                    <input type="text" name="value" class="form-control" value="{!! $setting->value !!}">
                </div>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Kaydet</button>
            </div>
        </form>
    </div>
@endsection