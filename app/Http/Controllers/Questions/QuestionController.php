<?php

namespace App\Http\Controllers\Questions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\QuestionsTask;
use App\Models\QuestionsType;
use Illuminate\Support\Str;
use Auth;
use DB;
use Validator;
class QuestionController extends Controller
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
        return view('backend.modules.questions.show', compact('page'));
    }

    
    public function get_ajax_questions(Request $request){
        if($request->page != 1){$start = $request->page * 25;}else{$start = 0;}
        $search = $request->search;
        $sort = $request->sort;

        $data = Question::where('question','!=','');
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
        return view('backend.modules.questions.ajax_files', compact('data'));
    }



    public function stores(Request $request){
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:50',
            'options' => 'required',
            'answer' => 'required',
            'published_date' => 'required',
            'type' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }

        if(Question::where('question', 'like', '%'.$request->question)->first() == null){

            $question = new Question;
            $question->options = json_encode($request->options, JSON_FORCE_OBJECT);
            $question->question = $request->question;
            $question->answer = $request->answer;
            $question->question_type = $request->type;
            $question->published_date = $request->published_date;
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
        $data = Question::findOrFail($request->id);
        return view('backend.modules.questions.edit', compact('data'));
    }


    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'question' => 'required|string|max:50',
            'options' => 'required',
            'answer' => 'required',
            'published_date' => 'required',
        ]);


        if($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->all()]);
        }
     
        if(Question::whereNotIn('id', [$request->id])->where('question', $request->question)->first() == null){
            $question =  Question::findOrFail($request->id);
            $question->options = json_encode($request->options, JSON_FORCE_OBJECT);
            $question->question = $request->question;
            $question->answer = $request->answer;
            $question->published_date = $request->published_date;
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
    
    public function questions_type(Request $request){
    	$data_type_used = Question::where('published_date', $request->date)->get();
		$type_use[] = "";

		if($data_type_used !=''){
			foreach($data_type_used as $value){
				array_push($type_use, $value->question_type);
			}

		}
		$array = QuestionsType::whereNotIn('id', $type_use)->get();

		foreach ($array as $key => $value) {
			$data[] = array('id'=> $value->id, 'name' => $value->name);
		}
		echo json_encode($data);
    }



    public function destory(Request $request){

        $questions = Question::findOrFail($request->id);
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

        $question = Question::findOrFail($request->id);
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

    public function task_approve(Request $request)
    {
        $page['title'] = 'Show all tasks';
        $page['name'] = 'tasks';
        return view('backend.modules.questions.show_tasks', compact('page'));
    }


       
    public function get_all_tasks(Request $request){
        QuestionsTask::where('is_view', 0)->update(['is_view' => 1]);
        if($request->page != 1){$start = $request->page * 25;}else{$start = 0;}
        $search = $request->search;
        $sort = $request->sort;

        $data = QuestionsTask::where('taskable_id','!=','');

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
        return view('backend.modules.questions.ajax_tasks_files', compact('data'));
    }





    public function task_approved(Request $request)
    {
        $task = QuestionsTask::findOrFail($request->id);
        $task->status = $request->status;
        if($task->save()){
            return response()->json(['status' => 'success', 'message' => 'Task approved.']);
        }else{
            return response()->json(['status' => 'warning', 'message' => 'Data Not found.']);
        }
        
    }
}
