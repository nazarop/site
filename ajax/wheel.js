function update(balance) {
     updateBalance(0, balance);
}
function wheel(colorWheel){
    var animateInt = getRandomInt(7, 12);
    var animateRotateInt = getRandomInt(0, 4);
    $("#x50").css({"transform":"rotate(183deg)"});
    $("#x50").css({"transition":"0s"});
    $.ajax({
    type: 'POST',
    url: '../action.php',
beforeSend: function() {
   },
      data: {
  
     type: "wheel",
     color: colorWheel,
     size: $('#amountBetInputWheelGame').val()
     },
      success: function(response){
        obj = $.parseJSON(response);
        if(obj.success == "fatal"){
             $.wnoty({
        position : 'top-right',
        type: 'error',
        message: obj.mess
      });
      //return false;
        }
       
        if(obj.success == "success"){
            var bal = obj.new;
            var dtype = obj.type;
            var dmess = obj.mess;
         setTimeout(function() {
             update(bal);
              $.wnoty({
        position : 'top-right',
        type: dtype,
        message: dmess
      });
         }, animateInt*1000);
          var rotateWheel = (obj.key*(360/54) + 360*3-3+180+11+animateRotateInt)
          $("#x50").css({"transform":"rotate("+rotateWheel+"deg)","transition":""+animateInt+"s"});
          $(".dice-game-box-percent-btn").attr("disabled","disabled");
        
          setTimeout(function(){
              $(".dice-game-box-percent-btn").removeAttr("disabled","disabled");
         
            },animateInt*1000);

        }
      
        if(obj.valuesWheel == 2){
          setTimeout( function(){
          $("#chanceArrow").css("color","rgb(39, 45, 60)");
          
        },animateInt*1000);
        }
        if(obj.valuesWheel == 3){
          setTimeout( function(){
          $("#chanceArrow").css("color","rgb(191, 82, 111)");
         
        },animateInt*1000);
        }
        if(obj.valuesWheel == 5){
          setTimeout( function(){
          $("#chanceArrow").css("color","rgb(52, 94, 215)");
          },animateInt*1000);
        }
        if(obj.valuesWheel == 50){
          setTimeout( function(){
          $("#chanceArrow").css("color","rgb(238, 209, 82)");
        
        },animateInt*1000);
        }
      }
    });
  };
function getRandomInt(min, max)
{
  return Math.floor(Math.random() * (max - min + 1)) + min;
}