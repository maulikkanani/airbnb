<?php 
/**
 * This File is used to make up a product meta field html structured
 */
$product_id='';
if(isset($_GET['job_id'])){
    $products =get_post_meta($_GET['job_id'],'_products',true);
        if(count($products)==1){
            $product_id=$products[0];
        }
}
echo "<input type='hidden' id='product_id' name='product_id' value='".$product_id."' />";


 $custom_box = get_post_meta( $product_id , 'product_meta_data', true );
        echo 'New :  ';
        print_r($custom_box);

        if ( !is_array($custom_box) ){
            $custom_box = array();
       }
        
    update_post_meta( $product_id, 'product_meta_data',$_POST['product_meta_data'] );  



?>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.vertical-tabs.css">
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/animate.css">
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<style>
    #boat_identi .form-field label {
	display: inline-block;
	width: 20%;
}
#boat_identi .form-field input {
	width: 75%;
	display: inline-block;
}
#amenities label {
	padding-right: 15px; letter-spacing: 1px;
}
#amenities .col-xs-4 {
	margin-bottom: 15px;
}
</style>


<h2 style="display: block;"><span>Product Information</span></h2>
<div class="wrap">
    <div class="row product-custom-field" style="min-height:400px;">
        <div  class="col-sm-12">
            <div class="col-xs-3"> 
                <ul class="nav nav-tabs tabs-left">
                    <li><a href="#amenities" data-toggle="tab">Amenities</a></li>
                </ul>
            </div>   
             <div class="col-xs-9">
                <div class="tab-content">

                    <!-- Amenities Tab -->
                    <div class="tab-pane" id="amenities">
                        <div class="row">
                            <div class="col-xs-4">
                                <p class="form-field">
                                    
                                    <label for="_wc_booking_duration_type">Elevator in building</label>
                                    <input type="checkbox" name="list_data[elevator]" value="yes" <?php if($custom_box['elevator'] == "yes") { ?> checked="checked" <?php } ?> />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Wheelchair accessible</label>
                                    <input type="checkbox" name="list_data[wheelchair]" value="yes" <?php if($custom_box['wheelchair'] == "yes") { ?> checked="checked" <?php } ?> />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Internet</label>
                                    <input type="checkbox" name="list_data[internet]" value="yes" <?php if($custom_box['internet'] == "yes") { ?> checked="checked" <?php } ?> />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Dryer</label>
                                    <input type="checkbox" name="list_data[dryer]" value="yes" <?php if($custom_box['dryer'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            
                        </div>
                    </div>
<!--                    <div class="tab-pane" id="prices">
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Extra people</label>
                            <input type="text" name="list_data[extra_people]" size="40" value="<?php // echo $custom_box['extra_people'];   ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Cleaning Fee</label>
                            <input type="text" name="list_data[cleaning_fee]" size="40" value="<?php // echo $custom_box['cleaning_fee'];   ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Weekly Discount</label>
                            <input type="text" name="list_data[weekly_discount]" placeholder="5%" size="40" value="<?php // echo $custom_box['weekly_discount'];   ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Monthly Discount</label>
                            <input type="text" name="list_data[monthly_discount]" placeholder="10%" size="40" value="<?php // echo $custom_box['monthly_discount'];   ?>" />
                        </p>
                        
                    </div>-->
<!--                    <div class="tab-pane" id="description">
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Description</label>
                           <?php  //$content = get_post_meta($post->ID, 'custom_wysiwyg', true);
//                                wp_editor(htmlspecialchars_decode($custom_box['custom_wysiwyg']) , 'list_data[custom_wysiwyg]', array(
//                                "media_buttons" => true
//                                )); ?>
                        </p>
                    </div>-->
<!--                    <div class="tab-pane" id="house_rules">
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">House Rules</label>
                           <?php  //$content = get_post_meta($post->ID, 'custom_wysiwyg', true);
//                                wp_editor(htmlspecialchars_decode($custom_box['house_rules']) , 'list_data[house_rules]', array(
//                                "media_buttons" => true
//                                )); ?>
                        </p>
                    </div>-->
<!--                    <div class="tab-pane" id="safety_features">
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">House Rules</label>
                           <?php  //$content = get_post_meta($post->ID, 'custom_wysiwyg', true);
//                                wp_editor(htmlspecialchars_decode($custom_box['safety_features']) , 'list_data[safety_features]', array(
//                                "media_buttons" => true
//                                )); ?>
                        </p>
                    </div>-->
                   <!-- End Amenities Tab --> 
                </div>
             </div>
        </div>
    </div>
</div>