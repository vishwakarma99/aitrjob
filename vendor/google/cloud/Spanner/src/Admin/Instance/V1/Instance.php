<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/spanner/admin/instance/v1/spanner_instance_admin.proto

namespace Google\Cloud\Spanner\Admin\Instance\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An isolated set of Cloud Spanner resources on which databases can be hosted.
 *
 * Generated from protobuf message <code>google.spanner.admin.instance.v1.Instance</code>
 */
class Instance extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. A unique identifier for the instance, which cannot be changed
     * after the instance is created. Values are of the form
     * `projects/<project>/instances/[a-z][-a-z0-9]*[a-z0-9]`. The final
     * segment of the name must be between 2 and 64 characters in length.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * Required. The name of the instance's configuration. Values are of the form
     * `projects/<project>/instanceConfigs/<configuration>`. See
     * also [InstanceConfig][google.spanner.admin.instance.v1.InstanceConfig] and
     * [ListInstanceConfigs][google.spanner.admin.instance.v1.InstanceAdmin.ListInstanceConfigs].
     *
     * Generated from protobuf field <code>string config = 2 [(.google.api.resource_reference) = {</code>
     */
    private $config = '';
    /**
     * Required. The descriptive name for this instance as it appears in UIs.
     * Must be unique per project and between 4 and 30 characters in length.
     *
     * Generated from protobuf field <code>string display_name = 3;</code>
     */
    private $display_name = '';
    /**
     * Required. The number of nodes allocated to this instance. This may be zero
     * in API responses for instances that are not yet in state `READY`.
     * See [the
     * documentation](https://cloud.google.com/spanner/docs/instances#node_count)
     * for more information about nodes.
     *
     * Generated from protobuf field <code>int32 node_count = 5;</code>
     */
    private $node_count = 0;
    /**
     * The number of processing units allocated to this instance. At most one of
     * processing_units or node_count should be present in the message. This may
     * be zero in API responses for instances that are not yet in state `READY`.
     *
     * Generated from protobuf field <code>int32 processing_units = 9;</code>
     */
    private $processing_units = 0;
    /**
     * Output only. The current instance state. For
     * [CreateInstance][google.spanner.admin.instance.v1.InstanceAdmin.CreateInstance], the state must be
     * either omitted or set to `CREATING`. For
     * [UpdateInstance][google.spanner.admin.instance.v1.InstanceAdmin.UpdateInstance], the state must be
     * either omitted or set to `READY`.
     *
     * Generated from protobuf field <code>.google.spanner.admin.instance.v1.Instance.State state = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Cloud Labels are a flexible and lightweight mechanism for organizing cloud
     * resources into groups that reflect a customer's organizational needs and
     * deployment strategies. Cloud Labels can be used to filter collections of
     * resources. They can be used to control how resource metrics are aggregated.
     * And they can be used as arguments to policy management rules (e.g. route,
     * firewall, load balancing, etc.).
     *  * Label keys must be between 1 and 63 characters long and must conform to
     *    the following regular expression: `[a-z]([-a-z0-9]*[a-z0-9])?`.
     *  * Label values must be between 0 and 63 characters long and must conform
     *    to the regular expression `([a-z]([-a-z0-9]*[a-z0-9])?)?`.
     *  * No more than 64 labels can be associated with a given resource.
     * See https://goo.gl/xmQnxf for more information on and examples of labels.
     * If you plan to use labels in your own code, please note that additional
     * characters may be allowed in the future. And so you are advised to use an
     * internal label representation, such as JSON, which doesn't rely upon
     * specific characters being disallowed.  For example, representing labels
     * as the string:  name + "_" + value  would prove problematic if we were to
     * allow "_" in a future release.
     *
     * Generated from protobuf field <code>map<string, string> labels = 7;</code>
     */
    private $labels;
    /**
     * Deprecated. This field is not populated.
     *
     * Generated from protobuf field <code>repeated string endpoint_uris = 8;</code>
     */
    private $endpoint_uris;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Required. A unique identifier for the instance, which cannot be changed
     *           after the instance is created. Values are of the form
     *           `projects/<project>/instances/[a-z][-a-z0-9]*[a-z0-9]`. The final
     *           segment of the name must be between 2 and 64 characters in length.
     *     @type string $config
     *           Required. The name of the instance's configuration. Values are of the form
     *           `projects/<project>/instanceConfigs/<configuration>`. See
     *           also [InstanceConfig][google.spanner.admin.instance.v1.InstanceConfig] and
     *           [ListInstanceConfigs][google.spanner.admin.instance.v1.InstanceAdmin.ListInstanceConfigs].
     *     @type string $display_name
     *           Required. The descriptive name for this instance as it appears in UIs.
     *           Must be unique per project and between 4 and 30 characters in length.
     *     @type int $node_count
     *           Required. The number of nodes allocated to this instance. This may be zero
     *           in API responses for instances that are not yet in state `READY`.
     *           See [the
     *           documentation](https://cloud.google.com/spanner/docs/instances#node_count)
     *           for more information about nodes.
     *     @type int $processing_units
     *           The number of processing units allocated to this instance. At most one of
     *           processing_units or node_count should be present in the message. This may
     *           be zero in API responses for instances that are not yet in state `READY`.
     *     @type int $state
     *           Output only. The current instance state. For
     *           [CreateInstance][google.spanner.admin.instance.v1.InstanceAdmin.CreateInstance], the state must be
     *           either omitted or set to `CREATING`. For
     *           [UpdateInstance][google.spanner.admin.instance.v1.InstanceAdmin.UpdateInstance], the state must be
     *           either omitted or set to `READY`.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Cloud Labels are a flexible and lightweight mechanism for organizing cloud
     *           resources into groups that reflect a customer's organizational needs and
     *           deployment strategies. Cloud Labels can be used to filter collections of
     *           resources. They can be used to control how resource metrics are aggregated.
     *           And they can be used as arguments to policy management rules (e.g. route,
     *           firewall, load balancing, etc.).
     *            * Label keys must be between 1 and 63 characters long and must conform to
     *              the following regular expression: `[a-z]([-a-z0-9]*[a-z0-9])?`.
     *            * Label values must be between 0 and 63 characters long and must conform
     *              to the regular expression `([a-z]([-a-z0-9]*[a-z0-9])?)?`.
     *            * No more than 64 labels can be associated with a given resource.
     *           See https://goo.gl/xmQnxf for more information on and examples of labels.
     *           If you plan to use labels in your own code, please note that additional
     *           characters may be allowed in the future. And so you are advised to use an
     *           internal label representation, such as JSON, which doesn't rely upon
     *           specific characters being disallowed.  For example, representing labels
     *           as the string:  name + "_" + value  would prove problematic if we were to
     *           allow "_" in a future release.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $endpoint_uris
     *           Deprecated. This field is not populated.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Spanner\Admin\Instance\V1\SpannerInstanceAdmin::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. A unique identifier for the instance, which cannot be changed
     * after the instance is created. Values are of the form
     * `projects/<project>/instances/[a-z][-a-z0-9]*[a-z0-9]`. The final
     * segment of the name must be between 2 and 64 characters in length.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Required. A unique identifier for the instance, which cannot be changed
     * after the instance is created. Values are of the form
     * `projects/<project>/instances/[a-z][-a-z0-9]*[a-z0-9]`. The final
     * segment of the name must be between 2 and 64 characters in length.
     *
     * Generated from protobuf field <code>string name = 1;</code>
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
     * Required. The name of the instance's configuration. Values are of the form
     * `projects/<project>/instanceConfigs/<configuration>`. See
     * also [InstanceConfig][google.spanner.admin.instance.v1.InstanceConfig] and
     * [ListInstanceConfigs][google.spanner.admin.instance.v1.InstanceAdmin.ListInstanceConfigs].
     *
     * Generated from protobuf field <code>string config = 2 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Required. The name of the instance's configuration. Values are of the form
     * `projects/<project>/instanceConfigs/<configuration>`. See
     * also [InstanceConfig][google.spanner.admin.instance.v1.InstanceConfig] and
     * [ListInstanceConfigs][google.spanner.admin.instance.v1.InstanceAdmin.ListInstanceConfigs].
     *
     * Generated from protobuf field <code>string config = 2 [(.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setConfig($var)
    {
        GPBUtil::checkString($var, True);
        $this->config = $var;

        return $this;
    }

    /**
     * Required. The descriptive name for this instance as it appears in UIs.
     * Must be unique per project and between 4 and 30 characters in length.
     *
     * Generated from protobuf field <code>string display_name = 3;</code>
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Required. The descriptive name for this instance as it appears in UIs.
     * Must be unique per project and between 4 and 30 characters in length.
     *
     * Generated from protobuf field <code>string display_name = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setDisplayName($var)
    {
        GPBUtil::checkString($var, True);
        $this->display_name = $var;

        return $this;
    }

    /**
     * Required. The number of nodes allocated to this instance. This may be zero
     * in API responses for instances that are not yet in state `READY`.
     * See [the
     * documentation](https://cloud.google.com/spanner/docs/instances#node_count)
     * for more information about nodes.
     *
     * Generated from protobuf field <code>int32 node_count = 5;</code>
     * @return int
     */
    public function getNodeCount()
    {
        return $this->node_count;
    }

    /**
     * Required. The number of nodes allocated to this instance. This may be zero
     * in API responses for instances that are not yet in state `READY`.
     * See [the
     * documentation](https://cloud.google.com/spanner/docs/instances#node_count)
     * for more information about nodes.
     *
     * Generated from protobuf field <code>int32 node_count = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setNodeCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->node_count = $var;

        return $this;
    }

    /**
     * The number of processing units allocated to this instance. At most one of
     * processing_units or node_count should be present in the message. This may
     * be zero in API responses for instances that are not yet in state `READY`.
     *
     * Generated from protobuf field <code>int32 processing_units = 9;</code>
     * @return int
     */
    public function getProcessingUnits()
    {
        return $this->processing_units;
    }

    /**
     * The number of processing units allocated to this instance. At most one of
     * processing_units or node_count should be present in the message. This may
     * be zero in API responses for instances that are not yet in state `READY`.
     *
     * Generated from protobuf field <code>int32 processing_units = 9;</code>
     * @param int $var
     * @return $this
     */
    public function setProcessingUnits($var)
    {
        GPBUtil::checkInt32($var);
        $this->processing_units = $var;

        return $this;
    }

    /**
     * Output only. The current instance state. For
     * [CreateInstance][google.spanner.admin.instance.v1.InstanceAdmin.CreateInstance], the state must be
     * either omitted or set to `CREATING`. For
     * [UpdateInstance][google.spanner.admin.instance.v1.InstanceAdmin.UpdateInstance], the state must be
     * either omitted or set to `READY`.
     *
     * Generated from protobuf field <code>.google.spanner.admin.instance.v1.Instance.State state = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. The current instance state. For
     * [CreateInstance][google.spanner.admin.instance.v1.InstanceAdmin.CreateInstance], the state must be
     * either omitted or set to `CREATING`. For
     * [UpdateInstance][google.spanner.admin.instance.v1.InstanceAdmin.UpdateInstance], the state must be
     * either omitted or set to `READY`.
     *
     * Generated from protobuf field <code>.google.spanner.admin.instance.v1.Instance.State state = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Spanner\Admin\Instance\V1\Instance\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Cloud Labels are a flexible and lightweight mechanism for organizing cloud
     * resources into groups that reflect a customer's organizational needs and
     * deployment strategies. Cloud Labels can be used to filter collections of
     * resources. They can be used to control how resource metrics are aggregated.
     * And they can be used as arguments to policy management rules (e.g. route,
     * firewall, load balancing, etc.).
     *  * Label keys must be between 1 and 63 characters long and must conform to
     *    the following regular expression: `[a-z]([-a-z0-9]*[a-z0-9])?`.
     *  * Label values must be between 0 and 63 characters long and must conform
     *    to the regular expression `([a-z]([-a-z0-9]*[a-z0-9])?)?`.
     *  * No more than 64 labels can be associated with a given resource.
     * See https://goo.gl/xmQnxf for more information on and examples of labels.
     * If you plan to use labels in your own code, please note that additional
     * characters may be allowed in the future. And so you are advised to use an
     * internal label representation, such as JSON, which doesn't rely upon
     * specific characters being disallowed.  For example, representing labels
     * as the string:  name + "_" + value  would prove problematic if we were to
     * allow "_" in a future release.
     *
     * Generated from protobuf field <code>map<string, string> labels = 7;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Cloud Labels are a flexible and lightweight mechanism for organizing cloud
     * resources into groups that reflect a customer's organizational needs and
     * deployment strategies. Cloud Labels can be used to filter collections of
     * resources. They can be used to control how resource metrics are aggregated.
     * And they can be used as arguments to policy management rules (e.g. route,
     * firewall, load balancing, etc.).
     *  * Label keys must be between 1 and 63 characters long and must conform to
     *    the following regular expression: `[a-z]([-a-z0-9]*[a-z0-9])?`.
     *  * Label values must be between 0 and 63 characters long and must conform
     *    to the regular expression `([a-z]([-a-z0-9]*[a-z0-9])?)?`.
     *  * No more than 64 labels can be associated with a given resource.
     * See https://goo.gl/xmQnxf for more information on and examples of labels.
     * If you plan to use labels in your own code, please note that additional
     * characters may be allowed in the future. And so you are advised to use an
     * internal label representation, such as JSON, which doesn't rely upon
     * specific characters being disallowed.  For example, representing labels
     * as the string:  name + "_" + value  would prove problematic if we were to
     * allow "_" in a future release.
     *
     * Generated from protobuf field <code>map<string, string> labels = 7;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * Deprecated. This field is not populated.
     *
     * Generated from protobuf field <code>repeated string endpoint_uris = 8;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getEndpointUris()
    {
        return $this->endpoint_uris;
    }

    /**
     * Deprecated. This field is not populated.
     *
     * Generated from protobuf field <code>repeated string endpoint_uris = 8;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setEndpointUris($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->endpoint_uris = $arr;

        return $this;
    }

}

