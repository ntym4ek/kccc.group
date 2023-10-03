<?php

/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 *
 * If a preview is enabled, these keys will be available on the preview page:
 * - $form['preview_message']: The preview message renderable.
 * - $form['preview']: A renderable representing the entire submission preview.
 */
?>
<div class="screen-width">
  <div class="container">
    <h2>Контакты</h2>
    <div class="form-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-header">
            <?php
              // Print out the preview message if on the preview page.
              if (isset($form['preview_message'])) {
                print '<div class="messages warning">';
                print drupal_render($form['preview_message']);
                print '</div>';
              }
            ?>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="form-contacts">
            <p>Задайте нам любой вопрос по телефону или напишите письмо.</p>
            <div class="form-item">
              <div class="label">Адрес:</div>
              <div>613048, Кировская&nbsp;обл., г.&nbsp;Кирово-Чепецк, ул.&nbsp;Производственная,&nbsp;6</div>
            </div>
            <div class="form-item">
              <div class="label">Отдел персонала: </div>
              <div class="phone"><a href="tel:+78332761522">+7 (8332) 76-15-22 (доб. 11-14)</a>, <a href="tel:+79229030431">+7 922 903-04-31</a></div>
            </div>
            <div class="form-item">
              <div class="label">Почта: </div>
              <div class="email"><a href="mailto:kadr@kccc.ru">kadr@kccc.ru</a>, <a href="mailto:joykadry@kccc.ru">joykadry@kccc.ru</a></div>
            </div>
            <div class="form-item">
              <div class="image"><img src="/sites/default/files/images/webforms/cow.jpg"></div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="form-content">
            <?php
              // Print out the main part of the form.
              // Feel free to break this up and move the pieces within the array.

              print drupal_render($form['submitted']);

              // Always print out the entire $form. This renders the remaining pieces of the
              // form that haven't yet been rendered above (buttons, hidden elements, etc).
              print drupal_render_children($form);
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

