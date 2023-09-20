 # 100-days
 
 
<?php
/**
 * Plugin Name: Go Maps Data Exporter
 * Description: A WordPress plugin to download data from specific database tables with suffixes.
 * Version: 1.0.0
 * Author: flippercode
 * Text Domain: go-maps-data-exporter
 * Domain Path: /lang/
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( 'You are not allowed to call this page directly.' );
}
if ( ! class_exists( 'GO_Maps_Data_Exporter' ) ) {


        class GO_Maps_Data_Exporter
        {
            private $wpgmp_data = array();

            public function __construct()
            {
                add_action('admin_menu', array($this, 'register_migration_go_maps_free_menu'));
            }

            public function register_migration_go_maps_free_menu()
            {
                add_menu_page(
                    'Migration Go Maps Free',
                    'Migration Go Maps Free',
                    'manage_options',
                    'migration-go-maps-free',
                    array($this, 'migration_go_maps_free_page')
                );
            }

            public function migration_go_maps_free_page()
            {
                echo '<div class="wrap">';
                echo '<h1>' . esc_html__('Migration Go Maps Free', 'migration-go-maps-free') . '</h1>';
                echo '<p>' . esc_html__('Data from specific database tables:', 'migration-go-maps-free') . '</p>';

                echo '<form method="post" action="">';
                echo '<input type="hidden" name="download_data" value="1" />';

                echo '<p><input type="submit" class="button button-primary" value="' . esc_html__('Fetch Data', 'migration-go-maps-free') . '" /></p>';
                echo '</form>';

                // Hidden link to trigger download
                echo '<a id="download-link" style="display: none;"></a>';

                echo '</div>';
            }
            public function fetch_data()
            {
                global $wpdb;

                $tableMappings = [
                    'wp_wpgmza' => 'location',
                    'wp_wpgmza_maps' => 'map',
                ];
            
                foreach ($tableMappings as $tableName => $keyName) {
                    $results = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$tableName}"));
            
                    if (!empty($results)) {
                        $propertyMappings = $this->getPropertyMappings($tableName);
            
                        $transformedResults = $this->transformDataForTable($results, $propertyMappings, $tableName);
            
                        $this->wpgmp_data[$keyName] = $transformedResults;
                    }
                }
            }
            
            private function getPropertyMappings($tableName)
            {
                // Define and return property mappings for each table
                $propertyMappings = [];
            
                if ($tableName === 'wp_wpgmza') {
                    $propertyMappings = [
                        'id'=>'location_id',
                        'address' => ['location_title', 'location_address'],
                        'lat' => 'location_latitude',
                        'lng' => 'location_longitude',
                    ];
                } elseif ($tableName === 'wp_wpgmza_maps') {
                    $propertyMappings = [
                        'id'=>'map_id',
                        'map_title' => 'map_title',
                        'map_height' => 'map_height',
                        'map_start_zoom' => 'map_zoom_level',
                    ];
                }
            
                return $propertyMappings;
            }
            
            private function transformDataForTable($results, $propertyMappings, $tableName)
            {
                // Transformation logic here
                $transformedResult = [];
            
                foreach ($results as $result) {
                    $transformed_result = new stdClass();
            
                    foreach ($propertyMappings as $oldProperty => $newProperty) {
                        if (isset($result->$oldProperty)) {
                            if (is_array($newProperty)) {
                                foreach ($newProperty as $newProp) {
                                    $transformed_result->$newProp = $result->$oldProperty;
                                }
                            } else {
                                $transformed_result->$newProperty = $result->$oldProperty;
                            }
                        }
                    }
                    if ($tableName === 'wp_wpgmza') {
                        // You can add more custom properties here if needed
                        $transformed_result->location_draggable = '';
                        $transformed_result->location_infowindow_default_open = '';
                        $transformed_result->location_animation = '';
                        $transformed_result->location_city = '';
                        $transformed_result->location_state ='';
                        $transformed_result->location_country = '';
                        $transformed_result->location_postal_code = '';
                        $transformed_result->location_author = '';
                        $transformed_result->location_messages = 'This is sample description about the location.';
                    
                        // Handle the location_settings and location_group_map arrays as needed
                        $transformed_result->location_settings = [
                            'onclick' => 'marker',
                            'redirect_link' => '',
                            'redirect_link_window' => 'yes',
                            'featured_image' => ''
                        ];
                        $transformed_result->location_group_map[] = ''; // Add 'value1' to the array

                        // You can add more custom properties here if needed
                    
                        // For location_extrafields, if it's an array, you can copy it directly
                        $transformed_result->location_extrafields = '';

                    
                    }
                    if ($tableName === 'wp_wpgmza_maps') {
                        // You can add more custom properties here if needed
                        $transformed_result->map_width = '';
                        $transformed_result->map_type = 'ROADMAP';
                        $transformed_result->map_scrolling_wheel = 'false';
                        $transformed_result->map_visual_refresh = '';
                        $transformed_result->map_45imagery = '';
                        $transformed_result->map_street_view_setting ='a:2:{s:11:"pov_heading";s:0:"";s:9:"pov_pitch";s:0:"";}';
                        $transformed_result->map_route_direction_setting = 'a:1:{s:15:"route_direction";s:5:"false";}';
                        $transformed_result->map_all_control = 'a:87:{s:17:"map_minzoom_level";s:1:"0";s:17:"map_maxzoom_level";s:2:"19";s:23:"zoom_level_after_search";s:2:"10";s:7:"gesture";s:4:"auto";s:7:"screens";a:3:{s:11:"smartphones";a:3:{s:16:"map_width_mobile";s:0:"";s:17:"map_height_mobile";s:0:"";s:21:"map_zoom_level_mobile";s:1:"5";}s:5:"ipads";a:3:{s:16:"map_width_mobile";s:0:"";s:17:"map_height_mobile";s:0:"";s:21:"map_zoom_level_mobile";s:1:"5";}s:13:"large-screens";a:3:{s:16:"map_width_mobile";s:0:"";s:17:"map_height_mobile";s:0:"";s:21:"map_zoom_level_mobile";s:1:"5";}}s:19:"map_center_latitude";s:0:"";s:20:"map_center_longitude";s:0:"";s:23:"center_circle_fillcolor";s:7:"#8CAEF2";s:25:"center_circle_fillopacity";s:2:".5";s:25:"center_circle_strokecolor";s:7:"#8CAEF2";s:27:"center_circle_strokeopacity";s:2:".5";s:26:"center_circle_strokeweight";s:0:"";s:20:"center_circle_radius";s:0:"";s:29:"show_center_marker_infowindow";s:0:"";s:18:"marker_center_icon";s:105:"http://localhost/wordpress/custom/wp-content/plugins/wp-google-map-gold/assets/images//default_marker.png";s:19:"gm_radius_dimension";s:5:"miles";s:9:"gm_radius";s:0:"";s:21:"zoom_control_position";s:8:"TOP_LEFT";s:18:"zoom_control_style";s:5:"LARGE";s:25:"map_type_control_position";s:9:"TOP_RIGHT";s:22:"map_type_control_style";s:14:"HORIZONTAL_BAR";s:28:"full_screen_control_position";s:9:"TOP_RIGHT";s:28:"street_view_control_position";s:8:"TOP_LEFT";s:23:"search_control_position";s:8:"TOP_LEFT";s:25:"locateme_control_position";s:8:"TOP_LEFT";s:20:"map_control_settings";a:0:{}s:21:"infowindow_openoption";s:5:"click";s:19:"marker_default_icon";s:105:"http://localhost/wordpress/custom/wp-content/plugins/wp-google-map-gold/assets/images//default_marker.png";s:27:"infowindow_bounce_animation";s:0:"";s:20:"infowindow_zoomlevel";s:0:"";s:16:"infowindow_width";s:0:"";s:23:"infowindow_border_color";s:1:"#";s:24:"infowindow_border_radius";s:0:"";s:19:"infowindow_bg_color";s:1:"#";s:24:"location_infowindow_skin";a:3:{s:4:"name";s:7:"default";s:4:"type";s:10:"infowindow";s:10:"sourcecode";s:365:"<div class="fc-main"><div class="fc-item-title">{marker_title} <span class="fc-badge info">{marker_category}</span></div> <div class="fc-item-featured_image">{marker_image} </div>{marker_message}<address><b>Address : </b>{marker_address}</address></div>";}s:20:"post_infowindow_skin";a:3:{s:4:"name";s:7:"default";s:4:"type";s:4:"post";s:10:"sourcecode";s:504:"<div class="fc-main"><div class="fc-item-title">{post_title} <span class="fc-badge info">{post_categories}</span></div> <div class="fc-item-featured_image">{post_featured_image} </div>{post_excerpt}<address><b>Address : </b>{marker_address}</address><a target="_blank"  class="fc-btn fc-btn-small fc-btn-red" href="{post_link}">Read More...</a></div>";}s:20:"wpgmp_acf_field_name";s:0:"";s:12:"custom_style";s:0:"";s:13:"from_latitude";s:0:"";s:14:"from_longitude";s:0:"";s:11:"to_latitude";s:0:"";s:12:"to_longitude";s:0:"";s:10:"zoom_level";s:0:"";s:24:"wpgmp_category_tab_title";s:0:"";s:20:"wpgmp_category_order";s:5:"title";s:34:"wpgmp_category_location_sort_order";s:3:"asc";s:25:"wpgmp_direction_tab_title";s:0:"";s:19:"wpgmp_unit_selected";s:2:"km";s:25:"wpgmp_direction_tab_start";s:7:"textbox";s:33:"wpgmp_direction_tab_start_default";s:0:"";s:23:"wpgmp_direction_tab_end";s:7:"textbox";s:31:"wpgmp_direction_tab_end_default";s:0:"";s:22:"wpgmp_nearby_tab_title";s:0:"";s:23:"nearby_circle_fillcolor";s:7:"#8CAEF2";s:25:"nearby_circle_fillopacity";s:0:"";s:25:"nearby_circle_strokecolor";s:7:"#8CAEF2";s:27:"nearby_circle_strokeopacity";s:0:"";s:26:"nearby_circle_strokeweight";s:0:"";s:18:"nearby_circle_zoom";s:1:"8";s:21:"wpgmp_route_tab_title";s:0:"";s:14:"custom_filters";a:0:{}s:21:"map_reset_button_text";s:5:"Reset";s:27:"wpgmp_searchbar_placeholder";s:0:"";s:25:"wpgmp_search_placeholders";s:0:"";s:26:"wpgmp_exclude_placeholders";s:0:"";s:26:"wpgmp_category_placeholder";s:0:"";s:22:"wpgmp_radius_dimension";s:5:"miles";s:20:"wpgmp_radius_options";s:0:"";s:20:"wpgmp_listing_number";s:2:"10";s:20:"wpgmp_before_listing";s:17:"Locations Listing";s:15:"wpgmp_list_grid";s:18:"wpgmp_listing_list";s:25:"wpgmp_categorydisplaysort";s:5:"title";s:27:"wpgmp_categorydisplaysortby";s:3:"asc";s:20:"wpgmp_default_radius";s:0:"";s:30:"wpgmp_default_radius_dimension";s:5:"miles";s:9:"item_skin";a:3:{s:4:"name";s:7:"default";s:4:"type";s:4:"item";s:10:"sourcecode";s:662:"<div class="wpgmp_locations">
        <div class="wpgmp_locations_head">
        <div class="wpgmp_location_title">
        <a href="" class="place_title" data-zoom="{marker_zoom}" data-marker="{marker_id}">{marker_title}</a>
        </div>
        <div class="wpgmp_location_meta">
        <span class="wpgmp_location_category fc-badge info">{marker_category}</span>
        </div>
        </div>
        <div class="wpgmp_locations_content">
        {marker_message}
        </div>
        <div class="wpgmp_locations_foot"></div>
        </div>";}s:16:"filters_position";s:7:"default";s:11:"geojson_url";s:0:"";s:16:"wpgmp_custom_css";s:0:"";s:20:"wpgmp_base_font_size";s:0:"";s:19:"wpgmp_primary_color";s:1:"#";s:21:"wpgmp_secondary_color";s:1:"#";s:16:"fc_custom_styles";s:3025:"{"0":{"infowindow-default":{"fc-item-title":"background-image:none;font-family:Montserrat, sans-serif;font-weight:700;font-size:16px;color:rgb(68, 68, 68);line-height:21.4286px;background-color:rgba(0, 0, 0, 0);font-style:normal;text-align:start;text-decoration:none solid rgb(68, 68, 68);margin-top:0px;margin-bottom:5px;margin-left:0px;margin-right:0px;padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;"}},"1":{"post-default":{"fc-item-title":"background-image:none;font-family:Montserrat, sans-serif;font-weight:600;font-size:18px;color:rgb(33, 47, 61);line-height:21.4286px;background-color:rgba(0, 0, 0, 0);font-style:normal;text-align:start;text-decoration:none solid rgb(33, 47, 61);margin-top:0px;margin-bottom:5px;margin-left:0px;margin-right:0px;padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;"}},"2":{"item-default":{"wpgmp_locations":"background-image:none;font-family:Montserrat, sans-serif;font-weight:400;font-size:15px;color:rgba(0, 0, 0, 0.87);line-height:21.4286px;background-color:rgba(0, 0, 0, 0);font-style:normal;text-align:start;text-decoration:none solid rgba(0, 0, 0, 0.87);margin-top:0px;margin-bottom:0px;margin-left:0px;margin-right:0px;padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;"}},"3":{"item-default":{"wpgmp_locations_head":"background-image:none;font-family:Montserrat, sans-serif;font-weight:400;font-size:15px;color:rgba(0, 0, 0, 0.87);line-height:21.4286px;background-color:rgba(0, 0, 0, 0);font-style:normal;text-align:start;text-decoration:none solid rgba(0, 0, 0, 0.87);margin-top:0px;margin-bottom:0px;margin-left:0px;margin-right:0px;padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;"}},"4":{"item-default":{"place_title":"background-image:none;font-family:Montserrat, sans-serif;font-weight:400;font-size:15px;color:rgb(34, 113, 177);line-height:21.4286px;background-color:rgba(0, 0, 0, 0);font-style:normal;text-align:start;text-decoration:underline solid rgb(34, 113, 177);margin-top:0px;margin-bottom:0px;margin-left:0px;margin-right:0px;padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;"}},"5":{"item-default":{"wpgmp_location_meta":"background-image:none;font-family:Montserrat, sans-serif;font-weight:400;font-size:15px;color:rgba(0, 0, 0, 0.87);line-height:21.4286px;background-color:rgba(0, 0, 0, 0);font-style:normal;text-align:start;text-decoration:none solid rgba(0, 0, 0, 0.87);margin-top:0px;margin-bottom:0px;margin-left:0px;margin-right:0px;padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;"}},"6":{"item-default":{"wpgmp_locations_content":"background-image:none;font-family:Montserrat, sans-serif;font-weight:400;font-size:15px;color:rgba(0, 0, 0, 0.87);line-height:21.4286px;background-color:rgba(0, 0, 0, 0);font-style:normal;text-align:start;text-decoration:none solid rgba(0, 0, 0, 0.87);margin-top:0px;margin-bottom:0px;margin-left:0px;margin-right:0px;padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;"}}}";s:29:"map_marker_spiderfier_setting";a:1:{s:15:"minimum_markers";s:1:"0";}s:18:"infowindow_setting";s:365:"<div class="fc-main"><div class="fc-item-title">{marker_title} <span class="fc-badge info">{marker_category}</span></div> <div class="fc-item-featured_image">{marker_image} </div>{marker_message}<address><b>Address : </b>{marker_address}</address></div>";s:26:"infowindow_geotags_setting";s:504:"<div class="fc-main"><div class="fc-item-title">{post_title} <span class="fc-badge info">{post_categories}</span></div> <div class="fc-item-featured_image">{post_featured_image} </div>{post_excerpt}<address><b>Address : </b>{marker_address}</address><a target="_blank"  class="fc-btn fc-btn-small fc-btn-red" href="{post_link}">Read More...</a></div>";s:27:"wpgmp_categorydisplayformat";s:662:"<div class="wpgmp_locations">
        <div class="wpgmp_locations_head">
        <div class="wpgmp_location_title">
        <a href="" class="place_title" data-zoom="{marker_zoom}" data-marker="{marker_id}">{marker_title}</a>
        </div>
        <div class="wpgmp_location_meta">
        <span class="wpgmp_location_category fc-badge info">{marker_category}</span>
        </div>
        </div>
        <div class="wpgmp_locations_content">
        {marker_message}
        </div>
        <div class="wpgmp_locations_foot"></div>
        </div>";}';
                        $transformed_result->map_info_window_setting = '';
                        $transformed_result->style_google_map = 'a:4:{s:14:"mapfeaturetype";a:10:{i:0;s:20:"Select Featured Type";i:1;s:20:"Select Featured Type";i:2;s:20:"Select Featured Type";i:3;s:20:"Select Featured Type";i:4;s:20:"Select Featured Type";i:5;s:20:"Select Featured Type";i:6;s:20:"Select Featured Type";i:7;s:20:"Select Featured Type";i:8;s:20:"Select Featured Type";i:9;s:20:"Select Featured Type";}s:14:"mapelementtype";a:10:{i:0;s:19:"Select Element Type";i:1;s:19:"Select Element Type";i:2;s:19:"Select Element Type";i:3;s:19:"Select Element Type";i:4;s:19:"Select Element Type";i:5;s:19:"Select Element Type";i:6;s:19:"Select Element Type";i:7;s:19:"Select Element Type";i:8;s:19:"Select Element Type";i:9;s:19:"Select Element Type";}s:5:"color";a:10:{i:0;s:1:"#";i:1;s:1:"#";i:2;s:1:"#";i:3;s:1:"#";i:4;s:1:"#";i:5;s:1:"#";i:6;s:1:"#";i:7;s:1:"#";i:8;s:1:"#";i:9;s:1:"#";}s:10:"visibility";a:10:{i:0;s:2:"on";i:1;s:2:"on";i:2;s:2:"on";i:3;s:2:"on";i:4;s:2:"on";i:5;s:2:"on";i:6;s:2:"on";i:7;s:2:"on";i:8;s:2:"on";i:9;s:2:"on";}}
                        ';
                        $transformed_result->map_locations = 'a:0:{}';
                        $transformed_result->map_layer_setting = 'a:1:{s:9:"map_links";s:0:"";}';
                        $transformed_result->map_polygon_setting = '';
                        $transformed_result->map_polyline_setting = '';
                        $transformed_result->map_cluster_setting = 'a:5:{s:4:"grid";s:0:"";s:8:"max_zoom";s:1:"1";s:13:"location_zoom";s:2:"10";s:4:"icon";s:5:"4.png";s:10:"hover_icon";s:5:"4.png";}';
                        $transformed_result->map_overlay_setting = 'a:6:{s:20:"overlay_border_color";s:1:"#";s:13:"overlay_width";s:0:"";s:14:"overlay_height";s:0:"";s:16:"overlay_fontsize";s:0:"";s:20:"overlay_border_width";s:0:"";s:20:"overlay_border_style";s:6:"dotted";}
                        ';
                        $transformed_result->map_geotags = 'a:1:{s:4:"post";a:4:{s:7:"address";s:0:"";s:8:"latitude";s:0:"";s:9:"longitude";s:0:"";s:8:"category";s:0:"";}}
                        ';
                        $transformed_result->map_infowindow_setting = '';

                    
                    }
            
                    $transformedResult[] = $transformed_result;
                }
            
                return $transformedResult;
            }
            function getMapIdDataFromCustomTable($table_data_array) {
                global $wpdb;
            
                $table_name = $wpdb->prefix . 'wpgmza';
            
                $query = $wpdb->prepare(
                    "SELECT map_id, GROUP_CONCAT(id) AS id_list FROM $table_name GROUP BY map_id"
                );
            
                $results = $wpdb->get_results($query);
            
                $mapIdData = [];
            
                foreach ($results as $row) {
                    $mapId = $row->map_id;
                    $idList = explode(',', $row->id_list);
                    $mapIdData[$mapId] = $idList;
                }
            
                foreach ($table_data_array['map'] as &$mapItem) {
                    $map_id = $mapItem->map_id;
            
                    if (isset($mapIdData[$map_id])) {
                        $mapItem->map_locations = serialize($mapIdData[$map_id]);
                    }
                }
            
                return $table_data_array;
            }
            

            
            public function download_data()
            {
                $this->fetch_data();
                $table_data_array = array();

                foreach ($this->wpgmp_data as $table_name => $table_data) {
                    if (!empty($table_data)) {
                        $table_data_array[$table_name] = $table_data;
                    }
                }
                $table_data_array =  $this->getMapIdDataFromCustomTable($table_data_array);
                $serialized_data = serialize($table_data_array);
                $base64_encoded_data = base64_encode($serialized_data);

                header('Content-type: application/txt; charset=utf-8');
                header('Content-Disposition: attachment; filename="wpgmp_database_'.time().'.txt"');
                echo $base64_encoded_data;
                exit; 
            }
        }


return new GO_Maps_Data_Exporter();

}

// Instantiate the plugin class
$plugin_instance = new GO_Maps_Data_Exporter();

// Hook to handle data download when the form is submitted
add_action('admin_init', 'download_data_hook');

function download_data_hook() {
    if (isset($_POST['download_data']) && $_POST['download_data'] == '1') {
        global $plugin_instance;
        $plugin_instance->download_data();
    }
}


