<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'support@traversymedia.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Xclusiv | Contact</title>
<link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ruthie" rel="stylesheet">

</head>

<body>

  <!-- Header Section -->
    <section class="tophead" role="tophead">
      <!-- Navigation Section -->
      <header id="header">
        <div class="header-content clearfix"> <a class="logo" href="index.html">
          <img src="images/x.goud.jpg">
        </a>
          <nav class="navigation" role="navigation">
            <ul class="primary-nav">
              <li>
                <div class="dropdown">
                  <a href="diensten.html">
                    <button class="dropbtn">DIENSTEN <span class="caret"></span></button>
                  </a>
                  <div class="dropdown-content">
                    <a href="weddingplanner.html">Weddingplanner</a>
                    <a href="trouwadvies.html">Trouwadvies</a>
                    <a href="styling.html">Styling</a>
                  </div>
                </div>
              </li>
              <li><a href="#testimonials">Xclusiv</a></li>
              <li><a href="#portfolio">Impressie</a></li>
              <li><a href="trouwblog.html">Trouwblog</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="index.html">Home</a></li>
            </ul>
          </nav>
          <a href="#" class="nav-toggle">Menu<span></span></a> </div>
      </header>
  <!-- Navigation Section -->
      </section>
  <!-- Header Section -->

  <section id="contact-title">
    <div class="row">
      <div class="col-sm-12 col-md-8 col-md-offset-2">
        <h1>Contact</h1>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>

<!-- work details section -->
<section id="work-detail" class="section work-detail">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-md-10 col-md-offset-1 work-detail-margin detail-image">
        <div class="container">
					<?php if($msg != ''): ?>
		    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
		    	<?php endif; ?>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			      <div class="form-group">
				      <label>Name</label>
				      <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
			      </div>
			      <div class="form-group">
			      	<label>Email</label>
			      	<input type="text" name="email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
			      </div>
			      <div class="form-group">
			      	<label>Message</label>
			      	<textarea name="message" class="form-control"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
			      </div>
			      <br>
			      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
		      </form>
        </div>
      </div>
  </div>
</section>
<!-- work details section -->

<!-- footer section -->
<footer id="contact" class="footer">
  <div class="container-fluid">
    <div class="col-md-3 left">
      <h4>Office Location</h4>
      <p> Berkel &amp; Rodenrijs
          <br/>
          Nederland</p>
    </div>
    <div class="col-md-3 left">
      <h4>Contact</h4>
      <p>Tel: <a href="Tel:0612345678">0612345678</a><br>
        Email : <a href="mailto:info@eventplanning"> info@eventplanning.com </a></p>
    </div>
    <div class="col-md-3 left">
      <h4>Follow us</h4>
      <ul class="footer-share">
        <li><a href="https://www.facebook.com/Xclusiv.Weddings/" target="_blank"><i class="fa fa-facebook"></i></a></li>
        <li><a href="http://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
        <li><a href="http://linkedin.com" target="_blank"><i class="fa fa-linkedin"></i></a></li>
      </ul>
    </div>
    <div class="col-md-3 right">
      <p>©All Rights Reserved<br>
        Made by <a href="http://jessicavandermarel.com/" target="_blank" style="text-decoration: none;" class="link-jessica">Jessica van der Marel</a></p>
    </div>
  </div>
</footer>
<!-- footer section -->

<!-- JS FILES -->
<script src="js/contact-form.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/main.js"></script>
</body>
</html>
