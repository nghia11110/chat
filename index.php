<!doctype>
<html>
<head>
<title>Chat</title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.js"></script>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
$(document).ready(function() {
	
	   $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#messages').hide();
                $('#messages').show();
				$("#messages").animate({"scrollTop": $('#messages')[0].scrollHeight}, "slow");
            },
            complete: function() {
                $('#messages').hide();
                $('#messages').show();
				$("#messages").animate({"scrollTop": $('#messages')[0].scrollHeight}, "slow");
            },
            success: function() {
                $('#messages').hide();
                $('#messages').show();
				$("#messages").animate({"scrollTop": $('#messages')[0].scrollHeight}, "slow");
            }
        });
		
        var $container = $("#messages");
        $container.load('load.php');
          
        var refreshId = setInterval(function()
        {
        	 $container.load('load.php');
        }, 100); 
        
	$("#userArea").submit(function() {
		
		$.post('post.php', $('#userArea').serialize(), function(data) {
			$("#messages").append(data);
			//("#messages").animate({"scrollTop": $('#messages')[0].scrollHeight}, "slow");
			document.getElementById("output").value = "";	
	
		});
		return false;
	});
	
	
	
});
function delete_message(id){
	$.ajax({
        type:"POST",
        url: "delete.php",
        data: "id_delete=" + id ,
        success: function(){
        	$.post('delete.php');
         }
	});
}
var id_edit;
function edit_message(id){
	$("#message_edit").show();
	id_edit=id;
	return id_edit;
	
}
function confirm_edit() {
	$.ajax({
        type:"POST",
        url: "edit.php",
        data: "id_edit=" + id_edit + "message_edit=" + $("#output_edit").html(),
        success: function(){
        	$.post('edit.php');
         }
	});
	$("#message_edit").hide();
	console.log("hehehe"+$("#output_edit").html());
}
</script>


</head>
<body>
<div id="chatwrapper">
<div id="messages">
</div>
<div id="message_edit">
<textarea id="output_edit" name="messages_edit" placeholder="Message" /></textarea>
<button  value="Post message" id="submitmessage_edit" onclick="confirm_edit()" style="color: black" >Edit</button>
</div>
<!--post-->
<form id="userArea">
<div id="username">
<input type="text" name="user" placeholder="User" required="required" value="nghia" id="text" style="margin-bottom: 5px;" />
</div>
<div id="messagesntry">
<textarea id="output" name="messages" placeholder="Message" /></textarea>
</div>
<div id="messagesubmit">
<input type="submit" value="Post message" id="submitmessage" style="color: black" />
</div>
</form>
</div>
</body>
</html>