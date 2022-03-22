<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/security/privateca/v1beta1/resources.proto

namespace Google\Cloud\Security\PrivateCA\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * [Subject][google.cloud.security.privateca.v1beta1.Subject] describes parts of a distinguished name that, in turn,
 * describes the subject of the certificate.
 *
 * Generated from protobuf message <code>google.cloud.security.privateca.v1beta1.Subject</code>
 */
class Subject extends \Google\Protobuf\Internal\Message
{
    /**
     * The country code of the subject.
     *
     * Generated from protobuf field <code>string country_code = 1;</code>
     */
    private $country_code = '';
    /**
     * The organization of the subject.
     *
     * Generated from protobuf field <code>string organization = 2;</code>
     */
    private $organization = '';
    /**
     * The organizational_unit of the subject.
     *
     * Generated from protobuf field <code>string organizational_unit = 3;</code>
     */
    private $organizational_unit = '';
    /**
     * The locality or city of the subject.
     *
     * Generated from protobuf field <code>string locality = 4;</code>
     */
    private $locality = '';
    /**
     * The province, territory, or regional state of the subject.
     *
     * Generated from protobuf field <code>string province = 5;</code>
     */
    private $province = '';
    /**
     * The street address of the subject.
     *
     * Generated from protobuf field <code>string street_address = 6;</code>
     */
    private $street_address = '';
    /**
     * The postal code of the subject.
     *
     * Generated from protobuf field <code>string postal_code = 7;</code>
     */
    private $postal_code = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $country_code
     *           The country code of the subject.
     *     @type string $organization
     *           The organization of the subject.
     *     @type string $organizational_unit
     *           The organizational_unit of the subject.
     *     @type string $locality
     *           The locality or city of the subject.
     *     @type string $province
     *           The province, territory, or regional state of the subject.
     *     @type string $street_address
     *           The street address of the subject.
     *     @type string $postal_code
     *           The postal code of the subject.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Security\Privateca\V1Beta1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * The country code of the subject.
     *
     * Generated from protobuf field <code>string country_code = 1;</code>
     * @return string
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }

    /**
     * The country code of the subject.
     *
     * Generated from protobuf field <code>string country_code = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCountryCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->country_code = $var;

        return $this;
    }

    /**
     * The organization of the subject.
     *
     * Generated from protobuf field <code>string organization = 2;</code>
     * @return string
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * The organization of the subject.
     *
     * Generated from protobuf field <code>string organization = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setOrganization($var)
    {
        GPBUtil::checkString($var, True);
        $this->organization = $var;

        return $this;
    }

    /**
     * The organizational_unit of the subject.
     *
     * Generated from protobuf field <code>string organizational_unit = 3;</code>
     * @return string
     */
    public function getOrganizationalUnit()
    {
        return $this->organizational_unit;
    }

    /**
     * The organizational_unit of the subject.
     *
     * Generated from protobuf field <code>string organizational_unit = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setOrganizationalUnit($var)
    {
        GPBUtil::checkString($var, True);
        $this->organizational_unit = $var;

        return $this;
    }

    /**
     * The locality or city of the subject.
     *
     * Generated from protobuf field <code>string locality = 4;</code>
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * The locality or city of the subject.
     *
     * Generated from protobuf field <code>string locality = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setLocality($var)
    {
        GPBUtil::checkString($var, True);
        $this->locality = $var;

        return $this;
    }

    /**
     * The province, territory, or regional state of the subject.
     *
     * Generated from protobuf field <code>string province = 5;</code>
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * The province, territory, or regional state of the subject.
     *
     * Generated from protobuf field <code>string province = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setProvince($var)
    {
        GPBUtil::checkString($var, True);
        $this->province = $var;

        return $this;
    }

    /**
     * The street address of the subject.
     *
     * Generated from protobuf field <code>string street_address = 6;</code>
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->street_address;
    }

    /**
     * The street address of the subject.
     *
     * Generated from protobuf field <code>string street_address = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setStreetAddress($var)
    {
        GPBUtil::checkString($var, True);
        $this->street_address = $var;

        return $this;
    }

    /**
     * The postal code of the subject.
     *
     * Generated from protobuf field <code>string postal_code = 7;</code>
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * The postal code of the subject.
     *
     * Generated from protobuf field <code>string postal_code = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setPostalCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->postal_code = $var;

        return $this;
    }

}

