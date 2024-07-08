<?php

namespace App\Http\Controllers;

use App\Models\Student; // Ganti dengan model Student yang sesuai
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        try {
            $students = Student::all();
            return response()->json([
                'status' => 'success',
                'data' => $students
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch data.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'umur' => 'required',
                'asal_sekolah' => 'required',
                'jenis_kelamin' => 'required',
                'foto'=> 'required'
            ]);

            $student = Student::create($validatedData);
            return response()->json($student, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to create data.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $student = Student::findOrFail($id);

        return response()->json($student, 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'nama' => 'required',
                'umur' => 'required',
                'asal_sekolah' => 'required',
                'jenis_kelamin' => 'required',
                'foto'=> 'required'
            ]);

            $student = Student::findOrFail($id);
            $student->update($validatedData);
            return response()->json($student, 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to update data.',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return response()->json(['message' => 'Data deleted successfully.'], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Failed to delete data.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
