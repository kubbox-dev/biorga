<?php
/**
 * Popup promocional que aparece al entrar al sitio (una vez por sesión del navegador).
 * Para desactivarlo cuando termine la promoción, cambiar $promo_activa a false.
 */
$promo_activa = true;

if ( ! $promo_activa ) {
	return;
}

$uploads = 'https://biorganicos.com.co/wp-content/uploads/2026/10/';

$caracteristicas = array(
	array( 'icono' => 'solido.svg',            'texto' => "Sólido seco de 50\u{00A0}Kg." ),
	array( 'icono' => 'mejora-fertilidad.svg', 'texto' => 'Mejora la fertilidad del suelo.' ),
	array( 'icono' => 'compatible.svg',        'texto' => 'Compatible con todos los fertilizantes.' ),
	array( 'icono' => 'alta-retencion.svg',    'texto' => 'Alta retención de agua.' ),
);

$telefonos = array(
	array( 'numero' => '313 7200968', 'nombre' => 'Vivero Biorgánicos' ),
	array( 'numero' => '317 5871749', 'nombre' => 'Asesor comercial' ),
	array( 'numero' => '312 2589655', 'nombre' => 'Planta Biorgánicos' ),
);
?>
<!-- ── Popup promoción Biorgánicos Compost ─────────────────── -->
<div class="promo-popup" id="promo-popup" role="dialog" aria-modal="true" aria-labelledby="promo-popup-title" aria-hidden="true" data-preload="<?php echo esc_url( $uploads . 'compost.webp' ); ?>">
	<div class="promo-popup__box" tabindex="-1">
		<button type="button" class="promo-popup__close" aria-label="Cerrar promoción">&times;</button>

		<div class="promo-popup__scroll">
			<div class="promo-popup__inner">
				<img class="promo-popup__deco promo-popup__deco--top-left" src="<?php echo esc_url( $uploads . 'esquina-derecha-arriba.webp' ); ?>" alt="" loading="lazy">
				<img class="promo-popup__deco promo-popup__deco--bottom-left" src="<?php echo esc_url( $uploads . 'esquina-izquierda-abajo.webp' ); ?>" alt="" loading="lazy">
				<img class="promo-popup__deco promo-popup__deco--bottom-right" src="<?php echo esc_url( $uploads . 'esquina-derecha-abajo.webp' ); ?>" alt="" loading="lazy">

				<div class="promo-popup__main">
					<div class="promo-popup__head">
						<img class="promo-popup__logo" src="<?php echo esc_url( $uploads . 'logo.svg' ); ?>" alt="Biorgánicos" loading="lazy">
						<h2 class="promo-popup__title" id="promo-popup-title">Biorgánicos Compost</h2>
						<p class="promo-popup__subtitle">Acondicionador de suelos orgánico</p>
						<span class="promo-popup__badge">Registro de venta ICA N° 2941</span>
						<div class="promo-popup__price">
							<strong class="promo-popup__amount">$ 12.000</strong>
							<span class="promo-popup__unit">por bulto de<br>50 Kg</span>
						</div>
					</div>

					<div class="promo-popup__photo">
						<img src="<?php echo esc_url( $uploads . 'compost.webp' ); ?>" alt="Mano sosteniendo Biorgánicos Compost" width="1884" height="988" loading="lazy">
					</div>
				</div>

				<ul class="promo-popup__features">
					<?php foreach ( $caracteristicas as $item ) : ?>
						<li>
							<img src="<?php echo esc_url( $uploads . $item['icono'] ); ?>" alt="" loading="lazy">
							<span><?php echo esc_html( $item['texto'] ); ?></span>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="promo-popup__contact">
					<img src="<?php echo esc_url( $uploads . 'telefono.svg' ); ?>" alt="" loading="lazy">
					<p>
						<span class="promo-popup__contact-label">Contáctanos:</span>
						<?php foreach ( $telefonos as $i => $tel ) : ?>
							<span class="promo-popup__phone"><a href="<?php echo esc_url( 'tel:+57' . str_replace( ' ', '', $tel['numero'] ) ); ?>"><?php echo esc_html( $tel['numero'] ); ?></a> <?php echo esc_html( $tel['nombre'] ); ?><?php echo $i < count( $telefonos ) - 1 ? '<span class="promo-popup__sep"> -</span>' : '.'; ?></span>
						<?php endforeach; ?>
					</p>
				</div>

				<p class="promo-popup__promo">Promoción vigente hasta agotar existencias</p>

				<p class="promo-popup__footer">Producido por Bio-orgánicos S.A / Vereda San Diego, Girardota, Antioquia - Colombia.<br>Tel. 3122589655 www.biorganicos.com.co</p>
			</div>
		</div>
	</div>
</div>
