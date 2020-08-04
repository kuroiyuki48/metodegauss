<!DOCTYPE html>
<html>
<head>
	<title>Metode Eliminasi Gauss</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<body class="container m-auto">
	<div class="card text-center">
		<?php session_start() ?>
		<h1 class="card-header">Eliminasi Gauss Jordan</h1>
		<div class="card-body">
			<form action="index.php" method="GET" class="">
				<div class="row mb-5">
					<div class="col-md-9 col-9">
						<input type="number" min="2" class="form-control" name="jumlah" required="">
					</div>
					<div class="col-md-3 col-3">
						<input type="submit" class="btn btn-success" value="Tampilkan Persamaan">
					</div>
				</div>
			</form>
			<?php
			if (isset($_GET['jumlah'])) {
				$jumlah= $_GET['jumlah'];
				showForm($jumlah);

				$_SESSION['jumlah']= $jumlah;
			}

			function showForm($jumlah){
				echo '
				<form action="func.php" method="GET">';
				for($i=0; $i<$jumlah;$i++){
					echo '<div class="col-md-12"><div class="row"><h5 class="mb-5">Persamaan '.$i.' : </h5><p></p>';
					for($j=0; $j<$jumlah+1;$j++){
						if($j<$jumlah){
							echo '
							<div class="col-md-2 col-2">
								<input class="form-control" type="number" name="var'.$i.$j.'" required>X <sub>'.$j.'</sub>
							</div>';
						}else{
							echo ' = 
							<div class="col-md-2 col-2">
								<input class="form-control" type="number" name="var'.$i.$j.'" required>
							</div>';
						}
					}
				}
				echo '
							<div class="col-md-12 mt-3">
								<input type="submit" class="btn btn-primary float-right" value="Proses">
							</div>
					</div>
				</form>
				';
			}

			?>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</html>