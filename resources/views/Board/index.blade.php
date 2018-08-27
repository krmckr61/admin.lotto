@extends('layouts.app')
@section('title') Kartlar @endsection
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
                <a href="{!! url('boards/add') !!}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Yeni Kart
                    Ekle</a>
            </div>
        </div>
        <br>
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th>Kart No</th>
                <th>Satır 1</th>
                <th>Satır 2</th>
                <th>Satır 3</th>
                <th width="15%">İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @if(count($boards) > 0)
                @foreach($boards as $board)
                    <?php
                            $board->firstrow = str_replace(['{', '}', 0], ['', '', '-'], $board->firstrow);
                            $board->secondrow = str_replace(['{', '}', 0], ['', '', '-'], $board->secondrow);
                            $board->thirdrow = str_replace(['{', '}', 0], ['', '', '-'], $board->thirdrow);
                    ?>
                    <tr class="odd gradeX">
                        <td>{!! $board->id !!}</td>
                        <td>{!! $board->firstrow !!}</td>
                        <td>{!! $board->secondrow !!}</td>
                        <td>{!! $board->thirdrow !!}</td>
                        <td>
                            <a class="btn btn-primary" href="{!! url('boards/edit/' . $board->id) !!}"><i class="fa fa-pencil-square-o"></i> Düzenle</a>
                            <a class="btn btn-danger" href="javascript:confirmation('{!! url('boards/delete/' . $board->id) !!}', 'Bu kartı silmek istediğinizden emin misiniz ?')"><i class="fa fa-trash-o"></i> Sil</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection