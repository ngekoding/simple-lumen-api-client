$(function() {
    var $el, leftPos, newWidth;

    $(".tab-menu").append("<div id='magic-line'></div>");
    
    /* Cache it */
    var $magicLine = $("#magic-line");
    
    $magicLine
        .width($(".current_page_item").width())
        .css("left", $(".current_page_item a").offset().left)
        .data("origLeft", $magicLine.offset().left)
        .data("origWidth", $magicLine.width());
        
    $(".tab-menu .col-xs-3").find("a").click(function() {
        $el = $(this);
        leftPos = $el.offset().left;
        newWidth = $el.parent().width();

        $magicLine.stop().animate({
            left: leftPos,
            width: newWidth
        });
    });
});