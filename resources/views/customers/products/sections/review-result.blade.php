<li class="review">
    <div class="col-md-11">
        <div class="rating-box">
            <div style="width:{{ $rating->score * 20  }}%" class="rating"></div>
        </div>
        <div>
            <h6><a>{{$rating->summary}}</a></h6>
            <small>Review by <span>{{ Auth::user()->name }} </span>on {{ $rating->created_at }}</small>
            <div class="review-txt">{{ $rating->review }}</div>
        </div>
    </div>
    <div class="col-md-1">
    @if(Auth::user()->id == $rating->user_id)
        <i data-edit="{{ route('rating.edit', $rating->id) }}" class="glyphicon glyphicon-pencil edit-rating" style="color: blue; right: 22px; cursor:pointer; "></i>
        <i data-delete="{{ route('rating.destroy', $rating->id) }}" class="glyphicon glyphicon-trash delete-rating" style="color: red; left: 10px; cursor:pointer;" ></i>
    @endif    
    </div>
</li>
