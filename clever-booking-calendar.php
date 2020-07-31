<?php

/**
 *
 * @link              https://github.com/craneinteractive/clever-booking-calendar
 * @since             0.1.0
 * @package           CleverBookingCalendar
 *
 * @wordpress-plugin
 * Plugin Name:       Clever Booking Calendar
 * Plugin URI:        https://github.com/craneinteractive/clever-booking-calendar
 * Description:       A clever booking calendar system for WordPress
 * Version:           0.1.0
 * Author:            Crane Interactive
 * Author URI:        https://www.craneinteractive.co.uk
 * License:           GPL-2.0-or-later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cleverbookingcalendar
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) die;

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

define('PLUGIN_VERSION', '0.1.0');
define('CBC_SLUG', 'CICBC');

function clever_booking_calendar()
{
    static $plugin;

    if (isset($plugin) && $plugin instanceof \CleverBookingCalendar\Init) {
        return $plugin;
    }

    $containerBuilder = new Symfony\Component\DependencyInjection\ContainerBuilder();
    $containerBuilder->register('container', '\CleverBookingCalendar\Init');

    $plugin = $containerBuilder->get('container');
    $plugin->run();
}

clever_booking_calendar();
