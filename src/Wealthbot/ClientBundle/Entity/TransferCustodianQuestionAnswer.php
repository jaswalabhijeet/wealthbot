<?php

namespace Wealthbot\ClientBundle\Entity;

/**
 * TransferCustodianQuestionAnswer.
 */
class TransferCustodianQuestionAnswer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $transfer_custodian_question_id;

    /**
     * @var int
     */
    private $transfer_information_id;

    /**
     * @var bool
     */
    private $value;

    /**
     * @var \Wealthbot\ClientBundle\Entity\TransferCustodianQuestion
     */
    private $question;

    /**
     * @var \Wealthbot\ClientBundle\Entity\TransferInformation
     */
    private $transferInformation;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set transfer_custodian_question_id.
     *
     * @param int $transferCustodianQuestionId
     *
     * @return TransferCustodianQuestionAnswer
     */
    public function setTransferCustodianQuestionId($transferCustodianQuestionId)
    {
        $this->transfer_custodian_question_id = $transferCustodianQuestionId;

        return $this;
    }

    /**
     * Get transfer_custodian_question_id.
     *
     * @return int
     */
    public function getTransferCustodianQuestionId()
    {
        return $this->transfer_custodian_question_id;
    }

    /**
     * Set transfer_information_id.
     *
     * @param int $transferInformationId
     *
     * @return TransferCustodianQuestionAnswer
     */
    public function setTransferInformationId($transferInformationId)
    {
        $this->transfer_information_id = $transferInformationId;

        return $this;
    }

    /**
     * Get transfer_information_id.
     *
     * @return int
     */
    public function getTransferInformationId()
    {
        return $this->transfer_information_id;
    }

    /**
     * Set value.
     *
     * @param bool $value
     *
     * @return TransferCustodianQuestionAnswer
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value.
     *
     * @return bool
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set question.
     *
     * @param \Wealthbot\ClientBundle\Entity\TransferCustodianQuestion $question
     *
     * @return TransferCustodianQuestionAnswer
     */
    public function setQuestion(\Wealthbot\ClientBundle\Entity\TransferCustodianQuestion $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question.
     *
     * @return \Wealthbot\ClientBundle\Entity\TransferCustodianQuestion
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set transferInformation.
     *
     * @param \Wealthbot\ClientBundle\Entity\TransferInformation $transferInformation
     *
     * @return TransferCustodianQuestionAnswer
     */
    public function setTransferInformation(\Wealthbot\ClientBundle\Entity\TransferInformation $transferInformation = null)
    {
        $this->transferInformation = $transferInformation;

        return $this;
    }

    /**
     * Get transferInformation.
     *
     * @return \Wealthbot\ClientBundle\Entity\TransferInformation
     */
    public function getTransferInformation()
    {
        return $this->transferInformation;
    }
}
