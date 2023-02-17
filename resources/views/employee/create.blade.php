@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <a href="/employees" class="btn btn-secondary">back to employees</a>
                <div class="card mt-4">
                    <div class="card-header d-flex align-items-center"><h3>{{__('Add Employee') }}</h3></div>
                    <form action="/employees" method="post">
                        @csrf
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <label for="name" class="form-label">Employee Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="your name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                                @error('email')
                                {{ $message }}
                            @enderror
                            </div>
                            <select class="form-select mb-4" name="company_id" id="select_company">
                                <option selected>Select Company</option>
                            </select>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">CREATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '/getcompany',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(key, value) {
                        $('#select_company').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    </script>
@endsection