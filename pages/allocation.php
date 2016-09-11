<!-- COPYRIGHT - Aayush Chadha, Prepare for IBDP Computer Science Internal Assessment, May 2016 -->
<?php
  $hostname = 'localhost';
  $username = 'root';
  $password = 'root';
  $dbname = 'pmun';

  try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    // The results of the queries for each table are stored in the table's name. Not all fields are fetched from the database.'
    // The queries also order the fetched data in descending order of experience, making it easier to see who are the best candidates.
    $delegate = $dbh->prepare("SELECT sNum, Name, Grade, Committee1, Committee2, Country1, Country2, XP_Num FROM delegates");
    $eb = $dbh->prepare("SELECT sNum, Name, Experience, Committee1, Committee2, Post1, Post2 FROM eb");
    $press = $dbh->prepare("SELECT sNum, Name, Grade FROM press");
    $logistics = $dbh->prepare("SELECT sNum, Name, Grade FROM logi");
    $unsc = $dbh->prepare("SELECT Name, Grade, Country1, Country2, XP_Num from delegates WHERE Committee1 = 'UNSC' ORDER BY XP_NUM DESC");
    $disec = $dbh->prepare("SELECT Name, Grade, Country1, Country2, XP_Num from delegates WHERE Committee1 = 'DISEC' ORDER BY XP_NUM DESC");
    $unhrc = $dbh->prepare("SELECT Name, Grade, Country1, Country2, XP_Num from delegates WHERE Committee1 = 'HRC' ORDER BY XP_NUM DESC");
    $unodc = $dbh->prepare("SELECT Name, Grade, Country1, Country2, XP_Num from delegates WHERE Committee1 = 'UN0DC' ORDER BY XP_NUM DESC");
    $jac = $dbh->prepare("SELECT Name, Grade, Country1, Country2, XP_Num from delegates WHERE Committee1 = 'JAC' ORDER BY XP_NUM DESC");
    $iyp = $dbh->prepare("SELECT Name, Grade, Country1, Country2, XP_Num from delegates WHERE Committee1 = 'IYP' ORDER BY XP_NUM DESC");
    $g20 = $dbh->prepare("SELECT Name, Grade, Country1, Country2, XP_Num from delegates WHERE Committee1 = 'G20' ORDER BY XP_NUM DESC");
    $who = $dbh->prepare("SELECT Name, Grade, Country1, Country2, XP_Num from delegates WHERE Committee1 = 'WHO' ORDER BY XP_NUM DESC");
    
    // The loops below fetch records to store in the variable as and when the query is executed, i.e, when the page is refreshed
    if($unsc->execute()) {
       $unsc->setFetchMode(PDO::FETCH_ASSOC);
    }
     if($disec->execute()) {
       $disec->setFetchMode(PDO::FETCH_ASSOC);
    }
     if($unhrc->execute()) {
       $unhrc->setFetchMode(PDO::FETCH_ASSOC);
    }
     if($unodc->execute()) {
       $unodc->setFetchMode(PDO::FETCH_ASSOC);
    }
     if($jac->execute()) {
       $jac->setFetchMode(PDO::FETCH_ASSOC);
    }
     if($iyp->execute()) {
       $iyp->setFetchMode(PDO::FETCH_ASSOC);
    }
     if($g20->execute()) {
       $g20->setFetchMode(PDO::FETCH_ASSOC);
    }
     if($who->execute()) {
       $who->setFetchMode(PDO::FETCH_ASSOC);
    }
    if($delegate->execute()) {
       $delegate->setFetchMode(PDO::FETCH_ASSOC);
    }
  	if($eb->execute()) {
       $eb->setFetchMode(PDO::FETCH_ASSOC);
    }
    if($press->execute()) {
       $press->setFetchMode(PDO::FETCH_ASSOC);
    }
    if($logistics->execute()){
      $logistics->setFetchMode(PDO::FETCH_ASSOC);
    }
  }
  catch(Exception $error) {
      echo '<p>', $error->getMessage(), '</p>';
  }
  $dbh = null;
?>



<!DOCTYPE html>
<html>
<head>
<title> PMUN | Allocations</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel = 'stylesheet' href="/web-files/Styles/bootstrap.min.css"/>
<link rel = 'stylesheet' href="/web-files/Styles/allocation.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
</head>
<body>
 <div class = "jumbotron">
	<h1> Allocations </h1>

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
         <li><a href="press.html">Press Release</a></li>
   		</ul>
   	</div>
</nav>

<!-- Header End -->
<div class="container">
	<div class = "row">
		<div class = "col-md-12">
  			
        <ul> 
          <h1><u>Guidelines</u></h1>
          <li> Find your names in the lists below. Check the main delegate list and the list of your first choice committee. You will be allocated a committee and delegation once all applications are received. </li>
          <li> Incase your name hasn't appeared in the correct list, refresh first. If it doesn't work, write to <a href = contact.php> podarmun2015@gmail.com </a>, stating the form filled and the values entered.</li>
          <li> Experience Number is for the chair's reference. </li>  
          <li> You may or may not be allocated the committee and delegation of your choice. </li>
  			</ul> 
        
         <!-- DELEGATES table: The code below features two parts, one provides the structure and design of the table, making use of HTML and CSS.
         This is static content and remains same throughout. The code following the <tbody> tag utilises a while loop which runs as long as 
           there are records in the table. Each column in the database appears as it is on the allocations page through the use of echo $row. 
           The name used between the square brackets is the name of the column in the sql database. The same structure was used for the other tables as well. -->
        <h2><u>Delegate List</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
              <th> S. No. </th>
        			<th>Name</th>
              <th>Grade</th>
        			<th>Committee Preference - 1</th>
					<th>Committee Preference - 2</th>
					<th>Delegation Preference - 1</th>
					<th>Delegation Preference - 2</th>
          <th>Experience Number</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $delegate->fetch()) { ?>
				 <tr>
               <td><?php echo $row['sNum']; ?></td>
					     <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Grade']; ?></td>
        			 <td><?php echo $row['Committee1']; ?></td>
        			 <td><?php echo $row['Committee2']; ?></td>
					     <td><?php echo $row['Country1']; ?></td>
        			 <td><?php echo $row['Country2']; ?></td>
               <td><?php echo $row['XP_Num']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
       <h2>1.<u>UNSC</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
        			<th>Name</th>
              <th> Grade </th>
					<th>Delegation Preference - 1</th>
					<th>Delegation Preference - 2</th>
          <th>Experience Number</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $unsc->fetch()) { ?>
				 <tr>
					     <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Grade']; ?></td>
					     <td><?php echo $row['Country1']; ?></td>
        			 <td><?php echo $row['Country2']; ?></td>
               <td><?php echo $row['XP_Num']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
       <h2>2.<u>DISEC</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
        			<th>Name</th>
              <th>Grade</th>
					<th>Delegation Preference - 1</th>
					<th>Delegation Preference - 2</th>
          <th>Experience Number</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $disec->fetch()) { ?>
				 <tr>
					     <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Grade']; ?></td>
					     <td><?php echo $row['Country1']; ?></td>
        			 <td><?php echo $row['Country2']; ?></td>
               <td><?php echo $row['XP_Num']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
       <h2>3.<u>UNHRC</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
        			<th>Name</th>
              <th>Grade</th>
					<th>Delegation Preference - 1</th>
					<th>Delegation Preference - 2</th>
          <th>Experience Number</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $unhrc->fetch()) { ?>
				 <tr>
					     <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Grade']; ?></td>
					     <td><?php echo $row['Country1']; ?></td>
        			 <td><?php echo $row['Country2']; ?></td>
               <td><?php echo $row['XP_Num']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
       <h2>4.<u>UNODC</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
        			<th>Name</th>
              <th>Grade</th>
					<th>Delegation Preference - 1</th>
					<th>Delegation Preference - 2</th>
          <th>Experience Number</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $unodc->fetch()) { ?>
				 <tr>
					     <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Grade']; ?></td>
					     <td><?php echo $row['Country1']; ?></td>
        			 <td><?php echo $row['Country2']; ?></td>
               <td><?php echo $row['XP_Num']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
       <h2>5.<u>JAC</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
        			<th>Name</th>
              <th>Grade</th>
					<th>Delegation Preference - 1</th>
					<th>Delegation Preference - 2</th>
          <th>Experience Number</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $jac->fetch()) { ?>
				 <tr>
					     <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Grade']; ?></td>
					     <td><?php echo $row['Country1']; ?></td>
        			 <td><?php echo $row['Country2']; ?></td>
               <td><?php echo $row['XP_Num']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
       <h2>6.<u>IYP</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
        			<th>Name</th>
              <th>Grade</th>
					<th>Delegation Preference - 1</th>
					<th>Delegation Preference - 2</th>
          <th>Experience Number</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $iyp->fetch()) { ?>
				 <tr>
					     <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Grade']; ?></td>
					     <td><?php echo $row['Country1']; ?></td>
        			 <td><?php echo $row['Country2']; ?></td>
               <td><?php echo $row['XP_Num']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
       <h2>7.<u>G20</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
        			<th>Name</th>
              <th>Grade</th>
					<th>Delegation Preference - 1</th>
					<th>Delegation Preference - 2</th>
          <th>Experience Number</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $g20->fetch()) { ?>
				 <tr>
					     <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Grade']; ?></td>
					     <td><?php echo $row['Country1']; ?></td>
        			 <td><?php echo $row['Country2']; ?></td>
               <td><?php echo $row['XP_Num']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
       <h2>8.<u>WHO</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
        			<th>Name</th>
              <th>Grade</th>
					<th>Delegation Preference - 1</th>
					<th>Delegation Preference - 2</th>
          <th>Experience Number</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $who->fetch()) { ?>
				 <tr>
					     <td><?php echo $row['Name']; ?></td>
               <td><?php echo $row['Grade']; ?></td>
					     <td><?php echo $row['Country1']; ?></td>
        			 <td><?php echo $row['Country2']; ?></td>
               <td><?php echo $row['XP_Num']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
       
        <!-- CHAIR -->
       <h2><u>Executive Board List</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
              <th> Serial Number </th>
        			<th>Name</th>
        			<th>Experience</th>
					<th>Committee Preference - 1</th>
					<th>Committee Preference - 2</th>
					<th>Post Applied for - 1</th>
          <th>Post Applied for - 2</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $eb->fetch()) { ?>
				 <tr>
           <td><?php echo $row['sNum']; ?></td>
					 <td><?php echo $row['Name']; ?></td>
        			 <td><?php echo $row['Experience']; ?></td>
        			 <td><?php echo $row['Committee1']; ?></td>
					     <td><?php echo $row['Committee2']; ?></td>
        			 <td><?php echo $row['Post1']; ?></td>
               <td><?php echo $row['Post2']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
        <!-- PRESS -->
       <h2><u>Press Corps</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
              <th> Serial Number </th>
        			<th>Name</th>
        			<th>Grade</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $press->fetch()) { ?>
				 <tr>
           <td><?php echo $row['sNum']; ?></td>
					 <td><?php echo $row['Name']; ?></td>
        	 <td><?php echo $row['Grade']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
       
       <!-- LOGISTIC -->
       <h2><u>Logistics</u></h2>          
  			<table class="table table-bordered">
    		<thead>
      			<tr>
              <th> Serial Number </th>
        			<th>Name</th>
        			<th>Grade</th>
      			</tr>
   			 </thead>
			 <tbody>
				   <?php while($row = $logistics->fetch()) { ?>
				 <tr>
           <td><?php echo $row['sNum']; ?></td>
					 <td><?php echo $row['Name']; ?></td>
        	 <td><?php echo $row['Grade']; ?></td>
				 </tr>
				 	 <?php } ?>
			 </table>
		</div>
	</div>
</div>
<script src = '/web-files/scripts/jquery-2.1.4.min.js'></script>
<script src= '/web-files/scripts/bootstrap.js'></script>
</body>
</html>