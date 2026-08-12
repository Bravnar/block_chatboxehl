<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Block definition class for the block_chatboxehl plugin.
 *
 * @package    block_chatboxehl
 * @copyright  2026, Stanislav Muravyev <stanislav.muravyev@ehl.ch>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Block definition class for the block_chatboxehl plugin.
 */
class block_chatboxehl extends block_base
{
    /**
     * Initialises the block title.
     */
    public function init(): void {
        $this->title = get_string('pluginname', 'block_chatboxehl');
    }

    /**
     * Gets the block content.
     *
     * @return stdClass The block content.
     */
    public function get_content(): stdClass {
        global $OUTPUT;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->footer = '';

        $data = [
            'message' => get_string('welcome', 'block_chatboxehl'),
        ];

        $this->content->text = $OUTPUT->render_from_template('block_chatboxehl/content', $data);

        return $this->content;
    }

    /**
     * Defines where this block can be added.
     *
     * @return array Applicable formats.
     */
    public function applicable_formats(): array {
        return [
            'admin' => false,
            'site-index' => false,
            'course-view' => true,
            'mod' => false,
            'my' => true,
        ];
    }

    /**
     * Hides the default block header.
     *
     * @return bool Whether the block header should be hidden.
     */
    public function hide_header(): bool {
        return true;
    }
}
