<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.UrlMapsValidateResponse</code>
 */
class UrlMapsValidateResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>.google.cloud.compute.v1.UrlMapValidationResult result = 139315229;</code>
     */
    private $result = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Compute\V1\UrlMapValidationResult $result
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>.google.cloud.compute.v1.UrlMapValidationResult result = 139315229;</code>
     * @return \Google\Cloud\Compute\V1\UrlMapValidationResult|null
     */
    public function getResult()
    {
        return isset($this->result) ? $this->result : null;
    }

    public function hasResult()
    {
        return isset($this->result);
    }

    public function clearResult()
    {
        unset($this->result);
    }

    /**
     * Generated from protobuf field <code>.google.cloud.compute.v1.UrlMapValidationResult result = 139315229;</code>
     * @param \Google\Cloud\Compute\V1\UrlMapValidationResult $var
     * @return $this
     */
    public function setResult($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\UrlMapValidationResult::class);
        $this->result = $var;

        return $this;
    }

}

