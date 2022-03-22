<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/dlp.proto

namespace Google\Cloud\Dlp\V2;

use UnexpectedValueException;

/**
 * Operators available for comparing the value of fields.
 *
 * Protobuf type <code>google.privacy.dlp.v2.RelationalOperator</code>
 */
class RelationalOperator
{
    /**
     * Unused
     *
     * Generated from protobuf enum <code>RELATIONAL_OPERATOR_UNSPECIFIED = 0;</code>
     */
    const RELATIONAL_OPERATOR_UNSPECIFIED = 0;
    /**
     * Equal. Attempts to match even with incompatible types.
     *
     * Generated from protobuf enum <code>EQUAL_TO = 1;</code>
     */
    const EQUAL_TO = 1;
    /**
     * Not equal to. Attempts to match even with incompatible types.
     *
     * Generated from protobuf enum <code>NOT_EQUAL_TO = 2;</code>
     */
    const NOT_EQUAL_TO = 2;
    /**
     * Greater than.
     *
     * Generated from protobuf enum <code>GREATER_THAN = 3;</code>
     */
    const GREATER_THAN = 3;
    /**
     * Less than.
     *
     * Generated from protobuf enum <code>LESS_THAN = 4;</code>
     */
    const LESS_THAN = 4;
    /**
     * Greater than or equals.
     *
     * Generated from protobuf enum <code>GREATER_THAN_OR_EQUALS = 5;</code>
     */
    const GREATER_THAN_OR_EQUALS = 5;
    /**
     * Less than or equals.
     *
     * Generated from protobuf enum <code>LESS_THAN_OR_EQUALS = 6;</code>
     */
    const LESS_THAN_OR_EQUALS = 6;
    /**
     * Exists
     *
     * Generated from protobuf enum <code>EXISTS = 7;</code>
     */
    const EXISTS = 7;

    private static $valueToName = [
        self::RELATIONAL_OPERATOR_UNSPECIFIED => 'RELATIONAL_OPERATOR_UNSPECIFIED',
        self::EQUAL_TO => 'EQUAL_TO',
        self::NOT_EQUAL_TO => 'NOT_EQUAL_TO',
        self::GREATER_THAN => 'GREATER_THAN',
        self::LESS_THAN => 'LESS_THAN',
        self::GREATER_THAN_OR_EQUALS => 'GREATER_THAN_OR_EQUALS',
        self::LESS_THAN_OR_EQUALS => 'LESS_THAN_OR_EQUALS',
        self::EXISTS => 'EXISTS',
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

