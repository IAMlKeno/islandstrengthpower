/**
 * @file
 * Island Strength and Power Theme behaviors.
 */
(function (Drupal) {

  'use strict';

  Drupal.behaviors.islandStrengthPowerTheme = {
    attach (context, settings) {

      const registrationForm = document.getElementsByClassName('isp-registration-form').item(0);

      if (registrationForm != null) {
        console.log('It works!');
        const path = window.location.pathname;
        if (path.match(/\/event\/\w+/) != null) {
          registrationForm.classList.add('hidden');
        }
      }
    }
  };

} (Drupal));
