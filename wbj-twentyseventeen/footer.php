<footer<?php if (!is_home()) echo ' class="internal"';?>>
    <div class="wrapper">
        <div id="logo"><!--@TODO:replace with footer long lngth logo-->
            <a href="<?php echo get_home_url(); ?>" title="Home"><img src="<?php echo get_template_directory_uri(); ?>/images/preload/logo_new_footer.png" alt="<?php echo get_bloginfo( 'name' ); ?> - Home" /></a>
        </div>

        <div id="scroll_to_top"><a href="" title=""></a></div>

        <div id="main">
            <div id="contact">
                <h3 class="footer_title">Contact</h3>
                <p id="call"><i class="fa fa-phone-square" aria-hidden="true"></i> 844-WJN-4ALL</p>
                <p>Cras faucibus eu erat non sagittis. Aliquam non sem tellus. Aenean purus lacus, faucibus ac arcu a, auctor fermentum metus. </p>
                <ul>
                    <li><a href="" title="<?= get_bloginfo( 'name' ); ?> - Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="" title="<?= get_bloginfo( 'name' ); ?> - YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    <li><a href="" title="<?= get_bloginfo( 'name' ); ?> - Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                </ul>
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
    </div>

    <div id="bottom">
        <p>&copy; <?php echo date("Y"); ?> <?php echo get_bloginfo( 'name' ); ?> - <a href="<?=get_home_url('contact'); ?>" title="Contact">Contact</a></p>
    </div>
</footer>
<?php wp_footer(); ?>

<!--Google Analytics-->
    <!--@TODO:remove me and replace with client GA code-->
</body>
</html>