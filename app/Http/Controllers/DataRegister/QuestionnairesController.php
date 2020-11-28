<?php

namespace App\Http\Controllers\DataRegister;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Questionnaire;
use App\Question;
use App\Options;
use App\AnswerValid;
use Carbon\Traits\Options as TraitsOptions;
use Facade\FlareClient\Http\Response as HttpResponse;
use Response;
class QuestionnairesController extends Controller
{
    public function handleGetQuestionnaires(){
        return Response::json(Questionnaire::all());
    }
    public function handleStoreQuestionnaries(Request $request){
        Questionnaire::create($request->all());
    }
    public function handleDeleteQuestionnaries(Request $request){
        Questionnaire::findOrFail($request->id)->delete();
    }
    public function handleStoreQuestion(Request $request){
        Question::create([
            'questionnaire_id'=>$request->questionnaire_id,
            'question'=>$request->question,
            'type'=>$request->type,
            'order_by'=>$request->order_by,
            'file'=>$request->file,
            'description'=>$request->description,
            'status'=>'enable'
        ]);
    }
    public function handleUploadFile(Request $request){
        $name=uniqid('file_').str_replace(' ', '', $request->file->getClientOriginalName());
        $request->file->storeAs('question',  $name);
        return $name;
    }
    public function handleGetQuestions(Request $request){
        return Response::json(Question::where('questionnaire_id',$request->questionnaire_id)->orderBy('order_by')->get());
    }
    public function handleDeleteQuestion(Request $request){
        AnswerValid::where('question_id',$request->id)->delete();
        Options::where('question_id',$request->id)->delete();
        Question::findOrFail($request->id)->delete();
    }
    public function handleUpdateQuestion(Request $request){
        Question::findOrFail($request->id)->fill([
            'question'=>$request->question,
            'order_by'=>$request->order_by,
            'description'=>$request->description,
        ])->save();
    }
    public function handleGetProperty(Request $request){
        return Response::json(Options::where('question_id',$request->question_id)->get());
    }
    public function handleStoreOptions(Request $request){
        $count=0;
        foreach ($request as $key => $value) {
            if(isset($request[$count]))
            {
                Options::create([
                    'question_id'=> $request[$count]['question_id'],
                    'option'=>$request[$count]['value']
                ]);
                $count++;
            }
        }
    }
    public function handleRemoveOption(Request $request){
        Options::findOrFail($request->id)->delete();
    }
    public function handleGetAnswers(Request $request){
        return Response::json(AnswerValid::where('question_id',$request->question_id)->get());
    }
    public function handleStoreAnswers(Request $request){
        $count=0;
        foreach ($request as $key => $value) {
            if(isset($request[$count]))
            {
                AnswerValid::create([
                    'question_id'=> $request[$count]['question_id'],
                    'answer'=>$request[$count]['value']
                ]);
                $count++;
            }
        }
    }
    public function handleStoreAnswer(Request $request){
        AnswerValid::create([
            'question_id'=> $request->question_id,
            'answer'=>$request->answer
        ]);
    }
    public function handleStoreOptionYesNot(Request $request){
        Options::create([
            'question_id'=> $request->question_id,
            'option'=>'yes:'.$request->yes
        ]);
        Options::create([
            'question_id'=> $request->question_id,
            'option'=>'not:'.$request->not
        ]);
    }
    public function handleStoreOptionRange(Request $request){
        Options::create([
            'question_id'=> $request->question_id,
            'option'=>'range:'.$request->range
        ]);
    }
    public function handleRemoveAnswer(Request $request){
        AnswerValid::findOrFail($request->id)->delete();
    }
    public function handleGetQuestionPreview(Request $request){
        return Response::json(Question::where('questionnaire_id',$request->id)->with('options','answer_valid')->orderBy('order_by','asc')->get());
    }
}
