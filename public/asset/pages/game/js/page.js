var page = {
    loader: $(".preloader"),
};

page.initPage = function (data) {
    this.loader.show();
    table.setTables(data);
    if (data.game) {
        this.setGameStatus(data.game);
        if(data.startDate) {
            $('#clock').countdown(moment(data.startDate).format('YYYY/MM/DD HH:mm:ss'))
                .on('update.countdown', function(event) {
                    var format = '%M:%S sonra kapanacaktır.';
                    $(this).html(event.strftime(format));
                })
                .on('finish.countdown', function(event) {
                    $("#StopBoardPurchase").click();
                });
        }
    } else {
        this.setGameStatus(false);
    }
    this.loader.fadeOut();
};

page.setGameStatus = function (game) {
    $(".game-status-button").hide();
    if (game) {
        if (!game.boardpurchase) {
            $(".input-number").removeAttr('disabled');
            $("#EndGame").show();
        } else {
            $(".input-number").attr('disabled', 'disabled');
            $("#StopBoardPurchase").show();
        }
    } else {
        $(".input-number").attr('disabled', 'disabled');
        $("#StartGame").show();
    }
};

page.setLastGame = function (lastGame) {
    if (lastGame && lastGame.length > 0) {
        $("#BingoModal .first-zincs, #BingoModal .second-zincs, #BingoModal .bingos").html('');
        for (var i = 0; i < lastGame.length; i++) {
            var winner = lastGame[i];
            if(winner.firstzinc) {
                $("#BingoModal .first-zincs").append('<b>' + winner.boardid + '</b> numaralı kart ile <b>' + winner.name + '</b>');
            }
            if(winner.secondzinc) {
                $("#BingoModal .second-zincs").append('<b>' + winner.boardid + '</b> numaralı kart ile <b>' + winner.name + '</b>');
            }
            if(winner.bingo) {
                $("#BingoModal .bingos").append('<b>' + winner.boardid + '</b> numaralı kart ile <b>' + winner.name + '</b>');
            }
        }
    }
    $("#BingoModal").modal('show');
    this.loader.fadeOut();
};

page.clearBingoModal = function () {
    $("#BingoModal .modal-zinc").html('');
};

page.constructor = function () {
    this.loader.show();
};

page.constructor();