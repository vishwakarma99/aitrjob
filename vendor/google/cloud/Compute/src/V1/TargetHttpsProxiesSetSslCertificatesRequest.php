<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.TargetHttpsProxiesSetSslCertificatesRequest</code>
 */
class TargetHttpsProxiesSetSslCertificatesRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * New set of SslCertificate resources to associate with this TargetHttpsProxy resource. Currently exactly one SslCertificate resource must be specified.
     *
     * Generated from protobuf field <code>repeated string ssl_certificates = 366006543;</code>
     */
    private $ssl_certificates;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $ssl_certificates
     *           New set of SslCertificate resources to associate with this TargetHttpsProxy resource. Currently exactly one SslCertificate resource must be specified.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * New set of SslCertificate resources to associate with this TargetHttpsProxy resource. Currently exactly one SslCertificate resource must be specified.
     *
     * Generated from protobuf field <code>repeated string ssl_certificates = 366006543;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSslCertificates()
    {
        return $this->ssl_certificates;
    }

    /**
     * New set of SslCertificate resources to associate with this TargetHttpsProxy resource. Currently exactly one SslCertificate resource must be specified.
     *
     * Generated from protobuf field <code>repeated string ssl_certificates = 366006543;</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSslCertificates($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->ssl_certificates = $arr;

        return $this;
    }

}

