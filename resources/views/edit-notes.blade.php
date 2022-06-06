@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header text-center" >
                    <h3>Edit Note#{{ $reminder->getId() }}</h3>
                 </div>
 @include('errors.validation-errors')
 <div class="card-body fs-4 font-monospace">
            <form action="/save-edit-notes" method="POST">
                <input type="hidden" name="id" value="{{ $reminder->getId() }}" />
                @csrf
                <div class="form-group">
                    <textarea id="txtArea" rows="10" cols="50" name="note" value="{{ $reminder-> getNoteContent() }}">
                    {{ $reminder->getNoteContent() }}
                   </textarea>
                </div>
</br>
                <a href="/notes-home"><button type="button" class="btn btn-secondary">
                    <i class="fas fa-arrow-circle-left"></i> &nbsp;Back</button></a>
                <button type="submit" class="btn btn-primary">Save Changes </button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection