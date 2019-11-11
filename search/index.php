<!DOCTYPE html>
<html>
<head>
    <title>Typeahead Js</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="typeahead.js"></script>
	<link rel="stylesheet" type="text/css" href="typeahead.css">	
</head>
<body>
	<div class="bgcolor">
		<label class="demo-label">Search Country:</label><br/> 
		<input type="Search" name="txtCountry" id="txtCountry" class="typeahead"/>
	</div>
</body>
<script>
    $(document).ready(function () {
        $('#txtCountry').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "server.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>
</html>