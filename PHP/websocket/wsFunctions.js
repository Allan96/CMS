function openRoomVideo(url)
{
    var clientopen = $('#client');
    var widthopen = (($(window)['width']() / 2) - (350 / 2));
    var heightopen = (($(window)['height']() / 2) - (250 / 2));
    clientopen['append']('<div id=\'ws-video\' class=\'illumina-box center ui-draggable ui-draggable-handle\' onClick=\'makeZIndex("video")\' style=\'left: ' + widthopen + 'px;top: ' + heightopen + 'px;\'></div>');
    $('#ws-video')['load']('/ws/video/' + url)['draggable']({
        containment: '#client'
    })
}

function VoucherCopy ()
{
    $('#txtInput')['select']();
    document['execCommand']('copy')
}

function FecharVoucher (vouchercode, username)
{
    var closevoucher = document['getElementById']('alertax');
    if (closevoucher['style']['display'] = 'none')
	{
        closevoucher['style']['display'] = 'block';
        document['getElementById']('vouchercod')['innerHTML'] = '<input id="txtInput" value="' + vouchercode + '" onclick="VoucherCopy()" style="margin-top: 5px;width: 82%;padding: 5px 0 7px 8px;border-radius: 5px;border: 1px solid #0000004d;">'
    }
	else
	{
        closevoucher['style']['display'] = 'none';
        document['getElementById']('vouchercod')['innerHTML'] = ''
    }
}

function catalogoVoucher()
{
    ws['send']('3|' + Client['variables']['user.id'])
}

function Sexo(user1, user2)
{
    var stopmusic = document['getElementById']('myDIV');
    var audiomusica = document['getElementById']('myAudio');
    var areaplayer = document['getElementById']('area_player');
    var avatar1 = document['getElementById']('avatar1');
    var avatar2 = document['getElementById']('avatar2');
    if (stopmusic['style']['display'] === 'none')
	{
        audiomusica['play']();
        stopmusic['style']['display'] = 'block';
        areaplayer['style']['display'] = 'none';
        avatar1['style']['background'] = 'url(https://habbo.city/habbo-imaging/avatarimage?figure=' + user1 + '&action=std&direction=3&head_direction=3&gesture=srp&size=l)';
        avatar2['style']['background'] = 'url(https://habbo.city/habbo-imaging/avatarimage?figure=' + user2 + '&action=std&direction=3&head_direction=3&gesture=srp&size=l)'
    }
	else
	{
        audiomusica['pause']();
        stopmusic['style']['display'] = 'none';
        areaplayer['style']['display'] = 'block'
    }
}

function pararmusica()
{
    var stopmusic = document['getElementById']('myDIV');
    if (stopmusic['style']['display'] === 'none') {
        stopmusic['style']['display'] = 'block'
    }
	else
	{
        stopmusic['style']['display'] = 'none'
    };
    var areaplayer = document['getElementById']('area_player');
    if (areaplayer['style']['display'] === 'none') {
        areaplayer['style']['display'] = 'block'
    }
	else
	{
        areaplayer['style']['display'] = 'none'
    };
	
    var audiomusica = document['getElementById']('myAudio');
    audiomusica['pause']()
}

function topz()
{
    ws['send']('2|' + Client['variables']['user.id'] + '|top1123')
}

function alertaclient()
{
    ws['send']('4|' + Client['variables']['user.id'] + '|habbopages/sussurro.txt')
}

function desativh(gwhisper)
{
    ws['send']('6|' + Client['variables']['user.id'] + '|' + gwhisper)
}

function limpar()
{
    var sussu = document['getElementById']('sussurro');
    ws['send']('5|' + Client['variables']['user.id']);
    document['getElementById']('users')['innerHTML'] = '';
    sussu['style']['display'] = 'none'
}

function desativar()
{
    var desativar = document['getElementById']('desa');
    if (desativar['style']['display'] == 'block') {
        desativar['style']['display'] = 'none'
    }
	else
	{
        desativar['style']['display'] = 'block'
    }
}

function SussurroUsers(groupwhisper)
{
    var sussu = document['getElementById']('sussurro');
    if (groupwhisper['length'] == 0)
	{
        sussu['style']['display'] = 'none'
    }
	else
	{
        sussu['style']['display'] = 'block';
        document['getElementById']('users')['innerHTML'] = groupwhisper['replace'](/;/g, ', ')
    }
}

function LimparButton()
{
    var limparbutton = document['getElementById']('limpar');
    if (limparbutton['style']['display'] === 'none')
	{
        limparbutton['style']['display'] = 'block'
    }
	else
	{
        limparbutton['style']['display'] = 'none'
    }
}

function Youtube(videoid)
{
	var closevoucher = document['getElementById']('meudiv');
	$("#meudiv").fadeIn();
	$("#video").fadeIn();
	document.getElementById("video").innerHTML = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' + videoid + '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
}

function HotelAlert(mensagem, nome, look, user)
{
	$("#alert-2").show();
	$(".staffname").html(nome);
	$(".alert-ha .block p").html(mensagem);
	$("#ha-user").text('Ei, ' + user + '!');
	$(".avatar").css('background-image', 'url(https://habbo.city/habbo-imaging/avatarimage?figure=' + look + 'action=std,crr=55&gesture=sml&direction=3&head_direction=3&size=l)');
}

function Hal(url, nome, user, noticia)
{
	$("#alert-3").show();
	$(".staffname").html(nome);
	$("#nome-user").text('Ei, ' + user + '!');
	$("#hal-name").html('<u>' +  noticia + '</u>');
	$("#ler").attr('href', url);
}

function Eha(evento, nome, visual, user, quarto)
{
	$("#staff-avatar").css('background-image', 'url(https://habbo.city/habbo-imaging/avatarimage?figure=' + visual + '&size=l&head_direction=2&gesture=sml&headonly=1)');
	$("#nome-evento").text(evento);
	$(".staffname").html(nome);
	$("#user-eha").html("Ei, <b>" + user + "</b>!");
	$("#ir-evento").attr("quarto", quarto);
	$(".alert-eha").show();
}

$(document).delegate('#ir-evento', 'click', function(e)
{
	var quartoid = $("#ir-evento").attr("quarto");
	console.log(quartoid);
	ws['send']('12|' + Client['variables']['user.id'] + '|' + quartoid + '');
	$("#ir-evento").attr("quarto", "0");
	$(".alert-eha").hide();
});

/*function Mencionar(nome, mensagem)
{
	console.log(nome + " mencionou você na frase: " + mensagem);
}*/

function clickUser(user, gender, look)
{
    $("#client").append("<div id='ws-profile' onClick='makeZIndex(\"profile\")'></div>");
    $("#ws-profile").load("/ws/clickUser/" + user + "/" + look + "/" + gender);
}

function openProfile(user)
{
    $("#client").append("<div id='ws-playerProfile' class='ui-draggable ui-draggable-handle' onClick='makeZIndex(\"playerProfile\")' style='max-width: 500px'></div>");
    $("#ws-playerProfile").load("/ws/userProfile/" + user ).draggable({containment: '#client'});
}

$(document).delegate('#ler', 'click', function(e)
{
	var url = $(this).attr('href');
	window.open(url, '_blank');
});

$(document).delegate('#close', 'click', function(e)
{
	var div = $(this).attr("div");
	$("#" + div + "").hide();
	$("." + div + "").hide();
	
	if (div == "customalert-area")
		$('#conversa-staff').empty();
});

$(document).delegate('.close', 'click', function(e)
{
	var div = $(this).attr("div");
	$("#" + div + "").hide();
	$("." + div + "").hide();
	
	if (div == "customalert-area")
		$('#conversa-staff').empty();
});

