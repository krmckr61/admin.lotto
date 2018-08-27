<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="socketUrl" content="{!! config('app.socketUrl') !!}">

    <!-- Bootstrap Core CSS -->
    <link href="{!! url('asset/vendor/bootstrap-4/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! url('asset/vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css"
          href="{!! url('asset/vendor/jquery.datatables/css/jquery.dataTables.css') !!}">

    <link href="{!! url('asset/css/game.css') !!}" rel="stylesheet">

    <title>Bakiye Yönetimi</title>
</head>
<body>

<div class="preloader" style="display: none !important;">
    <div class="cssload-speeding-wheel"></div>
</div>

<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-12 grid" id="RightContainer">
            <h3 class="section-head">Oyuncular</h3>
            <table width="100%" class="table table-striped table-bordered table-hover" id="Clients">
                <thead>
                <tr>
                    <th>Kullanıcı Adı</th>
                    <th>Bakiye</th>
                    <th>Bakiye Ekle</th>
                </tr>
                </thead>
                <tbody>
                @if(count($clients) > 0)
                    @foreach($clients as $client)
                        <tr id="Client{!! $client->id !!}" data-id="{!! $client->id !!}">
                            <td>{!! $client->name !!}</td>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control text-center set-balance-input" value="{!! $client->balance !!}" aria-label="Birim">
                                    <div class="input-group-append">
                                        <span class="input-group-text">TL</span>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="set-balance btn btn-success"><i class="fa fa-check"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control text-center add-balance-input" value="0" aria-label="Birim">
                                    <div class="input-group-append">
                                        <span class="input-group-text">TL</span>
                                    </div>
                                    <div class="input-group-append">
                                        <button class="add-balance btn btn-success"><i class="fa fa-check"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="BingoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kazananlar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>1. Çinko</h2>
                <div class="row">
                    <div class="col-sm-12 modal-zinc first-zincs">
                    </div>
                </div>
                <h2>2. Çinko</h2>
                <div class="row">
                    <div class="col-sm-12 modal-zinc second-zincs">
                    </div>
                </div>
                <h3>Tombala</h3>
                <div class="row">
                    <div class="col-sm-12 modal-zinc bingos">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tamam</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="{!! url('asset/vendor/jquery/jquery.min.js') !!}" type="text/javascript"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{!! url('asset/vendor/bootstrap-4/js/bootstrap.min.js') !!}" type="text/javascript"></script>


<!-- Base Js Files -->
<script src="{!! url('asset/js/core.js') !!}" type="text/javascript"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" src="{!! url('asset/vendor/jquery.datatables/js/jquery.dataTables.js') !!}"></script>

<!-- plugins -->
<script type="text/javascript" src="{!! url('asset/vendor/loader/loader.js') !!}"></script>

<!-- Game Page Init File -->
<script src="{!! config('app.socketUrl') . 'socket.io/socket.io.js' !!}" type="text/javascript"></script>
<script src="{!! url('asset/pages/balance/js/table.js') !!}" type="text/javascript"></script>
<script src="{!! url('asset/pages/balance/js/node.js') !!}" type="text/javascript"></script>
<script src="{!! url('asset/pages/balance/js/init.js') !!}" type="text/javascript"></script>
</body>
</html>