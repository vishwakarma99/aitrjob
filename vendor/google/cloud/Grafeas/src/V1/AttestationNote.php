<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: grafeas/v1/attestation.proto

namespace Grafeas\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Note kind that represents a logical attestation "role" or "authority". For
 * example, an organization might have one `Authority` for "QA" and one for
 * "build". This note is intended to act strictly as a grouping mechanism for
 * the attached occurrences (Attestations). This grouping mechanism also
 * provides a security boundary, since IAM ACLs gate the ability for a principle
 * to attach an occurrence to a given note. It also provides a single point of
 * lookup to find all attached attestation occurrences, even if they don't all
 * live in the same project.
 *
 * Generated from protobuf message <code>grafeas.v1.AttestationNote</code>
 */
class AttestationNote extends \Google\Protobuf\Internal\Message
{
    /**
     * Hint hints at the purpose of the attestation authority.
     *
     * Generated from protobuf field <code>.grafeas.v1.AttestationNote.Hint hint = 1;</code>
     */
    private $hint = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Grafeas\V1\AttestationNote\Hint $hint
     *           Hint hints at the purpose of the attestation authority.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Grafeas\V1\Attestation::initOnce();
        parent::__construct($data);
    }

    /**
     * Hint hints at the purpose of the attestation authority.
     *
     * Generated from protobuf field <code>.grafeas.v1.AttestationNote.Hint hint = 1;</code>
     * @return \Grafeas\V1\AttestationNote\Hint|null
     */
    public function getHint()
    {
        return isset($this->hint) ? $this->hint : null;
    }

    public function hasHint()
    {
        return isset($this->hint);
    }

    public function clearHint()
    {
        unset($this->hint);
    }

    /**
     * Hint hints at the purpose of the attestation authority.
     *
     * Generated from protobuf field <code>.grafeas.v1.AttestationNote.Hint hint = 1;</code>
     * @param \Grafeas\V1\AttestationNote\Hint $var
     * @return $this
     */
    public function setHint($var)
    {
        GPBUtil::checkMessage($var, \Grafeas\V1\AttestationNote\Hint::class);
        $this->hint = $var;

        return $this;
    }

}

