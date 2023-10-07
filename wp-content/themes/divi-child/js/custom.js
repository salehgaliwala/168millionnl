jQuery(document).ready(function($) {
    window.dataLayer =[];

    $('#is_business').change(function (e) {
        if ($(this).prop('checked') == true){
            $('#is_business_in').slideDown();
        }
        else {
            $('#is_business_in').slideUp();
        }
    });

    $(".back-to-top").on("click", function(e) {
        console.log('fads');
        e.preventDefault();
        scrollTo();
    });

    var settings_speed = 1500, scrollTo = function() {
        $("html, body").animate({
            scrollTop: 0
        }, settings_speed)
    };

    $('.fToggle').click(function () {
        // $(this).next().find('ul').slideToggle();
        $(window).width() < 768 && ($(this).next().find('ul').is(":animated") || ($(this).next().find('ul').is(":visible") ? ($(this).next().find('ul').slideUp(), $(this).removeClass("active")) : ($(".fToggle").removeClass("active").next().find('ul').slideUp(), $(this).next().find('ul').slideToggle(), $(this).toggleClass("active"))))
    });

    window.addEventListener("resize", function() {
        768 <= $(window).width() ? $(".fToggle").next().find('ul').show() : ($(".fToggle").next().find('ul').hide(),
            $(".fToggle.active").next().find('ul').show())
    });


    var $container = $(".donations-facts");
    $container.find(".un-tabs .btn").on("click", function(e) {
        e.preventDefault();

        var index = $(this).index();
        $container.find(".un-tabs .btn").removeClass("active");
        $(this).addClass("active");
        $container.find(".un-tab-content > div").removeClass("active");
        $container.find(".un-tab-content > div:eq(" + index + ")").addClass("active");
    });


    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 100) {
            $(".nav-main").addClass("nav-main--sticky");
        } else {
            $(".nav-main").removeClass("nav-main--sticky");
        }
    });

    initSlickProducts = function($sliderElement) {
        $sliderElement.not(".un-slicked").addClass("un-slicked").slick({
            prevArrow: '<a href="#" class="un-arrow un-arrow-prev"></a>',
            nextArrow: '<a href="#" class="un-arrow un-arrow-next"></a>',
            infinite: !0,
            slidesToShow: 3,
            slidesToScroll: 3,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: !0
                }
            }, {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }, {
                breakpoint: 540,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
        })
    };

    initSlickProducts($('.slick-slider'));

    var $firstTab = $(".un-relief-goods .un-tab-content > div:eq(0)");

    $(".un-relief-goods .un-tabs .btn").on("click", function(e) {

        e.preventDefault();

        var $this = $(this), index = $this.index();
        $(".un-relief-goods .un-tabs .btn").removeClass("active");

        $this.addClass("active");
        $(".un-relief-goods .un-tab-content > div").removeClass("active");

        var $nextActiveTab = $(".un-relief-goods .un-tab-content > div:eq(" + index + ")").addClass("active")
            , $slickElement = $nextActiveTab.find(".flex-nowrap");

        $firstTab.addClass("visible");

        $slickElement.length && void 0 !== $slickElement.get(0).slick ? $slickElement.get(0).slick.refresh() : initSlickProducts($slickElement);

        setTimeout(function() {
            $nextActiveTab.addClass("visible")
        }, 600);

    });

}),function($) {
    window.Clipboard = function(window, document, navigator) {
        var textArea;
        function selectText() {
            var range, selection;
            navigator.userAgent.match(/ipad|iphone/i) ? ((range = document.createRange()).selectNodeContents(textArea),
                (selection = window.getSelection()).removeAllRanges(),
                selection.addRange(range),
                textArea.setSelectionRange(0, 999999)) : textArea.select()
        }
        return {
            copy: function(text) {
                !function(text) {
                    (textArea = document.createElement("textArea")).value = text,
                        document.body.appendChild(textArea)
                }(text),
                    selectText(),
                    document.execCommand("copy"),
                    document.body.removeChild(textArea),
                    dataLayer.push({
                        event: "event",
                        eventCategory: "IBAN",
                        eventAction: "klick",
                        eventLabel: "{{Click URL}} "
                    }),
                    $(".js-copy-btn").text("Kopiert!"),
                    setTimeout(function() {
                        $(".js-copy-btn").text("IBAN kopieren!")
                    }, 750)
            }
        }
    }(window, document, navigator)
},
    function($) {
        "use strict";
        var un_module = {
            init: function() {
                var sliderInt;
                if (window.dataLayer = window.dataLayer || [],
                    $(".slider-donation .btn.button-cta").on("click", function() {
                   /* window.dataLayer.push({
                        event: "uaevent",
                        eventCategory: "StartbÃ¼hne",
                        eventAction: "Klick",
                        eventLabel: $(this).text(),
                        eventValue: $(this).closest(".slider-donation").find("#slider-donation-input-number").val().replace(" â‚¬", "")
                    })*/
                }), $(".slider-donation a.text-link").on("click", function() {
                    window.dataLayer.push({
                        event: "uaevent",
                        eventCategory: "Start-SEO",
                        eventAction: "Klick",
                        eventLabel: $(this).text()
                    })
                }), $("#un-slider-donation-form").on("submit", function() {
                    var $input = $("#slider-donation-input-number");
                    $input.val($input.val().replace(" â‚¬", ""))
                }), function() {
                    var $textInput = $("#slider-donation-input-number"),
                        focusedValue = ($('input[type="range"]').rangeslider({
                            polyfill: !1,
                            rangeClass: "rangeslider",
                            disabledClass: "rangeslider--disabled",
                            horizontalClass: "rangeslider--horizontal",
                            verticalClass: "rangeslider--vertical",
                            fillClass: "rangeslider__fill",
                            handleClass: "rangeslider__handle",
                            onInit: function() {
                                $('input[type="range"]').parents("form")[0].reset(), $('input[type="range"]').change()
                            },
                            onSlide: function(position, value) {
                                (10 <= value || value <= 400) && $textInput.val("€" + value), $("#un-stage-carousel")
                            }

                        }), -1);
                    $textInput.on("focus", function(e) {
                        var $this = $(this),
                            val = +$this.val().replace(/\D*/gim, "");
                          
                        focusedValue = val, $this.val("")
                    }).on("blur", function() {
                        var $this = $(this),
                            val = +$this.val().replace(/\D*/gim, "");
                        val ? ($this.val($this.val().replace("â‚¬", "€")), val <= 400 ? setTimeout(function() {
                            $('input[type="range"]').val(val).change()
                        }, 1200) : ($(".rangeslider__handle").css("left", "calc(100% - 32px)"), $(".rangeslider__fill").css("width", "100%"))) : $this.val("€"+focusedValue)
                    });
                    var inputTimeout = -1;
                    $textInput.on("keyup", function(e) {
                        clearTimeout(inputTimeout);
                        var $this = $(this);
                        $this.val().match(/\D+/) && $this.val($this.val().replace(/\D+/, ""));
                        var val = +$this.val().replace(/\D*/gim, "");
                        10 <= val && 8 !== e.keyCode && (inputTimeout = val <= 400 ? setTimeout(function() {
                            $('input[type="range"]').val(val).change()
                        }, 1200) : setTimeout(function() {
                            $(".rangeslider__handle").css("left", "calc(100% - 32px)"), $(".rangeslider__fill").css("width", "100%"), $this.val("€" + val)
                        }, 1200))
                    })
                }(), sliderInt = setInterval(function() {
                    void 0 !== window.$slider && (clearInterval(sliderInt), $(".slider-wrap").on("mouseover click keydown", function() {
                        0 < $(".slider-wrap:visible").length && $("#un-stage-carousel").carousel("pause")
                    }))
                }), $("#slider-donation-input-number").val().indexOf("€")) {
                    var val = $("#slider-donation-input-number").val();
                    $("#slider-donation-input-number").val(val + " ")
                }
            }
        };
        $(document).ready(function() {
            // if ( $('.slider-donation').length > 0) {
            if (jQuery('body').hasClass('home')) {
                un_module.init();
            }
        });
    }(jQuery),
    function($) {
        "use strict";
        var settings, setAmount, un_become_sponsor = (settings = {
            amount: 30,
            url: ""
        },
            setAmount = function() {
                console.log(amount);
                var amount = settings.amount + "";
                $(".become-sponsor-form").attr("action", settings.url + amount.replace(".", ","))
            },
            {
                init: function() {
                    console.log('dsaf');
                    var $form;
                    window.dataLayer = window.dataLayer || [],
                        $form = $(".become-sponsor-form"),
                        settings.url = $(".become-sponsor-form").attr("action"),
                        "" !== $form.find(".open-field").val() ? (settings.amount = $form.find(".open-field").val(),
                            $form.find(".open-field").addClass("not-empty")) : ($form.find('.btn[data-amount="30"]').addClass("active"),
                            settings.amount = 13),
                        setAmount(),
                        function() {
                            var $form = $(".become-sponsor-form");
                            $form.find(".btn").on("click", function() {
                                $form.find(".btn").removeClass("active"),
                                    $(this).addClass("active"),
                                    $form.find(".open-field").val(""),
                                    settings.amount = $(this).data("amount"),
                                    setAmount()
                            }),
                                $form.find(".open-field").on("keyup input", function() {
                                    "" !== $(this).val() ? $(this).addClass("not-empty") : $(this).removeClass("not-empty"),
                                        $form.find(".btn").removeClass("active"),
                                        settings.amount = $(this).val(),
                                        setAmount()
                                }),
                                $form.on("submit", function() {
                                    return "0" !== settings.amount && "" !== settings.amount || (settings.amount = 20,
                                        setAmount()),
                                        !0
                                }),
                                $form.find("#become-sponsor-donation-amount").on("blur", function(e) {
                                    var val = $(this).val();
                                    $(this).toggleClass("filled", "" !== val)
                                }),
                                $form.find("#become-sponsor-donation-amount").on("keydown", function(e) {
                                    var val = $(this).val();
                                    if ((190 === e.keyCode || 188 === e.keyCode) && 0 === val.length)
                                        return e.preventDefault(),
                                            !1;
                                    (31 < e.keyCode && e.keyCode < 48 || 57 < e.keyCode && 188 !== e.keyCode && 190 !== e.keyCode) && e.preventDefault()
                                })
                        }()
                }
            });
        $(document).ready(function() {
            // if ($('.become-sponsor-form').length)
            // if (jQuery('body').hasClass('page-id-57') || jQuery('body').hasClass('page-id-45'))
            //     un_become_sponsor.init()
        })
    }(jQuery);

jQuery(document).ready(function($) {
    var w = 0;
    $(".nav-main__burger.button-nav-burger").on("click", function() {
        $("body").hasClass("js-nav-main-open") ? ($("body").removeClass("js-nav-main-open"), $(".nav-main").removeClass("js-open"), $(this).removeClass("js-active")) : ($("body").addClass("js-nav-main-open"), $(".nav-main").addClass("js-open"), $(this).addClass("js-active"))
    }), $   (".nav-main__cat-1-item > .nav-main__arrow").on("click", function() {
        $(this).hasClass("js-active") ? ($(this).parent().removeClass("js-open"), $(this).removeClass("js-active"), $(this).next().next().fadeOut()) : ($(".nav-main__cat-1-item").removeClass("js-open"), $(".nav-main__cat-1-item > .nav-main__arrow").removeClass("js-active"), $(".nav-main__cat-1-item > .nav-main__arrow").next().next().hide(), $(this).parent().addClass("js-open"), $(this).addClass("js-active"), $(this).next().next().fadeIn())
    }), $(".nav-main__cat-2-item > .nav-main__arrow").on("click", function() {
        $(this).hasClass("js-active") ? ($(this).parent().removeClass("js-open"), $(this).removeClass("js-active"), $(this).next().next().fadeOut()) : ($(".nav-main__cat-2-item").removeClass("js-open"), $(".nav-main__cat-2-item > .nav-main__arrow").removeClass("js-active"), $(".nav-main__cat-2-item > .nav-main__arrow").next().next().hide(), $(this).parent().addClass("js-open"), $(this).addClass("js-active"), $(this).next().next().fadeIn())
    }), window.addEventListener("resize", function() {
        w != $(window).width() && 768 <= (w = $(window).width()) && $(".nav-main__cat-2, .nav-main__cat-3").attr("style", "")
    });

    $('.read-more').readmore({ collapsedHeight: 60,moreLink: '<a href="#" class="load-more text-expander">Verder lezen</a>',lessLink: '<a href="#" class="load-more text-expander">Sluiten</a>'});


    jQuery('.btn-donate-now').click(function (e) {
        e.preventDefault();
        jQuery('#place_order').trigger('click');
    });

    $('#donation_anonymous').change(function () {
        if ( $(this).prop('checked') === true ){
            $('.woocommerce-billing-fields__field-wrapper').hide();
            $('.donation_user_gdprAccepted').hide();
            $('.section-4').hide();
            $('#order_comments_field').hide();
            $('.notes-comment').hide();
        } else {
            $('.woocommerce-billing-fields__field-wrapper').show();
            $('.donation_user_gdprAccepted').show();
            $('.section-4').show();
            $('#order_comments_field').show();
            $('.notes-comment').show();
        }
    });

    $('#donation_user_company').change(function () {
        if ( $(this).prop('checked') === true ){
            $('#billing_company_field').show();
            $('#billing_company_field label').append('<abbr class="required" title="verplicht">*</abbr>');
            $('#billing_user_gender_field').hide();
            $('#billing_first_name_field').hide();
            $('#billing_last_name_field').hide();
            $('#billing_user_middle_field').hide();
        } else {
            $('#billing_company_field').hide();
            $('#billing_company_field label abbr').remove();
            $('#billing_user_gender_field').show();
            $('#billing_first_name_field').show();
            $('#billing_last_name_field').show();
            $('#billing_user_middle_field').show();
        }
    });

    jQuery('.cart input[name="quantity"]').change(function () {
        jQuery('#direct_donation_quantity').val( jQuery(this).val() );
    });
});

function cookieLawAccept() {
    var d = null;
    setCookie('cookielaw','yes',365)
    document.getElementById('v-cookielaw').style.display = 'none';
}

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}


/**
 *
 *  Copy button in footer
 *
 * */
(function ($) {
    window.Clipboard = (function(window, document, navigator) {
        var textArea,
            copy;
        function isOS() {
            return navigator.userAgent.match(/ipad|iphone/i);
        }
        function createTextArea(text) {
            textArea = document.createElement('textArea');
            textArea.value = text;
            document.body.appendChild(textArea);
        }
        function selectText() {
            var range,
                selection;
            if (isOS()) {
                range = document.createRange();
                range.selectNodeContents(textArea);
                selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(range);
                textArea.setSelectionRange(0, 999999);
            } else {
                textArea.select();
            }
        }
        function copyToClipboard() {
            document.execCommand('copy');
            document.body.removeChild(textArea);
            dataLayer.push({
                'event': 'event',
                'eventCategory': 'IBAN',
                'eventAction': 'klick',
                'eventLabel': '{{Click URL}} '
            })
        }
        function rename() {
            $('.js-copy-btn').text('Gekopieerd!');
            setTimeout(function () {
                $('.js-copy-btn').text('IBAN kopieren!');
            },750);
        }
        copy = function(text) {
            createTextArea(text);
            selectText();
            copyToClipboard();
            rename();
        };
        return {
            copy: copy
        };
    })(window, document, navigator);

}(jQuery));

function handleFullWidthSizing() {
    const scrollbarWidth = Math.ceil((window.innerWidth - document.body.clientWidth)/2)
    jQuery('.fullWidthRow').css('width',`calc(100vw - ${scrollbarWidth}px)`);
}

jQuery(document).ready(function($) {
    // Listen for changes in the payment method
        var selectedPaymentMethod = $('input[name="payment_method"]:checked').val();
        //  alert(selectedPaymentMethod );  
        // Trigger the AJAX request
        
        if(selectedPaymentMethod == 'mollie_wc_gateway_bancontact')
        {
            jQuery('#donationAnonymousField').hide();            
            jQuery('.donation_user_company').hide();
            jQuery('#billing_user_gender_field').hide();
            jQuery('.donation_user_gdprAccepted').hide();            
           
        }
    $(document).on('change', 'input[name="payment_method"]', function() {
        // Get the selected payment method
        var selectedPaymentMethod = $(this).val();
        //  alert(selectedPaymentMethod );  
        // Trigger the AJAX request
        if(selectedPaymentMethod == 'mollie_wc_gateway_bancontact')
        {
            jQuery('#donationAnonymousField').hide();            
            jQuery('.donation_user_company').hide();
            jQuery('#billing_user_gender_field').hide();
            jQuery('.donation_user_gdprAccepted').hide();
           
        }
        else
        {
            jQuery('#donationAnonymousField').show();
            jQuery('.donation_user_company').show();
            jQuery('#billing_user_gender_field').show();
            jQuery('.donation_user_gdprAccepted').show();
        }
        $.ajax({
            type: 'POST',
            url: ajax_url.ajax_url, // WordPress AJAX URL
            data: {
                action: 'refresh_billing_section',
                payment_method: selectedPaymentMethod
            },
            success: function(response) {
                // Replace the billing section with the updated HTML
                if(selectedPaymentMethod == 'mollie_wc_gateway_bancontact')
                {
                      $('#billing_email_field').remove();
                }
                else
                {
                    
                     $('#billing_email_field').remove();
                     $('.donation_user_company').before(response);
                     $('#billing_email').attr('placeholder', 'E-mailadres *');
                }
                
                

            }
        });
        
    });
});