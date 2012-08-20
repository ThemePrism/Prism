<?php
/**
 * Footer Template
 *
 * This template closes #main div and displays the #footer div.
 * 
 * Prism Action Hooks: prism_abovefooter prism_belowfooter prism_after
 * Prism Filters: prism_close_wrapper can be used to remove the closing of the #wrapper div
 * 
 * @package Prism
 * @subpackage Templates
 */
?>
		<?php // action hook for placing content above the closing of the #main div
			prism_abovemainclose();
		?>
		
		</div><!-- #main -->
    	
    	<?php
			// action hook for placing content above the footer
			prism_abovefooter();
		
			// Filter provided for altering output of the footer opening element
    		echo ( apply_filters( 'prism_open_footer', '<div id="footer">' ) );
    	?>	
        	
        	<?php
        		// action hook creating the footer 
        		prism_footer();
        	?>
        	
		<?php
			// Filter provided for altering output of the footer closing element
    		echo ( apply_filters( 'prism_close_footer', '</div><!-- #footer -->' . "\n" ) );
   
   			// action hook for placing content below the footer
			prism_belowfooter();
    	?>
    	
	<?php
		// Filter provided for altering output of wrapping element follows the body tag  
    	if ( apply_filters( 'prism_close_wrapper', true ) ) 
    		echo ( '</div><!-- #wrapper .hfeed -->' . "\n" );
	
		// calling WordPress' footer action hook
		wp_footer();

		// action hook for placing content before closing the BODY tag
		prism_after(); 
	?>

</body>
</html>