<?php

namespace Drupal\simple_square_plugin;

use Square\Authentication\BearerAuthCredentialsBuilder;
use Square\Environment;
use Square\Exceptions\ApiException;
use Square\Models\Currency;
use Square\Models\Builders\CreatePaymentRequestBuilder;
use Square\Models\Builders\MoneyBuilder;
use Square\SquareClient as Client;
use Square\SquareClientBuilder;
use Square\Utils\ApiResponse;

/**
 * Class SquareClient.
 */
class SquareClient implements PaymentClient {

  /**
   * Square server token.
   */
  private const SQUARE_ACCESS_TOKEN = '';

  /**
   * The client.
   */
  protected Client $client;

  /**
   * The class constructor.
   */
  public function __construct() {
    $this->client = SquareClientBuilder::init()
      ->bearerAuthCredentials(
          BearerAuthCredentialsBuilder::init(
              self::SQUARE_ACCESS_TOKEN
              // getenv('SQUARE_ACCESS_TOKEN')
            )
      )
      ->environment(Environment::SANDBOX)
      ->build();
  }

  public function processPayment(string $json): array {
    try {
      $payment_obj = json_decode($json, TRUE);

      $body = CreatePaymentRequestBuilder::init(
        $payment_obj['sourceId'],
        $payment_obj['idempotencyKey']
      )
        ->amountMoney(
            MoneyBuilder::init()
                ->amount($payment_obj['amount'] ?? 1)
                ->currency(Currency::CAD)
                ->build()
        )
        ->autocomplete(true)
        ->locationId($payment_obj['locationId'])
        ->note($payment_obj['payment_note'] ?? 'Event registration')
        ->build();
      $payment_api = $this->client->getPaymentsApi();
      $apiResponse = $payment_api->createPayment($body);

      if ($apiResponse->isSuccess()) {
        $createPaymentResponse = $apiResponse->getResult();
      } else {
        $createPaymentResponse = $apiResponse->getErrors();
      }

      return [
        'message' => 'ok',
        'data' => $createPaymentResponse,
        'status' => $apiResponse->getStatusCode(),
      ];
    }
    catch (\Exception $e) {
      return [
        'message' => $e->getMessage(),
        'status' => 500,
      ];
    }
  }

}