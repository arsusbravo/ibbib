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

    $(document).ready(function () {

        $(document).on('click', '.remove', function () {
            $(this).parents(".additem").remove();
        });


        $(document).on('click', '.save_profile', function (e) {
            e.preventDefault();

            let addItemCert = {};
            let formData = {};

            let $form = $(this);
            let url = $form.attr("action");

            $('.work-history .additem').each(function (i, e) {
                alert(i);
                addItemCert[i] = {
                    "id": $('.id', e).val(),
                    "title_cert": $('.cert-title', e).val(),
                    "description_cert": $('.cert-description', e).val(),
                    "cert_langFrom": $('.cert-langFrom', e).val(),
                    "cert_langTo": $('.cert-langTo', e).val(),
                    "cert_year": $('.cert_year', e).val(),
                    "degree_id": $('.degree_id', e).val(),
                }
            });

            formData = {
                "objective": $('.objective').val(),
                "motivation": $('.motivation').val(),
                "name": $('.name').val(),
                "phone": $('.phone').val(),
                "country_id": $('.country_id').val(),
                "standard_rates": $('.standard_rates').val(),
                "unit_rate": $('.unit_rate').val(),
                "additional_info": $('.additional_info').val(),
                "certificates": addItemCert,

            };
            console.log(addItemCert);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                url: url,
                type: 'post',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    console.log("success");
                    console.log("success");
                },
                error: function (xhr, error) {
                    console.log(error);
                    $('body').html(xhr.responseText);
                }

            });
        });

    });

});





    // script end




