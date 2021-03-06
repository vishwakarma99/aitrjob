<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1\InterconnectAttachment;

use UnexpectedValueException;

/**
 * Indicates the user-supplied encryption option of this interconnect attachment:
 * - NONE is the default value, which means that the attachment carries unencrypted traffic. VMs can send traffic to, or receive traffic from, this type of attachment.
 * - IPSEC indicates that the attachment carries only traffic encrypted by an IPsec device such as an HA VPN gateway. VMs cannot directly send traffic to, or receive traffic from, such an attachment. To use IPsec-encrypted Cloud Interconnect, create the attachment using this option.
 * Not currently available in all Interconnect locations.
 *
 * Protobuf type <code>google.cloud.compute.v1.InterconnectAttachment.Encryption</code>
 */
class Encryption
{
    /**
     * A value indicating that the enum field is not set.
     *
     * Generated from protobuf enum <code>UNDEFINED_ENCRYPTION = 0;</code>
     */
    const UNDEFINED_ENCRYPTION = 0;
    /**
     * Generated from protobuf enum <code>IPSEC = 69882282;</code>
     */
    const IPSEC = 69882282;
    /**
     * Generated from protobuf enum <code>NONE = 2402104;</code>
     */
    const NONE = 2402104;

    private static $valueToName = [
        self::UNDEFINED_ENCRYPTION => 'UNDEFINED_ENCRYPTION',
        self::IPSEC => 'IPSEC',
        self::NONE => 'NONE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}


