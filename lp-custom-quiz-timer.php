<?php
/*
Plugin Name: Custom Quiz Timer for LearnPress
Plugin URI: https://yourwebsite.com (optional)
Description: Adds a custom timer with anti-cheat features to LearnPress quizzes.
Version: 1.0.0
Author: Your Name
Author URI: https://yourwebsite.com (optional)
License: GPL-2.0+
*/

// Prevent direct access to this file for security
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Load admin settings
require_once plugin_dir_path(__FILE__) . 'admin-settings.php';

// Display the timer on the quiz page
function lp_custom_timer_display() {
    $quiz_id = LP_Global::course_item() ? LP_Global::course_item()->get_id() : 0;
    $duration = get_post_meta($quiz_id, '_lp_custom_timer_duration', true);
    if ($duration > 0) {
        echo '<div id="lp-custom-timer" class="quiz-timer">
                <span id="lp-timer-countdown"></span>
                <span class="timer-label">Time Remaining</span>
              </div>';
    }
}
add_action('learn-press/before-content-item-summary/lp_quiz', 'lp_custom_timer_display');

// Enqueue styles and scripts only on quiz pages
function lp_custom_timer_enqueue_assets() {
    if ( learn_press_is_course() && LP_Global::course_item() && LP_Global::course_item()->get_item_type() == 'lp_quiz' ) {
        wp_enqueue_style('lp-custom-timer-css', plugin_dir_url(__FILE__) . 'style.css', array(), '1.0.0');
        wp_enqueue_script('lp-custom-timer-js', plugin_dir_url(__FILE__) . 'frontend-timer.js', array('jquery'), '1.0.0', true);
        
        // Pass duration data to JS
        $quiz_id = LP_Global::course_item() ? LP_Global::course_item()->get_id() : 0;
        $duration = get_post_meta($quiz_id, '_lp_custom_timer_duration', true);
        wp_localize_script('lp-custom-timer-js', 'lpTimerData', array(
            'duration' => $duration ? intval($duration) : 0,
            'quizId' => $quiz_id,
        ));
    }
}
add_action('wp_enqueue_scripts', 'lp_custom_timer_enqueue_assets');