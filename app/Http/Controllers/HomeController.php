<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\NotPetQuestion;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        return view('frontend.index');
    }

     function admin_dashboard(){
        $page['title'] = 'Dashboard';
        return view('backend.index', compact('page'));
    }
    function notAPets(){
        $start_id = NotPetQuestion::where('status', 1)->whereDate('published', '<', now())->whereDate('expire_at', '>=', now())->orderBy('id', 'asc')->first();
        if(is_null($start_id)){
            $start_id = '';
        }
        return view('frontend.pages.not_a_pet', compact('start_id'));
    }


    public function ajax_get_questions(Request $request){
        $today = date("Y-m-d"); 
        if($request->id == 'finish'){
            $html ="<div class='not_pet_question text-center'><h4>Finish you Test.</h4></div>";
            return $html;
        }
        
        $data = NotPetQuestion::where('id', $request->id)->where('status', 1)->whereDate('published', '<', now())->whereDate('expire_at', '>=', now())->orderBy('id', 'asc')->first(); 
        $current_id = dsld_next_model_id('App\Models\NotPetQuestion', $request->id);
        $html = '';
    
        
        if($data != ''){
            $html .='<div class="not_pet_question text-center"><h4>'.$data->question.'</h4></div>';

            $html .='<ul>';

            foreach (json_decode($data->option) as $key => $value) {
                $active = '';
                if($key == 0){$active = 'active';}

                 $html .='<li onclick="click_option_not_pet('.$key.')" class="optionfcs items-'.$key.'">'.$value.'
                </li>';
            }

            $html .='</ul>';
        }else if(is_null($current_id)){
            $html .="<div class='not_pet_question text-center'><h4>Finish you Test.</h4></div>";
        }else{
            $html .="<div class='not_pet_question text-center'><h4>Nothing Found</h4></div>";
        }
        return $html;
    }

    public function not_pet_questions_answer(Request $request){

        $wrong_ans_css = 'style="background: #ffa6a6;"';
        $correct_ans_css = 'style="background: #81bc41;"';
        $is_correct = 0;
        $points = $request->points;
        $progress = $request->progress;
        $current_id = $request->id;

        $seleted_option = $request->key;
        $attempt = $request->attempt;
        $today = date("Y-m-d"); 
        $total = NotPetQuestion::where('status', 1)->whereDate('published', '<', now())->whereDate('expire_at', '>=', now())->count();
        
        $data = NotPetQuestion::where('id', $current_id)->orWhere('id', '>', $current_id)->where('status', 1)->whereDate('published', '<', now())->whereDate('expire_at', '>=', now())->orderBy('id', 'asc')->first(); 
        
        $answer = $data->answer;
        if($answer == $seleted_option){ $is_correct = 1; $points = $points + $data->reward; $progress = round(100* $attempt/$total);}

        $html = '';
        if($data != ''){
            $html .='<div class="not_pet_question text-center"><h4>'.$data->question.'</h4></div>';

            $html .='<ul>';

            foreach (json_decode($data->option) as $key => $value) {
                $correct_ans_css = '';
                $wrong_ans_css = '';
                $active = '';

                if($key == 0){$active = 'active';}
                if($key == $seleted_option){ $wrong_ans_css = 'style="background: #ffa6a6;"'; }
                if($key == $seleted_option){ $wrong_ans_css = 'style="background: #ffa6a6;"'; }
                if($key == $answer){ $correct_ans_css = 'style="background: #81bc41;"'; }

                $html .='<li class="optionfcs items-'.$key.'"'.$correct_ans_css.$wrong_ans_css.'>'.$value.'
                </li>';
            }

            $html .='</ul>';
        }else{
            $html .="<div class='not_pet_question text-center'><h4>Nothing Found</h4></div>";
        }

        $next_id = dsld_next_model_id('App\Models\NotPetQuestion', $request->id);
        if(!is_null($next_id)){
            return response()->json(array('is_correct' => $is_correct, 'points' => $points, 'current_id'=> $next_id, 'progress' => $progress, 'data' => $html ));
        }else{
            return response()->json(array('is_correct' => $is_correct, 'points' => $points, 'current_id'=> 'finish', 'progress' => $progress, 'data' => $html ));
        }
        
    }
}
