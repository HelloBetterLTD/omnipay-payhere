<?php

namespace Omnipay\PayHere\Message;

class PurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('amount', 'returnUrl', 'card');

        $data = array();
        $data['merchant_id'] = $this->getMerchantId();
        $data['return_url'] = $this->getReturnUrl();
        $data['cancel_url'] = $this->getCancelUrl();
        $data['notify_url'] = $this->getNotifyUrl() ?: $this->getReturnUrl();

        $data['order_id'] = $this->getTransactionId();
        $data['items'] = $this->getDescription();
        $data['currency'] = $this->getCurrency();
        $data['recurrence'] = $this->getRecurrence();
        $data['duration'] = $this->getDuration();
        $data['amount'] = $this->getAmount();

        $data['first_name'] = $this->getFirstName();
        $data['last_name'] = $this->getLastName();
        $data['phone'] = $this->getPhoneNumber();
        $data['email'] = $this->getEmail();
        $data['address'] = '';
        $data['city'] = '';
        $data['country'] = '';
//        $data['hash'] = $this->generateFingerprint($data);

        return $data;
    }

    public function generateFingerprint(array $data)
    {
        $hash = implode(
            '|',
            array(
                $data['merchant_id'],
                $this->getMerchantSecret(),
                $data['amount'],
                $data['order_id'],
                gmdate('YmdHis'),
            )
        );

        return sha1($hash);
    }

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data, $this->getEndpoint());
    }
}
