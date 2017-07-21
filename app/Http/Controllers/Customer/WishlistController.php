<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $wishlists = Wishlist::where('user_id', $userId)->with('product')->paginate(10);

        return view('customers.wishlist.wishlist', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);

        if ($wishlist->delete()) {
            return 1;
        }
    }

    public function wishlist(Request $request)
    {
        if (Auth::user()) {
            if ($request->ajax()) {
                $productId = $request->id;
                $input = [
                    'user_id' => Auth::user()->id,
                    'product_id' => $productId,
                ];
                $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $productId)->pluck('id')->toArray();
                
                if (count($wishlist) == 0) {
                    if (Wishlist::create($input)) {
                        return Response(['message' => 'created']);
                    }
                } else {
                    if (Wishlist::destroy($wishlist)) {
                        return Response(['message' => 'deleted']);
                    }
                }
            }
        } else {
            return Response(['message' => 'notLogedIn']);
        }
    }
}
