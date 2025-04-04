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
 * Transformer utility for retrieving comment data.
 *
 * @package   logstore_xapi
 * @copyright 2023 Daniela Rotelli <danielle.rotelli@gmail.com>
 * @license   https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace src\transformer\utils\get_activity;

use Exception;

/**
 * Transformer utility for retrieving comment data.
 *
 * @param array $config The transformer config settings.
 * @param string $lang The language of the course.
 * @param int $commentid The id of the comment.
 * @param string $component The component type.
 * @param int|null $cmid The course module id.
 * @return array
 */

function comment(array $config, string $lang, int $commentid, string $component, int $cmid=null): array {

    $repo = $config['repo'];

    try {
        $comment = $repo->read_record_by_id('comments', $commentid);
        $name = property_exists($comment, 'commentarea') ? $comment->commentarea : 'Comment';
        $description = 'the comment to the activity';

    } catch (Exception $e) {
        // OBJECT_NOT_FOUND.
        $name = 'comment id: ' . $commentid;
        $description = 'deleted';
    }

    $component = explode('_', $component)[1];
    if ($component == 'comments') {
        $url = $config['app_url'];
    } else {
        $url = $config['app_url'] . '/mod/' . $component . 'view.php?id=' . $cmid;
        try {
            $coursemodule = $repo->read_record_by_id('course_modules', $cmid);
            $status = $coursemodule->deletioninprogress;
            if ($status == 1) {
                $description = 'deletion in progress';
            }
        } catch (Exception $e) {
            // OBJECT_NOT_FOUND.
            unset($e);
        }
    }

    return [
        'id' => $url,
        'definition' => [
            'type' => 'http://activitystrea.ms/schema/1.0/comment',
            'name' => [
                $lang => 'comment in ' . $name,
            ],
            'description' => [
                $lang => $description,
            ],
        ],
    ];
}
