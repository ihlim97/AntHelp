<?php 
session_start();
include("header.php"); 
?>
        <div class="banner banner-short d-flex align-items-end" style="background-image: url('assets/img/banners/handhold.jpg')">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12 my-5 text-center text-white">
                            <h1>Manage Services</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
        </div>

    <div class="content bg-light">
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-between my-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Services</li>
                        </ol>
                    </nav>
                    <div class="d-flex align-items-center">
                        <a href="provider-create-service.php" class="btn btn-primary">Create a new Service</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Card Items -->
    <div class="container">
        <div class="row mt-5 my-sm-5">
            <div class="col-12 cards-container">
<?php 
    include("config.php");
    $userId = $_SESSION['userId'];
    $sql = "SELECT * FROM services WHERE user_id = '$userId'";
    $services = mysqli_query($con, $sql);
    if (mysqli_num_rows($services) > 0) {
        echo '<div class="col-12">
                <p>You have posted '.mysqli_num_rows($services).' service(s).</p>
            </div>';
        while($row = mysqli_fetch_assoc($services)) {
        echo '
            <div class="card service-card mb-3">
                <div class="row no-gutters">
                    <div class="col-12 col-lg-4">
                        <img src="https://source.unsplash.com/500x400/?maid" class="card-img">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h3 class="card-title text-dark"><b>'.$row['service_type'].'</b></h3>
                            <a href=update-service.php?id='.$row['service_id'].' class="btn btn-secondary cta text-white d-none d-sm-block">Update Service</a>
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
                                            <li>'.$row['service_description'].'</li>
                                        </ul>
                
                                        <div class="row d-sm-none">
                                            <div class="col text-left">
                                                <a href=service-request.php?id='.$row['service_id'].' class="btn btn-lg btn-success mt-3 text-white">Book Now</a>
                                            </div>
                                            <div class="col">
                                                <div class="pricing text-right">
                                                    <h1 class="text-danger m-0">RM'.$row['service_rate'].'</h1>
                                                    <h6 class="text-dark">per hour</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-none d-sm-block">
                                        <div class="pricing text-right">
                                            <h1 class="text-danger m-0">RM'.$row['service_rate'].'</h1>
                                            <h6 class="text-dark">per hour</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row no-gutters">
                                <a href="review.php?sid='.$row['service_id'].'">View Review</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>';
        }
    }
?>
            </div>
        </div>
    </div> <!-- End Card Items -->

<!-- Artical Section -->
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
    </div> <!-- End Artical Section -->
    <?php 
    if(isset($_SESSION['success'])){
       // $('#request-confirmation').modal(show);
        echo 'cool';
    } ?>
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