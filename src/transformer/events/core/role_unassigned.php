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
 * Transform for role unassigned event.
 *
 * @package   logstore_xapi
 * @copyright 2023 Daniela Rotelli <danielle.rotelli@gmail.com>
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

namespace src\transformer\events\core;

use Exception;
use src\transformer\utils as utils;

/**
 * Transformer for role unassigned event.
 *
 * @param array $config The transformer config settings.
 * @param \stdClass $event The event to be transformed.
 * @return array
 */

function role_unassigned(array $config, \stdClass $event): array {

    $repo = $config['repo'];
    $userid = $event->relateduserid;
    if ($userid < 2) {
        $userid = 1;
    }
    $user = $repo->read_record_by_id('user', $userid);
    try {
        $course = $repo->read_record_by_id('course', $event->courseid);
    } catch (Exception $e) {
        // OBJECT_NOT_FOUND.
        $course = $repo->read_record_by_id('course', 1);
    }
    $roleid = $event->objectid;
    $instructorid = $event->userid;
    if ($instructorid < 2) {
        $instructorid = 1;
    }
    $instructor = $repo->read_record_by_id('user', $instructorid);
    $lang = utils\get_course_lang($course);

    return[[
        'actor' => utils\get_user($config, $user),
        'verb' => [
            'id' => 'http://id.tincanapi.com/verb/unregistered',
            'display' => [
                $lang => 'has been unassigned'
            ],
        ],
        'object' => utils\get_role($config, $roleid, $lang),
        'timestamp' => utils\get_event_timestamp($event),
        'context' => [
            'platform' => $config['source_name'],
            'instructor' => utils\get_user($config, $instructor),
            'language' => $lang,
            'extensions' => utils\extensions\base($config, $event, $course),
            'contextActivities' => [
                'grouping' => [
                    utils\get_activity\site($config),
                    utils\get_activity\course($config, $course),
                ],
                'category' => [
                    utils\get_activity\source($config),
                ]
            ],
        ]
    ]];
}
