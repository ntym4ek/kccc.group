<div class="page-wrapper">

  <div class="nav-mobile">
    <div class="branding">
      <div class="logo">
        <img src="<?php print $logo; ?>" />
      </div>
      <span><?php print $site_name; ?></span>
    </div>
    <div class="menu-mobile-wr">
      <div><?php if ($primary_nav): print $primary_nav; endif; ?></div>
      <div>
        <?php if (!empty($language_link_mobile)): ?>
        <div class="language-switch menu-mobile-link"><?php print $language_link_mobile; ?></div>
        <?php endif; ?>
        <?php if ($secondary_nav): print $secondary_nav; endif; ?>
      </div>
    </div>
  </div>

  <div class="page">
    <?php if ($is_header_on): ?>
    <header class="header">
      <div class="header-wr">
        <div class="container">
          <div class="row middle-xs full-height no-wrap">
            <div class="col col-1 full-height col-no-gutter">
              <div class="branding">
                  <div class="brand">
                    <div class="name nowrap"><a href="<?php print url('<front>'); ?>">KCCC GROUP</a></div>
                    <div class="slogan"><a href="<?php print url('<front>'); ?>"><?php print t('Innovative Chemical Holding'); ?></a></div>
                  </div>
                <div class="logo"><a href="<?php print url('<front>'); ?>"><img src="<?php print $logo ?>" /></a></div>
              </div>
            </div>
            <div class="col col-2 full-height col-no-gutter">
              <div class="menu-bkg">
                <div class="nav-mobile-label show-xs hide-lg"><div class="label"><div class="icon"></div></div></div>
                <div class="hide-xs show-lg">
                  <div class="menu-wr">
                    <div class="primary-menu">
                      <?php if ($primary_nav): print $primary_nav; endif; ?>
                    </div>
                    <div class="secondary-menu"><?php if ($secondary_nav): print $secondary_nav; endif; ?></div>
                    <?php if (!empty($language_link)): ?>
                      <div class="language-switch"><?php print $language_link; ?></div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <?php endif; ?>

    <div class="page-content">
      <div class="container">

        <?php if ($page['highlighted'] || $is_banner_on): ?>
        <div class="page-highlighted">

          <?php if ($page['highlighted']): ?>
            <?php print render($page['highlighted']); ?>
          <?php endif; ?>

          <?php if ($is_banner_on): ?>
          <div class="page-banner">
            <div class="screen-width">
              <div class="image">
                <picture>
                  <?php if (!empty($banner_mobile_url)): ?><source class="mobile" srcset="<?php print $banner_mobile_url; ?>" media="(max-width: <?php print $banner_break; ?>px)"><?php endif; ?>
                  <img src="<?php print $banner_url; ?>" alt="<?php print $banner_title ?? t('Banner'); ?>">
                </picture>
              </div>

              <div class="container full-height">
                <div class="banner-title-wrapper">
                  <?php if (!empty($banner_title_prefix)): ?><div class="banner-prefix"><?php print $banner_title_prefix; ?></div><?php endif; ?>
                  <?php if ($banner_title): ?><div class="banner-title"><?php print $banner_title; ?></div><?php endif; ?>
                  <?php if (!empty($banner_title_suffix)): ?><div class="banner-suffix"><?php print $banner_title_suffix; ?></div><?php endif; ?>
                </div>
              </div>

              <div class="gradient-y"></div>
            </div>
          </div>

          <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="page-margin"></div>
        <?php endif; ?>

        <?php print $breadcrumb; ?>

        <?php if ($is_title_on && $title): ?>
        <div class="page-title">
          <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php print render($title_suffix); ?>
        </div>
        <?php endif; ?>

        <div class="page-main">
          <?php if (isset($tabs)): ?><?php print render($tabs); ?><?php endif; ?>
          <?php print $messages; ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

          <?php print render($page['content']); ?>
        </div>

        <div class="page-bottom">
          <?php print render($page['page_bottom']); ?>
        </div>
      </div>
    </div>

    <div class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-2 col-xl-1">
            <div class="branding">
              <div class="logo">
                <a href="<?php print url('<front>'); ?>">
                  <img src="<?php print $logo; ?>" />
                </a>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-md-3 col-xl-2">
            <div class="menu about">
              <div class="title"><?php print t('About'); ?></div>
              <ul>
                <li><span class="arrow"></span><a href="<?php print url('news'); ?>" title="<?php print t('News'); ?>"><?php print t('News'); ?></a></li>
                <li><span class="arrow"></span><a href="<?php print url('job'); ?>" title="<?php print t('Job'); ?>""><?php print t('Job'); ?></a></li>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 col-md-7 col-xl-9">
            <div class="menu products">
              <div class="title"><?php print t('Products'); ?></div>
              <ul>
                <li><span class="arrow"></span><a href="https://kccc.ru/" title="<?php print t('Agricultural industry'); ?>" target="_blank"><?php print t('Agricultural industry'); ?></a></li>
                <li><span class="arrow"></span><a href="https://smola.kccc.ru/" title="<?php print t('Synthetic resins'); ?>" target="_blank"><?php print t('Synthetic resins'); ?></a></li>
                <li><span class="arrow"></span><a href="<?php print url ('node/123'); ?>" title="<?php print t('Engine oils and lubricants'); ?>" target="_blank"><?php print t('Engine oils and lubricants'); ?></a></li>
                <li><span class="arrow"></span><a href="https://eva-si.ru/" title="<?php print t('Chemical Ingredients'); ?>" target="_blank"><?php print t('Chemical Ingredients'); ?></a></li>
                <li><span class="arrow"></span><a href="https://joy-car.ru/" title="<?php print t('Car chemicals'); ?>" target="_blank"><?php print t('Car chemicals'); ?></a></li>
                <li><span class="arrow"></span><a href="https://joy-magazin.ru/catalog/khozyaystvennye-tovary/bytovaya-himiya/" title="<?php print t('Household chemicals'); ?>" target="_blank"><?php print t('Household chemicals'); ?></a></li>
                <li><span class="arrow"></span><a href="https://finfire.ru/" title="<?php print t('Fire extinguishing'); ?>" target="_blank"><?php print t('Fire extinguishing'); ?></a></li>
                <li><span class="arrow"></span><a href="https://joy-magazin.ru/catalog/dacha/" title="<?php print t('Gardening'); ?>" target="_blank"><?php print t('Gardening'); ?></a></li>
                <li><span class="arrow"></span><a href="https://joy-magazin.ru/catalog/tsvety-i-rasteniya/" title="<?php print t('Floriculture'); ?>" target="_blank"><?php print t('Floriculture'); ?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="back-to-top"><i class="icon icon-124"></i></div>
</div>

