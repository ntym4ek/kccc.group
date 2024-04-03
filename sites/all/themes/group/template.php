<?php

function group_preprocess_page(&$vars)
{
  // -- Главная
  if (drupal_is_front_page()) {

    // не выводить заголовок
    drupal_set_title('');

    drupal_add_html_head([
      '#tag' => 'meta',
      '#attributes' => [
        'name' => 'description',
        'content' => $vars['site_slogan'],
      ],
    ], 'description');
  }

  $vars['banner_title'] = '';

  // -- Баннер в шапке
  $banner_uri = '';
  if (isset($vars['node']) && $vars['node']->type == 'page') {
    unset($vars["page"]["content"]["system_main"]);
    if (!empty($vars["node"]->field_image_banner)) {
      $banner_uri = $vars["node"]->field_image_banner['und'][0]['uri'];
    }
  } elseif ($_GET['q'] == 'news') {
    $banner_uri = 'public://images/page-banners/news.jpg';
  } elseif ($_GET['q'] == 'job') {
    $banner_uri = 'public://images/page-banners/job.jpg';
  }
  if ($banner_uri) {
    $vars['is_banner_on'] = true;
    $vars['is_title_on'] = false;
    $vars['banner_url'] = file_create_url($banner_uri);
    $vars['banner_mobile_url'] = image_style_url('banner_mobile', $banner_uri);
  }

  // -- Переключатель языка
  $path = drupal_is_front_page() ? '<front>' : $_GET['q'];
  if ($links = language_negotiation_get_switch_links('language', $path)) {
    $lang = $GLOBALS["language"]->language == 'ru' ? 'en' : 'ru';
    $vars['language_link'] = l('<i class="icon icon-12"></i>', $links->links[$lang]['href'], $links->links[$lang] + ['html' => TRUE]);
    $vars['language_link_mobile'] = l($lang == 'en' ? 'English' : 'Русский', $links->links[$lang]['href'], $links->links[$lang]);
  }
}


/**
 * Implements hook_theme().
 */
function group_theme()
{
  return [
    'card_division' => [
      'variables' => [],
      'template' => 'templates/card-division',
    ],
    'share_btn' => [
      'variables' => ['url' => null, 'title' => null, 'text' => null],
      'template' => 'templates/share-btn',
    ],
  ];
}

