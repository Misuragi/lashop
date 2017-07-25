@extends('customers.layout.master')
@section('title')
<title>Home</title>
@endsection
@push('styles')
    {!! Html::style('assets/plugins/jquery-bar-rating/themes/fontawesome-stars.css') !!}

    <style type="text/css">
        .box-reviews1 .br-theme-fontawesome-stars .br-widget a {
            font: 30px/1 FontAwesome;
            margin: 10px 10px !important;
        }
        .box-reviews1 .br-wrapper{
            padding :20px 0px;
        }
    </style>
@endpush
@section('content')
<section class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="row">
                <div class="product-view wow">
                    <div class="product-essential">
                        <form action="#" method="post" id="product_addtocart_form">
                            <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                                <ul class="moreview" id="moreview">
                                    <li class="moreview_thumb thumb_1">
                                        <img class="moreview_thumb_image" src="{{ url($product->image) }}">
                                        <img class="moreview_source_image" src="{{ url($product->image) }}" alt="">
                                        <span class="roll-over">Roll over image to zoom in</span>
                                        <img style="position: absolute;" class="zoomImg" src="{{ url($product->image) }}">
                                    </li>
                                </ul>
                                <div class="moreview-control"> <a style="right: 42px;" href="javascript:void(0)" class="moreview-prev"></a> <a style="right: 42px;" href="javascript:void(0)" class="moreview-next"></a> </div>
                            </div>
                            
                            <!-- end: more-images -->
                            
                            <div class="product-shop col-lg-6 col-sm-6 col-xs-12">
                                <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
                                <div class="product-name">
                                    <h1>{{ $product->name }}</h1>
                                </div>
                                <div class="ratings">
                                    <div class="rating-box">
                                        <div style="width:60%" class="rating"></div>
                                    </div>
                                    <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
                                </div>
                                <p class="availability in-stock"><span>In Stock</span></p>
                                <div class="price-block">
                                    <div class="price-box">
                                        <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $315.99 </span> </p>
                                        <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> {{ $product->price }}$ </span> </p>
                                    </div>
                                </div>
                                <div class="short-description">
                                    <h2>Quick Overview</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu.<br>
                                    Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt... </p>
                                </div>
                                <div class="add-to-box">
                                    <div class="add-to-cart">
                                        <label for="qty">Quantity:</label>
                                        <div class="pull-left">
                                            <div class="custom pull-left">
                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                                <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                            </div>
                                        </div>
                                        <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button"><span><i class="icon-basket"></i> Add to Cart</span></button>
                                    </div>
                                    <div class="email-addto-box">
                                        <ul class="add-to-links">
                                            {{-- <li> <a class="link-wishlist" href="#"><span>Add to Wishlist</span></a></li>
                                            <li><span class="separator">|</span> <a class="link-compare" href="#"><span>Add to Compare</span></a></li> --}}
                                        </ul>
                                        {{-- <p class="email-friend"><a href="#" class=""><span>Email to Friend</span></a></p> --}}
                                    </div>
                                </div>
                                {{-- <div class="custom-box"><img alt="banner" src="{{ asset('assets/images/cus-img.png') }}"></div> --}}
                            </div>
                        </form>
                    </div>
                    <div class="product-collateral">
                        <div class="col-sm-12 wow">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                                <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
                                <li> <a href="#product_tabs_custom" data-toggle="tab">Product detail</a> </li>
                                <li><a href="#product_review" data-toggle="tab">Review</a></li>
                                <li><a href="#product_tabs_tags" data-toggle="tab">Comment</a></li>
                            </ul>
                            <div id="productTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="product_tabs_description">
                                    <div class="std">
                                        {!! $product->description !!}
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id nulla. Donec a neque libero. Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem, quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus, consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in imperdiet ligula euismod eget. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam erat mi, rutrum at sollicitudin rhoncus, ultricies posuere erat. Duis convallis, arcu nec aliquam consequat, purus felis vehicula felis, a dapibus enim lorem nec augue.</p>
                                        <p> Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nulla luctus malesuada tincidunt. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Integer enim purus, posuere at ultricies eu, placerat a felis. Suspendisse aliquet urna pretium eros convallis interdum. Quisque in arcu id dui vulputate mollis eget non arcu. Aenean et nulla purus. Mauris vel tellus non nunc mattis lobortis.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product_tabs_custom">
                                    <div class="product-tabs-content-inner clearfix">
                                        <h4>Detail product</h4>
                                        <div class="table-responsive">
                                            <table class="table table-striped compare-table">
                                                <colgroup>
                                                <col width="30%">
                                                <col width="70%">
                                                </colgroup>
                                                <tbody>
                                                    @foreach($product->properties as $key => $propety)
                                                    <tr class="product-shop-row first 
                                                    @if($key%2)
                                                        odd
                                                    @else
                                                        even
                                                    @endif
                                                    ">
                                                        <th>{{ $propety->label }}</th>
                                                        <td>{{ $product->getAttribute('prop_' . $propety->name) . ' ' . $product->getPropertyUnit($propety->id) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- product-review -->
                                @if(Auth::check())
                                <div class="tab-pane fade" id="product_review">
                                    <div class="box-collateral box-reviews" id="customer-reviews">
                                        <div class="box-reviews1">
                                            <div class="form-add">
                                                <form id="review-form" method="post" action="{{ route('rating.store') }}">
                                                    <input type="hidden" value="{{ $product->id }}" id="product_id" name="product_id">
                                                    <div class="rows">
                                                        <label class="required" for="summary_field">How do you rate this product?<em>*</em></label>
                                                        <select class="ratting-bar" name="score">
                                                            <option value="1" data-html="bad">1</option>
                                                            <option value="2" data-html="nomal">2</option>
                                                            <option value="3" data-html="good">3</option>
                                                            <option value="4" data-html="better">4</option>
                                                            <option value="5" data-html="best">5</option>
                                                        </select>
                                                    </div>
                                                    <div class="review2">
                                                        <ul>
                                                            <li>
                                                                <label class="required" for="summary_field">Summary<em>*</em></label>
                                                                <div class="input-box">
                                                                <input type="text" class="input-text required-entry" id="summary_field" name="summary">
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <label class="required label-wide" for="review_field">Review<em>*</em></label>
                                                                <div class="input-box">
                                                                    <textarea class="required-entry" rows="3" cols="5" id="review_field" name="review"></textarea>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <div class="buttons-set">
                                                        <button class="button" id = "btn-review-submit" title="Submit Review" type="button"><span>Submit Review</span></button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="box-reviews2">
                                        <h3>Customer Reviews</h3>
                                        <div class="box visible">
                                            @include('customers.products.sections.review', [ 'ratings' => $ratings])
                                        </div>
                                        
                                        <div style="text-align: center;" class="col-md-12 col-md-offset-3"> <a data-currentpage="2" data-product-id="{{ $product->id}}" data-route="{{ route('rating.index') }}" href="javascript:void(0)" class="button view-all" id="see-more-ratings"><span><span>See more</span></span></a> </div>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <!-- comment -->
                                <div class="tab-pane fade" id="product_tabs_tags">
                                    <div class="box-collateral box-reviews" id="customer-reviews">
                                        <div class="box-reviews2">
                                            <div class="box visible" style="margin-bottom: 10px; margin-left: 40px;">
                                                <form id="form-comment" method="POST" action="{{ route('comments.store') }}">
                                                    <ul>
                                                        <li>
                                                            <input type="hidden" id="comment-product" name="product_id" value="{{ $product->id }}">
                                                            <div class="input-box">
                                                                <textarea name="content" rows="3" cols="5" id="textarea-content-comment" placeholder="New Comment..." ></textarea>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                    <div class="buttons-set" style="text-align: right;">
                                                        <a href="javascript:void(0)" id="button-submit-comment" class="button submit" title="Submit Review"><span>Submit comment</span></a>
                                                    </div>
                                                </form>
                                            </div>
                                            <h3>Comments</h3>
                                            <ul id="comment-load" style="position: relative;">
                                            <input type="hidden" value="{{ Auth::id() }}" name="user_id" id="user_id">
                                            @foreach($comments as $comment)
                                                @include('customers.products.sections.comment', ['comment' => $comment])
                                            @endforeach
                                            </ul>
                                            
                                            <div style="text-align: center;" class="actions"> <a data-currentpage="2" data-product-id="{{ $product->id}}" data-route="{{ route('comments.index') }}" href="javascript:void(0)" class="button view-all" id="see-more-comment"><span><span>See more</span></span></a> </div>
                                        </div>
                                    </div>
                                </div>
                                <img class="loading" style="position: absolute; display: none; left: 40%; z-index: 100000;" src="{{ asset('assets/images/30.gif') }}" />
                                @endif
                                <div class="col-sm-12">
                                    <div class="box-additional">
                                        <div class="related-pro wow">
                                            <div class="slider-items-products">
                                                <div class="new_title center">
                                                    <h2>Related Products</h2>
                                                </div>
                                                <div id="related-products-slider" class="product-flexslider hidden-buttons">
                                                    <div class="slider-items slider-width-col4">
                                                        
                                                        @include('customers.products.sections.sameproduct')
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="upsell-pro wow">
                                            <div class="slider-items-products">
                                                <div class="new_title center">
                                                    <h2>Upsell Products</h2>
                                                </div>
                                                @include('customers.products.sections.upsellproduct')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection
@push('scripts')
{!! Html::script('assets/plugins/jquery-bar-rating/jquery.barrating.min.js') !!}
    <script type="text/javascript">
        //show rating bar jquery
        $(function() {
            $('.ratting-bar').barrating({
                theme: 'fontawesome-stars'
            });
        });

        //submit form review
        $(document).on('click', '#btn-review-submit', function () {
            var form = $(this).closest('#review-form');

            $.post(form.attr('action'), form.serialize(), function (data) {
                $('.review-result').prepend(data);
                form[0].reset();
                $('.ratting-bar').barrating('clear');
            });
        });

        Echo.private('ratings.' + $('#product_id').val())
            .listen('RatingPusherEvent', (data) => {
                $('.review-result').prepend(data.renderView);
            });

        //see more ratings
        $('#see-more-ratings').click(function(event) {
           seeMore($(this), $('.review-result'));
        });

        //see more comment 
        $('#see-more-comment').click(function(event) {
            seeMore($(this), $('#comment-load'));
        });

        function seeMore(object, result) {
            $('.loading').show();
            $.get(object.attr('data-route'), { 'product_id' : object.attr('data-product-id'), page : object.attr('data-currentpage') })
                .done(function(e) {
                    $('.loading').hide();
                    var currentpage = parseInt(object.attr('data-currentpage')) + 1;
                    object.attr('data-currentpage', currentpage);
                    if(e === "empty") {
                        object.hide();
                    } else {
                        result.append(e);
                    }
            });
        }

        //delete review
        $(document).on('click', '.delete-rating', function () {
            url = $(this).data('delete');
            item = $(this);
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        success: function ( data ) {
                            if (data == 1) {
                                swal(
                                    'Deleted !',
                                    'Success',
                                    'success'
                                )
                                item.parents('li').remove();
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });

        //edit review
        $(document).on('click', '.edit-rating', function() {
            var route = $(this).data('edit');
            var object = $(this);
            $.ajax({
                type: 'GET',
                url : route,  
                success : function (data) {
                    object.parents('li').find('.review-txt').html(data);
                }
            });  
        });
        $(document).on('click', '#button-update-rating', function(e) {
                var form = $(this).closest('#form-edit-rating');
                var object = $(this);
                $.ajax({
                    type: 'PUT',
                    url : form.attr('action'), 
                    data: form.serialize(), 
                    success : function (data) {
                        object.parents('li').find('.review-txt').html(data.ratingUpdate.review);
                    }    
                });
            });
    </script>
    <script type="text/javascript">
        $('#button-submit-comment').click(function(event) {
            var form = $(this).closest('#form-comment');
            $.post(form.attr('action'), form.serialize(), function (data) {
                var controlForm = $('#comment-load:first'),
                    newEntry = $(data).prependTo(controlForm);

                $('#textarea-content-comment').val('');
            }) 
        });

        Echo.private('comments.' + $('#comment-product').val())
            .listen('CommentPusherEvent', (data) => {
                var content_commnet_update = $('#comment-content-' + data.comment.id);
                if (content_commnet_update.length) {
                    console.log(data.comment.content);
                    if(data.comment.content == null) {
                        $('#comment_' + data.comment.id).remove();
                    } else {
                        content_commnet_update.text(data.comment.content);
                    }
                } else {
                    addNewEntryComment(data.comment);
                }
        });

        function addNewEntryComment(data) {
            var metaUrl = document.getElementsByName('base-url')[0].getAttribute('content');
            var controlForm = $('#comment-load:first'),
                    currentEntry = $('.entry-comment:first'),
                    newEntry = $(currentEntry.clone()).prependTo(controlForm);
            if(currentEntry.length) {
                console.log(currentEntry);
                newEntry.attr('id', 'comment_' + data.id);
                newEntry.find('a#comment-username').text(data.user.name);
                newEntry.find('.comment-textarea').text(data.content);
                newEntry.find('.comment-textarea').attr('id', 'comment-content-' + data.id);
                newEntry.find('.edit-comment').attr('data-edit', metaUrl + '/comments/' + data.id);
                newEntry.find('.time-comment').text(data.created_at); 

                if($('#user_id').val() == data.user_id) {
                    newEntry.find('.action-comment').show();
                } else {
                    newEntry.find('.action-comment').hide();
                }

                newEntry.find('.delete-comment').attr('data-delete', metaUrl + '/comments/' + data.id);
            } else {
                $.get(metaUrl + '/comments/' + data.id)
                .done(function(e) {
                    newEntry = $(e).prependTo(controlForm);
                });
            }
        }
         
        $('#comment-load').on('click', '.edit-comment', function() {
            editComment($(this));
        });

        function editComment(currentThis) {
            var edit_route = currentThis.data('edit');
            var parent_edit_comment = currentThis.parentsUntil('.entry-comment');
            var edit_comment = parent_edit_comment.find('div.comment-textarea');
            var value_comment = edit_comment.text();
            html = '<form id="form-edit-comment" method="POST" action="' + edit_route + '">'
                    + '<ul>'
                    + '<li>'                       
                        + '<div class="input-box">'
                            + '<textarea class="edit-content-comment" name="content" rows="3" cols="5" id="edit-content-comment" placeholder="New Comment..." >'
                            + value_comment + '</textarea>'  
                        + '</div>'
                    + '</li>'
                    + '</ul>'
                    + '<div class="buttons-set" style="text-align: right;">'
                     + '<a href="javascript:void(0)" id="button-update-comment" class="button submit">'
                     +'<span>Update comment</span></a>'
                   + '</div>'
                  + '</form>';
            edit_comment.html(html);
            var textarea = edit_comment.find('textarea.edit-content-comment');
            textarea
            .focus()
            .val("")
            .val(value_comment);
            $('#button-update-comment').click(function(e) {
                var form = $(this).closest('#form-edit-comment');
                $.ajax({
                    type: 'PUT',
                    url : form.attr('action'), 
                    data: form.serialize(), 
                    success : function (data) {
                        // console.log("a");
                        edit_comment.html(textarea.val());
                        var color = edit_comment.css('color');
                        edit_comment.css('color', 'green');
                        setTimeout(function(){
                            edit_comment.css('color', color);}, 3000);
                        },
                });
            });
        }

        $('#comment-load').on('click', '.delete-comment', function() {
            deleteComment($(this));
        });

        function deleteComment(currentThis) {
            swal({
              title: "Are you sure?",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, Delete it!",
              closeOnConfirm: false
            },
            function(){
                console.log(currentThis.attr('data-delete'));
                $.ajax({
                        type: 'DELETE',
                        url: currentThis.attr("data-delete"),
                        dateType: "jsonp", 
                        success: function(result) {
                            $('#comment_' + result).remove();
                        }
                });
                swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )       
            })
        }
    </script>
@endpush