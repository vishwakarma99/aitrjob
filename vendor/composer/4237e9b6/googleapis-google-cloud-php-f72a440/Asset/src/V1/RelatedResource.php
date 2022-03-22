<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/asset/v1/assets.proto

namespace Google\Cloud\Asset\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The detailed related resource.
 *
 * Generated from protobuf message <code>google.cloud.asset.v1.RelatedResource</code>
 */
class RelatedResource extends \Google\Protobuf\Internal\Message
{
    /**
     * The type of the asset. Example: `compute.googleapis.com/Instance`
     *
     * Generated from protobuf field <code>string asset_type = 1;</code>
     */
    private $asset_type = '';
    /**
     * The full resource name of the related resource. Example:
     * `//compute.googleapis.com/projects/my_proj_123/zones/instance/instance123`
     *
     * Generated from protobuf field <code>string full_resource_name = 2;</code>
     */
    private $full_resource_name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $asset_type
     *           The type of the asset. Example: `compute.googleapis.com/Instance`
     *     @type string $full_resource_name
     *           The full resource name of the related resource. Example:
     *           `//compute.googleapis.com/projects/my_proj_123/zones/instance/instance123`
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Asset\V1\Assets::initOnce();
        parent::__construct($data);
    }

    /**
     * The type of the asset. Example: `compute.googleapis.com/Instance`
     *
     * Generated from protobuf field <code>string asset_type = 1;</code>
     * @return string
     */
    public function getAssetType()
    {
        return $this->asset_type;
    }

    /**
     * The type of the asset. Example: `compute.googleapis.com/Instance`
     *
     * Generated from protobuf field <code>string asset_type = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setAssetType($var)
    {
        GPBUtil::checkString($var, True);
        $this->asset_type = $var;

        return $this;
    }

    /**
     * The full resource name of the related resource. Example:
     * `//compute.googleapis.com/projects/my_proj_123/zones/instance/instance123`
     *
     * Generated from protobuf field <code>string full_resource_name = 2;</code>
     * @return string
     */
    public function getFullResourceName()
    {
        return $this->full_resource_name;
    }

    /**
     * The full resource name of the related resource. Example:
     * `//compute.googleapis.com/projects/my_proj_123/zones/instance/instance123`
     *
     * Generated from protobuf field <code>string full_resource_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setFullResourceName($var)
    {
        GPBUtil::checkString($var, True);
        $this->full_resource_name = $var;

        return $this;
    }

}
