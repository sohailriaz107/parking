<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>pricing</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon1.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/price.css" rel="stylesheet">
    <script >
      jQuery(document).ready(function($){
	//hide the subtle gradient layer (.pricing-list > li::after) when pricing table has been scrolled to the end (mobile version only)
	checkScrolling($('.pricing-body'));
	$(window).on('resize', function(){
		window.requestAnimationFrame(function(){checkScrolling($('.pricing-body'))});
	});
	$('.pricing-body').on('scroll', function(){ 
		var selected = $(this);
		window.requestAnimationFrame(function(){checkScrolling(selected)});
	});

	function checkScrolling(tables){
		tables.each(function(){
			var table= $(this),
				totalTableWidth = parseInt(table.children('.pricing-features').width()),
		 		tableViewport = parseInt(table.width());
			if( table.scrollLeft() >= totalTableWidth - tableViewport -1 ) {
				table.parent('li').addClass('is-ended');
			} else {
				table.parent('li').removeClass('is-ended');
			}
		});
	}

	//switch from monthly to annual pricing tables
	bouncy_filter($('.pricing-container'));

	function bouncy_filter(container) {
		container.each(function(){
			var pricing_table = $(this);
			var filter_list_container = pricing_table.children('.pricing-switcher'),
				filter_radios = filter_list_container.find('input[type="radio"]'),
				pricing_table_wrapper = pricing_table.find('.pricing-wrapper');

			//store pricing table items
			var table_elements = {};
			filter_radios.each(function(){
				var filter_type = $(this).val();
				table_elements[filter_type] = pricing_table_wrapper.find('li[data-type="'+filter_type+'"]');
			});

			//detect input change event
			filter_radios.on('change', function(event){
				event.preventDefault();
				//detect which radio input item was checked
				var selected_filter = $(event.target).val();

				//give higher z-index to the pricing table items selected by the radio input
				show_selected_items(table_elements[selected_filter]);

				//rotate each pricing-wrapper 
				//at the end of the animation hide the not-selected pricing tables and rotate back the .pricing-wrapper
				
				if( !Modernizr.cssanimations ) {
					hide_not_selected_items(table_elements, selected_filter);
					pricing_table_wrapper.removeClass('is-switched');
				} else {
					pricing_table_wrapper.addClass('is-switched').eq(0).one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function() {		
						hide_not_selected_items(table_elements, selected_filter);
						pricing_table_wrapper.removeClass('is-switched');
						//change rotation direction if .pricing-list has the .bounce-invert class
						if(pricing_table.find('.pricing-list').hasClass('bounce-invert')) pricing_table_wrapper.toggleClass('reverse-animation');
					});
				}
			});
		});
	}
	function show_selected_items(selected_elements) {
		selected_elements.addClass('is-selected');
	}

	function hide_not_selected_items(table_containers, filter) {
		$.each(table_containers, function(key, value){
	  		if ( key != filter ) {	
				$(this).removeClass('is-visible is-selected').addClass('is-hidden');

			} else {
				$(this).addClass('is-visible').removeClass('is-hidden is-selected');
			}
		});
	}
});
    </script>

</head>

<body class="services-page">

    @include('layout.nav')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
            <div class="heading">
                <div class="container">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-lg-8">
                            <h1>Pricing</h1>
                            <p class="mb-0">Give Your Order and Pay</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{route('price')}}">Price</a></li>
                        <li class="{{route('services')}}">Price</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

    <!-- Services Section -->
<section id="services" class="services section">
  <div class="container">
    <div class="row gy-4">
    <div class="pricing-container">
		<div class="pricing-switcher">
			<p class="fieldset">
				<input type="radio" name="duration-1" value="monthly" id="monthly-1" checked>
				<label for="monthly-1">Monthly</label>
				<input type="radio" name="duration-1" value="yearly" id="yearly-1">
				<label for="yearly-1">Yearly</label>
				<span class="switch"></span>
			</p>
		</div>
		<ul class="pricing-list bounce-invert">
			<li>
				<ul class="pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="pricing-header">
							<h2>Basic</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">30</span>
								<span class="duration">mo</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li><em>5</em> Email Accounts</li>
								<li><em>1</em> Template Style</li>
								<li><em>25</em> Products Loaded</li>
								<li><em>1</em> Image per Product</li>
								<li><em>Unlimited</em> Bandwidth</li>
								<li><em>24/7</em> Support</li>
							</ul>
						</div>
						<footer class="pricing-footer">
							<a class="select" href="#">Sign Up</a>
						</footer>
					</li>
					<li data-type="yearly" class="is-hidden">
						<header class="pricing-header">
							<h2>Basic</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">320</span>
								<span class="duration">yr</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li><em>5</em> Email Accounts</li>
								<li><em>1</em> Template Style</li>
								<li><em>25</em> Products Loaded</li>
								<li><em>1</em> Image per Product</li>
								<li><em>Unlimited</em> Bandwidth</li>
								<li><em>24/7</em> Support</li>
							</ul>
						</div>
						<footer class="pricing-footer">
							<a class="select" href="#">Sign Up</a>
						</footer>
					</li>
				</ul>
			</li>
			<li class="exclusive">
				<ul class="pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="pricing-header">
							<h2>Exclusive</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">60</span>
								<span class="duration">mo</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li><em>15</em> Email Accounts</li>
								<li><em>3</em> Template Styles</li>
								<li><em>40</em> Products Loaded</li>
								<li><em>7</em> Images per Product</li>
								<li><em>Unlimited</em> Bandwidth</li>
								<li><em>24/7</em> Support</li>
							</ul>
						</div>
						<footer class="pricing-footer">
							<a class="select" href="#">Sign Up</a>
						</footer>
					</li>
					<li data-type="yearly" class="is-hidden">
						<header class="pricing-header">
							<h2>Exclusive</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">630</span>
								<span class="duration">yr</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li><em>15</em> Email Accounts</li>
								<li><em>3</em> Template Styles</li>
								<li><em>40</em> Products Loaded</li>
								<li><em>7</em> Images per Product</li>
								<li><em>Unlimited</em> Bandwidth</li>
								<li><em>24/7</em> Support</li>
							</ul>
						</div>
						<footer class="pricing-footer">
							<a class="select" href="#">Sign Up</a>
						</footer>
					</li>
				</ul>
			</li>
			<li>
				<ul class="pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="pricing-header">
							<h2>Pro</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">90</span>
								<span class="duration">mo</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li><em>20</em> Email Accounts</li>
								<li><em>5</em> Template Styles</li>
								<li><em>50</em> Products Loaded</li>
								<li><em>10</em> Images per Product</li>
								<li><em>Unlimited</em> Bandwidth</li>
								<li><em>24/7</em> Support</li>
							</ul>
						</div>
						<footer class="pricing-footer">
							<a class="select" href="#">Sign Up</a>
						</footer>
					</li>
					<li data-type="yearly" class="is-hidden">
						<header class="pricing-header">
							<h2>Pro</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">950</span>
								<span class="duration">yr</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li><em>20</em> Email Accounts</li>
								<li><em>5</em> Template Styles</li>
								<li><em>50</em> Products Loaded</li>
								<li><em>10</em> Images per Product</li>
								<li><em>Unlimited</em> Bandwidth</li>
								<li><em>24/7</em> Support</li>
							</ul>
						</div>
						<footer class="pricing-footer">
							<a class="select" href="#">Sign Up</a>
						</footer>
					</li>
				</ul>
			</li>
		</ul>
	</div>
      
    </div>
  </div>
</section>
<!-- end section -->

    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container">
            <h3 class="sitename">Personal</h3>
            <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
            <div class="social-links d-flex justify-content-center">
                <a href=""><i class="bi bi-twitter-x"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-skype"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="container">
                <div class="copyright">
                    <span>Copyright</span> <strong class="px-1 sitename">Personal</strong> <span>All Rights Reserved</span>
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you've purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/typed.js/typed.umd.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>