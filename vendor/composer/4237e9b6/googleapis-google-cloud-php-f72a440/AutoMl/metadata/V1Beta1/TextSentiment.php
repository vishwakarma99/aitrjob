<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1beta1/text_sentiment.proto

namespace GPBMetadata\Google\Cloud\Automl\V1Beta1;

class TextSentiment
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\Classification::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
0google/cloud/automl/v1beta1/text_sentiment.protogoogle.cloud.automl.v1beta1google/api/annotations.proto",
TextSentimentAnnotation
	sentiment ("�
TextSentimentEvaluationMetrics
	precision (
recall (
f1_score (
mean_absolute_error (
mean_squared_error (
linear_kappa (
quadratic_kappa (f
confusion_matrix (2L.google.cloud.automl.v1beta1.ClassificationEvaluationMetrics.ConfusionMatrix
annotation_spec_id	 (	BB�
com.google.cloud.automl.v1beta1BTextSentimentProtoZAgoogle.golang.org/genproto/googleapis/cloud/automl/v1beta1;automl�Google\\Cloud\\AutoMl\\V1beta1�Google::Cloud::AutoML::V1beta1bproto3'
        , true);

        static::$is_initialized = true;
    }
}
