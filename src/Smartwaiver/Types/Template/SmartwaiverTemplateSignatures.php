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
 * Class SmartwaiverTemplateSignatures
 *
 * This class the settings for the signatures section of a Smartwaiver Template
 *
 * @package Smartwaiver\Types\Template
 */
class SmartwaiverTemplateSignatures extends SmartwaiverType implements SmartwaiverInputType
{
    const SIGNATURE_DRAW = 'draw';
    const SIGNATURE_TYPE = 'type';
    const SIGNATURE_CHOICE = 'choice';

    /**
     * The required fields in the constructor array to create this object
     */
    const REQUIRED_KEYS = [];

    /**
     * @var string The type of signature to use (see constants)
     */
    public $type;

    /**
     * @var boolean Whether minors must also sign
     */
    public $minor;

    /**
     * @var string If the participant can choose signing type, what is the default
     */
    public $defaultChoice;

    /**
     * Create a SmartwaiverTemplateSignatures object by providing an array with all
     * the required keys. See REQUIRED_KEYS for that information.
     *
     * @param array $signatures  The input array containing all the information
     *
     * @throws \InvalidArgumentException Thrown if any of the required keys are missing
     */
    public function __construct(array $signatures = [])
    {
        // Check for required keys
        parent::__construct($signatures, self::REQUIRED_KEYS, self::class);

        // Load all the information into public variables

        // Type
        if (isset($signatures['type']) && $signatures['type'] != '') {
            $this->type = $signatures['type'];
        }

        // Minor
        if (isset($signatures['minor'])) {
            $this->minor = $signatures['minor'] ? true : false;
        }

        // Default Choice
        if (isset($signatures['defaultChoice']) && $signatures['defaultChoice'] != '') {
            $this->defaultChoice = $signatures['defaultChoice'];
        }
    }

    /**
     * Return the array to be passed to the api representing this object
     *
     * @return \ArrayObject
     */
    public function apiArray() {
        $ret = new \ArrayObject();

        // Type
        if (isset($this->type) && $this->type != '') {
            $ret['type'] = $this->type;
        }

        // Minor
        if (isset($this->minor)) {
            $ret['minor'] = $this->minor ? true : false;
        }

        // Default Choice
        if (isset($this->defaultChoice) && $this->defaultChoice != '') {
            $ret['defaultChoice'] = $this->defaultChoice;
        }

        return $ret;
    }
}
