<body>
    <h1>
	     Thank you ! <br>
		 Please <a href='home.html'> click here</a> to continue.
	
	</h1>
<p>
    <?php
	      $first_name = filter_input(INPUT_GET , 'first_name');
		  $last_name = filter_input(INPUT_GET , "last_name");
		  $email = filter_input(INPUT_GET, 'email');
		try 
		{
		   // Connect to the database as ROOT with PASSWORD = 1470
           $con = new PDO("mysql:host=localhost;dbname=mangogogo", "root", "1470"); // NOTE: requires password
           $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $query = "INSERT INTO mangogogo.customero (c_id, first_name, last_name, pass, email, active, create_date, last_update) VALUES (null,'$first_name', '$last_name', 'password', '$email',1,NOW(),NOW())";
		   $stmt = $con->prepare($query);
		   $stmt->execute();
		   $stmt->closeCursor();
		   //$con->close();
		}
        catch(PDOException $ex) 
		{
           echo 'ERROR: '.$ex->getMessage();
        }
		
	?>
</p>
</body>