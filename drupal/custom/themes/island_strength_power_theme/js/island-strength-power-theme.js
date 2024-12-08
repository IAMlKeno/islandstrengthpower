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
        const path = window.location.pathname;
        if (path.match(/\/event\/\w+/) != null) {
          registrationForm.classList.add('hidden');
        }
      }

      const paymentContainer = document.getElementsByClassName('payment-container').item(0);
      if (paymentContainer != null) {
        // const html = '<h2>Payment-Container</h2>';
        // const iframe = document.createElement('iframe');
        // // iframe.src = 'data:text/html;charset=utf-8,' + encodeURI(html);
        // iframe.src = `/simple-square-plugin/req-payment/45/ISPEvent`;
        // paymentContainer.appendChild(iframe);
      }

    }
  };

} (Drupal));
