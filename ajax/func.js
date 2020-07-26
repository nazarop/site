var scroll = true;

var path = "../mines.php"; //Для удобства


// with <3 vk.com/id321223555







function mod(num){

				$.ajax({

					url: chatc,

					type: "POST",

					data: {

					moder: num, 

					},

					dataType: "html",

					success: function(response){

					 obj = $.parseJSON(response);

					 

					}	   

			 

				 })};    

function noblockUsers(num){

				$.ajax({

					url: chatc,

					type: "POST",

					data: {

					no_chat_ban: num, 

					},

					dataType: "html",

					success: function(response){

					 obj = $.parseJSON(response);

					

					}	   

			 

				 })};    

function blockUsers(num){

			$.ajax({

				url: chatc,

				type: "POST",

				data: {

				chat_ban: num, 

				},

				dataType: "html",

				success: function(response){

				 obj = $.parseJSON(response);

				 

				}	   

		 

			 })};

function delMess(num){

       $.ajax({

		   url: chatc,

		   type: "POST",

		   data: {

			del:num, 

		   },

		   dataType: "html",

		   success: function(response){

			obj = $.parseJSON(response);

				

		   }	   

	

		})};



function addChat(num){

 mess = $('#inputChat1').val();

 

    if(mess.length >= "1"){

    $.ajax({

        type: 'POST',

        url: chatc,

        data: {

            mess: mess,

        },

        success: function(response) {

               obj = $.parseJSON(response);

               $(".chat-send").attr("disabled","disabled");



               setTimeout(

                 function(){

                  $(".chat-send").removeAttr("disabled","disabled");

                 },5000);

$('#inputChat1').val('');

getDisplayChat();

                if(obj.good == "false") {

                    $('#messe').html(obj.mess);

                }

                else {

                    $('#messe').html(obj.mess);

                }    

              

              

            

        }

    });



}

}

function getDisplayChat(){

  $.ajax({

    url: chatc,

    dataType: "html",

    type: "POST",

    data: {

      chatGet: "ok",

    },

    success: function(response){

      obj =  $.parseJSON(response);

      $(".chat-main").html(obj.chat);

      $('.chat-main').html(obj.allmess); //.

      $('.chat-main').stop().animate({

            scrollTop: $('.chat-main')[0].scrollHeight

        }, 800);

    }

  });

};

setInterval(getDisplayChat, 1000);

function startgame(){

  var bet = $("#amountBetInputBomb").val();

  var mine = "mine";

  $.ajax({

    url: path,

    type: "POST",

    dataType: "html",

    data: {

      type: mine,

      mines: $('.actives').attr('data-select'),

      bet: bet,

    },

    success: function(response){

      obj = $.parseJSON(response);

      if(obj.info == "warning"){

       $.wnoty({

				position : 'top-right',

				type: 'error',

				message: obj.warning

			});



    }else{

      if(obj.info == "true"){

        $("#win").html("0.00");

        $("#MineProfit").html("1.00");

        $(".allin-win").css("visibility","visible");



        for(i=0;i<26;i++){

        

        $(".mine[data-number="+i+"]").removeClass("win-mine").removeAttr("disabled","disabled").text("");

        $(".mine[data-number="+i+"]").removeClass("lose-mine fas fa-bomb").removeAttr("disabled","disabled").text("");

        }

        $("#startmines").attr("disabled","disabled");

        $("#finishmines").removeAttr("disabled","disabled");

        $.wnoty({

				position : 'top-right',

				type: 'success',

				message: 'Игра началась!'

			});

        updateBalance(0, obj.money);

        //$(".mine-circle").attr("disabled","disabled");



      }

      if(obj.info == "false"){

       $.wnoty({

				position : 'top-right',

				type: 'error',

				message: 'У вас активная игра'

			});



      }

}

    }

  });

};

$( document ).ready(function() {

if(1 > 0){

$(".mine").click(

  function minclick(){

  var pressmine = $(this).attr("data-number");

  $.ajax({

   url: path,

   type: "POST",

   dataType: "html",

   data: {

     mmine: pressmine,

   },

   success: function(response){ //response

     obj = $.parseJSON(response); //response

     if(obj.info == "warning"){

      $.wnoty({

				position : 'top-right',

				type: 'error',

				message: obj.warning

			});

  }

    if(obj.info == "click"){

      if(obj.bombs == "true"){

           

            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {

               $(".mine[data-number="+obj.tamines[i]+"]").css('font-size', '18px');

           } else $(".mine[data-number="+obj.tamines[i]+"]").css('font-size', '30px');

           

           //$('#historyGameContentBombGame').html("Поле "+obj.pressmine+" оказалось с миной");

          $("#startmines").removeAttr("disabled","disabled");

       $("#finishmines").attr("disabled","disabled");

           //$(".mine-circle").removeAttr("disabled","disabled");

          $("#win").html("0.00");

           //$("#nextRewardBoxBomb").text("1.03");

           obj.tamines = $.parseJSON(obj.tamines);

           for(i = 0; i < obj.tamines.length; i++){

           $(".mine[data-number="+obj.tamines[i]+"]").addClass('mines-animation');

         

              

          

           if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {

               $(".mine[data-number="+obj.tamines[i]+"]").html('<img class="mine-res" src="../images/bomb.svg" style="width:60%; height:70%">');

           } else $(".mine[data-number="+obj.tamines[i]+"]").html('<img src="../images/bomb.svg" style="width:27px; height:37px">');

           

           updateBalance(0, obj.money);

          };

           for(i=0;i<26;i++){

             $(".mine[data-number="+i+"]").attr("disabled","disabled");

           };

          // $("#bombHistoryContent").prepend(obj.resultHistoryContentBomb);

           }else{

               $('#win').html(obj.win);

               $(".mine[data-number="+obj.pressmine+"]").html('<img src="../images/gems.svg" style="width:60%; height:50%">');

           $("#startmines").attr("disabled","disabled");

       $("#finishmines").removeAttr("disabled","disabled");

           $("#MinesProfit").text(obj.win);

           $(".mine[data-number="+obj.pressmine+"]").attr("disabled","disabled");

          // $("#historyGameContentBombGame").text("Поле " +pressmine+" оказалось призовым");

           $("#MineProfit").text(obj.nextX);

           //прокрутка истории действий

         }

   }

 }

 })

  }

);

}else{

  $.wnoty({

				position : 'top-right',

				type: 'error',

				message: 'Не спеши'

			});

};

});

function finishgame(){

  $.ajax({

    url: path,

    type: "POST",

    dataType: "html",

    data: {

      finish: true,

    },

    success: function(response){

     obj = $.parseJSON(response);

     if(obj.info == "warning"){

       $.wnoty({

				position : 'top-right',

				type: 'error',

				message: obj.warning

			});



   }else{

     obj.tamines = $.parseJSON(obj.tamines);

     if (obj.info = true){

         for(i=0;i<26;i++){

        //$(".mine[data-number="+i+"]").removeClass("win-mine").removeAttr("disabled","disabled").text("");

        //$(".mine[data-number="+i+"]").removeClass("lose-mine fas fa-bomb").removeAttr("disabled","disabled").text("");

        }

       $.wnoty({

				position : 'top-right',

				type: 'success',

				message: 'Вы выиграли '+obj.win+''

			});

        updateBalance(0, obj.money);

       $("#startmines").removeAttr("disabled","disabled");

       $("#finishmines").attr("disabled","disabled");

       //$("#historyGameContentBombGame").text("Нажмите 'играть' чтобы начать игру");

       //$("#bombHistoryContent").prepend(obj.resultHistoryContentBomb);

       

       for(i=0;i<26;i++){

          

         $(".mine[data-number="+i+"]").attr("disabled","disabled");

       }

      for(i = 0; i < obj.tamines.length; i++){

          

      //$(".mine[data-number="+obj.tamines[i]+"]").addClass('lose-mine fas fa-bomb');

      $(".mine[data-number="+obj.tamines[i]+"]").html('<img src="../images/gems.svg" style="width:30px; height:30px">');

       if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {

              $(".mine[data-number="+obj.tamines[i]+"]").html('<img src="../images/bomb.svg" style="width:60%; height:70%">');

           } else $(".mine[data-number="+obj.tamines[i]+"]").html('<img src="../images/bomb.svg" style="width:27px; height:37px">'); //$(".mine[data-number="+obj.tamines[i]+"]").css('font-size', '30px');

      }

      }

}



   },

  })

};







function openMines(id){

$.ajax({

		url: path,

		type: "POST",

  dataType: "HTML",

  data: {

  openMines: 'openMines',

  idMines: id,

  },

  success: function(response){

  obj = $.parseJSON(response);

  obj.minesopen = $.parseJSON(obj.minesopen);





$('#open-mines-modal').modal();

$(".openMines").html(obj.minesopen);

$("#idbetMines").text(obj.idbetMines);

$("#coefMinesOpen").text(obj.coefMinesOpen);



if(obj.loseBomb != null){

$(".openMines[data-number="+obj.loseBomb+"]").addClass("lose-mine fas fa-bomb");

}

$("#openMinesLogin").text(obj.loginMinesOpen); //attr("onclick='+obj.idUsersOpen+'")

$("#winminesOpen").text(obj.winminesOpen);



  }

	}

	) 



}



