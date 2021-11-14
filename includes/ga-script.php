<?php
// Include the Google Analytics Tracking Code (ga.js)
// @ https://developers.google.com/analytics/devguides/collection/gajs/
function google_analytics_tracking_code(){

    $options = get_option( 'gadashboard_settings' );

    $propertyID = '';
    
	if( isset( $options[ 'ga_id' ] ) ) {
		$propertyID = esc_html( $options['ga_id'] );
	}

?>
		<script type="text/javascript">
          
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', '<?php echo $propertyID; ?>');

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.www.googletagmanager.com/gtag/js?id=<?php echo $propertyID; ?>';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>

<?php
}

// include GA tracking code before the closing head tag
add_action('wp_head', 'google_analytics_tracking_code');
