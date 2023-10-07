<?php
/*
Plugin Name: 168 Statistics
Description: Display order statistics based on time periods.
Version: 1.0
Author: Your Name
*/

function display_order_data_form() {
    ?>
    <form method="post" id="order_data_form">
        <div class="form-container">
        <label for="time_period">Select Time Period:</label>
        <select name="time_period" id="time_period">
            <option value="daily">Daily</option>
            <option value="weekly">Weekly</option>
            <option value="monthly">Monthly</option>
            <option value="custom">Custom Dates</option>
        </select>
        <label for="project_grp">Select Project Group:</label>
         <select name="project_grp" id="project_grp">
            <
            <option value="">All</option>
            <option value="300-399">Utrecht</option>
            <option value="400-499">Rotterdam</option>
            <option value="700-799">Den Bosch</option>
            <option value="800-899">Danielle</option>
            <option value="900-999">Ajay</option>
        </select>      
        <input type="text" name="project_number" id="project_number" style="width:100px" placeholder="Project Number">   
        
        <div id="custom_dates" style="display: none;">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date">
        </div>
        
        <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <div class="stats_container">
        <div id="order_total">
            <p class="small"> Total Donation in € </p>
            <h2></h2>
        </div>

        <div id="order_count">
            <p class="small"> Total Donation Count </p>
            <h2></h2>
        </div>
    </div>
    <style>
    .form-container {
        display: flex;
        align-items: center;
        margin-top:50px
    }
    
    .form-container label {
        margin-right: 10px;
        margin-left: 10px;

    }
    #order_count, #order_total{
        background: #ffff;
    padding: 20px;
    border-radius: 20px;
    text-align: center;
    margin-right:50px;
    }
    .stats_container{margin-top:50px;display:flex}
    </style>
    <?php
    if (isset($_POST['submit'])) {
       
    }
}

add_shortcode('order_data_form', 'display_order_data_form');


function statistics_admin_menu() {
    add_menu_page(
        '168 Statistics',
        'Statistics',
        'manage_options',
        'woocommerce_statistics',
        'display_order_data_form'
    );
}

add_action('admin_menu', 'statistics_admin_menu');

function enqueue_scripts() {
    wp_enqueue_script('jquery');
    
    wp_enqueue_script('custom-scripts', plugin_dir_url(__FILE__) . 'custom-scripts.js', array('jquery'), '1.0', true);
    
    // Localize script to make data available to the JavaScript
    wp_localize_script('custom-scripts', 'woocommerce_statistics', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('woocommerce_statistics_nonce')
    ));
}

add_action('admin_enqueue_scripts', 'enqueue_scripts');

function process_order_data() {
    check_ajax_referer('woocommerce_statistics_nonce', 'nonce');
     global $wpdb;
        parse_str($_POST["formData"], $_POST);
        $time_period = sanitize_text_field($_POST['time_period']);
      
        if ($time_period === 'custom') {
            $start_date = sanitize_text_field($_POST['start_date']);
            $end_date = sanitize_text_field($_POST['end_date']);
            $where_clause = "post_date >= '$start_date' AND post_date <= '$end_date'";
        } else {
            $date_query = '';
            
            if ($time_period === 'daily') {
                $date_query = "post_date >= DATE(NOW())";
            } elseif ($time_period === 'weekly') {
                $date_query = "post_date >= DATE(NOW() - INTERVAL 7 DAY)";
            } elseif ($time_period === 'monthly') {
                $date_query = "post_date >= DATE(NOW() - INTERVAL 30 DAY)";
            }
            
            $where_clause = $date_query;
        }
      
        $orders = $wpdb->get_results(
            "SELECT * FROM {$wpdb->prefix}posts WHERE post_type = 'shop_order' AND $where_clause "
        );
       
        // Display order data here
        // Example: foreach ($orders as $order) { ... }
        $order_total = 0;
        $count = 0;
        foreach($orders as $order)
        {
            $order = new WC_Order( $order->ID );
            if(get_post_meta($order->ID,'_projectnummer_field',true) == '')
                continue;
            
            if($order->get_status() == 'processing' || $order->get_status() == 'completed')
            {
               if(!empty($_POST['project_grp']))
               {
                    $grp = explode('-',$_POST['project_grp']);
                    $start = $grp[0];
                    $end =  $grp[1];
                    if(get_post_meta($order->ID,'_projectnummer_field',true)>=$start && get_post_meta($order->ID,'_projectnummer_field',true) <= $end)
                    {
                        $order_total += floatval(get_post_meta($order->ID, '_order_total', true));
                        $count++;
                    }
                    
               }
               else if(!empty($_POST['project_number']))
               {

                if(get_post_meta($order->ID,'_projectnummer_field',true) == $_POST['project_number'])
                {
                        $order_total += floatval(get_post_meta($order->ID, '_order_total', true));
                        $count++;
                }

               }
               else {
                    $order_total += floatval(get_post_meta($order->ID, '_order_total', true));
                    $count++;
               }
 
            }
        }
    
    // Process the form data and fetch order data
    // Construct your response data
    
    // Return the response data as JSON
    $response = array(
        'order_count' => $count,
        'order_total' =>  get_woocommerce_currency_symbol().number_format($order_total,0,'.',','),
    );
    wp_send_json($response);
}

add_action('wp_ajax_process_order_data', 'process_order_data');
add_action('wp_ajax_nopriv_process_order_data', 'process_order_data');


