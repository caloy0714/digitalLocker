@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card" >
        <div class="card-header text-center" >
        <h3>Locker {{ $locker->getId() }}</h3>
</div>
         <div class="card-body fs-5 font-monospace">
            <form action="/show-locker/{id}" method="POST">
                <input type="hidden" name="id" value="{{ $locker->getId() }}" />
                @csrf
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
</br>
                <a href="/lockers"><button type="button" class="btn btn-secondary">
                    <i class="fas fa-arrow-circle-left"></i> &nbsp;Back</button>
                </a>
               
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
