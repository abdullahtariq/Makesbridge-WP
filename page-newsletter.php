
<div class="wp-mks-newsletter">
	<form method="post" action="" id="newsletter-subscribe">
    <input type="hidden" value="xhDfRl33No26Fp17Ls20xasd" name="formId">
    <input type="hidden" value="" name="pageId"><div id="" class="formareacontents" style="background-position: initial initial; background-repeat: initial initial;">
      <ul id="formcontents">
        <li id="html_header" style="display: none; background-image: -webkit-linear-gradient(top, rgb(255, 228, 183), rgb(255, 212, 170)); background-position: initial initial; background-repeat: initial initial;">
          <div style="display: inline-block; width: 100%;" ctrl_type="header" class="hide-control">
          <div class="form-label-top labelEdit" style="width: 100%;">
          <div class="heading" style="color: rgb(127, 0, 0); font-size: 20px; font-weight: bold;">Heading</div>
          </div>
          </div>
        </li>
        <li id="basic_email">
          <div style="display: inline-block; width: 100%;" ctrl_type="textfield">
          <div class="form-label-top labelEdit" style="width: 100%;">Email<div class="required">*</div>
          <div class="required_message" style="display:none">This field is required</div></div>
          <div class="form-input-wide subs-input-wrap" id="subnewsletter-input-wrap">
          <input name="email" id="email" class="form-textbox validate[required] input-width" required type="email" size="30" placeholder="Enter your email address" style="width: 195px;">
          <button id="BMS_SUBMIT" class="btn btn-large btn-info" type="button" style="background-image: -webkit-linear-gradient(top, rgb(165, 165, 165), rgb(153, 153, 153)); background-position: initial initial; background-repeat: initial initial;">Submit</button>
          <img src="<?php bloginfo( 'template_url' ); ?>/images/loading.gif" id="loading-img" style="position: absolute;right: 3px;top: 4px;display:none;" />
          </div>
          <div class="successfully-sub-wrap"> <img src="<?php bloginfo( 'template_url' ); ?>/images/yes-sign.png"><span>Successfully Subscribed</span> </div>
          </div>
        </li>
        <li id="frmFld_Source" style="display: none;">
          <div style="display: inline-block; width: 100%;" ctrl_type="textfield" class="hide-control">
          <div class="form-label-top labelEdit" style="width: 100%;">Source<div class="required">*</div>
          <div class="required_message" style="display:none"></div>
          </div>
          <div class="form-input-wide">
          <input name="nlsource" id="nlsource" class="form-textbox validate[required]" type="hidden" value="newsletter">
          </div>
          </div>
         </li>
         <li id="list_d04a398d06983d4ddc998c531e778836" style="display: none;">
            <div style="display: inline-block; width: 100%;" ctrl_type="checkbox" class="hide-control">
            <div class="form-label-top " style="width: 100%;">
            <input type="checkbox" name="lists" id="d04a398d06983d4ddc998c531e778836" value="xhDfUo33Op26Cm17Fm20Kq21xhDf" checked="checked"><span class="label">Newsletter</span></div>
            <input type="hidden" name="lists1" id="lists1" value="zdTyioEk17Il20Jl21Pi30Rh33zdTyio" />
            </div>
          </li>
          <li id="html_submit" style="background-color: rgb(247, 246, 244);">
            <div style="display: inline-block; width: 100%;" ctrl_type="button">
            <div class="form-label-top " style="width: 100%; text-align: center;">
            </div>
            </div>
          </li>
          </ul>
          </div>
        </form>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/emailsubs.css" media="screen" />
<script type="text/javascript">
$( document ).ready(function(){
     $('.wp-mks-newsletter #email').click(function(){
     	$('.wp-mks-newsletter #email').css('width','100%');
        $('.wp-mks-newsletter #BMS_SUBMIT').fadeIn('slow');
        $(this).data('expand', true);
        $(this).animate({width:'+=32px',left:'-=16px'}, 'linear');
        if($( ".wp-mks-newsletter #email" ).hasClass( "input-width" )){
          $(this).removeClass("input-width");
        }
  });

     $('#BMS_SUBMIT').click(function(event){
        event.preventDefault;
       /*var validator = $("#newsletter-subscribe").validate({
          rules: {
            email: {
              required: true,
              email: true
            }
          },
          messages: {
            email: "Please enter a valid email address",
          }
        }); 
         
        console.log(validator.numberOfInvalids());
  */
        $('#BMS_SUBMIT').hide();
        $('#loading-img').show();
        $(this).parent().find('.error').css({'width':'178px','display':'block'});
        var post_data = $('#newsletter-subscribe').serialize();
        var URL = "<?php echo get_site_url(); ?>/newslettersubs";
        $.post(URL, post_data)
                        .done(function(data,post_status,xhr) {  
                          var data = $.parseJSON(data);
                          if(data[0]!=="err"){
                            $('#subnewsletter-input-wrap').hide();
                            $('.successfully-sub-wrap').show();

                          }else{
                            alert('Validation error');
                            $('#loading-img').hide();
                            $('#BMS_SUBMIT').show();
                          }
                        })
                        
     });
     $('.wp-mks-newsletter #email').addClass('input-width');
     $('.wp-mks-newsletter #email').attr("placeholder","Receive our newsletter");
     
   $('.wp-mks-newsletter #email').mouseenter(function(){
        var $this = $(this);
        if (!$this.data('expand')) {
                    $this.data('expand', true);
                    $this.animate({width:'+=32px','margin-top':'0px'}, 'linear');
                    //$this.siblings('.s').animate({width:'-=32px',left:'+=16px'}, 'linear')
        }
        $this.attr("placeholder","Enter your email address");
}).mouseleave(function(){
        var $this = $(this);
        $this.attr("placeholder","Receive our newsletter");
        $this.data('expand', false);
        $this.animate({width:'-=32px','margin-top':'0px'}, 'linear');
        //$this.siblings('.s').animate({width:'+=32px',left:'-=16px'}, 'linear')
    });

// /* Removing File from server loading */
//     var cssFileInterval = setInterval(function () {
//     	console.log('Loged')
//     	var link = $("link[href*='formpreview.css']");
//     	if(link.length!==0){
//     		link.remove();
//     		console.log(link.length);
//     	}else{
//     		console.log('No More File Exists');
//     		clearInterval(cssFileInterval);
//     	}
//     },500);
});
 
</script>