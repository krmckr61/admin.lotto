var Table = function () {
    this.boardsTable = $("#LiveBoards");
    this.zincActiveIcon = '<i class="fa fa-check-circle-o"></i>';
    this.zincPassiveIcon = '<i class="fa fa-times-circle-o"></i>';
};

Table.prototype.init = function () {
    this.boardsTable = this.boardsTable.DataTable()

};

Table.prototype.setTables = function (data) {
    this.clearRows(this.boardsTable);
    if (data) {
        if (data.boards && data.boards.length > 0) {
            this.setBoardRows(data.boards);
        }
    }
};

Table.prototype.setBoardRows = function (rows) {
    rows.forEach((row) => {
        this.addBoardRow(row);
    });
};

Table.prototype.addBoardRow = function (row) {
    this.boardsTable.row.add(this.rowToBoardData(row)).node().id = 'Board' + row.boardid;
    this.boardsTable.draw(true);
};

Table.prototype.rowToBoardData = function (row) {
    var data = [
        row.id,
        row.name,
        row.firstzinc ? this.zincActiveIcon : this.zincPassiveIcon,
        row.secondzinc ? this.zincActiveIcon : this.zincPassiveIcon,
        row.bingo ? this.zincActiveIcon : this.zincPassiveIcon
    ];
    return data;
}

Table.prototype.setClientRows = function (rows) {
    rows.forEach((row) => {
        this.addClientRow(row);
    });
};

Table.prototype.rowToClientData = function (row) {
    return [
        !row.banned ? '<i class="fa fa-gamepad"></i>' : '<i class="fa fa-ban"></i>',
        row.name,
        row.boardcount,
        row.balance
    ];
};

Table.prototype.setZinc = function (boards, zinc = 'first') {
    if (boards.length > 0) {

        var colnumber = 3;
        switch (zinc) {
            case 'second':
                colnumber = 4;
                break;
            case 'bingo':
                colnumber = 5;
                break;
        }

        for (var i = 0; i < boards.length; i++) {
            $("#LiveBoards tr#Board" + boards[i].boardid + " td:nth-child(" + colnumber + ")").html(this.zincActiveIcon);
        }
    }
};

Table.prototype.clearRows = function (table) {
    table.clear().draw(false);
};

var table = new Table();
table.init();