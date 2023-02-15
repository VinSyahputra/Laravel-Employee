@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body py-5">
                   <h2 class="text-center mb-3">SELAMAT DATANG {{ strtoupper(auth()->user()->name) }}</h2>
                   <div class="row justify-content-center gap-2">
                        <a href="/companies" class="text-decoration-none text-white col-md-5">
                            <div class="text-center p-4 bg-primary">COMPANY</div>
                        </a>
                                            
                        <a href="/employees" class="text-decoration-none text-white col-md-5">
                            <div class="text-center p-4 bg-success">EMPLOYEE</div>
                        </a>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
