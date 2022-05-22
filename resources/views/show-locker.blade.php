@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>View Record</h1>

            @include('errors.validation-errors')

            <form action="/save-edit-locker" method="POST">
                <input type="hidden" name="id" value="{{ $locker->getId() }}" />
                @csrf
                <div class="form-group">
                <div class="form-group">
                    <label>Website Name : </label>
                    {{ $locker->getWebsiteName() }}
                </div>
                <div class="form-group">
                    <label>Username : </label>
                    {{ $locker->getUsername() }}
                </div>
                <div class="form-group">
                    <label>Password : </label>
                    {{ $locker->getPassword() }}
                </div>
                <a href="/lockers"><button type="button" class="btn btn-secondary">
                    <i class="fas fa-arrow-circle-left"></i> &nbsp;Back</button></a>
               
            </form>
        </div>
    </div>
</div>


@endsection