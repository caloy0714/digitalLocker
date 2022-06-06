@extends('layouts.app')
@section('content')
<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card" >
        <div class="card-header text-center" >
        <h3>Note #{{ $reminder->getId() }}</h3>
</div>
         <div class="card-body fs-5 font-monospace">
            <form action="/show-notes/{id}" method="POST">
                <input type="hidden" name="id" value="{{ $reminder->getId() }}" />
                @csrf
                <div class="form-group">
                    {{ $reminder->getNoteContent() }}
                </div>

</br>
                <a href="/notes-home"><button type="button" class="btn btn-secondary">
                    <i class="fas fa-arrow-circle-left"></i> &nbsp;Back</button>
                </a>
               
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
