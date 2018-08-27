"use strict";

var Node = function () {
    this.socketUrl = $("meta[name='socketUrl']").attr('content');
    this.socketParameters = 'role=staff';
    this.socket;
};

Node.prototype.socketConnection = function () {
    this.socket = io.connect(this.socketUrl, {query: this.socketParameters});
    if (this.socket) {
        this.initBroadcast();
        this.initSockets();
    } else {
        alert('Sunucu bağlantısında bir hata oluştu');
    }
};

Node.prototype.initBroadcast = function () {
    console.log('broadcast');
};

Node.prototype.initSockets = function () {

    this.socket.on('initPage', function (data) {
        page.initPage(data);
    });

    this.socket.on('stoppedBoardPurchase', function () {
        page.setGameStatus({boardpurchase: false});
    });

    this.socket.on('firstZinc', function (boards) {
        table.setZinc(boards, 'first');
    });

    this.socket.on('secondZinc', function (boards) {
        table.setZinc(boards, 'second');
    });

    this.socket.on('thirdZinc', function (boards) {
        page.bingo(boards);
        table.setZinc(boards, 'bingo');
    });

    this.socket.on('getLastGame', function (lastGame) {
        page.setLastGame(lastGame);
    });

    this.socket.on('boardBuyed', function (clientBoard) {
        table.addBoardRow(clientBoard);
    });

};

Node.prototype.startGame = function () {
    this.socket.emit('startGame', moment().format('YYYY-MM-DD HH:mm:ss'));
};

Node.prototype.stopBoardPurchase = function () {
    this.socket.emit('stopBoardPurchase');
};

Node.prototype.endGame = function () {
    this.socket.emit('endGame');
};

Node.prototype.number = function (number) {
    this.socket.emit('number', number);
};

Node.prototype.setLastGame = function () {
    this.socket.emit('setLastGame');
};

Node.prototype.init = function () {
    this.socketConnection();
};

var node = new Node();
node.init();