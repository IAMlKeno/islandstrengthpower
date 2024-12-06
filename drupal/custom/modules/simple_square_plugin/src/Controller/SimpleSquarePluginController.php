<?php

declare(strict_types=1);

namespace Drupal\simple_square_plugin\Controller;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\simple_square_plugin\SquareClient;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Returns responses for Simple square plugin routes.
 */
final class SimpleSquarePluginController extends ControllerBase {

  /**
   * The controller constructor.
   */
  public function __construct(
    // private readonly ConfigFactoryInterface $configFactory,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): self {
    return new self(
      // $container->get('config.factory'),
    );
  }

  /**
   * Builds the response.
   */
  public function __invoke(): array {
    $build = [
      '#theme' => 'simple_square_portal',
      '#output' => 'test',
      '#attached' => [
        'library' => [
          'simple_square_plugin/simple_square_lib',
        ],
      ],
    ];

    return $build;
  }

  /**
   * Receive and process the payment.
   *
   * @param Request $req
   */
  public function processPayment(Request $req) {
    $square = new SquareClient();
    $response = $square->processPayment($req->getContent());

    return new JsonResponse($response, $response['status']);
  }

}
