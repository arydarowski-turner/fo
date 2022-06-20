<?php

namespace Drupal\auth_dash\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\auth_dash\AuthDashOutput;

/**
 * Provides dashboard data in a Block.
 *
 * @Block(
 *   id = "auth_dash_block",
 *   admin_label = @Translation("Dashboard Block"),
 *   category = @Translation("Dashboard Block"),
 * )
 */

class AuthDashBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   *
   * The auth dashboard output service.
   *
   * @var \Drupal\auth_dash\AuthDashOutput
   *
   */

  protected $output;

  /**
   * AuthDashBlock constructor.
   * @param array $configuration
   * @param $plugin_id
   * @param $plugin_definition
   * @param \Drupal\auth_dash\AuthDashOutput $output
   */

  public function __construct(array $configuration, $plugin_id, $plugin_definition, AuthDashOutput $output) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->output = $output;
  }

  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
        $configuration,
        $plugin_id,
        $plugin_definition,
        $container->get('auth_dash.output')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->output->authDashOutput(),
    ];
  }

}
