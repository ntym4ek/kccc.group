<div class="page-wrapper">

  <div class="nav-mobile">
    <div class="logo">
      <img src="<?php print $logo; ?>" />
      <span><?php print $site_name; ?></span>
    </div>
    <div class="menu-mobile-wr">
      <div><?php if ($primary_nav): print $primary_nav; endif; ?></div>
      <div>
        <div class="language"><?php if ($language_select): print $language_select; endif; ?></div>
        <?php if ($secondary_nav): print $secondary_nav; endif; ?>
      </div>
    </div>
  </div>

  <div class="page">
    <?php if (empty($is_header_off)): ?>
    <header class="header">
      <div class="header-wr">
        <div class="container">
          <div class="row middle-xs full-height no-wrap">
            <div class="col col-1 full-height col-no-gutter">
              <div class="branding">
                  <div class="brand">
                    <div class="name nowrap"><a href="/">KCCC GROUP</a></div>
                    <div class="slogan"><a href="/"><?php print t('Innovative Chemical Holding'); ?></a></div>
                  </div>
                <div class="logo"><a href="/"><img src="<?php print $logo ?>" /></a></div>
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
                    <div class="language"><?php if ($language_select): print $language_select; endif; ?></div>
                    <div class="secondary-menu"><?php if ($secondary_nav): print $secondary_nav; endif; ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <?php endif; ?>

    <div class="main">
      <div class="container">

        <?php if ($is_title_as_banner || $page['highlighted']): ?>
        <div class="page-highlighted">

          <?php if ($page['highlighted']): ?>
            <?php print render($page['highlighted']); ?>
          <?php endif; ?>

          <?php if ($is_title_as_banner): ?>
          <div class="screen-width"<?php print (!empty($title_background) ? ' style="background-image: url(' . $title_background . '"' : ''); ?>>
            <div class="container full-height">
              <div class="page-title">
                <?php print render($title_prefix); ?>
                <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
                <?php print render($title_suffix); ?>
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

        <?php if (empty($is_title_as_banner) && $title): ?>
        <div class="page-title">
          <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php print render($title_suffix); ?>
        </div>
        <?php endif; ?>

        <div class="page-content">
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

    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-2 col-lg-1"><div class="branding"><img class="logo" src="<?php print $logo; ?>" /></div></div>
          <div class="col-xs-12 col-md-3 col-lg-2">
            <div class="menu about">
              <div class="title"><?php print t('About'); ?></div>
              <ul>
                <li><span class="arrow"></span><a href="<?php print '/' . $language->language . '/news'; ?>" title="" target="_blank"><?php print t('News'); ?></a></li>
                <li><span class="arrow"></span><a href="<?php print '/' . $language->language . '/job'; ?>" title="" target="_blank"><?php print t('Job'); ?></a></li>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 col-md-4 col-lg-7">
            <div class="menu products">
              <div class="title"><?php print t('Products'); ?></div>
              <ul>
                <li><span class="arrow"></span><a href="https://kccc.ru/" title="" target="_blank"><?php print t('Agricultural industry'); ?></a></li>
                <li><span class="arrow"></span><a href="https://smola.kccc.ru/" title="<?php print t(''); ?>" target="_blank"><?php print t('Synthetic resins'); ?></a></li>
                <li><span class="arrow"></span><a href="https://eva-si.ru/" title="<?php print t(''); ?>" target="_blank"><?php print t('Chemical Ingredients'); ?></a></li>
                <li><span class="arrow"></span><a href="https://joy-car.ru/" title="<?php print t('Car chemicals'); ?>" target="_blank"><?php print t('Car chemicals'); ?></a></li>
                <li><span class="arrow"></span><a href="https://joy-magazin.ru/catalog/khozyaystvennye-tovary/bytovaya-himiya/" title="<?php print t(''); ?>" target="_blank"><?php print t('Household chemicals'); ?></a></li>
                <li><span class="arrow"></span><a href="https://finfire.ru/" title="<?php print t(''); ?>" target="_blank"><?php print t('Fire extinguishing'); ?></a></li>
                <li><span class="arrow"></span><a href="https://joy-magazin.ru/catalog/dacha/" title="<?php print t(''); ?>" target="_blank"><?php print t('Gardening'); ?></a></li>
                <li><span class="arrow"></span><a href="https://joy-magazin.ru/catalog/tsvety-i-rasteniya/" title="<?php print t(''); ?>" target="_blank"><?php print t('Floriculture'); ?></a></li>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 col-md-3 col-lg-2">
            <div class="menu lang">
              <div class="title"><?php print t('Language'); ?></div>
              <ul>
                <li><span class="arrow"></span>
                  <?php if ($GLOBALS['language']->language == 'ru'): ?>
                    <a href="/en">English</a>
                  <?php else: ?>
                    <a href="/">Русский</a>
                  <?php endif; ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

