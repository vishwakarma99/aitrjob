<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/appengine/v1/version.proto

namespace Google\Cloud\AppEngine\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * [Cloud Endpoints](https://cloud.google.com/endpoints) configuration.
 * The Endpoints API Service provides tooling for serving Open API and gRPC
 * endpoints via an NGINX proxy. Only valid for App Engine Flexible environment
 * deployments.
 * The fields here refer to the name and configuration ID of a "service"
 * resource in the [Service Management API](https://cloud.google.com/service-management/overview).
 *
 * Generated from protobuf message <code>google.appengine.v1.EndpointsApiService</code>
 */
class EndpointsApiService extends \Google\Protobuf\Internal\Message
{
    /**
     * Endpoints service name which is the name of the "service" resource in the
     * Service Management API. For example "myapi.endpoints.myproject.cloud.goog"
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * Endpoints service configuration ID as specified by the Service Management
     * API. For example "2016-09-19r1".
     * By default, the rollout strategy for Endpoints is `RolloutStrategy.FIXED`.
     * This means that Endpoints starts up with a particular configuration ID.
     * When a new configuration is rolled out, Endpoints must be given the new
     * configuration ID. The `config_id` field is used to give the configuration
     * ID and is required in this case.
     * Endpoints also has a rollout strategy called `RolloutStrategy.MANAGED`.
     * When using this, Endpoints fetches the latest configuration and does not
     * need the configuration ID. In this case, `config_id` must be omitted.
     *
     * Generated from protobuf field <code>string config_id = 2;</code>
     */
    private $config_id = '';
    /**
     * Endpoints rollout strategy. If `FIXED`, `config_id` must be specified. If
     * `MANAGED`, `config_id` must be omitted.
     *
     * Generated from protobuf field <code>.google.appengine.v1.EndpointsApiService.RolloutStrategy rollout_strategy = 3;</code>
     */
    private $rollout_strategy = 0;
    /**
     * Enable or disable trace sampling. By default, this is set to false for
     * enabled.
     *
     * Generated from protobuf field <code>bool disable_trace_sampling = 4;</code>
     */
    private $disable_trace_sampling = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Endpoints service name which is the name of the "service" resource in the
     *           Service Management API. For example "myapi.endpoints.myproject.cloud.goog"
     *     @type string $config_id
     *           Endpoints service configuration ID as specified by the Service Management
     *           API. For example "2016-09-19r1".
     *           By default, the rollout strategy for Endpoints is `RolloutStrategy.FIXED`.
     *           This means that Endpoints starts up with a particular configuration ID.
     *           When a new configuration is rolled out, Endpoints must be given the new
     *           configuration ID. The `config_id` field is used to give the configuration
     *           ID and is required in this case.
     *           Endpoints also has a rollout strategy called `RolloutStrategy.MANAGED`.
     *           When using this, Endpoints fetches the latest configuration and does not
     *           need the configuration ID. In this case, `config_id` must be omitted.
     *     @type int $rollout_strategy
     *           Endpoints rollout strategy. If `FIXED`, `config_id` must be specified. If
     *           `MANAGED`, `config_id` must be omitted.
     *     @type bool $disable_trace_sampling
     *           Enable or disable trace sampling. By default, this is set to false for
     *           enabled.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Appengine\V1\Version::initOnce();
        parent::__construct($data);
    }

    /**
     * Endpoints service name which is the name of the "service" resource in the
     * Service Management API. For example "myapi.endpoints.myproject.cloud.goog"
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Endpoints service name which is the name of the "service" resource in the
     * Service Management API. For example "myapi.endpoints.myproject.cloud.goog"
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
     * Endpoints service configuration ID as specified by the Service Management
     * API. For example "2016-09-19r1".
     * By default, the rollout strategy for Endpoints is `RolloutStrategy.FIXED`.
     * This means that Endpoints starts up with a particular configuration ID.
     * When a new configuration is rolled out, Endpoints must be given the new
     * configuration ID. The `config_id` field is used to give the configuration
     * ID and is required in this case.
     * Endpoints also has a rollout strategy called `RolloutStrategy.MANAGED`.
     * When using this, Endpoints fetches the latest configuration and does not
     * need the configuration ID. In this case, `config_id` must be omitted.
     *
     * Generated from protobuf field <code>string config_id = 2;</code>
     * @return string
     */
    public function getConfigId()
    {
        return $this->config_id;
    }

    /**
     * Endpoints service configuration ID as specified by the Service Management
     * API. For example "2016-09-19r1".
     * By default, the rollout strategy for Endpoints is `RolloutStrategy.FIXED`.
     * This means that Endpoints starts up with a particular configuration ID.
     * When a new configuration is rolled out, Endpoints must be given the new
     * configuration ID. The `config_id` field is used to give the configuration
     * ID and is required in this case.
     * Endpoints also has a rollout strategy called `RolloutStrategy.MANAGED`.
     * When using this, Endpoints fetches the latest configuration and does not
     * need the configuration ID. In this case, `config_id` must be omitted.
     *
     * Generated from protobuf field <code>string config_id = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setConfigId($var)
    {
        GPBUtil::checkString($var, True);
        $this->config_id = $var;

        return $this;
    }

    /**
     * Endpoints rollout strategy. If `FIXED`, `config_id` must be specified. If
     * `MANAGED`, `config_id` must be omitted.
     *
     * Generated from protobuf field <code>.google.appengine.v1.EndpointsApiService.RolloutStrategy rollout_strategy = 3;</code>
     * @return int
     */
    public function getRolloutStrategy()
    {
        return $this->rollout_strategy;
    }

    /**
     * Endpoints rollout strategy. If `FIXED`, `config_id` must be specified. If
     * `MANAGED`, `config_id` must be omitted.
     *
     * Generated from protobuf field <code>.google.appengine.v1.EndpointsApiService.RolloutStrategy rollout_strategy = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setRolloutStrategy($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\AppEngine\V1\EndpointsApiService\RolloutStrategy::class);
        $this->rollout_strategy = $var;

        return $this;
    }

    /**
     * Enable or disable trace sampling. By default, this is set to false for
     * enabled.
     *
     * Generated from protobuf field <code>bool disable_trace_sampling = 4;</code>
     * @return bool
     */
    public function getDisableTraceSampling()
    {
        return $this->disable_trace_sampling;
    }

    /**
     * Enable or disable trace sampling. By default, this is set to false for
     * enabled.
     *
     * Generated from protobuf field <code>bool disable_trace_sampling = 4;</code>
     * @param bool $var
     * @return $this
     */
    public function setDisableTraceSampling($var)
    {
        GPBUtil::checkBool($var);
        $this->disable_trace_sampling = $var;

        return $this;
    }

}

