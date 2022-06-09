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


    <table class="table" id="lockers-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Date Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $locker)
                <tr>
                <td> {{ $locker->getId() }} </td>
                <td> {{ $locker->getName() }} </td>
                <td> {{ $locker->getEmail() }} </td>
                <td> {{ $locker->getPassword() }} </td>
                <td> {{ $locker->getCreated() }} </td>
                
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
