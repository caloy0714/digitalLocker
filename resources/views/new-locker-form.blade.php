@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Add New Locker</h1>

            @include('errors.validation-errors')

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
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="/lockers"><button type="button" class="btn btn-secondary">
                    <i class="fas fa-arrow-circle-left"></i> &nbsp;Back</button></a>
            </form>
        </div>
    </div>
</div>
@endsection
