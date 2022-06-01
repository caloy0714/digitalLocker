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
    <div class="card-header text-align-center">
        History
    </div>
        <div class="card-body">
            <table class="table" id="lockers-table">
            <tbody>
                @foreach ($storage as $locker)
                <tr>
                <td>Locker #{{ $locker->getId() }} is created at {{ $locker->getCreated() }} </td>
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


jQuery(document).ready( function () {
    jQuery('#lockers-table').DataTable();
});
</script>
@endsection
