function getToken() {
    return $('meta[name=csrf-token]').attr('content');
}

function getDomain() {
    return location.protocol + '//' + window.location.hostname + '/';
}

function getDomainWithoutSlash() {
    return location.protocol + '//' + window.location.hostname;
}

function confirmation(url, question) {
    var conf = confirm(question);
    if(conf) {
        window.location.href = url;
    }
}

function toMoney(number) {
    return parseFloat(number).toFixed(2) + ' TL';
}