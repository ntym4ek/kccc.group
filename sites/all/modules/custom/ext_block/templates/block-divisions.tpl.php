<?php
?>
<div class="block-divisions">
  <div class="screen-width">
    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <div class="section-title">
            <div><?php print t('Solutions for your industry'); ?></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">

          <div id="carousel-divisions" class="carousel carousel-divisions outer-pagination outer-navigation" data-slidesperview-xs="1" data-slidesperview-md="2" data-slidesperview-lg="3">
            <div class="swiper">
              <div class="swiper-wrapper">
                <?php foreach ($cards as $card) {
                  print '<div class="swiper-slide">'  . $card . '</div>';
                } ?>
              </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev hide show-md"></div>
            <div class="swiper-button-next hide show-md"></div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
