<?php 
session_start();
include("header.php");
?>

        <div class="banner banner-medium d-flex align-items-center" style="background-image: url('assets/img/banners/handhold.jpg')">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12 my-4">
                            <div class="service-curator card p-5">
                                <h3 class="text-center">Refine your search</h3>
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
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
        </div>
    </div>

    <div class="content bg-light">
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-between my-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center">
                        <p class="m-0 mr-3">SORT BY</p>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Popularity
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Price</a>
                                <a class="dropdown-item" href="#">Rating</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5 my-sm-5">
            <div class="col-12">
                <p>2 results found.</p>
            </div>

            <div class="col-12 cards-container">
                
                <div class="card service-card mb-3">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-4">
                            <img src="https://source.unsplash.com/500x400/?maid" alt="" class="card-img">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h6 class="card-subtitle text-info">NEW!</h6>
                                <h3 class="card-title text-dark"><b>Home Cleaning Service</b></h3>
                                <a data-toggle="modal" data-target="#request-confirmation" class="btn btn-lg btn-success cta text-white d-none d-sm-block">Book Now</a>
                                <div class="rating text-warning">
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    5.0
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-sm-8">
                                            <ul class="disc text-dark">
                                                <li>Supreme cleaning services by trained staff</li>
                                                <li>Extra careful with your belongings</li>
                                                <li>Cleaning supplies can be arranged (if required)</li>
                                                <li>FREE! Essential oils for 1 room</li>
                                            </ul>
                
                                            <div class="row d-sm-none">
                                                <div class="col text-left">
                                                    <a data-toggle="modal" data-target="#request-confirmation" class="btn btn-lg btn-success mt-3 text-white">Book Now</a>
                                                </div>
                                                <div class="col">
                                                    <div class="pricing text-right">
                                                        <h1 class="text-danger m-0">RM120</h1>
                                                        <h6 class="text-dark">per hour</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-none d-sm-block">
                                            <div class="pricing text-right">
                                                <h1 class="text-danger m-0">RM120</h1>
                                                <h6 class="text-dark">per hour</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card service-card mb-3">
                    <div class="row no-gutters">
                        <div class="col-12 col-lg-4">
                            <img src="https://source.unsplash.com/500x400/?cleaning" alt="" class="card-img">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h6 class="card-subtitle text-danger">POPULAR!</h6>
                                <h3 class="card-title text-dark"><b>Carpet Cleaning Service</b></h3>
                                <a data-toggle="modal" data-target="#request-confirmation" class="btn btn-lg btn-success cta text-white d-none d-sm-block">Book Now</a>
                                <div class="rating text-warning">
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    <span class="fas fa-star"></span>
                                    5.0
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-sm-8">
                                            <ul class="disc text-dark">
                                                <li>Supreme cleaning services by trained staff</li>
                                                <li>Extra careful with your belongings</li>
                                                <li>Cleaning supplies can be arranged (if required)</li>
                                                <li>FREE! Essential oils for 1 room</li>
                                            </ul>

                                            <div class="row d-sm-none">
                                                <div class="col text-left">
                                                    <a data-toggle="modal" data-target="#request-confirmation" class="btn btn-lg btn-success mt-3 text-white">Book Now</a>
                                                </div>
                                                <div class="col">
                                                    <div class="pricing text-right">
                                                        <h1 class="text-danger m-0">RM120</h1>
                                                        <h6 class="text-dark">per hour</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col d-none d-sm-block">
                                            <div class="pricing text-right">
                                                <h1 class="text-danger m-0">RM120</h1>
                                                <h6 class="text-dark">per hour</h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="content bg-light">
        <div class="container">
            <div class="row">
                <div class="col my-5">
                    <h4>Did You Find What You Were Looking For?</h4>

                    <div class="row mt-4">
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <div class="card card-border-top-red">
                                <img src="https://via.placeholder.com/400x300" alt="" class="card-img">
                                <div class="card-body">
                                    <h5 class="card-title">Malaysia: Ageing population</h5>
                                    <p class="card-text">Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <div class="card card-border-top-red">
                                <img src="https://via.placeholder.com/400x300" alt="" class="card-img">
                                <div class="card-body">
                                    <h5 class="card-title">Malaysia: Ageing population</h5>
                                    <p class="card-text">Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <div class="card card-border-top-red">
                                <img src="https://via.placeholder.com/400x300" alt="" class="card-img">
                                <div class="card-body">
                                    <h5 class="card-title">Malaysia: Ageing population</h5>
                                    <p class="card-text">Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3 mb-3">
                            <div class="card card-border-top-red">
                                <img src="https://via.placeholder.com/400x300" alt="" class="card-img">
                                <div class="card-body">
                                    <h5 class="card-title">Malaysia: Ageing population</h5>
                                    <p class="card-text">Malaysia’s elderly population is expected to double to 5.18 million by 2030 ...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="request-confirmation" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="big-red-tick fas fa-check"></div>
                    <h1 class="mt-4">Awesome!</h1>
                    <p>Your request has been submitted! Please hang on while our service provider gets back to you.</p>
                    <a href="index.php" class="btn btn-block btn-primary text-white">OK</a>
                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?> 