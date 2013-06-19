<?php

defined('_JEXEC') or die;

JLoader::import('joomla.filesystem.file');
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();

$templateparams		= $app->getTemplate(true)->params;
$config = JFactory::getConfig();

$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/reset.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/layout.css');
$doc->addStyleSheet(JURI::base() . 'templates/' . $this->template . '/css/style.css');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/jquery-1.6.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/cufon-yui.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/Swis721_Cn_BT_400.font.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/Swis721_Cn_BT_700.font.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/jquery.easing.1.3.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/tms-0.3.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/tms_presets.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/jcarousellite.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/javascript/script.js');

?>
<?php
if (get_magic_quotes_gpc()) {
    $process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
    while (list($key, $val) = each($process)) {
        foreach ($val as $k => $v) {
            unset($process[$key][$k]);
            if (is_array($v)) {
                $process[$key][stripslashes($k)] = $v;
                $process[] = &$process[$key][stripslashes($k)];
            } else {
                $process[$key][stripslashes($k)] = stripslashes($v);
            }
        }
    }
    unset($process);
}
?>
<!DOCTYPE html>
<html charset="utf-8">
<head>

  <!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
	<style type="text/css">
		.bg{ behavior: url(js/PIE.htc); }
	</style>
  <![endif]-->
	<!--[if lt IE 7]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0"  alt="" /></a>
		</div>
	<![endif]-->
<jdoc:include type="head" />

<style>

.breadcrumbs{
    padding-top:15px;
    margin-bottom:30px;
border-bottom: solid 1px #63B830;
}
a{
	text-decoration:none;	
	color:#000000;
	-moz-transition: color 0.6s ease;
    -o-transition: color 0.6s ease;
    -webkit-transition: color 0.6s ease;

}
a:hover{
	color:#63B830;
	-moz-transition: color 0.6s ease;
    -o-transition: color 0.6s ease;
    -webkit-transition: color 0.6s ease;
}
a:hover h3{
	color:#63B830;
	-moz-transition: color 0.6s ease;
    -o-transition: color 0.6s ease;
    -webkit-transition: color 0.6s ease;
}
a h3{
	color:#000000;
	-moz-transition: color 0.6s ease;
    -o-transition: color 0.6s ease;
    -webkit-transition: color 0.6s ease;
}
a:hover .dropcap{
	color:#3e7800;
	-moz-transition: color 0.6s ease;
    -o-transition: color 0.6s ease;
    -webkit-transition: color 0.6s ease;

}
a .dropcap{
	color:#ffffff;
	-moz-transition: color 0.6s ease;
    -o-transition: color 0.6s ease;
    -webkit-transition: color 0.6s ease;

}


body{
	font-family:Arial, Helvetica, sans-serif;
}
header .wrapper{
	overflow:visible;
}
header #logo{
	 background:url(http://localhost/templates/ukrmakteh/images/logo.png) no-repeat; 
	 width: 395px;
	 margin-left:-50px;
	 
}
.category-desc img{
	padding:-2px;
	border: solid 2px #3c7300;
	border-radius:3px;
}
.pad_left1{
	padding-left:13px;
}
.cols{
	width:225px;
}
.products .cols{
	width:303px;
	height:400px;

}
.items-row .cols{
	height:400px;
	width:303px;
}
.img-intro{
	display:block;
	width:100%;
	overflow:hidden;
	height:120px;
	padding:-2px;
	border: solid 2px #3c7300;
	border-radius:3px;
}
.img-intro img{
	max-width:100%;

}
.cols h3{
	font-size:24px;
}
.pad_left2 {
padding-left: 170px;
}
footer{
	height:80px;
	padding:10px;
}
#content{
	padding-top:0px;
}
.blog{
	margin-top:10px;
}
.blogmega , .blogplodorod{
	margin-top:10px;
}
.blogplodorod .items-row{
	height:470px;
}
.cat-children > h3{
	display:none;
}
.cat-children div{
	width:304px;
	display:inline-block;
}
.cat-children .cols{
	width:310px;
}
.cat-children .cols .dropcap{
	height:95px;
}
.cat-children .cols a{
	display:block;
}
.blog > h2{
	display:none;
}
.cols .category-desc img{
	width:290px; 
}

</style>
<script>
$(document).ready(function(){
	$('.dropcap').each(function(i, obj) {
    		$(this).text(i + 1);
	});
});
</script>
</head>
<body id="page1">
<div class="body1">
	<div class="body2">
		<div class="main">
<!-- header -->
			<header>
				<div class="wrapper">
                <jdoc:include type="modules" name="logo"/>
				<!--<h1><a href="index.php" id="logo">Ð£ÐšÐ ÐœÐÐšÐ¢Ð•Ð¥ Ð”ÐžÐž Ð”Ð•Ð¢ÐžÐ’Ðž</a></h1>-->
                <?php if ($this->countModules('menu') ):?>
                	<jdoc:include type="modules" name="menu" />
                <?php endif; ?>

				<!--<nav>
					<ul id="menu">
						<li id="nav1" class="active"><a href="index.html">Home<span>Welcome!</span></a></li>
						<li id="nav2"><a href="News.html">News<span>Fresh</span></a></li>
						<li id="nav3"><a href="Services.html">Services<span>for you</span></a></li>
						<li id="nav4"><a href="Products.html">Products<span>The best</span></a></li>
						<li id="nav5"><a href="Contacts.html">Contacts<span>Our Address</span></a></li>
					</ul>
				</nav>-->
				</div>
				<div class="wrapper">
                <?php if ($this->countModules('sliderCenter') ):?>
                	<jdoc:include type="modules" name="sliderCenter" />
                <?php endif; ?>
				</div>
			</header>
<!-- header end-->
		</div>
	</div>
	</div>
        
	<div class="body3">
		<div class="main">
<!-- content -->        <jdoc:include type="modules" name="breadCrumb" />
			<article id="content">
				<div class="wrapper">
                	<jdoc:include type="message" />
                	<jdoc:include type="component" />
				</div>
				<div class="wrapper">
                <jdoc:include type="modules" name="center-bottom"/>
					<!--<section class="col2 pad_left1">
						<h2>Testimonials</h2>
						<div class="testimonials">
						<div id="testimonials">
						  <ul>
							<li>
								<div>
									â€œNam libero tempore, cum soluta nobis eligendi quo minus quod maxime placeat facere.â€
								</div>
								<span><strong class="color1">James Coloway,</strong> <br>
								Director</span>
							</li>
							<li>
								<div>
									â€œNam libero tempore, cum soluta nobis eligendi quo minus quod maxime placeat facere.â€
								</div>
								<span><strong class="color1">James Coloway,</strong> <br>
								Director</span>
							</li>
							<li>
								<div>
									â€œNam libero tempore, cum soluta nobis eligendi quo minus quod maxime placeat facere.â€
								</div>
								<span><strong class="color1">James Coloway,</strong> <br>
								Director</span>
							</li>
						  </ul>
						</div>
						<a href="#" class="up"></a>
						<a href="#" class="down"></a>
						</div>
					</section>-->
				</div>
			</article>
		</div>
	</div>
	<div class="body4">
		<div class="main">
			<article id="content2">
				<div class="wrapper">
					<section class="col3">
						<h4>ÐŸÐ¾Ñ‡ÐµÐ¼Ñƒ Ð¼Ñ‹?</h4>
						<ul class="list1">
							<li><a href="http://tf5.w3b.com.ua/index.php/3-óíèêàëüíîå-îáîðóäîâàíèå.html">ÐÐ°Ð´ÐµÐ¶Ð½Ð¾ÑÑ‚ÑŒ</a></li>
							<li><a href="http://tf5.w3b.com.ua/index.php/3-óíèêàëüíîå-îáîðóäîâàíèå.html">Ð¡ÐºÐ¾Ñ€Ð¾ÑÑ‚ÑŒ</a></li>
							<li><a href="http://tf5.w3b.com.ua/index.php/5-ìîáèëüíîñòü-ïðîèçâîäñòâà.html">ÐœÐ¾Ð±Ð¸Ð»ÑŒÐ½Ð¾ÑÑ‚ÑŒ</a></li>
							<li><a href="http://tf5.w3b.com.ua/index.php/6-çàùèòà-ýêîñèñòåìû.html">Ð—Ð°Ð±Ð¾Ñ‚Ð° Ð¾ Ð¿Ñ€Ð¸Ñ€Ð¾Ð´Ðµ</a></li>
						</ul>
					</section>
					<section class="col3 pad_left2">
						<h4>ÐÐ´Ñ€ÐµÑ</h4>
						<ul class="address">
							<li><span>Ð¡Ñ‚Ñ€Ð°Ð½Ð°:</span>ÐœÐ°ÐºÐµÐ´Ð¾Ð½Ð¸Ñ</li>
							<li><span>Ð“Ð¾Ñ€Ð¾Ð´:</span>ÐžÑ…Ñ€Ð¸Ð´</li>
							<li><span>Ð¢ÐµÐ».:</span>8 800 154-45-67</li>
							<li><span>Email:</span><a href="mailto:">info@ukrmakteh.com</a></li>
						</ul>
					</section>
					<section class="col3 pad_left2">
						<h4>ÐÐ°Ð¹Ð´Ð¸Ñ‚Ðµ Ð½Ð°Ñ Ð²:</h4>
						<ul id="icons">
							<li><a href="#"><img src="<?php echo($this->baseurl . '/templates/' . $this->template);?>/images/icon1.jpg" alt="">Facebook</a></li>
							<li><a href="#"><img src="<?php echo($this->baseurl . '/templates/' . $this->template);?>/images/icon2.jpg" alt="">Twitter</a></li>
							<li><a href="#"><img src="<?php echo($this->baseurl . '/templates/' . $this->template);?>/images/icon3.jpg" alt="">LinkedIn</a></li>
							<li><a href="#"><img src="<?php echo($this->baseurl . '/templates/' . $this->template);?>/images/icon4.jpg" alt="">Delicious</a></li>
						</ul>
					</section>
					<section class="col2 right">
					</section>
				</div>
			</article>
<!-- content end -->
		</div>
	</div>
		<div class="main">
<!-- footer -->
			<footer>
				DESIGN BY<a href="w3b.com.ua" target="_blank" rel="nofollow"><div style="background:url(http://w3b.com.ua/templates/w3b/images/logo.png) no-repeat; height:50px; width:50px; margin:5px auto; background-size:100%;"></div></a><br>
			</footer>
<!-- footer end -->
		</div>
<script type="text/javascript"></script>
</body>
<script>
	$('.dropcap').each(function(i, obj){
    		$(this).text(i + 1);
	});
	
	var pathname = window.location.pathname;
	if(pathname == '/Ð¿Ð»Ð¾Ð´Ð¾Ñ€Ð¾Ð´/11-Ð¿Ð»Ð¾Ð´Ð¾Ñ€Ð¾Ð´.html' || pathname == '/%D0%BF%D0%BB%D0%BE%D0%B4%D0%BE%D1%80%D0%BE%D0%B4/11-%D0%BF%D0%BB%D0%BE%D0%B4%D0%BE%D1%80%D0%BE%D0%B4.html' || pathname == 'localhost/%D0%BF%D0%BB%D0%BE%D0%B4%D0%BE%D1%80%D0%BE%D0%B4/12-%D0%BE%D0%B1%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%BA%D0%B0-%D0%B8%D0%BB%D0%BE%D0%B2%D0%BE%D0%B3%D0%BE-%D0%BE%D1%81%D0%B0%D0%B4%D0%BA%D0%B0.html' || pathname == '/Ð¿Ð»Ð¾Ð´Ð¾Ñ€Ð¾Ð´/12-Ð¾Ð±Ñ€Ð°Ð±Ð¾Ñ‚ÐºÐ°-Ð¸Ð»Ð¾Ð²Ð¾Ð³Ð¾-Ð¾ÑÐ°Ð´ÐºÐ°.html' || pathname == '/%D0%BF%D0%BB%D0%BE%D0%B4%D0%BE%D1%80%D0%BE%D0%B4/12-%D0%BE%D0%B1%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%BA%D0%B0-%D0%B8%D0%BB%D0%BE%D0%B2%D0%BE%D0%B3%D0%BE-%D0%BE%D1%81%D0%B0%D0%B4%D0%BA%D0%B0.html' || pathname == 'localhost/%D0%BF%D0%BB%D0%BE%D0%B4%D0%BE%D1%80%D0%BE%D0%B4/13-%D0%BA%D0%BE%D0%BC%D0%BF%D0%BB%D0%B5%D0%BA%D1%81%D0%BD%D1%8B%D0%B5-%D1%80%D0%B5%D1%88%D0%B5%D0%BD%D0%B8%D1%8F-%D0%BF%D0%BE-%D0%BE%D1%87%D0%B8%D1%81%D1%82%D0%BA%D0%B5-%D1%81%D1%82%D0%BE%D1%87%D0%BD%D1%8B%D1%85-%D0%B2%D0%BE%D0%B4.html'){
		jQuery('.category-desc').find('img').css('display','none');
	}
	if(pathname == '/Ð¿Ð»Ð¾Ð´Ð¾Ñ€Ð¾Ð´/13-ÐºÐ¾Ð¼Ð¿Ð»ÐµÐºÑÐ½Ñ‹Ðµ-Ñ€ÐµÑˆÐµÐ½Ð¸Ñ-Ð¿Ð¾-Ð¾Ñ‡Ð¸ÑÑ‚ÐºÐµ-ÑÑ‚Ð¾Ñ‡Ð½Ñ‹Ñ…-Ð²Ð¾Ð´.html' || pathname == 'localhost/%D0%BF%D0%BB%D0%BE%D0%B4%D0%BE%D1%80%D0%BE%D0%B4/13-%D0%BA%D0%BE%D0%BC%D0%BF%D0%BB%D0%B5%D0%BA%D1%81%D0%BD%D1%8B%D0%B5-%D1%80%D0%B5%D1%88%D0%B5%D0%BD%D0%B8%D1%8F-%D0%BF%D0%BE-%D0%BE%D1%87%D0%B8%D1%81%D1%82%D0%BA%D0%B5-%D1%81%D1%82%D0%BE%D1%87%D0%BD%D1%8B%D1%85-%D0%B2%D0%BE%D0%B4.html' || pathname == '/%D0%BF%D0%BB%D0%BE%D0%B4%D0%BE%D1%80%D0%BE%D0%B4/13-%D0%BA%D0%BE%D0%BC%D0%BF%D0%BB%D0%B5%D0%BA%D1%81%D0%BD%D1%8B%D0%B5-%D1%80%D0%B5%D1%88%D0%B5%D0%BD%D0%B8%D1%8F-%D0%BF%D0%BE-%D0%BE%D1%87%D0%B8%D1%81%D1%82%D0%BA%D0%B5-%D1%81%D1%82%D0%BE%D1%87%D0%BD%D1%8B%D1%85-%D0%B2%D0%BE%D0%B4.html'){
		jQuery('.category-desc').find('img').css('display','none');
	}
	if(pathname == '/Ð¿Ð»Ð¾Ð´Ð¾Ñ€Ð¾Ð´/' || pathname =='/Ð¿Ð»Ð¾Ð´Ð¾Ñ€Ð¾Ð´.html' || pathname == 'localhost/Ð¿Ð»Ð¾Ð´Ð¾Ñ€Ð¾Ð´.html' || pathname =='/%D0%BF%D0%BB%D0%BE%D0%B4%D0%BE%D1%80%D0%BE%D0%B4.html'){
		jQuery('.blogplodorod').find('h2').css('display','none');
	}
        if(pathname == '/' || pathname == '/index.php'){
             $('.breadcrumbs').css('display' , 'none');
        }
       $('.cat-children .first .category-desc img').attr('src' , '/images/page4_img6.jpg');
/*.attr('src' , 'images/plodorod_5.jpg');*/ 

        if(pathname == '/6-защита-экосистемы.html' || pathname == '/index.php'){
             $('.about-us').css('display' , 'none');
        }

</script>

</html>