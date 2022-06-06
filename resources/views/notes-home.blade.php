@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif

            @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('error') }}
            </div>
            @endif

<div class="card">
    <div class="card-body">
            <div>
                <a class="btn btn-primary btn-sm" href="/new-notes-form">Create <i class='fas fa-plus'></i></a>
            </div>
</br>
    <table class="table" id="lockers-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notebook as $reminder)
                <tr>
                <td> {{ $reminder->getId() }} </td>
                <td> {{ $reminder->getNoteContent() }} </td>
                
                <td>
                        <a class="btn btn-primary btn-sm" href=" /show-notes/{{ $reminder->getId() }}">
                        <i class="fas fa-eye"></i> Show
                        </a>
                        <a class="btn btn-info btn-sm" href="/edit-notes/{{ $reminder->getId() }}">
                        <i class="fa fa-edit"></i>  Edit
                        </a>
                        <a class="btn btn-danger btn-sm" onclick="return confirmDelete()" href="/delete-notes/{{ $reminder->getId() }}">
                        <i class="fa fa-trash"></i> Delete
                        </a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

<script>
    function showPw(id) {
        const field = document.getElementById(id);
        const eye = document.getElementById(`${id}-eye`);
        if(field.type == "text") {
            field.type = "password";
            eye.classList.remove("fa-eye-slash");
            eye.classList.add("fa-eye");
        } else {
            field.type = "text";
            eye.classList.add("fa-eye-slash");
            eye.classList.remove("fa-eye");
        }
    }
function confirmDelete() {
    var answer = confirm("Are you sure you want to remove this record? this cannot be undone");
    if (answer == true) {
        return true;
    }
    return false;
}

jQuery(document).ready( function () {
    jQuery('#lockers-table').DataTable();
});
</script>
@endsection
