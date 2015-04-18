<?php

/**
 * AbstractColleague
 * Interface Filter
 */
interface Filter
{
    /**
     * @param $value
     * @return mixed
     */
    public function filter($value);
}

/**
 * Class TrimFilter
 */
class TrimFilter implements Filter
{
    /**
     * @param $value
     * @return string
     */
    public function filter($value)
    {
        return trim($value);
    }
}

/**
 * Class NullFilter
 */
class NullFilter implements Filter
{
    /**
     * @param $value
     * @return string
     */
    public function filter($value)
    {
        return $value ? $value : '';
    }
}

/**
 * Class HtmlEntitiesFilter
 */
class HtmlEntitiesFilter implements Filter
{
    /**
     * @param $value
     * @return string
     */
    public function filter($value)
    {
        return htmlentities($value);
    }
}

/**
 * Class InputElement
 */
class InputElement
{
    /**
     * @var Filter[]
     */
    protected $_filters;
    /**
     * @var
     */
    protected $_value;

    /**
     * @param Filter $filter
     * @return $this
     */
    public function addFilter(Filter $filter)
    {
        $this->_filters[] = $filter;

        return $this;
    }

    /**
     * @param $value
     */
    public function setValue($value)
    {
        $this->_value = $this->_filter($value);
    }

    /**
     * @param $value
     * @return mixed
     */
    protected function _filter($value)
    {
        foreach ($this->_filters as $filter) {
            $value = $filter->filter($value);
        }

        return $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->_value;
    }
}


//ClientCode

$input = new InputElement();
$input->addFilter(new NullFilter())
      ->addFilter(new TrimFilter())
      ->addFilter(new HtmlEntitiesFilter());

$input->setValue('You should use the <h1>-</h6> tags for your headings.');
echo $input->getValue();
