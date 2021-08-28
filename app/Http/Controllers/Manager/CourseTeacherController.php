<?php

namespace App\Http\Controllers\Manager;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\CourseTeacherRequest;
use App\Models\User;
use App\Models\UserInfo;
use App\Services\GlobalService;
use Illuminate\Http\Request;

class CourseTeacherController extends Controller
{
    private $globalService;

    public function __construct(GlobalService $globalService)
    {
        $this->globalService = $globalService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserInfo::where('companyId', companyId())->with('user')->latest()->get();
        return view('manager.course.course-teachers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.course.course-teacher-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Manager\CourseTeacherRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseTeacherRequest $request)
    {
        try {
            $this->globalService->userStore($request,User::Manager);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param \App\Models\User $course_teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $course_teacher)
    {
        $user = UserInfo::where('userId',$course_teacher->id)->with('user')->first();
        return view('manager.course.course-teacher-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Manager\CourseTeacherRequest $request
     * @param \App\Models\User $course_teacher
     * @return \Illuminate\Http\Response
     */
    public function update(CourseTeacherRequest $request, User $course_teacher)
    {
        try {
            $this->globalService->userUpdate($request,$course_teacher->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $course_teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $course_teacher)
    {
        try {
            $this->globalService->userDestroy($course_teacher->id);
            return response(ResponseMessage::SuccessMessage);
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage);
        }
    }
}