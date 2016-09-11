
<!-- COPYRIGHT - Aayush Chadha, Prepare for IBDP Computer Science Internal Assessment, May 2016 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EB registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel = 'stylesheet' href="/web-files/Styles/registration.css">
  </head>
  <body>
<?php
$eb = new mysqli("localhost", "root", "root", "pmun") or die("failed to connect to server !!");
mysqli_select_db($eb,"pmun");
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$experience = intval($_POST['experience']);
		$compref1 = $_POST['compref1'];
		$compref2 = $_POST['compref2'];
		$post1 = $_POST['post1'];
		$post2 = $_POST['post2']; 
		$buzzword = $_POST['buzzword'];
		$errName = NULL;
		$errCompref = NULL;
		$errBuzzword = NULL;
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if committee preferences are distinct
		if ($compref1 == $compref2) {
			$errCompref = 'Please select distinct committees';
		}
		
		//Check if buzzword has been entered
		if (!$_POST['buzzword']) {
			$errBuzzword = 'Please enter buzzword';
		}
		//Check if buzzword is correct
		if ($_POST['buzzword'] !== 'somebuzzword') {
			$errBuzzword = 'Buzzword incorrect';
		}
// If there are no errors, send the email
if (!$errName && !$errCompref && !$errBuzzword) {
		$result='<div class="alert alert-success">Thank You! Please check the allocations page.</div>';
		$Eb = "INSERT INTO eb (Name, Experience, Committee1, Committee2, Post1, Post2)
				VALUES ('$name', '$experience', '$compref1', '$compref2', '$post1', '$post2')";
		$_POST = array();
		mysqli_query($eb,$Eb) or die(mysqli_error($eb));
		}
	}

mysqli_close($eb);	
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
  				<h1 class="page-header text-center">EB Registration</h1>
				<form name = "eb" class="form-horizontal" role="form" method="post" action="eb.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="mun" class="col-sm-2 control-label">Experience</label>
						<div class="col-sm-10">
							<select class="form-control" name = "experience">
  								<option value="1">1</option>
  								<option value="2">2</option>
  								<option value="3">3</option>
  								<option value="4">4</option>
  								<option value="5">5</option>
  								<option value="6">6</option>
  								<option value="7">7</option>
  								<option value="8">8</option>
  								<option value="9">9</option>
  								<option value="10">10</option>
  								<option value="11">11</option>
  								<option value="12">12</option>
  								<option value="13">13</option>
  								<option value="14">14</option>
  								<option value="15">15</option>
  								<option value="16">16</option>
  								<option value="17">17</option>
  								<option value="18">18</option>
  								<option value="19">19</option>
  								<option value="20">20</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="compref1" class="col-sm-2 control-label">1st Committee Preference</label>
						<div class="col-sm-10">
							<select class="form-control" name = 'compref1'>
  								<option value="UNSC">UNSC</option>
  								<option value="DISEC">DISEC</option>
  								<option value="G20">G20</option>
  								<option value="HRC">HRC</option>
  								<option value="WHO">WHO</option>
  								<option value="IYP">IYP</option>
								<option value="JAC">JAC</option>
								<option value="UNODC">UNODC</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="compref2" class="col-sm-2 control-label">2nd Committee Preference</label>
						<div class="col-sm-10">
							<select class="form-control" name = 'compref2'>
  								<option value="UNSC">UNSC</option>
  								<option value="DISEC">DISEC</option>
  								<option value="G20">G20</option>
  								<option value="HRC">HRC</option>
  								<option value="WHO">WHO</option>
  								<option value="IYP">IYP</option>
								<option value="JAC">JAC</option>
								<option value="UNODC">UNODC</option>
							</select>
							<?php echo "<p class='text-danger'>$errCompref</p>";?>
						</div>
					</div>
					<div class = "form-group">
						<label for = "compref1-post" class = "control-label col-sm-2"> Post in Committee 1:</label>
						<div class = "col-sm-10">
							<select class="form-control" name = 'post1'>
  								<option>Chair</option>
  								<option>Co-chair</option>
  								<option>Moderator</option>
							</select>
						</div>
					</div>
					<div class = "form-group">
						<label for = "compref2-post" class = "control-label col-sm-2"> Post in Committee 2:</label>
						<div class = "col-sm-10">
							<select class="form-control" name = 'post2'>
  								<option>Chair</option>
  								<option>Co-Chair</option>
  								<option>Moderator</option>
							</select>
						</div>
					</div>
					<div class = "form-group">
						<label for = "buzzword" class = "control-label col-sm-2"> Buzzword:</label>
						<div class = "col-sm-10">
							<input type = "password" class="form-control" name="buzzword" id="buzzword" placeholder = "Prevents IB1 Applications" value="<?php echo htmlspecialchars($_POST['buzzword']); ?>">
							<?php echo "<p class='text-danger'>$errBuzzword</p>";?>
					<br><div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
							<br><h4>Repeated submissions will result in disqualification from EB applications</h4>
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