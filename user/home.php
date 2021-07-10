<?php require('sql_connection.php') ?>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../css/app.css">
</head>
<body>

	<?php include 'header.php'; ?>

    <main class="py-4">
        <div class="container">

        	<h2> NEMA !TREES!</h2>
        	<hr>

        	<form method="POST" action="save_user.php">
        		<div class="row">
        			<div class="col-md-6">
        				<img src="trees.jpg" class="img-rounded" alt="Cinque Terre">
                    
        				<label>Email</label><br>
        				<input type="email" name="email_address" class="form-control" required>

        				<!-- read districts -->

        				<?php 

        				$results = $sql_connection->query("SELECT ID, NAME FROM districts ORDER BY ID ASC");
        				 ?>

        				

        					<?php 

        					foreach ($results as $key => $value) {

	                           $id = $value["ID"];
	                           $name = $value["NAME"];

	                           echo "<option value='$id'>$name</option>";

	                        }


        					 ?>
        				</select>
     
                        
        				<br>

        				<label>Password</label><br>
        				<input type="password" name="user_password" class="form-control" required>

        				

        				<hr>


        				<button type="submit" class="btn btn-danger">Login</button>

        			</div>
        		</div>
        	</form>

        </div>
    </main>

</body>
</html>