<?php

require_once getcwd() . "/models/Dish.php";
require_once getcwd() . "/models/Connection.php";

class DishManager
{
    private $_db;

    /**
     * DishManager's constructor
     */
    public function __construct($db)
    {
        $this->setDb($db);
    }

    /**
     * Gets the value of _db.
     * @return mixed
     */
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Sets the value of _db.
     * @param mixed $_db the _db
     */
    public function setDb($db)
    {
        $this->_db = $db;
    }

    /**
     * Return list of dishes
     * @return type
     */
    public function getList()
    {
        $dishes = array();

        $query = $this->_db->query('SELECT * FROM dish ORDER BY name');

        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $dishes[] = new Dish($data);
        }       

        return $dishes;
    }

    /**
     * Return all the featured dishes
     * @return type array of objects
     */
    public function getFeaturedList()
    {
        $featuredDishes = array();

        $query = $this->_db->query('SELECT * FROM dish WHERE featured = true');

        while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
            $featuredDishes[] = new Dish($data);
        }

        return $featuredDishes;
    }

    /**
     * Return a dish with an id
     * @param type $id 
     */
    public function getDishById($id)
    {
        $query = $this->_db->query('SELECT * FROM dish WHERE dish_id = ' . $id);
        $data = $query->fetch();

        if ($data) {
            $dish = new Dish($data);
        
            return $dish;
        }
    }

    /**
     * Add a dish to the database
     * @param Dish $dish 
     */
    public function add(Dish $dish)
    {
        $query = $this->_db->prepare('INSERT INTO dish(name, origin, time_to_cook) VALUES(:name, :origin, :time_to_cook)');
        $query->execute(array(
            'name'         => $dish->getName(),
            'origin'       => $dish->getOrigin(),
            'time_to_cook' => $dish->getTimeToCook()
        ));        
    }

    /**
     * Delete a dish
     * @param Dish $dish 
     */
    public function delete(Dish $dish)
    {
        $this->_db->query('DELETE FROM dish WHERE dish_id = ' . $dish->getDishId());
    }

    /**
     * Update data of a dish
     * @param Dish $dish 
     */
    public function update(Dish $dish)
    {
        $query = $this->_db->prepare('UPDATE dish SET name = :name, origin = :origin, time_to_cook = :time_to_cook WHERE dish_id = :dish_id');
        $query->execute(array(
            'name'         => $dish->getName(),
            'origin'       => $dish->getOrigin(),
            'time_to_cook' => $dish->getTimeToCook(),
            'dish_id'           => $dish->getDishId()
        ));
    }
}