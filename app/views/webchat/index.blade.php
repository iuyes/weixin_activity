<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>重邮小帮手微信活动展示</title>
</head>

<body>

<link type="text/css" rel="stylesheet" media="screen" href="css/style.css" />

<div class="layout style0 yxl">
	<div class="hd">
		<h2>重邮小帮手微信活动展示</h2>
		<b class="border"></b>
		<!-- <a href="javascript:;" class="changeBnt" id="xxlChg"><i></i>换一换</a> -->
		<img class="changeBnt" src="cyxbs.png" alt="" />
	</div>
	<div class="bd">
		<ul class="picLB" id="picLBxxl">
			@foreach($data as $v)
			<li>
				<dl class="picDl huozhe">
					<dd id="tupian">
						<a href="{{$v['link']}}" class="pic sb1" style="display:block"><img src="{{'pic/'.$v['pic']}}" alt="" height="210px" width="330px"/></a>
						<div class="ftBox">
							<div class="tit"><a href="{{$v['link']}}">{{$v['activity_name']}}</a></div>
							<div class="text">{{$v['activity_intro']}}</div>
						</div>
					</dd>
					<dd id="erweima">
						<a href="{{$v['link']}}" class="pic sb2" style="display:block"><img class="er" src="{{'erweima/'.$v['erweima']}}" alt=""/></a>
						<div class="ftBox">
							<div class="tit"><a href="{{$v['link']}}">{{$v['activity_name']}}</a></div>
							<div class="text">{{$v['activity_intro']}}</div>
						</div>
					</dd>
				</dl>
			</li>
			@endforeach
		</ul>
	</div>
</div>

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/index.js"></script>


</body>
</html>
