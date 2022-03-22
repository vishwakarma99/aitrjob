<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/transcoder/v1/resources.proto

namespace Google\Cloud\Video\Transcoder\V1\VideoStream;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * VP9 codec settings.
 *
 * Generated from protobuf message <code>google.cloud.video.transcoder.v1.VideoStream.Vp9CodecSettings</code>
 */
class Vp9CodecSettings extends \Google\Protobuf\Internal\Message
{
    /**
     * The width of the video in pixels. Must be an even integer.
     * When not specified, the width is adjusted to match the specified height
     * and input aspect ratio. If both are omitted, the input width is used.
     *
     * Generated from protobuf field <code>int32 width_pixels = 1;</code>
     */
    private $width_pixels = 0;
    /**
     * The height of the video in pixels. Must be an even integer.
     * When not specified, the height is adjusted to match the specified width
     * and input aspect ratio. If both are omitted, the input height is used.
     *
     * Generated from protobuf field <code>int32 height_pixels = 2;</code>
     */
    private $height_pixels = 0;
    /**
     * Required. The target video frame rate in frames per second (FPS). Must be less than
     * or equal to 120. Will default to the input frame rate if larger than the
     * input frame rate. The API will generate an output FPS that is divisible
     * by the input FPS, and smaller or equal to the target FPS. See
     * [Calculating frame
     * rate](https://cloud.google.com/transcoder/docs/concepts/frame-rate) for
     * more information.
     *
     * Generated from protobuf field <code>double frame_rate = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $frame_rate = 0.0;
    /**
     * Required. The video bitrate in bits per second. Must be between 1 and
     * 1,000,000,000.
     *
     * Generated from protobuf field <code>int32 bitrate_bps = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $bitrate_bps = 0;
    /**
     * Pixel format to use. The default is `"yuv420p"`.
     * Supported pixel formats:
     * - 'yuv420p' pixel format.
     * - 'yuv422p' pixel format.
     * - 'yuv444p' pixel format.
     * - 'yuv420p10' 10-bit HDR pixel format.
     * - 'yuv422p10' 10-bit HDR pixel format.
     * - 'yuv444p10' 10-bit HDR pixel format.
     * - 'yuv420p12' 12-bit HDR pixel format.
     * - 'yuv422p12' 12-bit HDR pixel format.
     * - 'yuv444p12' 12-bit HDR pixel format.
     *
     * Generated from protobuf field <code>string pixel_format = 5;</code>
     */
    private $pixel_format = '';
    /**
     * Specify the `rate_control_mode`. The default is `"vbr"`.
     * Supported rate control modes:
     * - 'vbr' - variable bitrate
     * - 'crf' - constant rate factor
     *
     * Generated from protobuf field <code>string rate_control_mode = 6;</code>
     */
    private $rate_control_mode = '';
    /**
     * Target CRF level. Must be between 10 and 36, where 10 is the highest
     * quality and 36 is the most efficient compression. The default is 21.
     *
     * Generated from protobuf field <code>int32 crf_level = 7;</code>
     */
    private $crf_level = 0;
    /**
     * Enforces the specified codec profile. The following profiles are
     * supported:
     * *   `profile0` (default)
     * *   `profile1`
     * *   `profile2`
     * *   `profile3`
     * The available options are
     * [WebM-compatible](https://www.webmproject.org/vp9/profiles/){:
     * class="external" }. Note that certain values for this field may cause the
     * transcoder to override other fields you set in the `Vp9CodecSettings`
     * message.
     *
     * Generated from protobuf field <code>string profile = 10;</code>
     */
    private $profile = '';
    protected $gop_mode;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $width_pixels
     *           The width of the video in pixels. Must be an even integer.
     *           When not specified, the width is adjusted to match the specified height
     *           and input aspect ratio. If both are omitted, the input width is used.
     *     @type int $height_pixels
     *           The height of the video in pixels. Must be an even integer.
     *           When not specified, the height is adjusted to match the specified width
     *           and input aspect ratio. If both are omitted, the input height is used.
     *     @type float $frame_rate
     *           Required. The target video frame rate in frames per second (FPS). Must be less than
     *           or equal to 120. Will default to the input frame rate if larger than the
     *           input frame rate. The API will generate an output FPS that is divisible
     *           by the input FPS, and smaller or equal to the target FPS. See
     *           [Calculating frame
     *           rate](https://cloud.google.com/transcoder/docs/concepts/frame-rate) for
     *           more information.
     *     @type int $bitrate_bps
     *           Required. The video bitrate in bits per second. Must be between 1 and
     *           1,000,000,000.
     *     @type string $pixel_format
     *           Pixel format to use. The default is `"yuv420p"`.
     *           Supported pixel formats:
     *           - 'yuv420p' pixel format.
     *           - 'yuv422p' pixel format.
     *           - 'yuv444p' pixel format.
     *           - 'yuv420p10' 10-bit HDR pixel format.
     *           - 'yuv422p10' 10-bit HDR pixel format.
     *           - 'yuv444p10' 10-bit HDR pixel format.
     *           - 'yuv420p12' 12-bit HDR pixel format.
     *           - 'yuv422p12' 12-bit HDR pixel format.
     *           - 'yuv444p12' 12-bit HDR pixel format.
     *     @type string $rate_control_mode
     *           Specify the `rate_control_mode`. The default is `"vbr"`.
     *           Supported rate control modes:
     *           - 'vbr' - variable bitrate
     *           - 'crf' - constant rate factor
     *     @type int $crf_level
     *           Target CRF level. Must be between 10 and 36, where 10 is the highest
     *           quality and 36 is the most efficient compression. The default is 21.
     *     @type int $gop_frame_count
     *           Select the GOP size based on the specified frame count. Must be greater
     *           than zero.
     *     @type \Google\Protobuf\Duration $gop_duration
     *           Select the GOP size based on the specified duration. The default is
     *           `"3s"`. Note that `gopDuration` must be less than or equal to
     *           [`segmentDuration`](#SegmentSettings), and
     *           [`segmentDuration`](#SegmentSettings) must be divisible by
     *           `gopDuration`.
     *     @type string $profile
     *           Enforces the specified codec profile. The following profiles are
     *           supported:
     *           *   `profile0` (default)
     *           *   `profile1`
     *           *   `profile2`
     *           *   `profile3`
     *           The available options are
     *           [WebM-compatible](https://www.webmproject.org/vp9/profiles/){:
     *           class="external" }. Note that certain values for this field may cause the
     *           transcoder to override other fields you set in the `Vp9CodecSettings`
     *           message.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Video\Transcoder\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * The width of the video in pixels. Must be an even integer.
     * When not specified, the width is adjusted to match the specified height
     * and input aspect ratio. If both are omitted, the input width is used.
     *
     * Generated from protobuf field <code>int32 width_pixels = 1;</code>
     * @return int
     */
    public function getWidthPixels()
    {
        return $this->width_pixels;
    }

    /**
     * The width of the video in pixels. Must be an even integer.
     * When not specified, the width is adjusted to match the specified height
     * and input aspect ratio. If both are omitted, the input width is used.
     *
     * Generated from protobuf field <code>int32 width_pixels = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setWidthPixels($var)
    {
        GPBUtil::checkInt32($var);
        $this->width_pixels = $var;

        return $this;
    }

    /**
     * The height of the video in pixels. Must be an even integer.
     * When not specified, the height is adjusted to match the specified width
     * and input aspect ratio. If both are omitted, the input height is used.
     *
     * Generated from protobuf field <code>int32 height_pixels = 2;</code>
     * @return int
     */
    public function getHeightPixels()
    {
        return $this->height_pixels;
    }

    /**
     * The height of the video in pixels. Must be an even integer.
     * When not specified, the height is adjusted to match the specified width
     * and input aspect ratio. If both are omitted, the input height is used.
     *
     * Generated from protobuf field <code>int32 height_pixels = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setHeightPixels($var)
    {
        GPBUtil::checkInt32($var);
        $this->height_pixels = $var;

        return $this;
    }

    /**
     * Required. The target video frame rate in frames per second (FPS). Must be less than
     * or equal to 120. Will default to the input frame rate if larger than the
     * input frame rate. The API will generate an output FPS that is divisible
     * by the input FPS, and smaller or equal to the target FPS. See
     * [Calculating frame
     * rate](https://cloud.google.com/transcoder/docs/concepts/frame-rate) for
     * more information.
     *
     * Generated from protobuf field <code>double frame_rate = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return float
     */
    public function getFrameRate()
    {
        return $this->frame_rate;
    }

    /**
     * Required. The target video frame rate in frames per second (FPS). Must be less than
     * or equal to 120. Will default to the input frame rate if larger than the
     * input frame rate. The API will generate an output FPS that is divisible
     * by the input FPS, and smaller or equal to the target FPS. See
     * [Calculating frame
     * rate](https://cloud.google.com/transcoder/docs/concepts/frame-rate) for
     * more information.
     *
     * Generated from protobuf field <code>double frame_rate = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param float $var
     * @return $this
     */
    public function setFrameRate($var)
    {
        GPBUtil::checkDouble($var);
        $this->frame_rate = $var;

        return $this;
    }

    /**
     * Required. The video bitrate in bits per second. Must be between 1 and
     * 1,000,000,000.
     *
     * Generated from protobuf field <code>int32 bitrate_bps = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getBitrateBps()
    {
        return $this->bitrate_bps;
    }

    /**
     * Required. The video bitrate in bits per second. Must be between 1 and
     * 1,000,000,000.
     *
     * Generated from protobuf field <code>int32 bitrate_bps = 4 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setBitrateBps($var)
    {
        GPBUtil::checkInt32($var);
        $this->bitrate_bps = $var;

        return $this;
    }

    /**
     * Pixel format to use. The default is `"yuv420p"`.
     * Supported pixel formats:
     * - 'yuv420p' pixel format.
     * - 'yuv422p' pixel format.
     * - 'yuv444p' pixel format.
     * - 'yuv420p10' 10-bit HDR pixel format.
     * - 'yuv422p10' 10-bit HDR pixel format.
     * - 'yuv444p10' 10-bit HDR pixel format.
     * - 'yuv420p12' 12-bit HDR pixel format.
     * - 'yuv422p12' 12-bit HDR pixel format.
     * - 'yuv444p12' 12-bit HDR pixel format.
     *
     * Generated from protobuf field <code>string pixel_format = 5;</code>
     * @return string
     */
    public function getPixelFormat()
    {
        return $this->pixel_format;
    }

    /**
     * Pixel format to use. The default is `"yuv420p"`.
     * Supported pixel formats:
     * - 'yuv420p' pixel format.
     * - 'yuv422p' pixel format.
     * - 'yuv444p' pixel format.
     * - 'yuv420p10' 10-bit HDR pixel format.
     * - 'yuv422p10' 10-bit HDR pixel format.
     * - 'yuv444p10' 10-bit HDR pixel format.
     * - 'yuv420p12' 12-bit HDR pixel format.
     * - 'yuv422p12' 12-bit HDR pixel format.
     * - 'yuv444p12' 12-bit HDR pixel format.
     *
     * Generated from protobuf field <code>string pixel_format = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setPixelFormat($var)
    {
        GPBUtil::checkString($var, True);
        $this->pixel_format = $var;

        return $this;
    }

    /**
     * Specify the `rate_control_mode`. The default is `"vbr"`.
     * Supported rate control modes:
     * - 'vbr' - variable bitrate
     * - 'crf' - constant rate factor
     *
     * Generated from protobuf field <code>string rate_control_mode = 6;</code>
     * @return string
     */
    public function getRateControlMode()
    {
        return $this->rate_control_mode;
    }

    /**
     * Specify the `rate_control_mode`. The default is `"vbr"`.
     * Supported rate control modes:
     * - 'vbr' - variable bitrate
     * - 'crf' - constant rate factor
     *
     * Generated from protobuf field <code>string rate_control_mode = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setRateControlMode($var)
    {
        GPBUtil::checkString($var, True);
        $this->rate_control_mode = $var;

        return $this;
    }

    /**
     * Target CRF level. Must be between 10 and 36, where 10 is the highest
     * quality and 36 is the most efficient compression. The default is 21.
     *
     * Generated from protobuf field <code>int32 crf_level = 7;</code>
     * @return int
     */
    public function getCrfLevel()
    {
        return $this->crf_level;
    }

    /**
     * Target CRF level. Must be between 10 and 36, where 10 is the highest
     * quality and 36 is the most efficient compression. The default is 21.
     *
     * Generated from protobuf field <code>int32 crf_level = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setCrfLevel($var)
    {
        GPBUtil::checkInt32($var);
        $this->crf_level = $var;

        return $this;
    }

    /**
     * Select the GOP size based on the specified frame count. Must be greater
     * than zero.
     *
     * Generated from protobuf field <code>int32 gop_frame_count = 8;</code>
     * @return int
     */
    public function getGopFrameCount()
    {
        return $this->readOneof(8);
    }

    public function hasGopFrameCount()
    {
        return $this->hasOneof(8);
    }

    /**
     * Select the GOP size based on the specified frame count. Must be greater
     * than zero.
     *
     * Generated from protobuf field <code>int32 gop_frame_count = 8;</code>
     * @param int $var
     * @return $this
     */
    public function setGopFrameCount($var)
    {
        GPBUtil::checkInt32($var);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * Select the GOP size based on the specified duration. The default is
     * `"3s"`. Note that `gopDuration` must be less than or equal to
     * [`segmentDuration`](#SegmentSettings), and
     * [`segmentDuration`](#SegmentSettings) must be divisible by
     * `gopDuration`.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration gop_duration = 9;</code>
     * @return \Google\Protobuf\Duration|null
     */
    public function getGopDuration()
    {
        return $this->readOneof(9);
    }

    public function hasGopDuration()
    {
        return $this->hasOneof(9);
    }

    /**
     * Select the GOP size based on the specified duration. The default is
     * `"3s"`. Note that `gopDuration` must be less than or equal to
     * [`segmentDuration`](#SegmentSettings), and
     * [`segmentDuration`](#SegmentSettings) must be divisible by
     * `gopDuration`.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration gop_duration = 9;</code>
     * @param \Google\Protobuf\Duration $var
     * @return $this
     */
    public function setGopDuration($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Duration::class);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * Enforces the specified codec profile. The following profiles are
     * supported:
     * *   `profile0` (default)
     * *   `profile1`
     * *   `profile2`
     * *   `profile3`
     * The available options are
     * [WebM-compatible](https://www.webmproject.org/vp9/profiles/){:
     * class="external" }. Note that certain values for this field may cause the
     * transcoder to override other fields you set in the `Vp9CodecSettings`
     * message.
     *
     * Generated from protobuf field <code>string profile = 10;</code>
     * @return string
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * Enforces the specified codec profile. The following profiles are
     * supported:
     * *   `profile0` (default)
     * *   `profile1`
     * *   `profile2`
     * *   `profile3`
     * The available options are
     * [WebM-compatible](https://www.webmproject.org/vp9/profiles/){:
     * class="external" }. Note that certain values for this field may cause the
     * transcoder to override other fields you set in the `Vp9CodecSettings`
     * message.
     *
     * Generated from protobuf field <code>string profile = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setProfile($var)
    {
        GPBUtil::checkString($var, True);
        $this->profile = $var;

        return $this;
    }

    /**
     * @return string
     */
    public function getGopMode()
    {
        return $this->whichOneof("gop_mode");
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Vp9CodecSettings::class, \Google\Cloud\Video\Transcoder\V1\VideoStream_Vp9CodecSettings::class);

