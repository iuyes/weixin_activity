@extends('admin.header')
@section('title')
活动编辑
@stop
@section('style')
    <style>
        body{
            background-color: #D9D9D9;
        }
    </style>
@stop
@section('body')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">请先添加活动名称及各种数据)后再上传图片, 图片最好为高210px和宽330px或等比例的图片</div>
        </div>
        <div class="row-fluid">
            <div class="span4" >
            </div>
            <div class="span4" style="background-color: #f2f5e9; padding-top: 30px;margin-bottom: 30px">
                <form class="form-horizontal" enctype="multipart/form-data" method="post" action="upload">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">选择活动</label>
                        <div class="controls">
                            <select name="id" id="inputEmail" style="height: inherit">
                               @foreach($data as $v)
                                <option value="{{$v['id']}}">{{$v['activity_name']}}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">活动图片</label>
                        <div class="controls">
                            <input id="inputEmail" type="file" name="pic" style="height: inherit"/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword">二维码</label>
                        <div class="controls">
                            <input id="inputPassword" type="file" name="erweima" style="height: inherit"/>
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
            </div>
        </div>
        <div class="row-fluid">
            <div class="span4"></div>
            <div class="span4" style="background-color: #DD5A43; padding-top: 30px;margin-bottom: 30px">
                <form action="insert" method="post">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">添加活动名称</label>
                        <div class="controls">
                            <input id="inputEmail" type="text" name="activity_name" style="height: inherit"/>
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
                            <input id="inputPassword" type="text" name="link" style="height: inherit" placeholder="http://xxxxxxx" />
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn">添加</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="span4"></div>
        </div>
        <div class="row-fluid">
            <div class="span4"></div>
            <div class="span4" style="background-color: #ED6002; padding-top: 30px;margin-bottom: 30px">
            <form action="delete" method="post">

                <div class="control-group">
                    <label class="control-label" for="inputEmail">删除活动</label>
                    <div class="controls">
                        <select name="id" id="inputEmail" style="height: inherit">
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
            <div class="span4"></div>
        </div>
        </div>
        </div>
    </div>
@stop

@extends('admin.footer')
