<?php
?>
<div class="block-front-banner">
  <div class="screen-width">

    <div id="slider-front-banner" class="slider slider-front-banner">
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php foreach ($slides as $slide): ?>
            <div class="swiper-slide">
              <div class="image">
                <picture>
                  <source srcset="<?php print $slide['img_mobile']; ?>" media="(max-width: 1024px)">
                  <img src="<?php print $slide['img']; ?>" alt="KCCC GROUP. <?php print $slide['title']; ?>">
                </picture>
              </div>
              <div class="container">
                <div class="text-wr">
                  <h2><?php print $slide['title']; ?></h2>
                  <a href="<?php print $slide['path']; ?>" class="btn btn-brand"><?php print t('Read more'); ?></a>
                </div>
              </div>
              <div class="gradient-y"></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</div>
