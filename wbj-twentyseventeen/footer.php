<footer>
    <div id="logo"><!--@TODO:replace with footer long lngth logo-->
        <a href="<?php echo get_home_url(); ?>" title="Home"><img src="<?php echo get_template_directory_uri(); ?>/images/preload/logo.png" alt="<?php echo get_bloginfo( 'name' ); ?> - Home" /></a>
    </div>

    <div id="scroll_to_top"><a href="" title=""></a></div>

    <div id="main">
        <div id="contact">
            <h3 class="footer_title">Contact</h3>
        </div>
        <div id="newsletter">
            <h3 class="footer_title">Newsletter Signup</h3>
            <!-- Begin MailChimp Signup Form -->
            <!--@TODO:swap this out with client specific form/account-->
            <div id="mailchimp">
                <form action="Replace with your MailChimp code" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">

                    <input type="email" size="30" value="Enter your email" name="EMAIL" class="required email" id="mce-EMAIL" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">
                    <input type="text" size="30" value="Enter your name" name="FNAME" class="name" id="mce-FNAME" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;">

                    <div id="mce-responses" class="clear">
                        <div class="response" id="mce-error-response" style="display:none"></div>
                        <div class="response" id="mce-success-response" style="display:none"></div>
                    </div>

                    <div class="clear">
                        <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                    </div>
                </form>
            </div>
            <!--End mc_embed_signup-->
        </div>
        <div id="menu">
            <?php wp_nav_menu( [ 'theme_location' => 'footer_menu' ] ); ?>
        </div>
    </div>

    <div id="bottom">
        <p>&copy; <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?></p>
    </div>
</footer>
<?php wp_footer(); ?>

<!--Google Analytics-->
    <!--@TODO:remove me and replace with client GA code-->
</body>
</html>