jQuery(function ($) {

    'use strict';

    // Change Dropdown
    // Slick Slider
    // CounterUp
    // Checkbox Icon Change
    // Text Edit
    // Remove Item
    // Item clone
    // Gmap


    // -------------------------------------------------------------
    //  Toggle Menu for Mobile
    // -------------------------------------------------------------

    mobileDropdown();
    function mobileDropdown() {
        if ($('.tr-menu').length) {
            $('.tr-menu .tr-dropdown').on("append", function () {
                return '<i class="fa fa-angle-down icon" aria-hidden="true"></i>';
            });
            $('.tr-menu .tr-dropdown .icon').on('click', function () {
                $(this).parent('li').children('ul').slideToggle();
            });
        }
    }

    // -------------------------------------------------------------
    //  Change Dropdown
    // -------------------------------------------------------------


    $('.tr-change-dropdown').on('click', '.tr-change a', function (ev) {
        if ("#" === $(this).attr('href')) {
            ev.preventDefault();
            var parent = $(this).parents('.tr-change-dropdown');
            parent.find('.change-text').html($(this).html());
        }
    });



    // -------------------------------------------------------------
    //  Slick Slider
    // -------------------------------------------------------------  


    $(".testimonial-slider").slick({
        infinite: true,
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed: 10000,
        slidesToScroll: 1,
    });



    // -------------------------------------------------------------
    // CounterUp
    // -------------------------------------------------------------


    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });



    // -------------------------------------------------------------
    //  Checkbox Icon Change
    // -------------------------------------------------------------


    $('input[type="checkbox"]').change(function () {
        if ($(this).is(':checked')) {
            $(this).parent("label").addClass("checked");
        } else {
            $(this).parent("label").removeClass("checked");
        }
    });


    // -------------------------------------------------------------
    //  Text Edit
    // -------------------------------------------------------------

    $('.code-edit').jqte({ placeholder: $(this).attr('placeholder') });



    // -------------------------------------------------------------
    //  Remove Item
    // -------------------------------------------------------------


    $(".remove-icon").on('click', function () {
        $(this).parents('.remove-item').fadeOut();
    });


    // -------------------------------------------------------------
    //  item clone
    // -------------------------------------------------------------

    $(document).ready(function () {
        var regex = /^(.*)(\d)+$/i;
        var cloneitem = $("#addhistory").length;
        $('#clone').click(function () {
            $('#addhistory').clone()
                .appendTo('.additem-work')
                .attr("id", "#addhistory" + cloneitem)
                .find("*").each(function () {
                    var id = this.id || "";
                    var match = id.match(regex) || [];
                    if (match.length == 3) {
                        this.id = match[1] + (cloneitem);
                    };
                });
            cloneitem++;
        });

        var cloneitem2 = $("#add-edu").length;
        $('#edu-clone').click(function () {
            $('#add-edu').clone()
                .appendTo('.additem-edu')
                .attr("id", "#add-edu" + cloneitem2)
                .find("*").each(function () {
                    var id = this.id || "";
                    var match = id.match(regex) || [];
                    if (match.length == 3) {
                        this.id = match[1] + (cloneitem2);
                    };
                });
            cloneitem2++;
        });

        var cloneitem3 = $("#achievement").length;
        $('#achiev-clone').click(function () {
            $('#achievement').clone()
                .appendTo('.additem-achiev')
                .attr("id", "#achievement" + cloneitem3)
                .find("*").each(function () {
                    var id = this.id || "";
                    var match = id.match(regex) || [];
                    if (match.length == 3) {
                        this.id = match[1] + (cloneitem3);
                    };
                });
            cloneitem3++;
        });


        $(document).on('click', '.remove', function () {
            $(this).parents(".additem").remove();
        });

        $(document).on('click', '.save_profile', function (e) {
            e.preventDefault();
            var $form = $(this);
            var url = $form.attr("action");
            console.log($form);
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
            jQuery.ajax({
                url: url,
                type: 'post',
                data: {
                    title_cert: jQuery('#cert-title').val(),
                    description_cert: jQuery('#cert-description').val(),
                    cert_langFrom: jQuery('#cert-langFrom').val(),
                    cert_langTo: jQuery('#cert-langTo').val()
                },
                success: function (data) {
                    console.log(data);
                }

            });
        });

    });

});





    // script end




