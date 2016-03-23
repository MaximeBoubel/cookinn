<?php

/**
 * Controller acting on the main interface
 */
class HomepageController
{
    /**
     * From an ajax call, send  all the data back to the homepage when loading
     */
    public function index()
    {
        $db = Connection::get();
        $dishManager = new DishManager($db);

        if (isset($_GET["data"]) && $_GET["data"] === "featureddishes"){
            
            $list = $dishManager->getFeaturedList();
            $return = array();
            foreach ($list as $value) {
                $val = $value->objectToArray();
                $return[] = $val;
            }
        }

        echo json_encode($return);
    }
    
}
