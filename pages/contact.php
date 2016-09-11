<!-- COPYRIGHT - Aayush Chadha, Prepare for IBDP Computer Science Internal Assessment, May 2016 -->
<?php
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $from = 'Contact-Us'; 
        $to = 'podarmun2015@gmail.com'; 
        $subject = 'PMUN';
        
        $body = "From: $name\n E-Mail: $email\n Message:\n $message";
 
        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
     
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage) {
    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank You! We will reply shortly</div>';
        $_POST = array();
    } else {
        $result='<div class="alert alert-danger">Your message could not be sent.</div>';
    }
}
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PMUN | Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel = 'stylesheet' href="/web-files/Styles/geninfo.css">
  </head>
  <body>
<div class = "jumbotron">
	<h1> General Information </h1>

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
<div class = "row">
 <h1 align = "center"><u> Contact Us</u> </h1>
<form class = "form-horizontal" role = "form" method = "post" action = "contact.php">
   <div class = "form-group">
     <label for = "name" class = "col-sm-2 control-label"> Name: </label>
     <div class = "col-sm-8">
        <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
     </div>
    </div>
    <div class = "form-group">
     <label for = "email" class = "col-sm-2 control-label"> Email: </label>
     <div class = "col-sm-8">
        <input type="email" class="form-control" id="email" name="email" placeholder="Your email id" value="<?php echo htmlspecialchars($_POST['email']); ?>">
     </div>
    </div>
     <div class = "form-group">
     <label for = "message" class = "col-sm-2 control-label"> Message: </label>
     <div class = "col-sm-8">
        <textarea class = "form-control" rows = "4" name = "message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
        <?php echo "<p class='text-danger'>$errMessage</p>";?>
     </div>
    </div>
    <div class = "form-group">
     <div class = "col-sm-8 col-sm-offset-2">
        <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
     </div>
    </div>
    <div class = "form-group">
     <div class = "col-sm-8 col-sm-offset-2">
       <?php echo $result; ?>	
     </div>
    </div>
</div>
<script src = '/web-files/scripts/jquery-2.1.4.min.js'></script>
<script src= '/web-files/scripts/bootstrap.js'></script>
  </body>
</html>