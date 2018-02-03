<!-- Scripts que devem ser incluidas (dependências base) -->
	<script src="{{ asset('libs/js/jquery-2.2.4.min.js') }}"></script>
	<script src="{{ asset('libs/js/common_scripts.min.js') }}"></script>
	<script src="{{ asset('libs/js/functions.js') }}"></script>
	<script>
		$( document ).ready(function() {
		    $('.mm-navbar').find('a').html('© 2017 Wote - Juntos pela Música');
		    $('.mm-title').html('MENU WOTE');
		});
		
	</script>

	<script src="{{ asset('libs/js/jquery.cookiebar.js') }}"></script>
	<script>
		$(document).ready(function(){
		'use strict';
		 $.cookieBar({
			fixed: true
		});
		});
	</script>
