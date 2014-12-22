@extends('header')

@section('style')
<style>
    body{
        background-color: #ebcccc;
    }
</style>
@stop

@section('title')
微信活动展示后台登陆
@stop

@section('body')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div class="span4">
                    </div>
                    <div class="span4">
                    </div>
                    <div class="span4">
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span4">
                    </div>
                    <div class="span4">
                        <form class="form-horizontal" method="post" action="verify">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">用户名</label>
                                <div class="controls">
                                    <input id="inputEmail" type="text" name="username" style="height: inherit" />
                                </div>
                            </div>
                            <div><input type="hidden" value="{{$_token}}" name="_token"/></div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">密码</label>
                                <div class="controls">
                                    <input id="inputPassword" type="password" name="password" style="height: inherit" />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn">登陆</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="span4">
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span4">
                    </div>
                    <div class="span4">
                    </div>
                    <div class="span4">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@extends('footer')