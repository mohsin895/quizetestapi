<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'staff', 'as' => 'staff.', 'middleware' => 'StaffAuth'], function () {
	Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout']);

	Route::group(['prefix' => 'v1'], function () {

		Route::group(['prefix' => 'quize'], function () {
			Route::get('/get/list', [App\Http\Controllers\QuizeDetailsController::class, 'index']);
			Route::post('/insert/update', [App\Http\Controllers\QuizeDetailsController::class, 'dataInfoAddOrUpdate']);
			Route::post('/delete', [App\Http\Controllers\QuizeDetailsController::class, 'dataInfoDelete']);

		});

		Route::group(['prefix' => 'question'], function () {
			Route::get('/get/list', [App\Http\Controllers\QuestionController::class, 'index']);
			Route::post('/insert/update', [App\Http\Controllers\QuestionController::class, 'dataInfoAddOrUpdate']);
			Route::post('/delete', [App\Http\Controllers\QuestionController::class, 'dataInfoDelete']);

		});



	});


	
});



Route::post('staff/v1/login', [App\Http\Controllers\LoginController::class, 'login']);
Route::post('staff/v1/user/registration', [App\Http\Controllers\LoginController::class, 'signup']);

Route::group(['prefix' => 'employee', 'as' => 'employee.', 'middleware' => 'EmployeeAuth'], function () {
	Route::group(['prefix' => 'v1'], function () {


		Route::group(['prefix' => 'quize'], function () {
			Route::get('/get/list', [App\Http\Controllers\UserQuizeController::class, 'index']);
			Route::get('/answer/list', [App\Http\Controllers\UserQuizeController::class, 'answerList']);
			Route::get('/question/list', [App\Http\Controllers\UserQuizeController::class, 'questionList']);
			Route::post('/submit/answer', [App\Http\Controllers\UserQuizeController::class, 'questionAnswer']);

		});
		Route::group(['prefix' => 'erp'], function () {




		});
	});
});


//ERP
