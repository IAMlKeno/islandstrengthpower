/**
 * @file
 * Island Strength and Power Theme behaviors.
 */
(function ($, Drupal) {

  'use strict';

  Drupal.behaviors.islandStrengthPowerTheme = {
    attach (context, settings) {
    //   const {
    //     publishableKey, clientSecret, webformId, clientEmail,
    //     clientName, collectAddress, addressType, appearanceEnabled, paymentAppearance,
    // } = drupalSettings.stripeWebformPayment;


      const registrationForm = document.getElementsByClassName('isp-registration-form').item(0);

      if (registrationForm != null) {
        console.log('It works!');
        const path = window.location.pathname;
        if (path.match(/\/event\/\w+/) != null) {
          // registrationForm.classList.add('hidden');
        }
      }



      // const btn = document.getElementById('registration-btn');
      const btn = $('#registration-btn');
      const val = document.getElementsByName('registration-val')[0].value;
      const nid = 4;
      const title = "New Powerlifting event";
      const form = document.getElementsByClassName('isp-registration-form').item(0);

      // btn.addEventListener('click', (e) => {
      btn.click((e) => {
        // const stripe = Stripe(publishableKey);
        // const paymentIntent = stripe.elements({});
        // console.log(`${paymentIntent}`);
        // console.log(`evt value: ${val}`);
        // console.log(`nid value: ${nid}`);
        // console.log(`title value: ${title}`);

        // if (form != null) {
        //   form.classList.remove('hidden');
        //   e.target.classList.add('hidden');
        // }
      });
    }
  };

} (jQuery, Drupal));
