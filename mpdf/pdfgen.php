<?php

include("mpdf.php");

$mpdf=new mPDF('c','A4'); 

$mpdf->SetDisplayMode('fullpage');

/*$stylesheet1 = file_get_contents('http://www.makesbridge.com/wp-content/themes/mksteam/css/style.css');
$stylesheet='@font-face {
    font-family: "proxima_nova_Regular, Arial";
    src: url("../fonts/proximanova-bold-webfont.eot");
    src: url("../fonts/proximanova-bold-webfont.eot?#iefix") format("embedded-opentype"),
         url("../fonts/proximanova-bold-webfont.woff") format("woff"),
         url("../fonts/proximanova-bold-webfont.ttf") format("truetype"),
         url("../fonts/proximanova-bold-webfont.svg#proxima_nova_rgbold") format("svg");
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: "proxima_nova_light,Arial";
    src: url("../fonts/proximanova-light-webfont.eot");
    src: url("../fonts/proximanova-light-webfont.eot?#iefix") format("embedded-opentype"),
         url("../fonts/proximanova-light-webfont.woff") format("woff"),
         url("../fonts/proximanova-light-webfont.ttf") format("truetype"),
         url("../fonts/proximanova-light-webfont.svg#proxima_novalight") format("svg");
    font-weight: normal;
    font-style: normal;

}
@font-face {
    font-family: "proxima_nova_Regular, Arial";
    src: url("../fonts/proximanova-regular-webfont.eot");
    src: url("../fonts/proximanova-regular-webfont.eot?#iefix") format("embedded-opentype"),
         url("../fonts/proximanova-regular-webfont.woff") format("woff"),
         url("../fonts/proximanova-regular-webfont.ttf") format("truetype"),
         url("../fonts/proximanova-regular-webfont.svg#proxima_nova_rgregular") format("svg");
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: "proxima_nova_semibold,Arial";
    src: url("../fonts/proximanova-semibold-webfont.eot");
    src: url("../fonts/proximanova-semibold-webfont.eot?#iefix") format("embedded-opentype"),
         url("../fonts/proximanova-semibold-webfont.woff") format("woff"),
         url("../fonts/proximanova-semibold-webfont.ttf") format("truetype"),
         url("../fonts/proximanova-semibold-webfont.svg#proxima_novasemibold") format("svg");
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: "PTSansBold";
    src: url("../fonts/pt-sans.bold-webfont.eot");
    src: url("../fonts/pt-sans.bold-webfont.eot?#iefix") format("embedded-opentype"),
         url("../fonts/pt-sans.bold-webfont.woff") format("woff"),
         url("../fonts/pt-sans.bold-webfont.ttf") format("truetype"),
         url("../fonts/pt-sans.bold-webfont.svg#proxima_nova_rgbold") format("svg");
    font-weight: normal;
    font-style: normal;
}
@font-face {
    font-family: "PTSansRegular";
    src: url("../fonts/pt-sans.regular-webfont.eot");
    src: url("../fonts/pt-sans.regular-webfont.eot?#iefix") format("embedded-opentype"),
         url("../fonts/pt-sans.regular-webfont.woff") format("woff"),
         url("../fonts/pt-sans.regular-webfont.ttf") format("truetype"),
         url("../fonts/pt-sans.regular-webfont.svg#proxima_nova_rgbold") format("svg");
    font-weight: normal;
    font-style: normal;
}';*/
$stylesheet="
a { font-family: proxima_nova_light, Arial; font-size:12px; color:#2581b0; line-height:1em; }
h2 { font-size:30px; color:#2581b0; line-height:1.2em; margin:0; padding:0; }
h3 { font-size:25px; color:#2581b0; line-height:1.2em; margin:0; padding:0; }
h5 { font-size:14px; margin:0; padding:0; line-height:1.2em; }
p,li { font-size:14px; color:#2581b0; line-height:1.2em; margin:0 0 10px; }
#pricing_page { margin-bottom:100px; }
.pricing_topbanner { height:250px; background-color:#F3F6F9; }
.connections_topbanner .banncontent h1 { line-height:0.9em; width:290px; margin:0px 0 20px; padding:0; }
.connections_topbanner h3 { line-height:1.2em; width:290px; }

.free-signup-wrap{
	background: #FBFCFD;
	height:185px;
	text-align:center;
}
.monthly-billing-wrap { background-color:#F7F9FB; height:55px; line-height:55px; text-align:center; }
.free-signup{
	overflow: hidden;
	height:185px;
}
.free-signup h1{
	float: left;
	display: block;
	margin: 70px 0 34px 30px;
	font-size: 35px;
	padding:0;
	line-height:0.9em;
}
.free-signup > a{
	margin: 0px auto;
text-transform: none;
background-color:#9FDB00;
padding:10px 32px;
top:62px;
color:#fff;
font-size:18px;
font-family:proxima_nova_semibold,Arial;
border-radius:3px;
}
.free-signup img{	
	display: block;
	margin: 0 auto;
	position:relative;
	top:35px;
}
.monthly-billing{
	margin: auto;
	width: 720px;
	height:55px;
	line-height:55px;
	font-family:proxima_nova_light,Arial;
	font-size:18px;
	color:#4799c3;
}
.monthly-billing p{
	font-size: 18px;
	color:#4799c3;
} 
.packages h1{
	text-align: center;
	margin-top: 45px;
	margin-bottom: 45px;
	font-size:36px;
}
.products1 { position:relative; }
.packagebox{
	width: 198px;
	margin-top: 0px;
	background-color: #FBFCFD;
	float: left;
	margin-left: 2px;
	list-style-type:none;
}

.packagebox-head{
	width: 198px;
	background-color: #4799c3;
	height: 50px;	
	border-radius: 3px 3px 0 0;
}
.packagebox-head h2{
	text-align: center;
	color: #fff;
	height:50px;
	line-height:50px;
	font-family:proxima_nova_semibold,Arial;
	font-size:24px;
}
.packagebox-subhead{
	background-color: #fbfcfd;	
	text-align:center;
	padding:20px 15px 10px;
	font-family:proxima_nova_Regular, Arial;
	font-size:16px;
	color:#4799c3;
	line-height:1.3em;
	min-height:90px;
}
.package-price{	
	background: #FFFFFF;
	padding: 22px 0 22px;
	border-left:solid 1px #FBFCFD;
	border-right:solid 1px #FBFCFD;
}
.pkgprice { float:left; font-size: 34px; font-family:proxima_nova_Regular, Arial;
color:#4799c3; position:relative; top:10px; position:relative; }
.package-price h3{
	float:left;
	font-size: 51px;   
    text-align: center;
	font-family:proxima_nova_Regular, Arial;
	color:#4799c3;
	margin-left:2px;
	position:relative;
	top:28px;
}
.pkgperiod { float:left; font-family:proxima_nova_Regular, Arial; font-size:12px; color:#4799c3; line-height:1em; margin-left:0px; position:relative; top:30px; }
.package-price span{
	font-size: 37px;
top: 4px;
position: relative;
left: 5px;
font-family:proxima_nova_Regular, Arial;
color:#4799c3;
}
div.packagebox:nth-child(4) .package-price span { left:-2px; }
div.packagebox:nth-child(5) .package-price span { left:-5px; }
div.packagebox:nth-child(6) .package-price span { left:-13px; }

.package-per-month{
	font-size: 12px !important;
	float: right;
	top: 4px !important;
position: relative;
left: 5px !important;
}
.package-price-container{
	width: 88px;
	margin: 0px auto 0;
	padding:0 0 0 15px;
	height:50px;
}
.package-textwidget{
	margin-top: 27px;
	text-align:center;
}
.package-textwidget h2{
	text-align: center;
font-size: 18px;
font-family:proxima_nova_Regular, Arial;
margin:0 0 15px;
padding:0;
height:60px;
}
.package-textwidget span{
	font-size: 16px;
	font-family:proxima_nova_Regular, Arial;
}
.package-textwidget h3{
	text-align: center;
	font-size: 11px;
	margin-bottom: 12px;
	font-family: proxima_nova_regular,Arial;
}
.package-textwidget h3 span { font-size:12px; }
.package-salesforce{
	width: 120px;
	margin: 42px auto 25px;
	text-align:center;
}
#mini .package-salesforce { margin-top:157px; }
#smb .package-salesforce { margin-top:152px; }
#pro .package-salesforce { margin-top:62px; }
#ent .package-salesforce { margin-top:22px; }
#eng .package-salesforce { margin-top:72px; }
.package-salesforce img{
	position: relative;
	left: 15px;
}
.package-salesforce h3{
	text-align: center;
	font-size: 15px;
	padding-top: 8px;
}
.package-salesforce h2{
	color: #3DBDFF;
    font-size: 11px;
    text-decoration: none;
}
.package-salesforce a{
	text-decoration: none;
	font-family:'proxima_nova_light',Arial;
	font-size:12px;
}
.package-buttons{
	margin:0 auto;
	text-align:center;
}
.package-buttons > button,.package-buttons > a.button,.package-buttons a.button{
	background-color: #78abc5;
border: 1px solid #78abc5;
color: #fff;
padding: 7px 0;
border-radius: 3px;
font-size: 14px;
font-family:proxima_nova_Regular, Arial;
margin-bottom: 10px;
margin: auto;
width:145px;
box-shadow:none;
text-shadow:none;
display:block;
text-decoration:none;
}
.package_plus { margin:0px auto 10px; }
.package-buttons button:nth-child(1):hover, .package-buttons a.button:hover{
	background: #3dbdff;
	border: 1px solid #3dbdff;
	cursor: pointer;
}
.package-buttons button:nth-child(2):hover{
	background: #8BC000;
    border: 1px solid #8BC000;
	cursor: pointer;
}
.packagebox-active {
	box-shadow: 0 0 10px 0;
	position: relative;
}
.packagebox-active .package-buttons button:nth-child(1), .packagebox-active .package-buttons a.button{
		background: #9dd903;
		border: 1px solid #9dd903;
}

.packagebox-active .package-buttons button:nth-child(2){
		background: #9dd903;
		border: 1px solid #9dd903;
}
.subs-wrap h2{
	text-align: center;
margin-bottom: 53px;
color:#4799c3;
font-size:36px;
}
.columns ul ul { display:none; }
.contactus { margin:60px 0; position:relative; }
.contactus .content { float:left; padding-left:200px; }
.contactus .content h3 { font-family:proxima_nova_Regular, Arial; font-size:22px; color:#78abc5; margin:0 0 6px; padding:0; line-height:1em; }
.contactus .content p { font-family:proxima_nova_Regular, Arial; font-size:14px; color:#78abc5; margin:0; padding:0; }
.contactus .content p a { font-family:proxima_nova_Regular, Arial; font-size:14px; text-decoration:underline; color:#00c0ff; }
.contactus .req_quote { float:right; margin-right:22px; width:175px; height:42px; line-height:42px; background-color:#00c0ff; 
border-radius:3px; font-family:proxima_nova_Regular, Arial; font-size:18px; color:#fff; text-decoration:none; text-align:center; }
.contactus .chatbar { height:90px; line-height:90px; background-color:#e9f8ff; margin:22px 0 0; }
.contactus .chatbar h3 { float:left; font-family:proxima_nova_Regular, Arial; font-size:30px; color:#78abc5; margin:0 0 0 200px; padding:0; }
.contactus .buttons { float:right; padding-right:20px; }
.chat_btn { width:205px; height:50px; background:#00deff url(../images/bird-icon.png) no-repeat 15px 10px; font-family:proxima_nova_Regular, Arial; font-size:24px; color:#ffffff; border-radius:3px; 
line-height:50px; display:block; text-decoration:none; text-align:center; float:left; margin-top:20px; }
.freetrial_btn { width:205px; height:50px; background:#9fdb00; font-family:proxima_nova_Regular, Arial; font-size:24px; color:#ffffff; border-radius:3px; 
margin-left:20px; line-height:50px; display:block; text-decoration:none; text-align:center; float:left; margin-top:20px; }
.chat_lady { position:absolute; bottom:0; left:35px; }
.faq-wrap{
	width: 475px;
background: #FBFCFD;
clear: both;
margin-bottom: 3px;
}
.faq-wrap ul { color:#7e8f97; margin:0 10px; padding-bottom:10px; }
.faq-wrap ul li { color:#9DBBCA; }
.faq-wrap > a{
margin: 0px 0px;
font-size: 16px;
color:#759fb5;
text-decoration:none;
display:block;
font-family:proxima_nova_Regular, Arial;
}
.columns ul > li.has-sub > a span { background:url('../images/faq-arrow.png') no-repeat 98% center; padding:12px 10px; display:block; }
.columns > ul > li.has-sub.active > a span { background:url('../images/faq-arrow-down.png') no-repeat scroll 98% center rgba(0, 0, 0, 0); color:#2581B0; }
.columns > ul > li.has-sub:hover,
.columns > ul > li.has-sub > a:hover, 
.columns > ul > li.has-sub > a span:hover 
{ color:#2581B0; }
.faq-wrap > span{
	float: right;
	margin: 14px;
}
.features { margin:140px 0 20px; position:relative; }
.features h2 { margin:0 0 60px; font-size:36px; color:#4799c3; padding:0; text-align:center; }
.featurehead { width:182px; height:54px; background-color:#78abc5; font-family:proxima_nova_semibold,Arial; font-size:16px; color:#ffffff; 
margin-right:4px; padding:0 0 0 16px; line-height:54px; border-radius:3px 3px 0 0; float:left; }
.pkghead { width:156px; text-align:center; height:54px; line-height:54px; border-radius:3px 3px 0 0; font-family:proxima_nova_semibold,Arial; 
font-size:20px; background-color:#4799c3; margin-right:4px; float:left; color:#ffffff; }
.pkgeng { margin-right:0; }
.featurecol { background-color:#ffffff; float:left; width:202px; min-height:300px; margin-right:0px; padding-top:20px; }
.featurecol h3, .pkgcol h3 { font-family:proxima_nova_Regular, Arial; font-size:17px; color:#4799c3; margin:20px 0; padding:0; }
.featurecol h4, .pkgcol h4 { font-family:proxima_nova_Regular, Arial; font-size:15px; color:#4799c3; margin:0px 0 10px; padding:0; }
.featurecol h3, .featurecol h4 { padding:0 12px 0 15px; }
.pkgcol h4 { text-align:center; }
.featurecol ul { list-style-type:none; margin:0; padding:0; }
.featurecol ul li, .pkgcol li { font-family:proxima_nova_Regular, Arial; color:#658799; line-height:40px; height:40px; }
.featurecol ul li p, .pkgcol li p { color:#658799; padding-top:3px; }
.featurecol ul li { padding:0px 15px; }
.pkgcol { background-color:#f7f9fb; float:left; width:160px; min-height:300px; margin-right:0px; padding-top:20px; }
.pkgcol li { text-align:center; padding:0px 0; }
.pkgcol li.noempty { background:url(../images/yes-sign.png) no-repeat 50% 50%; }
.pkgsmbcol { margin-right:0; }
.pkgengcol { margin-right:0px; width:156px; }
.integration { text-align:center; font-family:proxima_nova_Regular, Arial; font-size:14px; color:#606e7b; margin:0; padding:0; }
.integration strong { font-family:proxima_nova_Regular, Arial; font-size:14px; }
.packagebox-active { background-color:#ffffff; }
.packagebox-active .packagebox-head { height:60px; line-height:60px; margin-top:-10px; }
#mini.packagebox-active .packagebox-head { background-color:#F8B916; }
#mini.packagebox-active .packagebox-subhead { color:#F8B916; }
#features.mini-det .pkghead:hover { background-color:#F8B916; color:#fff; }

#smb.packagebox-active .packagebox-head { background-color:#FC721F; }
#smb.packagebox-active .packagebox-subhead { color:#FC721F; }
#features.smb-det .pkghead:hover { background-color:#FC721F; color:#fff; }

#pro.packagebox-active .packagebox-head { background-color:#F1526D; }
.lovedimg { border:0; left:481px; position:absolute; top:-28px; }
.lovedimg2 { position:absolute; left:558px; top:112px; }
#pro.packagebox-active .lovedimg { top:54px; }
#pro.packagebox-active .packagebox-subhead { color:#F1526D; }
#features.pro-det .pkghead:hover { background-color:#F1526D; color:#fff; }

#ent.packagebox-active .packagebox-head { background-color:#CB65E9; }
#ent.packagebox-active .packagebox-subhead { color:#CB65E9; }
#features.ent-det .pkghead:hover { background-color:#CB65E9; color:#fff; }

#eng.packagebox-active .packagebox-head { background-color:#0DC8CA; }
#eng.packagebox-active .packagebox-subhead { color:#0DC8CA; }
#features.eng-det .pkghead:hover { background-color:#0DC8CA; color:#fff; }

.packagebox-active { padding-bottom:10px; }
.packagebox-active .packagebox-subhead { color:#00deff; background-color:#ffffff; }

.packagebox-active .package-price { border-left:solid 1px #ffffff; border-right:solid 1px #ffffff; }
.packagebox-active .package-price-container {  background-color:#fbfcfd; }
.packages { position:relative; }
.shareprpage { float:right; margin:0 10px 14px 0; text-align:right; width:100%; }
.shareprpage img, .shareprpage input { position:relative; top:5px; }
.shareprpage a { margin-left:10px; font-family:proxima_nova_Regular, Arial; text-decoration:none; color:#4799c3; }
#fixedtablehead { display:none; position:fixed; top:0; width:100%; }
.woocommerce .woocommerce-info { display:none; }
#order_review_heading { margin:30px 0 20px; font-family:proxima_nova_Regular, Arial; font-size:16px; color:#4c849c; }
.form-row label { float:left; font-family:proxima_nova_Regular, Arial; font-size:13px; color:#4c849c; }
.form-row input, .form-row select { font-family:proxima_nova_Regular, Arial; color:#6C6C6C; padding:4px; border-radius:3px; border:solid 1px #ddd; }
#customer_details h3 { font-family:proxima_nova_Regular, Arial;; font-size-adjust:16px; color:#4c849c; margin-bottom:20px; }
.return-to-shop { margin-top:10px; }
.packages .woocommerce-message { margin:65px auto 0px; padding:0px; text-align:center; width:450px; }
.packages .woocommerce-message h3 { font-family:proxima_nova_Regular, Arial; font-size:32px; color:#4799c3; margin:0 0 20px; }
.packages .woocommerce-message p { font-family:proxima_nova_Regular, Arial; font-size:16px; color:#4799c3; margin:50px 0 60px; line-height:2em; }
.packages .woocommerce-message p a { font-family:proxima_nova_Regular, Arial; font-size:16px; color:#4799c3; }
.packages .woocommerce-message a.nextlink { font-family:proxima_nova_Regular, Arial; font-size:14px; color:#ffffff; text-decoration:none;
background-color:#9dd903; padding:10px 15px; border-radius:3px; margin-left:20px; }
.packages a.termslink { font-size:14px; margin:auto; text-decoration:none; font-family:proxima_nova_Regular, Arial; font-size:14px; color:#4799c3; }

h3 { font-size:12px; }
.package-price span,
.package-price h3,
.pkgprice,
.pkgperiod
{
	font-size:20px;	
	position:inherit;
}
.pkgperiod
{
	font-family:proxima_nova_Regular,Arial;
	font-size:12px;	
	position:inherit;
	line-height:1em;
}
.price { padding-left:0; }
#mini .package-price-container { padding-left:20px; }
.product-cat-packages { margin-bottom:50px; padding-bottom:20px; }
.cell,.noempty { padding:0px; height:40px; line-height:40px; font-size:12px; }
.noempty { text-align:center; }
.lovedimg,.lovedimg2 { display:none; }
.featurecol h3, .featurecol h4 { padding:0; }
.pkghead { width:95px; font-size:15px; }
.featurecol { width:199px; }
.pkgcol,.pkgengcol { width:95px; }
.featurecol h3, .pkgcol h3 { font-size:15px; }
.featurecol h4, .pkgcol h4 { font-size:14px; }
.featurecol p { font-size:11px; }
.featurestable { width:100%; }
.packagebox { width:130px; }
.packagebox-head h2 { font-size:16px; }
.packagebox-subhead { font-size:12px; height:100px; }
.package-buttons { background-color: #78ABC5;
    border: 1px solid #78ABC5;
    border-radius: 3px;
    box-shadow: none;
    color: #FFFFFF;
    display: block;
    font-size: 12px;
    margin: auto;
    padding: 0;
    text-decoration: none;
    text-shadow: none;
    width: 100px; text-align:center; }
.package-buttons a { color:#ffffff; text-decoration:none; }";
$mpdf->WriteHTML($stylesheet,1);

$html = $_POST['pkgs_html'];
//echo $_POST['pkgs_html'];
$html = str_replace('<sup class="pkgprice">','<span class="pkgprice">',$html);
$html = str_replace('</sup>','</span>',$html);
$html = str_replace('<sub class="pkgperiod">','<span class="pkgperiod">',$html);
$html = str_replace('</sub>','</span>',$html);
$html = str_replace('<h3 class="price"><b>','<span class="price">',$html);
$html = str_replace('</b></h3>','</span>',$html);
$html = str_replace('<li>','<div class="cell">',$html);
$html = str_replace('<li','<div',$html);
$html = str_replace('</li>','</div>',$html);
$html = str_replace('<ul>','<div>',$html);
$html = str_replace('</ul>','</div>',$html);
$html = str_replace('<div class="noempty">','<div class="noempty"><img src="http://www.makesbridge.com/wp-content/themes/mksteam/images/yes-sign.png" width="17" height="13" />',$html);
$html = str_replace('<img class="lovedimg" width="119" height="28" style="display: none; top: -28px;" alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/images/most-loved.png">','',$html);
$html = str_replace('<img class="lovedimg" width="119" height="28" style="display: block; top: -28px;" alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/images/most-loved.png">','',$html);
$html = str_replace('<img width="119" height="28" style="display: block; top: -28px;" alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/images/most-loved.png" class="lovedimg">','',$html);
$html = str_replace('<img width="119" height="28" style="display: none; top: -28px;" alt="" src="http://www.makesbridge.com/wp-content/themes/mksteam/images/most-loved.png" class="lovedimg">','',$html);
//echo $html;

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
?>