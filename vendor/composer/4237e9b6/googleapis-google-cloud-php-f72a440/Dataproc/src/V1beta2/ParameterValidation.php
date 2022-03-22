<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataproc/v1beta2/workflow_templates.proto

namespace Google\Cloud\Dataproc\V1beta2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Configuration for parameter validation.
 *
 * Generated from protobuf message <code>google.cloud.dataproc.v1beta2.ParameterValidation</code>
 */
class ParameterValidation extends \Google\Protobuf\Internal\Message
{
    protected $validation_type;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Dataproc\V1beta2\RegexValidation $regex
     *           Validation based on regular expressions.
     *     @type \Google\Cloud\Dataproc\V1beta2\ValueValidation $values
     *           Validation based on a list of allowed values.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dataproc\V1Beta2\WorkflowTemplates::initOnce();
        parent::__construct($data);
    }

    /**
     * Validation based on regular expressions.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.RegexValidation regex = 1;</code>
     * @return \Google\Cloud\Dataproc\V1beta2\RegexValidation|null
     */
    public function getRegex()
    {
        return $this->readOneof(1);
    }

    public function hasRegex()
    {
        return $this->hasOneof(1);
    }

    /**
     * Validation based on regular expressions.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.RegexValidation regex = 1;</code>
     * @param \Google\Cloud\Dataproc\V1beta2\RegexValidation $var
     * @return $this
     */
    public function setRegex($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataproc\V1beta2\RegexValidation::class);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * Validation based on a list of allowed values.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.ValueValidation values = 2;</code>
     * @return \Google\Cloud\Dataproc\V1beta2\ValueValidation|null
     */
    public function getValues()
    {
        return $this->readOneof(2);
    }

    public function hasValues()
    {
        return $this->hasOneof(2);
    }

    /**
     * Validation based on a list of allowed values.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.ValueValidation values = 2;</code>
     * @param \Google\Cloud\Dataproc\V1beta2\ValueValidation $var
     * @return $this
     */
    public function setValues($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataproc\V1beta2\ValueValidation::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getValidationType()
    {
        return $this->whichOneof("validation_type");
    }

}

