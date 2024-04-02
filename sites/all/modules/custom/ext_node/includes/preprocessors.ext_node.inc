<?php

/**
 * Подготовить текст материала перед сохранением
 */
function ext_node_prepare_content_to_save(&$node)
{
  if (!empty($node->body)) {
    foreach ($node->body as $lang => $body) {
      $text = $body[0]['value'];

      // убираем кавычки, чтобы проще было обрабатывать
      // типограф позже вернёт
      $text = str_replace(['«', '»'], '"', $text);

      // декодируем спецсимволы &;
      $text = html_entity_decode($text);
      $text = str_replace(' ', ' ', $text);

      // убрать все ссылки (с исключениями)
//      $text = ext_node_remove_all_links($text);

      $node->body[$lang][0]['value'] = $text;

      // запрос к типографу, причёсываем текст
      if ($text = ext_node_text_typograph_request($text)) {
        $node->body[$lang][0]['value'] = $text;
      }
    }
  }
}

/**
 * Подготовоить текст метериала перед редактированием
 */
function ext_node_prepare_content_to_edit(&$form)
{
  if (!empty($form["body"]["und"][0]["#default_value"])) {
    $text = $form["body"]["und"][0]["#default_value"];

    // замена &nbsp; на пробелы, тк html_entity_decode меняет на спецсимвол NBSP
    $text = str_replace('&nbsp;', ' ', $text);

    // декодируем спецсимволы &;
    $text = html_entity_decode($text);

    $form["body"]["und"][0]["#default_value"] = $text;
  }
}


/**
 * Возвращает типографированный на http://mdash.ru/ текст
 */
function ext_node_text_typograph_request1($text)
{
  $agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
  $data = [
    'text' => $text,
    'OptAlign.oa_oquote'=>'off',
    'Text.paragraphs'=>'off',
  ];
  $headers = [
    'accept: application/json',
    'Content-Type: application/x-www-form-urlencoded',
  ];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,'http://mdash.ru/api.v1.php');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_USERAGENT, $agent);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  if ($response = curl_exec($ch)) {
    $result = drupal_json_decode($response);
    $result = isset($result['result']) ? urldecode($result['result']) : $result;
  }
  curl_close($ch);

  return $result ?? false;
}

/**
 * Возвращает типографированный на http://typograf.ru/ текст
 */
function ext_node_text_typograph_request($text)
{
  $xml =   '<?xml version="1.0" encoding="windows-1251" ?>
            <preferences>
              <!-- Теги -->
              <tags delete="0">1</tags>
              <!-- Абзацы -->
              <paragraph insert="1">
                <start><![CDATA[<p>]]></start>
                <end><![CDATA[</p>]]></end>
              </paragraph>
              <!-- Переводы строк -->
              <newline insert="1"><![CDATA[<br />]]></newline>
              <!-- Переводы строк <p>&nbsp;</p> -->
              <cmsNewLine valid="0" />
              <!-- DOS текст -->
              <dos-text delete="0" />
              <!-- Неразрывные конструкции -->
              <nowraped insert="1" nonbsp="0" length="0">
                <start><![CDATA[<nobr>]]></start>
                <end><![CDATA[</nobr>]]></end>
              </nowraped>
              <!-- Висячая пунктуация -->
              <hanging-punct insert="0" />
              <!-- Удалять висячие слова -->
              <hanging-line delete="0" />
              <!-- Символ минус -->
              <minus-sign><![CDATA[&ndash;]]></minus-sign>
              <!-- Переносы -->
              <hyphen insert="0" length="0" />
              <!-- Акронимы -->
              <acronym insert="1"></acronym>
              <!-- Вывод символов 0 - буквами 1 - числами -->
              <symbols type="0" />
              <!-- Параметры ссылок -->
              <link target="" class="" />
            </preferences> ';

  $data = [
    'text' => $text,
    'chr' => 'UTF-8',
//    'xml' => $xml,
  ];

  $ch = curl_init('https://typograf.ru/webservice/');
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  $response = curl_exec($ch);
  curl_close($ch);

  return $response ?? false;
}
