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

    <title>Oyun</title>
</head>
<body>

<div class="preloader" style="display: none !important;">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="users"></div>

<div class="container-fluid h-100">
    <div class="row justify-content-center h-100">
        <div class="col-4 grid" id="LeftContainer">
            <div class="row justify-content-center h-100">
                <div class="col-12 h-50" id="CameraContainer">
                    <h3 class="section-head">Oyun Yönetimi</h3>
                    <iframe id="BroadcastIframe" src="{!! url('watch') !!}" class="col-sm-12" frameborder="0"></iframe>
                </div>
                <div class="col-12 h-50" id="FormContainer">
                    <form action="javascript:;" class="form-horizontal" id="NumberForm">
                        <div class="row form-row">
                            <div class="col-sm-6 form-text">
                                <i class="fa fa-list-ol"></i> Numara Girişi
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="number" class="form-control input-number" placeholder="Numara Girişi"
                                           id="NumberInput" disabled>
                                    <div class="input-group-append">
                                        <button class="btn btn-success input-number" type="submit" id="" disabled>
                                            <i class="fa fa-check-circle-o"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-sm-6 form-text">
                                <i class="fa fa-gamepad"></i> Oyun Durumu
                            </div>
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-success btn-block game-status-button" id="StartGame"
                                        style="display: none"><i class="fa fa-plus"></i> Yeni Oyun
                                </button>
                                <span id="clock"></span>
                                <button class="btn btn-danger btn-block game-status-button" id="StopBoardPurchase"
                                        style="display: none"><i
                                            class="fa fa-stop"></i> Kart Alımını Kapat
                                </button>
                                <button class="btn btn-danger btn-block game-status-button" id="EndGame"
                                        style="display: none"><i
                                            class="fa fa-times"></i> Oyunu Sonlandır
                                </button>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-sm-12">
                                <button id="LastGameButton" class="btn btn-success btn-block"
                                        style="{!! isset($lastGame['firstZinc']) ? '' : 'display:none' !!}">
                                    <i class="fa fa-backward"></i> Önceki Oyunun Kazananları
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8 grid" id="RightContainer">
            <h3 class="section-head">Kartlar</h3>
            <table width="100%" class="table table-striped table-bordered table-hover" id="LiveBoards">
                <thead>
                <tr>
                    <th>Kart No</th>
                    <th>Adı Soyadı</th>
                    <th>1. Çinko</th>
                    <th>2. Çinko</th>
                    <th>Tombala</th>
                </tr>
                </thead>
                <tbody>
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
<script type="text/javascript" src="{!! url('asset/plugins/countdown/countdown.js') !!}"></script>
<script type="text/javascript" src="{!! url('asset/plugins/moment/moment.js') !!}"></script>



<!-- Game Page Init File -->
<script src="{!! config('app.socketUrl') . 'socket.io/socket.io.js' !!}" type="text/javascript"></script>
<script src="{!! url('asset/pages/game/js/table.js') !!}" type="text/javascript"></script>
<script src="{!! url('asset/pages/game/js/page.js') !!}" type="text/javascript"></script>
<script src="{!! url('asset/pages/game/js/node.js') !!}" type="text/javascript"></script>
<script src="{!! url('asset/pages/game/js/init.js') !!}" type="text/javascript"></script>

</body>
</html>