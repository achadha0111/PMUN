<!-- COPYRIGHT - Aayush Chadha, Prepare for IBDP Computer Science Internal Assessment, May 2016 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMUN | Delegate</title>
    <link rel = 'stylesheet' href="/web-files/Styles/bootstrap.min.css"/>
	<link rel = 'stylesheet' href="/web-files/Styles/registration.css">
  </head>
  <body>
<?php
$delegate = new mysqli("localhost", "root", "root", "pmun") or die("failed to connect to server !!");
mysqli_select_db($delegate,"pmun");
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$grade = $_POST['grade'];
		$experience = intval($_POST['experience']);
		$compref1 = $_POST['compref1'];
		$compref2 = $_POST['compref2'];
		$conpref1 = $_POST['conpref1'];
		$conpref2 = $_POST['conpref2']; 
		$bestdel = intval($_POST['bestdel']);
		$spm = intval($_POST['spm']);
		$verbal = intval($_POST['verbal']);
		$errName = "";
		$errCompref = "";
		$errConpref = "";
		$errAward = '';
		$errMat = '';
		$errMat2 = '';
		$sum = intval($bestdel+$verbal+$spm);
		// Index number to sort delegates based on expertise
		$exp_num = 10+((($experience)+(3)*($bestdel))+((2)*($spm))+(($verbal)));
		$del_matrix = array("France", "United Kingdom", "Russia", "USA", "China", "Saudi Arabia", "Iraq", "Yemen",
			"Syria", "Iran", "Spain", "Germany", "Japan", "Brazil", "Chile", "Egypt", "Ethiopia", "India", "Indonesia", "Montenegro", 
			"Pakistan", "Qatar", "North Korea", "Lebanon", "Turkey", "UAE", "Venezuela", "Colombia", "Mali", "Argentina", "Ivory Coast",
			"Nigeria", "Sudan", "South Sudan", "Chad", "Central African Republic", "Somalia", "Israel", "Myannmar", "Australia",
			"Singapore", "Italy", "Malaysia", "Mexico", "Phillipines", "South Africa", "Sri Lanka", "Thailand", "INTERPOL",
			"Afghanistan", "Libya", "Sierra Leone", "Albania", "PMoI", "MoDI","R&AW", "ATSI", "MoE", "IB", "IC", "Nepal", "MoCA", "MoHA",
			"PMoP", "MoDP", "Pervez-Musharraf", "MoFA", "ATSP", "ISI", "South Korea", "MoD-UAE", "MoFA-UAE", "AC", "NC", "AFC", "MoD-USSR", "MoFA-USSR", "MoIA", "AL", "MB",
			"MoD-USA", "Nixon", "Kissinger", "MoFAR-USA", "MoD-China", "MoEA-China","EU", "Jordan","Maharashtra", "Delhi", 
			"J&K", "Tamil Nadu", "Arunachal Pradesh", "Assam", "Meghalaya", "Manipur", "Mizoram", "Nagaland", "Tripura", "Karnatka","Gujarat",
			"Kerala", "Goa", "Andhra Pradesh", "Bihar", "Jharkand", "Himachal Pradesh", "Punjab", "Rajasthan", "Uttar Pradesh", "Chandigarh", "Madhya Pradesh");
		if ($sum > $experience) {
			$errAward = "Your awards are greater than your MUNs";
		}
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		if (in_array($conpref1, $del_matrix)== 0) {
			$errMat = 'Please refer to the delegation matrix and enter correct name.';
		}
		if (in_array($conpref2, $del_matrix) == 0) {
		
			$errMat2 = 'Please refer to the delegation matrix and enter correct name.';
		}
		if ($compref1 == $compref2) {
			$errCompref = 'Please select distinct committees';
		}
		
		// Check if first country has been entered
		if (!$_POST['conpref1']) {
			$errConpref = 'Please enter delegation';
		}
		
		//Check if second country has been entered
		if (!$_POST['conpref2']) {
			$errConpref = 'Please enter delegation';
		}
		
if (!$errName && !$errConpref && !$errAward && !$errMat && !$errMat2) {
		$result='<div class="alert alert-success">Thank You! Please check your entry on the allocations page.</div>';
		$del = "INSERT INTO delegates (Name, Grade, Experience, Committee1, Committee2, Country1, Country2, Best_Del, Spec_Men, Ver_Men, XP_Num)
				VALUES ('$name', '$grade', '$experience', '$compref1', '$compref2', '$conpref1', '$conpref2', '$bestdel','$spm','$verbal','$exp_num')";
		$_POST = array();
		mysqli_query($delegate,$del) or die(mysqli_error($delegate));
	} else {
		$result='<div class="alert alert-danger">Sorry, there was an error sending your application. Please try again later.</div>';
	}
}

mysqli_close($delegate);	
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
  				<h1 class="page-header text-center">Delegate Registration</h1>
				 <h4 class = "guidelines"> 
					 <ul>
						 <li> Truthfully complete this form, if your "awards" don't match your level of participation, the chair may not consider you for awards. </li>
						 <li> Refer to the delegation matrix for correctly inputting delegation preferences. Wrong entries will prevent the form from submitting. </li>
					</ul>
				 </h4>
				 <br>
				<form class="form-horizontal" role="form" method="post" action="delegate.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" pattern="[A-Za-z]"value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="grade" class="col-sm-2 control-label">Grade:</label>
						<div class="col-sm-10">
							<select class="form-control" name = "grade">
								<option value = "IBDP-1"> IBDP-1 </option>
								<option value="IBDP-2">IBDP-2</option>
  								<option value="AS-Commerce">AS-Commerce</option>
  								<option value="AS-Science">AS-Science</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="mun" class="col-sm-2 control-label">Experience:</label>
						<div class="col-sm-10">
							<select class="form-control" name = "experience">
								<option value="0">0</option>
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
						<label for="compref1" class="col-sm-2 control-label">1st Committee Preference:</label>
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
						<label for="compref2" class="col-sm-2 control-label">2nd Committee Preference:</label>
						<div class="col-sm-10">
							<select class="form-control" name = 'compref2'>
  								<option value="DISEC">DISEC</option>
  								<option value="UNSC">UNSC</option>
  								<option value="G20">G20</option>
  								<option value="HRC">HRC</option>
  								<option value="WHO">WHO</option>
  								<option value="IYP">IYP</option>
								<option value="JAC">JAC</option>
								<option value="UNODC">UNODC</option>
							</select>
						</div>
						<?php echo "<p class='text-danger'>$errCompref</p>";?>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">First Delegation Preference:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="conpref1" name="conpref1" placeholder="First delegation preference" value="<?php echo htmlspecialchars($_POST['conpref1']); ?>">
							<?php echo "<p class='text-danger'>$errConpref</p>";?>
							<?php echo "<p class='text-danger'>$errMat</p>";?>
							
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Second Delegation Preference:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="conpref2" name="conpref2" placeholder="Second delegation preference" value="<?php echo htmlspecialchars($_POST['conpref2']); ?>">
							<?php echo "<p class='text-danger'>$errConpref</p>";?>
							<?php echo "<p class='text-danger'>$errMat2</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="bestdel" class="col-sm-2 control-label">Best Delegate:</label>
						<div class="col-sm-10">
							<select class="form-control" name = 'bestdel'>
  								<option value="0">0</option>
  								<option value="1">1</option>
  								<option value="2">2</option>
  								<option value="3">3</option>
  								<option value="4">4</option>
  								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="spm" class="col-sm-2 control-label">Special Mention:</label>
						<div class="col-sm-10">
							<select class="form-control" name = 'spm'>
  								<option value="0">0</option>
  								<option value="1">1</option>
  								<option value="2">2</option>
  								<option value="3">3</option>
  								<option value="4">4</option>
  								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="spm" class="col-sm-2 control-label">Verbal Mention</label>
						<div class="col-sm-10">
							<select class="form-control" name = 'verbal'>
  								<option value="0">0</option>
  								<option value="1">1</option>
  								<option value="2">2</option>
  								<option value="3">3</option>
  								<option value="4">4</option>
  								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
							</select>
						</div>
						<?php echo "<p class='text-danger'>$errAward</p>";?>
					</div>
					<br><div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
							<br><h4>Repeated submissions will result in disqualification from awards.</h4>
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