<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return CourseResource::collection(Course::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'duration' => ['required', 'integer'],
        ]);

        return new CourseResource(Course::create($data));
    }

    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'duration' => ['required', 'integer'],
        ]);

        $course->update($data);

        return new CourseResource($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json();
    }
}
