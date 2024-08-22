<?php

namespace App\Http\Controllers;

use App\Models\QuizeDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ApiResponseHelper;
use Auth;
class QuizeDetailsController extends Controller
{
    public function index(Request $request){
   
        $dataList = QuizeDetails::with(['totalMarksInfo' => function($query) {
            $query->select('quize_details_id', \DB::raw('SUM(question_marks) as totalMarks'))
                  ->groupBy('quize_details_id'); // Add this line
        }])
        ->where('staff_id',Auth::guard('staff-api')->user()->id)->orderBy('id','desc')->get();
      return response()->json($dataList);

   
   }
  
   public function dataInfoAddOrUpdate(Request $request){
    try{
        DB::beginTransaction();

         $dataInfo = QuizeDetails::find($request->dataId);
         if(empty($dataInfo)){
            $dataInfo =new QuizeDetails();
            $dataInfo->staff_id = Auth::guard('staff-api')->user()->id;
            $dataInfo->quize_name = $request->quizeName;
        
            $dataInfo->status = 2;
            $dataInfo->save();
            if($dataInfo->save()){
                
                DB::commit();
                    return ApiResponseHelper::formatSuccessResponseInsert();
            }else{

                DB::commit();
                return ApiResponseHelper::formatFailedResponseInsert();
            }
           

         }else{
               $dataInfo = QuizeDetails::find($request->dataId);
               $dataInfo->staff_id = Auth::guard('staff-api')->user()->id;
               $dataInfo->quize_name = $request->quizeName;
         
               $dataInfo->status = 2;
               $dataInfo->save();
               if($dataInfo->save()){
               
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

        $dataInfo = QuizeDetails::find($request->dataId);

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
}
