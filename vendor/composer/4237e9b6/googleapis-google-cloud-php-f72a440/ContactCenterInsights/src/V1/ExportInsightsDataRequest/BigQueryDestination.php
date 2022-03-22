<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/contactcenterinsights/v1/contact_center_insights.proto

namespace Google\Cloud\ContactCenterInsights\V1\ExportInsightsDataRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A BigQuery Table Reference.
 *
 * Generated from protobuf message <code>google.cloud.contactcenterinsights.v1.ExportInsightsDataRequest.BigQueryDestination</code>
 */
class BigQueryDestination extends \Google\Protobuf\Internal\Message
{
    /**
     * A project ID or number. If specified, then export will attempt to
     * write data to this project instead of the resource project. Otherwise,
     * the resource project will be used.
     *
     * Generated from protobuf field <code>string project_id = 3;</code>
     */
    private $project_id = '';
    /**
     * Required. The name of the BigQuery dataset that the snapshot result should be
     * exported to. If this dataset does not exist, the export call returns an
     * INVALID_ARGUMENT error.
     *
     * Generated from protobuf field <code>string dataset = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $dataset = '';
    /**
     * The BigQuery table name to which the insights data should be written.
     * If this table does not exist, the export call returns an INVALID_ARGUMENT
     * error.
     *
     * Generated from protobuf field <code>string table = 2;</code>
     */
    private $table = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $project_id
     *           A project ID or number. If specified, then export will attempt to
     *           write data to this project instead of the resource project. Otherwise,
     *           the resource project will be used.
     *     @type string $dataset
     *           Required. The name of the BigQuery dataset that the snapshot result should be
     *           exported to. If this dataset does not exist, the export call returns an
     *           INVALID_ARGUMENT error.
     *     @type string $table
     *           The BigQuery table name to which the insights data should be written.
     *           If this table does not exist, the export call returns an INVALID_ARGUMENT
     *           error.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Contactcenterinsights\V1\ContactCenterInsights::initOnce();
        parent::__construct($data);
    }

    /**
     * A project ID or number. If specified, then export will attempt to
     * write data to this project instead of the resource project. Otherwise,
     * the resource project will be used.
     *
     * Generated from protobuf field <code>string project_id = 3;</code>
     * @return string
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * A project ID or number. If specified, then export will attempt to
     * write data to this project instead of the resource project. Otherwise,
     * the resource project will be used.
     *
     * Generated from protobuf field <code>string project_id = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setProjectId($var)
    {
        GPBUtil::checkString($var, True);
        $this->project_id = $var;

        return $this;
    }

    /**
     * Required. The name of the BigQuery dataset that the snapshot result should be
     * exported to. If this dataset does not exist, the export call returns an
     * INVALID_ARGUMENT error.
     *
     * Generated from protobuf field <code>string dataset = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getDataset()
    {
        return $this->dataset;
    }

    /**
     * Required. The name of the BigQuery dataset that the snapshot result should be
     * exported to. If this dataset does not exist, the export call returns an
     * INVALID_ARGUMENT error.
     *
     * Generated from protobuf field <code>string dataset = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setDataset($var)
    {
        GPBUtil::checkString($var, True);
        $this->dataset = $var;

        return $this;
    }

    /**
     * The BigQuery table name to which the insights data should be written.
     * If this table does not exist, the export call returns an INVALID_ARGUMENT
     * error.
     *
     * Generated from protobuf field <code>string table = 2;</code>
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * The BigQuery table name to which the insights data should be written.
     * If this table does not exist, the export call returns an INVALID_ARGUMENT
     * error.
     *
     * Generated from protobuf field <code>string table = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setTable($var)
    {
        GPBUtil::checkString($var, True);
        $this->table = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BigQueryDestination::class, \Google\Cloud\ContactCenterInsights\V1\ExportInsightsDataRequest_BigQueryDestination::class);

