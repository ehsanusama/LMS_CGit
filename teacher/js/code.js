 $( function() {

    $( ".dateField" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '1945:'+(new Date).getFullYear(),
      dateFormat:'yy-mm-d' 
    });

     $( ".monthDateField" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '1945:'+(new Date).getFullYear(),
      dateFormat:'yy-mm' 
    });
  } );

  $("#chatForm").unbind().bind('submit',function(){
     $(".chat_body").scrollTop($(".chat_body").prop("scrollHeight"));
  	var form = $(this);
  	var url = form.attr('action');
  	var type = form.attr('method');

  	$.ajax({
  		type:type,
  		url:url,
  		data:form.serialize(),
  		dataType:'text',
  		success:function(response){
  			if(!response.includes("true")){
  			alert(response);
  			}else{
  				loadMessages();
  			form[0].reset();
  			$("#chat_msg").focus();
  			loadMessages();

  			}	
  		}//success
  	});
  	return false;
  });//chatForm

  function readAllMessages(id){
  	$.ajax({
  		type:'GET',
  		url:"ajax/read_all_message.php",
  		data:{id:id},
  		dataType:'text',
  		success:function(response){
  		}//success
  	});
  }

  function loadMessages(){
     $(".chat_body").scrollTop($(".chat_body").prop("scrollHeight"));
  	$.ajax({
  		type:'GET',
  		url:"ajax/get_messages.php",
  		data:{},
  		dataType:'text',
  		success:function(response){
  			$("#chat_body").html(response);
  		}//success
  	});
  }
    loadMessages();
  setInterval(loadMessages,2000);


  // delete_chat_message

  $(document).on('click','.delete_chat_message',function(){
   var x=confirm('Do you really want to delete Message?');
   if (x==true) {
      $.ajax({
      type:'GET',
      url:"ajax/delete_chat.php",
      data:{chat_id:$(this).attr('title')},
      dataType:'text',
      success:function(response){
      }//success
    });
   }//yes
  });


