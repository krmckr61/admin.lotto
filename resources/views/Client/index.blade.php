@extends('layouts.app')
@section('title') Oyuncular @endsection
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
        <div class="row">
            <div class="col-sm-12 text-right">
                <a href="{!! url('clients/add') !!}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Yeni
                    Oyuncu Ekle
                </a>
            </div>
        </div>
        <br>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>Oyuncu No</th>
                <th>Kullanıcı Adı</th>
                <th>Parola</th>
                <th width="15%">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @if(count($clients) > 0)
                @foreach($clients as $client)
                    <tr>
                        <td>{!! $client->id !!}</td>
                        <td>{!! $client->name !!}</td>
                        <td>*****</td>
                        <td>
                            <a href="{!! url('clients/edit/' . $client->id) !!}" class="btn btn-primary">
                                <i class="fa fa-pencil-square-o"></i> Düzenle
                            </a>
                            <a href="javascript:confirmation('{!! url('clients/delete/' . $client->id) !!}', 'Bu oyuncuyu silmek istediğinizden emin misiniz ?')" class="btn btn-danger">
                                <i class="fa fa-pencil-square-o"></i> Sil
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection