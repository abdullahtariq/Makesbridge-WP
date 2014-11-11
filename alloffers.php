<script language="javascript">
	function closeIt(){ 	
		$('.pp_pic_holder').css('display','none');
		$('.pp_overlay').css('display','none');
		return false;
	}
	
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
				$('.pp_inline').append($('.thumbnails'));
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
				$('.pp_inline #video_frame').css('display','none');
				$('.pp_inline #tiles').css('display','none');
				if($('.pp_inline #tiles'))
					$('.pp_inline #tiles').css('opacity','0');
				_center_overlay();
				$('.pp_pic_holder').css('top',($('.pp_pic_holder').css('top')-20)+'px');
				$('#pp_full_res .pp_inline p').css('margin-bottom','0');
				$('.pp_inline .off_details').hide();
				$('.row-fluid').find('.loading').remove();
			}
		});
	}
	function addView(id)
	{
		$('.pp_pic_holder').css('display','block');
		$('.pp_overlay').css('display','block');
		$('.pp_overlay').css('width','100%');
		$('.pp_overlay').css('height','4000px');
		$('.pp_inline').append($('#off_det_'+id));
		$('#off_det_'+id).show();
		$('.pp_inline').find('.thumbnails').html('');
		$('.pp_inline #video_frame').css('display','none');
		$('.pp_inline #tiles').css('display','none');
		$('.pp_inline').css('height','350px');
		$('.pp_content').css('height','400px');
		//alert($('#off_det_'+id).html());
		//$('#off_det_'+id).show();
		_center_overlay();
		$.ajax({
			url:"<?php echo bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",
			type:'POST',
			data:'action=my_special_ajax_call&act=aov&id='+ id,
			success:function(results)
			{
				//alert(results);				
				$('#views_'+id+' span em').html(results);
			}
		});
	}
</script>
<div id="leftoffers">
  <h3>Click to see all the offers:</h3>
  <div id="offerbox1" class="offerboxes" onclick="showoffers('cloud-apps')"> 
    <h2>Cloud Apps we pay for</h2>
    <div class="logos"> <img src="<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2014/05/sf-logo.png" width="70" height="70" style="margin-left:40px; vertical-align:bottom;" /> <img src="<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2014/05/hr-logo.png" width="70" height="70" style="margin-left:40px; vertical-align:bottom;" /> <img src="<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2014/05/m-icon.png" width="70" height="70" style="margin-left:40px; vertical-align:bottom;" /> <img src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2014/07/zoominfo.png&w=70&h=70" style="margin:5px 0 0 65px; vertical-align:bottom;" /> <img src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2014/05/li-logo.png&w=124&h=35" style="margin:0px 0 0 40px; position:relative; top:-15px; vertical-align:bottom;" /> <img src="<?php echo get_template_directory_uri(); ?>/images/gapps_logo.png" style="margin:20px 0 0 25px; position:relative; vertical-align:bottom;" /> </div>
  </div>
  <div id="offerbox2" class="offerboxes" onclick="showoffers('consultants')"> 
    <h2>Consulting Services we pay for</h2>
    <div class="logos"> <img src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2014/05/TrimTabLogo-1801.jpg&w=150&h=49" style="margin:30px 0 0 30px; position:relative; vertical-align:bottom;" /> <img src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2014/08/nimbus-logo.png&w=120&h=28" width="120" height="28" style="margin:0 0 0 30px; position:relative; top:-13px; vertical-align:bottom;" /> <img src="<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2014/05/netechy-logo-small.png" width="90" height="46" style="margin:40px 0 0 55px; vertical-align:bottom;" /> <img src="<?php echo get_template_directory_uri(); ?>/thumb.php?src=<?php echo bloginfo('wpurl'); ?>/wp-content/uploads/2014/05/erplogo.png&w=124&h=35" style="margin:20px 0 0 50px; vertical-align:bottom;" /> </div>
  </div>
  <div id="more_offers">
    <div class="clear"></div>
    <ul class="thumbnails fo">
    </ul>
    <div class="clear"></div>
  </div>
</div>