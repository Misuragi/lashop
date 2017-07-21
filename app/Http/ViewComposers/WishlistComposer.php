<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Wishlist;
use Auth;

class WishlistComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $wishlistProductsId = Wishlist::where('user_id', $userId)->pluck('product_id')->toArray();
            $view->with('wishlistProductsId', $wishlistProductsId);
        }
    }
}
