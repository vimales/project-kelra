<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>


<input id="textbox1" type="text" placeholder="type a text" name="textbox" />
<br>
<input id="save1" type="button" value="save" name="save" />

<br>u typed :<span id="response"><span>

<script type="text/javascript">
$(document).ready(function(){
		$("#save1").click(function(event){
				console.log("clicked");
				var a = $("#textbox1").val();
				$("#response").load("<?php echo base_url("index.php/Ajax_controller/display");?>", {"text":a});
});
});
</script>
</body>
</html>