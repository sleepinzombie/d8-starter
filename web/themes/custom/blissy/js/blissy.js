console.log('Testing');

/**
 * Function making use of Drupal 8 JS.
 * 
 * This function simply checks if the DOM is ready
 * and performs a logging.
 */
(function ($, Drupal) {
    'use strict';
    Drupal.behaviors.name = {
      attach: function (context, settings) {
        $(".selector", context)
      }
    }
  
    $(document).ready(function() {
      console.log('DOM is ready!');
    });
  
})(window.jQuery, window.Drupal);

/**
 * Function that can be called on the login button
 */
function goToLogin() {
  console.log('Go to logging running.');
  window.location.href = '/example/web/user';
}