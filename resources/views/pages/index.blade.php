<x-app-layout>
    <div class="py-1">
        <div class="container">
            <div class="text-center">
                <h3 class="mt-5 text-2xl font-extrabold text-gray-900 sm:text-4xl mb-10">Manage Your Students Details</h3>
            </div>
            
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="form-area">
                        <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Student Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-md-6">
                                    <label>Student DOB</label>
                                    <input type="date" class="form-control" name="dob">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
             
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">In Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <input type="submit" class="btn btn-primary" value="Register">
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table mt-5">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">DOB</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Is Active</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $student)
                            <tr>
                                <td scope="col">{{ ++$key }}</td>
                                <td scope="col">{{ $student->name }}</td>
                                <td scope="col">{{ $student->dob }}</td>
                                <td scope="col">{{ $student->phone }}</td>
                                <td scope="col">{{ $student->status }}</td>
                                <td scope="col">
                                    <img src="{{ asset($student->image) }}" style="width: 70px; height:70px;" alt="Img" />
                                </td>
                                <td scope="col">
                                    <a href="{{ route('student.edit', $student->id) }}">
                                        <button class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                        </button>
                                    </a>
                                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
