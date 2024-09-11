<?php

add_shortcode('contact', 'show_contact_form');

add_action('rest_api_init', 'create_rest_endpoint');

add_action('init', 'create_submissions_page');

add_action('add_meta_boxes', 'create_meta_box');

function create_meta_box()
{

    add_meta_box('custom_contact_form', 'Submission', 'display_submission', 'submisstion');
}

function display_submission()
{
    $postmetas = get_post_meta(get_the_ID());

    unset($postmetas['_edit_lock']);

    echo '<ul>';
    foreach ($postmetas as $key => $value) {
        echo '<li><strong>' . ucfirst($key) . '</strong>:</br>' . $value[0] . '</li>';
    }

    echo '</ul>';
}

function create_submissions_page()
{
    $args = [
        'public' => true,
        'has_archive' => true,
        'labels' => [
            'name' => 'Submissions',
            'singular_name' => 'Submission',
        ],
        'supports' => false,
        // 'supports' => ['custom-fields']
        // 'capabilities' => ['create_posts' => 'do_not_allow']
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => 'do_not_allow'
        ),
        'map_meta_cap' => true
    ];
    register_post_type('submisstion', $args);
}

function show_contact_form()
{
    include MY_PLUGIN_PATH . '/includes/templates/contact-form.php';
}

function create_rest_endpoint()
{
    register_rest_route('my-plugin/v1', '/contact-form/submit', array(
        'methods' => 'POST',
        'callback' => 'handle_enquiry',
        'permission_callback' => '__return_true',  // Add this to avoid permission issues
    ));
}


function handle_enquiry($data)
{
    $params = $data->get_params();

    if (!wp_verify_nonce($params['_wpnonce'], 'wp_rest')) {
        return new WP_REST_Response('Message not sent', 422);
    }

    unset($params['_wpnonce']);
    unset($params['_wp_http_referer']);

    //send the email message
    $headers = [];

    $admin_email = get_bloginfo('admin_email');
    $admin_name = get_bloginfo('name');

    $headers[] = "From: {$admin_name} <{$admin_email}>";
    $headers[] = "Replay-to: {$params['name']} <{$params['email']}>";
    $headers[] = "Content-type: text/html";

    $subject = "New enquiry from {$params['name']}";

    $message = '';
    $message .= "<h1>Message has been sent from {$params['name']}</h1>";

    foreach ($params as $label => $value) {
        $message .= '<strong>' . ucfirst($label) . '</strong>: ' . $value . '<br>';
    }

    $postarr = [
        'post_title' => $params['name'],
        'post_type' => 'submisstion',
        'post_status' => 'publish',
    ];

    $post_id = wp_insert_post($postarr);

    foreach ($params as $label => $value) {
        $message .= '<strong>' . ucfirst($label) . '</strong>: ' . $value . '<br>';
        add_post_meta($post_id, $label, $value);
    }


    wp_mail($admin_email, $subject, $message, $headers);

    return new WP_REST_Response('The messsage was sent successfully', 200);
}
