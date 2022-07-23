<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $students = Student::all(); //query read | eloquent ORM
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        Student::create([
            'NIM' => $request->nim,
            'name' => $request->nama,
            'email' => $request->email,
            'birthdate' => $request->tanggallahir,
            'addr' => $request->alamat,
            'gender' => $request->jeniskelamin
        ]); //query create | eloquent ORM

        return redirect('/student')->with('success', 'Hore, Data Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // return $request;
        Student::where('id', $student->id)->update([
            'NIM' => $request->nim,
            'name' => $request->nama,
            'email' => $request->email,
            'birthdate' => $request->tanggallahir,
            'addr' => $request->alamat,
            'gender' => $request->jeniskelamin
        ]);

        return redirect('/student')->with('success', 'Hore, Data Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy('id', $student->id); //query delete | eloquent ORM
        return redirect()->back()->with('success', 'Hore, Data Berhasil Dihapus !');
    }
}
