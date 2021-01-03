<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript"> 
            function autofill(){
                var test = $("#test").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"test="+test ,
                }).success(function (data) {
                    
                    alert('dddd');
                   
                });

            }
    </script>
</head>
<body>
	<input type="text" id="test" name="test" onkeyup="autofill()">
	<input type="text" id="test3" name="test3">
</body>
</html>