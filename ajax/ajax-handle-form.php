<?php
add_action('wp_ajax_form_submit', 'handle_contact_form_submit');
add_action('wp_ajax_nopriv_form_submit', 'handle_contact_form_submit');

function handle_contact_form_submit() {
    if ( isset($_POST['send_massage']) ) {
        $input_text = isset($_POST['input_text']) ? $_POST['input_text'] : [];
        $input_massage = isset($_POST['input_massage']) ? $_POST['input_massage'] : [];

        foreach ($input_text as $index => $text) {
            $text = sanitize_text_field($text);

            // $to = 'mohrajulrupom@gmail.com';
            // $subject = 'Contact Form Submission';
            // $body = 'Text: ' . $text . "\n" . 'Message: ' . $message;
            // $headers = 'From: demo@gmail.com';

            // $mail_sent = wp_mail($to, $subject, $body, $headers);
            
            // if ( !$mail_sent ) {
            //     wp_send_json_error('Error sending message.');
            //     return;
            // }
        }

        wp_send_json_success($text);
    } else {
        wp_send_json_error('No data received.');
    }
}
