<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Commitment for a particular resource (a Commitment is composed of one or more of these).
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.ResourceCommitment</code>
 */
class ResourceCommitment extends \Google\Protobuf\Internal\Message
{
    /**
     * Name of the accelerator type resource. Applicable only when the type is ACCELERATOR.
     *
     * Generated from protobuf field <code>string accelerator_type = 138031246;</code>
     */
    private $accelerator_type = null;
    /**
     * The amount of the resource purchased (in a type-dependent unit, such as bytes). For vCPUs, this can just be an integer. For memory, this must be provided in MB. Memory must be a multiple of 256 MB, with up to 6.5GB of memory per every vCPU.
     *
     * Generated from protobuf field <code>int64 amount = 196759640;</code>
     */
    private $amount = null;
    /**
     * Type of resource for which this commitment applies. Possible values are VCPU and MEMORY
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.ResourceCommitment.Type type = 3575610;</code>
     */
    private $type = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $accelerator_type
     *           Name of the accelerator type resource. Applicable only when the type is ACCELERATOR.
     *     @type int|string $amount
     *           The amount of the resource purchased (in a type-dependent unit, such as bytes). For vCPUs, this can just be an integer. For memory, this must be provided in MB. Memory must be a multiple of 256 MB, with up to 6.5GB of memory per every vCPU.
     *     @type int $type
     *           Type of resource for which this commitment applies. Possible values are VCPU and MEMORY
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Name of the accelerator type resource. Applicable only when the type is ACCELERATOR.
     *
     * Generated from protobuf field <code>string accelerator_type = 138031246;</code>
     * @return string
     */
    public function getAcceleratorType()
    {
        return isset($this->accelerator_type) ? $this->accelerator_type : '';
    }

    public function hasAcceleratorType()
    {
        return isset($this->accelerator_type);
    }

    public function clearAcceleratorType()
    {
        unset($this->accelerator_type);
    }

    /**
     * Name of the accelerator type resource. Applicable only when the type is ACCELERATOR.
     *
     * Generated from protobuf field <code>string accelerator_type = 138031246;</code>
     * @param string $var
     * @return $this
     */
    public function setAcceleratorType($var)
    {
        GPBUtil::checkString($var, True);
        $this->accelerator_type = $var;

        return $this;
    }

    /**
     * The amount of the resource purchased (in a type-dependent unit, such as bytes). For vCPUs, this can just be an integer. For memory, this must be provided in MB. Memory must be a multiple of 256 MB, with up to 6.5GB of memory per every vCPU.
     *
     * Generated from protobuf field <code>int64 amount = 196759640;</code>
     * @return int|string
     */
    public function getAmount()
    {
        return isset($this->amount) ? $this->amount : 0;
    }

    public function hasAmount()
    {
        return isset($this->amount);
    }

    public function clearAmount()
    {
        unset($this->amount);
    }

    /**
     * The amount of the resource purchased (in a type-dependent unit, such as bytes). For vCPUs, this can just be an integer. For memory, this must be provided in MB. Memory must be a multiple of 256 MB, with up to 6.5GB of memory per every vCPU.
     *
     * Generated from protobuf field <code>int64 amount = 196759640;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAmount($var)
    {
        GPBUtil::checkInt64($var);
        $this->amount = $var;

        return $this;
    }

    /**
     * Type of resource for which this commitment applies. Possible values are VCPU and MEMORY
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.ResourceCommitment.Type type = 3575610;</code>
     * @return int
     */
    public function getType()
    {
        return isset($this->type) ? $this->type : 0;
    }

    public function hasType()
    {
        return isset($this->type);
    }

    public function clearType()
    {
        unset($this->type);
    }

    /**
     * Type of resource for which this commitment applies. Possible values are VCPU and MEMORY
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.ResourceCommitment.Type type = 3575610;</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Compute\V1\ResourceCommitment\Type::class);
        $this->type = $var;

        return $this;
    }

}

