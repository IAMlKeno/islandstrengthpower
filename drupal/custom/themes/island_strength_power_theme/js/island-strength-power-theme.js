/**
 * @file
 * Island Strength and Power Theme behaviors.
 */
(function (Drupal) {

  'use strict';

  Drupal.behaviors.islandStrengthPowerTheme = {
    attach (context, settings) {

      console.log('It works!');
      const registrationForm = document.getElementsByClassName('isp-registration-form').item(0);

      if (registrationForm != null) {
        console.log('It works!');
        registrationForm.classList.add('hidden');

      }

    }
  };

} (Drupal));
