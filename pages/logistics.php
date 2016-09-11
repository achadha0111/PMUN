<!-- COPYRIGHT - Aayush Chadha, Prepare for IBDP Computer Science Internal Assessment, May 2016 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> PMUN | Logistics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel = 'stylesheet' href="/web-files/Styles/registration.css">
  </head>
  <body>
<?php
$logi = new mysqli("localhost", "root", "root", "pmun") or die("failed to connect to server !!");
mysqli_select_db($logi,"pmun");
  if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$grade = intval($_POST['grade']);
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
if (!$errName) {
		$result='<div class="alert alert-success">Thank You! Please check the allocations page.</div>';
		$sLogi = "INSERT INTO logi (Name, Grade)
				VALUES ('$name', '$grade')";
		$_POST = array();
		mysqli_query($logi,$sLogi) or die(mysqli_error($sLogi));
		}
	}

mysqli_close($logi);	
?>
<div class = "jumbotron">
	<h1 style="text-align:center"> Registration </h1>
</div>

<nav role="navigation" class="navbar navbar-default  navbar-inverse">
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li style="color:white"><a href="homepage.html">Home</a></li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">General Information<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="geninfo.html">General Information</a></li>
            <li><a href="contact.php">Contact Us</a></li>
          </ul>
        </li>
            <li><a href="research.html">Research</a></li>
            <li><a href="committee.html">Committees</a></li>
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Registration<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="eb.php">Executive Board</a></li>
            <li><a href="delegate.php">Delegates</a></li>
            <li><a href="press.php">Press</a></li>
            <li><a href="logistics.php">Logistics</a></li>
          </ul>
        </li>
   			<li><a href="allocation.php">Allocations</a></li>
        <li><a href = "press.html"> Press Release</a></li>
   		</ul>
   	</div>
</nav>

  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Logistics Registration</h1>
				<form name = "eb" class="form-horizontal" role="form" method="post" action="logistics.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
                    <div class="form-group">
						<label for="grade" class="col-sm-2 control-label">Grade:</label>
						<div class="col-sm-10">
							<select class="form-control" name = "grade">
								<option value="IBDP-2">IBDP-2</option>
  								<option value="AS-Commerce">AS-Commerce</option>
  								<option value="AS-Science">AS-Science</option>
							</select>
						</div>
					</div>
                    <br><div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
                  </form>
                 </div>
                </div>
             <div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>