/* global escapedanceholidayScreenReaderText */
(function ($) {

  // Variables and DOM Caching.
  var $body = $('body'),
    $sidebar = $body.find('#secondary'),
    $entryContent = $body.find('.entry-content'),
    $formatQuote = $body.find('.format-quote blockquote'),
    resizeTimer;

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

    setQuotesIcon();
    if (true === supportsInlineSVG()) {
      document.documentElement.className = document.documentElement.className.replace(/(\s*)no-svg(\s*)/, '$1svg$2');
    }

    if (true === supportsFixedBackground()) {
      document.documentElement.className += ' background-fixed';
    }
  });

  $(window).resize(function () {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      belowEntryMetaClass('blockquote.alignleft, blockquote.alignright');
    }, 300);
  });

  // Add header video class after the video is loaded.
  $(document).on('wp-custom-header-video-loaded', function () {
    $body.addClass('has-header-video');
  });

})(jQuery);
