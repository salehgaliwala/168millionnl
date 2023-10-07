<a class="back-to-top" href="#"><i class="fa fa-chevron-up" style="margin-top: 5px;"></i></a>
<div class="million-footer">
    <div class="bootstrap-iso">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="columns col-sm-2">
                        <div class="inn">
                            <span class="footer-headlines fToggle">
                                <i class="toggle"></i><?php echo __('Over ons');?>
                            </span>
                            <?php wp_nav_menu( [
                                'menu' => 'footer-menu-1',
                            ] ); ?>
                        </div>
                    </div>
                    <div class="columns col-sm-2">
                        <div class="inn">
                            <span class="footer-headlines fToggle"><i class="toggle"></i><?php echo __('Help mee');?></span>
                            <?php wp_nav_menu( [
                                'menu' => 'footer-menu-2',
                            ] ); ?>
                        </div>
                    </div>
                    <div class="columns col-sm-2">
                        <div class="inn">
                            <span class="footer-headlines fToggle"><i class="toggle"></i><?php echo __('Shop');?></span>
                            <?php wp_nav_menu( [
                                'menu' => 'footer-menu-3',
                            ] ); ?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="columns mod-social-media">
                            <ul>
                                <li style="padding-top: 0">
                                    <span class="footer-headlines grid-c-d-hide"><?php echo __('VOLG ONS');?></span>
                                    <ul>
                                        <li><a target="_blank" href="https://www.facebook.com/168Million/"><i class="fa fa-facebook"></i></a></li>
                                        <li><a target="_blank" href="https://www.linkedin.com/company/168-million"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a target="_blank" href="https://www.youtube.com/c/168Million/"><i class="fa fa-youtube"></i></a></li>
                                        <li><a target="_blank" href="https://www.instagram.com/168million/"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-donation col-sm-4 columns">
                        <span class="footer-headlines"><i class="toggle"></i><?php echo __('GIFT OVERMAKEN?');?></span>
                        <p class="ctx-main-text">
                            <span class="account-info">BIC: ABNANL2A</span>
                            <span class="account-info js-copy-iban">IBAN: NL22 ABNA 0254 6162 40</span>
                            <span class="account-info">t.n.v. Stichting 168 Million Nederland</span>
                        </p>
                        <p>
                            <button class="button-cta button-cta--smaller btn-primary button-copy js-copy-btn d-inline-block" onclick="javascript:Clipboard.copy(document.querySelector('.js-copy-iban').innerText.substring(5))">IBAN kopiëren</button>
                            <!--<a class="button-cta button-cta--smaller gtm-link d-inline-flex" data-gtm-link="{&quot;category&quot;: &quot;Navigation&quot;, &quot;action&quot;: &quot;Footer&quot;, &quot;label&quot;: &quot;Spendenbutton&quot;}" href="/helpnu/">DONEREN</a>-->
                            <a class="button-cta button-cta--smaller gtm-link d-inline-flex" data-gtm-link="{&quot;category&quot;: &quot;Navigation&quot;, &quot;action&quot;: &quot;Footer&quot;, &quot;label&quot;: &quot;Spendenbutton&quot;}" href="/?add-to-cart=<?php echo simple_product_id; ?>&direct_checkout=1">DONEREN</a>
                        </p>

                        <p class="ctx-main-text">
                            <span class="account-info">
                                Fiscaal nummer (RSIN):
                            </span>
                            <span class="account-info">
                                8576.62.429
                            </span>
                        </p>
                    </div>
                </div>
                <div class="footer-logos-wrapper container">
                    <div class="row collapse-- d-sm-flex footer-logos">
                        
                        <div class="columns col-6 col-sm-1 columns logo-transparence">
                            <a href="/erkenning/">
                                <img src="/wp-content/themes/divi-child/images/anbi-transparant-168Million.png" alt="">
                            </a>
                        </div>                   
                        
                        
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <span class="text">©2021 - 168 Million Nederland</span>
                <span class="separator hidden-mini">|</span>
                <a class="text" href="/klachtenprocedure/" target="_blank">Klachtenprocedure</a>
                <span class="separator hidden-mini">|</span>
                <a class="text" href="/algemeneprincipes/">Principes</a>
                <span class="separator hidden-mini">|</span>
                <a class="text" href="/privacy-en-voorwaarden/">AV en privacy</a>
                 <span class="separator hidden-mini">|</span>
                <a class="text" href="/iam168/" target="_blank">Download APP</a>
            </div>
        </div>
    </div>
</div>

