<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * This message defines settings for a consistent hash style load balancer.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.ConsistentHashLoadBalancerSettings</code>
 */
class ConsistentHashLoadBalancerSettings extends \Google\Protobuf\Internal\Message
{
    /**
     * Hash is based on HTTP Cookie. This field describes a HTTP cookie that will be used as the hash key for the consistent hash load balancer. If the cookie is not present, it will be generated. This field is applicable if the sessionAffinity is set to HTTP_COOKIE.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.ConsistentHashLoadBalancerSettingsHttpCookie http_cookie = 6673915;</code>
     */
    private $http_cookie = null;
    /**
     * The hash based on the value of the specified header field. This field is applicable if the sessionAffinity is set to HEADER_FIELD.
     *
     * Generated from protobuf field <code>string http_header_name = 234798022;</code>
     */
    private $http_header_name = null;
    /**
     * The minimum number of virtual nodes to use for the hash ring. Defaults to 1024. Larger ring sizes result in more granular load distributions. If the number of hosts in the load balancing pool is larger than the ring size, each host will be assigned a single virtual node.
     *
     * Generated from protobuf field <code>int64 minimum_ring_size = 234380735;</code>
     */
    private $minimum_ring_size = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Compute\V1\ConsistentHashLoadBalancerSettingsHttpCookie $http_cookie
     *           Hash is based on HTTP Cookie. This field describes a HTTP cookie that will be used as the hash key for the consistent hash load balancer. If the cookie is not present, it will be generated. This field is applicable if the sessionAffinity is set to HTTP_COOKIE.
     *     @type string $http_header_name
     *           The hash based on the value of the specified header field. This field is applicable if the sessionAffinity is set to HEADER_FIELD.
     *     @type int|string $minimum_ring_size
     *           The minimum number of virtual nodes to use for the hash ring. Defaults to 1024. Larger ring sizes result in more granular load distributions. If the number of hosts in the load balancing pool is larger than the ring size, each host will be assigned a single virtual node.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * Hash is based on HTTP Cookie. This field describes a HTTP cookie that will be used as the hash key for the consistent hash load balancer. If the cookie is not present, it will be generated. This field is applicable if the sessionAffinity is set to HTTP_COOKIE.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.ConsistentHashLoadBalancerSettingsHttpCookie http_cookie = 6673915;</code>
     * @return \Google\Cloud\Compute\V1\ConsistentHashLoadBalancerSettingsHttpCookie|null
     */
    public function getHttpCookie()
    {
        return isset($this->http_cookie) ? $this->http_cookie : null;
    }

    public function hasHttpCookie()
    {
        return isset($this->http_cookie);
    }

    public function clearHttpCookie()
    {
        unset($this->http_cookie);
    }

    /**
     * Hash is based on HTTP Cookie. This field describes a HTTP cookie that will be used as the hash key for the consistent hash load balancer. If the cookie is not present, it will be generated. This field is applicable if the sessionAffinity is set to HTTP_COOKIE.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.ConsistentHashLoadBalancerSettingsHttpCookie http_cookie = 6673915;</code>
     * @param \Google\Cloud\Compute\V1\ConsistentHashLoadBalancerSettingsHttpCookie $var
     * @return $this
     */
    public function setHttpCookie($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\ConsistentHashLoadBalancerSettingsHttpCookie::class);
        $this->http_cookie = $var;

        return $this;
    }

    /**
     * The hash based on the value of the specified header field. This field is applicable if the sessionAffinity is set to HEADER_FIELD.
     *
     * Generated from protobuf field <code>string http_header_name = 234798022;</code>
     * @return string
     */
    public function getHttpHeaderName()
    {
        return isset($this->http_header_name) ? $this->http_header_name : '';
    }

    public function hasHttpHeaderName()
    {
        return isset($this->http_header_name);
    }

    public function clearHttpHeaderName()
    {
        unset($this->http_header_name);
    }

    /**
     * The hash based on the value of the specified header field. This field is applicable if the sessionAffinity is set to HEADER_FIELD.
     *
     * Generated from protobuf field <code>string http_header_name = 234798022;</code>
     * @param string $var
     * @return $this
     */
    public function setHttpHeaderName($var)
    {
        GPBUtil::checkString($var, True);
        $this->http_header_name = $var;

        return $this;
    }

    /**
     * The minimum number of virtual nodes to use for the hash ring. Defaults to 1024. Larger ring sizes result in more granular load distributions. If the number of hosts in the load balancing pool is larger than the ring size, each host will be assigned a single virtual node.
     *
     * Generated from protobuf field <code>int64 minimum_ring_size = 234380735;</code>
     * @return int|string
     */
    public function getMinimumRingSize()
    {
        return isset($this->minimum_ring_size) ? $this->minimum_ring_size : 0;
    }

    public function hasMinimumRingSize()
    {
        return isset($this->minimum_ring_size);
    }

    public function clearMinimumRingSize()
    {
        unset($this->minimum_ring_size);
    }

    /**
     * The minimum number of virtual nodes to use for the hash ring. Defaults to 1024. Larger ring sizes result in more granular load distributions. If the number of hosts in the load balancing pool is larger than the ring size, each host will be assigned a single virtual node.
     *
     * Generated from protobuf field <code>int64 minimum_ring_size = 234380735;</code>
     * @param int|string $var
     * @return $this
     */
    public function setMinimumRingSize($var)
    {
        GPBUtil::checkInt64($var);
        $this->minimum_ring_size = $var;

        return $this;
    }

}
