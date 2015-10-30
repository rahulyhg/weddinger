var app = Marionette.Application.extend({
  initialize: function(options) {
    console.log('My container:', options.container);
  }
});

// Although applications will not do anything
// with a `container` option out-of-the-box, you
// could build an Application Class that does use
// such an option.
var app = new app({container: '#hashtags'});

MyApp.on("before:start", function(options){
  options.moreData = "Yo dawg, I heard you like options so I put some options in your options!";
});

MyApp.on("start", function(options){
  if (Backbone.history){
    Backbone.history.start();
  }
});
//you were looking here 
//http://marionettejs.com/docs/v2.4.3/marionette.application.html
//# sourceMappingURL=instastream.js.map
