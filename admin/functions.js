
function create() {
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
			$("#succes_creat").hide(); 
  			$("#error_creat").hide();   
										},	
                                                                                data: {
                                                                                    type: "creatpromo",
           promoname: $("#promoname").val(),                                        promosum: $("#promosum").val(),
           promoact: $("#promoact").val()                                                                      
                                                                                                                            },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                $("#promoname").val('');
                $("#promosum").val('');
                $("#promoact").val('');
                $("#succes_creat").show();                               
				$("#succes_creat").html("Промокод создан");
                     $("#promo-tbl").load("promo.php #promo-tbl");
                                            
                                                              
                                            }else{
                $("#error_creat").show();                               
				$("#error_creat").html(obj.error);
                                            }
                                        }   
   });
}
function save_user_edit() {
  
 $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
				$("#status").hide();	
										},	
                                                                                data: {
                                                                                    type: "saveInfo",
           id: $("#userid").html(),
           username: $("#username").val(),                                          userpass: $("#userpass").val(),
           userbal: $("#userbal").val(),
           userlose: $("#loser").val(),
           userwin: $("#winner").val()                                                                       
                                                                                                                            },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                     $("#status").show();                         
					 $("#status").html("Данные успешно изменены");
                                            
                                                                return 
                                            }else{
                $("#status").show();                               
				$("#status").html(obj.error);
                                            }
                                        }   
   });
}
function select(id) {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
					
										},	
                                                                                data: {
                                                                                    type: "getInfo",
           id: id                                                                      
                                                                       },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                        
                     $("#userid").html(obj.id);      
					 $("#username").val(obj.log);
                     $("#userpass").val(obj.pass);
                     $("#userbal").val(obj.bal);                         
                                                                return 
                                            }else{
                                               
				 location.reload(true);
                                            }
                                        }   
   });
}
function ban_adm(hashed) {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
					
										},	
                                                                                data: {
                                                                                    type: "ban",
           hashuser: hashed                                                                      
                                                                       },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
                                        
                    // alert('Пользователь забанен');
                       $("#"+hashed).load("users.php #"+hashed);                       
					   $("#stat"+hashed).load("users.php #stat"+hashed);
                                              
                       $("#banbutt"+hashed).load("users.php #banbutt"+hashed);
                                            }else{
                                               
				alert(obj.error);
                                            }
                                        }   
   });

  
}


function unban_adm(hashed) {
  $.ajax({
                                                                                type: 'POST',
                                                                                url: '/admin/admin_func.php',
beforeSend: function() {
					
										},	
                                                                                data: {
                                                                                    type: "unban",
           hashuser: hashed                                                                      
                                                                       },
                                        success: function(data) {
                                            var obj = jQuery.parseJSON(data);
                                            if (obj.success == "success") {
            $("#"+hashed).load("users.php #"+hashed);                       
			$("#stat"+hashed).load("users.php #stat"+hashed);
                                              
            $("#banbutt"+hashed).load("users.php #banbutt"+hashed);                   
                         //$("#"+hashed).load("users.php #"+hashed);  
                      //alert('Пользователь разбанен'); 
                      //location.reload(true);                        
					                                     return
                                                                 
                                            }else{
                                               
				alert(obj.error);
                                            }
                                        }   
   });

  
}