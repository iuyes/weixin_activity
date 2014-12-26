@extends('admin.header')
@section('title')
    活动编辑
@stop
@section('style')
    <style>
        body{
            background-color: lightblue;
        }
    </style>
@stop
@section('body')
    <div class="row-fluid">
        <div class="span12" style="height: 100px">请先添加活动名称及各种数据后再上传图片, 图片最好为高210px和宽330px或等比例的图片</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span4">
            <form class="form-horizontal" action="insert" method="post">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">添加活动名称</label>
                    <div class="controls">
                        <input id="inputEmail" type="text" style="height: inherit" name="activity_name"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">添加活动简介</label>
                    <div class="controls">
                        <input id="inputPassword" type="text" name="activity_intro" style="height: inherit"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">添加活动链接</label>
                    <div class="controls">
                        <input type="text" name="link" style="height: inherit"/>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">添加</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="span4">
            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="upload">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">选择活动</label>
                    <div class="controls">
                        <select name="id" style="height: inherit">
                            @foreach($data as $v)
                                <option value="{{$v['id']}}">{{$v['activity_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">活动图片</label>
                    <div class="controls">
                        <input id="inputPassword" type="file" name="pic" style="height: inherit"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">二维码</label>
                    <div class="controls">
                        <input  type="file" name="erweima" />
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn">上传</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="span4">
            <form class="form-horizontal" action="delete" method="post">
                <div class="control-group">
                    <label class="control-label" for="inputEmail">删除活动</label>
                    <div class="controls">
                        <select name="id"  style="height: inherit">
                            @foreach($data as $v)
                                <option value="{{$v['id']}}">{{$v['activity_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                       <button type="submit" class="btn">删除</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@extends('admin.footer')