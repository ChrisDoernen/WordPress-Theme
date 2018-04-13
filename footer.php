<footer class='footer background-darkergrey diagonal-top'>
    <div class='container container-ms'>
        <div class='row'>
            <div class='col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2'>
                <div class='row'>
                    <div class='col-xs-7 col-sm-4 footer_colum--width32'>
                        <div class=''>
                            <div class='footer__logo'></div>
                            <div class='footer__claim'>
                                Fülle von Gott,<br>
                                &nbsp;Liebe für Andere.
                            </div>
                        </div>
                    </div>
                    <div class='col-xs-5 col-sm-2 footer__column footer_colum--width21'>
                        <div class='footer__sitemap'>
                            <h4>Sitemap</h4>
                            <ul>
                                <li><a href='<?php echo esc_url( home_url( '/' ) ); ?>'>Home</a></li>
                                <li><a href='<?php echo esc_url( home_url( '/' ) ); ?>news-blog/kirche-und-glaube/jesus/'>Jesus</a></li>
                                <li><a href='<?php echo esc_url( home_url( '/' ) ); ?>ueber-uns'>Über Uns</a></li>
                                <li><a href='<?php echo esc_url( home_url( '/' ) ); ?>gottesdienst'>Gottesdienst</a></li>
                                <li><a href='<?php echo esc_url( home_url( '/' ) ); ?>events-termine'>Events & Termine</a></li>
                                <li><a href='<?php echo esc_url( home_url( '/' ) ); ?>news-blog'>News & Blog</a></li>
                                <li><a href='<?php echo esc_url( home_url( '/' ) ); ?>dabei-sein'>Dabei sein</a></li>
                                <li><a href='<?php echo esc_url( home_url( '/' ) ); ?>dein-naechster-schritt'>Kurse & Angebote</a></li>
                                <li><a href='<?php echo esc_url( home_url( '/' ) ); ?>helfen-geben'>Helfen & Geben</a></li>
                                <li><a href='<?php echo esc_url( home_url( '/' ) ); ?>kontakt'>Kontakt</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class='col-xs-7 col-sm-push-2 col-sm-4 footer__column footer_colum--width32'>
                        <div class='footer__contact'>
                            <h4>Kontakt</h4>
                            FCG ARCHE Augsburg e.V.<br>
                            &nbsp; <br>
                            Siegfried-Aufhäuser-Str. 19a <br>
                            86157 Augsburg <br>
                            &nbsp; <br>
                            +49 821 / 258 9729<br>
                            info@arche-augsburg.de
                        </div>
                    </div>
                    <div class='col-xs-5 col-sm-pull-4 col-sm-2 footer__column footer_colum--right32-width14'>
                        <div class='footer__network'>
                            <h4>Netzwerk</h4>
                            <ul>
                                <li><a href='https://www.evangelische-allianz-augsburg.de/' target="_blank">EAA</a></li>
                                <li><a href='https://www.bfp.de/' target="_blank">BFP</a></li>
                                <li><a href='https://ack-augsburg.jimdo.com/' target="_blank">ACK</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-xs-12 centered footer__social-icons'>
                <a href="https://www.facebook.com/archeaugsburg/" target="_blank">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x si-facebook"></i>
                      <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
				<a href="https://www.instagram.com/archeaugsburg/" target="_blank">
				    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x si-instagram"></i>
                      <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="<?php bloginfo('rss2_url'); ?>">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x si-rss"></i>
                      <i class="fa fa-rss fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="mailto:info@arche-augsburg.de">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class='footer__copyright background-dark'>
            <div class=''>
                &copy; <?php echo date('Y'); ?> FCG ARCHE Augsburg &ndash; <a href="<?php echo esc_url( home_url( '/' ) ).'impressum'; ?>">Impressum</a> &ndash; <a href="<?php echo esc_url( home_url( '/' ) ).'datenschutz'; ?>">Datenschutz</a>
            </div>
        </div>
    </div>
</footer>

<a id='backTop'>Back To Top</a>

<?php wp_footer(); ?>