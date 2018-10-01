//Setup slideout menu
var slideout = new Slideout({
  panel: document.getElementById("panel"),
  menu: document.getElementById("menu"),
  padding: 256,
  tolerance: 70,
  touch: false
});
$(".menuButton").click(function(e) {
  $("#menu").css("display", "block");
  e.preventDefault();
  slideout.toggle();
});
$(".closeNav .fa-window-close").click(function() {
  $("#menu")
    .delay(500)
    .queue(function(next) {
      $(this).css("display", "none");
      next();
    });
  slideout.close();
});
//Setup twitter integration
window.twttr = (function(d, s, id) {
  var js,
    fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
  return t;
})(document, "script", "twitter-wjs");
