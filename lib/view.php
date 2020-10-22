<?php
/*  Copyright 2013-2020 Renzo Johnson (email: renzojohnson at gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

global $wpdb;

function vc_cme_utm() {

  global $wpdb;

  $utms  = '?utm_source=CmpgnMonitor';
  $utms .= '&utm_campaign=w' . get_bloginfo( 'version' ) .'c' . WPCF7_VERSION . ( defined( 'WPLANG' ) && WPLANG ? WPLANG : 'en_US' ) . '';
  $utms .= '&utm_medium=cme-' . SPARTAN_CME_VERSION . '';
  $utms .= '&utm_term=F' . ini_get( 'allow_url_fopen' ) . 'C' . ( function_exists( 'curl_init' ) ? '1' : '0' ) . 'P' . PHP_VERSION . 'S' . $wpdb->db_version() . '';
  // $utms .= '&utm_content=';

  return $utms;

}

?>




<h2>Cmpgn Monitor <span class="mc-code"><?php echo SPARTAN_CME_VERSION . '.' . ini_get( 'allow_url_fopen' ) . '.' . ( function_exists( 'curl_init' ) ? '1' : '0' ) . '.' . WPCF7_VERSION . '.' . get_bloginfo( 'version' ) . '.' . PHP_VERSION . '.' . $wpdb->db_version() ?></span></h2>

<div class="cme-main-fields">

   <input type="hidden" id="cme_txtcomodin" name="wpcf7-campaignmonitor[cme_txtcomodin]" value="<?php echo( isset( $cme_txcomodin ) ) ? esc_textarea( $cme_txcomodin ) : ''; ?>" style="width:0%;" />

  <p class="mail-field">
    <label for="wpcf7-campaignmonitor-api"><?php echo esc_html( __( 'Client API Key:', 'wpcf7' ) ); ?> </label><br />
    <input type="text" id="wpcf7-campaignmonitor-api" name="wpcf7-campaignmonitor[api]" class="wide" size="70" placeholder=" " value="<?php echo (isset($cf7_cm['api']) ) ? esc_attr( $cf7_cm['api'] ) : ''; ?>" />
    <small class="description">512a2673a8fc4e588499e82e2d43680d100a824e8ba55394 <-- A number like this <a href="<?php echo CME_URL . vc_cme_utm() ?>" class="helping-field" target="_blank" title="get help with MailChimp API Key:"> Get more help <span class="red-icon dashicons dashicons-admin-links"></span></a></small>
  </p>

  <p class="mail-field">
    <label for="wpcf7-campaignmonitor-list"><?php echo esc_html( __( 'API Subscriber List ID:', 'wpcf7' ) ); ?> </label><br />
    <input type="text" id="wpcf7-campaignmonitor-list" name="wpcf7-campaignmonitor[list]" class="wide" size="70" placeholder=" " value="<?php echo (isset( $cf7_cm['list']) ) ?  esc_attr( $cf7_cm['list']) : '' ; ?>" />
    <small class="description">aadc9ca0b08c83fbb714490354463186 <-- A number like this <a href="<?php echo CME_URL . vc_cme_utm() ?>" class="helping-field" target="_blank" title="get help with MailChimp List ID:"> Get more help <span class="red-icon dashicons dashicons-admin-links"></span></a></small>
  </p>

  <p class="mail-field">
    <label for="wpcf7-campaignmonitor-email"><?php echo esc_html( __( 'Subscriber Email:', 'wpcf7' ) ); ?>  </label><br />
    <input type="text" id="wpcf7-campaignmonitor-email" name="wpcf7-campaignmonitor[email]" class="wide" size="70" placeholder=" " value="<?php echo (isset ( $cf7_cm['email'] ) ) ? esc_attr( $cf7_cm['email'] ) : ''; ?>" />
    <small class="description"><?php echo cme_mail_tags(); ?> <-- you can use these mail-tags <a href="<?php echo CME_URL . vc_cme_utm() ?>" class="helping-field" target="_blank" title="get help with Subscriber name:"> Get more help <span class="red-icon dashicons dashicons-admin-links"></span></a></small>
  </p>

  <p class="mail-field">
    <label for="wpcf7-campaignmonitor-name"><?php echo esc_html( __( 'Subscriber Name:', 'wpcf7' ) ); ?>  </label><br />
    <input type="text" id="wpcf7-campaignmonitor-name" name="wpcf7-campaignmonitor[name]" class="wide" size="70" placeholder=" " value="<?php echo (isset ($cf7_cm['name'] ) ) ? esc_attr( $cf7_cm['name'] ) : '' ; ?>" />
    <small class="description"><?php echo cme_mail_tags(); ?> <-- you can use these mail-tags <a href="<?php echo CME_URL . vc_cme_utm() ?>" class="helping-field" target="_blank" title="get help with Subscriber Email:"> Get more help <span class="red-icon dashicons dashicons-admin-links"></span></a></small>
  </p>



  <div class="cme-container cme-support" style="display:none">

      <div class="campaignmonitor-custom-fields">
       <p>In the following fields, you can use these mail-tags: <?php echo cme_mail_tags(); ?></p>

       <div>
        <?php for($i=1;$i<=13;$i++){ ?>

        <div class="col-6">
            <label for="wpcf7-campaignmonitor-CustomValue<?php echo $i; ?>"><?php echo esc_html( __( 'Contact form mail-tag '.$i.':', 'wpcf7' ) ); ?></label><br />
            <input type="text" id="wpcf7-campaignmonitor-CustomValue<?php echo $i; ?>" name="wpcf7-campaignmonitor[CustomValue<?php echo $i; ?>]" class="wide" size="70" placeholder="[your-mail-tag]" value="<?php echo (isset( $cf7_cm['CustomValue'.$i]) ) ?  esc_attr( $cf7_cm['CustomValue'.$i]) : '' ;  ?>" />
        </div>


        <div class="col-6">
          <label for="wpcf7-campaignmonitor-CustomKey<?php echo $i; ?>"><?php echo esc_html( __( 'Campaignmonitor Custom Field Name '.$i.':', 'wpcf7' ) ); ?></label><br />
          <input type="text" id="wpcf7-campaignmonitor-CustomKey<?php echo $i; ?>" name="wpcf7-campaignmonitor[CustomKey<?php echo $i; ?>]" class="wide" size="70" placeholder="example-field" value="<?php echo (isset( $cf7_cm['CustomKey'.$i]) ) ?  esc_attr( $cf7_cm['CustomKey'.$i]) : '' ;  ?>" />
        </div>

        <?php } ?>

        </div>
      </div>

        <?php include SPARTAN_CME_PLUGIN_DIR . '/lib/xin.php'; ?>

  </div>



   <div class="">
  <p class="p-author"><a type="button" aria-expanded="false" class="cme-trigger a-support ">Show Advanced Settings</a> &nbsp; <a class="cpe-trigger-sys a-support ">Get System Information</a> &nbsp; <a class="cpe-trigger-log a-support ">View Debug Logger</a></p>
  </div>


  <?php include SPARTAN_CME_PLUGIN_DIR . '/lib/system.php'; ?>
  <?php  echo cme_html_log_view() ; ?>


    <div class="dev-cta cme-cta welcome-panel" style="display: none;">

    <div class="welcome-panel-content">
    <p>Hello. My name is Renzo, I <span alt="f487" class="dashicons dashicons-heart red-icon"> </span> WordPress and I develop this FREE plugin to help users like you. I drink copious amounts of coffee to keep me running longer <span alt="f487" class="dashicons dashicons-smiley red-icon"> </span>. If you've found this plugin useful, please consider making a donation.</p>
    <p>Would you like to <a class="button-primary" href="<?php echo CME_DON ?>" target="_blank">buy me a coffee?</a></p>

    </div>

    </div>



</div>

