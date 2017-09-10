

<footer class="footer-a">

    <div class="wrapper-padding">

        <div class="section">

            <div class="footer-lbl">Get In Touch</div>

            <div class="footer-adress">Address: 58911 Lepzig Hore,<br/>85000 Vienna, Austria</div>

            <div class="footer-phones">Telephones: +1 777 55-32-21</div>

            <div class="footer-email">E-mail: contacts@miracle.com</div>

            <div class="footer-skype">Skype: angelotours</div>

        </div>

        <!--<div class="section">-->

        <!--<div class="footer-lbl">Featured deals</div>-->

        <!--<div class="footer-tours">-->

        <!--&lt;!&ndash; // &ndash;&gt;-->

        <!--<div class="footer-tour">-->

        <!--<div class="footer-tour-l"><a href="#"><img alt="" src="<?= base_url() ?>img/f-tour-01.jpg"/></a></div>-->

        <!--<div class="footer-tour-r">-->

        <!--<div class="footer-tour-a">amsterdam tour</div>-->

        <!--<div class="footer-tour-b">location: netherlands</div>-->

        <!--<div class="footer-tour-c">800$</div>-->

        <!--</div>-->

        <!--<div class="clear"></div>-->

        <!--</div>-->

        <!--&lt;!&ndash; \\ &ndash;&gt;-->

        <!--&lt;!&ndash; // &ndash;&gt;-->

        <!--<div class="footer-tour">-->

        <!--<div class="footer-tour-l"><a href="#"><img alt="" src="<?= base_url() ?>img/f-tour-02.jpg"/></a></div>-->

        <!--<div class="footer-tour-r">-->

        <!--<div class="footer-tour-a">Kiev tour</div>-->

        <!--<div class="footer-tour-b">location: ukraine</div>-->

        <!--<div class="footer-tour-c">550$</div>-->

        <!--</div>-->

        <!--<div class="clear"></div>-->

        <!--</div>-->

        <!--&lt;!&ndash; \\ &ndash;&gt;-->

        <!--&lt;!&ndash; // &ndash;&gt;-->

        <!--<div class="footer-tour">-->

        <!--<div class="footer-tour-l"><a href="#"><img alt="" src="<?= base_url() ?>img/f-tour-03.jpg"/></a></div>-->

        <!--<div class="footer-tour-r">-->

        <!--<div class="footer-tour-a">vienna tour</div>-->

        <!--<div class="footer-tour-b">location: austria</div>-->

        <!--<div class="footer-tour-c">940$</div>-->

        <!--</div>-->

        <!--<div class="clear"></div>-->

        <!--</div>-->

        <!--&lt;!&ndash; \\ &ndash;&gt;-->

        <!--</div>-->

        <!--</div>-->

        <div class="section">

            <!--<div class="footer-lbl">Twitter widget</div>-->

            <!--<div class="twitter-wiget">-->

            <!--<div id="twitter-feed"></div>-->

            <!--</div>-->

        </div>

        <div class="section">

            <div class="footer-lbl">newsletter sign up</div>

            <div class="footer-subscribe">

                <div class="footer-subscribe-a">

                    <input type="text" placeholder="you email" value=""/>

                </div>

            </div>

            <button class="footer-subscribe-btn">Sign up</button>

        </div>

    </div>

    <div class="clear"></div>

</footer>



<footer class="footer-b">

    <div class="wrapper-padding">

        <div class="footer-left">© Copyright 2015 by weblionmedia. All rights reserved.</div>

        <div class="footer-social">

            <a href="#" class="footer-twitter"></a>

            <a href="#" class="footer-facebook"></a>

            <a href="#" class="footer-vimeo"></a>

            <a href="#" class="footer-pinterest"></a>

            <a href="#" class="footer-instagram"></a>

        </div>

        <div class="clear"></div>

    </div>

</footer>



<!-- // scripts // -->

<script src="<?= base_url() ?>js/jquery.1.7.1.js"></script>

<script src="<?= base_url() ?>js/idangerous.swiper.js"></script>

<script src="<?= base_url() ?>js/slideInit.js"></script>

<script src="<?= base_url() ?>js/jqeury.appear.js"></script>

<script src="<?= base_url() ?>js/script.js"></script>

<script src="<?= base_url() ?>js/owl.carousel.min.js"></script>

<script src="<?= base_url() ?>js/bxSlider.js"></script>

<script src="<?= base_url() ?>js/custom.select.js"></script>

<script src="<?= base_url() ?>css/theme/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?= base_url() ?>js/twitterfeed.js"></script>



<script>

    $(document).ready(function () {

        $('.date-inpt').datepicker();

        $('.custom-select').customSelect();

        $(function () {

            $(document.body).on('appear', '.fly-in', function (e, $affected) {

                $(this).addClass("appeared");

            });

            $('.fly-in').appear({force_process: true});

        });



        $(".owl-slider").owlCarousel({

            loop: true,

            margin: 28,

            responsiveClass: true,

            responsive: {

                0: {

                    items: 1,

                    nav: true

                },

                620: {

                    items: 2,

                    nav: true

                },

                900: {

                    items: 3,

                    nav: false

                },

                1120: {

                    items: 4,

                    nav: true,

                    loop: false

                }

            }

        });

        $slideHover();

    });

</script>

<!-- \\ scripts \\ -->



</body>



<!-- Mirrored from sparrow-html.weblionmedia.net/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2017 09:13:27 GMT -->

</html> 