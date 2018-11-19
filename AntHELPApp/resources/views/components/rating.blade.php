<div class="star-rating">
    <fieldset>
        @if ($review->user_rating != null)
            <input type="radio" id="star5" name="user_rating" value="5" {{$review->user_rating == 5 ? 'checked' : ''}} disabled/><label for="star5" title="Outstanding">5 stars</label>
            <input type="radio" id="star4" name="user_rating" value="4" {{$review->user_rating == 4 ? 'checked' : ''}} disabled/><label for="star4" title="Very Good">4 stars</label>
            <input type="radio" id="star3" name="user_rating" value="3" {{$review->user_rating == 3 ? 'checked' : ''}} disabled/><label for="star3" title="Good">3 stars</label>
            <input type="radio" id="star2" name="user_rating" value="2" {{$review->user_rating == 2 ? 'checked' : ''}} disabled/><label for="star2" title="Poor">2 stars</label>
            <input type="radio" id="star1" name="user_rating" value="1" {{$review->user_rating == 1 ? 'checked' : ''}} disabled/><label for="star1" title="Very Poor">1 star</label>
        @else
            <input type="radio" id="star5" name="user_rating" value="5" checked/><label for="star5" title="Outstanding">5 stars</label>
            <input type="radio" id="star4" name="user_rating" value="4"/><label for="star4" title="Very Good">4 stars</label>
            <input type="radio" id="star3" name="user_rating" value="3"/><label for="star3" title="Good">3 stars</label>
            <input type="radio" id="star2" name="user_rating" value="2"/><label for="star2" title="Poor">2 stars</label>
            <input type="radio" id="star1" name="user_rating" value="1"/><label for="star1" title="Very Poor">1 star</label>
        @endif
    </fieldset>
</div>
