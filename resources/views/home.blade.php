@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-uppercase">WELCOME  {{ Auth::user()->name }} !</div>
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
                    <h5 class="card-title">Special title treatment</h5>
                         <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        
                            <a href="/lockers" class="btn btn-primary">Create Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
