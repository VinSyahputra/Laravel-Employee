@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <a href="/employees" class="btn btn-secondary">back to employees</a>
                <div class="card mt-4">
                    <div class="card-header d-flex align-items-center"><h3>{{__('Edit Employee') }}</h3></div>
                    <form action="/employees/{{ $employee->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="your name" value="{{ $employee->name }}" name="name">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ $employee->email }}" name="email">
                                @error('email')
                                {{ $message }}
                            @enderror
                            </div>
                            <select class="form-select mb-4" name="company_id">
                                <option selected>Select Company</option>
                                @foreach ($companies as $company)
                                    @if ($employee->company->id == $company->id) 
                                        <option value="{{ $company->id }}" selected>{{ $company->name }}</option> 
                                    @else    
                                        <option value="{{ $company->id }}">{{ $company->name }}</option> 
                                    @endif
                                @endforeach
                            </select>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection