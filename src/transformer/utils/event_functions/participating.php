<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * List of participating events.
 *
 * @package   logstore_xapi
 * @copyright 2023 Daniela Rotelli <danielle.rotelli@gmail.com>
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace src\transformer\utils\event_functions;

/**
 * Return a list of events whose educational level is participating.
 *
 * @return array
 */

function participating(): array {

    return [

        // Core.
        '\core\event\badge_listing_viewed' => 'core\badge_listing_viewed',
        '\core\event\badge_viewed' => 'core\badge_viewed',
        '\core\event\course_completed' => 'core\course_completed',
        '\core\event\course_information_viewed' => 'core\course_information_viewed',
        '\core\event\course_module_completion_updated' => 'core\course_module_completion_updated',
        '\core\event\courses_searched' => 'core\courses_searched',
        '\core\event\course_user_report_viewed' => 'core\course_user_report_viewed',
        '\core\event\course_viewed' => 'core\course_viewed',
        '\core\event\recent_activity_viewed' => 'core\recent_activity_viewed',

        // Assign.
        '\mod_assign\event\assessable_submitted' => 'mod_assign\assignment_submitted',
        '\mod_assign\event\submission_graded' => 'mod_assign\assignment_graded',
        '\mod_assign\event\course_module_viewed' => 'mod_assign\course_module_viewed',
        '\mod_assign\event\feedback_viewed' => 'mod_assign\feedback_viewed',

        // Assign submission file.
        '\assignsubmission_file\event\assessable_uploaded' => 'assignsubmission_file\assessable_uploaded',
        '\assignsubmission_file\event\submission_created' => 'assignsubmission_file\submission_created',
        '\assignsubmission_file\event\submission_updated' => 'assignsubmission_file\submission_updated',

        // Assign submission online text.
        '\assignsubmission_onlinetext\event\assessable_uploaded' => 'assignsubmission_onlinetext\assessable_uploaded',
        '\assignsubmission_onlinetext\event\submission_created' => 'assignsubmission_onlinetext\submission_created',
        '\assignsubmission_onlinetext\event\submission_updated' => 'assignsubmission_onlinetext\submission_updated',

        // Attendance.
        '\mod_attendance\event\attendance_taken_by_student' => 'mod_attendance\attendance_taken_by_student',
        '\mod_attendance\event\session_report_viewed' => 'mod_attendance\session_report_viewed',

        // Bigbluebutton.
        '\mod_bigbluebuttonbn\event\activity_viewed' => 'mod_bigbluebuttonbn\activity_viewed',
        '\mod_bigbluebuttonbn\event\activity_management_viewed' => 'mod_bigbluebuttonbn\activity_management_viewed',
        '\mod_bigbluebuttonbn\event\live_session_event' => 'mod_bigbluebuttonbn\live_session',
        '\mod_bigbluebuttonbn\event\meeting_created' => 'mod_bigbluebuttonbn\meeting_created',
        '\mod_bigbluebuttonbn\event\meeting_ended' => 'mod_bigbluebuttonbn\meeting_ended',
        '\mod_bigbluebuttonbn\event\meeting_joined' => 'mod_bigbluebuttonbn\meeting_joined',
        '\mod_bigbluebuttonbn\event\meeting_left' => 'mod_bigbluebuttonbn\meeting_left',
        '\mod_bigbluebuttonbn\event\recording_deleted' => 'mod_bigbluebuttonbn\recording_deleted',
        '\mod_bigbluebuttonbn\event\recording_edited' => 'mod_bigbluebuttonbn\recording_edited',
        '\mod_bigbluebuttonbn\event\recording_imported' => 'mod_bigbluebuttonbn\recording_imported',
        '\mod_bigbluebuttonbn\event\recording_protected' => 'mod_bigbluebuttonbn\recording_protected',
        '\mod_bigbluebuttonbn\event\recording_published' => 'mod_bigbluebuttonbn\recording_published',
        '\mod_bigbluebuttonbn\event\recording_unprotected' => 'mod_bigbluebuttonbn\recording_unprotected',
        '\mod_bigbluebuttonbn\event\recording_unpublished' => 'mod_bigbluebuttonbn\recording_unpublished',
        '\mod_bigbluebuttonbn\event\recording_viewed' => 'mod_bigbluebuttonbn\recording_viewed',

        // Book.
        '\mod_book\event\course_module_viewed' => 'mod_book\course_module_viewed',
        '\mod_book\event\chapter_viewed' => 'mod_book\chapter_viewed',
        '\booktool_print\event\book_printed' => 'mod_book\book_printed',
        '\booktool_print\event\chapter_printed' => 'mod_book\chapter_printed',

        // Chat.
        '\mod_chat\event\course_module_viewed' => 'mod_chat\course_module_viewed',
        '\mod_chat\event\message_sent' => 'mod_chat\message_sent',

        // Checklist.
        '\mod_checklist\event\course_module_viewed' => 'mod_checklist\course_module_viewed',
        '\mod_checklist\event\checklist_completed' => 'mod_checklist\checklist_completed',
        '\mod_checklist\event\student_checks_updated' => 'mod_checklist\student_checks_updated',

        // Choice.
        '\mod_choice\event\course_module_viewed' => 'mod_choice\course_module_viewed',
        '\mod_choice\event\answer_created' => 'mod_choice\answer_created',
        '\mod_choice\event\answer_deleted' => 'mod_choice\answer_deleted',

        // Choice group.
        '\mod_choicegroup\event\choice_removed' => 'mod_choicegroup\choice_removed',
        '\mod_choicegroup\event\choice_updated' => 'mod_choicegroup\choice_updated',

        // Database.
        '\mod_data\event\course_module_viewed' => 'mod_data\course_module_viewed',
        '\mod_data\event\comment_created' => 'mod_data\comment_created',
        '\mod_data\event\comment_deleted' => 'mod_data\comment_deleted',

        // Facetoface.
        '\mod_facetoface\event\cancel_booking' => 'mod_facetoface\cancel_booking',
        '\mod_facetoface\event\course_module_viewed' => 'mod_facetoface\course_module_viewed',
        '\mod_facetoface\event\signup_success' => 'mod_facetoface\signup_success',
        '\mod_facetoface\event\take_attendance' => 'mod_facetoface\take_attendance',

        // Feedback.
        '\mod_feedback\event\course_module_viewed' => 'mod_feedback\course_module_viewed',
        '\mod_feedback\event\response_submitted' => 'mod_feedback\response_submitted\handler',
        '\mod_feedback\event\response_deleted' => 'mod_feedback\response_deleted',

        // Folder.
        '\mod_folder\event\course_module_viewed' => 'mod_folder\course_module_viewed',
        '\mod_folder\event\all_files_downloaded' => 'mod_folder\all_files_downloaded',

        // Forum.
        '\mod_forum\event\assessable_uploaded' => 'mod_forum\assessable_uploaded',
        '\mod_forum\event\course_module_viewed' => 'mod_forum\course_module_viewed',
        '\mod_forum\event\course_searched' => 'mod_forum\course_searched',
        '\mod_forum\event\discussion_created' => 'mod_forum\discussion_created',
        '\mod_forum\event\discussion_viewed' => 'mod_forum\discussion_viewed',
        '\mod_forum\event\discussion_subscription_created' => 'mod_forum\discussion_subscription_created',
        '\mod_forum\event\discussion_subscription_deleted' => 'mod_forum\discussion_subscription_deleted',
        '\mod_forum\event\post_created' => 'mod_forum\post_created',
        '\mod_forum\event\post_updated' => 'mod_forum\post_updated',
        '\mod_forum\event\subscription_created' => 'mod_forum\subscription_created',
        '\mod_forum\event\subscription_deleted' => 'mod_forum\subscription_deleted',
        '\mod_forum\event\user_report_viewed' => 'mod_forum\user_report_viewed',

        // Glossary.
        '\mod_glossary\event\course_module_viewed' => 'mod_glossary\course_module_viewed',

        // Grade report.
        '\gradereport_overview\event\grade_report_viewed' => 'gradereport_overview\grade_report_viewed',
        '\gradereport_user\event\grade_report_viewed' => 'gradereport_user\grade_report_viewed',

        // Group choice.
        '\mod_choicegroup\event\course_module_viewed' => 'all\course_module_viewed',

        // H5P activity.
        '\mod_h5pactivity\event\course_module_viewed' => 'mod_h5pactivity\course_module_viewed',
        '\mod_h5pactivity\event\report_viewed' => 'mod_h5pactivity\report_viewed',
        '\mod_h5pactivity\event\statement_received' => 'mod_h5pactivity\statement_received',

        // Imscp.
        '\mod_imscp\event\course_module_viewed' => 'all\course_module_viewed',

        // Lesson.
        '\mod_lesson\event\course_module_viewed' => 'mod_lesson\course_module_viewed',
        '\mod_lesson\event\content_page_viewed' => 'mod_lesson\content_page_viewed',
        '\mod_lesson\event\lesson_ended' => 'mod_lesson\lesson_ended',
        '\mod_lesson\event\lesson_restarted' => 'mod_lesson\lesson_restarted',
        '\mod_lesson\event\lesson_resumed' => 'mod_lesson\lesson_resumed',
        '\mod_lesson\event\lesson_started' => 'mod_lesson\lesson_started',
        '\mod_lesson\event\question_answered' => 'mod_lesson\question_answered',
        '\mod_lesson\event\question_viewed' => 'mod_lesson\question_viewed',

        // Lti.
        '\mod_lti\event\course_module_viewed' => 'mod_lti\course_module_viewed',

        // Page.
        '\mod_page\event\course_module_viewed' => 'mod_page\course_module_viewed',

        // Questionnaire.
        '\mod_questionnaire\event\course_module_viewed' => 'mod_questionnaire\course_module_viewed',
        '\mod_questionnaire\event\attempt_saved' => 'mod_questionnaire\attempt_saved',
        '\mod_questionnaire\event\attempt_submitted' => 'mod_questionnaire\attempt_submitted',
        '\mod_questionnaire\event\response_viewed' => 'mod_questionnaire\response_viewed',

        // Quiz.
        '\mod_quiz\event\course_module_viewed' => 'mod_quiz\course_module_viewed',
        '\mod_quiz\event\attempt_abandoned' => 'mod_quiz\attempt_submitted\handler',
        '\mod_quiz\event\attempt_started' => 'mod_quiz\attempt_started',
        '\mod_quiz\event\attempt_reviewed' => 'mod_quiz\attempt_reviewed',
        '\mod_quiz\event\attempt_submitted' => 'mod_quiz\attempt_submitted\handler',
        '\mod_quiz\event\attempt_summary_viewed' => 'mod_quiz\attempt_summary_viewed',
        '\mod_quiz\event\attempt_viewed' => 'mod_quiz\attempt_viewed',

        // Resource (file).
        '\mod_resource\event\course_module_viewed' => 'mod_resource\course_module_viewed',

        // Scorm.
        '\mod_scorm\event\course_module_viewed' => 'mod_scorm\course_module_viewed',
        '\mod_scorm\event\sco_launched' => 'mod_scorm\sco_launched',
        '\mod_scorm\event\scoreraw_submitted' => 'mod_scorm\scoreraw_submitted',
        '\mod_scorm\event\status_submitted' => 'mod_scorm\status_submitted',

        // Survey.
        '\mod_survey\event\course_module_viewed' => 'mod_survey\course_module_viewed',
        '\mod_survey\event\response_submitted' => 'mod_survey\response_submitted',

        // Tool user tours.
        '\tool_usertours\event\tour_ended' => 'tool_usertours\tour_ended',
        '\tool_usertours\event\tour_started'=> 'tool_usertours\tour_started',

        // Url.
        '\mod_url\event\course_module_viewed' => 'mod_url\course_module_viewed',

        // Wiki.
        '\mod_wiki\event\course_module_viewed' => 'mod_wiki\course_module_viewed',

        // Wooclap.
        '\mod_wooclap\event\course_module_viewed' => 'all\course_module_viewed',

        // Workshop.
        '\mod_workshop\event\course_module_viewed' => 'mod_workshop\course_module_viewed',
        '\mod_workshop\event\assessable_uploaded' => 'mod_workshop\assessable_uploaded',
        '\mod_workshop\event\submission_assessed' => 'mod_workshop\submission_assessed',
        '\mod_workshop\event\submission_created' => 'mod_workshop\submission_created',
        '\mod_workshop\event\submission_deleted' => 'mod_workshop\submission_deleted',
        '\mod_workshop\event\submission_reassessed' => 'mod_workshop\submission_reassessed',
        '\mod_workshop\event\submission_updated' => 'mod_workshop\submission_updated',
        '\mod_workshop\event\submission_viewed' => 'mod_workshop\submission_viewed',

        // Totara.
        '\totara_program\event\program_assigned' => 'totara_program\program_assigned'
    ];
}
