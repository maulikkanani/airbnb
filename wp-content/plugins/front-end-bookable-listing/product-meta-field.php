<?php 
/**
 * This File is used to make up a product meta field html structured
 */

// Get the postmeta for current job listing product 
        $custom_boxs = get_post_meta( $product_id , 'product_meta_data', true );
// Unserialize the data         
        $unserialize_data = maybe_unserialize($custom_boxs);
//        echo $unserialize_data['elevator'];

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


<?php  
if(empty($custom_box)){?>
    
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
                                    <input type="checkbox" name="list_data[elevator]" value="yes" <?php if($unserialize_data['elevator'] == "yes"){?> checked="checked" <?php }?>/>
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Wheelchair accessible</label>
                                    <input type="checkbox" name="list_data[wheelchair]" value="yes" <?php if($unserialize_data['wheelchair'] == "yes") { ?> checked="checked" <?php } ?> />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Internet</label>
                                    <input type="checkbox" name="list_data[internet]" value="yes" <?php if($unserialize_data['internet'] == "yes") { ?> checked="checked" <?php } ?> />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Dryer</label>
                                    <input type="checkbox" name="list_data[dryer]" value="yes" <?php if($unserialize_data['dryer'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div> 
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Cable TV</label>
                                    <input type="checkbox" name="list_data[tv]" value="yes" <?php if($unserialize_data['tv'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div> 
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Free Parking</label>
                                    <input type="checkbox" name="list_data[free_parking]" value="yes" <?php if($unserialize_data['free_parking'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div> 
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Smoking Allowed</label>
                                    <input type="checkbox" name="list_data[cigarette]" value="yes" <?php if($unserialize_data['cigarette'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div> 
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Kitchen</label>
                                    <input type="checkbox" name="list_data[kitchen]" value="yes" <?php if($unserialize_data['kitchen'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Air-conditioner</label>
                                    <input type="checkbox" name="list_data[air-conditioner]" value="yes" <?php if($unserialize_data['air-conditioner'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div> 
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
<?php }else{?>
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
                                    <input type="checkbox" name="list_data" value="<?php echo $unserialize_data['elevator'];?>" <?php if($unserialize_data['elevator'] == "yes"){?> checked="checked" <?php }?>/>
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Wheelchair accessible</label>
                                    <input type="checkbox" name="list_data[wheelchair]" value="<?php echo $unserialize_data['wheelchair'];?>" <?php if($unserialize_data['wheelchair'] == "yes") { ?> checked="checked" <?php } ?> />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Internet</label>
                                    <input type="checkbox" name="list_data[internet]" value="<?php echo $unserialize_data['internet'];?>" <?php if($unserialize_data['internet'] == "yes") { ?> checked="checked" <?php } ?> />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Dryer</label>
                                    <input type="checkbox" name="list_data[dryer]" value="<?php echo $unserialize_data['dryer'];?>" <?php if($unserialize_data['dryer'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div> 
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Cable TV</label>
                                    <input type="checkbox" name="list_data[tv]" value="<?php echo $unserialize_data['tv'];?>" <?php if($unserialize_data['tv'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div> 
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Free Parking</label>
                                    <input type="checkbox" name="list_data[free_parking]" value="<?php echo $unserialize_data['free_parking'];?>" <?php if($unserialize_data['free_parking'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div> 
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Smoking Allowed</label>
                                    <input type="checkbox" name="list_data[cigarette]" value="<?php echo $unserialize_data['cigarette'];?>" <?php if($unserialize_data['cigarette'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div>
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Kitchen</label>
                                    <input type="checkbox" name="list_data[kitchen]" value="<?php echo $unserialize_data['kitchen'];?>" <?php if($unserialize_data['kitchen'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div> 
                            <div class="col-xs-4">
                                <p class="form-field">
                                    <label for="_wc_booking_duration_type">Air-conditioner</label>
                                    <input type="checkbox" name="list_data[air-conditioner]" value="<?php echo $unserialize_data['air-conditioner'];?>" <?php if($unserialize_data['air-conditioner'] == "yes") { ?> checked="checked" <?php } ?>  />
                                </p>
                            </div> 
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
<?php } ?>
