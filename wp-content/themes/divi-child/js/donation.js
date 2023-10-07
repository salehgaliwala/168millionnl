jQuery(document).ready(function () {

    handleFullWidthSizing()
    jQuery(window).bind('resize orientationchange', function () {
        handleFullWidthSizing()
    })

    jQuery('.registration-form fieldset:first-child').fadeIn('slow');

    jQuery('.registration-form input[type="text"]').on('focus', function () {
        jQuery(this).removeClass('input-error');
    });

    // next step
    jQuery('.registration-form .btn-next').on('click', function () {
        var parent_fieldset = jQuery(this).parents('fieldset');
        var next_step = true;
        let ecount = 0;

        var error_block = jQuery('.form-block--error');
        error_block.hide();

        var step = parent_fieldset.attr('step');

        if(step === '1' || step === 1){


            if(jQuery('.custom-amount').is(':visible')) {

                if(jQuery('#donation_amount').val() < 3)
                {
                    jQuery('#donation_amount').addClass('input-error');
                    next_step = false;

                    error_block.html('Je kunt doneren vanaf 3 dollar');
                    error_block.show();
                }
                else {
                    jQuery('#donation_amount').removeClass('input-error');
                }
            }
        }


        if(step === '2' || step === 2){

            if( errorCheck(jQuery('input[name="donation[firstname]"]')) )
                ecount++;

            if(jQuery('input[name="donation[gender]"]:checked').val() === undefined){
                jQuery('input[name="donation[gender]"]').parent().addClass('input-error');
                ecount++;
            }else {
                jQuery('input[name="donation[gender]"]').parent().removeClass('input-error');
            }


            if(errorCheck(jQuery('input[name="donation[lastname]"]')))
                ecount++;


            let email = jQuery('input[name="donation[email]"]');

            if(errorCheck(email)) {
                ecount++;
            }
            else  if(!validateEmail( email.val() ) ) {
                ecount++;
                email.addClass('input-error');

                error_block.html('Invalid Email');
                error_block.show();
            }
            else {
                email.removeClass('input-error');
            }


        }

        if(step === '3' || step === 3){

            if( errorCheck(jQuery('#bday')) )
                ecount++;
            if( errorCheck(jQuery('#bmonth')) )
                ecount++;
            if( errorCheck(jQuery('#byear')) )
                ecount++;
            if(errorCheck(jQuery('input[name="donation[postcode]"]')))
                ecount++;
            if(errorCheck(jQuery('input[name="donation[houseno]"]')))
                ecount++;

        }

        if(ecount > 0)
            next_step = false;

        if (next_step) {

            if(step === 3 || step === '3'){

                let frequency = jQuery('select[name="donation[frequency]"]').val();

                if(frequency > 0){
                    jQuery('#recurringPayment').show();
                    jQuery('#directPayment').hide();
                }
                else {
                    jQuery('#recurringPayment').hide();
                    jQuery('#directPayment').show();
                }
            }

            parent_fieldset.fadeOut(400, function () {
                jQuery(this).next().fadeIn();
            });
        }

    });

    // previous step
    jQuery('.registration-form .go-back').on('click', function () {

        jQuery(this).parents('fieldset').fadeOut(400, function () {
            jQuery(this).prev().fadeIn();
        });

        var error_block = jQuery('.form-block--error');
        error_block.hide();
    });

    // submit
    jQuery('.registration-form').on('submit', function (e) {

        var error_block = jQuery('.form-block--error');
        error_block.hide();

        let selectedGateway = jQuery('input[name="donation[gateway]"]:checked').val();

        if ( selectedGateway === undefined) {

            e.preventDefault();

            error_block.html('The marked fields are mandatory or incorrectly entered.');
            error_block.show();

        } else if( selectedGateway === '1' ) {

            if(  errorCheck(jQuery('#accountnumber')) ){
                e.preventDefault();

                error_block.html('De gemarkeerde velden zijn verplicht, of verkeerd ingevuld.');
                error_block.show();

            }
        }

    });

    jQuery('#js-other-amount-toggle').click(function (e) {
        e.preventDefault();

        if(jQuery('.custom-amount').is(':visible')) {

            jQuery('.custom-amount').hide();
            jQuery('#donation_amount').prop('disabled', true);
            jQuery('.radio-amount').show();
        }
        else {
            jQuery('.custom-amount').show();
            jQuery('#donation_amount').prop('disabled', false);
            jQuery('.radio-amount').hide();
        }
    });

    jQuery('input[name="donation[gateway]"]').click(function () {

        let selectedGateway = jQuery('input[name="donation[gateway]"]:checked').val();

        if(selectedGateway === 1 || selectedGateway ==='1'){
            jQuery('.authorization-accno').show();
        }
        else {
            jQuery('.authorization-accno').hide();
        }
    });

    function errorCheck(inputElement) {

        var error;

        if( inputElement.val() === '' || inputElement.val() === null || inputElement.val() === undefined)
        {
            inputElement.addClass('input-error');
            error = true;

        }
        else {
            inputElement.removeClass('input-error');
            error = false;
        }

        return error;
    }


    //Email Validation
    function validateEmail(sEmail) {

        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail))
            return true;
        else
            return false;
    }


    for(let i = 1 ; i <= 31 ; i++ ){

        jQuery('#bday')
            .append(jQuery("<option></option>")
                .attr("value",i)
                .text(i));
    }


    for(let i = 1900 ; i <= 2004 ; i++ ){

        jQuery('#byear')
            .append(jQuery("<option></option>")
                .attr("value",i)
                .text(i));
    }

    let months = ['januari','februari','maart','april','mei','juni','juli','augustus','september','oktober','november','december']


    for(let i = 0 ; i <= months.length-1 ; i++ ){

        jQuery('#bmonth')
            .append(jQuery("<option></option>")
                .attr("value",i+1)
                .text(months[i]));
    }

    jQuery("#payment_frequency_5_amount_1").click(function(){
        jQuery(".euro-text").html('Voor €10 kunnen wij aan 7 kinderen kleding geven. ');
    });
    jQuery("#payment_frequency_5_amount_2").click(function(){
        jQuery(".euro-text").html('Voor €20 kunnen wij 5 voetballen weggeven, kortom 100+ kinderen plezier van uw donatie.');
    });
    jQuery("#payment_frequency_5_amount_3").click(function(){
        jQuery(".euro-text").html('Voor €50 kunnen 100 kinderen gecheckt worden op ziektes en een basisinenting krijgen. ');
    });

});