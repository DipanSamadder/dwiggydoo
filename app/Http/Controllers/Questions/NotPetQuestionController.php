<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NotPetQuestion;
use Illuminate\Support\Str;
use Auth;
use Validator;
class NotPetQuestionController extends Controller
{ 
    
    
    function __construct(){
       
    $this->middleware('permission:show questions|add questions|edit questions|delete questions', ['only' => ['index','get_ajax_roles']]);
    $this->middleware('permission:add questions', ['only' => ['create','store']]);
    $this->middleware('permission:edit questions', ['only' => ['edit','update']]);
    $this->middleware('permission:delete questions', ['only' => ['destroy']]);
    
    }
    public function index(){

        $page['title'] = 'Show all Question';
        $page['name'] = 'Question';
        return view('backend.modules.questions.not-pet.show', compact('page'));
    }

    
    public function get_ajax_not_questions(Request $request){
        if($request->page != 1){$start = $request->page * 25;}else{$start = 0;}
        $search = $request->search;
        $sort = $request->sort;

        $data = NotPetQuestion::where('question','!=','');
        if($search != ''){
            $data->where('question', 'like', '%'.$search.'%');
        }
       
        if($sort != ''){
            switch ($request->sort) {
                case 'newest':
                    $data->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $data->orderBy('created_at', 'asc');
                    break;
                case 'active':
                    $data->where('status', 1);
                    break;
                case 'deactive':
                    $data->where('status', 0);
                    break;
                default:
                    $data->orderBy('created_at', 'desc');
                    break;
            }
        }
        $data = $data->skip($start)->paginate(25);
        return view('backend.modules.questions.not-pet.ajax_files', compact('data'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:50',
            'option' => 'required',
            'answer' => 'required',
            'published' => 'required',
            'expire_at' => 'required',
        ]);

        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

        if(NotPetQuestion::where('question', 'like', '%'.$request->question)->first() == null){

            $question = new NotPetQuestion;
            $question->option = json_encode($request->option, JSON_FORCE_OBJECT);
            $question->question = $request->question;
            $question->answer = $request->answer;
            $question->expire_at = $request->expire_at;
            $question->published = $request->published;
            $question->reward = 5;
            $question->status = 1;
            if($question->save()){
                return response()->json(['status' => 'success', 'message'=> 'Data insert success.']);
            }else{
                return response()->json(['status' => 'error', 'message'=> 'Data insert failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message'=> 'Details already exist! please try agin.']);
        }
    }

    

    public function edit(Request $request)
    {
        $data = NotPetQuestion::findOrFail($request->id);
        return view('backend.modules.questions.not-pet.edit', compact('data'));
    }


    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:50',
            'option' => 'required',
            'answer' => 'required',
            'published' => 'required',
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }
     
        if(NotPetQuestion::whereNotIn('id', [$request->id])->where('question', $request->question)->first() == null){
            $question =  NotPetQuestion::findOrFail($request->id);
            $question->option = json_encode($request->option, JSON_FORCE_OBJECT);
            $question->question = $request->question;
            $question->answer = $request->answer;
            $question->expire_at = $request->expire_at;
            $question->published = $request->published;
            $question->status = $request->status;
            if($question->save()){   
                return response()->json(['status' => 'success', 'message'=> 'Data update success.']);
            }else{
                return response()->json(['status' => 'error', 'message'=> 'Data update failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message'=> 'Details already exist! please try agin.']);
        }

    }
    public function destory(Request $request){

        $questions = NotPetQuestion::findOrFail($request->id);
        if($questions != ''){
            if($questions->delete()){
                return response()->json(['status' => 'success', 'message' => 'Data deleted successully.']);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Data deleted failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
       
    }

    public function status(Request $request){

        $question = NotPetQuestion::findOrFail($request->id);
        if($question != ''){
            if($question->status != $request->status){
                $question->status = $request->status;
                $question->save();
                return response()->json(['status' => 'success', 'message' => 'Status update successully.']);
            }else{
                return response()->json(['status' => 'error', 'message' => 'Status update failed.']);
            }
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
       
    }

}
