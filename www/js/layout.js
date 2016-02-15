var Layout = function(){
    
    this.initialize = function(){
        this.$el = $('<div/>');
    };
    
    this.render = function(){
        this.$el.html(this.template());
        $('.layout').html(this.$el);
        return this;
    };
    
    this.initialize();
}