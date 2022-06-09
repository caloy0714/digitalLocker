@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Add New Locker</h1>
                        </div>
            @include('errors.validation-errors')
            <div class="card-body  fs-5 font-monospace">
            <form action="/save-new-locker" method="POST">
                @csrf
                <div class="form-group">
                    <label>Website Name</label>
                    <input type="text" class="form-control" name="website_name" required>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="input_password" required>
                </div>
                </br>
                <a href="/lockers"><button type="button" class="btn btn-secondary">
                    <i class="fas fa-arrow-circle-left"></i> &nbsp;Back</button></a>
                <button type="submit" class="btn btn-primary">Create</button>
                
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
