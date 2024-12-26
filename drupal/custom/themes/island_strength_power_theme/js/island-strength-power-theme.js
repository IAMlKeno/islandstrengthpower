/**
 * @file
 * Island Strength and Power Theme behaviors.
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.islandStrengthPowerTheme = {
    attach (context, settings) {
      const registrationForm = document.getElementsByClassName('isp-registration-form').item(0);
      const stripeContainer = document.querySelector('.stripe-webform-payment-container');
      const btn = $('#registration-btn');

      if (registrationForm != null) {
        const path = window.location.pathname;
        if (path.match(/\/event\/\w+/) != null && stripeContainer.children.length == 0) {
          registrationForm.classList.add('hidden');

          btn.click((e) => {
            $( registrationForm ).slideDown(600);
            registrationForm.classList.remove('hidden');
            $( e.target ).fadeOut();
          });
        }
      }

    }
  };

} (jQuery, Drupal));
