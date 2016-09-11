
<!-- COPYRIGHT - Aayush Chadha, Prepare for IBDP Computer Science Internal Assessment, May 2016 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMUN | Press</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel = 'stylesheet' href="/web-files/Styles/registration.css">
  </head>
  <body>
<?php
$press = new mysqli("localhost", "root", "root", "pmun") or die("failed to connect to server !!");
mysqli_select_db($press,"pmun");
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$grade = $_POST['grade'];
		$experience = $_POST['experience'];
		$essay = $_POST['essay'];
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		
// If there are no errors, send the email
if (!$errName && !$errExperience && !$errEssay) {
		$result='<div class="alert alert-success">Thank You! Application Submitted</div>';
		$sPress = "INSERT INTO press (Name, Grade, Experience, Essay)
				VALUES ('$name', '$grade', '$experience',  '$essay')";
		$_POST = array();
		mysqli_query($press,$sPress) or die(mysqli_error($press));
	} else {
		$result='<div class="alert alert-danger">Sorry, there was an error sending your application. Please try again later.</div>';
	}
}
mysqli_close($press);		
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
  				<h1 class="page-header text-center">Press Registration</h1>
				<form class="form-horizontal" role="form" method="post" action="press.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name:</label>
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
					<div class="form-group">
						<label for="experience" class="col-sm-4 control-label">Press Experience at previous MUNs:</label>
						<div class="col-sm-8">
							<textarea type = "text" rows = "4" cols = "50">
                            </textarea>
                            <?php echo "<p class='text-danger'>$errExperience</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="essay" class="col-sm-4 control-label">Essay: 200-250 words(Delete the pre-entered text after reading it)</label>
						<div class="col-sm-8">
							<textarea type = "text" rows = "4" cols = "50">  
								You wake up to find that the country is suddenly at peace with all of the bans and discriminatory laws that have been fought against for years. 
                               	Explain how you'd make peace with it or revolt against it in 200-250 words.
                            </textarea>
                            <?php echo "<p class='text-danger'>$errEssay</p>";?>
						</div>
					</div>
					<br><div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
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
	</div>   
      <script src = '/web-files/scripts/jquery-2.1.4.min.js'></script>
   	  <script src= '/web-files/scripts/bootstrap.js'></script>
  </body>
</html>