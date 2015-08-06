<?php
namespace DP\GOF\Structural\Adapter;

/**
 * Class PayPal
 */
class PayPal
{
    /**
     * @param $amount
     */
    public function sendPayment($amount)
    {
        echo "Paying via PayPal: {$amount}";
    }
}

/**
 * Interface PaymentAdapter
 */
interface PaymentAdapter
{
    /**
     * @param $amount
     */
    public function pay($amount);
}

/**
 * Class PaypalAdapter
 */
class PaypalAdapter implements PaymentAdapter
{
    /**
     * @var PayPal
     */
    private $paypal;

    /**
     * @param PayPal $paypal
     */
    public function __construct(PayPal $paypal)
    {
        $this->paypal = $paypal;
    }

    /**
     * @param $amount
     */
    public function pay($amount)
    {
        $this->paypal->sendPayment($amount);
    }
}

/**
 * Class MoneyBooker
 */
class MoneyBooker
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @param $amount
     */
    public function doPayment($amount)
    {
        echo "Paying via MoneyBooker: {$amount}";
    }
}

/**
 * Class MoneyBookerAdapter
 */
class MoneyBookerAdapter implements PaymentAdapter
{
    /**
     * @var MoneyBooker
     */
    private $moneybooker;

    /**
     * @param MoneyBooker $moneybooker
     */
    public function __construct(MoneyBooker $moneybooker)
    {
        $this->moneybooker = $moneybooker;
    }

    /**
     * @param $amount
     */
    public function pay($amount)
    {
        $this->moneybooker->doPayment($amount);
    }
}


$paypal = new PaypalAdapter(new PayPal());
$paypal->pay(29.35);

$moneybooker = new MoneyBookerAdapter(new MoneyBooker());
$moneybooker->pay(29.35);

