var Table = function () {
    this.clientsTable = $("#Clients");
};

Table.prototype.init = function () {
    this.clientsTable = this.clientsTable.DataTable();
};

Table.prototype.setBalance = function (clientId, balance) {
    $("#Client" + clientId + " td input.set-balance-input").val(balance);
    $("#Client" + clientId + " td input.add-balance-input").val('0');
};

var table = new Table();
table.init();