(function() {
  
  document.addEventListener("DOMContentLoaded", function(event) {
    
    // console.log("DOM loaded");
    
    //wait until images, links, fonts, stylesheets, and js is loaded
    window.addEventListener("load", function(e) {
    
      const loader = document.querySelector('#loader');
      
      if(loader) {
        loader.remove();
      }

    }, false);
    
  });


})();