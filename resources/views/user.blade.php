@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <label class="col-sm-2 control-label" for="username">ID：</label>
                <div class="col-sm-10">{{$user->id}}</div>
            </div>
            <div class="row">
                <label class="col-sm-2 control-label" for="mail">name：</label>
                <div class="col-sm-10">{{$user->name}}</div>
            </div>
            <div class="row">
                <label class="col-sm-2 control-label" for="age">email：</label>
                <div class="col-sm-10">{{$user->email}}</div>
            </div>
            <div class="row">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" name="button1" value="戻る" class="btn btn-primary btn-wide" onclick="history.back();" />
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
