<?php
/**
 * Created by priyashantha@silverstripers.com
 * Date: 6/24/20
 * Time: 4:39 PM
 */

namespace Omnipay\PayHere\Message;

use Omnipay\Common\Message\AbstractResponse;
use function print_r;

class CompletePurchaseResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        return isset($this->data['order_id']);
    }
}