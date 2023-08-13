<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        if ($students->count() > 0) {
            return response()->json(
                [
                    'status' => '200',
                    'students' => $students
                ],
                200
            );
        } else {
            return response()->json([
                'status' => '404',
                'message' => 'No Records Found.'
            ], 404);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|string',
            'course' => 'required|max:191|string',
            'email' => 'required|max:191|email',
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Student::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'course' => $request->input('course'),
                'phone' => $request->input('phone'),
            ]);
            if ($student) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Student Created Successfully.'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something Went Wrong!'
                ], 500);
            }
        }
    }
    public function show($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Student Found!'
            ], 404);
        }
    }
    public function edit($id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                'status' => 200,
                'student' => $student
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No Such Student Found!'
            ], 404);
        }
    }
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191|string',
            'course' => 'required|max:191|string',
            'email' => 'required|max:191|email',
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $student = Student::find($id);
            if ($student) {
                $student->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'course' => $request->input('course'),
                    'phone' => $request->input('phone'),
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Student Updated Successfully.'
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'No such Student Found!'
                ], 404);
            }
        }
    }
    public function delete($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Student Deleted Successfully.'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No such Student Found'
            ], 404);
        }
    }
}
