var Initializer = function () {

};

Initializer.prototype.setListeners = function () {

    $(document).ready(function () {

        $("#StartGame").on('click', function () {
            node.startGame();
        });

        $("#StopBoardPurchase").on('click', function () {
            $("#clock").countdown('stop').html('');
            node.stopBoardPurchase();
        });

        $("#EndGame").on('click', function () {
            var cnf = confirm('Bu oyunu sonlandırmak istediğinize emin misiniz ?');
            if (cnf) {
                node.endGame();
            }
        });

        $("#LastGameButton").on('click', function () {
            page.loader.show();
            node.setLastGame();
        });

        $("#NumberForm").on('submit', function () {
            var number = $("#NumberInput").val();
            if(number) {
                number = parseInt(number);
                if(typeof number === 'number' && number <= 90 && number > 0) {
                    node.number(number);
                } else {
                    //show error information
                }
            } else {
                //show error information
            }

            $("#NumberInput").val('');
        });

    });

};

var init = new Initializer();
init.setListeners();