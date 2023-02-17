$(function () {


    //############## MASK INPUT
    if ($('.formPhone').length) {
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        }, spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        $('.formPhone').mask(SPMaskBehavior, spOptions);
    }

    $('.changeList').on



});

function changeListView() {
    var element = $("#list");
    if (element.hasClass("table-card")) {
        element.removeClass("table-card");
        element.addClass("table-row");
    } else {
        element.removeClass("table-row");
        element.addClass("table-card");
    }
}
