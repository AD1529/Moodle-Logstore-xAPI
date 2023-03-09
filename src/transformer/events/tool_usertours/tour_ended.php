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
 * Transform for the tour ended event.
 *
 * @package   logstore_xapi
 * @copyright 2023 Daniela Rotelli <danielle.rotelli@gmail.com>
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace src\transformer\events\tool_usertours;

use src\transformer\utils as utils;

/**
 * Transformer for the tour ended event.
 *
 * @param array $config The transformer config settings.
 * @param \stdClass $event The event to be transformed.
 * @return array
 */

function tour_ended(array $config, \stdClass $event): array {

    $repo = $config['repo'];
    $user = $repo->read_record_by_id('user', $event->userid);
    $tour = $repo->read_record_by_id('tool_usertours_tours', $event->objectid);
    $lang = $config['source_lang'];

    return [[
        'actor' => utils\get_user($config, $user),
        'verb' => [
            'id' => 'http://adlnet.gov/expapi/verbs/terminated',
            'display' => [
                $lang => 'ended'
            ],
        ],
        'object' => utils\get_activity\tour($config, $tour, $lang),
        'timestamp' => utils\get_event_timestamp($event),
        'context' => [
            'platform' => $config['source_name'],
            'language' => $lang,
            'extensions' => utils\extensions\base($config, $event, null),
            'contextActivities' => [
                'grouping' => [
                    utils\get_activity\site($config),
                ],
                'category' => [
                    utils\get_activity\source($config),
                ]
            ],
        ]
    ]];
}
