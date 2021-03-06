<?php 
/**
 * This File is used to make up a product meta field html structured
 */
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
<div class="wrap">
    <div class="row product-custom-field" style="min-height:400px;">
        <div  class="col-sm-12">
            <div class="col-xs-3"> 
                <ul class="nav nav-tabs tabs-left">
                    <li class="active"><a href="#boat_identi" data-toggle="tab">The space</a></li>
                    <li><a href="#amenities" data-toggle="tab">Amenities</a></li>
                    <li><a href="#prices" data-toggle="tab">Prices</a></li>
                    <li><a href="#description" data-toggle="tab">Description</a></li>
                    <li><a href="#house_rules" data-toggle="tab">House Rules</a></li>
                    <li><a href="#safety_features" data-toggle="tab">Safety features</a></li>
                </ul>
            </div>   
             <div class="col-xs-9">
                <div class="tab-content">
                     <!-- Tab The Space -->
                    <div class="tab-pane active" id="boat_identi">
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Accommodates</label>
                            <input type="text" name="list_data[accommodates]" size="40" value="<?php echo $custom_box['accommodates'];   ?>" />
                        </p>
                       
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Bathrooms</label>
                            <input type="text" name="list_data[bathrooms]" size="40" value="<?php echo $custom_box['bathrooms'];    ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Bedrooms</label>
                             <input type="text" name="list_data[bedrooms]" size="40" value="<?php echo $custom_box['bedrooms'];    ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Beds</label>
                            <input type="text" name="list_data[beds]" size="40" value="<?php echo $custom_box['beds'];    ?>" />
                        </p>
                         <p class="form-field">
                            <label for="_wc_booking_duration_type">Guests</label>
                            <input type="text" name="list_data[guests]" size="40" value="<?php echo $custom_box['guests'];    ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Check In</label>
                            <input type="text" name="list_data[check-in]" size="40" value="<?php echo $custom_box['check-in'];    ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Check Out</label>
                            <input type="text" name="list_data[check-out]" size="40" value="<?php echo $custom_box['check-out'];    ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Pet Owner</label>
                            <input type="text" name="list_data[pet-owner]" size="40" value="<?php echo $custom_box['pet-owner'];    ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Property type</label>
                             <input type="text" name="list_data[property-type]" size="40" value="<?php echo $custom_box['property-type'];    ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Room type</label>
                            <input type="text" name="list_data[room-type]" size="40" value="<?php echo $custom_box['room-type'];    ?>" />
                        </p>
                    </div>
                    <!-- End The Space -->
                    
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
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Wireless Internet</label>
                                    <input type="checkbox" name="list_data[wireless]" value="yes" <?php if($custom_box['wireless'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Iron</label>
                                    <input type="checkbox" name="list_data[iron]" value="yes" <?php if($custom_box['iron'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Pets allowed</label>
                                    <input type="checkbox" name="list_data[pets_allowed]" value="yes" <?php if($custom_box['pets_allowed'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Cable TV</label>
                                    <input type="checkbox" name="list_data[cable_TV]" value="yes" <?php if($custom_box['cable_TV'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Indoor fireplace</label>
                                    <input type="checkbox" name="list_data[indoor_fireplace]" value="yes" <?php if($custom_box['indoor_fireplace'] == "yes") { ?> checked="checked" <?php } ?> />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Shampoo</label>
                                    <input type="checkbox" name="list_data[shampoo]" value="yes" <?php if($custom_box['shampoo'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Buzzer/wireless intercom</label>
                                    <input type="checkbox" name="list_data[buzzer_wireless_intercom]" value="yes" <?php if($custom_box['buzzer_wireless_intercom'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Laptop friendly workspace</label>
                                    <input type="checkbox" name="list_data[laptop_friendly]" value="yes" <?php if($custom_box['laptop_friendly'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Kitchen</label>
                                    <input type="checkbox" name="list_data[kitchen]" value="yes" <?php if($custom_box['kitchen'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Pool</label>
                                    <input type="checkbox" name="list_data[pool]" value="yes" <?php if($custom_box['pool'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Doorman</label>
                                    <input type="checkbox" name="list_data[doorman]" value="yes" <?php if($custom_box['doorman'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Washer</label>
                                    <input type="checkbox" name="list_data[washer]" value="yes" <?php if($custom_box['washer'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Heating</label>
                                    <input type="checkbox" name="list_data[heating]" value="yes" <?php if($custom_box['heating'] == "yes") { ?> checked="checked" <?php } ?> />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Hangers</label>
                                    <input type="checkbox" name="list_data[hangers]" value="yes" <?php if($custom_box['hangers'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Hair dryer</label>
                                    <input type="checkbox" name="list_data[hair_dryer]" value="yes" <?php if($custom_box['hair_dryer'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Smoking allowed</label>
                                    <input type="checkbox" name="list_data[smoking_allowed]" value="yes" <?php if($custom_box['smoking_allowed'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Breakfast</label>
                                    <input type="checkbox" name="list_data[breakfast]" value="yes" <?php if($custom_box['breakfast'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Suitable for events</label>
                                    <input type="checkbox" name="list_data[suitable_events]" value="yes" <?php if($custom_box['suitable_events'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Family/kid friendly</label>
                                    <input type="checkbox" name="list_data[family_kid_friendly]" value="yes" <?php if($custom_box['family_kid_friendly'] == "yes") { ?> checked="checked" <?php } ?> />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Air conditioning</label>
                                    <input type="checkbox" name="list_data[air_conditioning]" value="yes" <?php if($custom_box['air_conditioning'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Gym</label>
                                    <input type="checkbox" name="list_data[gym]" value="yes" <?php if($custom_box['gym'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">TV</label>
                                    <input type="checkbox" name="list_data[tv]" value="yes" <?php if($custom_box['tv'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Free parking on premises</label>
                                    <input type="checkbox" name="list_data[free_parking]" value="yes" <?php if($custom_box['free_parking'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Essentials</label>
                                    <input type="checkbox" name="list_data[essentials]" value="yes" <?php if($custom_box['essentials'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                             <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Private entrance</label>
                                    <input type="checkbox" name="list_data[private_entrance]" value="yes" <?php if($custom_box['private_entrance'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="prices">
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Extra people</label>
                            <input type="text" name="list_data[extra_people]" size="40" value="<?php echo $custom_box['extra_people'];   ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Cleaning Fee</label>
                            <input type="text" name="list_data[cleaning_fee]" size="40" value="<?php echo $custom_box['cleaning_fee'];   ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Weekly Discount</label>
                            <input type="text" name="list_data[weekly_discount]" placeholder="5%" size="40" value="<?php echo $custom_box['weekly_discount'];   ?>" />
                        </p>
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Monthly Discount</label>
                            <input type="text" name="list_data[monthly_discount]" placeholder="10%" size="40" value="<?php echo $custom_box['monthly_discount'];   ?>" />
                        </p>
                        
                    </div>
                    <div class="tab-pane" id="description">
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">Description</label>
                           <?php  //$content = get_post_meta($post->ID, 'custom_wysiwyg', true);
                                wp_editor(htmlspecialchars_decode($custom_box['custom_wysiwyg']) , 'list_data[custom_wysiwyg]', array(
                                "media_buttons" => true
                                )); ?>
                        </p>
                    </div>
                    <div class="tab-pane" id="house_rules">
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">House Rules</label>
                           <?php  //$content = get_post_meta($post->ID, 'custom_wysiwyg', true);
                                wp_editor(htmlspecialchars_decode($custom_box['house_rules']) , 'list_data[house_rules]', array(
                                "media_buttons" => true
                                )); ?>
                        </p>
                    </div>
                    <div class="tab-pane" id="safety_features">
                        <p class="form-field">
                            <label for="_wc_booking_duration_type">House Rules</label>
                           <?php  //$content = get_post_meta($post->ID, 'custom_wysiwyg', true);
                                wp_editor(htmlspecialchars_decode($custom_box['safety_features']) , 'list_data[safety_features]', array(
                                "media_buttons" => true
                                )); ?>
                        </p>
                    </div>
                   <!-- End Amenities Tab --> 
                </div>
             </div>
        </div>
    </div>
</div>