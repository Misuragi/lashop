<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Rating;
use App\Models\Product;
use App\Events\RatingPusherEvent;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productId = $request->product_id;
        
        $ratings = Rating::where('product_id', $productId)->orderBy('created_at', 'desc')->paginate(5);
        if (count($ratings)) {
            return view('customers.products.sections.review', compact('ratings'));
        } else {
            return 'empty';
        }
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $input = $request->all(); 
        $input['user_id'] = $userId;
        $productId = $request->product_id;

        $rating = Rating::create($input);
        if ($rating) {
            $avgScore = Rating::where('product_id', $productId)->avg('score');

            Product::where('id', $productId)->update(['score' => ceil($avgScore)]);

            $renderView = view('customers.products.sections.review-result', compact('rating'))->render();

            broadcast(new RatingPusherEvent($rating->product_id, $renderView))->toOthers();

            return $renderView;
        }
        return 0;
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
        $rating = Rating::find($id);
        $renderView = view('customers.products.sections.edit-rating-form', compact('rating'))->render();

        return $renderView;
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
        if ($request->ajax()) {
            $ratingUpdate = Rating::findOrFail($id);

            if ($ratingUpdate->update(['review' => $request->review])) {
                return Response(['ratingUpdate' => $ratingUpdate]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);

        if ($rating->delete()) {
            return 1;
        }
    }
}
