@extends('master')

@section('title')
    Thông tin chi tiết nhân viên {{ $employee->first_name . $employee->last_name }}
@endsection

@section('content')
    <h1 class="mt-3 mb-3"> Thông tin chi tiết nhân viên {{ $employee->first_name ." ". $employee->last_name }}</h1>

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Tên trường</th>
                    <th scope="col">Thông tin</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employee->toArray() as $key => $value)
                    <tr class="">
                        <td scope="row">{{ strtoupper($key) }}</td>
                        <td>

                            @php
                                switch ($key) {
                                    case 'profile_picture':
                                        if ($value) {
                                            $url = Storage::url($value);

                                            echo "<img src='$url' width='100px' alt=''>";
                                        }

                                        break;

                                    case 'is_active':
                                        echo $value
                                            ? '<span class="badge bg-primary">YES</span>'
                                            : '<span class="badge bg-danger">NO</span>';

                                            break;

                                    default:
                                        echo $value;    
                                            
                                        break;
                                }
                            @endphp
                        </td>

                    </tr>
                @endforeach
            </tbody>
            
        </table>
        <a class="btn btn-primary mt-3 mb-3" href="{{ route('employees.index')}}"> Danh sách</a>
    </div>
@endsection
