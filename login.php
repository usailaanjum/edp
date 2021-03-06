<?php

session_start ();

if( isset($_SESSION['user_id']) ){
	header("Location: /controlleractivity.php");
}
require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):

	$records = $conn->prepare('SELECT id,email,password FROM users WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';

	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

    $_SESSION['user_id'] = $results['id'];
		header("Location: /controlleractivity.php");

	} else {
    $message = 'Sorry, those credentials do not match';

	}

endif;

 ?>

 <!DOCTYPE html>
 <html>
   <head >
     <!-- <meta charset= "utf-8"> -->
     <title>EDP.login</title>

     <!-- Ensure proper mobile rendering -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--  <link href="//fonts.googleapis.com/css?family=Roboto:400,300,200,100&subset=latin,cyrillic" rel="stylesheet"> -->

     <!--  Style CSS -->
     <link rel="stylesheet" href="css/response.css">

     <!-- Owl Carousel -->
     <link rel="stylesheet" href="css/owl.carousel.css">
 	  <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <!-- Latest compiled and minified CSS BOOTSTRAP framework -->
     <link rel="stylesheet"
           href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
           integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
           crossorigin="anonymous">

     <!-- Optional BOOTSTRAP theme -->
     <link rel="stylesheet"
           href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
           integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
           crossorigin="anonymous">
     </head>

 <body>
	 <!-- Main header to be in all pages -->
	<div id="topHeader" class = "nav-header">
	 <div class="container">
				 <header>
					 <nav class="navbar" style="padding-top: 18px;
					 display: table-row-group;">
						 <ul>
						 <!-- Relative Paths -->
							 <li role="presentation" class="active"><a href="/">Home</a></li>
							 <li role="presentation"><a href="about.html">About the Device</a></li>
							 <li role="presentation"><a href="#section3">Contact</a></li>
						 <!--  <li role="presentation"><a href="references.html">Reference</a></li> -->
							 <li role="presentation"><a href="logout.php">Logout?</a></li>
						 </ul>
					 </nav>
				 </header>
			 </div>
		 </div>

 <!-- Main BODY -->
 <!-- // [START headline] -->
 <div id="headline" class="mybackground">

	 <div class= "container">
		 <br>
		 <br>
		 <h1>PROCAR SECURITY</h1>
		 <br>
		 <p>Building a mobile security system for everyone</p>
		 <br>
		<!-- <img src="http://www.pngpix.com/wp-content/uploads/2016/06/PNGPIX-COM-White-Lamborghini-Aventador-Car-PNG-Image.png" alt="car" >  -->


	 <div id= "blurb">
						 <p> <strong>ProCar</strong> is the world's best vehicle security and remote
								 start brand with position, speed and routing. We use
								 inexpensive and secure technology to
								 provide a range of features that you can
								 count on every time.
						 </p>
	 </div>


<!-- ADD A HOVERING MESSAGE CENTER THINGY TO DISPLAY THIS MESSAGE -->


 <?php if(!empty($message)): ?>
		 <p><?= $message ?></p>
	 <?php endif; ?>
		 <!-- ADD a form to register PEOPLE -->
		 <form method = "POST"  id = "register" action="login.php" >
			 <h2><a href="register.php">Register</a> | <a href="login.php">Login</a></h2>
			 <label for="email">Email</label>
			 <input type="text" name="email" id="name" placeholder="Enter user email" required>
			 <label for="password">Password</label>
			 <input type="password" name="password" id="email" placeholder = "Enter Password" required>
			 <input type="submit" value= "Login">
		 </form>
		 <br>
 </div>
	 </div>
 <!-- // [END headline] -->



 <!-- // [START section1] -->
 <div id="section1">
       <div class="container">
         <br>
         <br>
         <br>
         <h2>Why you should get ProCar Security device</h2>
         <br>
         <br>
         <p>After careful consideration of various security needs we have come up with a design that is effective, efficient and provides first-class experience.</p>
         <p>We used state-of-the-art technology that:</p>
         <ul>
           <li>has the ability for speed, posiitoning and route tracking</li>
           <li>uses relaiable 3G network updating you on your vehicle status 24/7</li>
           <li>sends text notification for any security breach</li>
         </ul>

         <br>
       </div>
     </div>

     <!-- // [END section1] -->



 <!-- // [START section2] -->
 <!-- CONTENT IMAGES and STYLISTIC IMAGES -->
 <!-- <div id= "section2"> -->
     <!--  <div class="container"> -->
     <!--  <h2>About the creators</h2> -->
       <!-- ADD A COROUSEL -->
     <!-- <div id="images"> -->

       <!--  <img src="photo.png" srcset="photo@2x.png 2x"> -->
			 <a id="founders"></a>
       	<div id="fh5co-testimonial" class="fh5co-bg-section">
       		<div class="container">
       			<div class="row animate-box" style="padding-top: 120px;">
       				<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
       					<h2 style="font-size: 40px;">About the Founders</h2>
                 <br>
                 <br>
       				</div>
       			</div>
       			<div class="row">
       				<div class="col-md-10 col-md-offset-1">
       					<div class="row animate-box">
       					<!--	<div class="owl-carousel owl-carousel-fullwidth"> -->
       							<div class="owl-carousel owl-theme">
       							<div class="item">
       								<div class="testimony-slide active text-center">
       									<figure>
       										<img src="img/suthan.jpg" alt="user">
       									</figure>
       									<span style=" text-align: -webkit-center;
                               padding-top: 20px; padding-right: 30px;">Suthan Nehrulingam</span>


       									<blockquote>
       										<p>As a 4th year electrical engineering student, Suthan has led on countless
                             hardware projects at various Hackathons and competitions.
                             He brings a high level of professionalism and technical knowledge to the team.</p>
       									</blockquote>
       								</div>
       							</div>
       							<div class="item">
       								<div class="testimony-slide active text-center">
       									<figure>
       										<img src="img/usaila.jpg" alt="user">
       									</figure>
       									<span style=" text-align: -webkit-center;
                               padding-top: 20px; padding-right: 30px;">Usaila Anjum</span>

       									<blockquote>
       										<p>Usaila is responsible for the development of the Web app ensuring flawless user experinece.</p>
       									</blockquote>
       								</div>
       							</div>
       							<div class="item">
       								<div class="testimony-slide active text-center">
       									<figure>
       										<img src="img/nirojan.jpg" alt="user">
       									</figure>
       									<span style=" text-align: -webkit-center;
                               padding-top: 20px; padding-right: 30px;">Nirojan Kathirgamanathan</span>

       									<blockquote>
       										<p>Nirojan leads technical development of the project and is responsible for invaluable R&D learnings.</p>
       									</blockquote>
       								</div>
       							</div>
       						</div>
       					</div>
       				</div>
       			</div>
       		</div>
       	</div>

               <style >
                   #fh5co-testimonial {
                   	background: #efefef;
                     height: 700px;
                   }
                   #fh5co-testimonial .testimony-slide {
                   	text-align: center;
                   }
                   #fh5co-testimonial .testimony-slide span {
                   	font-size: 12px;
                   	text-transform: uppercase;
                   	letter-spacing: 2px;
                   	font-weight: 700;
                   	display: block;
                   }
                   #fh5co-testimonial .testimony-slide figure {
                   	margin-bottom: 10px;
                   	display: -moz-inline-stack;
                   	display: inline-block;
                   	zoom: 1;
                   	*display: inline;
                   }
                   #fh5co-testimonial .testimony-slide figure img {
                   	width: 100px;
                   	-webkit-border-radius: 50%;
                   	-moz-border-radius: 50%;
                   	-ms-border-radius: 50%;
                   	border-radius: 50%;
                   }
                   #fh5co-testimonial .testimony-slide blockquote {
                   	border: none;
                   	margin: 30px auto;
                   	width: 70%;
                   	position: relative;
                   	padding: 0;
                   }
                   @media screen and (max-width: 992px) {
                   	#fh5co-testimonial .testimony-slide blockquote {
                   		width: 100%;
                   	}
                   }
                   #fh5co-testimonial .arrow-thumb {
                   	position: absolute;
                   	top: 40%;
                   	display: block;
                   	width: 100%;
                   }
                   #fh5co-testimonial .arrow-thumb a {
                   	font-size: 32px;
                   	color: #dadada;
                   }
                   #fh5co-testimonial .arrow-thumb a:hover, #fh5co-testimonial .arrow-thumb a:focus, #fh5co-testimonial .arrow-thumb a:active {
                   	text-decoration: none;
                   }
           </style>
       <!--  </div> -->

       <!--  </div> -->
     <!--</div> -->

 <!-- // [END section2] -->


 <!-- // [START section3] -->
 <div id= "section3">
   <div class="container">
   <h2 style="font-size: 50px;
     padding-top: 120px ;">Contact Information</h2>
   <p style="padding-top: 15px; font-size: 30px">350 Victoria St</p>
   <p style="font-size: 15px">Toronto, ON, M5B 2K3</p>
   <ul style="list-style-type:none; padding-right: 69px;">
   <li><span><strong>Phone: +1 772 034 5555</strong></span></li>
   <li><span><strong>Email: usailaanjum@gmail.com</strong></span></li>
   <li><span><strong>Website: proCarsecurity.com</strong></span></li>
   <li><span><strong>Twitter: @getProCar</strong></span></li>
   <li><span><strong>Facebook: ProCar Security System</strong></span></li>
 </ul>
   <br>
 </div>
 </div>
 <!-- // [END section3] -->


 <!-- // [START footer] -->
 <!-- got to ADD Twitter and linkedin link -->
       <footer>
         <div class="container">

           <br>
             <nav class="social">
               <ul>
               <!-- Relative Paths -->
                 <li class="social-git"><a href="https://github.com/usailaanjum/edp.git">
                   <img height = "40px" width="40px" src = "http://www.freeiconspng.com/uploads/github-logo-icon-30.png" alt="github octopus icon"/>
                 </a></li>
                 <li class="social-tweet"><a href="#"><img hight = "30px" width="30px" src="https://image.flaticon.com/icons/png/512/8/8800.png" alt="Twitter bird icon"/></a></li>
                 <li class="social-linkedin"><a href="#"><img hight = "30px" width="30px" src= "https://cdn3.iconfinder.com/data/icons/picons-social/57/11-linkedin-128.png" alt="linked in icon"/></a></li>
               </ul>
             </nav>
       </div>
       </footer>
     <!-- // [END footer] -->



       <!-- [RESPONSIVE Listener START]-->
       <script type="text/javascript">
           function init() {
             window.matchMedia("(max-width: 600px)").addListener(hitMQ);
           }

         function hitMQ(evt) {
           sampleCompleted("GettingStarted-ContentWithStyles");
         }

           init();
       </script>
       <!-- [RESPONSIVE Listener END]-->

       <!-- Latest compiled and minified JavaScript for bootstrap -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
           integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
           crossorigin="anonymous">
         </script>


       <!-- jQuery -->
       <script src="js/jquery-3.2.0.js"></script>
       <script src="js/jquery.min.js"></script>
       <!-- Owl Carousel -->
       <script src="js/owl.carousel.min.js"></script>
       <!-- Customized Slider -->
       <script src="js/custom.js"></script>

   </body>
 </html>
