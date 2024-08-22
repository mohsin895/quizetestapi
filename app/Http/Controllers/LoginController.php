<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Staff;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;

class LoginController extends Controller
{

	public function signup(Request $request)
	{
		DB::beginTransaction();
        try{

            $isCustomerExist=Employee::Where('email',trim($request->userName))->first();

            if(empty($isCustomerExist)){
                
                    $dataInfo=new Employee();

                    $dataInfo->fName=$request->fName;
					$dataInfo->lName=$request->lName;
                    $dataInfo->email=$request->userName;

                    $dataInfo->password=Hash::make($request->password);

                    $dataInfo->status=1;

                    $dataInfo->created_at=Carbon::now();

                    if($dataInfo->save()){
                        
                        DB::commit();

                        $responseData=[
                                'errMsgFlag'=>false,
                                'msgFlag'=>true,
                                'msg'=>'Your Information Recored Successfully.',
                                'errMsg'=>null,
                            ];

                        return response()->json($responseData,200);

                    }
                    else{
                            DB::rollBack();

                            $responseData=[
                                            'errMsgFlag'=>true,
                                            'msgFlag'=>false,
                                            'msg'=>null,
                                            'errMsg'=>'Failed To Add Customer Infomation.',
                                        ];

                            return response()->json($responseData,200);
                    }

            }
            else{
                    DB::rollBack();

                    $responseData=[
                            'errMsgFlag'=>true,
                            'msgFlag'=>false,
                            'msg'=>null,
                            'errMsg'=>'Customer Already Registered.',
                        ];

                    return response()->json($responseData,200);
            }
        }
        catch(\Exception $err){

            DB::rollBack();
            
          
            
            DB::commit();
			$errorMessage = $err->getMessage();
            $responseData=[
                        'errMsgFlag'=>true,
                        'msgFlag'=>false,
                        'msg'=>null,
						'errorMessage' => $errorMessage,
                        'errMsg'=>'Something Went Wrong.Please Try Again.',
            ];

            return response()->json($responseData,200);
        }
	}
	
    public function login(Request $request){
       

        if(is_numeric($request->userName))
        $employeeData =['phone'=>$request->userName,'password'=>$request->password];
    else
       $employeeData=['email'=>$request->userName,'password'=>$request->password];

       $staffInfo = Staff::where('email',$request->userName)
       ->orWhere('phone', strtolower(trim($request->userName)))
       ->where('status', '!=',0)
       ->first();
       $employeeInfo = Employee::where('email',$request->userName)
       ->orWhere('phone', strtolower(trim($request->userName)))
       ->where('status', '!=',0)
       ->first();
       if($request->dataId == 1){
        if(!empty(($employeeInfo))){
            if($employeeInfo->status == 'active'){
               if(Hash::check($request->password,$employeeInfo->password)){
                   if(Auth::guard('employee')->attempt($employeeData)){

                       $token = $employeeInfo->createToken(uniqid())->accessToken;
   

       return response()->json([
           'status' => true,
           'token_type' => 'bearer',
           'token' => $token,
           'message' => 'Login successfully'
       ]);
                      
                      }
               }else{
                   $responseData=[
                       'errMsgFlag'=>true,
                       'msgFlag'=>false,
                       'msg'=>null,
                       'errMsg'=>'UserName or Password is wrong. Please try again !'

                   ];
                  
               }

            }else{
               
               $responseData=[
                   'errMsgFlag'=>true,
                   'msgFlag'=>false,
                   'msg'=>null,
                   'errMsg'=>'Faild To Login'

               ];
               
            }
   
          }else{
        
           $responseData=[
               'errMsgFlag'=>true,
               'msgFlag'=>false,
               'msg'=>null,
               'errMsg'=>'Ussrname or Password Wrong . Please try again.',
           ];
          
          }

       }else{
        if(!empty(($staffInfo))){
            if($staffInfo->status ==1){
               if(Hash::check($request->password,$staffInfo->password)){
                   if(Auth::guard('staff')->attempt($employeeData)){

                       $token = $staffInfo->createToken(uniqid())->accessToken;
   

       return response()->json([
           'status' => true,
           'token_type' => 'bearer',
           'token' => $token,
           'message' => 'Login successfully'
       ]);
                      
                      }
               }else{
                   $responseData=[
                       'errMsgFlag'=>true,
                       'msgFlag'=>false,
                       'msg'=>null,
                       'errMsg'=>'UserName or Password is wrong. Please try again !'

                   ];
                  
               }

            }else{
               
               $responseData=[
                   'errMsgFlag'=>true,
                   'msgFlag'=>false,
                   'msg'=>null,
                   'errMsg'=>'Faild To Login'

               ];
               
            }
   
          }else{
        
           $responseData=[
               'errMsgFlag'=>true,
               'msgFlag'=>false,
               'msg'=>null,
               'errMsg'=>'Ussrname or Password Wrong . Please try again.',
           ];
          
          }
       }
     
       return response()->json($responseData, 200);
   
  
}

public function updatePassword(Request $request){
    $dataInfo=Employee::find(Auth::guard('employee-api')->user()->id);

    if(!empty($dataInfo)) {

        

            if($request->password==$request->conPassword){

                $dataInfo->password=Hash::make($request->password);

                $dataInfo->updated_at=Carbon::now();

                if($dataInfo->save()){
                    $responseData=[
                        'errMsgFlag'=>false,
                        'msgFlag'=>true,
                        'msg'=>'Password Changed Successfully.',
                        'errMsg'=>null,
                    ];
                }
                else{
                    $responseData=[
                        'errMsgFlag'=>true,
                        'msgFlag'=>false,
                        'msg'=>null,
                        'errMsg'=>"Failed To Change Password.Please Try Again.",
                    ];
                }
            }
            else{
                $responseData=[
                    'errMsgFlag'=>true,
                    'msgFlag'=>false,
                    'msg'=>null,
                    'errMsg'=>"Confirm Password Doesn't Match",
                ];
            }
        
        
    }
    else{
        $responseData=[
                    'errMsgFlag'=>true,
                    'msgFlag'=>false,
                    'msg'=>null,
                    'errMsg'=>'Requested User Information Not Found.',
                ];
    }

    return response()->json($responseData,200);
}

	public function logout()
{
    Auth::guard('staff')->logout();

    return response()->json(['message' => 'Logout successful'], 200);
}
}
