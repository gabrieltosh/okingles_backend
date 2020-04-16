<?php
Route::prefix('auth')->group(function () {
    // Below mention routes are public, user can access those without any restriction.
    // Create New User
    Route::post('register', 'DataRegister\UserController@HandleRegisterUser');
    // Login User
    Route::post('login', 'AuthController@HandleLogin');
    
    // Refresh the JWT Token
    Route::get('refresh', 'AuthController@HandleRefresh');
    
    // Below mention routes are available only for the authenticated users.
    Route::middleware('auth:api')->group(function () {
        // Get user info
        Route::get('user', 'DataRegister\UserController@HandleGetUser');
        // Logout user from application
        Route::post('logout', 'AuthController@HandleLogout');
    });
});
Route::middleware('auth:api')->prefix('panel')->namespace('DataRegister')->group(function(){
    Route::prefix('branchoffice')->group(function(){
        Route::post('create', 'BranchOfficeController@HandleCreateBranchOffice');
        Route::get('index', 'BranchOfficeController@HandleGetBranchOffice');
        Route::delete('delete/{id}', 'BranchOfficeController@HandleDeleteBranchOffice');
        Route::post('update', 'BranchOfficeController@HandleUpdateBranchOffice');
    });
    Route::prefix('module')->group(function(){
        Route::post('store', 'ModuleController@HandleStoreModule');
        Route::get('index', 'ModuleController@HandleGetModule');
        Route::delete('delete/{id}', 'ModuleController@HandleDeleteModule');
        Route::post('update', 'ModuleController@HandleUpdateModule');
        Route::get('select', 'ModuleController@HandleGetSelect');
    });
    Route::prefix('profile')->group(function(){
        Route::post('store', 'ProfileController@HandleStoreProfile');
        Route::get('index', 'ProfileController@HandleGetProfiles');
        Route::delete('delete/{id}', 'ProfileController@HandleDeleteProfile');
        Route::post('update', 'ProfileController@HandleUpdateProfile');
        Route::get('get/module/{id}', 'ProfileController@HandleGetProfileModule');
        Route::get('get/notmodule/{id}', 'ProfileController@HandleGetNotProfileModule');
        Route::post('post/module', 'ProfileController@HandlStoreProfileModule');
        Route::delete('delete/module/{id}', 'ProfileController@HandleDeleteProfileModule');
    });
    Route::prefix('user')->group(function(){
        Route::post('post/store','UserController@HandleRegisterUser');
        Route::post('post/upload','UserController@HandleUploadImage');
        Route::get('get/profile','UserController@HandleGetProfiles');
        Route::get('get/branch','UserController@HandleGetBranchOffice');
        Route::get('get/users','UserController@HandleGetUsers');
        Route::delete('delete/user/{id}','UserController@HandleDeleteUser');
        Route::get('get/status/{id}','UserController@HandleChangeStatus');
        Route::post('post/update/user','UserController@HandleUpdateUser');
    });
    Route::prefix('classroom')->group(function(){
        Route::post('post/classroom', 'ClassroomController@handleStoreClassroom');
        Route::get('get/classroom', 'ClassroomController@handleGetClassroom');
        Route::delete('delete/classroom/{id}', 'ClassroomController@handleDeleteClassroom');
        Route::post('update/classroom', 'ClassroomController@handleUpdateClassroom');
    });
    Route::prefix('lesson')->group(function(){
        Route::post('post/lesson', 'LessonController@handleStoreLesson');
        Route::get('get/lesson', 'LessonController@handleGetLesson');
        Route::delete('delete/lesson/{id}', 'LessonController@handleDeleteLesson');
        Route::post('update/lesson', 'LessonController@handleUpdateLesson');
    });
    Route::prefix('time')->group(function(){
        Route::post('post/time', 'TimeController@handleStoreTime');
        Route::get('get/time', 'TimeController@handleGetTime');
        Route::delete('delete/time/{id}', 'TimeController@handleDeleteTime');
        Route::post('update/time', 'TimeController@handleUpdateTime');
    });
    Route::prefix('week')->group(function(){
        Route::post('post/week', 'WeekController@handleStoreWeek');
        Route::get('get/week/{id}', 'WeekController@handleGetWeeks');
        Route::post('update/week', 'WeekController@handleUpdateWeek');
        Route::delete('delete/week/{id}', 'WeekController@handleDeleteWeek');
        Route::get('get/branchoffice', 'WeekController@handleGetBranchOffice');
    });
    Route::prefix('day')->group(function(){
        Route::get('get/days/{id}', 'DayController@handleGetDays');
        Route::get('change/day/{id}', 'DayController@handleChangeStatus');
    });
    Route::prefix('schedule')->group(function(){
        Route::get('get/classroom', 'ScheduleController@handleGetClassroom');
        Route::post('post/time', 'ScheduleController@handlePostTime');
        Route::post('store/schedule', 'ScheduleController@handleStoreSchedule');
        Route::post('get/times', 'ScheduleController@handleGetTimes');
        Route::delete('delete/schedule/{id}', 'ScheduleController@handleDeleteSchedule');
        Route::post('get/teachers', 'ScheduleController@handleGetTeacher');
        Route::post('update/schedule', 'ScheduleController@handleUpdateSchedule');
        Route::get('get/students/{schedule_id}', 'ScheduleController@handleGetStudents');
        Route::get('get/schedule/{schedule_id}', 'ScheduleController@handleSchedule');
        Route::post('update/lesson', 'ScheduleController@handleUpdateLesson');
        Route::delete('delete/student/{id}', 'ScheduleController@handleRemoveStudent');
        Route::get('get/student', 'ScheduleController@handleGetSelectStudents');
    });
});
Route::middleware('auth:api')->namespace('Process')->group(function(){
    Route::prefix('panel')->group(function(){
        Route::get('get/modules/{id}','PanelController@HandleGetModules');
    });
    Route::prefix('student')->group(function(){
        Route::get('get/days/{id}', 'StudentScheduleController@handleGetDays');
        Route::post('get/schedule', 'StudentScheduleController@handleGetSchedule');
        Route::get('get/lessons', 'StudentScheduleController@handleGetLessons');
        Route::post('get/assignment', 'StudentScheduleController@handleStoreAssignment');
    });
});

Route::get('prueba','Process\PanelController@prueba');