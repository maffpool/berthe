<?php

namespace Berthe;

class VOComposite
{
    /**
     * Internal component
     * @var object
     */
    private $component;

    public function __construct($component)
    {
        $this->component = $component;
    }

    public function __call($name, $arguments)
    {
        if(method_exists($this->component, $name)) {
            $ret = call_user_func_array(array($this->component, $name), $arguments);

            // Don't break setter chaining
            if($ret === $this->component) {
                return $this;
            }

           return $ret;
        }
        else {
            throw new \BadMethodCallException(sprintf('%s::%s doesn\'t exist', get_class($this->component), $name));
        }
    }
}