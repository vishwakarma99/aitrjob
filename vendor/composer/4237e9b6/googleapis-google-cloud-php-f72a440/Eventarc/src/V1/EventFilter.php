<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/eventarc/v1/trigger.proto

namespace Google\Cloud\Eventarc\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Filters events based on exact matches on the CloudEvents attributes.
 *
 * Generated from protobuf message <code>google.cloud.eventarc.v1.EventFilter</code>
 */
class EventFilter extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The name of a CloudEvents attribute. Currently, only a subset of
     * attributes are supported for filtering.
     * All triggers MUST provide a filter for the 'type' attribute.
     *
     * Generated from protobuf field <code>string attribute = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $attribute = '';
    /**
     * Required. The value for the attribute.
     *
     * Generated from protobuf field <code>string value = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $value = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $attribute
     *           Required. The name of a CloudEvents attribute. Currently, only a subset of
     *           attributes are supported for filtering.
     *           All triggers MUST provide a filter for the 'type' attribute.
     *     @type string $value
     *           Required. The value for the attribute.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Eventarc\V1\Trigger::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The name of a CloudEvents attribute. Currently, only a subset of
     * attributes are supported for filtering.
     * All triggers MUST provide a filter for the 'type' attribute.
     *
     * Generated from protobuf field <code>string attribute = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Required. The name of a CloudEvents attribute. Currently, only a subset of
     * attributes are supported for filtering.
     * All triggers MUST provide a filter for the 'type' attribute.
     *
     * Generated from protobuf field <code>string attribute = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setAttribute($var)
    {
        GPBUtil::checkString($var, True);
        $this->attribute = $var;

        return $this;
    }

    /**
     * Required. The value for the attribute.
     *
     * Generated from protobuf field <code>string value = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Required. The value for the attribute.
     *
     * Generated from protobuf field <code>string value = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, True);
        $this->value = $var;

        return $this;
    }

}

