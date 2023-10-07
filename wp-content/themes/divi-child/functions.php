<?php
require_once __DIR__.'/code/my-code.php';
require_once __DIR__.'/code/woocommerce.php';
require_once __DIR__.'/code/checkout.php';

/*
 * This is the child theme for Divi theme, generated with Generate Child Theme plugin by catchthemes.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
add_action( 'wp_enqueue_scripts', 'divi_child_enqueue_styles' );
function divi_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    /*wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );*/

	wp_register_script('jquery-ajax','');
	wp_localize_script('jquery-ajax', 'ajax_url', array('ajax_url' => admin_url( 'admin-ajax.php' )));
	wp_enqueue_script( 'jquery-ajax' );
}
/*
 * Your code goes below
 */

include( dirname(__FILE__) . '/includes/custom.php');
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 20 );


add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( 'In winkelwagen', 'woocommerce' ); 
}

remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );
add_action( 'woocommerce_cart_is_empty', 'custom_empty_cart_message', 10 );

function custom_empty_cart_message() {
    $html  = '<div class="col-12 offset-md-1 col-md-10"><p class="cart-empty">';
    $html .= wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'Winkelwagen is momenteel leeg.', 'woocommerce' ) ) );
    echo $html . '</p></div>';
}

add_filter('gettext', 'wpse_124400_woomessages', 999, 3);

/**
* change some WooCommerce labels
* @param string $translation
* @param string $text
* @param string $domain
* @return string
*/
function wpse_124400_woomessages($translation, $text, $domain) {
    if ($domain == 'woocommerce') {
        if ($text == 'Cart updated.') {
            $translation = 'Winkelwagen geupdatet';
        }

        if ($text == 'View cart') {
            $translation = 'Bekijk winkelwagen';
        }

        if( $text === 'Undo?' ) {
        $translation =  __( 'Ongedaan maken?', $domain );
    }

    }

    return $translation;
}

add_filter ( 'wc_add_to_cart_message', 'wc_add_to_cart_message_filter', 10, 2 );
function wc_add_to_cart_message_filter($message, $product_id = null) {
    $titles[] = get_the_title( $product_id );

    $titles = array_filter( $titles );
    $added_text = sprintf( _n( '%s is succesvol toegevoegd aan winkelwagen.', '%s is succesvol toegevoegd aan winkelwagen.', sizeof( $titles ), 'woocommerce' ), wc_format_list_of_items( $titles ) );

    $message = sprintf( '%s <a href="%s" class="button">%s</a>&nbsp;<a href="%s" class="button" style="margin-right:20px">%s</a>',
                    esc_html( $added_text ),
                    esc_url( wc_get_page_permalink( 'checkout' ) ),
                    esc_html__( 'uitchecken', 'woocommerce' ),
                    esc_url( wc_get_page_permalink( 'cart' ) ),
                    esc_html__( 'Bekijk winkelwagen', 'woocommerce' ));

    return $message;
}

add_filter( 'wc_empty_cart_message', 'custom_wc_empty_cart_message' );

function custom_wc_empty_cart_message() {
  return 'Je kunt niet doneren als de winkelwagen leeg is';
}
add_shortcode('google-sheet', 'add_sync_to_google_sheet');
function add_sync_to_google_sheet() {
    // Your tracking script code goes here
    $order_id =$_REQUEST['order_id'];
    $order = wc_get_order( $order_id ); 
    $total = $order->get_total();
    ob_start();
    ?>
<form method="POST" id="google-sheet-form">
  <input name="order_id" type="hidden" value="<?php echo $order_id ?>">
  <input name="project_number" type="hidden" value="<?php echo get_post_meta( $order_id, '_projectnummer_field', true ); ?>">
  <input name="amount" type="hidden" value="€<?php echo $total ?>">


</form>
<p> Please do not close this page. Data is being synced with GOOGLE sheet .... </p>
<script>
  jQuery(document).ready(function($) {
 

      // Get form data
      var formData =$('#google-sheet-form').serializeArray();
      var jsonData = {};

      // Convert form data to JSON
      $.each(formData, function() {
        jsonData[this.name] = this.value;
      });

      // Send data to Google Sheet using AJAX
      $.ajax({
        url: 'https://script.google.com/macros/s/AKfycbwlF0Pm6PReHUT63ESIfa5__YvPE9-w5IshJ4RScSTreUIo1Bq9Ma-LwhBTa8QsatTDYQ/exec', // Replace SCRIPT_ID with your Google Apps Script ID
        type: 'POST',
        data: jsonData,
        success: function(response) {
          // Handle successful submission
          console.log('Form submitted successfully');
          // Clear form fields
          $('#google-sheet-form')[0].reset();
        },
        error: function(xhr, status, error) {
          // Handle error
          console.log('Error:', error);
        }
      });
    });
 
</script>

</script>    
    <?php
$output = ob_get_contents();
    ob_end_clean();
    return $output;
}

//add_action('wp_footer', 'submitFormOnLoad');
function submitFormOnLoad() {
    ?>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('google-sheet-form'); // Replace 'your-form-id' with the actual ID of your form
            if (form) {
                form.submit();
            }
        });
    </script>
    <?php
}

function enqueue_data_tables() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'dataTables', 'https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js', array( 'jquery' ), '1.10.25', true );
    wp_enqueue_style( 'dataTablesStyles', 'https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css', array(  ), '1.10.25' );
    wp_enqueue_style( 'dataTablesbuttoncss', 'https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css', array( ), '1.10.25' );
        wp_enqueue_script('dataTablebuttons','https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js',array( 'dataTables'), '1.10.25');
    wp_enqueue_script('dataTablepdf',get_stylesheet_directory_uri().'/js/pdfmake.js',array( 'dataTables'), '1.10.25');
 // wp_enqueue_script( 'dataTablepdf', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js ',array( 'dataTables' ), '1.10.25' );
    wp_enqueue_script( 'dataTablehtml', 'https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js', array( 'dataTablepdf' ), '1.10.25' );
    wp_enqueue_script( 'dataTableprint', 'https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js',array( 'dataTablepdf' ), '1.10.25' );
    wp_enqueue_script('md5','https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.19.0/js/md5.min.js', array('jquery'), '2.19.0', true );
  

}
add_action( 'wp_enqueue_scripts', 'enqueue_data_tables' );

add_shortcode('scores','scores');
function scores($atts)
{
   $a = shortcode_atts( array(
        'group' => 'group',
       
    ), $atts ); 
   
  ob_start();  
 ?>
<!-- HTML table -->
<div class="refresh_btn"><button>Refresh Score</button></div>
<table>
    <tr>
        <td style="text-align:center">
           <div id="order_total">
            <p class="small"> Total Support</p>
            <h2></h2>
            </div>
        </td>
        <td style="text-align:center">
            <div id="order_count">
            <p class="small"> Supporter Count</p>
            <h2></h2>
        </div>
        </td>
    </tr>
    <tr>
        <td style="text-align:center">
           <div id="average_support">
            <p class="small"> Average Support</p>
            <h2></h2>
            </div>
        </td>
        <td style="text-align:center">
            <div id="leading_scorer">
            <p class="small"> Leading Scorer</p>
            <h2></h2>
        </div>
        </td>
    </tr>
     <tr>
        <td style="text-align:center">
           <div id="highest_daily_scorer">
            <p class="small">Peak Score</p>
            <h2></h2>
            </div>
        </td>
        <td style="text-align:center">
            <div id="highest_dailyamount">
            <p class="small">Peak Amount</p>
            <h2></h2>
        </div>
        </td>
    </tr>
</table>    
<table>
<tr>
    <td>
        <input type="hidden" name="group" id="group" value="<?php echo $a['group'] ?>" />
        <input type="hidden" name="page" id="page" value="<?php echo $page_id ?>" />
        <label>Search By Date Range</label>&nbsp;&nbsp;&nbsp;&nbsp;

    </td>
    <td><label> Start Date </label><br /><input type="date" id='startDate' value="" />
    </td>
    <td><label> End Date</label><br /><input type="date" id='endDate' value="" /></td>
    <td><label> Project nr.</label><br /><input type="text" id='projectNumber' value="" /></td>
</tr>
    

</table>
<table id="ordersTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Date</th>
            <th>Project nr.</th>
            <th>Order</th>            
            <th>Amount</th>
            <!-- Add more header columns as needed -->
        </tr>
    </thead>
    <tbody></tbody>
</table> 
<?php
$output = ob_get_contents();
ob_end_clean();
return $output;
}

// Add a custom JavaScript file for DataTables configuration and AJAX
function custom_data_tables_script() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        $('#submit-generate-link').on('click', function(event) {
        event.preventDefault();

        // Get the number inputted by the user
        var inputNumber = $('#generate-link').val();

        // Validate the input
        if (!inputNumber) {
            alert('Please enter a number.');
            return;
        }

        // Generate the MD5 hash of the input
        var md5Hash = md5(inputNumber);

        // Create the link with the parameter
        var link = 'https://168million.nl/scores/individual/?code=' + md5Hash;

        // Display the link
        $('#output-link').html('<a href="' + link + '">' + link + '</a>');
    });
        $('title').html($("h1.main_title").text() + ' - 2050 Paris');
        var startDate = jQuery('#searchByDateStart').val();
        var endDate = jQuery('#searchByDateEnd').val();
        var dataTable = $('#ordersTable').DataTable({
            <?php $current_user = wp_get_current_user();
            if (user_can( $current_user, 'administrator' )) { ?>
            dom: 'Bfrtip',
                buttons: [
                         'copy', 'csv', 'excel', 'pdf', 'print'
                ],
            <?php } 
            else { ?>
             dom: 'Bfrtip',
                buttons: [
                         'csv',
                ],
            <?php }  ?>    
            "processing": true,
            "serverSide": true,
            "pageLength": -1,
            "lengthMenu": [
                    [10, 50, 100, -1],
                    [10, 50, 100, 'All']
                ],
            "ajax": {
                "url": '<?php echo admin_url( "admin-ajax.php" ); ?>',
                "type": "POST",
                "data": function(d) {
                    d.action = "get_orders";
                    d.order_status = $('#orderStatusFilter').val();
                    d.startDate = $('#startDate').val();
                    d.endDate = $('#endDate').val();
                    d.projectNumber = $('#projectNumber').val();
                    d.group = $('#group').val();
                    d.page =  $('#page').val();
            },
            "dataSrc": function(response) {
                // Perform additional actions after data is fetched
                // For example, you can update summary information
                $('#order_count h2').html(response.recordsFiltered);
                $('#order_total h2').html(response.total_order_amount);
                $('#average_support h2').html(response.average);
                $('#leading_scorer h2').html(response.max_scorer);
                $('#highest_daily_scorer h2').html(response.highest_count);
                $('#highest_dailyamount h2').html(response.highest_sales);
                // Return the actual data array for DataTables
                return response.data;
            }
            },
            "columns": [
                { "data": "order_date","width": "25%" },
                { "data": "project_number" ,"width": "25%" },
                { "data": "order_number" ,"width": "25%" },                
                { "data": "order_amount","width": "25%"  }
                // Add more columns as needed
            ],
            "columnDefs": [
                { "orderable": false, "targets": "_all" }
            ]

        });
        $('#startDate, #endDate,#projectNumber').on('change', function() {        
             $('.refresh_btn button').addClass("dot-animation"); 
                setTimeout(()=>{
                    dataTable.draw();
                    $('.refresh_btn button').removeClass('dot-animation');   
                }, 2000);


          
         });
        $('.refresh_btn button').on('click', function() {
           $('.refresh_btn button').addClass("dot-animation"); 
                setTimeout(()=>{
                    dataTable.draw();
                    $('.refresh_btn button').removeClass('dot-animation');   
                }, 2000);



         });
    });
    </script>
<?php
}
add_action( 'wp_footer', 'custom_data_tables_script' );

// Sorting Price

// Define a custom comparison function for sorting by 'order_amount'
function compareOrderAmount($a, $b) {
    $amountA = wc_price_unslash($a['order_amount']);
    $amountB = wc_price_unslash($b['order_amount']);
    
    // Remove currency symbols and commas, then compare as floats
    $amountA = floatval(str_replace(array('₹', ',', 'USD', '$', 'EUR', '€'), '', $amountA));
    $amountB = floatval(str_replace(array('₹', ',', 'USD', '$', 'EUR', '€'), '', $amountB));
    
    if ($amountA == $amountB) {
        return 0;
    }
    
    return ($amountA < $amountB) ? -1 : 1;
}

function findMaxByKey($data , $targetKey) {
    foreach ($data as $item) {
        $value = $item[$targetKey];

        if (isset($keyCounts[$value])) {
            $keyCounts[$value]++;
        } else {
            $keyCounts[$value] = 1;
        }
    
    }
    $maxKey = null;
    $maxCount = 0;

    foreach ($keyCounts as $key => $count) {
        if ($count > $maxCount) {
            $maxKey = $key;
            $maxCount = $count;
        }
    }
    return $maxKey;
}


// AJAX callback function for getting orders
function get_orders_ajax_callback() {
    $referrer = $_SERVER['HTTP_REFERER'];
  
    global $wpdb;
    $page_id = get_the_ID();
    $page = isset( $_POST['start'] ) ? (int) $_POST['start'] / $_POST['length'] + 1 : 1;
    $per_page = isset( $_POST['length'] ) ? (int) $_POST['length'] : 10;
    $group = explode("-",$_POST['group']);
   // var_dump($_POST['group']);
    $group_start = $group[0];
    $group_end = $group[1];
    $args = array(
        'post_type' => 'shop_order',
        'post_status' => 'wc-processing', // Retrieve orders with "processing" status
        'orderby' => 'date',
        'order' => 'desc',
        'posts_per_page' => $per_page,
        'paged' => $page,
        'date_query' => array(
            array(
                'after' => '2023-06-22', // Retrieve orders after 22 June 2023
                'inclusive' => true
            )
        )
    );
   
    if ( isset( $_POST['startDate'] ) && isset( $_POST['endDate'] ) && !empty( $_POST['startDate'] ) && !empty( $_POST['endDate'] )) {
        $args['date_query'] = array(
            array(
                'after' => sanitize_text_field( $_POST['startDate'] ),
                'before' => sanitize_text_field( $_POST['endDate'] ),
                'inclusive' => true
            )
        );
    }

    // Apply project number filter if set
  /*  if ( isset( $_POST['projectNumber'] ) && ! empty( $_POST['projectNumber'] ) ) {
        $args['meta_query'] = array(
            array(
                'key' => '_projectnummer_field', // Replace with the actual meta key
                'value' => sanitize_text_field( $_POST['projectNumber'] ),
                'compare' => 'LIKE'
            )
        );
    }*/
   
    if (user_can( $current_user, 'administrator' ))
    {
        $args['meta_query'] = array(
            array(
                'key' => '_projectnummer_field', // Replace with the actual meta key
                'value' => sanitize_text_field( $_POST['projectNumber'] ),
                'compare' => 'LIKE'
            )
        );
    }
    elseif ( isset( $_POST['projectNumber'] ) && ! empty( $_POST['projectNumber'] ) ) {
            $args['meta_query'] = array(
                    'relation' => 'AND', // Combine conditions with AND
                    array(
                        'key' => '_projectnummer_field', // Replace with the actual meta key
                        'value' =>  $group_start,
                        'type' => 'NUMERIC',
                        'compare' => '>=', // Greater than or equal to 300
                    ),
                    array(
                        'key' => '_projectnummer_field', // Replace with the actual meta key
                        'value' =>  $group_end,
                        'type' => 'NUMERIC',
                        'compare' => '<', // Less than 400
                    ),
                     array(
                        'key' => '_projectnummer_field', // Replace with the actual meta key
                        'value' => sanitize_text_field( $_POST['projectNumber'] ),
                        'compare' => 'LIKE'
                    )
                );
    }
    else {
        $args['meta_query'] = array(
        'relation' => 'AND', // Combine conditions with AND
        array(
            'key' => '_projectnummer_field', // Replace with the actual meta key
            'value' => $group_start,
            'type' => 'NUMERIC',
            'compare' => '>=', // Greater than or equal to 300
        ),
        array(
            'key' => '_projectnummer_field', // Replace with the actual meta key
            'value' => $group_end,
            'type' => 'NUMERIC',
            'compare' => '<', // Less than 400
        )
    );
    }    
    

    $orders_query = new WP_Query( $args );
    $total_order_amount = 0;
    $data = array();
    $count = 0;
    if ( $orders_query->have_posts() ) {
        while ( $orders_query->have_posts() ) {
            $orders_query->the_post();
            $order = wc_get_order( get_the_ID() );
            $refund_total = 0;
                foreach ($order->get_refunds() as $refund) {
                    $refund_total += $refund->get_amount();
                }

            $data[] = array(
                'order_number' => $order->get_order_number(),
                'order_date' => $order->get_date_created()->date('d M y, H:i'),
                'order_amount' => wc_price( $order->get_total() -  $refund_total),
                'project_number' => get_post_meta( get_the_ID(), '_projectnummer_field', true ),
                
            );
             $total_order_amount += $order->get_total();
             $count++;
        }
    }

    $maxValue = findMaxByKey($data, 'project_number');

    // calculating highest sales 
    // SQL query to calculate daily sales - Highest daily sales will be cached in postmeta to preserve the processing power.
    
    $sales = $wpdb->get_results("SELECT CAST(p.post_date AS DATE) AS post_date, SUM(pm2.meta_value) AS daily_sales FROM wp_posts p LEFT JOIN wp_postmeta pm1 ON p.ID = pm1.post_id AND pm1.meta_key = '_projectnummer_field' LEFT JOIN wp_postmeta pm2 ON p.ID = pm2.post_id AND pm2.meta_key = '_order_total' WHERE p.post_type = 'shop_order' AND CAST(pm1.meta_value AS SIGNED) >= {$group_start} AND CAST(pm1.meta_value AS SIGNED) <= {$group_end} AND p.post_status = 'wc-processing' GROUP BY CAST(p.post_date AS DATE) ORDER BY daily_sales DESC LIMIT 1;");
    //echo "SELECT CAST(p.post_date AS DATE) AS post_date, SUM(pm2.meta_value) AS daily_sales FROM wp_posts p LEFT JOIN wp_postmeta pm1 ON p.ID = pm1.post_id AND pm1.meta_key = '_projectnummer_field' LEFT JOIN wp_postmeta pm2 ON p.ID = pm2.post_id AND pm2.meta_key = '_order_total' WHERE p.post_type = 'shop_order' AND CAST(pm1.meta_value AS SIGNED) >= {$group_start} AND CAST(pm1.meta_value AS SIGNED) <= {$group_end} AND p.post_status = 'wc-processing' GROUP BY CAST(p.post_date AS DATE) ORDER BY daily_sales DESC LIMIT 1;";
 
    if(!empty($sales))
    {
        $highest_sales = $sales[0]->daily_sales;
        $highest_sales_date = $sales[0]->post_date;
    }

    // higest order count
     $order_count = $wpdb->get_results("
        SELECT DATE(post_date) as order_date, COUNT(orders.ID) as order_count
        FROM {$wpdb->prefix}posts as orders
        INNER JOIN {$wpdb->prefix}postmeta as meta ON orders.ID = meta.post_id
        WHERE orders.post_type = 'shop_order'
        AND post_status = 'wc-processing'
        AND DATE(post_date) >= '$start_date'
        AND meta.meta_key = '_projectnummer_field'
        AND CAST(meta.meta_value AS SIGNED) >= ".$group_start."
        AND CAST(meta.meta_value AS SIGNED) <=  ".$group_end."
        GROUP BY order_date
        ORDER BY order_count DESC
        LIMIT 1
    ");

    if (!empty($order_count )) {
        $highest_order = reset($order_count );
        $order_count_date = date('F j, Y', strtotime($highest_order->order_date));
        $order_count = $highest_order->order_count;
        }

    wp_send_json(array(
        'data' => $data,
        'draw' => isset( $_POST['draw'] ) ? (int) $_POST['draw'] : 1,
        'recordsTotal' => $orders_query->found_posts,
        'recordsFiltered' => $orders_query->found_posts,
        'total_order_amount' => '€'.number_format(round($total_order_amount),0,',','.'),
        'average' => '€'.number_format($total_order_amount / $count,2,',','.'),
        'max_scorer' =>  $maxValue,
        'highest_sales' => '€'.number_format( $highest_sales,2,',','.'),
        'highest_sales_date' =>  $highest_sales_date ,     
        'highest_count' => $order_count,
        'highest_count_date'=>  $order_count_date ,

    ));
}


add_action( 'wp_ajax_get_orders', 'get_orders_ajax_callback' );
add_action( 'wp_ajax_nopriv_get_orders', 'get_orders_ajax_callback' );
function replace_logo_on_page_24($html, $blog_id) {
    // Check if the current page is the one with ID 24
    if (is_page(7889)) {
        // Replace this with the attachment ID of your alternate logo image
      
        
        // Get the URL of the alternate logo image
        $alternate_logo_url = 'https://2050.paris/wp-content/uploads/2023/07/2050-Paris-2050-Paris-logo.svg';
        
        // Replace the logo image URL in the HTML with the alternate logo URL
        $html = preg_replace('/<img[^>]*src=["\']([^"\']*)["\'][^>]*>/', '<img src="' . $alternate_logo_url . '" />', $html);
    }

    return $html;
}
add_filter('get_custom_logo', 'replace_logo_on_page_24', 10, 2);


add_filter( 'protected_title_format', 'remove_protected_text' );
function remove_protected_text() {
return __('%s');
}

// Register a new REST API route
function my_custom_post_type_rest_api_init() {
    register_rest_route('shop_order/v1', '/scores', array(
        'methods' => 'POST',
        'callback' => 'get_orders_ajax_callback',
    ));
}
add_action('rest_api_init', 'my_custom_post_type_rest_api_init');


function add_password_column($columns) {
    $columns['page_password'] = 'Password';
    return $columns;
}
add_filter('manage_pages_columns', 'add_password_column');


function display_password_column($column, $page_id) {
    if ($column == 'page_password') {
        $p = get_post($page_id);
        echo  $p->post_password ? $p->post_password : 'No password';
    }
}
add_action('manage_pages_custom_column', 'display_password_column', 10, 2);


function set_password_column_as_sortable($columns) {
    $columns['page_password'] = 'page_password';
    return $columns;
}
add_filter('manage_edit-page_sortable_columns', 'set_password_column_as_sortable');