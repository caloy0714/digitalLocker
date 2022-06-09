@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                     <h1>Add New Notes</h1>
                </div>
            @include('errors.validation-errors')
            <div class="card-body">
            <form action="/save-new-note" method="POST">
                @csrf
                <div class="form-group">
                    <textarea id="txtArea" rows="10" cols="100" name="note" required>
                   </textarea>
                </div>
                <a href="/notes-home"><button type="button" class="btn btn-secondary">
                    <i class="fas fa-arrow-circle-left"></i> &nbsp;Back</button></a>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
