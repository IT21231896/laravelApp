<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('libraries.styles')
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')
    
    <!-- Page Heading -->
    @isset($header)
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endisset
    
    <!-- Page Content -->
    <main>
        <div class="container">
            
            <h3 align="center" class="mt-5">Employee Management</h3>
            
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    
                    <div class="form-area">
                        <form method="POST" action="{{ route('employee.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Employee Name</label>
                                    <input type="text" class="form-control" name="emp_name">
                                </div>
                                <div class="col-md-6">
                                    <label>Employee DOB</label>
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
                                <div class="col-md-12 mt-3">
                                    <input type="submit" class="btn btn-primary" value="Register">
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    
                    <table class="table mt-5">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        @foreach ($employees as $key => $employee)
                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $employee->emp_name }}</td>
                            <td scope="col">{{ $employee->dob }}</td>
                            <td scope="col">{{ $employee->phone }}</td>
                            <td scope="col">
                                
                                <a href="{{ route('employee.edit', $employee->id) }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </button>
                                </a>
                                
                                <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" style="display:inline">
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
    
    </main>
</div>
</body>
</html>
