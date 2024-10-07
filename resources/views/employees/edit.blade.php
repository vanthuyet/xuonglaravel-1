@extends('master')

@section('title')
    Cập nhật nhân viên
@endsection

@section('content')
    
    <h1>Cập nhật nhân viên</h1>

    @if (session()->has('success') && !session()->get('success'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
        
    @endif

    @if (session()->has('success') && session()->get('success'))
        <div class="alert alert-info">
            Thao tác thành công
        </div>
        
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mt-5">

        

        <form action="{{ route('employees.update', $employee)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name}}" placeholder="Nhập First Name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name}}" placeholder="Nhập Last Name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email}}" placeholder="Nhập Email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone}}" placeholder="Nhập số điện thoại">
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $employee->date_of_birth}}">
            </div>
            <div class="mb-3">
                <label for="hire_date" class="form-label">Hire Date</label>
                <input type="datetime-local" class="form-control" id="hire_date" name="hire_date" value="{{ $employee->hire_date}}">
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" value="{{ $employee->salary}}" placeholder="Nhập mức lương">
            </div>
            <div class="mb-3">
                <label for="is_active" class="form-label">Is Active</label>
                <input type="checkbox" class="form-checkbox" 
                @checked($employee->is_active)
                value="1" name="is_active" id="is_active">
            </div>
            <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <input type="number" class="form-control" id="department_id" name="department_id" value="{{ $employee->department_id}}" placeholder="Nhập mã phòng ban">
            </div>
            <div class="mb-3">
                <label for="manager_id" class="form-label">Manager ID</label>
                <input type="number" class="form-control" id="manager_id" name="manager_id" value="{{ $employee->manager_id}}" placeholder="Nhập mã người quản lý">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $employee->address}}" placeholder="Nhập địa chỉ">
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                @if ($employee->profile_picture)
                                <img src="{{ Storage::url($employee->profile_picture) }}" width="100px" alt="">
                            @endif
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
            <a class="btn btn-primary" href="{{ route('employees.index')}}"> Danh sách</a>
        </form>
    </div>

@endsection