<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/metastore/v1alpha/metastore.proto

namespace Google\Cloud\Metastore\V1alpha;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A managed metastore service that serves metadata queries.
 *
 * Generated from protobuf message <code>google.cloud.metastore.v1alpha.Service</code>
 */
class Service extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. The relative resource name of the metastore service, of the form:
     * `projects/{project_number}/locations/{location_id}/services/{service_id}`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $name = '';
    /**
     * Output only. The time when the metastore service was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. The time when the metastore service was last updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * User-defined labels for the metastore service.
     *
     * Generated from protobuf field <code>map<string, string> labels = 4;</code>
     */
    private $labels;
    /**
     * Immutable. The relative resource name of the VPC network on which the instance can be
     * accessed. It is specified in the following form:
     * `projects/{project_number}/global/networks/{network_id}`.
     *
     * Generated from protobuf field <code>string network = 7 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     */
    private $network = '';
    /**
     * Output only. The URI of the endpoint used to access the metastore service.
     *
     * Generated from protobuf field <code>string endpoint_uri = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $endpoint_uri = '';
    /**
     * The TCP port at which the metastore service is reached. Default: 9083.
     *
     * Generated from protobuf field <code>int32 port = 9;</code>
     */
    private $port = 0;
    /**
     * Output only. The current state of the metastore service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.Service.State state = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Output only. Additional information about the current state of the metastore service, if
     * available.
     *
     * Generated from protobuf field <code>string state_message = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state_message = '';
    /**
     * Output only. A Cloud Storage URI (starting with `gs://`) that specifies where artifacts
     * related to the metastore service are stored.
     *
     * Generated from protobuf field <code>string artifact_gcs_uri = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $artifact_gcs_uri = '';
    /**
     * The tier of the service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.Service.Tier tier = 13;</code>
     */
    private $tier = 0;
    /**
     * The setting that defines how metastore metadata should be integrated with
     * external services and systems.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.MetadataIntegration metadata_integration = 14;</code>
     */
    private $metadata_integration = null;
    /**
     * The one hour maintenance window of the metastore service. This specifies
     * when the service can be restarted for maintenance purposes in UTC time.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.MaintenanceWindow maintenance_window = 15;</code>
     */
    private $maintenance_window = null;
    /**
     * Output only. The globally unique resource identifier of the metastore service.
     *
     * Generated from protobuf field <code>string uid = 16 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $uid = '';
    /**
     * Output only. The metadata management activities of the metastore service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.MetadataManagementActivity metadata_management_activity = 17 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $metadata_management_activity = null;
    /**
     * Immutable. The release channel of the service.
     * If unspecified, defaults to `STABLE`.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.Service.ReleaseChannel release_channel = 19 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $release_channel = 0;
    protected $metastore_config;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Metastore\V1alpha\HiveMetastoreConfig $hive_metastore_config
     *           Configuration information specific to running Hive metastore
     *           software as the metastore service.
     *     @type string $name
     *           Immutable. The relative resource name of the metastore service, of the form:
     *           `projects/{project_number}/locations/{location_id}/services/{service_id}`.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. The time when the metastore service was created.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. The time when the metastore service was last updated.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           User-defined labels for the metastore service.
     *     @type string $network
     *           Immutable. The relative resource name of the VPC network on which the instance can be
     *           accessed. It is specified in the following form:
     *           `projects/{project_number}/global/networks/{network_id}`.
     *     @type string $endpoint_uri
     *           Output only. The URI of the endpoint used to access the metastore service.
     *     @type int $port
     *           The TCP port at which the metastore service is reached. Default: 9083.
     *     @type int $state
     *           Output only. The current state of the metastore service.
     *     @type string $state_message
     *           Output only. Additional information about the current state of the metastore service, if
     *           available.
     *     @type string $artifact_gcs_uri
     *           Output only. A Cloud Storage URI (starting with `gs://`) that specifies where artifacts
     *           related to the metastore service are stored.
     *     @type int $tier
     *           The tier of the service.
     *     @type \Google\Cloud\Metastore\V1alpha\MetadataIntegration $metadata_integration
     *           The setting that defines how metastore metadata should be integrated with
     *           external services and systems.
     *     @type \Google\Cloud\Metastore\V1alpha\MaintenanceWindow $maintenance_window
     *           The one hour maintenance window of the metastore service. This specifies
     *           when the service can be restarted for maintenance purposes in UTC time.
     *     @type string $uid
     *           Output only. The globally unique resource identifier of the metastore service.
     *     @type \Google\Cloud\Metastore\V1alpha\MetadataManagementActivity $metadata_management_activity
     *           Output only. The metadata management activities of the metastore service.
     *     @type int $release_channel
     *           Immutable. The release channel of the service.
     *           If unspecified, defaults to `STABLE`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Metastore\V1Alpha\Metastore::initOnce();
        parent::__construct($data);
    }

    /**
     * Configuration information specific to running Hive metastore
     * software as the metastore service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.HiveMetastoreConfig hive_metastore_config = 5;</code>
     * @return \Google\Cloud\Metastore\V1alpha\HiveMetastoreConfig|null
     */
    public function getHiveMetastoreConfig()
    {
        return $this->readOneof(5);
    }

    public function hasHiveMetastoreConfig()
    {
        return $this->hasOneof(5);
    }

    /**
     * Configuration information specific to running Hive metastore
     * software as the metastore service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.HiveMetastoreConfig hive_metastore_config = 5;</code>
     * @param \Google\Cloud\Metastore\V1alpha\HiveMetastoreConfig $var
     * @return $this
     */
    public function setHiveMetastoreConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Metastore\V1alpha\HiveMetastoreConfig::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Immutable. The relative resource name of the metastore service, of the form:
     * `projects/{project_number}/locations/{location_id}/services/{service_id}`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Immutable. The relative resource name of the metastore service, of the form:
     * `projects/{project_number}/locations/{location_id}/services/{service_id}`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Output only. The time when the metastore service was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return isset($this->create_time) ? $this->create_time : null;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Output only. The time when the metastore service was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. The time when the metastore service was last updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return isset($this->update_time) ? $this->update_time : null;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * Output only. The time when the metastore service was last updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * User-defined labels for the metastore service.
     *
     * Generated from protobuf field <code>map<string, string> labels = 4;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * User-defined labels for the metastore service.
     *
     * Generated from protobuf field <code>map<string, string> labels = 4;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * Immutable. The relative resource name of the VPC network on which the instance can be
     * accessed. It is specified in the following form:
     * `projects/{project_number}/global/networks/{network_id}`.
     *
     * Generated from protobuf field <code>string network = 7 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * Immutable. The relative resource name of the VPC network on which the instance can be
     * accessed. It is specified in the following form:
     * `projects/{project_number}/global/networks/{network_id}`.
     *
     * Generated from protobuf field <code>string network = 7 [(.google.api.field_behavior) = IMMUTABLE, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setNetwork($var)
    {
        GPBUtil::checkString($var, True);
        $this->network = $var;

        return $this;
    }

    /**
     * Output only. The URI of the endpoint used to access the metastore service.
     *
     * Generated from protobuf field <code>string endpoint_uri = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getEndpointUri()
    {
        return $this->endpoint_uri;
    }

    /**
     * Output only. The URI of the endpoint used to access the metastore service.
     *
     * Generated from protobuf field <code>string endpoint_uri = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setEndpointUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->endpoint_uri = $var;

        return $this;
    }

    /**
     * The TCP port at which the metastore service is reached. Default: 9083.
     *
     * Generated from protobuf field <code>int32 port = 9;</code>
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * The TCP port at which the metastore service is reached. Default: 9083.
     *
     * Generated from protobuf field <code>int32 port = 9;</code>
     * @param int $var
     * @return $this
     */
    public function setPort($var)
    {
        GPBUtil::checkInt32($var);
        $this->port = $var;

        return $this;
    }

    /**
     * Output only. The current state of the metastore service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.Service.State state = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. The current state of the metastore service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.Service.State state = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Metastore\V1alpha\Service\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. Additional information about the current state of the metastore service, if
     * available.
     *
     * Generated from protobuf field <code>string state_message = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getStateMessage()
    {
        return $this->state_message;
    }

    /**
     * Output only. Additional information about the current state of the metastore service, if
     * available.
     *
     * Generated from protobuf field <code>string state_message = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setStateMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->state_message = $var;

        return $this;
    }

    /**
     * Output only. A Cloud Storage URI (starting with `gs://`) that specifies where artifacts
     * related to the metastore service are stored.
     *
     * Generated from protobuf field <code>string artifact_gcs_uri = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getArtifactGcsUri()
    {
        return $this->artifact_gcs_uri;
    }

    /**
     * Output only. A Cloud Storage URI (starting with `gs://`) that specifies where artifacts
     * related to the metastore service are stored.
     *
     * Generated from protobuf field <code>string artifact_gcs_uri = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setArtifactGcsUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->artifact_gcs_uri = $var;

        return $this;
    }

    /**
     * The tier of the service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.Service.Tier tier = 13;</code>
     * @return int
     */
    public function getTier()
    {
        return $this->tier;
    }

    /**
     * The tier of the service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.Service.Tier tier = 13;</code>
     * @param int $var
     * @return $this
     */
    public function setTier($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Metastore\V1alpha\Service\Tier::class);
        $this->tier = $var;

        return $this;
    }

    /**
     * The setting that defines how metastore metadata should be integrated with
     * external services and systems.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.MetadataIntegration metadata_integration = 14;</code>
     * @return \Google\Cloud\Metastore\V1alpha\MetadataIntegration|null
     */
    public function getMetadataIntegration()
    {
        return isset($this->metadata_integration) ? $this->metadata_integration : null;
    }

    public function hasMetadataIntegration()
    {
        return isset($this->metadata_integration);
    }

    public function clearMetadataIntegration()
    {
        unset($this->metadata_integration);
    }

    /**
     * The setting that defines how metastore metadata should be integrated with
     * external services and systems.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.MetadataIntegration metadata_integration = 14;</code>
     * @param \Google\Cloud\Metastore\V1alpha\MetadataIntegration $var
     * @return $this
     */
    public function setMetadataIntegration($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Metastore\V1alpha\MetadataIntegration::class);
        $this->metadata_integration = $var;

        return $this;
    }

    /**
     * The one hour maintenance window of the metastore service. This specifies
     * when the service can be restarted for maintenance purposes in UTC time.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.MaintenanceWindow maintenance_window = 15;</code>
     * @return \Google\Cloud\Metastore\V1alpha\MaintenanceWindow|null
     */
    public function getMaintenanceWindow()
    {
        return isset($this->maintenance_window) ? $this->maintenance_window : null;
    }

    public function hasMaintenanceWindow()
    {
        return isset($this->maintenance_window);
    }

    public function clearMaintenanceWindow()
    {
        unset($this->maintenance_window);
    }

    /**
     * The one hour maintenance window of the metastore service. This specifies
     * when the service can be restarted for maintenance purposes in UTC time.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.MaintenanceWindow maintenance_window = 15;</code>
     * @param \Google\Cloud\Metastore\V1alpha\MaintenanceWindow $var
     * @return $this
     */
    public function setMaintenanceWindow($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Metastore\V1alpha\MaintenanceWindow::class);
        $this->maintenance_window = $var;

        return $this;
    }

    /**
     * Output only. The globally unique resource identifier of the metastore service.
     *
     * Generated from protobuf field <code>string uid = 16 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Output only. The globally unique resource identifier of the metastore service.
     *
     * Generated from protobuf field <code>string uid = 16 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string $var
     * @return $this
     */
    public function setUid($var)
    {
        GPBUtil::checkString($var, True);
        $this->uid = $var;

        return $this;
    }

    /**
     * Output only. The metadata management activities of the metastore service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.MetadataManagementActivity metadata_management_activity = 17 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\Metastore\V1alpha\MetadataManagementActivity|null
     */
    public function getMetadataManagementActivity()
    {
        return isset($this->metadata_management_activity) ? $this->metadata_management_activity : null;
    }

    public function hasMetadataManagementActivity()
    {
        return isset($this->metadata_management_activity);
    }

    public function clearMetadataManagementActivity()
    {
        unset($this->metadata_management_activity);
    }

    /**
     * Output only. The metadata management activities of the metastore service.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.MetadataManagementActivity metadata_management_activity = 17 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\Metastore\V1alpha\MetadataManagementActivity $var
     * @return $this
     */
    public function setMetadataManagementActivity($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Metastore\V1alpha\MetadataManagementActivity::class);
        $this->metadata_management_activity = $var;

        return $this;
    }

    /**
     * Immutable. The release channel of the service.
     * If unspecified, defaults to `STABLE`.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.Service.ReleaseChannel release_channel = 19 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return int
     */
    public function getReleaseChannel()
    {
        return $this->release_channel;
    }

    /**
     * Immutable. The release channel of the service.
     * If unspecified, defaults to `STABLE`.
     *
     * Generated from protobuf field <code>.google.cloud.metastore.v1alpha.Service.ReleaseChannel release_channel = 19 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param int $var
     * @return $this
     */
    public function setReleaseChannel($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Metastore\V1alpha\Service\ReleaseChannel::class);
        $this->release_channel = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getMetastoreConfig()
    {
        return $this->whichOneof("metastore_config");
    }

}

