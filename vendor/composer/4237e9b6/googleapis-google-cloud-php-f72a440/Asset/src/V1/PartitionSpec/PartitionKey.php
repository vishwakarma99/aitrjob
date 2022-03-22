<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/asset/v1/asset_service.proto

namespace Google\Cloud\Asset\V1\PartitionSpec;

use UnexpectedValueException;

/**
 * This enum is used to determine the partition key column when exporting
 * assets to BigQuery partitioned table(s). Note that, if the partition key is
 * a timestamp column, the actual partition is based on its date value
 * (expressed in UTC. see details in
 * https://cloud.google.com/bigquery/docs/partitioned-tables#date_timestamp_partitioned_tables).
 *
 * Protobuf type <code>google.cloud.asset.v1.PartitionSpec.PartitionKey</code>
 */
class PartitionKey
{
    /**
     * Unspecified partition key. If used, it means using non-partitioned table.
     *
     * Generated from protobuf enum <code>PARTITION_KEY_UNSPECIFIED = 0;</code>
     */
    const PARTITION_KEY_UNSPECIFIED = 0;
    /**
     * The time when the snapshot is taken. If specified as partition key, the
     * result table(s) is partitoned by the additional timestamp column,
     * readTime. If [read_time] in ExportAssetsRequest is specified, the
     * readTime column's value will be the same as it. Otherwise, its value will
     * be the current time that is used to take the snapshot.
     *
     * Generated from protobuf enum <code>READ_TIME = 1;</code>
     */
    const READ_TIME = 1;
    /**
     * The time when the request is received and started to be processed. If
     * specified as partition key, the result table(s) is partitoned by the
     * requestTime column, an additional timestamp column representing when the
     * request was received.
     *
     * Generated from protobuf enum <code>REQUEST_TIME = 2;</code>
     */
    const REQUEST_TIME = 2;

    private static $valueToName = [
        self::PARTITION_KEY_UNSPECIFIED => 'PARTITION_KEY_UNSPECIFIED',
        self::READ_TIME => 'READ_TIME',
        self::REQUEST_TIME => 'REQUEST_TIME',
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
class_alias(PartitionKey::class, \Google\Cloud\Asset\V1\PartitionSpec_PartitionKey::class);

