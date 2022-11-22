<!DOCTYPE html>
<html>
<head>
	<title>Vue.js CRUD (Create, Read, Update and Delete) using PHP MySQLi</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Vue.js CRUD (Create, Read, Update and Delete) using PHP MySQLi</h1>
	<div id="vuejscrudcars">
		<div class="col-md-8 col-md-offset-2">
			<div class="row">
				<div class="col-md-12">
					<h2>Car Data
					<button class="btn btn-primary pull-right" @click="showAddModal = true"><span class="glyphicon glyphicon-plus"></span> Car</button>
					</h2>
				</div>
			</div>

			<div class="alert alert-danger text-center" v-if="errorMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">×</span></button>
				<span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
			</div>
			
			<div class="alert alert-success text-center" v-if="successMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">×</span></button>
				<span class="glyphicon glyphicon-ok"></span> {{ successMessage }}
			</div>

			<table class="table table-bordered table-striped">
				<thead>
					<th>ID</th>
					<th>BRAND</th>
					<th>MODEL</th>
					<th>PRICE</th>
					<th>Action</th>
				</thead>
				<tbody>
					<tr v-for="car in cars">
						<td>{{ car.memid }}</td>
						<td>{{ car.brand }}</td>
						<td>{{ car.model }}</td>
						<td>{{ car.price }}</td>
						<td>
							<button class="btn btn-success" @click="showEditModal = true; selectCar(car);"><span class="glyphicon glyphicon-edit"></span> Edit</button> 
							<button class="btn btn-danger" @click="showDeleteModal = true; selectCar(car);"><span class="glyphicon glyphicon-trash"></span> Delete</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<?php include('modal.php'); ?>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="app.js"></script>
</body>
</html>