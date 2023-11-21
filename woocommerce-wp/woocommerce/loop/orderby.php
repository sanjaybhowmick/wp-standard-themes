<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby custom-select mb-3 collectionSelect" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>
</div>