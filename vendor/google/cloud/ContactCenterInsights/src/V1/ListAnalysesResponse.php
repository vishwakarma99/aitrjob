<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/contactcenterinsights/v1/contact_center_insights.proto

namespace Google\Cloud\ContactCenterInsights\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The response to list analyses.
 *
 * Generated from protobuf message <code>google.cloud.contactcenterinsights.v1.ListAnalysesResponse</code>
 */
class ListAnalysesResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The analyses that match the request.
     *
     * Generated from protobuf field <code>repeated .google.cloud.contactcenterinsights.v1.Analysis analyses = 1;</code>
     */
    private $analyses;
    /**
     * A token, which can be sent as `page_token` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     */
    private $next_page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\ContactCenterInsights\V1\Analysis[]|\Google\Protobuf\Internal\RepeatedField $analyses
     *           The analyses that match the request.
     *     @type string $next_page_token
     *           A token, which can be sent as `page_token` to retrieve the next page.
     *           If this field is omitted, there are no subsequent pages.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Contactcenterinsights\V1\ContactCenterInsights::initOnce();
        parent::__construct($data);
    }

    /**
     * The analyses that match the request.
     *
     * Generated from protobuf field <code>repeated .google.cloud.contactcenterinsights.v1.Analysis analyses = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAnalyses()
    {
        return $this->analyses;
    }

    /**
     * The analyses that match the request.
     *
     * Generated from protobuf field <code>repeated .google.cloud.contactcenterinsights.v1.Analysis analyses = 1;</code>
     * @param \Google\Cloud\ContactCenterInsights\V1\Analysis[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAnalyses($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\ContactCenterInsights\V1\Analysis::class);
        $this->analyses = $arr;

        return $this;
    }

    /**
     * A token, which can be sent as `page_token` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @return string
     */
    public function getNextPageToken()
    {
        return $this->next_page_token;
    }

    /**
     * A token, which can be sent as `page_token` to retrieve the next page.
     * If this field is omitted, there are no subsequent pages.
     *
     * Generated from protobuf field <code>string next_page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setNextPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->next_page_token = $var;

        return $this;
    }

}

