<?php
    use Illuminate\Support\Facades\Session;

	if ( ! function_exists('asset_admin') )
		{
			function asset_admin($path) {
				return asset('assets/'.ltrim($path, '/'));
			}
		}
			
            
?>