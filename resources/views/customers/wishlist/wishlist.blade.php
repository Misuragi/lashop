@extends('customers.layout.master')
@section('title')
    <title>Home</title>
@endsection
@push('styles')
    {!! Html::style('assets/plugins/toastr/toastr.min.css') !!}
@endpush
@section('content')
<div class="main-container col2-right-layout">
    <div class="main container">
        <div class="row">
            <section class="col-main col-sm-9 wow">
                <div class="my-account">
                    <div class="page-title">
                        <h2>My Wishlist</h2>
                    </div>
                    <div class="my-wishlist">
                        <div class="table-responsive">
                            <fieldset>
                                <table id="wishlist-table" class="clean-table linearize-table data-table">
                                    <thead>
                                        <tr class="first last">
                                            <th class="col-md-2 "></th>
                                            <th class="col-md-7"></th>
                                            <th class="col-md-1">Price</th>
                                            <th class="col-md-1"></th>
                                            <th class="col-md-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($wishlists as $wishlist)
                                        <tr id="item_31" class="first odd">
                                            <td class="wishlist-cell0 customer-wishlist-item-image">
                                                <a title="Softwear Women's Designer" href="#/" class="product-image">
                                                    <img width="150" alt="Softwear Women's Designer" src="{{ $wishlist->product->image }}">
                                                </a>
                                            </td>
                                            <td class="wishlist-cell1 customer-wishlist-item-info">
                                                <h3 class="product-name">
                                                    <a title="Softwear Women's Designer" href="#">
                                                        <b>{{ $wishlist->product->name }}</b>
                                                    </a>
                                                </h3>
                                                <div class="description std">
                                                    <div class="inner">{!! str_limit($wishlist->product->description, $limit = 200, $end = '...') !!}</div>
                                                </div>
                                            </td>
                                            <td data-rwd-label="Price" class="wishlist-cell3 customer-wishlist-item-price">
                                                <div class="cart-cell">
                                                    <div class="price-box"> <span id="product-price-39" class="regular-price"><span class="price">${{ $wishlist->product->price }}</span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="wishlist-cell4 customer-wishlist-item-cart">
                                                <form method="post" action="{{ route('carts.store') }}" id="wishlist-view-form" class="form-add">
                                                    {!! Form::hidden('productId', $wishlist->product->id, ['class' => 'product-id' ]) !!}
                                                    <button type="submit" title="Add to Cart" class="button btn-cart"><span>Add to Cart</span></button>
                                                </form>
                                            </td>
                                            <td class="wishlist-cell5 customer-wishlist-item-remove last">
                                                <a class="remove-item" title="Clear Cart"  data-href="{{ route('wishlist.destroy', ['id' => $wishlist->id]) }}"><span><span></span></span></a>
                                            </td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
                                </table>
                                <style type="text/css">
                                    .wishlist-paginate {
                                        padding: 0px !important;
                                    }
                                </style>
                                <div class="col-md-5 col-md-offset-7 wishlist-paginate">
                                    <div class="pull-right">
                                        {{ $wishlists->links() }}
                                    </div>
                                </div>

                                <div class="buttons-set buttons-set2 rows">
                                    <button class="button btn-add btn-add-all" title="Add All to Cart" type="button" data-href="{{ route('carts.addAll') }}"><span>Add All to Cart</span></button>
                                </div>
                            </fieldset> 
                        </div>
                    </div>
                </div>
            </section>
            @include('customers.wishlist.component.aside_wishlist')
        </div>
    </div>
</div>
@endsection
@push('scripts')
{!! Html::script('assets/plugins/toastr/toastr.min.js') !!}
    <script type="text/javascript">
        //remove wishlist
        $(document).on('click', '.remove-item', function () {
            url = $(this).data('href');
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
                        type: 'POST',
                        success: function ( data ) {
                            if (data == 1) {
                                swal(
                                    'Deleted !',
                                    'Success',
                                    'success'
                                )
                                item.parents('tr').remove();
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });
        });

        //Add to cart
        $(document).on('submit', '.form-add', function (e){
            e.preventDefault();
            $.ajax({
                url : $(this).attr('action'),
                data : $(this).serialize(),
                type : "POST",
                success : function(data){
                    toastr.success('You Bought Product');
                    $('#cart-sidebar').html(data.cartContent);
                    $('#cart-total').html(data.total);
                    $('.top-subtotal .price').html('$' + data.subTotal); 
                }
            });
        });

        //add all to cart
        $(document).on('click', '.btn-add-all', function () {
            url = $(this).data('href');
            ids = [];
            $('.product-id').each(function(){
                ids.push($(this).val());  
            });
            $.ajax({
                method : 'POST',
                url : url,
                data : {'ids' : ids},
                success : function (data) {
                    toastr.success('You Bought All Product');
                    $('#cart-sidebar').html(data.cartContent);
                    $('#cart-total').html(data.total);
                    $('.top-subtotal .price').html('$' + data.subTotal); 
                }
            });
        });
    </script>
@endpush
