<?php

namespace App\Http\Controllers;

use App\Models\CurrectAnswer;
use App\Models\Question;
use App\Models\QuestionAttributes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ApiResponseHelper;
class QuestionController extends Controller
{
    public function index(Request $request){
   
        $dataList = Question::with(['questionInfo', 'answerInfo.questionAttributeInfo'])->where('quize_details_id',$request->dataId)->get();
      return response()->json($dataList);

   
   }
  


   public function dataInfoAddOrUpdate(Request $request){
    try{
        DB::beginTransaction();

         $dataInfo = Question::find($request->questinId);
         if(empty($dataInfo)){
            $dataInfo =new Question();
            $dataInfo->question_name = $request->questionName;
            $dataInfo->question_marks = $request->marks;
            $dataInfo->quize_details_id = $request->quizeDetailsId;
            $dataInfo->save();
            if($dataInfo->save()){
                if ($request->has('numbers') && is_array($request->numbers)) {
                    foreach ($request->numbers as $index => $number) {
                        $option = $request->options[$index] ?? null; // Check if the option exists for the current index
                        if (!empty($option)) {
                            $questionAttribute = new QuestionAttributes();
                            $questionAttribute->question_id = $dataInfo->id;
                            $questionAttribute->question_option = $option;
                            $questionAttribute->question_number = $number;
                            $questionAttribute->save();
                        }
                    }
                }
         
                if ($request->has('answers') && is_array($request->answers)) {
                    $filteredAnswers = array_filter($request->answers, function($answer) {
                        return !empty($answer);
                    });
                
                    $countAnswer = count($filteredAnswers);
                    foreach ($request->answers as $answer) {
                        if (!empty($answer)) {
                            $attribute =QuestionAttributes::where('question_id',$dataInfo->id)->where('question_number', $answer)->first();

                            $correctAnswer = new CurrectAnswer();
                            $correctAnswer->question_id = $dataInfo->id;
                            $correctAnswer->attribute_id = $attribute->id;
                            $correctAnswer->answer = $answer; 
                            $correctAnswer->marks = $request->marks/$countAnswer;
                            $correctAnswer->save();
                        }
                    }
                }        
                DB::commit();
                    return ApiResponseHelper::formatSuccessResponseInsert();
            }else{

                DB::commit();
                return ApiResponseHelper::formatFailedResponseInsert();
            }
           

         }else{
               $dataInfo = Question::find($request->questinId);
               $dataInfo->question_name = $request->questionName;
               $dataInfo->question_marks = $request->marks;
               $dataInfo->quize_details_id = $request->quizeDetailsId;
               $dataInfo->save();
          
               if($dataInfo->save()){
               
                if ($request->has('numbers') && is_array($request->numbers)) {
                    foreach ($request->numbers as $index => $number) {
                        $optionId = $request->optionId[$index] ?? null; // Get the optionId if it exists
                        $option = $request->options[$index] ?? null;   // Get the option if it exists
                
                        if ($optionId) {
                            // Update the existing record if optionId is found
                            QuestionAttributes::where('id', $optionId)
                                ->update([
                                    'question_number' => $number,
                                    'question_option' => $option,
                                    'question_id' => $dataInfo->id,
                                ]);
                        } else {
                            // Insert a new record if optionId is not found
                            QuestionAttributes::create([
                                'question_number' => $number,
                                'question_id' => $dataInfo->id,
                                'question_option' => $option,
                            ]);
                        }
                    }
                }
                

                if ($request->has('answers') && is_array($request->answers)) {
                    $filteredAnswers = array_filter($request->answers, function($answer) {
                        return !empty($answer);
                    });
                
                    $countAnswer = count($filteredAnswers);
                    foreach ($request->answers as $index => $answer) {
                        if (!empty($answer)) {
                            $attribute = QuestionAttributes::where('question_id', $dataInfo->id)
                                        ->where('question_number', $request->numbers[$index])
                                        ->first();
                
                            if ($attribute) {
                                $correctAnswer = CurrectAnswer::where('question_id', $dataInfo->id)
                                                ->where('attribute_id', $attribute->id)
                                                ->first();
                
                                if ($correctAnswer) {
                                    // Update the existing correct answer
                                    $correctAnswer->update([
                                        'marks' => $request->marks / $countAnswer,
                                        'answer' => $answer,
                                    ]);
                                } else {
                                    // Create a new correct answer
                                    CurrectAnswer::create([
                                        'question_id' => $dataInfo->id,
                                        'attribute_id' => $attribute->id,
                                        'answer' => $answer,
                                        'marks' => $request->marks / $countAnswer,
                                    ]);
                                }
                            }
                        }
                    }
                }
                
                DB::commit();
                return ApiResponseHelper::formatSuccessResponseUpdate();
               }else{
   
                DB::commit();
                return ApiResponseHelper::formatFailedResponseUpdate();
               }
              
   
         }
     
         
           

      


    }catch(\Exception $err){
        DB::rollBack();
        return ApiResponseHelper::formatErrorResponse($err);
    }
   }

   public function dataInfoDelete(Request $request){
    try{
        DB::beginTransaction();

        $dataInfo = Question::find($request->dataId);
        $currectAnswer = CurrectAnswer::where('question_id',$request->dataId)->get();
        foreach($currectAnswer as $answer){
            $answer->delete();
        }

        if(empty($dataInfo)){
            return ApiResponseHelper::formatDataNotFound();
        }

       

        if($dataInfo->delete()){
            DB::commit();
            return ApiResponseHelper::formatSuccessResponseDelete();
        } else {
            DB::rollBack();
            return ApiResponseHelper::formatFailedResponseDelete();   
             }
    } catch(\Exception $err){
     
        DB::rollBack();
        return ApiResponseHelper::formatErrorResponse($err);
    }
}

public function deleteDesignation(Request $request){
    try{
        DB::beginTransaction();

        $dataInfo = QuestionAttributes::find($request->dataId);

        if(empty($dataInfo)){
            return ApiResponseHelper::formatDataNotFound();
        }

       
        if($dataInfo->delete()){
            DB::commit();
                return ApiResponseHelper::formatSuccessResponseUpdate();
        } else {
            DB::rollBack();
            return ApiResponseHelper::formatFailedResponseDelete();  
        }
    } catch(\Exception $err){
        DB::rollBack();
            return ApiResponseHelper::formatErrorResponse($err);
    }
}
}
