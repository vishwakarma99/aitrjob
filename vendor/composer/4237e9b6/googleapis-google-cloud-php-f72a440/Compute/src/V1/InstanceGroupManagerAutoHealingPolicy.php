<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.InstanceGroupManagerAutoHealingPolicy</code>
 */
class InstanceGroupManagerAutoHealingPolicy extends \Google\Protobuf\Internal\Message
{
    /**
     * The URL for the health check that signals autohealing.
     *
     * Generated from protobuf field <code>string health_check = 308876645;</code>
     */
    private $health_check = null;
    /**
     * The number of seconds that the managed instance group waits before it applies autohealing policies to new instances or recently recreated instances. This initial delay allows instances to initialize and run their startup scripts before the instance group determines that they are UNHEALTHY. This prevents the managed instance group from recreating its instances prematurely. This value must be from range [0, 3600].
     *
     * Generated from protobuf field <code>int32 initial_delay_sec = 263207002;</code>
     */
    private $initial_delay_sec = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $health_check
     *           The URL for the health check that signals autohealing.
     *     @type int $initial_delay_sec
     *           The number of seconds that the managed instance group waits before it applies autohealing policies to new instances or recently recreated instances. This initial delay allows instances to initialize and run their startup scripts before the instance group determines that they are UNHEALTHY. This prevents the managed instance group from recreating its instances prematurely. This value must be from range [0, 3600].
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * The URL for the health check that signals autohealing.
     *
     * Generated from protobuf field <code>string health_check = 308876645;</code>
     * @return string
     */
    public function getHealthCheck()
    {
        return isset($this->health_check) ? $this->health_check : '';
    }

    public function hasHealthCheck()
    {
        return isset($this->health_check);
    }

    public function clearHealthCheck()
    {
        unset($this->health_check);
    }

    /**
     * The URL for the health check that signals autohealing.
     *
     * Generated from protobuf field <code>string health_check = 308876645;</code>
     * @param string $var
     * @return $this
     */
    public function setHealthCheck($var)
    {
        GPBUtil::checkString($var, True);
        $this->health_check = $var;

        return $this;
    }

    /**
     * The number of seconds that the managed instance group waits before it applies autohealing policies to new instances or recently recreated instances. This initial delay allows instances to initialize and run their startup scripts before the instance group determines that they are UNHEALTHY. This prevents the managed instance group from recreating its instances prematurely. This value must be from range [0, 3600].
     *
     * Generated from protobuf field <code>int32 initial_delay_sec = 263207002;</code>
     * @return int
     */
    public function getInitialDelaySec()
    {
        return isset($this->initial_delay_sec) ? $this->initial_delay_sec : 0;
    }

    public function hasInitialDelaySec()
    {
        return isset($this->initial_delay_sec);
    }

    public function clearInitialDelaySec()
    {
        unset($this->initial_delay_sec);
    }

    /**
     * The number of seconds that the managed instance group waits before it applies autohealing policies to new instances or recently recreated instances. This initial delay allows instances to initialize and run their startup scripts before the instance group determines that they are UNHEALTHY. This prevents the managed instance group from recreating its instances prematurely. This value must be from range [0, 3600].
     *
     * Generated from protobuf field <code>int32 initial_delay_sec = 263207002;</code>
     * @param int $var
     * @return $this
     */
    public function setInitialDelaySec($var)
    {
        GPBUtil::checkInt32($var);
        $this->initial_delay_sec = $var;

        return $this;
    }

}

