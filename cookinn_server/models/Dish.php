<?php

class Dish
{
    private $_dishId;
    private $_name;
    private $_origin;
    private $_timeToCook;

    /**
     * Build a dish from array of data
     * @param array $data 
     */
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /**
     * Return converted object in array
     * @return type
     */
    public function objectToArray()
    {
        return get_object_vars($this);
    }

    /**
     * Set all the dish properties from array of data
     * @param array $data 
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace("_", "", ucwords($key, "_"));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Gets the value of _dishId.
     * @return mixed
     */
    public function getDishId()
    {
        return $this->_dishId;
    }

    /**
     * Sets the value of _dishId.
     * @param mixed $_dishId the _dish id
     */
    public function setDishId($_dishId)
    {
        $_dishId = (int) $_dishId;
        $this->_dishId = $_dishId;
    }

    /**
     * Gets the value of _name.
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Sets the value of _name.
     * @param mixed $_name the _name
     */
    public function setName($_name)
    {
        if (is_string($_name)) {
        	$this->_name = $_name;
        }
    }

    /**
     * Gets the value of _origin.
     *
     * @return mixed
     */
    public function getOrigin()
    {
        return $this->_origin;
    }

    /**
     * Sets the value of _origin.
     * @param mixed $_origin the _origin
     */
    public function setOrigin($_origin)
    {
        if (is_string($_origin)) {
        	$this->_origin = $_origin;
        }
    }

    /**
     * Gets the value of _timeToCook.
     * @return mixed
     */
    public function getTimeToCook()
    {
        return $this->_timeToCook;
    }

    /**
     * Sets the value of _timeToCook.
     * @param mixed $_timeToCook the _time to cook
     */
    public function setTimeToCook($_timeToCook)
    {
    	$_timeToCook = date('H:i', strtotime($_timeToCook));
        $this->_timeToCook = $_timeToCook;
    }

}