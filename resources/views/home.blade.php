@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <th>ID</th>
                                <th>name</th>
                                <th>email</th>
                            </thead>
                            <tbody>
                                @foreach ($usersList as $user)
                                    <tr id="{{$user->id}}">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
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
<script type="text/javascript">
$(document).ready(function() {
    // 行をクリックしたら
    $('tr').click(function(event) {
//        alert($(this).attr('id'));
        location.href = "/user?id=" + $(this).attr('id');
    });
});
</script>
    
@endsection
