<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Specifies what kind of log the caller must write
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.LogConfig</code>
 */
class LogConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Cloud audit options.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LogConfigCloudAuditOptions cloud_audit = 412852561;</code>
     */
    private $cloud_audit = null;
    /**
     * Counter options.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LogConfigCounterOptions counter = 420959740;</code>
     */
    private $counter = null;
    /**
     * Data access options.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LogConfigDataAccessOptions data_access = 286633881;</code>
     */
    private $data_access = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Compute\V1\LogConfigCloudAuditOptions $cloud_audit
     *           Cloud audit options.
     *     @type \Google\Cloud\Compute\V1\LogConfigCounterOptions $counter
     *           Counter options.
     *     @type \Google\Cloud\Compute\V1\LogConfigDataAccessOptions $data_access
     *           Data access options.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Cloud audit options.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LogConfigCloudAuditOptions cloud_audit = 412852561;</code>
     * @return \Google\Cloud\Compute\V1\LogConfigCloudAuditOptions|null
     */
    public function getCloudAudit()
    {
        return isset($this->cloud_audit) ? $this->cloud_audit : null;
    }

    public function hasCloudAudit()
    {
        return isset($this->cloud_audit);
    }

    public function clearCloudAudit()
    {
        unset($this->cloud_audit);
    }

    /**
     * Cloud audit options.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LogConfigCloudAuditOptions cloud_audit = 412852561;</code>
     * @param \Google\Cloud\Compute\V1\LogConfigCloudAuditOptions $var
     * @return $this
     */
    public function setCloudAudit($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\LogConfigCloudAuditOptions::class);
        $this->cloud_audit = $var;

        return $this;
    }

    /**
     * Counter options.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LogConfigCounterOptions counter = 420959740;</code>
     * @return \Google\Cloud\Compute\V1\LogConfigCounterOptions|null
     */
    public function getCounter()
    {
        return isset($this->counter) ? $this->counter : null;
    }

    public function hasCounter()
    {
        return isset($this->counter);
    }

    public function clearCounter()
    {
        unset($this->counter);
    }

    /**
     * Counter options.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LogConfigCounterOptions counter = 420959740;</code>
     * @param \Google\Cloud\Compute\V1\LogConfigCounterOptions $var
     * @return $this
     */
    public function setCounter($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\LogConfigCounterOptions::class);
        $this->counter = $var;

        return $this;
    }

    /**
     * Data access options.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LogConfigDataAccessOptions data_access = 286633881;</code>
     * @return \Google\Cloud\Compute\V1\LogConfigDataAccessOptions|null
     */
    public function getDataAccess()
    {
        return isset($this->data_access) ? $this->data_access : null;
    }

    public function hasDataAccess()
    {
        return isset($this->data_access);
    }

    public function clearDataAccess()
    {
        unset($this->data_access);
    }

    /**
     * Data access options.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LogConfigDataAccessOptions data_access = 286633881;</code>
     * @param \Google\Cloud\Compute\V1\LogConfigDataAccessOptions $var
     * @return $this
     */
    public function setDataAccess($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\LogConfigDataAccessOptions::class);
        $this->data_access = $var;

        return $this;
    }

}

