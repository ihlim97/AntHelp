<?php 
session_start();
include("header.php");
?>
		<div class="banner banner-short d-flex align-items-end" style="background-image: url('assets/img/banners/handhold.jpg')">
			<div class="wrapper">
				<div class="container">
					<div class="row">
						<div class="col-12 my-5 text-center text-white">
							<h1>Reviews</h1>
						</div>
					</div>
				</div>
			</div>
			<div class="overlay"></div>
		</div>


	<!-- body content -->
	<div class="container" id="review">
	    <div class="mt-5 clearfix">
	        <h2>User Reviews</h2>
	        <h5>Karen Teh</h5>
	        <button type="button" class="clearfix btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#submit-review-modal">
	            Write a review
	        </button>
	    </div>
	    <div class="review-tile mt-5">
	        <div class="rating text-warning mt-3">
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	        </div>
	        <p>by Nick Teh, September 24, 2018</p>
	        <p>“Punctuality at its best, money well paid & reliable. Ease of mind as they know what to do, performed task quickly & efficiently. Satisfied with the team, would definitely be using their service again next time.”</p>
	    </div>
	    <div class="review-tile mt-5">
	        <div class="rating text-warning mt-3">
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	        </div>
	        <p>by James Thong, September 24, 2018</p>
	        <p>"They were on time, stuck to their rates and cleaned up my super messy place!"</p>
	    </div>
	    <div class="review-tile mt-5">
	        <div class="rating text-warning mt-3">
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	            <span class="fas fa-star"></span>
	        </div>
	        <p>by Joyce Chan, September 20, 2018</p>
	        <p>"Service is good. Very thorough cleaning and reliable maids. Don't really have to watch over them. Just tell them what is needed to be cleaned and they'll do it for you."</p>
	    </div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="submit-review-modal" tabindex="-1" aria-hidden="true" role="dialog">
	    <div class="modal-dialog modal-dialog-centered">
	        <!-- Modal content-->
	        <div class="modal-content">
	            <span class="rounded-circle position-absolute shadow-sm" data-dismiss="modal"></span>
	            <div class="modal-header">
	                <h5 class="modal-title">Rate and review</h5>
	            </div>
	            <div class="modal-body">
	                <b id="user-name">Ryan Lim</b>
	                <p>Your review will be posted publicly on the web.</p>
	                <form class="clearfix">
	                    <fieldset class="rating">
	                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5"></label>
	                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4"></label>
	                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3"></label>
	                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2"></label>
	                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1"></label>
	                    </fieldset>
	                    <div class="form-group">
	                        <textarea class="form-control" id="review-desc" rows="3" placeholder="Description your experience"></textarea>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
	<?php include("footer.php"); ?>