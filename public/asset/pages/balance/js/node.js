"use strict";

var Node = function () {
    this.socketUrl = $("meta[name='socketUrl']").attr('content');
    this.socketParameters = 'role=boss';
    this.socket;
};

Node.prototype.socketConnection = function () {
    this.socket = io.connect(this.socketUrl, {query: this.socketParameters});
    if (this.socket) {
        this.initSockets();
    } else {
        alert('Sunucu bağlantısında bir hata oluştu');
    }
};

Node.prototype.initSockets = function () {

    this.socket.on('setBalance', function (data) {
        console.log(123123);
        table.setBalance(data.clientId, data.balance);
    });

};

Node.prototype.setBalance = function (clientId, balance) {
    this.socket.emit('setBalance', {clientId: clientId, balance: balance});
};

Node.prototype.addBalance = function (clientId, balance) {
    this.socket.emit('addBalance', {clientId: clientId, balance: balance});
};

Node.prototype.init = function () {
    this.socketConnection();
};

var node = new Node();
node.init();