<?php

namespace App\Http\Controllers\Feeds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feed;
use Session;

class DogFeedsController extends Controller
{
    public function feedListsOnPrfile(){
        return view('frontend.pages.users.feeds.gallery-list');
    }
    public function feedListsOnPrfileShow(Request $request){
        if($request->page != 1){$start = $request->page *6;}else{$start = 0;}

        $feedlistGallery = Feed::where('feedable_id', Session::get('defaultDogDetails.id'))->where('type', 'image')->orderBy('created_at', 'desc')->skip($start);
        if($request->page == 1){$feedlistGallery = $feedlistGallery->paginate(5); }else{$feedlistGallery = $feedlistGallery->paginate(6); }
        
        return view('frontend.pages.users.feeds.gallery-list-items', compact('feedlistGallery'));
    }
    public function reelListsOnPrfileShow(Request $request){
        if($request->page != 1){$start = $request->page *6;}else{$start = 0;}

        $reellistGallery = Feed::where('feedable_id', Session::get('defaultDogDetails.id'))->where('type', 'video')->orderBy('created_at', 'desc')->skip($start);
        if($request->page == 1){$reellistGallery = $reellistGallery->paginate(5); }else{$reellistGallery = $reellistGallery->paginate(6); }
        
        return view('frontend.pages.users.feeds.reels-list-items', compact('reellistGallery'));
    }
    
}
