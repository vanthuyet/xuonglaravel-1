@extends('master')

@section('title')
    Thêm mới nhân viên
@endsection

@section('content')

    <h1>Thêm mới nhân viên</h1>

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


        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}"
                    placeholder="Nhập First Name">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}"
                    placeholder="Nhập Last Name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    placeholder="Nhập Email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"
                    placeholder="Nhập số điện thoại">
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                    value="{{ old('date_of_birth') }}">
            </div>
            <div class="mb-3">
                <label for="hire_date" class="form-label">Hire Date</label>
                <input type="datetime-local" class="form-control" id="hire_date" name="hire_date"
                    value="{{ old('hire_date') }}">
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" value="{{ old('salary') }}"
                    placeholder="Nhập mức lương">
            </div>
            <div class="mb-3">
                <label for="is_active" class="form-label">Is Active</label>
                <input type="checkbox" class="form-checkbox" value="1" name="is_active" id="is_active">
            </div>
            <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <input type="number" class="form-control" id="department_id" name="department_id"
                    value="{{ old('department_id') }}" placeholder="Nhập mã phòng ban">
            </div>
            <div class="mb-3">
                <label for="manager_id" class="form-label">Manager ID</label>
                <input type="number" class="form-control" id="manager_id" name="manager_id"
                    value="{{ old('manager_id') }}" placeholder="Nhập mã người quản lý">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"
                    placeholder="Nhập địa chỉ">
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
            </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>

@endsection
