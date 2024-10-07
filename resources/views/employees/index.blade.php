@extends('master')

@section('title')
    Danh sách
@endsection

@section('content')
    <h1>Danh sách nhân viên</h1>

    <a href="{{ route('employees.create')}}" class="btn btn-success mt-3 mb-3">Thêm mới</a>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Frist name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Hire date</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Address</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Is active</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $em)
                    <tr class="">
                        <td scope="row">{{ $em->id }}</td>
                        <td>{{ $em->frist_name }}</td>
                        <td>{{ $em->last_name }}</td>
                        <td>{{ $em->hire_date }}</td>
                        <td>{{ $em->salary }}</td>
                        <td>{{ $em->address }}</td>
                        <td>
                            @if ($em->profile_picture)
                                <img src="{{ Storage::url($em->profile_picture) }}" width="100px" alt="">
                            @endif

                        </td>
                        <td>
                            {{-- is active --}}
                            @if ($em->is_active)
                                <span class="badge bg-primary">YES</span>
                            @else
                                <span class="badge bg-danger">NO</span>
                            @endif
                        </td>

                        <td>{{ $em->created_at }}</td>
                        <td>{{ $em->updated_at }}</td>
                        <td>
                            <a href="{{ route('employees.show', $em)}}" class="btn btn-info">Show</a>
                            <a href="{{ route('employees.edit', $em) }}" class="btn btn-warning">Sửa</a>

                            <form action="{{ route('employees.destroy', $em)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button  class="btn btn-danger" onclick=" return confirm('Có chắc muốn xoá không')" >XM</button>
                            </form>

                            <form action="{{ route('employees.forceDestroy', $em)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-dark" onclick=" return confirm('Có chắc muốn xoá không')" >XC</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
