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
        let workItems = $(".work-history .additem").length;
        var regex = /^(.*)(\d)+$/i;
        var cloneitem = $("#addhistory").length;
        console.log(workItems);
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
            let newworkItems = $(".work-history .additem").length;

            console.log(workItems);



            let list = document.getElementById("certificateList");


            for (let i = 1; i <= workItems; i++) {
                list.removeChild(list.childNodes[i]);
            }


            let addItemCert = {};
            let addItemEdu = {};
            let formData = {};

            let $form = $(this);
            let url = $form.attr("action");

            $('.education-background .additem').each(function (i, e) {
                addItemEdu[i] = {
                    " edu_description": $('.edu-description', e).val(),
                    " edu_langFrom": $('.edu-langFrom', e).val(),
                    " edu_langTo": $('.edu-langTo', e).val(),
                }
            });



            $('.work-history .additem').each(function (i, e) {
                addItemCert[i] = {
                    "title_cert": $('.cert-title', e).val(),
                    "description_cert": $('.cert-description', e).val(),
                    "cert_langFrom": $('.cert-langFrom', e).val(),
                    "cert_langTo": $('.cert-langTo', e).val(),
                    "cert_year": $('.cert_year', e).val(),
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
                "languageSkills": addItemEdu,
                "certificates": addItemCert,

            };
            console.log(formData.certificates);

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




