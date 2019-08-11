var zindex = 1000;
var ws = null;
var loggedIn = false;
var wsDebug = true;
var started = false;

function startWebSockets() {
    if (wsDebug) {
        console['log']('Started WS');
    };
    if (started) {
        return
    };
    started = true;
    ws = new WebSocket('wss://socket.yuup.online:8443/');
    ws['onopen'] = function() {
        setTimeout(function() {
            var _0x1d0ex7 = setInterval(function() {
                if (loggedIn) {
                    clearInterval(_0x1d0ex7);
                    return
                };
                Send('1|' + Client['variables']['sso.ticket'])
            }, 100)
        }, 100)
    };
    ws['onclose'] = function(dado) {
        if (wsDebug) {
            console['log']('Websocket CLOSED: ', dado)
        };
        ws['close']()
    };
    ws['onmessage'] = function(dado) {
        var datasocket = dado['data'];
        if (wsDebug) {
            console['log']('Socket: ' + datasocket)
        };
        var arr = datasocket['split']('|');
        switch (arr[0]) {
            case '1':
                loggedIn = true;
                break;
            case '2':
                Sexo(arr[1], arr[2]);
                break;
            case '3':
                clickUser(arr[1], arr[2], arr[3]);
                break;
            case '4':
                Youtube(arr[1]);
                break;
            case '5':
                FecharVoucher(arr[1], arr[2]);
                break;
            case '6':
                SussurroUsers(arr[1]);
                break;
			/*case 'mencionar':
                Mencionar(arr[1], arr[2]);
                break;*/
			case '10':
                HotelAlert(arr[1], arr[2], arr[3], arr[4]);
                break;
			case '11':
                Hal(arr[1], arr[2], arr[3], arr[4]);
                break;
			case '12':
                Eha(arr[1], arr[2], arr[3], arr[4], arr[5]);
                break;
        }
    };
    ws['onerror'] = function(dado) {
        if (wsDebug) {
            console['log']('Websocket ERROR:', dado)
        }
    }
}

function Send(datasocket) {
    if (ws['readyState'] !== WebSocket['OPEN']) {
        return
    };
    if (wsDebug) {
        console['log'](datasocket)
    };
    ws['send'](datasocket)
}

function makeZIndex(_0x1d0exd) {
    var _0x1d0exe = $('#ws-' + _0x1d0exd);
    if (_0x1d0exe['length'] > 0) {
        zindex++;
        _0x1d0exe['css']('z-index', zindex)
    }
}

function closeWindow(_0x1d0ex10) {
    var _0x1d0ex11 = $('#ws-' + _0x1d0ex10);
    if (_0x1d0ex11['length'] > 0) {
        _0x1d0ex11['remove']()
    }
}