<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
	<div class="mkdf-post-content">
		<div class="mkdf-post-text">
			<div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
                    <div class="mkdf-post-mark">
                        <span class="mkdf-testimonials-icon">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                 width="41.901px" height="41.6px" viewBox="0 0 41.901 41.6" enable-background="new 0 0 41.901 41.6" xml:space="preserve">
                            <g>
                                <path fill="#010101" d="M10.65,30.8c1.165,1.2,1.75,2.734,1.75,4.6c0,1.8-0.55,3.284-1.65,4.45C9.65,41.017,8.2,41.6,6.4,41.6
                                    c-2,0-3.567-0.683-4.7-2.05C0.565,38.184,0,36.066,0,33.199C0,22.267,2.266,11.199,6.8,0h4.4C9.4,5.8,8.016,10.984,7.05,15.55
                                    C6.083,20.117,5.533,24.6,5.4,29h0.8C8,29,9.483,29.6,10.65,30.8z M40.151,30.8c1.164,1.2,1.75,2.734,1.75,4.6
                                    c0,1.8-0.551,3.284-1.65,4.45c-1.1,1.167-2.551,1.75-4.35,1.75c-2,0-3.568-0.683-4.701-2.05c-1.135-1.366-1.699-3.483-1.699-6.351
                                    c0-10.933,2.266-22,6.799-33.199h4.4c-1.799,5.8-3.184,10.984-4.15,15.55c-0.967,4.567-1.516,9.05-1.648,13.45H35.7
                                    C37.5,29,38.983,29.6,40.151,30.8z"/>
                            </g>
                            </svg>
                        </span>
                    </div>
                    <?php arabesque_mikado_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                </div>
			</div>
		</div>
	</div>
</article>