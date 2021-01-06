import jquery from 'jquery';
window.$ = window.jQuery = jquery;

require('datatables.net-bs4');
import "bootstrap";
import "select2";
import swal from "sweetalert";
import toastr from "toastr";
import accounting from "accounting-js";
import "jquery-validation";
import "inputmask/dist/inputmask/jquery.inputmask";
import scroller from "perfect-scrollbar";
import moment from "moment";
window.moment = moment;
import "tinymce/tinymce.min.js";
import "tinymce/tinymce.js";
import "tinymce/plugins/advlist/plugin.js";
import "tinymce/plugins/lists/plugin.js";
import "tinymce/themes/silver/theme.js";
require("tempusdominus-bootstrap-4");
require("bootstrap-datepicker");
window.swal = swal;
window.toastr = toastr;
window.accounting = accounting;
window.PerfectScrollbar = scroller;
import "suggestags/js/jquery.amsify.suggestags";

function toggleQuickSidebar(target) {
    let overlay = $('#quick-sidebar-overlay');
    if(overlay.length == 0) {
        $('body').append('<div id="quick-sidebar-overlay"></div>');
    } else {
        overlay.remove();
    }
    target.toggleClass('open');
}


$(function () {
    $('.select2').select2();
    $('.format-phone').inputmask({"mask": "999 999 9999"});
    $('#datetimepicker').datetimepicker({
        defaultDate: moment($('#datetimepicker').data('value'))
    });
    $('.timepicker').datetimepicker({
        format: 'LT'
    });

    $('.datepicker').datepicker({
        format: 'M-dd-yyyy',
        autoclose: true,
        todayHighlight: true,
    });

    $('.value').amsifySuggestags();

    tinymce.init({
        selector: "textarea.tinymce",
        menubar: false,
        contextmenu: "link image imagetools table spellchecker",
        plugins: [
            "advlist lists"
        ],
        toolbar: "undo redo | bullist numlist  | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | formatselect fontselect fontsizeselect"
    });
   
    // const sidebar = new PerfectScrollbar(document.querySelector('#sidebar'));
    const content = new PerfectScrollbar('#content');
    $('#content > .container-fluid').addClass('ready');
    $('#main-nav > li')
    .mouseover(function () {
        $('.sub-nav').not($(this).find('.sub-nav')).removeClass('open');
        $(this).find('.sub-nav').addClass('open');
    })
    .mouseleave(function () {
        $('.sub-nav').removeClass('open');
    });

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        let btn = $(this);
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                btn.closest('form').submit();
            }
        });
    });

    $(document).ready(function() {
        if(localStorage.getItem('collapsed')){
            $("body").removeClass("sidebar-lg").addClass("sidebar-sm");
            $('.sidebar-title').text('MPE');
            $('.label-sidebar').addClass('d-none');
            $('.icon-sub-menu').addClass('d-none');
            $('.sub-nav').hide();
            $('#btn-toggle-open-sidebar').removeClass('d-none');
            $('#btn-toggle-close-sidebar').addClass('d-none');
            $('.main-item-sidebar').tooltip('enable');
            $('.sub-nav').removeClass('show').addClass('hide');
            $('.icon-sub-menu').removeClass('fa-angle-down').addClass('fa-angle-right');
            $("a").removeClass('nav-main-list-item').addClass('nav-main-list-item-sm');

            $(".main-item-sidebar, .nav-main-list-item-sm").popover({ trigger: "manual" , html: true, animation:false})
            .on("mouseenter", function () {
                var _this = this;
                $(this).popover("show");
                $(".popover").on("mouseleave", function () {
                    $(_this).popover('hide');
                });
            }).on("mouseleave", function () {
                var _this = this;
                setTimeout(function () {
                    if (!$(".popover:hover").length) {
                        $(_this).popover("hide");
                    }
                }, 300);
            });
        }
    });

    $(document).on("click", "#btn-toggle-close-sidebar",function() {
        $("body").removeClass("sidebar-lg").addClass("sidebar-sm");
        $('.sidebar-title').text('MPE');
        $('.label-sidebar').addClass('d-none');
        $('.icon-sub-menu').addClass('d-none');
        $('.sub-nav').hide();
        localStorage.setItem('collapsed', true);
        $('#btn-toggle-open-sidebar').removeClass('d-none');
        $('#btn-toggle-close-sidebar').addClass('d-none');
        $('.sub-nav').removeClass('show').addClass('hide');
        $('.icon-sub-menu').removeClass('fa-angle-down').addClass('fa-angle-right');

        $("a").removeClass('nav-main-list-item').addClass('nav-main-list-item-sm');

        $(".main-item-sidebar, .nav-main-list-item-sm").popover('enable');

        $(".main-item-sidebar, .nav-main-list-item-sm").popover({ trigger: "manual" , html: true, animation:false})
            .on("mouseenter", function () {
                var _this = this;
                $(this).popover("show");
                $(".popover").on("mouseleave", function () {
                    $(_this).popover('hide');
                });
            }).on("mouseleave", function () {
                var _this = this;
                setTimeout(function () {
                    if (!$(".popover:hover").length) {
                        $(_this).popover("hide");
                    }
                }, 300);
        });
        // $('.main-item-sidebar').popover('enable');
        // $('.nav-main-list-item').popover('enable');
    });

    $(document).on("click", "#btn-toggle-open-sidebar",function() {
        $("body").removeClass("sidebar-sm").addClass("sidebar-lg");
        $('.main-item-sidebar').tooltip('disable');
        setTimeout(function(){ 
            $('.sidebar-title').text('MAMAPAPA ECOMMERCE');
            $('.label-sidebar').removeClass('d-none');
            $('.icon-sub-menu').removeClass('d-none');
            localStorage.removeItem('collapsed');
            $('#btn-toggle-close-sidebar').removeClass('d-none');
            $('#btn-toggle-open-sidebar').addClass('d-none');
        }, 200);
        $("a").removeClass('nav-main-list-item-sm').addClass('nav-main-list-item');
        $('.main-item-sidebar').popover('disable');
        $('.nav-main-list-item-sm').popover('disable');
        $('.nav-main-list-item').popover('disable');
    });

    $(document).on('click','.nav-main-list-item',function () {
        $(this).closest('li').find('.sub-nav').slideToggle();

        if($(this).closest('li').find('.sub-nav').hasClass('hide')){
            $(this).closest('li').find('.sub-nav').removeClass('hide').addClass('show');
            $(this).find('.icon-sub-menu').removeClass('fa-angle-right').addClass('fa-angle-down');
        }else{
            $(this).closest('li').find('.sub-nav').removeClass('show').addClass('hide');
            $(this).find('.icon-sub-menu').removeClass('fa-angle-down').addClass('fa-angle-right');
        }
    });

    $(document).on('click', 'a[data-toggle="quick-sidebar"]', function () {
        let target = $($(this).data('target'));
        toggleQuickSidebar(target);
    });

    $(document).on('click', 'a[data-toggle="close-quick-sidebar"]', function () {
        let target = $(this).closest('.quick-sidebar');
        toggleQuickSidebar(target);
    });

    $(document).on('click', '#quick-sidebar-overlay', function () {
        toggleQuickSidebar($('.quick-sidebar'));
    });
});
