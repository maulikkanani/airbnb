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
                                    <input type="checkbox" name="list_data[elevator]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Wheelchair accessible</label>
                                    <input type="checkbox" name="list_data[wheelchair]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Internet</label>
                                    <input type="checkbox" name="list_data[internet]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Dryer</label>
                                    <input type="checkbox" name="list_data[dryer]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Wireless Internet</label>
                                    <input type="checkbox" name="list_data[wireless]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Iron</label>
                                    <input type="checkbox" name="list_data[iron]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Pets allowed</label>
                                    <input type="checkbox" name="list_data[pets_allowed]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Cable TV</label>
                                    <input type="checkbox" name="list_data[cable_TV]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Indoor fireplace</label>
                                    <input type="checkbox" name="list_data[indoor_fireplace]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Shampoo</label>
                                    <input type="checkbox" name="list_data[shampoo]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Buzzer/wireless intercom</label>
                                    <input type="checkbox" name="list_data[buzzer_wireless_intercom]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Laptop friendly workspace</label>
                                    <input type="checkbox" name="list_data[laptop_friendly]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Kitchen</label>
                                    <input type="checkbox" name="list_data[kitchen]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Pool</label>
                                    <input type="checkbox" name="list_data[pool]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Doorman</label>
                                    <input type="checkbox" name="list_data[doorman]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Washer</label>
                                    <input type="checkbox" name="list_data[washer]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Heating</label>
                                    <input type="checkbox" name="list_data[heating]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Hangers</label>
                                    <input type="checkbox" name="list_data[hangers]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Hair dryer</label>
                                    <input type="checkbox" name="list_data[hair_dryer]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Smoking allowed</label>
                                    <input type="checkbox" name="list_data[smoking_allowed]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Breakfast</label>
                                    <input type="checkbox" name="list_data[breakfast]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Suitable for events</label>
                                    <input type="checkbox" name="list_data[suitable_events]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Family/kid friendly</label>
                                    <input type="checkbox" name="list_data[family_kid_friendly]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Air conditioning</label>
                                    <input type="checkbox" name="list_data[air_conditioning]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Gym</label>
                                    <input type="checkbox" name="list_data[gym]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">TV</label>
                                    <input type="checkbox" name="list_data[tv]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Free parking on premises</label>
                                    <input type="checkbox" name="list_data[free_parking]" value="yes" />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Essentials</label>
                                    <input type="checkbox" name="list_data[essentials]" value="yes" />
                                </p>
                            </div>
                             <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Private entrance</label>
                                    <input type="checkbox" name="list_data[private_entrance]" value="yes" />
                                </p>
                            </div>
                        </div>
                    </div>
                   <!-- End Amenities Tab --> 
                </div>
             </div>
        </div>
    </div>
</div>