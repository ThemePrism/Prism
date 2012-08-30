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
		
		</section><!-- #main -->
    	
    	<?php
			// action hook for placing content above the footer
			prism_abovefooter();
		
		?>

			<footer id="footer" <?php prism_markup_class( FALSE, 'footer' ); ?> >
        	
        	<?php
        		// action hook creating the footer 
        		prism_footer();
        	?>
        	
		</footer><!-- #footer -->

		<?php
   
   			// action hook for placing content below the footer
			prism_belowfooter();
    	?>
    	
		</div><!-- #wrapper .hfeed -->

	<?php
		// calling WordPress' footer action hook
		wp_footer();

		// action hook for placing content before closing the BODY tag
		prism_after(); 
	?>

</body>
</html>