<?php
/**
 * Copyright 2018 Smartwaiver
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

namespace Smartwaiver\Types\Template;

use Smartwaiver\Types\SmartwaiverInputType;
use Smartwaiver\Types\SmartwaiverType;

/**
 * Class SmartwaiverTemplateHeader
 *
 * This class the settings for the header section of a Smartwaiver Template
 *
 * @package Smartwaiver\Types\Template
 */
class SmartwaiverTemplateHeader extends SmartwaiverType implements SmartwaiverInputType
{
    /**
     * The required fields in the constructor array to create this object
     */
    const REQUIRED_KEYS = [];

    /**
    /**
     * @var string The base 64 encoded image to be shown as the logo
     */
    public $logoImage;

    /**
     * @var string The text of the header
     */
    public $text;

    /**
     * Create a SmartwaiverTemplateHeader object by providing an array with all
     * the required keys. See REQUIRED_KEYS for that information.
     *
     * @param array $header  The input array containing all the information
     *
     * @throws \InvalidArgumentException Thrown if any of the required keys are missing
     */
    public function __construct(array $header = [])
    {
        // Check for required keys
        parent::__construct($header, self::REQUIRED_KEYS, self::class);

        // Load all the information into public variables

        // Logo Image
        if (isset($header['logo']) && isset($header['logo']['image']) && $header['logo']['image'] != '') {
            $this->logoImage = $header['logo']['image'];
        }

        // Text
        if (isset($header['text']) && $header['text'] != '') {
            $this->text = $header['text'];
        }
    }

    /**
     * Return the array to be passed to the api representing this object
     *
     * @return \ArrayObject
     */
    public function apiArray() {
        $ret = new \ArrayObject();

        // Logo Image
        if (isset($this->logoImage) && $this->logoImage != '') {
            $ret['logo'] = [
                'image' => $this->logoImage
            ];
        }

        // Text
        if (isset($this->text) && $this->text != '') {
            $ret['text'] = $this->text;
        }

        return $ret;
    }
}
