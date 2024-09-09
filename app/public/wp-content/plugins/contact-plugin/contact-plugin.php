<?php

/**
 * Plugin Name: Contact Plugin
 * Description: A contact form plugin for WordPress
 * Version: 1.0.0
 * Text Domain: contact-plugin
 * Author: Min Su Wai
 */

if (!defined('ABSPATH')) {
}

if (!class_exists('ContactPlugin')) {
    class ContactPlugin
    {

        public function __construct()
        {
            define('MY_PLUGIN_PATH', plugin_dir_path(__FILE__));

            require_once(MY_PLUGIN_PATH . '/vendor/autoload.php');
        }

        public function initialize()
        {
            include_once MY_PLUGIN_PATH . '/includes/utilities.php';
            include_once MY_PLUGIN_PATH . '/includes/options-page.php';
        }
    }

    $contactPlugin = new ContactPlugin;

    $contactPlugin->initialize();
}
