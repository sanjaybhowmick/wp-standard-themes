<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
<div class="collectionName">	
<h4>Our Collections</h4>	
	<?php
	if ( $total <= $per_page || -1 === $per_page ) {
		/* translators: %d: total results */
		printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'woocommerce' ), $total );
	} else {
		$first = ( $per_page * $current ) - $per_page + 1;
		$last  = min( $total, $per_page * $current );
		/* translators: 1: first result 2: last result 3: total results */
		printf( _nx( '<p>Showing the single result</p>', '<p>Showing %1$d&ndash;%2$d of %3$d results</p>', $total, 'with first and last result', 'woocommerce' ), $first, $last, $total );
	}
	?>
</div>	
</div>
