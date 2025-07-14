=== Custom Quiz Timer for LearnPress ===
Contributors: ping-dev-ui
Tags: learnpress, quiz, timer, anti-cheat, lms, education, gamification, elearning
Requires at least: 6.0
Tested up to: 6.6
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a customizable timer with anti-cheat features to LearnPress quizzes, enhancing student engagement in niches like language learning or vocational skills training.

== Description ==
This plugin provides simple enhancements to LearnPress LMS quizzes, addressing gaps in automated tools for micro-courses. Key features include a per-quiz timer for timed assessments, auto-submission on timeout, and basic anti-cheat detection (e.g., tab switching) to ensure fair testing. Ideal for educators in language learning (e.g., vocabulary quizzes) or vocational skills (e.g., safety certifications), it boosts completion rates and adds gamification elements.

Features:
- Easy admin settings for custom timer duration per quiz.
- Frontend countdown display with visual styling for urgency.
- Anti-cheat mechanism that detects tab switches, alerts the user, and auto-submits the quiz.
- Auto-submission when time expires, preventing indefinite delays.
- Compatible with BuddyPress integrations for community-based learning.

Perfect for underserved sub-niches like H5P interactive content or AI-personalized quizzes. No additional dependencies required beyond LearnPress.

== Installation ==
1. Upload the `lp-custom-quiz-timer.zip` file to `/wp-content/plugins/` via WP Admin or FTP.
2. Activate the plugin in WP Admin > Plugins.
3. Edit a LearnPress quiz and set the timer duration in the new meta box on the side panel.
4. Test on a staging site before live use.

== Frequently Asked Questions ==
= Does this override the built-in LearnPress timer? =
Yes, it provides a custom alternative; set the default LearnPress duration to 0 to hide it.

= Can I customize the anti-cheat behavior? =
The basic version detects tab switches; premium upgrades could add more (e.g., fullscreen lock)—contact support for details.

= Is it compatible with other LearnPress add-ons? =
Tested with core LearnPress; compatible with most, but test for conflicts with quiz extensions.

== Screenshots ==
1. Admin meta box for setting the custom quiz timer duration (e.g., for a "Beginner Spanish Vocabulary Quiz").
2. Frontend timer display during a quiz, showing countdown above questions like "What is the Spanish word for 'hello'?".
3. Anti-cheat detection alert triggered on tab switch, with auto-submission.

== Changelog ==
= 1.0.0 =
* Initial release with core timer, anti-cheat, and auto-submit features.