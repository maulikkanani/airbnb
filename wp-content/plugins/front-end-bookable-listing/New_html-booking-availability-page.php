<?php
if (isset($_POST['save'])) {
    $post_id = $_POST['post_id_val'];
    if (isset($_POST['_wc_booking_qty'])) {
        $booking_qty = $_POST['_wc_booking_qty'];
        update_post_meta($post_id, '_wc_booking_qty', $booking_qty);
    }
    if (isset($_POST['_wc_booking_min_date'])) {
        $book_min_date = $_POST['_wc_booking_min_date'];
        update_post_meta($post_id, '_wc_booking_min_date', $book_min_date);
    }
    if (isset($_POST['_wc_booking_min_date_unit'])) {
        $book_min_date_unit = $_POST['_wc_booking_min_date_unit'];
        update_post_meta($post_id, '_wc_booking_min_date_unit', $book_min_date_unit);
    }
    if (isset($_POST['_wc_booking_max_date'])) {
        $book_max_date = $_POST['_wc_booking_max_date'];
        update_post_meta($post_id, '_wc_booking_max_date', $book_max_date);
    }
    if (isset($_POST['_wc_booking_max_date_unit'])) {
        $book_max_date_unit = $_POST['_wc_booking_max_date_unit'];
        update_post_meta($post_id, '_wc_booking_max_date_unit', $book_max_date_unit);
    }
    if (isset($_POST['_wc_booking_buffer_period'])) {
        $book_buffer_period = $_POST['_wc_booking_buffer_period'];
        update_post_meta($post_id, '_wc_booking_buffer_period', $book_buffer_period);
    }
    if (isset($_POST['_wc_booking_default_date_availability'])) {
        $default_date_avail = $_POST['_wc_booking_default_date_availability'];
        update_post_meta($post_id, '_wc_booking_default_date_availability', $default_date_avail);
    }
    if (isset($_POST['_wc_booking_check_availability_against'])) {
        $book_check_availability_against = $_POST['_wc_booking_check_availability_against'];
        update_post_meta($post_id, '_wc_booking_check_availability_against', $book_check_availability_against);
    }
    if (isset($_POST['_wc_booking_first_block_time'])) {
        $book_first_block_time = $_POST['_wc_booking_first_block_time'];
        update_post_meta($post_id, '_wc_booking_first_block_time', $book_first_block_time);
    }

    $availability_array = array();
    $row_size = isset($_POST["wc_booking_availability_type"]) ? sizeof($_POST["wc_booking_availability_type"]) : 0;
    for ($i = 0; $i < $row_size; $i ++) {
        $availability_array[$i]['type'] = $_POST['wc_booking_availability_type'][$i];

        $availability_array[$i]['bookable'] = wc_clean($_POST["wc_booking_availability_bookable"][$i]);
        $availability_array[$i]['priority'] = intval($_POST['wc_booking_availability_priority'][$i]);

        switch ($availability_array[$i]['type']) {
            case 'custom' :
                $availability_array[$i]['from'] = wc_clean($_POST["wc_booking_availability_from_date"][$i]);
                $availability_array[$i]['to'] = wc_clean($_POST["wc_booking_availability_to_date"][$i]);
                break;
            case 'months' :
                $availability_array[$i]['from'] = wc_clean($_POST["wc_booking_availability_from_month"][$i]);
                $availability_array[$i]['to'] = wc_clean($_POST["wc_booking_availability_to_month"][$i]);
                break;
            case 'weeks' :
                $availability_array[$i]['from'] = wc_clean($_POST["wc_booking_availability_from_week"][$i]);
                $availability_array[$i]['to'] = wc_clean($_POST["wc_booking_availability_to_week"][$i]);
                break;
            case 'days' :
                $availability_array[$i]['from'] = wc_clean($_POST["wc_booking_availability_from_day_of_week"][$i]);
                $availability_array[$i]['to'] = wc_clean($_POST["wc_booking_availability_to_day_of_week"][$i]);
                break;
            case 'time' :
            case 'time:1' :
            case 'time:2' :
            case 'time:3' :
            case 'time:4' :
            case 'time:5' :
            case 'time:6' :
            case 'time:7' :
                $availability_array[$i]['from'] = wc_booking_sanitize_time1($_POST["wc_booking_availability_from_time"][$i]);
                $availability_array[$i]['to'] = wc_booking_sanitize_time1($_POST["wc_booking_availability_to_time"][$i]);
                break;
            case 'time:range' :
                $availability_array[$i]['from'] = wc_booking_sanitize_time1($_POST["wc_booking_availability_from_time"][$i]);
                $availability_array[$i]['to'] = wc_booking_sanitize_time1($_POST["wc_booking_availability_to_time"][$i]);

                $availability_array[$i]['from_date'] = wc_clean($_POST['wc_booking_availability_from_date'][$i]);
                $availability_array[$i]['to_date'] = wc_clean($_POST['wc_booking_availability_to_date'][$i]);
                break;
        }
    }
    update_post_meta($post_id, '_wc_booking_availability', $availability_array);
}
?>
<?php
global $current_user;
$args = array(
    'numberposts' => 1,
    'orderby' => 'post_date',
    'order' => 'asc',
    'author' => $current_user->ID,
    'post_type' => 'product'
);
$get_posts = new WP_Query($args);
$post_id= $get_posts->post->ID;
?>
<form action="" name="form1" method="post" id="form1">
    <div id="bookings_availability" class="panel woocommerce_options_panel">
        <?php $my_product_name = get_the_title($post_id); ?>
        <div class="options_group">
            <input type="hidden" id="post_id_val" name="post_id_val" value="<?php echo $post_id; ?>">
            <h2>Set Availability of Product : <?php echo $my_product_name; ?></h2>
            <p class="form-field _wc_booking_qty_field ">
                <label for="_wc_booking_qty">Max bookings per block</label>
                <span class="woocommerce-help-tip"></span>
                <input type="text" class="short" style="" name="_wc_booking_qty" id="_wc_booking_qty" value="<?php echo get_post_meta($post_id, '_wc_booking_qty', true) ?>" placeholder="" min="" step="1">
            </p>            
            <?php
            $min_date = absint(get_post_meta($post_id, '_wc_booking_min_date', true));
            $min_date_unit = get_post_meta($post_id, '_wc_booking_min_date_unit', true);
            ?>
            <p class="form-field">
                <label for="_wc_booking_min_date"><?php _e('Minimum block bookable', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_min_date" id="_wc_booking_min_date" value="<?php echo $min_date; ?>" step="1" min="0" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_min_date_unit" id="_wc_booking_min_date_unit" class="short" style="margin-right: 7px;">
                    <option value="month" <?php selected($min_date_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="week" <?php selected($min_date_unit, 'week'); ?>><?php _e('Week(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php selected($min_date_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php selected($min_date_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                </select> <?php _e('into the future', 'woocommerce-bookings'); ?>
            </p>
            <?php
            $max_date = get_post_meta($post_id, '_wc_booking_max_date', true);
            if ($max_date == '')
                $max_date = 12;
            $max_date = max(absint($max_date), 1);
            $max_date_unit = get_post_meta($post_id, '_wc_booking_max_date_unit', true);
            ?>
            <p class="form-field">
                <label for="_wc_booking_max_date"><?php _e('Maximum block bookable', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_max_date" id="_wc_booking_max_date" value="<?php echo $max_date; ?>" step="1" min="1" style="margin-right: 7px; width: 4em;">
                <select name="_wc_booking_max_date_unit" id="_wc_booking_max_date_unit" class="short" style="margin-right: 7px;">
                    <option value="month" <?php selected($max_date_unit, 'month'); ?>><?php _e('Month(s)', 'woocommerce-bookings'); ?></option>
                    <option value="week" <?php selected($max_date_unit, 'week'); ?>><?php _e('Week(s)', 'woocommerce-bookings'); ?></option>
                    <option value="day" <?php selected($max_date_unit, 'day'); ?>><?php _e('Day(s)', 'woocommerce-bookings'); ?></option>
                    <option value="hour" <?php selected($max_date_unit, 'hour'); ?>><?php _e('Hour(s)', 'woocommerce-bookings'); ?></option>
                </select> <?php _e('into the future', 'woocommerce-bookings'); ?>
            </p>

            <?php
            $buffer_period = get_post_meta($post_id, '_wc_booking_buffer_period', true);
            ?>
            <p class="form-field _wc_booking_buffer_period" id="_wc_booking_buffer_period">
                <label for="_wc_booking_buffer_period"><?php _e('Require a buffer period of', 'woocommerce-bookings'); ?></label>
                <input type="number" name="_wc_booking_buffer_period" id="_wc_booking_buffer_period" value="<?php echo esc_attr($buffer_period); ?>" step="1" min="0" style="margin-right: 7px; width: 4em;">
                <span class='_wc_booking_buffer_period_unit'></span>
                <?php _e('between bookings', 'woocommerce-bookings'); ?>
            </p>
            <?php
            $default_date_availability = get_post_meta($post_id, '_wc_booking_default_date_availability', true);
            ?>
            <p class="form-field _wc_booking_default_date_availability_field ">
                <label for="_wc_booking_default_date_availability">All dates are...</label>
                <select id="_wc_booking_default_date_availability" name="_wc_booking_default_date_availability" class="select short" style="">
                    <option value="available" <?php selected($default_date_availability,'available'); ?>><?php _e('available by default', 'woocommerce-bookings'); ?></option>
                    <option value="non-available" <?php selected($default_date_availability,'non-available'); ?>><?php _e('not-available by default', 'woocommerce-bookings'); ?></option>                   
                </select> 
                <span class="description">This option affects how you use the rules below.</span>
            </p>
            <?php
            $check_availability_against = get_post_meta($post_id, '_wc_booking_check_availability_against', true);
            ?>
            <p class="form-field _wc_booking_check_availability_against_field ">
                <label for="_wc_booking_check_availability_against">Check rules against...</label>
                <select id="_wc_booking_check_availability_against" name="_wc_booking_check_availability_against" class="select short" style="">
                    <option value="" <?php selected($check_availability_against,''); ?>><?php _e('All blocks being booked', 'woocommerce-bookings'); ?></option>
                    <option value="start" <?php selected($check_availability_against,'start'); ?>><?php _e('The starting block only', 'woocommerce-bookings'); ?></option>                   
                </select>
                <span class="description">This option affects how bookings are checked for availability.</span>
            </p>
            <?php
            $wc_booking_first_block_time = get_post_meta($post_id, '_wc_booking_duration_unit', true);
            ?>
                <p class="form-field _wc_booking_first_block_time_field">
                    <label for="_wc_booking_first_block_time"><?php _e('First block starts at...', 'woocommerce-bookings'); ?></label>
                    <input type="time" name="_wc_booking_first_block_time" id="_wc_booking_first_block_time" value="<?php echo get_post_meta($post_id, '_wc_booking_first_block_time', true); ?>" placeholder="HH:MM" />
                </p>
                <?php
            ?>
        </div>
        <div class="options_group">
            <div class="table_grid">
                <table class="widefat">
                    <thead>
                        <tr>
                            <th class="sort" width="1%">&nbsp;</th>
                            <th><?php _e('Range type', 'woocommerce-bookings'); ?></th>
                            <th><?php _e('Range', 'woocommerce-bookings'); ?></th>
                            <th></th>
                            <th></th>
                            <th><?php _e('Bookable', 'woocommerce-bookings'); ?>&nbsp;<a class="tips" data-tip="<?php _e('If not bookable, users won\'t be able to choose this block for their booking.', 'woocommerce-bookings'); ?>">[?]</a></th>
                            <th><?php _e('Priority', 'woocommerce-bookings'); ?>&nbsp;<a class="tips" data-tip="<?php esc_html_e('The lower the priority number, the earlier this rule gets applied. By default, global rules take priority over product rules which take priority over resource rules. By using priority numbers you can execute rules in different orders.', 'woocommerce-bookings'); ?>">[?]</a></th>
                            <th class="remove" width="1%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="6">
                                <a href="#" class="add_row add_range_button" data-row="<?php
                                ob_start();
                                include( 'html-booking-availability-fields.php' );
                                $html = ob_get_clean();
                                echo esc_attr($html);
                                ?>"><?php _e('Add Range', 'woocommerce-bookings'); ?></a>
                                <span class="description"><?php _e('Rules with lower numbers will execute first. Rules further down this table with the same priority will also execute first.', 'woocommerce-bookings'); ?></span>
                            </th>
                        </tr>
                    </tfoot>
                    <tbody id="availability_rows">
                        <?php
                        $values = get_post_meta($post_id, '_wc_booking_availability', true);
                        if (!empty($values) && is_array($values)) {
                            foreach ($values as $availability) {
                                include( 'html-booking-availability-fields.php' );
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <input name="save" type="submit" class="" id="save_btn" value="Update">
</form>