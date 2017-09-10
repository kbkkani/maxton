<!-- main-cont -->
<div class="main-cont">
    <div class="body-wrapper">
        <div class="wrapper-padding">
            <div class="page-head">
                <div class="page-title">Tours - <span>simple style</span></div>
                <div class="breadcrumbs">
                    <a href="#">Home</a> / <a href="#">Tours</a> / <span>simple style</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="two-colls">

                <div class="">
                    <div class="two-colls-right-b">
                        <div class="padding">


                            <div class="catalog-row grid">
                                <!-- // -->
                                <?php
                                foreach ($alltours as $tour):
                                    ?>
                               <div class="offer-slider-i catalog-i tour-grid fly-in">
                                   <a href="<?= base_url(); ?>welcome/selectedTour/<?= $tour['id']; ?>" class="offer-slider-img">
                                        <img alt="" src="<?= base_url(); ?>img/tourimages/<?= $tour['id']; ?>/<?= $tour['image']; ?>">
                                        <span class="offer-slider-overlay">
  							<span class="offer-slider-btn">view details</span><span></span>
  						</span>
                                    </a>
                                    <div class="offer-slider-txt">
                                        <div class="offer-slider-link"><a href="#">amazing france tour</a></div>
                                        <div class="offer-slider-l">
                                            <div class="offer-slider-location">Duration / 11 days</div>
                                            <nav class="stars">
                                                <ul>
                                                    <li><a href="#"><img alt="" src="img/star-b.png"/></a></li>
                                                    <li><a href="#"><img alt="" src="img/star-b.png"/></a></li>
                                                    <li><a href="#"><img alt="" src="img/star-b.png"/></a></li>
                                                    <li><a href="#"><img alt="" src="img/star-b.png"/></a></li>
                                                    <li><a href="#"><img alt="" src="img/star-a.png"/></a></li>
                                                </ul>
                                                <div class="clear"></div>
                                            </nav>
                                        </div>
                                        <div class="offer-slider-r">
                                            <b>2634$</b>
                                            <span>tour price</span>
                                        </div>
                                        <div class="offer-slider-devider"></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <?php
                                endforeach;
                                ?>
                                
                            </div>

                            <div class="clear"></div>

                            <div class="pagination">
                                <a class="active" href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <br class="clear"/>
                </div>
            </div>
            <div class="clear"></div>

        </div>
    </div>
</div>
<!-- /main-cont -->