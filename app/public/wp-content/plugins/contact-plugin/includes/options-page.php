<?php

use Carbon_Fields\Carbon_Fields;
use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

add_action('after_setup_theme', 'load_carbon_fields');
add_action('carbon_fields_register_fields', 'create_options_page');

function load_carbon_fields()
{
    Carbon_Fields::boot();
}

function create_options_page()
{
    Container::make('theme_options', __('Theme Options'))
        ->add_fields(array(
            Field::make('text', 'contact_plugin_recepients', __('Recipient Email')),
            Field::make('textarea', 'contact_plugin_message', __('Confirmation Message')),
        ));
}
