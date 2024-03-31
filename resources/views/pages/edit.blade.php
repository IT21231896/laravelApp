<x-app-layout>
    <div class="py-12">
        <div class="container">

            <h3 align="center" class="mt-5">Student Management</h3>

            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">

                    <div class="form-area">
                        <form method="POST" action="{{ route('student.update', $student->id) }}">
                            @csrf
                            @method("PATCH")
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Student Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $student->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Student DOB</label>
                                    <input type="date" class="form-control" name="dob"
                                        value="{{ $student->dob }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ $student->phone }}">
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
                                        <option value="active" {{ $student->status == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="inactive" {{ $student->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
