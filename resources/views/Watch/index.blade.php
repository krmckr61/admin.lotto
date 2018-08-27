<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Watch</title>
    <style>
        html, body {
            padding: 0px;
            margin: 0px;
        }

        #controller {
            height: 10%;
            width: 100%;
            top: 0px;
        }

        video {
            left: 0px;
            top: 10%;
            width: 100%;
            height: 90%;
        }
    </style>
</head>
<body>

<div id="controller">
    Yayın Durumu :
    <label for="val1">
        <input type="radio" id="val1" name="BroadcastRadio" value="on"> Açık</label>
    <label for="val2"><input id="val2" type="radio" name="BroadcastRadio" value="off" checked> Kapalı
    </label>
</div>
<video id="BroadcastVideo">
    <video src=""></video>
</video>

<!-- jQuery -->
<script src="{!! url('asset/vendor/jquery/jquery.min.js') !!}" type="text/javascript"></script>
<!-- Broadcast JS Files -->
<script src="{!! url('asset/plugins/broadcast/socket.io.js') !!}"></script>
<script src="{!! url('asset/plugins/broadcast/RTCPeerConnection-v1.5.js') !!}"></script>
<script src="{!! url('asset/plugins/broadcast/broadcast.js') !!}"></script>
<script src="{!! url('asset/plugins/broadcast/server-broadcast-ui.js') !!}"></script>
</body>
</html>