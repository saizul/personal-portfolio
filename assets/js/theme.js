; (function ($) {

    "use strict";

    var pxl_scroll_top;
    var pxl_window_height;
    var pxl_window_width;
    var pxl_scroll_status = '';
    var pxl_last_scroll_top = 0;
    var pxl_post_slip = false;


    function runIfWidthAbove1200(...fns) {
        if (window.innerWidth > 1200) {
            fns.forEach(fn => {
                if (typeof fn === 'function') fn();
            });
        }
    }
    function runIfWidthAbove1024(...fns) {
        if (window.innerWidth > 1024) {
            fns.forEach(fn => {
                if (typeof fn === 'function') fn();
            });
        }
    }
    function runIfWidthAbove767(...fns) {
        if (window.innerWidth > 767) {
            fns.forEach(fn => {
                if (typeof fn === 'function') fn();
            });
        }
    }
    $(window).on('load', function () {
        setTimeout(function () {
            $(".pxl-loader").addClass("is-loaded");
        }, 60);

        $('.pxl-swiper-slider, .pxl-header-mobile-elementor').css('opacity', '1');

        pxl_window_width = $(window).width();
        pxl_window_height = $(window).height();

        foliohub_header_sticky();
        foliohub_header_mobile();
        foliohub_scroll_to_top();
        foliohub_footer_fixed();
        dropdown_offices();
        foliohub_shop_quantity();
        foliohub_submenu_responsive();
        foliohub_panel_anchor_toggle();
        foliohub_slider_column_offset();
        foliohub_height_ct_grid();
        foliohub_bgr_parallax();
        foliohub_shop_view_layout();
        foliohub_menu_divider_move();
        foliohub_el_parallax();
        foliohub_button_parallax();
        foliohub_check_scroll();
        pxlColorAnimation();
        initToggleActiveLayout1();
        initToggleActiveLayout2();
        pxl_banner_scroll();
        pxl_custom_video_animation();
        testimonial_hover();
        pxlAnmBorder()
        pxl_prs_animation();








        runIfWidthAbove1200(

        );
        runIfWidthAbove1024(

        );
        runIfWidthAbove767(
            pxlColorAnimation()
        );
    });

    window.addEventListener("DOMContentLoaded", function () {
        setTimeout(() => {
            pxlColorAnimation();
            pxl_custom_video_animation();
        }, 500);
    });



    $(window).on('scroll', function () {
        pxl_scroll_top = $(window).scrollTop();
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        if (pxl_scroll_top < pxl_last_scroll_top) {
            pxl_scroll_status = 'up';
        } else {
            pxl_scroll_status = 'down';
        }
        pxl_last_scroll_top = pxl_scroll_top;
        foliohub_header_sticky();
        foliohub_scroll_to_top();
        foliohub_footer_fixed();
        foliohub_ptitle_scroll_opacity();
        foliohub_check_scroll();
        if (pxl_scroll_top < 100) {
            $('.elementor > .pin-spacer').removeClass('scroll-top-active');
        }
    });


    $(window).on('resize', function () {
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        foliohub_submenu_responsive();
        foliohub_height_ct_grid();
        foliohub_header_mobile();
        foliohub_slider_column_offset();
        foliohub_check_scroll();
        setTimeout(function () {
            foliohub_menu_divider_move();
        }, 500);
    });


    $(document).ready(function () {
        pxl_window_width = $(window).width();
        foliohub_backtotop_progess_bar();
        foliohub_type_file_upload();
        foliohub_button_parallax1();
        foliohub_zoom_point();
        initScaleOnScroll();
        setTimeout(function () {
            $('.pxl-section-bg-parallax').closest('.elementor-element').addClass('pxl-section-parallax-overflow');
        }, 500);

        $('a[href^="#"]').on('click', function (e) {
            const href = this.getAttribute('href');
            if (!href || href === '#') return;

            e.preventDefault();
            e.stopImmediatePropagation();

            const $target = $(href);
            if (!$target.length) return;

            const headerHeight = $('.site-header, .header').outerHeight() || 0;

            setTimeout(() => {
                $('html, body').stop().animate(
                    {
                        scrollTop: $target.offset().top - headerHeight
                    },
                    600
                );
            }, 50);
        });




        // Location
        $(".pxl-location .pxl-list .pxl--item").on("mouseenter mouseleave", function (e) {
            let id = $(this).attr("id");
            if (!id) return;

            $('.elementor-element[id="' + id + '"]').toggleClass("active", e.type === "mouseenter");
        });
        // 

        $('.pxl-check-scroll .pxl-swiper-slide .filter-item').on('mousedown', function () {
            var $gridItem = $(this).closest('.pxl-swiper-slide');
            $gridItem.removeClass('visible').addClass('visible');
        });

        /* Start Menu Mobile */
        $('.pxl-header-menu li.menu-item-has-children').append('<span class="pxl-menu-toggle"></span>');
        $('.pxl-menu-toggle').on('click', function () {
            if ($(this).hasClass('active')) {
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
            } else {
                $(this).closest('ul').find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).toggleClass('active');
                $(this).parent().find('> .sub-menu').toggleClass('active');
                $(this).parent().find('> .sub-menu').slideToggle();
            }
        });

        $('li.pxl-megamenu').hover(function () {
            $(this).parents('.elementor-element').addClass('section-mega-active')
        }, function () {
            $(this).parents('.elementor-element').removeClass('section-mega-active')
        })

        $("#pxl-nav-mobile, .pxl-anchor-mobile-menu").on('click', function () {
            $(this).toggleClass('active');
            $('body').toggleClass('body-overflow');
            $('.pxl-header-menu').toggleClass('active');
        });

        $(".pxl-menu-close, .pxl-header-menu-backdrop, #pxl-header-mobile .pxl-menu-primary a.is-one-page").on('click', function () {
            $(this).parents('.pxl-header-main').find('.pxl-header-menu').removeClass('active');
            $('#pxl-nav-mobile').removeClass('active');
            $('body').toggleClass('body-overflow');
        });
        /* End Menu Mobile */

        /* Menu Vertical */
        $('.pxl-nav-vertical li.menu-item-has-children > a').append('<span class="pxl-arrow-toggle"><i class="bi-chevron-right"></i></span>');
        $('.pxl-nav-vertical li.menu-item-has-children > a').on('click', function () {
            if ($(this).hasClass('active')) {
                $(this).next().toggleClass('active').slideToggle();
            } else {
                $(this).closest('ul').find('.sub-menu.active').toggleClass('active').slideToggle();
                $(this).closest('ul').find('a.active').toggleClass('active');
                $(this).find('.pxl-menu-toggle.active').toggleClass('active');
                $(this).toggleClass('active');
                $(this).next().toggleClass('active').slideToggle();
            }
        });

        $(".comments-area .btn-submit").append('<i class="fas fa-comment"></i>');
        /* Mega Menu Max Height */
        var m_h_mega = $('li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor').outerHeight();
        var w_h_mega = $(window).height();
        var w_h_mega_css = w_h_mega - 120;
        if (m_h_mega > w_h_mega) {
            $('li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor').css('max-height', w_h_mega_css + 'px');
            $('li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor').css('overflow-y', 'scroll');
            $('li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor').css('overflow-x', 'hidden');
        }
        // Active Mega Menu Hover
        $('li.pxl-megamenu').hover(function () {
            $(this).parents('.elementor-element').addClass('section-mega-active');
        }, function () {
            $(this).parents('.elementor-element').removeClass('section-mega-active');
        });
        /* End Mega Menu Max Height */
        /* Search Popup */
        var $search_wrap_init = $("#pxl-search-popup");
        var search_field = $('#pxl-search-popup .search-field');
        var $body = $('body');

        $(".pxl-search-popup-button").on('click', function (e) {
            if (!$search_wrap_init.hasClass('active')) {
                $search_wrap_init.addClass('active');
                setTimeout(function () { search_field.get(0).focus(); }, 500);
            } else if (search_field.val() === '') {
                $search_wrap_init.removeClass('active');
                search_field.get(0).focus();
            }
            e.preventDefault();
            return false;
        });

        $(".pxl-subscribe-popup .pxl-item--overlay, .pxl-subscribe-popup .pxl-item--close").on('click', function (e) {
            $(this).parents('.pxl-subscribe-popup').removeClass('pxl-active');
            e.preventDefault();
            return false;
        });

        $("#pxl-search-popup .pxl-item--overlay, #pxl-search-popup .pxl-item--close").on('click', function (e) {
            $body.addClass('pxl-search-out-anim');
            setTimeout(function () {
                $body.removeClass('pxl-search-out-anim');
            }, 800);
            setTimeout(function () {
                $search_wrap_init.removeClass('active');
            }, 800);
            e.preventDefault();
            return false;
        });
        ///
        $('.pxl-parent-transition').each(function () {
            $(this).find('.pxl-transtion').addClass('pxl-hover-transition');
            $(this).hover(function () {
                $(this).find('.pxl-transtion').addClass('pxl-hover-transition');
            });
            $('.pxl-switch-button').on('mouseover', function () {
                $(this).find('.pxl-transtion').removeClass('pxl-hover-transition');
            });
        });
        /* Scroll To Top */
        $('.pxl-scroll-top').click(function () {
            $('html, body').animate({ scrollTop: 0 }, 1200);
            $(this).parents('.pxl-wapper').find('.elementor > .pin-spacer').addClass('scroll-top-active');
            return false;
        });

        /* custom grid filter moving border */
        $('.pxl-grid-filter').each(function () {
            var marker = $(this).find('.filter-marker'),
                item = $(this).find('.filter-item'),
                current = $(this).find('.filter-item.active');

            var offsettop = current.length ? current.position().top : 0;

            marker.css({
                top: offsettop + (current.length ? current.outerHeight() : 0),
                left: current.length ? current.position().left : 0,
                width: current.length ? current.outerWidth() : 0,
                display: "block"
            });

            item.mouseover(function () {
                var self = $(this),
                    offsetactop = self.position().top,
                    offsetleft = self.position().left,
                    width = self.outerWidth() || current.outerWidth(),
                    top = offsetactop == 0 ? 0 : offsetactop || offsettop,
                    left = offsetleft == 0 ? 0 : offsetleft || current.position().left;

                marker.stop().animate({
                    top: top + (current.length ? current.outerHeight() : 0),
                    left: left,
                    width: width,
                }, 300);
            });

            item.on('click', function () {
                current = $(this);
            });

            item.mouseleave(function () {
                var offsetlvtop = current.length ? current.position().top : 0;
                marker.stop().animate({
                    top: offsetlvtop + (current.length ? current.outerHeight() : 0),
                    left: current.length ? current.position().left : 0,
                    width: current.length ? current.outerWidth() : 0
                }, 300);
            });
        });


        /* Animate Time Delay */

        /* Related Post - Slick Slider */
        const postSlider = $(".pxl-related-post .pxl-related-post-inner");
        postSlider
            .slick({
                dots: false,
                infinite: true,
                arrows: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 500,
                cssEase: 'linear',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

        $(".category-carousel").slick({
            dots: false,
            infinite: true,
            arrows: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 500,
            cssEase: 'linear',
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                    },
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },
                {
                    breakpoint: 578,
                    settings: {
                        slidesToShow: 1,
                    }
                }
            ]
        });

        $('.pxl-grid-masonry').each(function () {
            var eltime = 80;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .pxl-grid-item > .wow').each(function (index, obj) {
                $(this).css('animation-delay', eltime + 'ms');
                if (_elt === index) {
                    eltime = 80;
                    _elt = _elt + elt_inner;
                } else {
                    eltime = eltime + 80;
                }
            });
        });

        $('.btn-text-nina').each(function () {
            var eltime = 0.045;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .pxl--btn-text > span').each(function (index, obj) {
                $(this).css('transition-delay', eltime + 's');
                eltime = eltime + 0.045;
            });
        });

        $('.btn-text-nanuk').each(function () {
            var eltime = 0.05;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .pxl--btn-text > span').each(function (index, obj) {
                $(this).css('animation-delay', eltime + 's');
                eltime = eltime + 0.05;
            });
        });

        $('.btn-text-smoke').each(function () {
            var eltime = 0.05;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('> .pxl--btn-text > span > span > span').each(function (index, obj) {
                $(this).css('--d', eltime + 's');
                eltime = eltime + 0.05;
            });
        });

        $('.btn-text-reverse .pxl-text--front, .btn-text-reverse .pxl-text--back').each(function () {
            var eltime = 0.05;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this).find('.pxl-text--inner > span').each(function (index, obj) {
                $(this).css('transition-delay', eltime + 's');
                eltime = eltime + 0.05;
            });
        });

        /* End Animate Time Delay */

        $('.label-text-fillter').on('click', function () {
            $(this).parents('.pxl-grid-filter').addClass('active');
        });
        $('.filter-item').on('click', function () {
            $('.pxl-grid-filter').removeClass('active');
        });


        /* Lightbox Popup */
        $('.pxl-action-popup').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        $('.pxl-gallery-lightbox').each(function () {
            $(this).magnificPopup({
                delegate: 'a.lightbox',
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade',
            });
        });

        /* Page Title Parallax */
        if (pxl_window_width > 1024) {
            if ($('#pxl-page-title-default').hasClass('pxl--parallax')) {
                $(this).stellar();
            }
        }

        /* Cart Sidebar Popup */
        $(".pxl-cart-sidebar-button").on('click', function () {
            $('body').addClass('body-overflow');
            $('#pxl-cart-sidebar').addClass('active');
        });
        $("#pxl-cart-sidebar .pxl-popup--overlay, #pxl-cart-sidebar .pxl-item--close").on('click', function () {
            $('body').removeClass('body-overflow');
            $('#pxl-cart-sidebar').removeClass('active');
        });
        $(".pxl-accordion1.style2 .pxl-accordion--content").find("br").remove();
        /* Hover Active Item */
        $('.pxl--widget-hover').each(function () {
            $(this).hover(function () {
                $(this).parents('.elementor-row').find('.pxl--widget-hover').removeClass('pxl--item-active');
                $(this).parents('.elementor-container').find('.pxl--widget-hover').removeClass('pxl--item-active');
                $(this).addClass('pxl--item-active');
            });
        });
        /* Hover Active button */
        var wobbleElements = document.querySelectorAll('.pxl-wobble');
        wobbleElements.forEach(function (el) {
            el.addEventListener('mouseover', function () {
                if (!el.classList.contains('animating') && !el.classList.contains('mouseover')) {
                    el.classList.add('animating', 'mouseover');
                    var letters = el.innerText.split('');
                    setTimeout(function () { el.classList.remove('animating'); }, (letters.length + 1) * 50);
                    var animationName = el.dataset.animation;
                    if (!animationName) { animationName = "pxl-jump"; }
                    el.innerText = '';
                    letters.forEach(function (letter) {
                        if (letter == " ") {
                            letter = "&nbsp;";
                        }
                        el.innerHTML += '<span class="letter">' + letter + '</span>';
                    });
                    var letterElements = el.querySelectorAll('.letter');
                    letterElements.forEach(function (letter, i) {
                        setTimeout(function () {
                            letter.classList.add(animationName);
                        }, 50 * i);
                    });
                }
            });
            el.addEventListener('mouseout', function () {
                el.classList.remove('mouseover');
            });
        });
        /*Click Active*/

        // JavaScript foliohub
        const buttons = document.querySelectorAll('.pxl-process .pxl-process-item');

        if (buttons.length) {
            buttons[0].classList.add('active');
            restartAnimation(buttons[0]);
        }

        buttons.forEach(btn => {
            btn.addEventListener('click', function () {
                buttons.forEach(b => {
                    b.classList.remove('active');
                    restartAnimation(b, true);
                });

                this.classList.add('active');
                restartAnimation(this);
            });
        });

        function restartAnimation(el, clearOnly = false) {
            const inner = el.querySelector('.pxl-item--inner');
            if (inner) {
                inner.classList.remove('animate-again');
                void inner.offsetWidth;
                if (!clearOnly) inner.classList.add('animate-again');
            }
        }


        /* Start Icon Bounce */
        var boxEls = $('.el-bounce, .pxl-image-effect1, .el-effect-zigzag');
        $.each(boxEls, function (boxIndex, boxEl) {
            loopToggleClass(boxEl, 'active');
        });

        function loopToggleClass(el, toggleClass) {
            el = $(el);
            let counter = 0;
            if (el.hasClass(toggleClass)) {
                waitFor(function () {
                    counter++;
                    return counter == 2;
                }, function () {
                    counter = 0;
                    el.removeClass(toggleClass);
                    loopToggleClass(el, toggleClass);
                }, 'Deactivate', 1000);
            } else {
                waitFor(function () {
                    counter++;
                    return counter == 3;
                }, function () {
                    counter = 0;
                    el.addClass(toggleClass);
                    loopToggleClass(el, toggleClass);
                }, 'Activate', 1000);
            }
        }

        function waitFor(condition, callback, message, time) {
            if (message == null || message == '' || typeof message == 'undefined') {
                message = 'Timeout';
            }
            if (time == null || time == '' || typeof time == 'undefined') {
                time = 100;
            }
            var cond = condition();
            if (cond) {
                callback();
            } else {
                setTimeout(function () {
                    waitFor(condition, callback, message, time);
                }, time);
            }
        }
        /* End Icon Bounce */

        /* Image Effect */
        if ($('.pxl-image-tilt').length) {
            $('.pxl-image-tilt').parents('.elementor-element').addClass('pxl-image-tilt-active');
            $('.pxl-image-tilt').each(function () {
                var pxl_maxtilt = $(this).data('maxtilt'),
                    pxl_speedtilt = $(this).data('speedtilt'),
                    pxl_perspectivetilt = $(this).data('perspectivetilt');
                VanillaTilt.init(this, {
                    max: pxl_maxtilt,
                    speed: pxl_speedtilt,
                    perspective: pxl_perspectivetilt
                });
            });
        }

        /* Select Theme Style */
        $('.widget.widget_search input').attr('required', true);
        $('.wpcf7-select').each(function () {
            var $this = $(this), numberOfOptions = $(this).children('option').length;

            $this.addClass('pxl-select-hidden');
            $this.wrap('<div class="pxl-select"></div>');
            $this.after('<div class="pxl-select-higthlight"></div>');

            var $styledSelect = $this.next('div.pxl-select-higthlight');
            $styledSelect.text($this.children('option').eq(0).text());

            var $list = $('<ul />', {
                'class': 'pxl-select-options'
            }).insertAfter($styledSelect);

            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }

            var $listItems = $list.children('li');

            $styledSelect.click(function (e) {
                e.stopPropagation();
                $('div.pxl-select-higthlight.active').not(this).each(function () {
                    $(this).removeClass('active').next('ul.pxl-select-options').addClass('pxl-select-lists-hide');
                });
                $(this).toggleClass('active');
            });

            $listItems.click(function (e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
            });

            $(document).click(function () {
                $styledSelect.removeClass('active');
            });

        });

        /* Nice Select */
        $('.woocommerce-ordering .orderby, #filter-label, #pxl-sidebar-area select, .variations_form.cart .variations select, .pxl-open-table select, .pxl-nice-select').each(function () {
            $(this).niceSelect();
        });

        $('.pxl-post-list .nice-select').each(function () {
            $(this).niceSelect();
        });

        /* Typewriter */
        if ($('.pxl-title--typewriter').length) {
            function typewriterOut(elements, callback) {
                if (elements.length) {
                    elements.eq(0).addClass('is-active');
                    elements.eq(0).delay(3000);
                    elements.eq(0).removeClass('is-active');
                    typewriterOut(elements.slice(1), callback);
                }
                else {
                    callback();
                }
            }

            function typewriterIn(elements, callback) {
                if (elements.length) {
                    elements.eq(0).addClass('is-active');
                    elements.eq(0).delay(3000).slideDown(3000, function () {
                        elements.eq(0).removeClass('is-active');
                        typewriterIn(elements.slice(1), callback);
                    });
                }
                else {
                    callback();
                }
            }

            function typewriterInfinite() {
                typewriterOut($('.pxl-title--typewriter .pxl-item--text'), function () {
                    typewriterIn($('.pxl-title--typewriter .pxl-item--text'), function () {
                        typewriterInfinite();
                    });
                });
            }
            $(function () {
                typewriterInfinite();
            });
        }
        /* End Typewriter */

        /* Get checked input - Mailchimpp */
        $('.mc4wp-form input:checkbox').change(function () {
            if ($(this).is(":checked")) {
                $('.mc4wp-form').addClass("pxl-input-checked");
            } else {
                $('.mc4wp-form').removeClass("pxl-input-checked");
            }
        });

        /* Scroll to content */
        $('.pxl-link-to-section .btn').on('click', function (e) {
            var id_scroll = $(this).attr('href');
            var offsetScroll = $('.pxl-header-elementor-sticky').outerHeight();
            e.preventDefault();
            $("html, body").animate({ scrollTop: $(id_scroll).offset().top - offsetScroll }, 600);
        });

        // Hover Item Active
        $(".pxl-post-modern1 .pxl-post--content .pxl-post--item")
            .on("mouseenter", function () {
                $(this).addClass("active");
                $(".pxl-post-modern1 .pxl-post--images .pxl-post--featured").removeClass('active');
                var selected_item = $(this).find(".pxl-content--inner").attr("data-image");
                $(selected_item).addClass('active').removeClass('non-active');
            })
            .on("mouseleave", function () {
                $(".pxl-post-modern1 .pxl-post--content .pxl-post--item").removeClass('active');
                $(".pxl-post-modern1 .pxl-post--images .pxl-post--featured").removeClass('non-active');
                var selected_item = $(this).find(".pxl-content--inner").attr("data-image");
                $(selected_item).removeClass('active').addClass('non-active');
            }
            );

        // Hover Overlay Effect
        $('.pxl-overlay-shake').mousemove(function (event) {
            var offset = $(this).offset();
            var W = $(this).outerWidth();
            var X = (event.pageX - offset.left);
            var Y = (event.pageY - offset.top);
            $(this).find('.pxl-overlay--color').css({
                'top': + Y + 'px',
                'left': + X + 'px'
            });
        });

        //Some Widget Default
        //$('.widget .cat-item a, .widget_archive li a').append('<span class="pxl-item--divider"></span>');

        /* Social Button Click */
        $('.pxl-social--button').on('click', function () {
            $(this).toggleClass('active');
        });
        $(document).on('click', function (e) {
            if (e.target.className == 'pxl-social--button active')
                $('.pxl-social--button').removeClass('active');
        });

        // Header Home 2
        $('#home-2-header').append('<span class="pxl-header-divider1"></span><span class="pxl-header-divider2"></span><span class="pxl-header-divider3"></span><span class="pxl-header-divider4"></span>');
        $('#home-2-header-sticky').append('<span class="pxl-header-divider2"></span><span class="pxl-header-divider4"></span>');

    });

    jQuery(document).ajaxComplete(function (event, xhr, settings) {
        foliohub_shop_quantity();
        foliohub_height_ct_grid();
    });

    jQuery(document).on('updated_wc_div', function () {
        foliohub_shop_quantity();
    });

    /* Header Sticky */
    function foliohub_header_sticky() {
        if ($('#pxl-header-elementor').hasClass('is-sticky')) {
            let hasFixed = false;

            if (pxl_scroll_top > 30) {
                $('.pxl-header-elementor-sticky.pxl-sticky-stb').addClass('pxl-header-fixed');
                $('#pxl-header-mobile').addClass('pxl-header-mobile-fixed');
                hasFixed = true;
            } else {
                $('.pxl-header-elementor-sticky.pxl-sticky-stb').removeClass('pxl-header-fixed');
                $('#pxl-header-mobile').removeClass('pxl-header-mobile-fixed');
            }

            if (pxl_scroll_status === 'up' && pxl_scroll_top > 100) {
                $('.pxl-header-elementor-sticky.pxl-sticky-stt').addClass('pxl-header-fixed');
                hasFixed = true;
            } else {
                $('.pxl-header-elementor-sticky.pxl-sticky-stt').removeClass('pxl-header-fixed');
            }

            // Animate GSAP
            const $icon = $('.pxl-icon-header-1');
            if (hasFixed) {
                gsap.to($icon, {
                    duration: 0.2,
                    xPercent: 0,
                    left: 35,
                    ease: "linear"
                });
            } else {
                gsap.to($icon, {
                    duration: 0.2,
                    xPercent: -50,
                    left: '50%',
                    ease: "linear"
                });
            }
        }
    }



    /* Header Mobile */
    function foliohub_header_mobile() {
        var h_header_mobile = $('#pxl-header-elementor').outerHeight();
        if (pxl_window_width < 1199) {
            $('#pxl-header-elementor').css('min-height', h_header_mobile + 'px');
        }
    }

    /* Scroll To Top */
    function foliohub_scroll_to_top() {
        var $scrollTop = $('.pxl-scroll-top');
        var $footer = $('footer');
        if (pxl_scroll_top < pxl_window_height) {
            $scrollTop.addClass('pxl-off').removeClass('pxl-on');
            return;
        }
        $scrollTop.addClass('pxl-on').removeClass('pxl-off');
        if ($scrollTop.hasClass('style-hide-ft') && $footer.length) {
            var footerTop = $footer.offset().top;
            var windowBottom = pxl_scroll_top + pxl_window_height;
            if (windowBottom >= footerTop) {
                $scrollTop.addClass('pxl-off').removeClass('pxl-on');
            }
        }
    }


    /* Footer Fixed */
    function foliohub_footer_fixed() {
        setTimeout(function () {
            var h_footer = $('.pxl-footer-fixed #pxl-footer-elementor').outerHeight() - 1;
            $('.pxl-footer-fixed #pxl-main').css('margin-bottom', h_footer + 'px');
        }, 600);
    }

    /* Custom Check Scroll */
    function foliohub_check_scroll() {
        var $gridItems = $('.pxl-check-scroll .pxl-swiper-slide');
        var viewportBottom = pxl_scroll_top + $(window).height();

        $gridItems.each(function () {
            var $gridItem = $(this);
            var elementTop = $gridItem.offset().top;
            var elementBottom = elementTop + $gridItem.outerHeight();

            if (elementTop < viewportBottom && elementBottom > pxl_scroll_top) {
                $gridItem.addClass('visible');
            } else {
                $gridItem.removeClass('visible');
            }
        });
    }

    function dropdown_offices() {
        const filterDropdown = $("#filter-label");
        const items = document.querySelectorAll(".pxl-offices-list .pxl--item");

        if (!filterDropdown.length || items.length === 0) return;

        // Lắng nghe sự kiện change của niceSelect
        filterDropdown.on("change", function () {
            const selectedLabel = this.value.toLowerCase();

            items.forEach(item => {
                const itemLabel = item.dataset.label?.toLowerCase() || "";
                item.classList.toggle("hidden", selectedLabel !== "" && itemLabel !== selectedLabel);
            });
        });
    }


    /* Button Parallax */
    function foliohub_button_parallax() {
        const $buttons = $('.btn.btn-circle');
        if ($buttons.length === 0) {
            return;
        }
        $buttons.on('mouseenter', function () {
            const $text = $(this).find('svg');
            if ($text.length === 0) {
                return;
            }
            gsap.set($text, {
                transformOrigin: "50% 50%"
            });
        });
        $buttons.on('mousemove', function (e) {
            const $btn = $(this);
            const $text = $btn.find('svg, span');

            if ($text.length === 0) {
                return;
            }
            const { left, top, width, height } = this.getBoundingClientRect();
            const centerX = left + width / 2;
            const centerY = top + height / 2;
            const deltaX = (e.clientX - centerX) * 0.2;
            const deltaY = (e.clientY - centerY) * 0.2;
            gsap.to([$btn, $text], {
                duration: 0.8,
                x: deltaX,
                y: deltaY,
                ease: "power3.out"
            });
        });
        $buttons.on('mouseleave', function () {
            const $btn = $(this);
            const $text = $btn.find('svg, span');
            if ($text.length === 0) {
                return;
            }
            gsap.to([$btn, $text], {
                duration: 0.8,
                x: 0,
                y: 0,
                ease: "elastic.out(1, 0.3)"
            });
        });
    }

    /* WooComerce Quantity */
    function foliohub_shop_quantity() {
        "use strict";
        $('#pxl-wapper .quantity').append('<span class="quantity-icon quantity-down pxl-icon--minus"></span><span class="quantity-icon quantity-up pxl-icon--plus"></span>');
        $('.quantity-up').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.quantity-down').on('click', function () {
            $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
            $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
        });
        $('.quantity-icon').on('click', function () {
            var quantity_number = $(this).parents('.quantity').find('input[type="number"]').val();
            var add_to_cart_button = $(this).parents(".product, .woocommerce-product-inner").find(".add_to_cart_button");
            add_to_cart_button.attr('data-quantity', quantity_number);
            add_to_cart_button.attr("href", "?add-to-cart=" + add_to_cart_button.attr("data-product_id") + "&quantity=" + quantity_number);
        });
        $('.woocommerce-cart-form .actions .button').removeAttr('disabled');
    }

    /* Menu Responsive Dropdown */
    function foliohub_submenu_responsive() {
        var $foliohub_menu = $('.pxl-header-elementor-main, .pxl-header-elementor-sticky');
        $foliohub_menu.find('.pxl-menu-primary li').each(function () {
            var $foliohub_submenu = $(this).find('> ul.sub-menu');
            if ($foliohub_submenu.length == 1) {
                if (($foliohub_submenu.offset().left + $foliohub_submenu.width() + 0) > $(window).width()) {
                    $foliohub_submenu.addClass('pxl-sub-reverse');
                }
            }
        });
    }

    function foliohub_panel_anchor_toggle() {
        'use strict';

        // Toggle popup khi click anchor button
        $(document).on('click', '.pxl-anchor-button, .pxl-atc-popup a', function (e) {
            e.preventDefault();
            e.stopPropagation();

            var target = $(this).attr('data-target');
            var $target = $(target);

            if ($target.hasClass('active')) {
                $target.removeClass('active').addClass('deactive');
            } else {
                $target.addClass('active').removeClass('deactive');
            }

            $('body').addClass('body-overflow');
            $('.pxl-popup--conent .wow').addClass('animated').removeClass('aniOut deactive');
            $('.pxl-popup--conent .fadeInPopup').removeClass('aniOut deactive');

            if ($target.find('.pxl-search-form').length > 0) {
                setTimeout(function () {
                    $target.find('.pxl-search-form .pxl-search-field').focus();
                }, 1000);
            }
        });

        // Xoá dấu ngoặc trong pxl-post-taxonomy
        $(document).ready(function () {
            $('.pxl-post-taxonomy .pxl-count').each(function () {
                var content = $(this).html();
                if (content) {
                    var newContent = content.replace('(', '').replace(')', '');
                    $(this).html(newContent);
                }
            });
        });

        // Set delay cho transition popup
        $('.pxl-anchor-button').each(function () {
            var t_target = $(this).attr('data-target');
            var t_delay = $(this).attr('data-delay-hover');
            $(t_target).find('.pxl-popup--conent').css('transition-delay', t_delay + 'ms');
            $(t_target).find('.pxl-popup--overlay').css('transition-delay', t_delay + 'ms');
        });

        // Đóng popup khi click overlay hoặc close
        $(".pxl-hidden-panel-popup .pxl-popup--overlay, .pxl-hidden-panel-popup .pxl-close-popup").on('click', function () {
            $('body').removeClass('body-overflow');

            $('.pxl-hidden-panel-popup').each(function () {
                if ($(this).hasClass('active')) {
                    $(this).removeClass('active').addClass('deactive');
                }
            });

            $('.pxl-popup--conent .wow').addClass('aniOut').removeClass('animated');
            $('.pxl-popup--conent .fadeInPopup').addClass('aniOut');
        });

        // Button Show More (không thay đổi)
        $(".pxl-icon-box6 .btn-show-more").on('click', function () {
            $(this).parents('.pxl-icon-box6').addClass('active');
            $(this).parents('.pxl-icon-box6').find('.content-2').addClass('active');
        });

        // Đóng popup (dạng khác)
        $(".pxl-popup--close").on('click', function () {
            $('body').removeClass('body-overflow');
            $(this).parent().removeClass('active').addClass('deactive');
        });

        $(".pxl-close-popup").on('click', function () {
            $('body').removeClass('body-overflow');
            $('.pxl-page-popup').removeClass('active').addClass('deactive');
        });
    }


    /* Page Title Scroll Opacity */
    function foliohub_ptitle_scroll_opacity() {
        var divs = $('#pxl-page-title-elementor.pxl-scroll-opacity .elementor-widget'),
            limit = $('#pxl-page-title-elementor.pxl-scroll-opacity').outerHeight();
        if (pxl_scroll_top <= limit) {
            divs.css({ 'opacity': (1 - pxl_scroll_top / limit) });
        }
    }

    /* Slider Column Offset */
    function foliohub_slider_column_offset() {
        var content_w = ($('#pxl-main').width() - 1200) / 2;
        if (pxl_window_width > 1200) {
            $('.pxl-slider2 .pxl-item--left').css('padding-left', content_w + 'px');
        }
    }

    /* Preloader Default */
    $.fn.extend({
        jQueryImagesLoaded: function () {
            var $imgs = this.find('img[src!=""]')

            if (!$imgs.length) {
                return $.Deferred()
                    .resolve()
                    .promise()
            }

            var dfds = []

            $imgs.each(function () {
                var dfd = $.Deferred()
                dfds.push(dfd)
                var img = new Image()
                img.onload = function () {
                    dfd.resolve()
                }
                img.onerror = function () {
                    dfd.resolve()
                }
                img.src = this.src
            })

            return $.when.apply($, dfds)
        }
    })

    /* Button Parallax */
    function foliohub_button_parallax1() {
        $('.btn-text-parallax, .pxl-blog-style2, .pxl-hover-parallax').on('mouseenter', function () {
            $(this).addClass('hovered');
        });

        $('.btn-text-parallax, .pxl-blog-style2, .pxl-hover-parallax').on('mouseleave', function () {
            $(this).removeClass('hovered');
        });

        $('.btn-text-parallax').on('mousemove', function (e) {
            const bounds = this.getBoundingClientRect();
            const centerX = bounds.left + bounds.width / 2;
            const centerY = bounds.top + bounds.height;
            const deltaX = Math.floor((centerX - e.clientX)) * 0.222;
            const deltaY = Math.floor((centerY - e.clientY)) * 0.333;
            $(this).find('.pxl--btn-text').css({
                transform: 'translate3d(' + deltaX * 0.32 + 'px, ' + deltaY * 0.32 + 'px, 0px)'
            });
        });

        $('.pxl-blog-style2 .pxl-post--featured, .pxl-hover-parallax').on('mousemove', function (e) {
            const bounds = this.getBoundingClientRect();
            const centerX = bounds.left + bounds.width / 2;
            const centerY = bounds.top + bounds.height;
            const deltaX = Math.floor((centerX - e.clientX)) * 0.222;
            const deltaY = Math.floor((centerY - e.clientY)) * 0.333;
            $(this).find('.pxl-item-parallax, .pxl-post--button').css({
                transform: 'translate3d(' + deltaX * 0.32 + 'px, ' + deltaY * 0.32 + 'px, 0px)'
            });
        });
    }

    /* Button Parallax */
    function foliohub_button_parallax() {
        const $buttons = $('.pxl-counter5 .pxl-counter--inner');
        if ($buttons.length === 0) {
            return;
        }
        $buttons.on('mouseenter', function () {
            const $text = $(this).find('svg');
            if ($text.length === 0) {
                return;
            }
            gsap.set($text, {
                transformOrigin: "50% 50%"
            });
        });
        $buttons.on('mousemove', function (e) {
            const $btn = $(this);
            const $text = $btn.find('.pxl-counter--number');

            if ($text.length === 0) {
                return;
            }
            const { left, top, width, height } = this.getBoundingClientRect();
            const centerX = left + width / 2;
            const centerY = top + height / 2;
            const deltaX = (e.clientX - centerX) * 0.444;
            const deltaY = (e.clientY - centerY) * 0.444;
            gsap.to([$btn, $text], {
                duration: 0.8,
                x: deltaX,
                y: deltaY,
                ease: "power3.out"
            });
        });
        $buttons.on('mouseleave', function () {
            const $btn = $(this);
            const $text = $btn.find('.pxl-counter--number');
            if ($text.length === 0) {
                return;
            }
            gsap.to([$btn, $text], {
                duration: 0.8,
                x: 0,
                y: 0,
                ease: "elastic.out(1, 0.3)"
            });
        });
    }

    function foliohub_bgr_parallax() {
        setTimeout(function () {
            $('.pxl-section-bg-parallax').each(function () {
                if (!$(this).hasClass('pinned-zoom-clipped') && !$(this).hasClass('pinned-circle-zoom-clipped') && !$(this).hasClass('mask-parallax')) {
                    jarallax(this, {
                        speed: 1,
                    });
                }
            });
        }, 300);
    }

    function foliohub_el_parallax() {
        $('.el-parallax-wrap').on({
            mouseenter: function () {
                const $this = $(this);
                $this.addClass('hovered');
                $this.find('.el-parallax-item').css({
                    transition: 'none'
                });
            },
            mouseleave: function () {
                const $this = $(this);
                $this.removeClass('hovered');
                $this.find('.el-parallax-item').css({
                    transition: 'transform 0.5s ease',
                    transform: 'translate3d(0px, 0px, 0px)'
                });
            },
            mousemove: function (e) {
                const $this = $(this);
                const bounds = this.getBoundingClientRect();
                const centerX = bounds.left + bounds.width / 2;
                const centerY = bounds.top + bounds.height / 2;
                const deltaX = (centerX - e.clientX) * 0.19;
                const deltaY = (centerY - e.clientY) * 0.25;

                requestAnimationFrame(() => {
                    $this.find('.el-parallax-item').css({
                        transform: `translate3d(${deltaX}px, ${deltaY}px, 0px)`
                    });
                });
            }
        });
    }

    /* Menu Divider Move */
    function foliohub_menu_divider_move() {
        $('.pxl-nav-menu1.fr-style-divider').each(function () {
            var current = $(this).find('.pxl-menu-primary > .current-menu-item, .pxl-menu-primary > .current-menu-parent, .pxl-menu-primary > .current-menu-ancestor');
            if (current.length > 0) {
                var marker = $(this).find('.pxl-divider-move');
                marker.css({
                    left: current.position().left,
                    width: current.outerWidth(),
                    display: "block"
                });
                marker.addClass('active');
                current.addClass('pxl-shape-active');
                if (Modernizr.csstransitions) {
                    $(this).find('.pxl-menu-primary > li').mouseover(function () {
                        var self = $(this),
                            offsetLeft = self.position().left,
                            width = self.outerWidth() || current.outerWidth(),
                            left = offsetLeft == 0 ? 0 : offsetLeft || current.position().left;
                        marker.css({
                            left: left,
                            width: width,
                        });
                        marker.addClass('active');
                        current.removeClass('pxl-shape-active');
                    });
                    $(this).find('.pxl-menu-primary').mouseleave(function () {
                        marker.css({
                            left: current.position().left,
                            width: current.outerWidth()
                        });
                        current.addClass('pxl-shape-active');
                    });
                }
            } else {
                var marker = $(this).find('.pxl-divider-move');
                var current = $(this).find('.pxl-menu-primary > li:nth-child(1)');
                marker.css({
                    left: current.position().left,
                    width: current.outerWidth(),
                    display: "block"
                });
                if (Modernizr.csstransitions) {
                    $(this).find('.pxl-menu-primary > li').mouseover(function () {
                        var self = $(this),
                            offsetLeft = self.position().left,
                            width = self.outerWidth() || current.outerWidth(),
                            left = offsetLeft == 0 ? 0 : offsetLeft || current.position().left;
                        marker.css({
                            left: left,
                            width: width,
                        });
                        marker.addClass('active');
                    });
                    $(this).find('.pxl-menu-primary').mouseleave(function () {
                        marker.css({
                            left: current.position().left,
                            width: current.outerWidth()
                        });
                        marker.removeClass('active');
                    });
                }
            }
        });
    }

    /* Back To Top Progress Bar */
    function foliohub_backtotop_progess_bar() {
        if ($('.pxl-scroll-top').length > 0) {
            var progressPath = document.querySelector('.pxl-scroll-top path');
            var pathLength = progressPath.getTotalLength();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
            progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
            var updateProgress = function () {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var progress = pathLength - (scroll * pathLength / height);
                progressPath.style.strokeDashoffset = progress;
            }
            updateProgress();
            $(window).scroll(updateProgress);
            var offset = 50;
            var duration = 550;
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > offset) {
                    $('.pxl-scroll-top').addClass('active-progress');
                } else {
                    $('.pxl-scroll-top').removeClass('active-progress');
                }
            });
        }
    }

    /* Custom Type File Upload*/
    function foliohub_type_file_upload() {

        var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
            isIE = /msie/i.test(navigator.userAgent);

        $.fn.pxl_custom_type_file = function () {

            return this.each(function () {

                var $file = $(this).addClass('pxl-file-upload-hidden'),
                    $wrap = $('<div class="pxl-file-upload-wrapper">'),
                    $button = $('<button type="button" class="pxl-file-upload-button">Choose File</button>'),
                    $input = $('<input type="text" class="pxl-file-upload-input" placeholder="No File Choose" />'),
                    $label = $('<label class="pxl-file-upload-button" for="' + $file[0].id + '">Choose File</label>');
                $file.css({
                    position: 'absolute',
                    opacity: '0',
                    visibility: 'hidden'
                });

                $wrap.insertAfter($file)
                    .append($file, $input, (isIE ? $label : $button));

                $file.attr('tabIndex', -1);
                $button.attr('tabIndex', -1);

                $button.click(function () {
                    $file.focus().click();
                });

                $file.change(function () {

                    var files = [], fileArr, filename;

                    if (multipleSupport) {
                        fileArr = $file[0].files;
                        for (var i = 0, len = fileArr.length; i < len; i++) {
                            files.push(fileArr[i].name);
                        }
                        filename = files.join(', ');
                    } else {
                        filename = $file.val().split('\\').pop();
                    }

                    $input.val(filename)
                        .attr('title', filename)
                        .focus();
                });

                $input.on({
                    blur: function () { $file.trigger('blur'); },
                    keydown: function (e) {
                        if (e.which === 13) {
                            if (!isIE) {
                                $file.trigger('click');
                            }
                        } else if (e.which === 8 || e.which === 46) {
                            $file.replaceWith($file = $file.clone(true));
                            $file.trigger('change');
                            $input.val('');
                        } else if (e.which === 9) {
                            return;
                        } else {
                            return false;
                        }
                    }
                });

            });

        };
        $('.wpcf7-file[type=file]').pxl_custom_type_file();
    }

    $(".pxl-marquee__style-1").each(function () {
        var $marquee = $(this);
        var $list = $marquee.find("ul");
        var $items = $marquee.find("li.pxl-marquee__item");

        if ($items.length === 0) return;

        for (var i = 0; i < $items.length; i++) {
            $items.eq(i).clone(true).appendTo($list);
        }

        if ($marquee.hasClass("pxl-marquee__pause-on-hover")) {
            $list
                .on("mouseenter", function () {
                    $(this).css("animation-play-state", "paused");
                })
                .on("mouseleave", function () {
                    $(this).css("animation-play-state", "running");
                });
        }

        var totalItems = $marquee.find("li.pxl-marquee__item").length;
        var currentDuration =
            parseFloat($list.css("animation-duration")) ||
            (function () {
                var inlineStyle = $list.attr("style");
                if (inlineStyle && inlineStyle.indexOf("animation-duration") !== -1) {
                    var match = inlineStyle.match(/animation-duration:\s*([0-9.]+)s/);
                    return match ? parseFloat(match[1]) : 10;
                }
                return 10;
            })();

        var adjustedDuration = (currentDuration * totalItems) / $items.length;
        $list.css("animation-duration", adjustedDuration + "s");
    });


    //Shop View Grid/List
    function foliohub_shop_view_layout() {

        $(document).on('click', '.pxl-view-layout .view-icon a', function (e) {
            e.preventDefault();
            if (!$(this).parent('li').hasClass('active')) {
                $('.pxl-view-layout .view-icon').removeClass('active');
                $(this).parent('li').addClass('active');
                $(this).parents('.pxl-content-area').find('ul.products').removeAttr('class').addClass($(this).attr('data-cls'));
            }
        });
    }

    function foliohub_height_ct_grid($scope) {
        $('.pxl-portfolio-grid-layout1 .pxl-grid-item,.pxl-portfolio-carousel2 .pxl-swiper-slide').each(function () {
            var elementHeight = $(this).find(".pxl-post-content-hide").height();
            $(this).find(".pxl-post-content-hide").css("margin-bottom", "-" + elementHeight + "px");
        });

        $('.pxl-icon-box7').each(function () {
            var elementHeight2 = $(this).find(".pxl-item--description").height();
            $(this).find(".pxl-item--description").css("margin-bottom", "-" + elementHeight2 + "px");
        });
    }
    // Zoom Point
    function foliohub_zoom_point() {
        $(".pxl-zoom-point").each(function () {

            let scaleOffset = $(this).data('offset');
            let scaleAmount = $(this).data('scale-mount');

            function scrollZoom() {
                const images = document.querySelectorAll("[data-scroll-zoom]");
                let scrollPosY = 0;
                scaleAmount = scaleAmount / 100;

                const observerConfig = {
                    rootMargin: "0% 0% 0% 0%",
                    threshold: 0
                };

                images.forEach(image => {
                    let isVisible = false;
                    const observer = new IntersectionObserver((elements, self) => {
                        elements.forEach(element => {
                            isVisible = element.isIntersecting;
                        });
                    }, observerConfig);

                    observer.observe(image);

                    image.style.transform = `scale(${1 + scaleAmount * percentageSeen(image)})`;

                    window.addEventListener("scroll", () => {
                        if (isVisible) {
                            scrollPosY = window.pageYOffset;
                            image.style.transform = `scale(${1 +
                                scaleAmount * percentageSeen(image)})`;
                        }
                    });
                });

                function percentageSeen(element) {
                    const parent = element.parentNode;
                    const viewportHeight = window.innerHeight;
                    const scrollY = window.scrollY;
                    const elPosY = parent.getBoundingClientRect().top + scrollY + scaleOffset;
                    const borderHeight = parseFloat(getComputedStyle(parent).getPropertyValue('border-bottom-width')) + parseFloat(getComputedStyle(element).getPropertyValue('border-top-width'));
                    const elHeight = parent.offsetHeight + borderHeight;

                    if (elPosY > scrollY + viewportHeight) {
                        return 0;
                    } else if (elPosY + elHeight < scrollY) {
                        return 100;
                    } else {
                        const distance = scrollY + viewportHeight - elPosY;
                        let percentage = distance / ((viewportHeight + elHeight) / 100);
                        percentage = Math.round(percentage);

                        return percentage;
                    }
                }
            }

            scrollZoom();

        });
    }
    // animation column
    function initScaleOnScroll(selector = ".pxl-column-scale", distance = 900) {
        const elements = document.querySelectorAll(selector);
        if (!elements.length) return;
        gsap.registerPlugin(ScrollTrigger);
        elements.forEach(el => {
            el.style.willChange = "transform";
            const scaleValue = parseFloat(getComputedStyle(el).getPropertyValue('--scale-value')) || 0.9;
            gsap.to(el, {
                scale: scaleValue,
                ease: "power2.out",
                scrollTrigger: {
                    trigger: el,
                    start: "top top",
                    end: `+=${distance}`,
                    scrub: true
                }
            });
        });
    }

    //end animation column
    document.addEventListener("DOMContentLoaded", function () {
        const menu = document.querySelector('.pxl-header-menu');

        if (!menu) return;
        function preventBodyScroll(e) {
            const scrollTop = menu.scrollTop;
            const scrollHeight = menu.scrollHeight;
            const height = menu.clientHeight;
            const delta = e.deltaY;
            const isScrollingDown = delta > 0;
            const isScrollingUp = delta < 0;
            e.stopPropagation();
            if (isScrollingUp && scrollTop <= 0) {
                e.preventDefault();
            }
            if (isScrollingDown && (scrollTop + height >= scrollHeight - 1)) {
                e.preventDefault();
            }
        }
        menu.addEventListener('wheel', preventBodyScroll, { passive: false });
        menu.addEventListener('touchmove', preventBodyScroll, { passive: false });
        menu.addEventListener('mouseenter', function () {
            document.body.style.overflow = 'hidden';
        });

        menu.addEventListener('mouseleave', function () {
            document.body.style.overflow = '';
        });
    });
    // Start Js Foliohub

    function foliohub_button_parallax() {
        const $items = $('.pxl-client-carousel1 .pxl-item--inner');

        if ($items.length === 0) return;

        $items.on('mouseenter', function () {
            const $inner = $(this);
            gsap.set($inner, {
                transformOrigin: "50% 50%"
            });
        });

        $items.on('mousemove', function (e) {
            const $inner = $(this);

            const { left, top, width, height } = this.getBoundingClientRect();
            const centerX = left + width / 2;
            const centerY = top + height / 2;
            const deltaX = (e.clientX - centerX) * 0.444;
            const deltaY = (e.clientY - centerY) * 0.444;

            gsap.to($inner, {
                duration: 0.8,
                x: deltaX,
                y: deltaY,
                ease: "power3.out"
            });
        });

        $items.on('mouseleave', function () {
            const $inner = $(this);
            gsap.to($inner, {
                duration: 0.8,
                x: 0,
                y: 0,
                ease: "elastic.out(1, 0.3)"
            });
        });
    }

    function foliohub_check_scroll() {
        var $gridItems = $('.blinds_staggered');
        if ($gridItems.length === 0) return;

        var viewportBottom = $(window).scrollTop() + $(window).height();

        $gridItems.each(function () {
            var $gridItem = $(this);
            var elementTop = $gridItem.offset().top;
            var elementBottom = elementTop + $gridItem.outerHeight();

            if (elementTop < viewportBottom && elementBottom > $(window).scrollTop()) {
                $gridItem.addClass('visible');
            } else {
                $gridItem.removeClass('visible');
            }
        });
    }
    function pxlColorAnimation() {
        const targets = gsap.utils.toArray(".pxl-item--title.style-color-animation");
        if (targets.length === 0) return;

        gsap.registerPlugin(ScrollTrigger, SplitText);

        let splits = [];
        let resizeTimer;

        function init() {
            ScrollTrigger.getAll().forEach(trigger => {
                if (trigger.vars && trigger.vars.id && trigger.vars.id.startsWith('pxl-text-anim')) {
                    trigger.kill();
                }
            });

            if (splits.length > 0) {
                splits.forEach(split => split.revert());
                splits = [];
            }

            targets.forEach(target => {
                if (target.querySelectorAll('.pxl-anim-line').length > 0) {
                    target.innerHTML = target.textContent;
                }
            });

            targets.forEach((target, index) => {
                const split = new SplitText(target, {
                    type: "lines",
                    linesClass: "pxl-anim-line"
                });

                splits.push(split);

                split.lines.forEach((line, lineIndex) => {
                    gsap.to(line, {
                        backgroundPositionX: "0%",
                        ease: "none",
                        scrollTrigger: {
                            id: `pxl-text-anim-${index}-${lineIndex}`,
                            trigger: line,
                            scrub: 0.3,
                            start: "top 80%",
                            end: "bottom 60%",
                        }
                    });
                });
            });
        }
        const runInitSafe = () => {
            setTimeout(() => {
                init();
            }, 300);
        };

        if (document.readyState === 'complete') {
            runInitSafe();
        } else {
            window.addEventListener("load", runInitSafe);
        }
        init();
        window.addEventListener("resize", () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                init();
                ScrollTrigger.refresh();
            }, 200);
        });
    }
    // Add Active Click
    function initToggleActiveLayout1(
        selector = '.pxl-menu-hidden .pxl--item',
        activeClass = 'active'
    ) {
        const $elements = $(selector);
        if (!$elements.length) return;

        $(document).on('click', selector, function (e) {
            const $this = $(this);
            if ($this.is('a') && $this.attr('href') === '#') {
                e.preventDefault();
            }

            if ($this.hasClass(activeClass)) {
                $this.removeClass(activeClass);
                return;
            }

            $elements.removeClass(activeClass);
            $this.addClass(activeClass);
        }
        );
    }


    // Hover Active
    function initToggleActiveLayout2(selector = '.pxl-banner1 .pxl-item-content', activeClass = 'active') {
        const $elements = $(selector);
        if (!$elements.length) return;

        $elements.first().addClass(activeClass);
        $(document)
            .on('mouseenter', selector, function () {
                $elements.removeClass(activeClass);
                $(this).addClass(activeClass);
            }
            );
    }
    /////////
    function pxl_banner_scroll() {
        gsap.registerPlugin(ScrollTrigger);

        const banner = document.querySelector('.pxl-banner2');
        const media = window.matchMedia('(min-width: 1201px)');

        if (!banner || !media.matches) return;

        const banner_inner = banner.querySelector('.pxl-banner-inner');
        const items = banner.querySelectorAll('.pxl-item-content');
        const total = items.length;

        // ===== DESKTOP SCROLL MODE (NEW LOOP LOGIC) =====
        gsap.set(banner, {
            height: window.innerHeight * (total + 1)
        });
        items.forEach((item, i) => {
            gsap.set(item, {
                opacity: i === 0 ? 1 : 0,
                scale: i === 0 ? 1 : 0.8,
                zIndex: total - i
            });
        });
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: banner,
                start: "top top",
                end: "bottom bottom",
                scrub: true
            }
        });
        items.forEach((item, index) => {
            const segmentStart = index;

            tl.to({}, { duration: 1 });
            tl.to(item, {
                opacity: 1,
                scale: 1,
                duration: 0.3,
                onUpdate: () => {
                    const percent = ((index + 1) / total) * 100;
                    banner_inner.style.setProperty('--pxl-gradient-end', (percent * 3.6) + 'deg');
                }
            }, segmentStart);
            if (index > 0) {
                tl.to(items[index - 1], {
                    opacity: 0,
                    scale: 0.8,
                    duration: 0.3
                }, segmentStart);
            }
        });
    }

    function pxl_custom_video_animation() {
        if (window.innerWidth <= 1200) return;
        gsap.registerPlugin(ScrollTrigger);
        const el = document.querySelector(".pxl-custom-video-animation");
        if (!el) return;

        gsap.fromTo(
            el,
            { scale: 0.45 },
            {
                scale: 1,
                ease: "linear",
                scrollTrigger: {
                    trigger: el,
                    start: "top 40%",
                    end: "bottom 80%",
                    scrub: true,
                }
            }
        );
        window.addEventListener("resize", () => {
            ScrollTrigger.refresh();
        });
    }


    function testimonial_hover() {
        if (window.innerWidth <= 1200) return;
        const list = document.querySelector(".pxl-testimonial-list2");
        if (!list) return;

        const items = list.querySelectorAll(".pxl-item");
        if (!items.length) return;

        gsap.from(items, {
            x: 200,
            opacity: 0,
            rotate: -12,
            duration: 0.8,
            ease: "power3.out",
            stagger: 0.15,
            scrollTrigger: {
                trigger: list,
                start: "top 50%",
                toggleActions: "play none none none"
            }
        });


        items.forEach((item, index) => {

            item.addEventListener("mouseenter", () => {
                gsap.set(item, { zIndex: 999 });
                gsap.to(item, {
                    rotate: 0,
                    scale: 1.08,
                    duration: 0.35,
                    ease: "power3.out"
                });
                items.forEach((other, i) => {
                    if (i < index) {
                        gsap.to(other, {
                            x: -100,
                            rotate: "-10deg",
                            duration: 0.35,
                            ease: "power3.out"
                        });
                    } else if (i > index) {
                        // sau
                        gsap.to(other, {
                            x: 100,
                            rotate: "10deg",
                            duration: 0.35,
                            ease: "power3.out"
                        });
                    }
                });

            });


            item.addEventListener("mouseleave", () => {
                gsap.set(item, { zIndex: 1 });

                gsap.to(item, {
                    rotate: item.matches(":nth-child(even)") ? 6 : -6,
                    scale: 1,
                    x: 0,
                    duration: 0.35,
                    ease: "power3.out"
                });
                items.forEach((other) => {
                    if (other !== item) {
                        gsap.set(other, { zIndex: 1 });

                        gsap.to(other, {
                            x: 0,
                            rotate: other.matches(":nth-child(even)") ? 6 : -6,
                            duration: 0.35,
                            ease: "power3.out"
                        });
                    }
                });
            });

        });
    }

    function pxlAnmBorder() {
        const items = document.querySelectorAll('.pxl-anm-border');
        if (items.length === 0) return;

        const PROXIMITY_THRESHOLD = 100;
        items.forEach(item => {
            const style = window.getComputedStyle(item);
            item.style.setProperty('--b-top', style.borderTopWidth);
            item.style.setProperty('--b-right', style.borderRightWidth);
            item.style.setProperty('--b-bottom', style.borderBottomWidth);
            item.style.setProperty('--b-left', style.borderLeftWidth);
        });
        document.addEventListener('mousemove', (e) => {
            const mouseX = e.clientX;
            const mouseY = e.clientY;

            items.forEach(item => {
                const rect = item.getBoundingClientRect();

                const isNear = (
                    mouseX >= (rect.left - PROXIMITY_THRESHOLD) &&
                    mouseX <= (rect.right + PROXIMITY_THRESHOLD) &&
                    mouseY >= (rect.top - PROXIMITY_THRESHOLD) &&
                    mouseY <= (rect.bottom + PROXIMITY_THRESHOLD)
                );

                if (isNear) {
                    const x = mouseX - rect.left;
                    const y = mouseY - rect.top;

                    item.style.setProperty('--x', `${x}px`);
                    item.style.setProperty('--y', `${y}px`);
                    item.style.setProperty('--opacity', 1);
                } else {
                    item.style.setProperty('--opacity', 0);
                }
            });
        });
    }


    function pxl_prs_animation() {
        const items = document.querySelectorAll('.pxl-process1 .pxl-process-item');
        if (!items.length) return;

        const DURATION = 3000; // 3s
        let currentIndex = 0;
        let timer = null;

        function resetAnimation(el) {
            el.classList.remove('active');
            // force reflow để reset ::after
            void el.offsetHeight;
        }

        function activate(index) {
            clearTimeout(timer);

            items.forEach(item => resetAnimation(item));

            currentIndex = index;
            items[currentIndex].classList.add('active');

            timer = setTimeout(() => {
                let next = currentIndex + 1;
                if (next >= items.length) next = 0;
                activate(next);
            }, DURATION);
        }

        // init
        activate(0);

        // click active
        items.forEach((item, index) => {
            item.addEventListener('click', () => {
                activate(index);
            });
        });
    }












})(jQuery);