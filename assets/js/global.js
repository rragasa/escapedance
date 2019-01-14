/* global escapedanceholidayScreenReaderText */
(function ($) {

  // Variables and DOM Caching.
  var $body = $('body'),
    $customHeader = $body.find('.custom-header'),
    $branding = $customHeader.find('.site-branding'),
    $navigation = $body.find('.navigation-top'),
    $menuToggle = $navigation.find('.menu-toggle'),
    $sidebar = $body.find('#secondary'),
    $entryContent = $body.find('.entry-content'),
    $formatQuote = $body.find('.format-quote blockquote'),
    isFrontPage = $body.hasClass('escapedanceholiday-front-page') || $body.hasClass('home blog'),
    navigationOuterHeight,
    resizeTimer;


  // Set margins of branding in header.
  function adjustHeaderHeight() {
    if ('none' === $menuToggle.css('display')) {

      // The margin should be applied to different elements on front-page or home vs interior pages.
      if (isFrontPage) {
        $branding.css('margin-bottom', navigationOuterHeight);
      } else {
        $customHeader.css('margin-bottom', navigationOuterHeight);
      }

    } else {
      $customHeader.css('margin-bottom', '0');
      $branding.css('margin-bottom', '0');
    }
  }

  // Set icon for quotes.
  function setQuotesIcon() {
    $(escapedanceholidayScreenReaderText.quote).prependTo($formatQuote);
  }

  // Add 'below-entry-meta' class to elements.
  function belowEntryMetaClass(param) {
    var sidebarPos, sidebarPosBottom;

    if (!$body.hasClass('has-sidebar') || (
      $body.hasClass('search') ||
      $body.hasClass('single-attachment') ||
      $body.hasClass('error404') ||
      $body.hasClass('escapedanceholiday-front-page')
    )) {
      return;
    }

    sidebarPos = $sidebar.offset();
    sidebarPosBottom = sidebarPos.top + ($sidebar.height() + 28);

    $entryContent.find(param).each(function () {
      var $element = $(this),
        elementPos = $element.offset(),
        elementPosTop = elementPos.top;

      // Add 'below-entry-meta' to elements below the entry meta.
      if (elementPosTop > sidebarPosBottom) {
        $element.addClass('below-entry-meta');
      } else {
        $element.removeClass('below-entry-meta');
      }
    });
  }

	/*
	 * Test if inline SVGs are supported.
	 * @link https://github.com/Modernizr/Modernizr/
	 */
  function supportsInlineSVG() {
    var div = document.createElement('div');
    div.innerHTML = '<svg/>';
    return 'http://www.w3.org/2000/svg' === ('undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI);
  }

	/**
	 * Test if an iOS device.
	*/
  function checkiOS() {
    return /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
  }

	/*
	 * Test if background-attachment: fixed is supported.
	 * @link http://stackoverflow.com/questions/14115080/detect-support-for-background-attachment-fixed
	 */
  function supportsFixedBackground() {
    var el = document.createElement('div'),
      isSupported;

    try {
      if (!('backgroundAttachment' in el.style) || checkiOS()) {
        return false;
      }
      el.style.backgroundAttachment = 'fixed';
      isSupported = ('fixed' === el.style.backgroundAttachment);
      return isSupported;
    }
    catch (e) {
      return false;
    }
  }

  // Fire on document ready.
  $(document).ready(function () {

    // If navigation menu is present on page, setNavProps and adjustScrollClass.
    if ($navigation.length) {
      setNavProps();
      adjustScrollClass();
    }

    adjustHeaderHeight();
    setQuotesIcon();
    if (true === supportsInlineSVG()) {
      document.documentElement.className = document.documentElement.className.replace(/(\s*)no-svg(\s*)/, '$1svg$2');
    }

    if (true === supportsFixedBackground()) {
      document.documentElement.className += ' background-fixed';
    }
  });

  // If navigation menu is present on page, adjust it on scroll and screen resize.
  if ($navigation.length) {

    // On scroll, we want to stick/unstick the navigation.
    $(window).on('scroll', function () {
      adjustScrollClass();
      adjustHeaderHeight();
    });

    // Also want to make sure the navigation is where it should be on resize.
    $(window).resize(function () {
      setNavProps();
      setTimeout(adjustScrollClass, 500);
    });
  }

  $(window).resize(function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      belowEntryMetaClass('blockquote.alignleft, blockquote.alignright');
    }, 300);
    setTimeout(adjustHeaderHeight, 1000);
  });

  // Add header video class after the video is loaded.
  $(document).on('wp-custom-header-video-loaded', function () {
    $body.addClass('has-header-video');
  });

})(jQuery);
