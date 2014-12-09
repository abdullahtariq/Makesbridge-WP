
          <div class="container">
            <div class="subscribebox">
              <span class="mailicon1"></span>
                    <span class="mailicon2"></span>
                    <h3>Subscribe for Latest Updates and Features</h3>
                    
                        <form role="form" class="form-inline" id="newsletter-subscribe">
                          <input type="hidden" value="xhDfRl33No26Fp17Ls20xasd" name="formId">
                          <input type="hidden" value="" name="pageId">
                          <div class="form-group">
                          
                            <input type="text" name="email" placeholder="Your Email Address" id="email_news" class="form-control">
                          </div>
                          <input type="checkbox" style="display:none;" name="lists" id="d04a398d06983d4ddc998c531e778836" value="xhDfUo33Op26Cm17Fm20Kq21xhDf" checked="checked">
                          <input type="hidden" name="lists1" id="lists1" value="zdTyioEk17Il20Jl21Pi30Rh33zdTyio" />
                          <input name="nlsource" id="nlsource" class="form-textbox validate[required]" type="hidden" value="newsletter-twcbc">
                          <button class="btn btn-default" id="BMS_SUBMIT" type="button">Subscribe</button>
                        </form>
                    <div class="successfully-sub-wrap" style="display: none;text-align: center;font-size: 24px;"> <img src="http://www.makesbridge.com/test/wp-content/themes/mksteam/images/yes-sign.png"><span style="
                      margin-left: 9px;
                      color: #fff;
                  ">Successfully Subscribed</span> </div>
            </div>
          </div>


<script type="text/javascript">
$( document ).ready(function(){

   $('#BMS_SUBMIT').click(function(event){
        event.preventDefault;
        var post_data = $('#newsletter-subscribe').serialize();
        $(this).html('<img src="<?php echo get_template_directory_uri(); ?>/images/ajax-loader.gif" />');
        var URL = "<?php echo get_site_url(); ?>/newslettersubs";
        $.post(URL, post_data)
                        .done(function(data,post_status,xhr) {  
                          var data = $.parseJSON(data);
                          if(data[0]!=="err"){
                            $('#newsletter-subscribe').hide();
                            $('.successfully-sub-wrap').show();
                            
                            $('#BMS_SUBMIT').html('Subscribe');
                          }else{
                            alert('Validation error');
                            
                          }
                        })
                        
     });
   
  });

    
     

 
</script>