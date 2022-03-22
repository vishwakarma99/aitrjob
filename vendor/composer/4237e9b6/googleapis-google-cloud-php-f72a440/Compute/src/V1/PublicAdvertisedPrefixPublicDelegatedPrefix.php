<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a CIDR range which can be used to assign addresses.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.PublicAdvertisedPrefixPublicDelegatedPrefix</code>
 */
class PublicAdvertisedPrefixPublicDelegatedPrefix extends \Google\Protobuf\Internal\Message
{
    /**
     * The IP address range of the public delegated prefix
     *
     * Generated from protobuf field <code>string ip_range = 145092645;</code>
     */
    private $ip_range = null;
    /**
     * The name of the public delegated prefix
     *
     * Generated from protobuf field <code>string name = 3373707;</code>
     */
    private $name = null;
    /**
     * The project number of the public delegated prefix
     *
     * Generated from protobuf field <code>string project = 227560217;</code>
     */
    private $project = null;
    /**
     * The region of the public delegated prefix if it is regional. If absent, the prefix is global.
     *
     * Generated from protobuf field <code>string region = 138946292;</code>
     */
    private $region = null;
    /**
     * The status of the public delegated prefix. Possible values are: INITIALIZING: The public delegated prefix is being initialized and addresses cannot be created yet. ANNOUNCED: The public delegated prefix is active.
     *
     * Generated from protobuf field <code>string status = 181260274;</code>
     */
    private $status = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $ip_range
     *           The IP address range of the public delegated prefix
     *     @type string $name
     *           The name of the public delegated prefix
     *     @type string $project
     *           The project number of the public delegated prefix
     *     @type string $region
     *           The region of the public delegated prefix if it is regional. If absent, the prefix is global.
     *     @type string $status
     *           The status of the public delegated prefix. Possible values are: INITIALIZING: The public delegated prefix is being initialized and addresses cannot be created yet. ANNOUNCED: The public delegated prefix is active.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * The IP address range of the public delegated prefix
     *
     * Generated from protobuf field <code>string ip_range = 145092645;</code>
     * @return string
     */
    public function getIpRange()
    {
        return isset($this->ip_range) ? $this->ip_range : '';
    }

    public function hasIpRange()
    {
        return isset($this->ip_range);
    }

    public function clearIpRange()
    {
        unset($this->ip_range);
    }

    /**
     * The IP address range of the public delegated prefix
     *
     * Generated from protobuf field <code>string ip_range = 145092645;</code>
     * @param string $var
     * @return $this
     */
    public function setIpRange($var)
    {
        GPBUtil::checkString($var, True);
        $this->ip_range = $var;

        return $this;
    }

    /**
     * The name of the public delegated prefix
     *
     * Generated from protobuf field <code>string name = 3373707;</code>
     * @return string
     */
    public function getName()
    {
        return isset($this->name) ? $this->name : '';
    }

    public function hasName()
    {
        return isset($this->name);
    }

    public function clearName()
    {
        unset($this->name);
    }

    /**
     * The name of the public delegated prefix
     *
     * Generated from protobuf field <code>string name = 3373707;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * The project number of the public delegated prefix
     *
     * Generated from protobuf field <code>string project = 227560217;</code>
     * @return string
     */
    public function getProject()
    {
        return isset($this->project) ? $this->project : '';
    }

    public function hasProject()
    {
        return isset($this->project);
    }

    public function clearProject()
    {
        unset($this->project);
    }

    /**
     * The project number of the public delegated prefix
     *
     * Generated from protobuf field <code>string project = 227560217;</code>
     * @param string $var
     * @return $this
     */
    public function setProject($var)
    {
        GPBUtil::checkString($var, True);
        $this->project = $var;

        return $this;
    }

    /**
     * The region of the public delegated prefix if it is regional. If absent, the prefix is global.
     *
     * Generated from protobuf field <code>string region = 138946292;</code>
     * @return string
     */
    public function getRegion()
    {
        return isset($this->region) ? $this->region : '';
    }

    public function hasRegion()
    {
        return isset($this->region);
    }

    public function clearRegion()
    {
        unset($this->region);
    }

    /**
     * The region of the public delegated prefix if it is regional. If absent, the prefix is global.
     *
     * Generated from protobuf field <code>string region = 138946292;</code>
     * @param string $var
     * @return $this
     */
    public function setRegion($var)
    {
        GPBUtil::checkString($var, True);
        $this->region = $var;

        return $this;
    }

    /**
     * The status of the public delegated prefix. Possible values are: INITIALIZING: The public delegated prefix is being initialized and addresses cannot be created yet. ANNOUNCED: The public delegated prefix is active.
     *
     * Generated from protobuf field <code>string status = 181260274;</code>
     * @return string
     */
    public function getStatus()
    {
        return isset($this->status) ? $this->status : '';
    }

    public function hasStatus()
    {
        return isset($this->status);
    }

    public function clearStatus()
    {
        unset($this->status);
    }

    /**
     * The status of the public delegated prefix. Possible values are: INITIALIZING: The public delegated prefix is being initialized and addresses cannot be created yet. ANNOUNCED: The public delegated prefix is active.
     *
     * Generated from protobuf field <code>string status = 181260274;</code>
     * @param string $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkString($var, True);
        $this->status = $var;

        return $this;
    }

}
