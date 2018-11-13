<?php 
session_start();
include("header.php");
?>
        <div class="banner d-flex align-items-center" style="background-image: url('assets/img/banners/handhold.jpg')">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12 my-4">
                            <div class="service-curator card p-5">
                                <h3 class="text-center">How can we help you today?</h3>
                                <form class="d-flex justify-content-center flex-column flex-lg-row" action="">
                                    <h3>I need</h3>
                                    <select name="service_type">
                                        <option value="cleaning">Cleaning Services</option>
                                        <option value="nursing">Nursing Services</option>
                                        <option value="meal-catering">Meal Catering Services</option>
                                    </select>
                                    <h3>at</h3>
                                    <select name="location">
                                        <option value="PJ">Petaling Jaya</option>
                                        <option value="BKTD">Bukit Damansara</option>
                                        <option value="Kepong">Kepong</option>
                                    </select>
                                    <h3>on</h3>
                                    <select name="time">
                                        <option value="20181010 13:00">Today, 1:00pm</option>
                                        <option value="20181010 14:00">Today, 2:00pm</option>
                                    </select>
                                    <a href="search.html" class="btn btn-success mt-3 mt-lg-0 text-white py-2 px-3">Search</a>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 text-center text-white">
                            <h1>Are you a service provider?</h1>
                            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#login-modal">
                            	Post Services FREE
                        	</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
    </div>

    <div class="content bg-light">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="slider my-5">
                        <div class="slider-item">
                            <div class="content h-100 w-100 d-flex flex-column justify-content-center align-items-baseline">
                                <h2 class="mb-3 text-white">Get the best services <br class="hidden-xs">At the best prices.</h2>
                                <a href="" class="btn btn-primary">Search for a Service</a>
                            </div>
                            <img class="w-100" src="https://source.unsplash.com/1440x600/?happy" alt="Placeholder">
                        </div>
                        <div class="slider-item">
                            <div class="content h-100 w-100 d-flex flex-column justify-content-center align-items-baseline">
                                <h2 class="mb-3 text-white">Get the best services <br class="hidden-xs">At the best prices.</h2>
                                <a href="" class="btn btn-primary">Search for a Service</a>
                            </div>
                            <img class="w-100" src="https://source.unsplash.com/1440x600/?cleaning" alt="Placeholder">
                        </div>
                        <div class="slider-item">
                            <div class="content h-100 w-100 d-flex flex-column justify-content-center align-items-baseline">
                                <h2 class="mb-3 text-white">Get the best services <br class="hidden-xs">At the best prices.</h2>
                                <a href="" class="btn btn-primary">Search for a Service</a>
                            </div>
                            <img class="w-100" src="https://source.unsplash.com/1440x600/?meal" alt="Placeholder">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5 my-sm-5">
            <div class="col-12 col-sm-6 my-5">
                <h4>Get your business on track.</h4>
                <h4>Sign up as a service provider.</h4>
                <p>Join the fastest growing and best services platform for senior citizens in Malaysia! Supercharge your services business by catering to a more elder audience. Enjoy better earnings and so much more benefits.</p>
                <a href="service-provider-signup-page.html" class="btn btn-primary">Get a free service provider account</a>
            </div>
            <div class="col-12 col-sm-6 p-0 p-sm-3">
                <img src="https://source.unsplash.com/600x400/?business"  alt="" class="img-fluid rounded-corners-sm">
            </div>
        </div>
    </div>

    <div class="content bg-light">
        <div class="container">
            <div class="row">
                <div class="col my-5">
                    <h4>What's happening at AntHELP</h4>

                    <div class="row mt-4">
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <div class="card card-border-top-red">
                                <img src="https://source.unsplash.com/400x300/?elderly" alt="" class="card-img">
                                <div class="card-body">
                                    <h5 class="card-title">Malaysia: Ageing population</h5>
                                    <p class="card-text">Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <div class="card card-border-top-red">
                                <img src="https://source.unsplash.com/400x300/?elderly" alt="" class="card-img">
                                <div class="card-body">
                                    <h5 class="card-title">Malaysia: Ageing population</h5>
                                    <p class="card-text">Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <div class="card card-border-top-red">
                                <img src="https://source.unsplash.com/400x300/?elderly" alt="" class="card-img">
                                <div class="card-body">
                                    <h5 class="card-title">Malaysia: Ageing population</h5>
                                    <p class="card-text">Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <div class="card card-border-top-red">
                                <img src="https://source.unsplash.com/400x300/?elderly" alt="" class="card-img">
                                <div class="card-body">
                                    <h5 class="card-title">Malaysia: Ageing population</h5>
                                    <p class="card-text">Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-4"><a href="" class="btn btn-secondary">View More</a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
	<div class="modal fade" id="login-modal" tabindex="-1" aria-hidden="true" role="dialog">
	    <div class="modal-dialog modal-dialog-centered">
	        <!-- Modal content-->
	        <div class="modal-content text-center sign-form">
	            <span class="rounded-circle position-absolute shadow-sm" data-dismiss="modal"></span>
	            <div class="modal-body">
	                <img src="assets/img/logo-primary.svg" width="150" alt="AntHELP Logo">
	                <div class="position-relative py-3">
	                    <h4>Sign in</h4>
	                </div>
	                <form action="needs-validation" novalidate>
	                    <div class="form-group">
	                        <input required type="email" name="login-email" class="form-control" placeholder="E-mail address">
                           	<div class="valid-feedback">Looks Good</div>
                            <div class="invalid-feedback">Please enter an email.</div>
	                    </div>
	                    <div class="form-group">
	                        <input required type="password" name="login-password" class="form-control" placeholder="Create a password">
                            <div class="valid-feedback">Looks Good</div>
                            <div class="invalid-feedback">Please enter a password.</div>
	                    </div>
	                    <button type="button" class="btn w-100 btn-danger mb-3" onclick="validateEmail()">Next</button>
	                </form>
	                <p class="text-right"><a href="#">Forgot Password?</a></p>
	                <hr>
	                <p class="text-center m-0">Don’t have an account? Sign up as </p>
                    <p class="text-center"><b><span><a class="text-info" href="senior-signup-page.html">Senior</a></span> | <span><a class="text-info" href="service-provider-signup-page.html">Service Provider</a></span></b></p>
	            </div>
	        </div>
	    </div>
	</div>

<?php include("footer.php"); ?> 