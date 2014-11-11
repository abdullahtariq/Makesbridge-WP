<?php 

/* Template Name: Videos View Count */

get_header(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery001.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery_002.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script language="javascript">
	function toggleFilters()
	{
		if($('#type').val() == '1')
		{
			$('#date').hide();
			$('#months').hide();
			$('#fromdate').hide();
			$('#todate').hide();
		}
		else if($('#type').val() == '2')
		{
			$('#date').show();
			$('#months').hide();
			$('#fromdate').hide();
			$('#todate').hide();
		}
		else if($('#type').val() == '3')
		{
			$('#date').hide();
			$('#months').hide();
			$('#fromdate').show();
			$('#todate').show();			
		}
		else if($('#type').val() == '4')
		{
			$('#date').hide();
			$('#months').show();
			$('#fromdate').hide();
			$('#todate').hide();
		}
	}
</script>
<style type="text/css">
#calroot {
	z-index: 999999;
	margin-top: -1px;
	margin-left: -1px;
	width: 276px;
	padding: 2px;
	background: #fff;
	border: 1px solid #555;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px
}
#calhead {
	padding: 2px 0;
	height: 22px;
	background: #2581b0;
	border-radius: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px
}
#caltitle {
	font-size: 14px;
	font-weight: 700;
	color: #fff;
	float: left;
	text-align: center;
	width: 225px;
	line-height: 20px;
}
#caltitle select {
	font-size: 10px
}
#calnext, #calprev {
	display: block;
	width: 20px;
	height: 20px;
	background: transparent url(<?php echo get_template_directory_uri(); ?>/images/prev.png) no-repeat scroll center center;
	float: left;
	cursor: pointer;
	margin-left:5px;
}
#calnext {
	background-image: url(<?php echo get_template_directory_uri(); ?>/images/next.png);
	float: right;
	margin-left:0;
	margin-right:5px;
}
#calprev.caldisabled, #calnext.caldisabled {
	visibility: hidden
}
#calbody {
	margin-left: 3px;
	margin-bottom: 6px
}
#caldays {
	padding: 5px 0;
	font-weight: bold;
	height: 14px
}
#caldays span {
	display: block;
	float: left;
	width: 38px;
	text-align: center
}
#calweeks {
	background-color: #fff;
	margin-top: 4px
}
.calweek {
	clear: left;
	height: 22px;
}
.calweek a {
	display: block;
	float: left;
	width: 36px;
	height: 25px;
	text-decoration: none;
	text-align: center;
	line-height: 25px;
	background: #eee;
	border: 1px solid #fff;
	border-radius: 3px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px
}
.calweek a:hover, .calweek .calfocus {
	background-color: #2581b0;
	color: #fff
}
.calweek a.caldisabled {
	color: #ccc;
	background: #f8f8f8;
	cursor: default
}
.calweek a.caloff, .calweek a.caloff:hover {
	color: #2581b0;
	background: #fff;
	cursor: default
}
#calcurrent, #caltoday {
	color: #465872
}
#calcurrent {
	background: #fff
}
.search_module {
	margin: auto;
}
.search_module tr td.spaceline {
	height: 20px;
}
.search_module td select {
	width: 278px;
	padding: 7px 7px 7px 10px;
}
.search_module input[type="text"], .search_module input[type="date"], .search_module select, .search_module .tokeninput {
	border: 1px solid #7D899B;
	border-radius: 5px;
	font-size: 15px;
	padding: 7px 14px;
	position: relative;
	width: 278px;
}
#service_type {
/*font-size: 18px;
    padding-bottom: 12px;
    padding-top: 12px;*/
}
#pickup_time_hour, #dropoff_time_hour {
	float: left;
	margin-right: 5px;
	width: 173px;
	min-width: 173px;
}
#pickup_time_minute, #dropoff_time_minute {
	float: left;
	width: 100px;
	min-width: 100px;
}
</style>
<div id="thankyou_page">
  <?php
  if(have_posts()): 
  while(have_posts()) :
  the_post();	
  ?>  
  <div class="main">
    <div class="main_wrap pagecontent" style="padding:0 20px; width:960px; margin:50px auto 100px;">
      <h2 style="margin-top:50px;">Videos View Count</h2>
      <form method="post" action="<?php echo bloginfo('wpurl'); ?>/views-count-videos">
        <select name="type" id="type" onchange="toggleFilters()">
          <option value="1" <?php echo ($_POST['type'] == '1') ? "selected='selected'" : ""; ?>>All</option>
          <option value="2" <?php echo ($_POST['type'] == '2') ? "selected='selected'" : ""; ?>>By Date</option>
          <option value="3" <?php echo ($_POST['type'] == '3') ? "selected='selected'" : ""; ?>>By Date Range</option>
          <option value="4" <?php echo ($_POST['type'] == '4') ? "selected='selected'" : ""; ?>>By Month</option>          
        </select>
        &nbsp;
        <input type="text" name="date" id="date" class="datepicker date" value="<?php echo $_POST['date']; ?>" 
        style="<?php echo ($_POST['type'] == '2') ? 'display:inline' : 'display:none;' ?>;" />
        &nbsp;
        <select name="months" id="months"  style="<?php echo ($_POST['type'] == '4') ? 'display:inline' : 'display:none' ?>;">
        	<option value="1" <?php echo ($_POST['months'] == '1') ? 'selected="selected"' : ''; ?>>January</option>
            <option value="2" <?php echo ($_POST['months'] == '2') ? 'selected="selected"' : ''; ?>>February</option>
            <option value="3" <?php echo ($_POST['months'] == '3') ? 'selected="selected"' : ''; ?>>March</option>
            <option value="4" <?php echo ($_POST['months'] == '4') ? 'selected="selected"' : ''; ?>>April</option>
            <option value="5" <?php echo ($_POST['months'] == '5') ? 'selected="selected"' : ''; ?>>May</option>
            <option value="6" <?php echo ($_POST['months'] == '6') ? 'selected="selected"' : ''; ?>>Jun</option>
            <option value="7" <?php echo ($_POST['months'] == '7') ? 'selected="selected"' : ''; ?>>July</option>
            <option value="8" <?php echo ($_POST['months'] == '8') ? 'selected="selected"' : ''; ?>>August</option>
            <option value="9" <?php echo ($_POST['months'] == '9') ? 'selected="selected"' : ''; ?>>September</option>
            <option value="10" <?php echo ($_POST['months'] == '10') ? 'selected="selected"' : ''; ?>>October</option>
            <option value="11" <?php echo ($_POST['months'] == '11') ? 'selected="selected"' : ''; ?>>November</option>
            <option value="12" <?php echo ($_POST['months'] == '12') ? 'selected="selected"' : ''; ?>>December</option>
        </select>
        <input type="text" name="fromdate" id="fromdate" class="datepicker date" value="<?php echo $_POST['fromdate']; ?>" 
        style="<?php echo ($_POST['type'] == '3') ? 'display:inline' : 'display:none;' ?>;" />&nbsp;
        <input type="text" name="todate" id="todate" class="datepicker date" value="<?php echo $_POST['todate']; ?>" 
        style="<?php echo ($_POST['type'] == '3') ? 'display:inline' : 'display:none;' ?>;" />
        &nbsp;
        <input type="submit" name="submit" value="Show" />
      </form>
      	<?php
		if($_POST)
		{						  
			if($_POST['type'] == 1 || $_POST['type'] == 2 || $_POST['type'] == 3)
			{				
			  	$wh = '';		 
				if($_POST['type'] == '2')
				{
					if(!empty($_POST['date']))
				  		$wh = " where view_date='". date('Y-m-d',strtotime($_POST['date'])) ."'";
				}
				elseif($_POST['type'] == '3')
				{
					if(!empty($_POST['fromdate']) && !empty($_POST['todate']))
				  		$wh = " where view_date between '". date('Y-m-d',strtotime($_POST['fromdate'])) ."' and '". date('Y-m-d',strtotime($_POST['todate'])) ."'";		 
				}
				$sql = "SELECT vd.ID,vd.post_title,count(*) as totals 
						FROM wp_l_vidsviewcount v inner join wp_l_posts vd on vd.ID=v.video_id $wh
						group by vd.post_title
						order by totals desc";
				//echo $sql;
			  	$views = $wpdb->get_results($sql);
			  
				$i=1;
				if($views)
				{
					$str .= '<table width="100%" cellspacing="0" cellpadding="5" border="0" style="background-color:#ffffff; margin:50px auto 0;">
						<tbody>
						  <tr>
							<td width="50%" style="font-size:16px;"><strong>Video Title</strong></td>
							<td width="35%" style="font-size:16px;"><strong>Source Page</strong></td>
							<td width="15%" style="font-size:16px;"><strong>View Count</strong></td>
						  </tr>
						</tbody>
					  </table>
					  <table width="100%" cellspacing="0" cellpadding="5" border="0" style="background-color:#ffffff; margin-left:auto; margin-right:auto; border-bottom:solid 1px;">
						<tbody>';
						  			$xls .= "Video Title\tSource Page\tView Count\r\n";
										  foreach($views as $view)
										  {
											  $xls .= $view->post_title."\t";
						  $str .= '<tr>
							<td width="50%" style="border:solid 1px; padding:5px;font-size:16px;">'. $view->post_title . '</td>
							<td width="50%"><table border="0" cellpadding="2" cellspacing="0" width="100%">';
														if($_POST['type'] == '2')
														{
															if(!empty($_POST['date']))
																$wh = " where view_date='". date('Y-m-d',strtotime($_POST['date'])) ."' and  video_id=".$view->ID;
														}
														elseif($_POST['type'] == '3')
														{
															if(!empty($_POST['fromdate']) && !empty($_POST['todate']))
																$wh = " where view_date between '". date('Y-m-d',strtotime($_POST['fromdate'])) ."' and '". date('Y-m-d',strtotime($_POST['todate'])) ."' and  video_id=".$view->ID;		 
														}
														elseif($_POST['type'] == '1')
														{
															$wh = " where video_id=".$view->ID;		 
														}
															
														$sql = "SELECT v.url,count(*) as totals 
																  FROM wp_l_vidsviewcount v inner join wp_l_posts vd on vd.ID=v.video_id $wh
																  group by v.url
																  order by totals desc";
														$views1 = $wpdb->get_results($sql);
														if($views1)
														{
															$j=0;
															foreach($views1 as $view1)
															{	
																$url = ($view1->url == '') ? 'home page' : $view1->url;							  
																$str .= '<tr>
																  <td width="70%" valign="top" style="border:solid 1px; border-left:0; border-bottom:0; padding:5px;font-size:16px;">'. $url .'</td>
																  <td width="30%" style="border:solid 1px; border-left:0; border-bottom:0; padding:5px;font-size:16px;">'. $view1->totals .'</td>
																</tr>';  
																if(count($views1) > 1 && $j > 0)
																	$xls .= "\t";
																$xls .= $url."\t" . $view1->totals . "\r\n"; 
																$j++;       
															}
														}				
															  $str .= '</table></td>
														  </tr>
														  <tr>
															<td width="50%" style="border:solid 1px; border-top:0; border-bottom:0; padding:5px;font-size:16px;"><strong>Total views for this video</strong></td>
															<td width="50%"><table border="0" cellpadding="2" cellspacing="0" width="100%">
																<tr>
																  <td width="70%" style="border:solid 1px; border-left:0; border-bottom:0; padding:5px;font-size:16px;"></td>
																  <td width="30%" style="border:solid 1px; border-left:0; border-bottom:0; padding:5px;font-size:16px;"><strong>'. $view->totals .'</strong></td>
																</tr>
															  </table></td>
														  </tr>';
														  $xls .= "Total views for this video\t\t" . $view->totals . "\r\n";
										  $i++;
										  }
						$str .= '</tbody>
					  </table>';
					  echo $str;
				  
				}
				else
				  echo '<h3 style="margin:50px 0 100px 50px;">No log exists.</h3>';	
			}
			elseif($_POST['type'] == '4')
			{
				
				$days = days_in_month($_POST['months'], date('Y'));				
				//echo $days;
				if($days)
				{
					$str .= '<table width="1100px" cellspacing="0" cellpadding="5" border="0" style="background-color:#ffffff; margin-left:auto; margin-right:auto; 
						overflow:auto; width:1100px; margin-left:-80px; border:solid 1px; border-top:0; margin-top:50px;">
						<tbody>
						  <tr>';      
					for($i=1;$i<=$days;$i++)
					{
						$d = $i . '/' . $_POST['months'] . '/' . date('Y');
						$d1 = $_POST['months'] . '/' . $i . '/' . date('Y');
							$xls .= $d."\t\t\n\rVideo Title\tSource Page\tView Count\r\n";
							$str .= '<td style="border:solid 1px; width:400px;"><table border="1" cellpadding="5" cellspacing="0" width="100%">
								<tr>
								  <td style="font-size:16px;border:solid 1px; border-left:0; border-right:0; padding:5px;font-size:16px; text-align:center;"><strong>'. $d .'</strong></td>
								</tr>
								<tr>
								  <td>';
									$wh = "where view_date='". date('Y-m-d',strtotime($d1)) ."'";
									$sql = "SELECT vd.ID,vd.post_title,count(*) as totals 
											FROM wp_l_vidsviewcount v inner join wp_l_posts vd on vd.ID=v.video_id $wh
											group by vd.post_title
											order by totals desc";
									//echo $sql;
									$views = $wpdb->get_results($sql);
								  
									$j=1;
									if($views)
									{													
									$str .= '<table width="100%" cellspacing="0" cellpadding="5" border="0" style="background-color:#ffffff; margin:50px auto 0;">
									  <tbody>
										<tr>
										  <td width="50%" style="font-size:16px;"><strong>Video Title</strong></td>
										  <td width="35%" style="font-size:16px;"><strong>Source Page</strong></td>
										  <td width="15%" style="font-size:16px;"><strong>View Count</strong></td>
										</tr>
									  </tbody>
									</table>
									<table width="100%" cellspacing="0" cellpadding="5" border="0" style="background-color:#ffffff; margin-left:auto; margin-right:auto; border-bottom:solid 1px;">
									  <tbody>';                  
									  foreach($views as $view)
									  {  
										$xls .= $view->post_title."\t";
										$str .= '<tr>
										  <td width="45%" style="border:solid 1px; border-left:0; padding:5px;font-size:16px;">'. $view->post_title .'</td>
										  <td width="55%" style="border-right:0;"><table border="0" cellpadding="2" cellspacing="0" width="100%">';
											  
											$wh = " where view_date='". date('Y-m-d',strtotime($d1)) ."' and  video_id=".$view->ID;								
												
											$sql = "SELECT v.url,count(*) as totals 
													  FROM wp_l_vidsviewcount v inner join wp_l_posts vd on vd.ID=v.video_id $wh
													  group by v.url
													  order by totals desc";
											$views1 = $wpdb->get_results($sql);
											if($views1)
											{
												$k=0;
												foreach($views1 as $view1)
												{
												$url = ($view1->url == '') ? 'home page' : $view1->url;                         
											  $str .= '<tr>
												<td width="70%" valign="top" style="border:solid 1px; border-left:0; border-bottom:0; padding:5px;font-size:16px;">'. $url .'</td>
												<td width="30%" style="border:solid 1px; border-right:0; border-left:0; border-bottom:0; padding:5px;font-size:16px;">'. $view1->totals .'</td>
											  </tr>';                        
													if(count($views1) > 1 && $k > 0)
														$xls .= "\t";
													$xls .= $url."\t" . $view1->totals . "\r\n"; 
													$k++;
												}
											}
											$str .= '</table></td>
										</tr>
										<tr>
										  <td width="45%" style="border:solid 1px; border-left:0; border-top:0; border-bottom:0; padding:5px;font-size:16px;"><strong>Total views for this video</strong></td>
										  <td width="55%" style="border-right:0;"><table border="0" cellpadding="2" cellspacing="0" width="100%">
											  <tr>
												<td width="70%" style="border:solid 1px; border-left:0; border-bottom:0; padding:5px;font-size:16px;"></td>
												<td width="30%" style="border:solid 1px; border-right:0; border-left:0; border-bottom:0; padding:5px;font-size:16px;"><strong>'. $view->totals .'</strong></td>
											  </tr>
											</table></td>
										</tr>';
										$xls .= "Total views for this video\t\t" . $view->totals . "\r\n";
										$j++;
										}
									  $str .= '</tbody>
									</table>';
								  }
								  $str .= '</td>
								</tr>
							  </table></td>';
						  if($i % 5 == 0)
						  {
						  $str .= '</tr>
						</tbody>
					  </table>
					  <table width="1100px" cellspacing="0" cellpadding="5" border="0" style="background-color:#ffffff; margin-left:auto; margin-right:auto; 
											  overflow:auto; width:1100px; margin-left:-80px; border:solid 1px; border-top:0; margin-top:50px;">
						<tbody>
						  <tr>';
							  }
						  }
						  $str .= '</tr>
						</tbody>
					  </table>';
					  echo $str;
				}		
			}			
		}
		else
		{
			echo '<h3 style="margin-top:10px;">Select an option to view report</h3>';
		}
		if(!empty($str))
		{
		?>
        <p style="text-align:right; margin-top:50px;">
                	<form name="export_form" method="post" action="<?php echo bloginfo('template_url'); ?>/export.php">
                    	<textarea name="html" style="display:none;"><?php echo $xls; ?></textarea>
                    	<input type="submit" name="export_submit" value="Export to Excel" />
                    </form>
                </p>
        <?php
		}
		?>
    </div>
  </div>
  <?php
  endwhile;
  endif;
  ?>
</div>
<script language="javascript">
	$(".datepicker").dateinput(); 
</script>
<?php get_footer(); 

function days_in_month($month, $year)
{
	// calculate number of days in a month
	return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
} 
?>
