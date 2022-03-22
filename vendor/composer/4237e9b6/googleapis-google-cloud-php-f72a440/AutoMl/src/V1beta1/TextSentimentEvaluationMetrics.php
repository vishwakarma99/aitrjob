<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1beta1/text_sentiment.proto

namespace Google\Cloud\AutoMl\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Model evaluation metrics for text sentiment problems.
 *
 * Generated from protobuf message <code>google.cloud.automl.v1beta1.TextSentimentEvaluationMetrics</code>
 */
class TextSentimentEvaluationMetrics extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. Precision.
     *
     * Generated from protobuf field <code>float precision = 1;</code>
     */
    private $precision = 0.0;
    /**
     * Output only. Recall.
     *
     * Generated from protobuf field <code>float recall = 2;</code>
     */
    private $recall = 0.0;
    /**
     * Output only. The harmonic mean of recall and precision.
     *
     * Generated from protobuf field <code>float f1_score = 3;</code>
     */
    private $f1_score = 0.0;
    /**
     * Output only. Mean absolute error. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float mean_absolute_error = 4;</code>
     */
    private $mean_absolute_error = 0.0;
    /**
     * Output only. Mean squared error. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float mean_squared_error = 5;</code>
     */
    private $mean_squared_error = 0.0;
    /**
     * Output only. Linear weighted kappa. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float linear_kappa = 6;</code>
     */
    private $linear_kappa = 0.0;
    /**
     * Output only. Quadratic weighted kappa. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float quadratic_kappa = 7;</code>
     */
    private $quadratic_kappa = 0.0;
    /**
     * Output only. Confusion matrix of the evaluation.
     * Only set for the overall model evaluation, not for evaluation of a single
     * annotation spec.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationEvaluationMetrics.ConfusionMatrix confusion_matrix = 8;</code>
     */
    private $confusion_matrix = null;
    /**
     * Output only. The annotation spec ids used for this evaluation.
     * Deprecated .
     *
     * Generated from protobuf field <code>repeated string annotation_spec_id = 9 [deprecated = true];</code>
     * @deprecated
     */
    private $annotation_spec_id;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $precision
     *           Output only. Precision.
     *     @type float $recall
     *           Output only. Recall.
     *     @type float $f1_score
     *           Output only. The harmonic mean of recall and precision.
     *     @type float $mean_absolute_error
     *           Output only. Mean absolute error. Only set for the overall model
     *           evaluation, not for evaluation of a single annotation spec.
     *     @type float $mean_squared_error
     *           Output only. Mean squared error. Only set for the overall model
     *           evaluation, not for evaluation of a single annotation spec.
     *     @type float $linear_kappa
     *           Output only. Linear weighted kappa. Only set for the overall model
     *           evaluation, not for evaluation of a single annotation spec.
     *     @type float $quadratic_kappa
     *           Output only. Quadratic weighted kappa. Only set for the overall model
     *           evaluation, not for evaluation of a single annotation spec.
     *     @type \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics\ConfusionMatrix $confusion_matrix
     *           Output only. Confusion matrix of the evaluation.
     *           Only set for the overall model evaluation, not for evaluation of a single
     *           annotation spec.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $annotation_spec_id
     *           Output only. The annotation spec ids used for this evaluation.
     *           Deprecated .
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\TextSentiment::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. Precision.
     *
     * Generated from protobuf field <code>float precision = 1;</code>
     * @return float
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * Output only. Precision.
     *
     * Generated from protobuf field <code>float precision = 1;</code>
     * @param float $var
     * @return $this
     */
    public function setPrecision($var)
    {
        GPBUtil::checkFloat($var);
        $this->precision = $var;

        return $this;
    }

    /**
     * Output only. Recall.
     *
     * Generated from protobuf field <code>float recall = 2;</code>
     * @return float
     */
    public function getRecall()
    {
        return $this->recall;
    }

    /**
     * Output only. Recall.
     *
     * Generated from protobuf field <code>float recall = 2;</code>
     * @param float $var
     * @return $this
     */
    public function setRecall($var)
    {
        GPBUtil::checkFloat($var);
        $this->recall = $var;

        return $this;
    }

    /**
     * Output only. The harmonic mean of recall and precision.
     *
     * Generated from protobuf field <code>float f1_score = 3;</code>
     * @return float
     */
    public function getF1Score()
    {
        return $this->f1_score;
    }

    /**
     * Output only. The harmonic mean of recall and precision.
     *
     * Generated from protobuf field <code>float f1_score = 3;</code>
     * @param float $var
     * @return $this
     */
    public function setF1Score($var)
    {
        GPBUtil::checkFloat($var);
        $this->f1_score = $var;

        return $this;
    }

    /**
     * Output only. Mean absolute error. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float mean_absolute_error = 4;</code>
     * @return float
     */
    public function getMeanAbsoluteError()
    {
        return $this->mean_absolute_error;
    }

    /**
     * Output only. Mean absolute error. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float mean_absolute_error = 4;</code>
     * @param float $var
     * @return $this
     */
    public function setMeanAbsoluteError($var)
    {
        GPBUtil::checkFloat($var);
        $this->mean_absolute_error = $var;

        return $this;
    }

    /**
     * Output only. Mean squared error. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float mean_squared_error = 5;</code>
     * @return float
     */
    public function getMeanSquaredError()
    {
        return $this->mean_squared_error;
    }

    /**
     * Output only. Mean squared error. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float mean_squared_error = 5;</code>
     * @param float $var
     * @return $this
     */
    public function setMeanSquaredError($var)
    {
        GPBUtil::checkFloat($var);
        $this->mean_squared_error = $var;

        return $this;
    }

    /**
     * Output only. Linear weighted kappa. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float linear_kappa = 6;</code>
     * @return float
     */
    public function getLinearKappa()
    {
        return $this->linear_kappa;
    }

    /**
     * Output only. Linear weighted kappa. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float linear_kappa = 6;</code>
     * @param float $var
     * @return $this
     */
    public function setLinearKappa($var)
    {
        GPBUtil::checkFloat($var);
        $this->linear_kappa = $var;

        return $this;
    }

    /**
     * Output only. Quadratic weighted kappa. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float quadratic_kappa = 7;</code>
     * @return float
     */
    public function getQuadraticKappa()
    {
        return $this->quadratic_kappa;
    }

    /**
     * Output only. Quadratic weighted kappa. Only set for the overall model
     * evaluation, not for evaluation of a single annotation spec.
     *
     * Generated from protobuf field <code>float quadratic_kappa = 7;</code>
     * @param float $var
     * @return $this
     */
    public function setQuadraticKappa($var)
    {
        GPBUtil::checkFloat($var);
        $this->quadratic_kappa = $var;

        return $this;
    }

    /**
     * Output only. Confusion matrix of the evaluation.
     * Only set for the overall model evaluation, not for evaluation of a single
     * annotation spec.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationEvaluationMetrics.ConfusionMatrix confusion_matrix = 8;</code>
     * @return \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics\ConfusionMatrix|null
     */
    public function getConfusionMatrix()
    {
        return isset($this->confusion_matrix) ? $this->confusion_matrix : null;
    }

    public function hasConfusionMatrix()
    {
        return isset($this->confusion_matrix);
    }

    public function clearConfusionMatrix()
    {
        unset($this->confusion_matrix);
    }

    /**
     * Output only. Confusion matrix of the evaluation.
     * Only set for the overall model evaluation, not for evaluation of a single
     * annotation spec.
     *
     * Generated from protobuf field <code>.google.cloud.automl.v1beta1.ClassificationEvaluationMetrics.ConfusionMatrix confusion_matrix = 8;</code>
     * @param \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics\ConfusionMatrix $var
     * @return $this
     */
    public function setConfusionMatrix($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\AutoMl\V1beta1\ClassificationEvaluationMetrics\ConfusionMatrix::class);
        $this->confusion_matrix = $var;

        return $this;
    }

    /**
     * Output only. The annotation spec ids used for this evaluation.
     * Deprecated .
     *
     * Generated from protobuf field <code>repeated string annotation_spec_id = 9 [deprecated = true];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     * @deprecated
     */
    public function getAnnotationSpecId()
    {
        @trigger_error('annotation_spec_id is deprecated.', E_USER_DEPRECATED);
        return $this->annotation_spec_id;
    }

    /**
     * Output only. The annotation spec ids used for this evaluation.
     * Deprecated .
     *
     * Generated from protobuf field <code>repeated string annotation_spec_id = 9 [deprecated = true];</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     * @deprecated
     */
    public function setAnnotationSpecId($var)
    {
        @trigger_error('annotation_spec_id is deprecated.', E_USER_DEPRECATED);
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->annotation_spec_id = $arr;

        return $this;
    }

}
