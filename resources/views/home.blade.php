@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-uppercase"><strong>WELCOME  {{ Auth::user()->name }} !</strong></div>
                <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <img src="/images/logo.png" class="rounded float-end">
                    <h5 class="card-title">We secure and make sure that your info is safe with us</h5>
                         <p class="card-text">
                             <ul>
                             <li>With supporting text below as a natural lead-in to additional content.</li>
                             <li>With supporting text below as a natural lead-in to additional content.</li>
                            </ul>
                         </p>
                            <a href="/lockers" class="btn btn-primary">Create Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
