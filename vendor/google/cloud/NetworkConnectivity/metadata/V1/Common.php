<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/networkconnectivity/v1/common.proto

namespace GPBMetadata\Google\Cloud\Networkconnectivity\V1;

class Common
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
0google/cloud/networkconnectivity/v1/common.proto#google.cloud.networkconnectivity.v1google/protobuf/timestamp.protogoogle/api/annotations.proto"�
OperationMetadata4
create_time (2.google.protobuf.TimestampB�A1
end_time (2.google.protobuf.TimestampB�A
target (	B�A
verb (	B�A
status_message (	B�A#
requested_cancellation (B�A
api_version (	B�AB�
\'com.google.cloud.networkconnectivity.v1BCommonProtoPZVgoogle.golang.org/genproto/googleapis/cloud/networkconnectivity/v1;networkconnectivity�#Google.Cloud.NetworkConnectivity.V1�#Google\\Cloud\\NetworkConnectivity\\V1�&Google::Cloud::NetworkConnectivity::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

