<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/metastore/v1beta/metastore.proto

namespace Google\Cloud\Metastore\V1beta;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The details of a metadata export operation.
 *
 * Generated from protobuf message <code>google.cloud.metastore.v1beta.MetadataExport</code>
 */
class MetadataExport extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The time when the export started.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $start_time = null;
    /**
     * Output only. The time when the export ended.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $end_time = null;
    /**
     * Output only. The current state of the export.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1beta.MetadataExport.State state = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Output only. The type of the database dump.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1beta.DatabaseDumpSpec.Type database_dump_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $database_dump_type = 0;
    protected $destination;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $destination_gcs_uri
     *           Output only. A Cloud Storage URI of a folder that metadata are exported
     *           to, in the form of
     *           `gs://<bucket_name>/<path_inside_bucket>/<export_folder>`, where
     *           `<export_folder>` is automatically generated.
     *     @type \Google\Protobuf\Timestamp $start_time
     *           Output only. The time when the export started.
     *     @type \Google\Protobuf\Timestamp $end_time
     *           Output only. The time when the export ended.
     *     @type int $state
     *           Output only. The current state of the export.
     *     @type int $database_dump_type
     *           Output only. The type of the database dump.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Metastore\V1Beta\Metastore::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. A Cloud Storage URI of a folder that metadata are exported
     * to, in the form of
     * `gs://<bucket_name>/<path_inside_bucket>/<export_folder>`, where
     * `<export_folder>` is automatically generated.
     *
     * Generated from protobuf field <code>string destination_gcs_uri = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getDestinationGcsUri()
    {
        return $this->readOneof(4);
    }

    public function hasDestinationGcsUri()
    {
        return $this->hasOneof(4);
    }

    /**
     * Output only. A Cloud Storage URI of a folder that metadata are exported
     * to, in the form of
     * `gs://<bucket_name>/<path_inside_bucket>/<export_folder>`, where
     * `<export_folder>` is automatically generated.
     *
     * Generated from protobuf field <code>string destination_gcs_uri = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setDestinationGcsUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(4, $var);

        return $this;
    }

    /**
     * Output only. The time when the export started.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getStartTime()
    {
        return isset($this->start_time) ? $this->start_time : null;
    }

    public function hasStartTime()
    {
        return isset($this->start_time);
    }

    public function clearStartTime()
    {
        unset($this->start_time);
    }

    /**
     * Output only. The time when the export started.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setStartTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->start_time = $var;

        return $this;
    }

    /**
     * Output only. The time when the export ended.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getEndTime()
    {
        return isset($this->end_time) ? $this->end_time : null;
    }

    public function hasEndTime()
    {
        return isset($this->end_time);
    }

    public function clearEndTime()
    {
        unset($this->end_time);
    }

    /**
     * Output only. The time when the export ended.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setEndTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->end_time = $var;

        return $this;
    }

    /**
     * Output only. The current state of the export.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1beta.MetadataExport.State state = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. The current state of the export.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1beta.MetadataExport.State state = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Metastore\V1beta\MetadataExport\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. The type of the database dump.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1beta.DatabaseDumpSpec.Type database_dump_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getDatabaseDumpType()
    {
        return $this->database_dump_type;
    }

    /**
     * Output only. The type of the database dump.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1beta.DatabaseDumpSpec.Type database_dump_type = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setDatabaseDumpType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Metastore\V1beta\DatabaseDumpSpec\Type::class);
        $this->database_dump_type = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->whichOneof("destination");
    }

}

