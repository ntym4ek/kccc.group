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

/**
 * Implements theme_file_link().
 */
function group_file_link($vars)
{
  $file = $vars['file'];

  $file_extension = drupal_strtoupper(pathinfo($file->filename, PATHINFO_EXTENSION));
  //  $file_description = !empty($file->description) ? $file->description : str_replace('.' .$file_extension, '', $file->filename);
  //  $icon_directory = $vars['icon_directory'];

  $url = file_create_url($file->uri);

  // Human-readable names, for use as text-alternatives to icons.
  //  $mime_name = array(
  //    'application/msword' => t('Microsoft Office document icon'),
  //    'application/vnd.ms-excel' => t('Office spreadsheet icon'),
  //    'application/vnd.ms-powerpoint' => t('Office presentation icon'),
  //    'application/pdf' => t('PDF icon'),
  //    'video/quicktime' => t('Movie icon'),
  //    'audio/mpeg' => t('Audio icon'),
  //    'audio/wav' => t('Audio icon'),
  //    'image/jpeg' => t('Image icon'),
  //    'image/png' => t('Image icon'),
  //    'image/gif' => t('Image icon'),
  //    'application/zip' => t('Package icon'),
  //    'text/html' => t('HTML icon'),
  //    'text/plain' => t('Plain text icon'),
  //    'application/octet-stream' => t('Binary Data'),
  //  );

  $mimetype = file_get_mimetype($file->uri);
  //  $icon = theme('file_icon', array(
  //    'file' => $file,
  //    'icon_directory' => $icon_directory,
  //    'alt' => !empty($mime_name[$mimetype]) ? $mime_name[$mimetype] : t('File'),
  //  ));
  $icon = '';

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $options = array(
    'attributes' => array(
      'type' => $file->filemime . '; length=' . $file->filesize,
      'target' => '_blank',
    ),
  );

  // Use the description as the link text if available.
  if (empty($file->description)) {
    $link_text = $file->filename;
  }
  else {
    $link_text = $file->description;
    $options['attributes']['title'] = check_plain($file->filename);
  }

  $output  = '<div class="file">';
  $output .=  '<div class="file-img"><i class="icon icon-120"></i></div>';
  $output .=  '<div class="file-info">';
  $output .=      l($link_text, $url, $options);
  $output .=  !empty($file->display) ? '<span>' . $icon . ' ' . $file_extension . ' - ' . format_size($file->filesize) . '</span>' : '';
  $output .=  '</div>';

  // добавить кнопку на скачивание
  if (!empty($file->display)) {
    $output .= '<div class="file-download"><a href="' . $url . '" class="btn btn-brand btn-wide" download>' . t('Download') . '</a></div>';
  }
  $output .= '</div>';

  return $output;
}
