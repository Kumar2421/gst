

//droptown toogle show
// function toggleShow () {
//   var el = document.getElementById("box");
//   el.classList.toggle("show");
// }
// $('.sub-menu ul').hide();
// $(".sub-menu a").click(function () {
// $(this).parent(".sub-menu").children("ul").slideToggle("100");

// });

$(document).ready(function () {
  // Hide all sub-menu ul elements initially
  $('.sub-menu ul').hide();

  // Add a click event listener to each ".sub-menu a" element
  $(".sub-menu a").click(function (event) {
    // Prevent the default behavior of the anchor tag
    event.preventDefault();

    // Find the corresponding ul element and toggle its visibility
    $(this).siblings("ul").slideToggle("100");
  });
});


//mobile hamburger toggle
$(function() {
  function slideMenu() {
    var activeState = $("#menu-container .menu-list").hasClass("active");
    $("#menu-container .menu-list").animate({left: activeState ? "0%" : "-100%"}, 400);
  }
  $("#menu-wrapper").click(function(event) {
    event.stopPropagation();
    $("#hamburger-menu").toggleClass("open");
    $("#menu-container .menu-list").toggleClass("active");
    slideMenu();

    $("body").toggleClass("overflow-hidden");
  });

  $(".menu-list").find(".accordion-toggle").click(function() {
    $(this).next().toggleClass("open").slideToggle("fast");
    $(this).toggleClass("active-tab").find(".menu-link").toggleClass("active");

    $(".menu-list .accordion-content").not($(this).next()).slideUp("fast").removeClass("open");
    $(".menu-list .accordion-toggle").not(jQuery(this)).removeClass("active-tab").find(".menu-link").removeClass("active");
  });
}); 
function myFunction(x) {
  x.classList.toggle("fa-caret-down");
};
// $(document).ready(function() {
//   $("#hide").click(function(event) {
//       event.preventDefault();
//       $("#r").css("background-color", "blue");
//   });
// });
$(document).ready(function() {
  $("#hide").click(function(event) {
      event.preventDefault();

      var currentColor = $("#r").css("background-color");
      var newColor = (currentColor === "rgb(0, 0, 255)") ? "transparent" : "brown";
      $("#hide").css("color", "blue");

      $("#hide").css("background-color", newColor);
  });
});
