<?php
/*
 * This file is used for displaying dashboard widget.
 *
 * @author   Tech Banker
 * @package  gallery-bank/lib
 * @version  4.0.15
 */
function get_count_of_data_gallery_bank($type) {
   global $wpdb;
   $gb_total_data_count = $wpdb->get_var
       (
       $wpdb->prepare
           (
           "SELECT count(meta_id) FROM " . gallery_bank_meta() . " WHERE meta_key = %s", $type
       )
   );
   return $gb_total_data_count;
}
?>
<style>
   .gb-statistics-list {
      overflow: hidden;
      margin: 0;
      margin-top: -12px !important;
   }
   .gb-statistics-list li.gb-upgrade-now {
      width: 100%;
      margin-bottom: -10px;
   }
   .gb-gallery-data,.gb-images-data{
      border-top: 0px !important;
   }
   .gb-statistics-list li a:hover {
      color: #2ea2cc;
   }
   .gb-statistics-list li a {
      display: block;
      color: #aaa;
      padding: 9px 12px;
      -webkit-transition: all ease .5s;
      transition: all ease .5s;
      position: relative;
      font-size: 12px;
   }
   .gb-statistics-list li {
      width: 50%;
      float: left;
      padding: 0;
      box-sizing: border-box;
      margin: 0;
      border-top: 1px solid #ececec;
      color: #aaa;
   }
   .gb-statistics-list li.gb-images-data {
      border-right: 1px solid #ececec;
   }
   .gb-statistics-list li a strong {
      font-size: 18px;
      line-height: 1.2em;
      font-weight: 400;
      display: block;
      color: #21759b;
   }
   .gb-statistics-list li.gb-upgrade-now a::before {
      font-family: Dashicons;
      content: "\f132";
   }
   .gb-statistics-list li a::before {
      font-family: WooCommerce;
      speak: none;
      font-weight: 400;
      font-variant: normal;
      text-transform: none;
      line-height: 1;
      -webkit-font-smoothing: antialiased;
      margin: 0;
      text-indent: 0;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      text-align: center;
      content: "";
      font-size: 2em;
      position: relative;
      width: auto;
      line-height: 1.2em;
      color: #464646;
      float: left;
      margin-right: 12px;
      margin-bottom: 12px;
   }
   .gb-statistics-list li.gb-images-data a::before {
      font-family: Dashicons;
      content: "\f128";
   }
   .gb-statistics-list li.gb-gallery-data a::before {
      font-family: Dashicons;
      content: "\f161";
   }
</style>
<ul class="gb-statistics-list">			
   <li class="gb-images-data">
      <a href="admin.php?page=gallery_bank">
         <strong><?php echo get_count_of_data_gallery_bank("image_data"); ?> Images</strong>		
      </a>
   </li>
   <li class="gb-gallery-data">
      <a href="admin.php?page=gallery_bank">
         <strong><?php echo get_count_of_data_gallery_bank("gallery_data"); ?> Galleries</strong>			
      </a>
   </li>
   <li class="gb-upgrade-now">
      <a href="http://gallery-bank.tech-banker.com/">
         <strong>Upgrade Now to Premium Editions</strong>
      </a>
   </li>
</ul>

