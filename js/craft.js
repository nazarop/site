var Timer1 = '';
var betyes = 'true';

function craftBet() {
    if (betyes == 'true') {
        clearTimeout(Timer1);
        var _0x579fx4 = $('#id-store')['val']();
        var _0x579fx5 = $('#chance-number')['html']();
        var _0x579fx6 = $('#one')['html']();
        $['ajax']({
            url: '../action.php',
            type: 'post',
            data: {
                type: 'craft',
                chance: _0x579fx5,
                id: _0x579fx4,
                summa: _0x579fx6,
                name: $('.item' + _0x579fx4)['data']('title'),
                price: $('.item' + _0x579fx4)['data']('price'),
                img: $('#item-img' + _0x579fx4)['attr']('src')
            },
            success: function (_0x579fx7) {
                data = $['parseJSON'](_0x579fx7);

                if (data['alert'] != 2) {
                    $('#size')['css']('display', 'none');
                    $('.button')['css']('cursor', 'wait');
                    $('.button')['text']('\u0418\u0434\u0435\u0442 \u043A\u0440\u0430\u0444\u0442...');
                    $('#bar')['css']('transition', '10s ease');

                    $('#bar')['css']('stroke-dashoffset', data['rand']);
                    betyes = 'false'
                };
                Timer1 = setTimeout(function () {
                    $('#size')['css']('display', 'initial');
                    $('.button')['css']('cursor', 'pointer');
                    $('.button')['text']('\u0421\u043A\u0440\u0430\u0444\u0442\u0438\u0442\u044C');
                    $('#bar')['css']('transition', '1s ease');
                    $('#bar')['css']('stroke-dashoffset', 100);
                    betyes = 'true';
                    $('#mybalance').load('../inc/main.php #mybalance');    updateBalance(data['newBalance']);
                    if (data['alert'] == 1) {

                        Swal['fire']({
                            title: '<strong style="color: #fff">' + data['name'] + '</strong>',
                            background: '#1c2028',
                            html: '<br><img width="255" src="' + data['img'] + '"><br><b style="color: #fff">\u041F\u043E\u0437\u0434\u0440\u0430\u0432\u043B\u044F\u0435\u043C</b>, <span style="color: #fff">\u0432\u044B \u0441\u043A\u0440\u0430\u0444\u0442\u0438\u043B\u0438 \u043F\u0440\u0435\u0434\u043C\u0435\u0442 \u0441 \u0448\u0430\u043D\u0441\u043E\u043C</span> <b style="color: orange">' + data['chance'] + '<span style="color: #fff">%</span></b>, <span style="color: #fff">\u0421\u0442\u043E\u0438\u043C\u043E\u0441\u0442\u044C \u0434\u0430\u043D\u043D\u043E\u0433\u043E \u043F\u0440\u0435\u0434\u043C\u0435\u0442\u0430 </span> <b style="color: orange">' + data['price'] + '</b> <span style="color: #fff">coin</span>' + '' + '',
                            showCancelButton: false,
                            focusConfirm: true
                        })
                    }
                }, 11000);
                if (data['alert'] == 2) {
$('#mybalance').load('../inc/main.php #mybalance');    
                    noty({
                        text: data['msg'],
                        type: data['type'],
                        layout: 'bottomLeft',
                        timeout: 4000,
                        progressBar: true,
                        animation: {
                            open: 'animated fadeInLeft',
                            close: 'animated fadeOutLeft'
                        }
                    })
                };
                return false
            },
            error: function (_0x579fx8) {
                console['log'](_0x579fx8['responseText'])
            }
        })
    }
}
function calc() {
    var _0x579fxa = $('#summa-test-fuck')['val']();
    var _0x579fxb = $('#size')['val']();
    var _0x579fxc = document['getElementById']('chance');
    var _0x579fx5 = (_0x579fxa / 100) * _0x579fxb;
    $('#one')['html'](_0x579fx5['toFixed'](2));
    _0x579fxc['style']['strokeDashoffset'] = _0x579fxb;
    document['getElementById']('chance-number')['innerHTML'] = _0x579fxb
}