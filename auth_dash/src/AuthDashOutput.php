<?php

namespace Drupal\auth_dash;

use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Link;


/**
 * AuthDashOutput service.
 */
class AuthDashOutput {

  /**
   * The date formatter.
   *
   * @var \Drupal\Core\Datetime\DateFormatterInterface
   */
  protected $dateFormatter;

  /*
   * @var \Drupal\Core\Config\ConfigFactoryInterface;
   */
  protected $configFactory;

  /**
   * Constructs an AuthDashOutput object.
   *
   * @param \Drupal\Core\Datetime\DateFormatterInterface $date_formatter
   *   The date formatter.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   */
  public function __construct(DateFormatterInterface $date_formatter, ConfigFactoryInterface $config_factory) {
    $this->dateFormatter = $date_formatter;
    $this->configFactory = $config_factory;
  }

  /**
   * Method description.
   */
  public function authDashOutput() {
    $current_user = \Drupal::currentUser();
    $user_display_name = $current_user->getDisplayName();
    $last_access = $current_user->getLastAccessedTime();
    //December 21st, 2012 9:01 am
    $format = 'F NS\, o g\:i a';
    $formatted_date = \Drupal::service('date.formatter')->format($last_access, 'custom', $format);
    $uid = $current_user->id();
    $account_page = '/user/' . $uid;
    $host = \Drupal::request()->getSchemeAndHttpHost();
    $config = $this->configFactory->get('auth_dash.settings');
    $welcome_message = $config->get('welcome_message');
    $welcome_text = isset($welcome_message) ? '</br>' . $welcome_message : '';


    return 'Hello ' . $user_display_name . '! <br> Your last log in was ' . $formatted_date . '. <br> <a href="'. $host . $account_page . '">Visit your profile </a>' . $welcome_text;
  }

}
