
const header = `
  <div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h d-flex gap-1 align-items-center logo-link" href="index.html">
						<img src="img/image-50x50.jpg" alt="" class="rounded pe-2">
						<span class="logo-text" style="">Zonac</span>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="about.html">About us</a></li>
							<li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
							<li class="nav-item submenu dropdown">
								<a href="category.html" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="false">Product</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="category.html">Shop Category</a></li>
									<li class="nav-item"><a class="nav-link" href="single-product.html">Product
											Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a>
									</li>
									<li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a>
									</li>
								</ul>
							</li>
							<!-- <li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Blog</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
									<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
								</ul>
							</li> -->
							<li class="nav-item"><a class="nav-link" href="gallery.html">Gallery</a></li>
							<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
							<!--<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
									aria-haspopup="true" aria-expanded="false">Services</a>
								<ul class="dropdown-menu">
									<li class="nav-item"><a class="nav-link" href="login.html">Login</a></li>
									<li class="nav-item"><a class="nav-link" href="tracking.html">Tracking</a></li>
									<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
								</ul>
							</li>-->
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="#" class="cart"><span class="fa-solid fa-user"></span></a></li>
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
`;

const headerPage = document.getElementById('header');
headerPage.innerHTML = header;
console.log('Seen');


const footer = `
    <div class="container">
			<div class="row">
				<!-- Quick Links -->
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Quick Links</h6>
						<ul style="color: #777777;" class="quick_links">
							<li>
								<a href="/main-zoniac/category.html">About Us</a>
							</li>
							<li>
								<a href="/main-zoniac/category.html">Products</a>

							</li>
							<li>
								<a href="/main-zoniac/category.html">Services</a>

							</li>
							<li>
								<a href="/main-zoniac/category.html">Contact us</a>

							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Contact Us</h6>
						<p> <i class="fa-solid fa-phone-volume" style="color:white;"></i>
							07033797033
						</p>
						<p><i class="fa-brands fa-whatsapp" style="color:white;"></i>
							09155745435
						</p>
						<p><i class="fa-solid fa-envelope" style="color:white;"></i>
							zonac@gmail.com
						</p>
					</div>
				</div>
				<!-- Newsletter -->
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true"
								action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
								method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email"
										onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
										required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right"
											aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
											type="text">
									</div>

									<!-- <div class="col-lg-4 col-md-4">
												<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
											</div>  -->
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				
				<!-- Social Media -->
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<!-- Copyright -->
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					All rights reserved | Copyright &copy; Zonac Ltd.
					<script>document.write(new Date().getFullYear());</script>  This was made by <a href="https://colorlib.com"
						target="_blank"> Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
`;


const footerContent = document.getElementById('footer');
footerContent.innerHTML = footer;

// Event type:
// The 'load' event is typically used on the window object, not the document. For the document, 'DOMContentLoaded' is often more appropriate.
// Variable footerContent:
// This variable is not defined in the code snippet. You'll need to ensure it's defined and references the correct DOM element.
// Error handling:
// It's good practice to add error handling when manipulating DOM elements.

document.addEventListener('DOMContentLoaded', (e) => {
	console.log('DOM fully loaded and parsed');
	try {
		let footerContent = document.getElementById('footer'); // Adjust selector as needed
		if (footerContent) {
			footerContent.classList.add('footer');
		} else {
			console.error('Footer element not found');
		}
	} catch (error) {
		console.error('Error adding class to footer:', error);
	}
});

// Testimonial JS
(function () {
	"use strict";
	var carousels = function () {
		$(".owl-carousel1").owlCarousel({
			loop: true,
			center: true,
			margin: 0,
			responsiveClass: true,
			nav: false,
			autoplay: true,  // Enable autoplay
			autoplayTimeout: 3000,  // Change slide every 3 seconds
			autoplayHoverPause: true,  // Pause on hover
			responsive: {
				0: {
					items: 1,
					nav: false
				},
				680: {
					items: 2,
					nav: false,
					loop: false
				},
				1000: {
					items: 3,
					nav: true
				}
			}
		});
	};

	$(document).ready(function () {
		carousels();
	});
})();

// Video Modal
$(document).ready(function () {

	// Gets the video src from the data-src on each button

	var $videoSrc;
	$('.video-btn').click(function () {
		$videoSrc = $(this).data("src");
	});
	console.log($videoSrc);



	// when the modal is opened autoplay it  
	$('#myModal').on('shown.bs.modal', function (e) {

		// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
		$("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");

	})



	// stop playing the youtube video when I close the modal
	$('#myModal').on('hide.bs.modal', function (e) {
		// a poor man's stop video
		$("#video").attr('src', $videoSrc);
	})
	// document ready  
});
