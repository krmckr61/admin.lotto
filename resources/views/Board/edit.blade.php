@extends('layouts.app')
@section('title') Kart Düzenle @endsection
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
        <form method="POST" action="{!! url('/boards/update/' . ((isset($board->id)) ? $board->id : 'new')) !!}">
            {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->firstrow[0] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->firstrow[1] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->firstrow[2] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->firstrow[3] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->firstrow[4] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->firstrow[5] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->firstrow[6] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->firstrow[7] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->firstrow[8] !!}"></div>
        </div>
        <div class="row">
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->secondrow[0] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->secondrow[1] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->secondrow[2] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->secondrow[3] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->secondrow[4] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->secondrow[5] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->secondrow[6] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->secondrow[7] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->secondrow[8] !!}"></div>
        </div>
        <div class="row">
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->thirdrow[0] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->thirdrow[1] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->thirdrow[2] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->thirdrow[3] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->thirdrow[4] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->thirdrow[5] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->thirdrow[6] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->thirdrow[7] !!}"></div>
            <div class="col-sm-9-12"><input type="number" name="number[]" class="form-control" value="{!! $board->thirdrow[8] !!}"></div>
        </div>
        <div class="row">
            <div class="form-group">
                <label>Kart Rengi</label>
                @foreach($colors as $boardColor)
                    <div class="radio">
                        <label>
                            <input type="radio" name="color" id="optionsRadios1" value="{!! $boardColor['value'] !!}"{!! $board->color == $boardColor['value'] ? ' checked=""' : '' !!}>{!! $boardColor['name'] !!}
                        </label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Kaydet</button>
        </div>
        </form>
    </div>
@endsection