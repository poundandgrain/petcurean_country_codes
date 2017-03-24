<?php
class Country_Code_Command extends WP_CLI_Command {
	function __invoke(){

		// url of the international site is needed for the command to work. 
		$response = wp_remote_get('https://petcurean.international/wp-json/pecturean/v1/regions/');
		if( is_array($response) ) {
			$body = $response['body'];
			$langs = json_decode( $body );
			update_option( 'int_country_codes', $langs );
		}

		// Print a success message
		WP_CLI::success( "Country Codes have been saved" );

	}

}

WP_CLI::add_command( 'get_country_codes', 'Country_Code_Command' );
