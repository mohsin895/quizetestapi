<?php

namespace App\Http\Controllers;

use App\Models\CurrectAnswer;
use App\Models\Question;
use App\Models\QuizeDetails;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ApiResponseHelper;
use Auth;
class UserQuizeController extends Controller
{
    
    public function index(Request $request){
   
        $dataList = QuizeDetails::with(['totalMarksInfo' => function($query) {
          $query->select('quize_details_id', \DB::raw('SUM(question_marks) as totalMarks'))
                ->groupBy('quize_details_id'); // Add this line
      },'totalMarksInfoStudent' => function($query) {
          $query->select('quize_details_id', \DB::raw('SUM(marks) as totalMarks'))
                ->groupBy('quize_details_id'); // Add this line
      }])
      ->orderBy('id','desc')->get();
        return response()->json($dataList);

   }

   public function questionList(Request $request){
    $dataList = QuizeDetails::with('questionInfo','questionInfo.answerInfo','questionInfo.answerInfo.questionAttributeInfo','questionInfo.questionOptionInfo','questionInfo.questionOptionInfo.optionAnserInfo')->where('id',$request->dataId)->first();
    return response()->json($dataList);    
   }

   public function questionAnswer(Request $request){
    $checkValue = UserAnswer::where('user_id',Auth::guard('employee-api')->user()->id)->where('option_id',$request->optionId)->first();
  if(!empty($checkValue )){
        $checkValue->delete();
        return response()->json(200); 
  }else{
    $currectAnswer = CurrectAnswer::where('attribute_id',$request->optionId)->where('answer',$request->answer)->count('id');
    $currectAnswerMarks = CurrectAnswer::where('attribute_id',$request->optionId)->where('answer',$request->answer)->first();
    $answer =new UserAnswer();
    $answer->user_id = Auth::guard('employee-api')->user()->id;
    $answer->question_id = $request->question;
    $answer->option_id = $request->optionId;
    $answer->answer = $request->answer;
    $answer->quize_details_id = $request->dataId;
    if($currectAnswer >0){
      $answer->currect_answer = 'yes';
      $answer->marks = $currectAnswerMarks->marks;
    }else{
      $answer->currect_answer = 'no';
      $answer->marks = 0;
    }
    
    $answer->save();
    if($answer->save()){
        return response()->json(200);  
    }
  }
  
   
   }
public function answerList(Request $request){
  
    $getAnserData= UserAnswer::where('user_id',Auth::guard('employee-api')->user()->id)->where('quize_details_id',$request->dataId)->sum('marks');
    $quizeList= QuizeDetails::where('id',$request->dataId)->first();

    $totalMarks =Question::where('quize_details_id',$quizeList->id)->sum('question_marks'); 
   
   $ResponseData =[
         'getAnserData'=>$getAnserData,
         'totalMarks'=>$totalMarks,
         
   ];
    return response()->json($ResponseData,200);
}
}
