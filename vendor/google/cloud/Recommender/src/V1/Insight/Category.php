<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/recommender/v1/insight.proto

namespace Google\Cloud\Recommender\V1\Insight;

use UnexpectedValueException;

/**
 * Insight category.
 *
 * Protobuf type <code>google.cloud.recommender.v1.Insight.Category</code>
 */
class Category
{
    /**
     * Unspecified category.
     *
     * Generated from protobuf enum <code>CATEGORY_UNSPECIFIED = 0;</code>
     */
    const CATEGORY_UNSPECIFIED = 0;
    /**
     * The insight is related to cost.
     *
     * Generated from protobuf enum <code>COST = 1;</code>
     */
    const COST = 1;
    /**
     * The insight is related to security.
     *
     * Generated from protobuf enum <code>SECURITY = 2;</code>
     */
    const SECURITY = 2;
    /**
     * The insight is related to performance.
     *
     * Generated from protobuf enum <code>PERFORMANCE = 3;</code>
     */
    const PERFORMANCE = 3;
    /**
     * This insight is related to manageability.
     *
     * Generated from protobuf enum <code>MANAGEABILITY = 4;</code>
     */
    const MANAGEABILITY = 4;

    private static $valueToName = [
        self::CATEGORY_UNSPECIFIED => 'CATEGORY_UNSPECIFIED',
        self::COST => 'COST',
        self::SECURITY => 'SECURITY',
        self::PERFORMANCE => 'PERFORMANCE',
        self::MANAGEABILITY => 'MANAGEABILITY',
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

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Category::class, \Google\Cloud\Recommender\V1\Insight_Category::class);
