<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a rule that describes one or more match conditions along with the action to be taken when traffic matches this condition (allow or deny).
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.FirewallPolicyRule</code>
 */
class FirewallPolicyRule extends \Google\Protobuf\Internal\Message
{
    /**
     * The Action to perform when the client connection triggers the rule. Can currently be either "allow" or "deny()" where valid values for status are 403, 404, and 502.
     *
     * Generated from protobuf field <code>string action = 187661878;</code>
     */
    private $action = null;
    /**
     * An optional description for this resource.
     *
     * Generated from protobuf field <code>string description = 422937596;</code>
     */
    private $description = null;
    /**
     * The direction in which this rule applies.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.FirewallPolicyRule.Direction direction = 111150975;</code>
     */
    private $direction = null;
    /**
     * Denotes whether the firewall policy rule is disabled. When set to true, the firewall policy rule is not enforced and traffic behaves as if it did not exist. If this is unspecified, the firewall policy rule will be enabled.
     *
     * Generated from protobuf field <code>bool disabled = 270940796;</code>
     */
    private $disabled = null;
    /**
     * Denotes whether to enable logging for a particular rule. If logging is enabled, logs will be exported to the configured export destination in Stackdriver. Logs may be exported to BigQuery or Pub/Sub. Note: you cannot enable logging on "goto_next" rules.
     *
     * Generated from protobuf field <code>bool enable_logging = 295396515;</code>
     */
    private $enable_logging = null;
    /**
     * [Output only] Type of the resource. Always compute#firewallPolicyRule for firewall policy rules
     *
     * Generated from protobuf field <code>string kind = 3292052;</code>
     */
    private $kind = null;
    /**
     * A match condition that incoming traffic is evaluated against. If it evaluates to true, the corresponding 'action' is enforced.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.FirewallPolicyRuleMatcher match = 103668165;</code>
     */
    private $match = null;
    /**
     * An integer indicating the priority of a rule in the list. The priority must be a positive value between 0 and 2147483647. Rules are evaluated from highest to lowest priority where 0 is the highest priority and 2147483647 is the lowest prority.
     *
     * Generated from protobuf field <code>int32 priority = 445151652;</code>
     */
    private $priority = null;
    /**
     * [Output Only] Calculation of the complexity of a single firewall policy rule.
     *
     * Generated from protobuf field <code>int32 rule_tuple_count = 388342037;</code>
     */
    private $rule_tuple_count = null;
    /**
     * A list of network resource URLs to which this rule applies. This field allows you to control which network's VMs get this rule. If this field is left blank, all VMs within the organization will receive the rule.
     *
     * Generated from protobuf field <code>repeated string target_resources = 528230647;</code>
     */
    private $target_resources;
    /**
     * A list of service accounts indicating the sets of instances that are applied with this rule.
     *
     * Generated from protobuf field <code>repeated string target_service_accounts = 457639710;</code>
     */
    private $target_service_accounts;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $action
     *           The Action to perform when the client connection triggers the rule. Can currently be either "allow" or "deny()" where valid values for status are 403, 404, and 502.
     *     @type string $description
     *           An optional description for this resource.
     *     @type int $direction
     *           The direction in which this rule applies.
     *     @type bool $disabled
     *           Denotes whether the firewall policy rule is disabled. When set to true, the firewall policy rule is not enforced and traffic behaves as if it did not exist. If this is unspecified, the firewall policy rule will be enabled.
     *     @type bool $enable_logging
     *           Denotes whether to enable logging for a particular rule. If logging is enabled, logs will be exported to the configured export destination in Stackdriver. Logs may be exported to BigQuery or Pub/Sub. Note: you cannot enable logging on "goto_next" rules.
     *     @type string $kind
     *           [Output only] Type of the resource. Always compute#firewallPolicyRule for firewall policy rules
     *     @type \Google\Cloud\Compute\V1\FirewallPolicyRuleMatcher $match
     *           A match condition that incoming traffic is evaluated against. If it evaluates to true, the corresponding 'action' is enforced.
     *     @type int $priority
     *           An integer indicating the priority of a rule in the list. The priority must be a positive value between 0 and 2147483647. Rules are evaluated from highest to lowest priority where 0 is the highest priority and 2147483647 is the lowest prority.
     *     @type int $rule_tuple_count
     *           [Output Only] Calculation of the complexity of a single firewall policy rule.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $target_resources
     *           A list of network resource URLs to which this rule applies. This field allows you to control which network's VMs get this rule. If this field is left blank, all VMs within the organization will receive the rule.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $target_service_accounts
     *           A list of service accounts indicating the sets of instances that are applied with this rule.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * The Action to perform when the client connection triggers the rule. Can currently be either "allow" or "deny()" where valid values for status are 403, 404, and 502.
     *
     * Generated from protobuf field <code>string action = 187661878;</code>
     * @return string
     */
    public function getAction()
    {
        return isset($this->action) ? $this->action : '';
    }

    public function hasAction()
    {
        return isset($this->action);
    }

    public function clearAction()
    {
        unset($this->action);
    }

    /**
     * The Action to perform when the client connection triggers the rule. Can currently be either "allow" or "deny()" where valid values for status are 403, 404, and 502.
     *
     * Generated from protobuf field <code>string action = 187661878;</code>
     * @param string $var
     * @return $this
     */
    public function setAction($var)
    {
        GPBUtil::checkString($var, True);
        $this->action = $var;

        return $this;
    }

    /**
     * An optional description for this resource.
     *
     * Generated from protobuf field <code>string description = 422937596;</code>
     * @return string
     */
    public function getDescription()
    {
        return isset($this->description) ? $this->description : '';
    }

    public function hasDescription()
    {
        return isset($this->description);
    }

    public function clearDescription()
    {
        unset($this->description);
    }

    /**
     * An optional description for this resource.
     *
     * Generated from protobuf field <code>string description = 422937596;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * The direction in which this rule applies.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.FirewallPolicyRule.Direction direction = 111150975;</code>
     * @return int
     */
    public function getDirection()
    {
        return isset($this->direction) ? $this->direction : 0;
    }

    public function hasDirection()
    {
        return isset($this->direction);
    }

    public function clearDirection()
    {
        unset($this->direction);
    }

    /**
     * The direction in which this rule applies.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.FirewallPolicyRule.Direction direction = 111150975;</code>
     * @param int $var
     * @return $this
     */
    public function setDirection($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Compute\V1\FirewallPolicyRule\Direction::class);
        $this->direction = $var;

        return $this;
    }

    /**
     * Denotes whether the firewall policy rule is disabled. When set to true, the firewall policy rule is not enforced and traffic behaves as if it did not exist. If this is unspecified, the firewall policy rule will be enabled.
     *
     * Generated from protobuf field <code>bool disabled = 270940796;</code>
     * @return bool
     */
    public function getDisabled()
    {
        return isset($this->disabled) ? $this->disabled : false;
    }

    public function hasDisabled()
    {
        return isset($this->disabled);
    }

    public function clearDisabled()
    {
        unset($this->disabled);
    }

    /**
     * Denotes whether the firewall policy rule is disabled. When set to true, the firewall policy rule is not enforced and traffic behaves as if it did not exist. If this is unspecified, the firewall policy rule will be enabled.
     *
     * Generated from protobuf field <code>bool disabled = 270940796;</code>
     * @param bool $var
     * @return $this
     */
    public function setDisabled($var)
    {
        GPBUtil::checkBool($var);
        $this->disabled = $var;

        return $this;
    }

    /**
     * Denotes whether to enable logging for a particular rule. If logging is enabled, logs will be exported to the configured export destination in Stackdriver. Logs may be exported to BigQuery or Pub/Sub. Note: you cannot enable logging on "goto_next" rules.
     *
     * Generated from protobuf field <code>bool enable_logging = 295396515;</code>
     * @return bool
     */
    public function getEnableLogging()
    {
        return isset($this->enable_logging) ? $this->enable_logging : false;
    }

    public function hasEnableLogging()
    {
        return isset($this->enable_logging);
    }

    public function clearEnableLogging()
    {
        unset($this->enable_logging);
    }

    /**
     * Denotes whether to enable logging for a particular rule. If logging is enabled, logs will be exported to the configured export destination in Stackdriver. Logs may be exported to BigQuery or Pub/Sub. Note: you cannot enable logging on "goto_next" rules.
     *
     * Generated from protobuf field <code>bool enable_logging = 295396515;</code>
     * @param bool $var
     * @return $this
     */
    public function setEnableLogging($var)
    {
        GPBUtil::checkBool($var);
        $this->enable_logging = $var;

        return $this;
    }

    /**
     * [Output only] Type of the resource. Always compute#firewallPolicyRule for firewall policy rules
     *
     * Generated from protobuf field <code>string kind = 3292052;</code>
     * @return string
     */
    public function getKind()
    {
        return isset($this->kind) ? $this->kind : '';
    }

    public function hasKind()
    {
        return isset($this->kind);
    }

    public function clearKind()
    {
        unset($this->kind);
    }

    /**
     * [Output only] Type of the resource. Always compute#firewallPolicyRule for firewall policy rules
     *
     * Generated from protobuf field <code>string kind = 3292052;</code>
     * @param string $var
     * @return $this
     */
    public function setKind($var)
    {
        GPBUtil::checkString($var, True);
        $this->kind = $var;

        return $this;
    }

    /**
     * A match condition that incoming traffic is evaluated against. If it evaluates to true, the corresponding 'action' is enforced.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.FirewallPolicyRuleMatcher match = 103668165;</code>
     * @return \Google\Cloud\Compute\V1\FirewallPolicyRuleMatcher|null
     */
    public function getMatch()
    {
        return isset($this->match) ? $this->match : null;
    }

    public function hasMatch()
    {
        return isset($this->match);
    }

    public function clearMatch()
    {
        unset($this->match);
    }

    /**
     * A match condition that incoming traffic is evaluated against. If it evaluates to true, the corresponding 'action' is enforced.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.FirewallPolicyRuleMatcher match = 103668165;</code>
     * @param \Google\Cloud\Compute\V1\FirewallPolicyRuleMatcher $var
     * @return $this
     */
    public function setMatch($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\FirewallPolicyRuleMatcher::class);
        $this->match = $var;

        return $this;
    }

    /**
     * An integer indicating the priority of a rule in the list. The priority must be a positive value between 0 and 2147483647. Rules are evaluated from highest to lowest priority where 0 is the highest priority and 2147483647 is the lowest prority.
     *
     * Generated from protobuf field <code>int32 priority = 445151652;</code>
     * @return int
     */
    public function getPriority()
    {
        return isset($this->priority) ? $this->priority : 0;
    }

    public function hasPriority()
    {
        return isset($this->priority);
    }

    public function clearPriority()
    {
        unset($this->priority);
    }

    /**
     * An integer indicating the priority of a rule in the list. The priority must be a positive value between 0 and 2147483647. Rules are evaluated from highest to lowest priority where 0 is the highest priority and 2147483647 is the lowest prority.
     *
     * Generated from protobuf field <code>int32 priority = 445151652;</code>
     * @param int $var
     * @return $this
     */
    public function setPriority($var)
    {
        GPBUtil::checkInt32($var);
        $this->priority = $var;

        return $this;
    }

    /**
     * [Output Only] Calculation of the complexity of a single firewall policy rule.
     *
     * Generated from protobuf field <code>int32 rule_tuple_count = 388342037;</code>
     * @return int
     */
    public function getRuleTupleCount()
    {
        return isset($this->rule_tuple_count) ? $this->rule_tuple_count : 0;
    }

    public function hasRuleTupleCount()
    {
        return isset($this->rule_tuple_count);
    }

    public function clearRuleTupleCount()
    {
        unset($this->rule_tuple_count);
    }

    /**
     * [Output Only] Calculation of the complexity of a single firewall policy rule.
     *
     * Generated from protobuf field <code>int32 rule_tuple_count = 388342037;</code>
     * @param int $var
     * @return $this
     */
    public function setRuleTupleCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->rule_tuple_count = $var;

        return $this;
    }

    /**
     * A list of network resource URLs to which this rule applies. This field allows you to control which network's VMs get this rule. If this field is left blank, all VMs within the organization will receive the rule.
     *
     * Generated from protobuf field <code>repeated string target_resources = 528230647;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTargetResources()
    {
        return $this->target_resources;
    }

    /**
     * A list of network resource URLs to which this rule applies. This field allows you to control which network's VMs get this rule. If this field is left blank, all VMs within the organization will receive the rule.
     *
     * Generated from protobuf field <code>repeated string target_resources = 528230647;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTargetResources($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->target_resources = $arr;

        return $this;
    }

    /**
     * A list of service accounts indicating the sets of instances that are applied with this rule.
     *
     * Generated from protobuf field <code>repeated string target_service_accounts = 457639710;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTargetServiceAccounts()
    {
        return $this->target_service_accounts;
    }

    /**
     * A list of service accounts indicating the sets of instances that are applied with this rule.
     *
     * Generated from protobuf field <code>repeated string target_service_accounts = 457639710;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTargetServiceAccounts($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->target_service_accounts = $arr;

        return $this;
    }

}

