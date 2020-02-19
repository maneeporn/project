$(document).ready(function() {
  var s = $(".addtocart");
  var pos = s.position();
  $(window).scroll(function() {
      var windowpos = $(window).scrollTop();
      if (windowpos >= 305) {
          s.addClass("stick");
      } else {
          s.removeClass("stick"); 
      }
  });
});