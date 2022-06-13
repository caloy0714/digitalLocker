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
    <table class="table" id="lockers-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date Created</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $locker)
                <tr>
                <td> {{ $locker->getId() }} </td>
                <td> {{ $locker->getName() }} </td>
                <td> {{ $locker->getEmail() }} </td>
                <td> {{ $locker->getCreated() }} </td>
                <td> {{ $locker->getRole() }} </td>
                
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>


<script>

jQuery(document).ready( function () {
    jQuery('#lockers-table').DataTable();
});
</script>
@endsection
