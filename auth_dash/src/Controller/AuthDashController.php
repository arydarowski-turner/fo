<?php

namespace Drupal\auth_dash\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\auth_dash\AuthDashOutput;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for Auth Dashboard routes.
 */
class AuthDashController extends ControllerBase {

  /**
   *  AuthDashController constructor.
   *
   * @param \Drupal\auth_dash|AuthDashOutput $output
   */

  public function __construct(AuthDashOutput $output) {
    $this->output = $output;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('auth_dash.output')
    );
  }
  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->output->authDashOutput(),
    ];

    return $build;
  }

}
