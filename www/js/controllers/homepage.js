var Homepage = function(baseServerUrl, imgFolder){

    this.baseServerUrl = null;

    /**
    * Initialise object homepage
    * @return this
    */
    this.init = function(){
        this.baseServerUrl = baseServerUrl;
        this.getFeaturedDishes();
        return this;
    };

    /**
    * Initialise all the event happening on the homepage
    */
    this.initEventListener = function(){

        var self = this;
    };

    /**
    * Get all the featured dishes of the period
    */
    this.getFeaturedDishes = function(){
        // Ajax call to get all the featured dishes in json format
        $.get(this.baseServerUrl + "index.php/Homepage/index", {"data" : "featureddishes"}, function(data, status){
            console.log($.parseJSON(data));
            var featuredDishes = $.parseJSON(data);

            // Loop through the dishes to display all the tiles
            $.each(featuredDishes, function(key, value){
                
            });
        });
    };

    /**
    * Get all the featured users of the period
    */
    this.getFeaturedUsers = function(){

    };


    this.init();

};
