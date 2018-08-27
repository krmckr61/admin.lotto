@extends('layouts.app')
@section('title') Ayarlar @endsection
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
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>Ayar</th>
                <th>Değer</th>
                <th width="15%">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @if(count($settings) > 0)
                @foreach($settings as $setting)
                    <tr>
                        <td>{!! $setting->displayname !!}</td>
                        <td>{!! $setting->value !!}</td>
                        <td>
                            <a href="{!! url('settings/edit/' . $setting->id) !!}" class="btn btn-primary">
                                <i class="fa fa-pencil-square-o"></i> Düzenle
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection