<?php
/**
 * Renewal expired banner.
 *
 * @since 3.7.5
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="rocket-promo-banner" id="rocket-renewal-banner">
	<div class="rocket-expired-message">
		<h3 class="rocket-expired-title"><?php esc_html_e( 'You will soon lose access to some features', 'rocket' ); ?></h3>
		<p>
		<?php
			printf(
				// translators: %1$s = <strong>, %2$s = </strong>.
				esc_html__( 'You need an %1$sactive license to continue optimizing your CSS delivery%2$s.', 'rocket' ),
				'<strong>',
				'</strong>'
			);
			?>
			<br>
			<?php esc_html_e( 'The Remove Unused CSS and Load CSS asynchronously features are great options to address the PageSpeed Insights recommendations and improve your website performance.', 'rocket' ); ?>
			<br>
			<?php
			printf(
				// translators: %1$s = <strong>, %2$s = </strong>, %3$s = date.
				esc_html__( 'They will be %1$sautomatically disabled on %3$s%2$s.', 'rocket' ),
				'<strong>',
				'</strong>',
				$data['disabled_date']
			);
			?>
		</p>
		<p>
		<?php
			printf(
				// translators: %1$s = <strong>, %2$s = </strong>, %3$s = discount percentage, %4$s = price.
				esc_html__( 'Renew your license for 1 year now and get %1$s%3$s OFF%2$s immediately: you’ll only pay %1$s%4$s%2$s!', 'rocket' ),
				'<strong>',
				'</strong>',
				'20%',
				$data['renewal_price']
			);
			?>
		</p>
	</div>
	<div class="rocket-expired-cta-container">
		<a href="<?php echo esc_url( $data['renewal_url'] ); ?>" class="rocket-renew-cta" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Renew now', 'rocket' ); ?></a>
	</div>
	<button class="wpr-notice-close wpr-icon-close" id="rocket-dismiss-renewal"><span class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice', 'rocket' ); ?></span></button>
</div>