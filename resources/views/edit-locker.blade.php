@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Friend Record</h1>

            @include('errors.validation-errors')

            <form action="/save-edit-locker" method="POST">
                <input type="hidden" name="id" value="{{ $locker->getId() }}" />
                @csrf
                <div class="form-group">
                    <label>Website Name</label>
                    <input type="text" class="form-control" name="website_name" value="{{ $locker-> getWebsiteName() }}">
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $locker->getUsername()}}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="input_password"  value="{{ $locker->getPassword() }}">
                </div>
                <a href="/lockers"><button type="button" class="btn btn-secondary">
                    <i class="fas fa-arrow-circle-left"></i> &nbsp;Back</button></a>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
</div>
@endsection
