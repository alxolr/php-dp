<?php
namespace DP\GOF\Behavioral\ChainOfResponsibility;

/**
 * Class Logger
 */
abstract class Logger
{
    /**
     * @var Logger
     */
    private $next = null;

    /**
     * @param Logger $next
     * @return Logger|null
     */
    public function setNext(Logger $next)
    {
        $this->next = $next;

        return $this->next;
    }

    /**
     * @param $message
     */
    public function log($message)
    {
        $this->doLog($message);
        if ($this->next !== null) {
            $this->next->doLog($message);
        }
    }

    /**
     * @param $message
     * @return mixed
     */
    abstract protected function doLog($message);
}

/**
 * Class EmailLogger
 */
class EmailLogger extends Logger
{
    /**
     * @param $message
     * @return mixed|void
     */
    protected function doLog($message)
    {
        echo "Sending via email: ", $message, " \n";
    }
}

/**
 * Class ErrorLogger
 */
class ErrorLogger extends Logger
{
    /**
     * @param $message
     * @return mixed|void
     */
    protected function doLog($message)
    {
        echo "Sending to stderr: ", $message, " \n";
    }
}

/**
 * Class StdoutLogger
 */
class StdoutLogger extends Logger
{
    /**
     * @param $message
     * @return mixed|void
     */
    protected function doLog($message)
    {
        echo "Writing to stdout: ", $message, " \n";
    }
}

$logger = new StdoutLogger();
$logger->setNext(new ErrorLogger())->setNext(new EmailLogger());
$logger->log('Something happened');
