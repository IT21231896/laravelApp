<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function index()
    {
        $response['students'] = Student::all(); // Use Student model directly
        return view('pages.index')->with($response); // Assuming the view name is 'students.index'
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'dob' => 'required|date',
            'phone' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,jpeg,webp', // Assuming image field is optional and limited to 2MB
            'status' => 'required|in:active,inactive',
        ]);

        // Upload image if provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = 'uploads/category/';
            $file->move($path, $filename);
            $imagePath = $path . $filename; // Define $imagePath here
        } else {
            $imagePath = null; // Handle case when image is not provided
        }

        // Create student
        $this->student->create([
            'name' => $request->name,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Student created successfully.');
    }

    public function edit($id)
    {
        $response['student'] = $this->student->find($id);
        return view('pages.edit')->with($response); // Assuming the view name is 'pages.editstd'
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string',
        'dob' => 'required|date',
        'phone' => 'nullable|string',
        'image' => 'nullable|mimes:png,jpg,jpeg,webp', // Assuming image field is optional and limited to 2MB
        'status' => 'required|in:active,inactive',
    ]);

    $student = Student::findOrFail($id);

    if($request->hasFile('image') && $request->file('image')->isValid()) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $path = 'uploads/category/';
        $file->move($path, $filename);

        // Delete previous image if exists
        if(File::exists($student->image)) {
            File::delete($student->image);
        }

        $imagePath = $path . $filename;
    } else {
        $imagePath = $student->image; // Keep the existing image path
    }

    $student->update([
        'name' => $request->name,
        'dob' => $request->dob,
        'phone' => $request->phone,
        'image' => $imagePath,
        'status' => $request->status,
    ]);
    
    return redirect('student')->with('success', 'Student updated successfully.');
}


    public function destroy($id)
    {
        $student = $this->student->find($id);
        $student->delete();
        return redirect('student');
    }
}
