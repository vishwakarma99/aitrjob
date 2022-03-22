<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/lifesciences/v2beta/workflows.proto

namespace Google\Cloud\LifeSciences\V2beta;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Carries information about a Google Cloud service account.
 *
 * Generated from protobuf message <code>google.cloud.lifesciences.v2beta.ServiceAccount</code>
 */
class ServiceAccount extends \Google\Protobuf\Internal\Message
{
    /**
     * Email address of the service account. If not specified, the default
     * Compute Engine service account for the project will be used.
     *
     * Generated from protobuf field <code>string email = 1;</code>
     */
    private $email = '';
    /**
     * List of scopes to be enabled for this service account on the VM, in
     * addition to the cloud-platform API scope that will be added by default.
     *
     * Generated from protobuf field <code>repeated string scopes = 2;</code>
     */
    private $scopes;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $email
     *           Email address of the service account. If not specified, the default
     *           Compute Engine service account for the project will be used.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $scopes
     *           List of scopes to be enabled for this service account on the VM, in
     *           addition to the cloud-platform API scope that will be added by default.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Lifesciences\V2Beta\Workflows::initOnce();
        parent::__construct($data);
    }

    /**
     * Email address of the service account. If not specified, the default
     * Compute Engine service account for the project will be used.
     *
     * Generated from protobuf field <code>string email = 1;</code>
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Email address of the service account. If not specified, the default
     * Compute Engine service account for the project will be used.
     *
     * Generated from protobuf field <code>string email = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setEmail($var)
    {
        GPBUtil::checkString($var, True);
        $this->email = $var;

        return $this;
    }

    /**
     * List of scopes to be enabled for this service account on the VM, in
     * addition to the cloud-platform API scope that will be added by default.
     *
     * Generated from protobuf field <code>repeated string scopes = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * List of scopes to be enabled for this service account on the VM, in
     * addition to the cloud-platform API scope that will be added by default.
     *
     * Generated from protobuf field <code>repeated string scopes = 2;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setScopes($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->scopes = $arr;

        return $this;
    }

}

