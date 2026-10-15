
(function ($){
	$(document).foundation();
	$(document).ready(function() {
		let $envi_text = $('.environmental_commitment_section .envi_commi_text');
		let is_mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
		var whatsapp_url;

		if ( $envi_text.length ) {
			let content_height = $envi_text.innerHeight();
			$envi_text.find('p').css({
				paddingTop: Math.ceil(content_height / 3),
			});
		}

		$('#navigation li.unlinker > a').click( function(event){ event.preventDefault(); })
		
		// Header Sticky
		let Options = {
			sticky_class: 'header_fixed',
		}

		let $header = $('#main-header');
		let $spacer = $('.top-header');
		let navOffset = $header.offset().top;

		function updateSticky() {
			let scrollPos = $(window).scrollTop();
			if ( scrollPos > navOffset ){
				$spacer.css('height', $header.outerHeight() + 'px');
				$header.addClass(Options.sticky_class);
			} else {
				$header.removeClass(Options.sticky_class);
				$spacer.css('height', '0');
			}
		}

		$(window).scroll(updateSticky);
		$(window).on('resize orientationchange', function() {
			$header.removeClass(Options.sticky_class);
			$spacer.css('height', '0');
			navOffset = $header.offset().top;
			updateSticky();
		});

		(is_mobile) ? whatsapp_url = 'https://api.whatsapp.com/' : whatsapp_url = 'https://web.whatsapp.com/';

		$('#navigation ul li.whatsapp a, .whatsapp_sending .whatsapp_footer li > a').attr({
			href: whatsapp_url + 'send?phone=573122589655&text=Estoy en la pagina web, mi nombre es',
			target: '_blank',
			title: 'Biorganicos Whatsapp',
		});

		// Popup promoción: se muestra una vez por sesión del navegador
		let $promo = $('#promo-popup');
		let promo_key = 'biorgaPromoCompostVisto';
		let $promo_trigger = null;

		function promoSeen() {
			try { return sessionStorage.getItem(promo_key) === '1'; } catch (e) { return false; }
		}

		function openPromo() {
			try { sessionStorage.setItem(promo_key, '1'); } catch (e) {}
			$promo_trigger = $(document.activeElement);
			$promo.find('img[loading="lazy"]').removeAttr('loading');
			$promo.addClass('is-open').attr('aria-hidden', 'false');
			$('body').addClass('promo-popup-open');
			$promo.find('.promo-popup__box').trigger('focus');
		}

		function closePromo() {
			$promo.removeClass('is-open').attr('aria-hidden', 'true');
			$('body').removeClass('promo-popup-open');
			if ( $promo_trigger && $promo_trigger.length ) {
				$promo_trigger.trigger('focus');
			}
		}

		if ( $promo.length && !promoSeen() ) {
			new Image().src = $promo.data('preload');
			setTimeout(openPromo, 800);

			$promo.on('click', function(event) {
				if ( event.target === this || $(event.target).closest('.promo-popup__close').length ) {
					closePromo();
				}
			});

			$(document).on('keydown', function(event) {
				if ( event.key === 'Escape' && $promo.hasClass('is-open') ) {
					closePromo();
				}
			});
		}
	});
})(jQuery);

