<form id="form-edit-rating" method="POST" action="{{ route('rating.update', $rating->id) }}">
    <ul>
    <li>                      
        <div class="input-box">
            <textarea class="edit-content-rating" name="review" rows="3" cols="5" id="edit-content-rating" placeholder="New Comment..." >{{ $rating->review }}</textarea>'  
        </div>
    </li>
    </ul>
    <div class="buttons-set" style="text-align: right;">
        <a id="button-update-rating" class="button submit"><span>Update</span></a>
    </div>
</form>
