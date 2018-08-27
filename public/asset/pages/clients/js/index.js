var Node = function () {
    this.socketUrl = $("meta[name='socketUrl']").attr('content');
    this.socketParameters = 'role=staff';
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

Node.prototype.startGame = function () {
    this.socket.emit('startGame');
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

Node.prototype.init = function () {
    this.socketConnection();
};

var node = new Node();
node.init();