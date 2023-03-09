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
 * Transformer utility for retrieving (session report) activities.
 *
 * @package   logstore_xapi
 * @copyright 2023 Daniela Rotelli <danielle.rotelli@gmail.com>
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace src\transformer\utils\get_activity;

/**
 * Transformer utility for retrieving (session report) activities.
 *
 * @param array $config The transformer config settings.
 * @param int $instance The questionnaire id.
 * @param \stdClass $user The user object.
 * @param array $other The field other of the event.
 * @param string $lang The language of the questionnaire.
 * @return array
 */

function questionnaire_response(array $config, int $instance, \stdClass $user, array $other, string $lang): array {

    $individualresponse = 1;
    $byresponse = 1;

    $url = $config['app_url']
        . '/mod/questionnaire/myreport.php?instance=' . $instance
        . '&user=' . $user->id
        . '&action=' . $other['action']
        . '&byresponse=' . $byresponse
        . '&individualresponse=' . $individualresponse
        . '&rid=' . $other['rid']
        . '&group=' . $other['currentgroupid'];

    return [
        'id' => $url,
        'definition' => [
            'type' => 'http://activitystrea.ms/schema/1.0/page',
            'name' => [
                $lang => 'Response report',
            ],
        ],
    ];
}