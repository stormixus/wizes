$(document).ready(function(){

/* Menu Up Dropdown */

$(".top-main-navigation > .dropdown > ul > .dropdown").each(function(){
    var items_inside = $("> ul > li", this);

    if ($(this).index() + items_inside.length > 17) {
        if (items_inside.length < 17) {
            $(this).addClass("show-top");
        }
    }
});

/* End Menu Up Dropdown */

/* Category Menu Dropdown */

$(".dropdown-section").click(function(){
    if (!$(this).hasClass("open")){
        $(this).addClass("open");
    } else {
        $(this).removeClass("open");
    }
    return false;
});

/* End Category Menu Dropdown */

});