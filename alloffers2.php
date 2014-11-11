<script language="javascript">
	function showoffers(type)
	{
		$('.row-fluid').append('<div class="loading"><p>Loading offers....</p></div>');
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=shto&type=' + type + '&tax=freedom-offer',
			success:function(results)
			{
				//alert(results);
				$('#template_search_menu li').removeClass('active');
				var params = results.split('][');
				$('.thumbnails').html(params[1]);
				
				$('.pp_pic_holder').css('display','block');
				$('.pp_pic_holder').css('width','830px');
				$('.pp_overlay').css('display','block');
				$('.pp_overlay').css('width','100%');
				$('.pp_overlay').css('height','4000px');		
				$('.pp_inline').html($('#more_offers').html());
				$('.pp_content').css('width','800px');
				if(type == 'consultants')
				{
					$('.pp_content').css('height','1350px');
					$('.pp_inline').css('height','1300px');
				}
				else
				{
					$('.pp_content').css('height','850px');
					$('.pp_inline').css('height','800px');
				}
				/*$('.pp_inline').css('overflow-y','scroll');*/
				_center_overlay();
				$('.pp_pic_holder').css('top',($('.pp_pic_holder').css('top')-20)+'px');
				$('#pp_full_res .pp_inline p').css('margin-bottom','0');
				
				$('.row-fluid').find('.loading').remove();
			}
		});
	}
	
	function closeIt(){ 	
		$('.pp_pic_holder').css('display','none');
		$('.pp_overlay').css('display','none');
		return false;
	}
</script>
<div id="leftoffers" style="top:0">
      <h3 style="text-align:center; margin-bottom:20px; margin-left:auto; margin-right:auto;">Click to see all the offers</h3>
      <div id="offerbox1" class="offerboxes" onclick="showoffers('cloud-apps')">
        <h2>Cloud Apps we pay for</h2>
        <div class="logos">
          <div class="clear"></div>
          <p><img width="126" height="88" class="alignleft size-full wp-image-2328" alt="obsf-logo" src="http://www.makesbridge.com/wp-content/uploads/2014/07/obsf-logo.png"><img src="http://www.makesbridge.com/wp-content/themes/mksteam/thumb.php?src=http://www.makesbridge.com/wp-content/uploads/2014/07/zoominfo.png&amp;w=70&amp;h=70" style="margin:5px 0 0 25px;" class="alignleft size-full wp-image-2328"> <img width="146" height="38" style="margin:25px 0 0 35px;" class="alignleft size-full wp-image-2329" alt="obli-logo" src="http://www.makesbridge.com/wp-content/uploads/2014/07/obli-logo.png"></p>
          <div class="clear"></div>
          <p><img width="77" height="78" style="margin:10px 0 0 85px;" class="alignleft size-full wp-image-2333" alt="obhr-logo" src="http://www.makesbridge.com/wp-content/uploads/2014/07/obhr-logo.png"><img width="124" height="72" style="margin:10px 0 0 78px;" class="alignleft size-full wp-image-2334" alt="obns-logo" src="http://www.makesbridge.com/wp-content/uploads/2014/07/obns-logo.png"></p>
          <p><img src="<?php echo bloginfo('wpurl'); ?>/wp-content/themes/mksteam/images/gapps_logo.png" style="margin:25px 0 0 55px; position:relative; vertical-align:bottom;" /></p>
          <div class="clear"></div>
        </div>
      </div>
      <div id="offerbox2" class="offerboxes" onclick="showoffers('consultants')">
        <h2>Consulting Services we pay for</h2>
        <div class="logos" style="margin-top:0px;">
          <div class="clear"></div>
          <p><img width="158" height="158" class="alignleft size-full wp-image-2337" alt="obnt-logo" src="http://www.makesbridge.com/wp-content/uploads/2014/07/obnt-logo.png"><img width="231" height="61" style="margin:5px 0 0 20px;" class="alignleft size-full wp-image-2338" alt="obtt-logo" src="http://www.makesbridge.com/wp-content/uploads/2014/07/obtt-logo.png"> <img width="237" height="72" style="margin:28px 0 0 20px;" class="alignleft size-full wp-image-2339" alt="obeg-logo" src="http://www.makesbridge.com/wp-content/uploads/2014/07/obeg-logo.png"><img width="" height="" src="http://www.makesbridge.com/wp-content/uploads/2014/08/nimbus_wordmark_purple.png" alt="nimbus-logo" class="alignleft size-full wp-image-2339" style="width: 53%; margin:20px 0 0 110px;"></p>
          <div class="clear"></div>
        </div>
      </div>
      <div id="more_offers">
        <div class="clear"></div>
        <ul class="thumbnails fo">
        </ul>
        <div class="clear"></div>
      </div>
    </div>