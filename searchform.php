<form role="search" method="get" class="searchform" id="searchform-<?php echo esc_attr(rand(0, 1000)); ?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'arabesque' ); ?></label>
	<div class="input-holder clearfix">
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Type your search', 'arabesque' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'arabesque' ); ?>"/>
		<button type="submit" class="mkdf-search-submit">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="22px" height="22px" viewBox="0 0 22 22" enable-background="new 0 0 22 22" xml:space="preserve">
                        <path d="M15.389,14.544c1.105-1.307,1.777-2.994,1.777-4.836c0-4.136-3.365-7.5-7.5-7.5c-4.136,0-7.5,3.364-7.5,7.5
	c0,4.137,3.365,7.5,7.5,7.5c1.934,0,3.693-0.742,5.025-1.947l5.305,4.926l0.682-0.732L15.389,14.544z M9.667,16.208
	c-3.584,0-6.5-2.917-6.5-6.5c0-3.584,2.916-6.5,6.5-6.5c3.584,0,6.5,2.916,6.5,6.5C16.167,13.292,13.25,16.208,9.667,16.208z"></path>
                    </svg>
        </button>
	</div>
</form>