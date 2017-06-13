<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Search</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<input type="text" class="form-control" id="searchbx" name="searchbx">
					</div>
					<table class="table table-bordered">
						<thead>
							<tr>
								<td>ID</td>
								<td>Item Name</td>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('#searchbx').on('keyup', function(){
			$value = $(this).val();
			$.ajax({
				type : 'get',
				url : '{{URL::to('findItem')}}',
				data: {'search':$value},
				success:function(data){
					console.log(data);
				}
			})
		});
	</script>
</body>
</html>