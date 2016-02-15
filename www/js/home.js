var Home = function(){
    
    this.initialize = function(){
        this.$el = $('<div/>');
    };
    
    this.render = function(){
        this.$el.html(this.template());
        $('.content').html(this.$el);
        return this;
    };
    
    this.initialize();
}