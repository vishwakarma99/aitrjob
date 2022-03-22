<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/identity/accesscontextmanager/v1/service_perimeter.proto

namespace Google\Identity\AccessContextManager\V1\ServicePerimeterConfig;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Policy for egress from perimeter.
 * [EgressPolicies]
 * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
 * match requests based on `egress_from` and `egress_to` stanzas.  For an
 * [EgressPolicy]
 * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
 * to match, both `egress_from` and `egress_to` stanzas must be matched. If an
 * [EgressPolicy]
 * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
 * matches a request, the request is allowed to span the [ServicePerimeter]
 * [google.identity.accesscontextmanager.v1.ServicePerimeter] boundary.
 * For example, an [EgressPolicy]
 * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
 * can be used to allow VMs on networks within the [ServicePerimeter]
 * [google.identity.accesscontextmanager.v1.ServicePerimeter] to access a
 * defined set of projects outside the perimeter in certain contexts (e.g. to
 * read data from a Cloud Storage bucket or query against a BigQuery dataset).
 * [EgressPolicies]
 * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
 * are concerned with the *resources* that a request relates as well as the
 * API services and API actions being used.  They do not related to the
 * direction of data movement.  More detailed documentation for this concept
 * can be found in the descriptions of [EgressFrom]
 * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressFrom]
 * and [EgressTo]
 * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressTo].
 *
 * Generated from protobuf message <code>google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy</code>
 */
class EgressPolicy extends \Google\Protobuf\Internal\Message
{
    /**
     * Defines conditions on the source of a request causing this [EgressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressFrom egress_from = 1;</code>
     */
    private $egress_from = null;
    /**
     * Defines the conditions on the [ApiOperation]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.ApiOperation]
     * and destination resources that cause this [EgressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressTo egress_to = 2;</code>
     */
    private $egress_to = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\EgressFrom $egress_from
     *           Defines conditions on the source of a request causing this [EgressPolicy]
     *           [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
     *           to apply.
     *     @type \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\EgressTo $egress_to
     *           Defines the conditions on the [ApiOperation]
     *           [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.ApiOperation]
     *           and destination resources that cause this [EgressPolicy]
     *           [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
     *           to apply.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Identity\Accesscontextmanager\V1\ServicePerimeter::initOnce();
        parent::__construct($data);
    }

    /**
     * Defines conditions on the source of a request causing this [EgressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressFrom egress_from = 1;</code>
     * @return \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\EgressFrom|null
     */
    public function getEgressFrom()
    {
        return isset($this->egress_from) ? $this->egress_from : null;
    }

    public function hasEgressFrom()
    {
        return isset($this->egress_from);
    }

    public function clearEgressFrom()
    {
        unset($this->egress_from);
    }

    /**
     * Defines conditions on the source of a request causing this [EgressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressFrom egress_from = 1;</code>
     * @param \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\EgressFrom $var
     * @return $this
     */
    public function setEgressFrom($var)
    {
        GPBUtil::checkMessage($var, \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\EgressFrom::class);
        $this->egress_from = $var;

        return $this;
    }

    /**
     * Defines the conditions on the [ApiOperation]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.ApiOperation]
     * and destination resources that cause this [EgressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressTo egress_to = 2;</code>
     * @return \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\EgressTo|null
     */
    public function getEgressTo()
    {
        return isset($this->egress_to) ? $this->egress_to : null;
    }

    public function hasEgressTo()
    {
        return isset($this->egress_to);
    }

    public function clearEgressTo()
    {
        unset($this->egress_to);
    }

    /**
     * Defines the conditions on the [ApiOperation]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.ApiOperation]
     * and destination resources that cause this [EgressPolicy]
     * [google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressPolicy]
     * to apply.
     *
     * Generated from protobuf field <code>.google.identity.accesscontextmanager.v1.ServicePerimeterConfig.EgressTo egress_to = 2;</code>
     * @param \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\EgressTo $var
     * @return $this
     */
    public function setEgressTo($var)
    {
        GPBUtil::checkMessage($var, \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig\EgressTo::class);
        $this->egress_to = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EgressPolicy::class, \Google\Identity\AccessContextManager\V1\ServicePerimeterConfig_EgressPolicy::class);

