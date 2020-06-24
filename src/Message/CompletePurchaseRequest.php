<?php
/**
 * Created by priyashantha@silverstripers.com
 * Date: 6/24/20
 * Time: 4:35 PM
 */

namespace Omnipay\PayHere\Message;


class CompletePurchaseRequest extends AbstractRequest
{
    public function getData()
    {
        return $this->httpRequest->query->all();
    }

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}