<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/workflows/executions/v1beta/executions.proto

namespace Google\Cloud\Workflows\Executions\V1beta;

use UnexpectedValueException;

/**
 * Defines possible views for execution resource.
 *
 * Protobuf type <code>google.cloud.workflows.executions.v1beta.ExecutionView</code>
 */
class ExecutionView
{
    /**
     * The default / unset value.
     *
     * Generated from protobuf enum <code>EXECUTION_VIEW_UNSPECIFIED = 0;</code>
     */
    const EXECUTION_VIEW_UNSPECIFIED = 0;
    /**
     * Includes only basic metadata about the execution.
     * Following fields are returned: name, start_time, end_time, state
     * and workflow_revision_id.
     *
     * Generated from protobuf enum <code>BASIC = 1;</code>
     */
    const BASIC = 1;
    /**
     * Includes all data.
     *
     * Generated from protobuf enum <code>FULL = 2;</code>
     */
    const FULL = 2;

    private static $valueToName = [
        self::EXECUTION_VIEW_UNSPECIFIED => 'EXECUTION_VIEW_UNSPECIFIED',
        self::BASIC => 'BASIC',
        self::FULL => 'FULL',
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
