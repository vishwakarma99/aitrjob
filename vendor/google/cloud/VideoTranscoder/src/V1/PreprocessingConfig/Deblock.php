<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/transcoder/v1/resources.proto

namespace Google\Cloud\Video\Transcoder\V1\PreprocessingConfig;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Deblock preprocessing configuration.
 *
 * Generated from protobuf message <code>google.cloud.video.transcoder.v1.PreprocessingConfig.Deblock</code>
 */
class Deblock extends \Google\Protobuf\Internal\Message
{
    /**
     * Set strength of the deblocker. Enter a value between 0 and 1. The higher
     * the value, the stronger the block removal. 0 is no deblocking. The
     * default is 0.
     *
     * Generated from protobuf field <code>double strength = 1;</code>
     */
    private $strength = 0.0;
    /**
     * Enable deblocker. The default is `false`.
     *
     * Generated from protobuf field <code>bool enabled = 2;</code>
     */
    private $enabled = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $strength
     *           Set strength of the deblocker. Enter a value between 0 and 1. The higher
     *           the value, the stronger the block removal. 0 is no deblocking. The
     *           default is 0.
     *     @type bool $enabled
     *           Enable deblocker. The default is `false`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Video\Transcoder\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Set strength of the deblocker. Enter a value between 0 and 1. The higher
     * the value, the stronger the block removal. 0 is no deblocking. The
     * default is 0.
     *
     * Generated from protobuf field <code>double strength = 1;</code>
     * @return float
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set strength of the deblocker. Enter a value between 0 and 1. The higher
     * the value, the stronger the block removal. 0 is no deblocking. The
     * default is 0.
     *
     * Generated from protobuf field <code>double strength = 1;</code>
     * @param float $var
     * @return $this
     */
    public function setStrength($var)
    {
        GPBUtil::checkDouble($var);
        $this->strength = $var;

        return $this;
    }

    /**
     * Enable deblocker. The default is `false`.
     *
     * Generated from protobuf field <code>bool enabled = 2;</code>
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Enable deblocker. The default is `false`.
     *
     * Generated from protobuf field <code>bool enabled = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setEnabled($var)
    {
        GPBUtil::checkBool($var);
        $this->enabled = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Deblock::class, \Google\Cloud\Video\Transcoder\V1\PreprocessingConfig_Deblock::class);

