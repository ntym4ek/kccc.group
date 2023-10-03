(function ($) {
  Drupal.behaviors.group = {
    attach: function (context, settings) {

      // -- share links
      $(".share-btn").click((e) => {
        $(e.target).closest(".share").toggleClass("open");
      });

    }
  };
})(jQuery);
