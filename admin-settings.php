<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add meta box to quiz edit screen
function lp_custom_timer_meta_box() {
    add_meta_box(
        'lp_custom_timer',  // Unique ID
        __('Custom Quiz Timer', 'lp-custom-quiz-timer'),  // Title
        'lp_custom_timer_meta_box_callback',  // Callback function
        'lp_quiz',  // Post type (LearnPress quizzes)
        'side',  // Context (side panel)
        'high'  // Priority
    );
}
add_action('add_meta_boxes', 'lp_custom_timer_meta_box');

// Callback to display the meta box content
function lp_custom_timer_meta_box_callback($post) {
    // Security nonce
    wp_nonce_field('lp_custom_timer_nonce', 'lp_custom_timer_nonce');

    // Get existing value (in minutes)
    $duration = get_post_meta($post->ID, '_lp_custom_timer_duration', true);
    $duration_min = $duration ? round($duration / 60) : 0;

    // HTML for input
    ?>
    <label for="lp_custom_timer_duration"><?php _e('Timer Duration (minutes)', 'lp-custom-quiz-timer'); ?></label>
    <input type="number" id="lp_custom_timer_duration" name="lp_custom_timer_duration" value="<?php echo esc_attr($duration_min); ?>" min="0" step="1">
    <?php
}

// Save the meta data when quiz is saved
function lp_custom_timer_save_meta($post_id) {
    // Check nonce and permissions
    if (!isset($_POST['lp_custom_timer_nonce']) || !wp_verify_nonce($_POST['lp_custom_timer_nonce'], 'lp_custom_timer_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Save duration in seconds
    $duration_min = isset($_POST['lp_custom_timer_duration']) ? intval($_POST['lp_custom_timer_duration']) : 0;
    update_post_meta($post_id, '_lp_custom_timer_duration', $duration_min * 60);
}
add_action('save_post', 'lp_custom_timer_save_meta');