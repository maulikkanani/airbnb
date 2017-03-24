<?php
/**
 * Listify child theme.
 */
function listify_child_styles() {
    wp_enqueue_style( 'listify-child', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'listify_child_styles', 999 );

/** Place any new code below this line */

/* Add New Product Tab in Product Details page */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['host_tab'] = array(
		'title' 	=> __( 'The Host', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_host'
	);
        
        $tabs['location_tab'] = array(
		'title' 	=> __( 'Location', 'woocommerce' ),
		'priority' 	=> 60,
		'callback' 	=> 'woo_new_product_tab_location'
	);

	return $tabs;

}
function woo_new_product_tab_host() {

	// The new tab content

	echo '<h2>New Product Tab</h2>';
	echo '<p>Here\'s your new product tab.</p>';
	
}
function woo_new_product_tab_location() {

	// The new tab content

	echo '<h2>New Product Tab</h2>';
	echo '<p>Here\'s your new product tab.</p>';
	
}
/* End New Product Tab in Product Details page */

/**
 * Customize Description tab to display in product details page
 */
add_filter( 'woocommerce_product_tabs', 'woo_custom_description_tab', 98 );
function woo_custom_description_tab( $tabs ) {

	$tabs['description']['callback'] = 'woo_custom_description_tab_content';	// Custom description callback

	return $tabs;
}

function woo_custom_description_tab_content() {
	global $post;
              $post_id = $post->ID;
     $mata_data = get_post_meta( $post_id, 'product_meta_data',true);   
     if ( !is_array($mata_data) ){
	$mata_data = array();
    }
?>
<div class="product-vendeor-info">
    <div class="row">
        <div class="col-md-9">
            <h2><?php the_title(); ?></h2>
            
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<div class="main-amenities">
    <div class="col-md-3">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.png" alt="" />
        <span><?php echo $mata_data['room-type'];    ?></span>
    </div>
    <div class="col-md-3">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Guests.png" alt="" />
        <span><?php echo $mata_data['guests'];    ?></span>
    </div>
    <div class="col-md-3">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bed.png" alt="" />
        <span><?php echo $mata_data['bedrooms'];    ?></span>
    </div>
    <div class="col-md-3">
         <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/room.png" alt="" />
        <span><?php echo $mata_data['beds'];    ?></span>
    </div>
    <div class="clearfix"></div>  
</div>
<div class="listing-information"><?php the_content(); ?></div>
<button class="btn-link host-btn btn-link--bold" type="button"><span data-reactid="19">Contact host</span></button>
<div class="product-long-details">
    <div class="the-space">
        <div class="col-md-3">
            <span class="det-tit">The space</span>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <ul>
                  <?php if($mata_data['accommodates'] != '') { ?> <li><label>Accommodates:</label><span class="bold"><?php echo $mata_data['accommodates']; ?></span></li> <?php } ?>
                  <?php if($mata_data['bathrooms'] != '') { ?> <li><label>Bathrooms:</label><span class="bold"><?php echo $mata_data['bathrooms']; ?></span></li> <?php } ?>
                  <?php if($mata_data['bedrooms'] != '') { ?> <li><label>Bedrooms:</label><span class="bold"><?php echo $mata_data['bedrooms']; ?></span></li> <?php } ?>
                  <?php if($mata_data['beds'] != '') { ?> <li><label>Beds:</label><span class="bold"><?php echo $mata_data['beds']; ?></span></li> <?php } ?>
                  </ul>
                </div>
                <div class="col-md-6">
                 <ul>   
                 <?php if($mata_data['check-in'] != '') { ?> <li><label>Check In:</label><span class="bold"><?php echo $mata_data['check-in']; ?></span></li> <?php } ?>
                 <?php if($mata_data['check-out'] != '') { ?> <li><label>Check Out:</label><span class="bold"><?php echo $mata_data['check-out']; ?></span></li> <?php } ?>
                 <?php if($mata_data['pet-owner'] != '') { ?> <li><label>Pet Owner:</label><span class="bold"><?php echo $mata_data['pet-owner']; ?></span></li> <?php } ?>
                 <?php if($mata_data['property-type'] != '') { ?> <li><label>Property type:</label><span class="bold"><?php echo $mata_data['property-type']; ?></span></li> <?php } ?>
                 <?php if($mata_data['room-type'] != '') { ?> <li><label>Room type:</label><span class="bold"><?php echo $mata_data['room-type']; ?></span></li> <?php } ?>
                </ul>
                </div>
            </div>
            <div class="row">
                <a class="btn-house" href="#">House Rules</a>
            </div>
        </div>
        <div class="clearfix"></div>  
    </div>
    <div class="the-amenities">
        <div class="col-md-3">
            <span class="det-tit">Amenities</span>
        </div>
         <div class="col-md-9 expandable">
             <div class="expandable-content-summary">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            <?php if($mata_data['elevator'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/elevator.png" alt="" /><strong>Elevator in building</strong></li> <?php } ?>
                            <?php if($mata_data['wheelchair'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wheelchair.png" alt="" /><strong>Wheelchair accessible</strong></li> <?php } ?>
                            <?php if($mata_data['internet'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/internet.png" alt="" /><strong>Internet</strong></li> <?php } ?>
                            <?php if($mata_data['dryer'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hair-dryer.png" alt="" /><strong>Dryer</strong></li> <?php } ?>
                            <?php if($mata_data['wireless'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wifi.png" alt="" /><strong>Wireless Internet</strong></li> <?php } ?>
                            <?php if($mata_data['iron'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/iron.png" alt="" /><strong>Iron</strong></li> <?php } ?>
                            <?php if($mata_data['pets_allowed'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dog-pet.png" alt="" /><strong>Pets allowed</strong></li> <?php } ?>
                            <?php if($mata_data['cable_TV'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/television.png" alt="" /><strong>Cable TV</strong></li> <?php } ?>
                            <?php if($mata_data['indoor_fireplace'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fireplace.png" alt="" /><strong>Indoor fireplace</strong></li> <?php } ?>
                            <?php if($mata_data['shampoo'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shampoo.png" alt="" /><strong>Shampoo</strong></li> <?php } ?>
                            <?php if($mata_data['shampoo'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/intercome.png" alt="" /><strong>Buzzer/wireless intercom</strong></li> <?php } ?>
                            <?php if($mata_data['laptop_friendly'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Laptop.png" alt="" /><strong>Laptop friendly workspace</strong></li> <?php } ?>
                            <?php if($mata_data['kitchen'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kitchen.png" alt="" /><strong>Kitchen</strong></li> <?php } ?>
                            <?php if($mata_data['pool'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/swimming.png" alt="" /><strong>Pool</strong></li> <?php } ?>
                            <?php if($mata_data['doorman'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/doorman.png" alt="" /><strong>Doorman</strong></li> <?php } ?>
                            <?php if($mata_data['washer'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/washing.png" alt="" /><strong>Washer</strong></li> <?php } ?>
                            <?php if($mata_data['heating'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Heating.png" alt="" /><strong>Heating</strong></li> <?php } ?>
                            <?php if($mata_data['hangers'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hanger.png" alt="" /><strong>Hangers</strong></li> <?php } ?>
                            <?php if($mata_data['hair_dryer'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon.png" alt="" /><strong>Hair dryer</strong></li> <?php } ?>
                            <?php if($mata_data['smoking_allowed'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cigarette.png" alt="" /><strong>Smoking allowed</strong></li> <?php } ?>
                            <?php if($mata_data['breakfast'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/breakfast-time.png" alt="" /><strong>Breakfast</strong></li> <?php } ?>
                            <?php if($mata_data['suitable_events'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/events.png" alt="" /><strong>Suitable for events</strong></li> <?php } ?>
                            <?php if($mata_data['family_kid_friendly'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/party.png" alt="" /><strong>Family/kid friendly</strong></li> <?php } ?>
                            <?php if($mata_data['air_conditioning'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/air-conditioner.png" alt="" /><strong>Air conditioning</strong></li> <?php } ?>
                            <?php if($mata_data['gym'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/exercise.png" alt="" /><strong>Gym</strong></li> <?php } ?>
                            <?php if($mata_data['tv'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tv.png" alt="" /><strong>TV</strong></li> <?php } ?>
                            <?php if($mata_data['free_parking'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/parked-car.png" alt="" /><strong>Free parking on premises</strong></li> <?php } ?>
                            <?php if($mata_data['essentials'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/essentials.png" alt="" /><strong>Essentials</strong></li> <?php } ?>
                            <?php if($mata_data['private_entrance'] == 'yes') { ?> <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/door-entrance.png" alt="" /><strong>Private entrance</strong></li> <?php } ?>
                        </ul>
                        <button class="expandable-trigger-more btn-link btn-link--bold" type="button" data-reactid="103"><span data-reactid="104">+ More</span></button>
                    </div>
                </div>
                 <div class="clearfix"></div>  
             </div>
             <div class="expandable-content expandable-content-full">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                        <?php if($mata_data['elevator'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/elevator.png" alt="" /><strong>Elevator in building</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Elevator in building</del></li>
                            <?php } ?>    
                            <?php if($mata_data['internet'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/internet.png" alt="" /><strong>Internet</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Internet</del></li>
                            <?php } ?> 
                            <?php if($mata_data['wireless'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wifi.png" alt="" /><strong>Wireless Internet</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Wireless Internet</del></li>
                            <?php } ?> 
                            <?php if($mata_data['pets_allowed'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/dog-pet.png" alt="" /><strong>Pets allowed</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Pets allowed</del></li>
                            <?php } ?> 
                            <?php if($mata_data['indoor_fireplace'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/fireplace.png" alt="" /><strong>Indoor fireplace</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Indoor fireplace</del></li>
                            <?php } ?> 
                            <?php if($mata_data['shampoo'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/intercome.png" alt="" /><strong>Buzzer/wireless intercom</strong></li> 
                              <?php } else { ?>
                                <li><del aria-hidden="true">Buzzer/wireless intercom</del></li>
                            <?php } ?> 
                            <?php if($mata_data['kitchen'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kitchen.png" alt="" /><strong>Kitchen</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Kitchen</del></li>
                            <?php } ?> 
                            <?php if($mata_data['doorman'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/doorman.png" alt="" /><strong>Doorman</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Doorman</del></li>
                            <?php } ?> 
                            <?php if($mata_data['heating'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Heating.png" alt="" /><strong>Heating</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Heating</del></li>
                            <?php } ?> 
                            <?php if($mata_data['hair_dryer'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon.png" alt="" /><strong>Hair dryer</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Hair dryer</del></li>
                            <?php } ?> 
                            <?php if($mata_data['breakfast'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/breakfast-time.png" alt="" /><strong>Breakfast</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Breakfast</del></li>
                            <?php } ?> 
                            <?php if($mata_data['family_kid_friendly'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/party.png" alt="" /><strong>Family/kid friendly</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Breakfast</del></li>
                            <?php } ?> 
                            <?php if($mata_data['gym'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/exercise.png" alt="" /><strong>Gym</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Gym</del></li>
                            <?php } ?> 
                            <?php if($mata_data['free_parking'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/parked-car.png" alt="" /><strong>Free parking on premises</strong></li> 
                            <?php } else { ?>
                                <li><del aria-hidden="true">Free parking on premises</del></li>
                            <?php } ?> 
                            <?php if($mata_data['private_entrance'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/door-entrance.png" alt="" /><strong>Private entrance</strong></li> 
                             <?php } else { ?>
                                <li><del aria-hidden="true">Private entrance</del></li>
                            <?php } ?> 
                        </ul>      
                    </div>
                    <div class="col-md-6">
                        <ul>
                        <?php if($mata_data['wheelchair'] == 'yes') { ?> 
                            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/wheelchair.png" alt="" /><strong>Wheelchair accessible</strong></li> 
                        <?php } else { ?>
                                <li><del aria-hidden="true">Wheelchair accessible</del></li>
                            <?php } ?> 
                        <?php if($mata_data['dryer'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hair-dryer.png" alt="" /><strong>Dryer</strong></li> 
                        <?php } else { ?>
                                <li><del aria-hidden="true">Dryer</del></li>
                            <?php } ?> 
                        <?php if($mata_data['iron'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/iron.png" alt="" /><strong>Iron</strong></li> 
                        <?php } else { ?>
                                <li><del aria-hidden="true">Iron</del></li>
                            <?php } ?> 
                        <?php if($mata_data['cable_TV'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/television.png" alt="" /><strong>Cable TV</strong></li> 
                        <?php } else { ?>
                                <li><del aria-hidden="true">Cable TV</del></li>
                            <?php } ?> 
                        <?php if($mata_data['shampoo'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/shampoo.png" alt="" /><strong>Shampoo</strong></li> 
                         <?php } else { ?>
                                <li><del aria-hidden="true">Shampoo</del></li>
                            <?php } ?> 
                        <?php if($mata_data['laptop_friendly'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/Laptop.png" alt="" /><strong>Laptop friendly workspace</strong></li> 
                        <?php } else { ?>
                                <li><del aria-hidden="true">Laptop friendly workspace</del></li>
                            <?php } ?> 
                        <?php if($mata_data['pool'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/swimming.png" alt="" /><strong>Pool</strong></li> 
                          <?php } else { ?>
                                <li><del aria-hidden="true">Pool</del></li>
                            <?php } ?> 
                        <?php if($mata_data['washer'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/washing.png" alt="" /><strong>Washer</strong></li> 
                         <?php } else { ?>
                                <li><del aria-hidden="true">Washer</del></li>
                            <?php } ?> 
                        <?php if($mata_data['hangers'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hanger.png" alt="" /><strong>Hangers</strong></li> 
                        <?php } else { ?>
                                <li><del aria-hidden="true">Hangers</del></li>
                            <?php } ?> 
                        <?php if($mata_data['smoking_allowed'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cigarette.png" alt="" /><strong>Smoking allowed</strong></li> 
                         <?php } else { ?>
                                <li><del aria-hidden="true">Smoking allowed</del></li>
                            <?php } ?> 
                        <?php if($mata_data['suitable_events'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/events.png" alt="" /><strong>Suitable for events</strong></li> 
                         <?php } else { ?>
                                <li><del aria-hidden="true">Suitable for events</del></li>
                            <?php } ?> 
                        <?php if($mata_data['air_conditioning'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/air-conditioner.png" alt="" /><strong>Air conditioning</strong></li> 
                        <?php } else { ?>
                                <li><del aria-hidden="true">Air conditioning</del></li>
                            <?php } ?> 
                        <?php if($mata_data['tv'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/tv.png" alt="" /><strong>TV</strong></li> 
                        <?php } else { ?>
                                <li><del aria-hidden="true">TV</del></li>
                            <?php } ?> 
                        <?php if($mata_data['essentials'] == 'yes') { ?> 
                                <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/essentials.png" alt="" /><strong>Essentials</strong></li> 
                        <?php } else { ?>
                                <li><del aria-hidden="true">Essentials</del></li>
                            <?php } ?> 
                        </ul>
                    </div>
                </div>
             </div>
         </div>
        <div class="clearfix"></div>  
    </div>
    <div class="the-space the-price">
        <div class="col-md-3">
            <span class="det-tit">Prices</span>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <ul>
                  <?php if($mata_data['extra_people'] != '') { ?> <li><label>Extra people:</label><span class="bold"><?php echo $mata_data['extra_people']; ?></span></li> <?php } ?>
                  <?php if($mata_data['cleaning_fee'] != '') { ?> <li><label>Cleaning Fee:</label><span class="bold"><?php echo $mata_data['cleaning_fee']; ?></span></li> <?php } ?>
                  <?php if($mata_data['weekly_discount'] != '') { ?> <li><label>Weekly Discount:</label><span class="bold"><?php echo $mata_data['weekly_discount']; ?></span></li> <?php } ?>
                  </ul>
                </div>
                <div class="col-md-6">
                 <ul>   
                 <?php if($mata_data['monthly_discount'] != '') { ?> <li><label>Monthly Discount:</label><span class="bold"><?php echo $mata_data['monthly_discount']; ?></span></li> <?php } ?>
                 <?php if($mata_data['cancellation'] != '') { ?> <li><label>Cancellation:</label><span class="bold"><?php echo $mata_data['cancellation']; ?></span></li> <?php } ?>
                </ul>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>  
    </div>
    <div class="the-space the-description">
        <div class="col-md-3">
            <span class="det-tit">Description</span>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="react-expandable">
                        <div class="expandable-content"> 
                            <?php if($mata_data['custom_wysiwyg'] != '') { ?><?php echo htmlspecialchars_decode($mata_data['custom_wysiwyg']); ?> <?php } ?>
                        </div>
                        <button class="expandable-desc-more btn-link btn-link--bold" type="button" data-reactid="103"><span data-reactid="104">+ More</span></button>
                    </div>    
                </div>
            </div>
            
        </div>
        <div class="clearfix"></div>  
    </div>
    <div class="the-space house-rule" id="house_rules">
        <div class="col-md-3">
            <span class="det-tit">House Rules</span>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <?php if($mata_data['house_rules'] != '') { ?><?php echo htmlspecialchars_decode($mata_data['house_rules']); ?> <?php } ?> 
                </div>
            </div>
            
        </div>
        <div class="clearfix"></div> 
    </div>
    <div class="safety-features">
        <div class="col-md-3">
            <span class="det-tit">Safety features</span>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <?php if($mata_data['safety_features'] != '') { ?><?php echo htmlspecialchars_decode($mata_data['safety_features']); ?> <?php } ?> 
                </div>
            </div>
            
        </div>
        <div class="clearfix"></div> 
    </div>
    <div class="the-availability">
        <div class="col-md-3">
            <span class="det-tit">Availability</span>
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                     <ul>
                        <li><strong>1 night</strong> minimum stay</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li><a href="#">View Calendar</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
        <div class="clearfix"></div> 
    </div>
<div class="clearfix"></div>  
</div>
<?php
}
/**
 * EndCustomize Description tab to display in product details page
 */

/**
 * Custom Js code 
 */
function js_code()
{ ?>
<script> 
jQuery(document).ready(function(){
    jQuery(".expandable-trigger-more").click(function(){
        jQuery(".expandable-content-summary").slideUp("slow");
        jQuery(".expandable-content-full").slideDown("slow");
    });
    jQuery(".product-long-details .the-description .expandable-desc-more").click(function(){
        jQuery(".product-long-details .the-description .react-expandable").addClass('expanded');
        jQuery(".product-long-details .the-description .expandable-content").slideDown("slow");
    });
    jQuery(".btn-house").click(function(e) {
        e.preventDefault();
    jQuery('html, body').animate({
        scrollTop: jQuery("#house_rules").offset().top - 120
    }, 1500);
});
});
</script>    
<?php }
add_action('wp_footer','js_code');

/**
	 * Add Meta box in Boat post
	 *
	 * @since  1.0.0
	 */
function product_post_add_metabox() {
    add_meta_box(
    'boat-meta-fieldx',
    __( 'Product Information', 'rightboat' ),
   'add_product_metaboxes',
    'product',
    'normal',
    'default'               
    );
}
add_action( 'add_meta_boxes', 'product_post_add_metabox' );

function add_product_metaboxes() {
     global $post;
              $post_id = $post->ID;
              $custom_box = get_post_meta( $post_id, 'product_meta_data',true);
			  
              if ( !is_array($custom_box) ){
				$custom_box = array();
			  }
    include_once 'product-meta-field.php';
}
function product_post_save_metabox_data(){
    global $post;
		
		if($post != null){
			$post_id =  $post->ID;
		}
    $post_type = get_post_type($post_id);
	if($post != null){
            $post_id =  $post->ID;
	}
    if ( "product" != $post_type ) return;    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}   
    
    update_post_meta( $post_id, 'product_meta_data',$_POST['list_data'] );            
}
add_action( 'save_post', 'product_post_save_metabox_data', 10, 3 );