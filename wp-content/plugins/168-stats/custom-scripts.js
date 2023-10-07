jQuery(document).ready(function($) {
    $('#time_period').on('change', function() {
        if ($(this).val() === 'custom') {
            $('#custom_dates').show();
        } else {
            $('#custom_dates').hide();
        }
    });
    
    $('#order_data_form').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: woocommerce_statistics.ajax_url,
            data: formData,
            dataType: 'json',
            success: function(response) {
                // Process and display the response data
            }
        });
    });
});

jQuery(document).ready(function($) {
    $('#time_period').on('change', function() {
        if ($(this).val() === 'custom') {
            $('#custom_dates').show();
        } else {
            $('#custom_dates').hide();
        }
    });
    
    $('#order_data_form').submit(function(event) {
        event.preventDefault();
        
        var formData = $(this).serialize();
        
        $.ajax({
            type: 'POST',
            url: woocommerce_statistics.ajax_url,
            data: {
                action: 'process_order_data', // Use the correct action
                nonce: woocommerce_statistics.nonce,
                formData: formData
            },
            dataType: 'json',
            success: function(response) {
                // Process and display the response data
                $('#order_count h2').text(response.order_count);
                $('#order_total h2').html(response.order_total);
            }
        });

    });
});
