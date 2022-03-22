<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A condition to be met.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.Condition</code>
 */
class Condition extends \Google\Protobuf\Internal\Message
{
    /**
     * Trusted attributes supplied by the IAM system.
     *
     * Generated from protobuf field <code>string iam = 104021;</code>
     */
    private $iam = null;
    /**
     * An operator to apply the subject with.
     *
     * Generated from protobuf field <code>string op = 3553;</code>
     */
    private $op = null;
    /**
     * Trusted attributes discharged by the service.
     *
     * Generated from protobuf field <code>string svc = 114272;</code>
     */
    private $svc = null;
    /**
     * Trusted attributes supplied by any service that owns resources and uses the IAM system for access control.
     *
     * Generated from protobuf field <code>string sys = 114381;</code>
     */
    private $sys = null;
    /**
     * The objects of the condition.
     *
     * Generated from protobuf field <code>repeated string values = 249928994;</code>
     */
    private $values;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $iam
     *           Trusted attributes supplied by the IAM system.
     *     @type string $op
     *           An operator to apply the subject with.
     *     @type string $svc
     *           Trusted attributes discharged by the service.
     *     @type string $sys
     *           Trusted attributes supplied by any service that owns resources and uses the IAM system for access control.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $values
     *           The objects of the condition.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Trusted attributes supplied by the IAM system.
     *
     * Generated from protobuf field <code>string iam = 104021;</code>
     * @return string
     */
    public function getIam()
    {
        return isset($this->iam) ? $this->iam : '';
    }

    public function hasIam()
    {
        return isset($this->iam);
    }

    public function clearIam()
    {
        unset($this->iam);
    }

    /**
     * Trusted attributes supplied by the IAM system.
     *
     * Generated from protobuf field <code>string iam = 104021;</code>
     * @param string $var
     * @return $this
     */
    public function setIam($var)
    {
        GPBUtil::checkString($var, True);
        $this->iam = $var;

        return $this;
    }

    /**
     * An operator to apply the subject with.
     *
     * Generated from protobuf field <code>string op = 3553;</code>
     * @return string
     */
    public function getOp()
    {
        return isset($this->op) ? $this->op : '';
    }

    public function hasOp()
    {
        return isset($this->op);
    }

    public function clearOp()
    {
        unset($this->op);
    }

    /**
     * An operator to apply the subject with.
     *
     * Generated from protobuf field <code>string op = 3553;</code>
     * @param string $var
     * @return $this
     */
    public function setOp($var)
    {
        GPBUtil::checkString($var, True);
        $this->op = $var;

        return $this;
    }

    /**
     * Trusted attributes discharged by the service.
     *
     * Generated from protobuf field <code>string svc = 114272;</code>
     * @return string
     */
    public function getSvc()
    {
        return isset($this->svc) ? $this->svc : '';
    }

    public function hasSvc()
    {
        return isset($this->svc);
    }

    public function clearSvc()
    {
        unset($this->svc);
    }

    /**
     * Trusted attributes discharged by the service.
     *
     * Generated from protobuf field <code>string svc = 114272;</code>
     * @param string $var
     * @return $this
     */
    public function setSvc($var)
    {
        GPBUtil::checkString($var, True);
        $this->svc = $var;

        return $this;
    }

    /**
     * Trusted attributes supplied by any service that owns resources and uses the IAM system for access control.
     *
     * Generated from protobuf field <code>string sys = 114381;</code>
     * @return string
     */
    public function getSys()
    {
        return isset($this->sys) ? $this->sys : '';
    }

    public function hasSys()
    {
        return isset($this->sys);
    }

    public function clearSys()
    {
        unset($this->sys);
    }

    /**
     * Trusted attributes supplied by any service that owns resources and uses the IAM system for access control.
     *
     * Generated from protobuf field <code>string sys = 114381;</code>
     * @param string $var
     * @return $this
     */
    public function setSys($var)
    {
        GPBUtil::checkString($var, True);
        $this->sys = $var;

        return $this;
    }

    /**
     * The objects of the condition.
     *
     * Generated from protobuf field <code>repeated string values = 249928994;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * The objects of the condition.
     *
     * Generated from protobuf field <code>repeated string values = 249928994;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setValues($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->values = $arr;

        return $this;
    }

}

