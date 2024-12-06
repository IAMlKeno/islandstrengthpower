<?php

declare(strict_types=1);

namespace Drupal\simple_square_plugin\Controller;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * Returns responses for Simple square plugin routes.
 */
final class SimpleSquarePluginController extends ControllerBase {

  public const SQUARE_APP_ID = 'sandbox-sq0idb-LQ50O2bQ13-QByK-T2eeeg';
  public const SQUARE_TOKEN = 'EAAAl9wj9hn92z-WK6dCNnTKQb7q79JQ62SMxdb5g301lsIluUKl1unDpxR5TzeL';
  public const SQUARE_LOCATION = 'LR97C0MXRZ3TQ';

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

    $build['content'] = [
      '#type' => 'item',
      '#markup' => '<div class="square-viewport"><div id="card-container">Card container!</div></div>',
      '#attached' => [
        'library' => [
          'simple_square_plugin/simple_square_lib',
        ],
      ],
    ];

    return $build;
  }

}
