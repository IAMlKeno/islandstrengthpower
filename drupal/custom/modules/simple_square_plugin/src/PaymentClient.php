<?php

namespace Drupal\simple_square_plugin;

interface PaymentClient {

  public function processPayment(string $json): array;

}
