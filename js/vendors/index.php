<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}


.slideshow-container {
  max-width: 1000%;
  position: absolute;
  margin: auto;
}


.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: red;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;

}


.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}


.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}


.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}


.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}


.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}


.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}


@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}

.dropbtn {
  background-color: black;
  color: white;
  padding: 16px;
  font-size: 16px;
  border-radius: 10px;;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: red;
}

#myInput {
  border-box: box-sizing;
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
  

}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
  
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: black;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  
}

.dropdown a:hover {background-color: red;}

.show {display: block;}
</style>
</head>
<body>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="banner.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="banner1.jpg" style="width:100%">

</div>

<div class="mySlides fade">
  <div class="numbertext"></div>
  <img src="banner2.jpg" style="width:100%">

</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>



<a style="position:absolute;color:red;font-size:50px;top:1%;"><b>PC</a></b>
<br>
<h1><a style="color:red;position:absolute;right:69%;top:3%;">Personal Collection</h1></a>


<br><br>
<div class="dropdown">
  <h1><a style="color:red;position:absolute;top:1%;">Products</h1></a><br><button onclick="myFunction()" class="dropbtn">Menu</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
    <a href="apparel.php">Apparel</a>
    <a href="babycare.php">Baby Care</a>
    <a href="fragrances.php">Fragrances</a>
    <a href="healthcare.php">Health Care</a>
    <a href="homecare.php">Home Care</a>
    <a href="intimateapparel.php">Intimate Apparel</a>
    <a href="menscare.php">Men's Care</a>
	<a href="personalcare.php">Personal Care</a><br>

  <a class="home" href="index.php">Home</a>
  <a href="index2.php">Customer</a>
  <a href="product.php">Product</a>
  <a href="collection.php">Collection</a>
  <a href="items.php">Collection Items</a>
  
  

	<header class="main">
    <div class="row justify-content-center">

     <nav class="col-sm-8 text-right"> 	 
         
	     <?php if (isset($_SESSION['success'])): ?>
		      
		 <?php endif ?>
		 
		 <?php if(isset($_SESSION["username"])): ?>
		     
		     <p><a style="font-family:Stylus BT" href="login.php?logout='1'" class="btn btn-primary" style="color:white;">Logout</a></p>
		 <?php endif ?> 
		</nav>
		</div>
  </div>
</div>
<section class="feature_add_area">
            <div class="container">
                <div class="row feature_inner">
                    <div class="col-lg-5">
                        <div class="f_add_item">
                            <div class="f_add_img"><a style="position:absolute;right:40%;bottom:-20%;"><img class="img-fluid" src="img/feature-add/f-add-1.jpg" alt=""></div></a>
                            <div class="f_add_hover">
                                <h4><a style="position:absolute;right:60%;bottom:5%;">Best Summer <br />Collection</h4></a>
                                <a class="add_btn" style="position:absolute;right:63%;bottom:1%;" href="#">Shop Now <i class="arrow_right"></i></a>
                            </div>
                            <div class="sale"><a style="position:absolute;right:72%;bottom:14%;">Sale</div></a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="f_add_item right_dir">
                            <div class="f_add_img"><a style="position:absolute;right:10%;bottom:-20%;"><img class="img-fluid" src="img/feature-add/f-add-2.jpg" alt=""></div>
                            <div class="f_add_hover">
                                <h4><a style="position:absolute;right:15%;bottom:5%;">Best Summer <br />Collection</h4></a>
                                <a class="add_btn" style="position:absolute;right:17%;bottom:1%;" href="#">Shop Now <i class="arrow_right"></i></a>
                            </div>
                            <div class="off"><a style="position:absolute;right:12%;bottom:14%;">10% off</div></a>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="f_add_item">
                            <div class="f_add_img"><img class="img-fluid" src="img/feature-add/f-add-3.jpg" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<script>
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>



</body>
</html>

