(function ($, Drupal, debounce) {
  "use strict";

  // Cached reference to $(window).
  var $window = $(window);

  // The threshold for how far to the bottom you should reach before reloading.
  var scrollThreshold = 200;

  // The selector for the automatic pager.
  var automaticPagerSelector = '[data-drupal-views-infinite-scroll-pager="automatic"]';

  // The selector for both manual load and automatic pager.
  var pagerSelector = '[data-drupal-views-infinite-scroll-pager]';

  // The selector for the automatic pager.
  var contentWrapperSelector = '[data-drupal-views-infinite-scroll-content-wrapper]';

  // The event and namespace that is bound to window for automatic scrolling.
  var scrollEvent = 'scroll.views_infinite_scroll';

  /**
   * Insert a views infinite scroll view into the document.
   *
   * @param {jQuery} $newView
   *   New content detached from the DOM.
   */
  $.fn.infiniteScrollInsertView = function ($newView) {
    // Extract the view DOM ID from the view classes.
    var matches = /(js-view-dom-id-\w+)/.exec(this.attr('class'));
    var currentViewId = matches[1].replace('js-view-dom-id-', 'views_dom_id:');

    // Get the existing ajaxViews object.
    var view = Drupal.views.instances[currentViewId];
    // Remove once so that the exposed form and pager are processed on
    // behavior attach.
    view.$view.removeOnce('ajax-pager');
    view.$exposed_form.removeOnce('exposed-form');
    // Make sure infinite scroll can be reinitialized.
    var $existingPager = view.$view.find(pagerSelector);
    $existingPager.removeOnce('infinite-scroll');

    var $newRows = $newView.find(contentWrapperSelector).children();
    var $newPager = $newView.find(pagerSelector);

    // Add the new rows to existing view.
    view.$view.find(contentWrapperSelector).append($newRows);
    // Replace the pager link with the new link and ajaxPageState values.
    $existingPager.replaceWith($newPager);

    // Run views and VIS behaviors.
    Drupal.attachBehaviors(view.$view[0]);
  };

  /**
   * Handle the automatic paging based on the scroll amount.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Initialize infinite scroll pagers and bind the scroll event.
   * @prop {Drupal~behaviorDetach} detach
   *   During `unload` remove the scroll event binding.
   */
  Drupal.behaviors.views_infinite_scroll_automatic = {
    attach : function(context, settings) {
      $(context).find(automaticPagerSelector).once('infinite-scroll').each(function() {
        var $pager = $(this);
        $pager.addClass('visually-hidden');
        $window.on(scrollEvent, debounce(function() {
          if (window.innerHeight + window.pageYOffset > $pager.offset().top - scrollThreshold) {
            $pager.find('[rel=next]').click();
            $window.off(scrollEvent);
          }
        }, 200));
      });
    },
    detach: function (context, settings, trigger) {
      // In the case where the view is removed from the document, remove it's
      // events. This is important in the case a view being refreshed for a reason
      // other than a scroll. AJAX filters are a good example of the event needing
      // to be destroyed earlier than above.
      if (trigger === 'unload') {
        if ($(context).find(automaticPagerSelector).removeOnce('infinite-scroll').length) {
          $window.off(scrollEvent);
        }
      }
    }
  };

})(jQuery, Drupal, Drupal.debounce);
;
/**
 * @file
 * better_exposed_filters.js
 *
 * Provides some client-side functionality for the Better Exposed Filters module.
 */

(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.betterExposedFilters = {
    attach: function (context, settings) {
      // Add highlight class to checked checkboxes for better theming.
      $('.bef-tree input[type=checkbox], .bef-checkboxes input[type=checkbox]')
        // Highlight newly selected checkboxes.
        .change(function () {
          _bef_highlight(this, context);
        })
        .filter(':checked').closest('.form-item', context).addClass('highlight');
    }
  };

  /*
   * Helper functions
   */

  /**
   * Adds/Removes the highlight class from the form-item div as appropriate.
   */
  function _bef_highlight(elem, context) {
    $elem = $(elem, context);
    $elem.attr('checked')
      ? $elem.closest('.form-item', context).addClass('highlight')
      : $elem.closest('.form-item', context).removeClass('highlight');
  }

})(jQuery, Drupal, drupalSettings);
;
/**
 * @file
 * bef_datepickers.js
 *
 * Provides jQueryUI Datepicker integration with Better Exposed Filters.
 */

(function ($, Drupal, drupalSettings) {
  /*
   * Helper functions
   */

  Drupal.behaviors.betterExposedFiltersDatePickers = {
    attach: function (context, settings) {

      // Check for and initialize datepickers.
      var befSettings = drupalSettings.better_exposed_filters;
      if (befSettings && befSettings.datepicker && befSettings.datepicker_options && $.fn.datepicker) {
        var opt = [];
        $.each(befSettings.datepicker_options, function (key, val) {
          if (key && val) {
            opt[key] = JSON.parse(val);
          }
        });
        $('.bef-datepicker').datepicker(opt);
      }

    }
  };
})(jQuery, Drupal, drupalSettings);
;
