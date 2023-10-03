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

  // -- Баннер в шапке
  if (isset($vars['node']) && $vars['node']->type == 'page') {
    $vars['title'] = '';
    $vars['is_title_as_banner'] = true;
    unset($vars["page"]["content"]["system_main"]);
    if (!empty($vars["node"]->field_image_banner)) {
      $vars['title_background'] = file_create_url($vars["node"]->field_image_banner['und'][0]['uri']);
    }
  } elseif (isset($vars['node']) && $vars['node']->type == 'news') {
    $vars['title'] = '';
  } elseif ($_GET['q'] == 'news') {
    $vars['title'] = '';
    $vars['is_title_as_banner'] = true;
    $vars['title_background'] = file_create_url('public://images/page-banners/news.jpg');
  } elseif ($_GET['q'] == 'job') {
    $vars['title'] = '';
    $vars['is_title_as_banner'] = true;
    $vars['title_background'] = file_create_url('public://images/page-banners/job.jpg');
  }

  // -- выбор языка в меню
  $languages = language_list();
  $lang = $GLOBALS['language']->language == 'ru' ? 'en' : 'ru';
  $title = $lang == 'ru' ? 'RU' : 'EN';
  $url = current_path();
  $vars['language_select'] = l($title, $url, ['language' => $languages[$lang]]);
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
  ];
}

function group_preprocess_menu_link(&$vars)
{
  if ($vars["element"]["#href"] == 'user' && user_is_logged_in()) {
    // сменить Аккаунт на Имя пользователя
    //    $vars["element"]["#title"] = $GLOBALS['user']->name;
    $vars["element"]["#localized_options"]['html'] = true;
    $vars["element"]["#title"] = '<img class="icon-user hide-xs-only hide-sm-only" src="/sites/all/themes/group/images/icons/icon-user.svg" /><span class="hide-md">' . $vars["element"]["#title"] . '</span>';
  }
}
