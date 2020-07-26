// with <3 @kotdevfun and @middle_dev
var color = "";
var mines = "";

function coinflipbet(typegame){



$('.coinflipButtons > button').prop('disabled', true);
$('#coin').removeClass('tails');
$('#coin').removeClass('heads');
$('#coin').removeClass('rebro');



$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {


                    },
                                                                                data: {
                                                                                    type: "coinflip",
                                                                                    lay: typegame,
                                                                                    size: $('#coinflipBet').val()


                                                                                },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                           if(obj.success == "fatal") {
                $('.coinflipButtons > button').prop('disabled', false);

                                               $.wnoty({
        position : 'top-right',
        type: 'error',
        message: obj.error
      });
      return false;
                                           }
                                            if (obj.success == "success") {


                                                 if(obj.flipResult == 1){
                                                                                    $('#coin').addClass('heads');
                                                                                    }
                                                                                    if ( obj.flipResult == 2 ) {
                                                                                    $('#coin').addClass('tails');
                                                                                    }
                                                                                      if ( obj.flipResult == 30 ) {
                                                                                    $('#coin').addClass('rebro');
                                                                                    }
                                                                                    setTimeout(function(){
$.wnoty({
        position : 'top-right',
        type: 'success',
        message: obj.message
      });
updateBalance(0, obj.new_balance);

}, 6000);
  setTimeout(function(){
   $('.coinflipButtons > button').prop('disabled', false);
$('#coin').removeClass('tails');
$('#coin').removeClass('heads');
$('#coin').removeClass('rebro');
                                                                                    }, 7500);

                                            }else{


         if(obj.flipResult == 1){
                                                                                    $('#coin').addClass('heads');
                                                                                    }
                                                                                    if ( obj.flipResult == 2 ) {
                                                                                    $('#coin').addClass('tails');
                                                                                    }
                                                                                      if ( obj.flipResult == 30 ) {
                                                                                    $('#coin').addClass('rebro');
                                                                                    }
                                                                                    setTimeout(function(){
$.wnoty({
        position : 'top-right',
        type: 'error',
        message: obj.message
      });
updateBalance(0, obj.new_balance);

}, 6000);
                                                                                    setTimeout(function(){
$('.coinflipButtons > button').prop('disabled', false);
$('#coin').removeClass('tails');
$('#coin').removeClass('heads');
$('#coin').removeClass('rebro');
                                                                                    }, 7500);

                      }
                                        }
                                    });
                                }
function betdice() {
$('#betDice').html('Кидаем кости..');                                                       	
$('#betDice').prop('disabled', true);		
$.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
											
										
										},	
                                                                                data: {
                                                                                    type: "dice",
                                                                                    betsize: $('#betSizeDice').val(),
                                                                                    celwin: $('#r1').val(),
                                                                                   
                                                                                    
                                                                                },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                           if(obj.success == "fatal") {
                $('#betDice').html('Сделать ставку <i class="fas fa-coins"></i>');                                                       	
                $('#betDice').prop('disabled', false);
                                               $.wnoty({
				position : 'top-right',
				type: 'error',
				message: obj.error
			});
			return false;
                                           }
                                            if (obj.success == "success") {

	                                            $('.index__home__indicator__inner').show();
				$('.index__home__indicator__inner__number').animate({
					'left': $('#r1').width() / 100 * obj.num + 'px'
				});
				$('#nums').css('color', 'green');
				$('#nums').html(obj.num);
				setTimeout(function() {
				$('#userBalance').attr('myBalance', obj.new_balance);
                updateBalance(obj.balance, obj.new_balance);
				$('#betDice').html('Сделать ставку <i class="fas fa-coins"></i>');                                                       	
                $('#betDice').prop('disabled', false);
				}, 700);
                	
                                            }else{

				$('.index__home__indicator__inner').show();
				$('.index__home__indicator__inner__number').animate({
					'left': $('#r1').width() / 100 * obj.num + 'px'
				});
				$('#nums').css('color', 'red');
				$('#nums').html(obj.num);
				setTimeout(function() {
				$('#userBalance').attr('myBalance', obj.new_balance);
                updateBalance(obj.balance, obj.new_balance);
				$('#betDice').html('Сделать ставку <i class="fas fa-coins"></i>');                                                       	
                $('#betDice').prop('disabled', false);
				}, 700);							
												
											}
                                        }
                                    });
                                    
                                }
function fun1() {
    var val = $('.range').val(); 
		
		$('.range').css({ 
		'background': '-webkit-linear-gradient(left ,#F10260 0%,#F10260 ' + val + '%,#08E547 ' + val + '%, #08E547 100%)' 
		}); 
		var chance = (100 - $('#r1').val()).toFixed(2); 
		var viplata = 99 / chance; 

		$('#one').html(chance); 
		$('#winner').html(viplata.toFixed(2)); 

		var summ = $("#stavka_dice").val(); 
		var win1 = $('#winner').html(); 
		var summa = summ * win1; 

		$("#win").text(summa.toFixed(2)) 
		$('#chance_2').val((100 - $('#r1').val()).toFixed(2));
}
function select_team(team,hiden) {
  $('#error_battle').hide();
  color = team;
  // #8c66ff
  var per = $("#BetPerBattle").val();
  if(color == "blue") {
    var chance = (0 + per) / 100;
  }
  if(color == "red") {
    var chance = (100 - per) / 100;
  }
  build(chance);
  $("#" +color+ "select").css('border', '1px solid #0b6cee' );
  $("#" +hiden+ "select").css('border', '1px solid #d2dde9');
}
function profitbattle() {
  $('#ProfitBattle').html(((100 / $('#BetPerBattle').val()) * $('#BetSizeBattle').val()).toFixed(2)); 
}
function battlechance(inp) {
  $('#MinRangeBattle').html(Math.floor(($('#BetPerBattle').val() / 100) * 999));
  $('#MaxRangeBattle').html(999 - Math.floor(($('#BetPerBattle').val() / 100) * 999));
  if(color == "") {
    inp.value = 50;
    $('#MinRangeBattle').html(Math.floor(($('#BetPerBattle').val() / 100) * 999));
   $('#MaxRangeBattle').html(999 - Math.floor(($('#BetPerBattle').val() / 100) * 999));
    var per = $("#BetPerBattle").val();
    var chance = (0 + per) / 100;
    build(chance);  
    $("#error_battle").show();
    $("#error_battle").html('Выберите цвет');
    
  }
  if(inp.value == 95) {
    $('#MinRangeBattle').html(Math.floor(($('#BetPerBattle').val() / 100) * 999));
   $('#MaxRangeBattle').html(999 - Math.floor(($('#BetPerBattle').val() / 100) * 999));
   var per = $('#BetPerBattle').val();
   if(color == "blue") {
   var chance = (0 + per) / 100;
  }
  if(color == "red") {
    
   var chance = (100 - per) / 100;
  }
  build(chance);
  }
  if(inp.value > 95) {
   inp.value = 95; 
   $('#MinRangeBattle').html(Math.floor(($('#BetPerBattle').val() / 100) * 999));
   $('#MaxRangeBattle').html(999 - Math.floor(($('#BetPerBattle').val() / 100) * 999));
   var per = $('#BetPerBattle').val();
   if(color == "blue") {
   var chance = (0 + per) / 100;
  }
  if(color == "red") {
    
   var chance = (100 - per) / 100;
  }
  build(chance);
  }
  if(inp.value < 1) {
   inp.value = 1;
   $('#MinRangeBattle').html(Math.floor(($('#BetPerBattle').val() / 100) * 999));
   $('#MaxRangeBattle').html(999 - Math.floor(($('#BetPerBattle').val() / 100) * 999));
   var per = $('#BetPerBattle').val();
   if(color == "blue") {
   var chance = (0 + per) / 100;
  }
  if(color == "red") {
   var chance = (100 - per) / 100;
  }
  build(chance);
  }
  // если все правильно, то крутим баттл
  var per = $('#BetPerBattle').val();
  if($('#BetPerBattle').val() < 95 && $('#BetPerBattle').val() > 0.99) {
  if(color == "blue") {
    var chance = (0 + per) / 100;
  }
  if(color == "red") {
    var chance = (100 - per) / 100;
  }
  build(chance);
}
}
function battlebet() {
  $('#createBetBattle').prop('disabled', true);
  $('#BetPerBattle').prop('disabled', true);
  $('#BetSizeBattle').prop('disabled', true);
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
 $("#success_battle").hide();
   $("#error_battle").hide();
										},	
                                                                                data: {
                                                                                    type: "battledice",
                                                                                     per: $('#BetPerBattle').val(),
                                                                                     sum: $('#BetSizeBattle').val(),
                                                                                     team: color
          
                                                                          
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                          if (obj.success == "fatal") {
  $('#createBetBattle').prop('disabled', false);
  $('#BetPerBattle').prop('disabled', false);
  $('#BetSizeBattle').prop('disabled', false);                                          
  $("#error_battle").show();
  $("#error_battle").html(obj.error);
                                          }
                                          if (obj.success != "fatal"){
                                            
             $("#circle").css('transition', 'transform 3.9s cubic-bezier(0.15, 0.15, 0, 1)');
$("#circle").css('transform', 'rotate(' + (3600 + obj.number * 0.36) + 'deg)');
setTimeout(function() {
  $("#circle").css('transition', 'transform 0s');
  
  $("#circle").hide();
  $("#circle").css('transform', 'rotate(0deg)');
  $("#circle").fadeIn(900);
  $('#createBetBattle').prop('disabled', false);
  $('#BetPerBattle').prop('disabled', false);
  $('#BetSizeBattle').prop('disabled', false); 
}, 4900);
 setTimeout(function() {
 $('#userBalance').attr('myBalance', obj.new_balance);
  updateBalance(obj.balance, obj.new_balance);
   
 }, 3900);       
                                            if (obj.success == "success") {
          setTimeout(function() {                                    
 $("#success_battle").show();
 $("#success_battle").html("Выиграли <b>"+obj.win+"</b>");
            
          }, 3900);                                          
                                            }
                                          if (obj.success == "error") {
                // error
                                            
 
    setTimeout(function() {                                           
  $("#error_battle").show();
  $("#error_battle").html(obj.error);
  }, 3900);                                          
                                            }
                                        } 
  }
           
   });
       
      }

function build(blue_cur) {
  var blue = d3.arc()
      .innerRadius(155)
      .outerRadius(180)
      .startAngle(0)
      .endAngle(2 * Math.PI * blue_cur);
  $("#blue").attr('d', blue());
  var red = d3.arc()
      .innerRadius(155)
      .outerRadius(180)
      .startAngle(2 * Math.PI * blue_cur)
      .endAngle(2 * Math.PI);
  $("#red").attr('d', red());
}
function deposit_default() {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#depositButton').html('<div class="loader" style="height:23px;width:23px"></div>');  
$("#error_deposit").hide();
										},	
                                                                                data: {
                                                                                    type: "deposit",
           sum: $("#depositSize").val()
                                                                          
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                 $('#depositButton').html('Далее');                             
                  window.location.href = obj.locations;
                                                                return 
                                            }else{
                 $('#depositButton').html('Далее');                              
                $("#error_deposit").show();                               
                $("#error_deposit").html(obj.error); 
                                            }
                                        }   
   });
}
function continue_reg() {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#contbutton').html('<div class="loader" style="height:23px;width:23px"></div>');  
$("#error_registerc").hide();
										},	
                                                                                data: {
                                                                                    type: "continue_reg",
           login: $("#updatelog").val(),
           pass: $("#updatepass").val()                                                               
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                 $('#contbutton').html('Продолжить');                             
                  location.reload(true);
                                                                return 
                                            }else{
                 $('#contbutton').html('Продолжить');                              
                $("#error_registerc").show();                               
                $("#error_registerc").html(obj.error); 
                                            }
                                        }   
   });
  
}
function register_default() {
  if(!$('#CheckBox_9').prop('checked')) {
    
                                
                                    $('#error_register').css('display', 'block');
           return $('#error_register').html('Поставьте галочку');
                                }
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

										},	
                                                                                data: {
                                                                                    type: "registration",
           login: $("#userRegsiter").val(),
           pass: $("#userPassRegister").val(),                                      repeatpass: $("#userPassRegister1").val()                         
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                  location.reload(true);
                                                                return 
                                            }else{
                $("#error_register").show();                               
                $("#error_register").html(obj.error); 
                                            }
                                        }   
   });
}
function login_default() {
   $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

										},	
                                                                                data: {
                                                                                    type: "login",
           login: $("#userLogin").val(),
           pass: $("#userPass").val()                                                                       
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                  location.reload(true);
                                                                return 
                                            }else{
                $("#error_enter").show();                               
                $("#error_enter").html(obj.error); 
                                            }
                                        }   
   });
}
function removeWithdrawUser(deletew) {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {

										},	
                                                                                data: {
                                                                                    type: "deletewithdraw",
           del: deletew
                                           
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                   $("#withdrawT").load("index.php #withdrawT");                           
                                                    $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                                                return 
                                            }else{
                $("#withdrawT").load("index.php #withdrawT"); 
                                            }
                                        }   
   });
}
function createwithdraw() {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#withB').html('<div class="loader" style="height:23px;width:23px"></div>');
$("#succes_withdraw").hide(); 
  $("#error_withdraw").hide(); 
										},	
                                                                                data: {
                                                                                    type: "withdrawuser",
           system: $('#hide_search').val(),
           wallet: $('#walletNumber').val(),                                        sum: $('#WithdrawSize').val()                                   
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                   $("#withdrawT").load("index.php #withdrawT");                           
                    $("#withB").html('Вывести');                          
                    $("#succes_withdraw").show();                          
					$("#succes_withdraw").html("Выплата успешно создана"); 
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                                                return 
                                            }else{
                 $("#withB").html('Вывести'); 
                $("#error_withdraw").show();                               
				$("#error_withdraw").html(obj.error);
                                            }
                                        }   
   });
}
function createpromo() {

 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$('#createbutton').html('<div class="loader" style="height:23px;width:23px"></div>');
$("#succes_promocreate").hide(); 
  $("#error_promocreate").hide(); 
										},	
                                                                                data: {
                                                                                    type: "createPromoUser",
           createname: $('#createname').val(),
           createsum: $('#createsum').val(),                                        createactive: $('#createactive').val()                                   
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                    $('#createbutton').html('Создать');                         
                    $("#succes_promocreate").show();                          
					$("#succes_promocreate").html("Промокод создан"); 
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                                                return 
                                            }else{
                $('#createbutton').html('Создать');                               
                $("#error_promocreate").show();                               
				$("#error_promocreate").html(obj.error);
                                            }
                                        }   
   });
}
function activepromo() {
/*  setTimeout(function() {
    $("#error_promoactive").fadeOut();
    $("#succes_promoactive").fadeOut(); 
  }, 5000); */
  if($('#promoactive').val() == '') {
    $("#error_promoactive").show();                               
				 return $("#error_promoactive").html("Введите промокод");
  }
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
  $('#activebutton').html('<div class="loader" style="height:23px;width:23px"></div>');
$("#succes_promoactive").hide(); 
  $("#error_promoactive").hide(); 
										},	
                                                                                data: {
                                                                                    type: "activePromo",
           promoactive: $('#promoactive').val()                                                                       
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                    $('#activebutton').html('Активировать');                           
                    $("#succes_promoactive").show();                          
					$("#succes_promoactive").html("Промокод активирован"); 
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                                                return 
                                            }else{
                $('#activebutton').html('Активировать');                               
                $("#error_promoactive").show();                               
				$("#error_promoactive").html(obj.error);
                                            }
                                        }   
   });
}
function getDaily() {
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '../action.php',
beforeSend: function() {
$("#succes_promo").hide(); 
  $("#error_promo").hide(); 
										},	
                                                                                data: {
                                                                                    type: "bonus"
           },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                    $("#succes_promo").show();                          
					$("#succes_promo").html("Получено в раздаче <b>"+ obj.bonussize + "</b>"); 
                                              $('#userBalance').attr('myBalance', obj.new_balance);
                                                                        updateBalance(obj.balance, obj.new_balance);
                                                                return 
                                            }else{
                $("#error_promo").show();                               
				$("#error_promo").html(obj.error);
                                            }
                                        }   
   });
}