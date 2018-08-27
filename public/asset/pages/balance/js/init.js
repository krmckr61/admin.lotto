var Initializer = function () {

};

Initializer.prototype.setListeners = function () {

    $(document).ready(function () {

        $("button.set-balance").on('click', function () {
            var row = $(this).closest('tr');
            var balance = row.find('input.set-balance-input').val();
            if(balance) {
                var clientId = row.attr('data-id');
                console.log(balance, clientId);
                node.setBalance(clientId, balance);
            }
        });

        $("button.add-balance").on('click', function () {
            var row = $(this).closest('tr');
            var balance = row.find('input.add-balance-input').val();
            if(balance) {
                var clientId = row.attr('data-id');
                node.addBalance(clientId, balance);
            }
        });

        $("input.set-balance-input, input.add-balance-input").on('focus', function () {
            $(this).select();
        });

    });

};

var init = new Initializer();
init.setListeners();