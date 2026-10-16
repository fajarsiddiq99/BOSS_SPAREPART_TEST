(function () {
    'use strict';

    var loader = document.getElementById('page-loader');
    if (!loader) {
        return;
    }

    var startedAt = Date.now();
    var minimumVisibleTime = 500;
    var hideTimer;

    function showLoader() {
        window.clearTimeout(hideTimer);
        loader.classList.add('is-visible');
        loader.setAttribute('aria-hidden', 'false');
    }

    function hideLoader() {
        window.clearTimeout(hideTimer);
        loader.classList.remove('is-visible');
        loader.setAttribute('aria-hidden', 'true');
    }

    function finishInitialLoad() {
        var remainingTime = Math.max(0, minimumVisibleTime - (Date.now() - startedAt));
        hideTimer = window.setTimeout(hideLoader, remainingTime);
    }

    function isModifiedClick(event) {
        return event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey;
    }

    document.addEventListener('click', function (event) {
        if (event.defaultPrevented || isModifiedClick(event)) {
            return;
        }

        var link = event.target.closest('a[href]');
        if (!link || link.hasAttribute('download') || (link.target && link.target !== '_self')) {
            return;
        }

        var destination = new URL(link.href, window.location.href);
        if (
            destination.origin !== window.location.origin ||
            !['http:', 'https:'].includes(destination.protocol) ||
            (destination.pathname === window.location.pathname &&
                destination.search === window.location.search)
        ) {
            return;
        }

        showLoader();
    });

    document.addEventListener('submit', function (event) {
        var form = event.target;
        if (
            event.defaultPrevented ||
            form.target && form.target !== '_self' ||
            form.method.toLowerCase() === 'dialog'
        ) {
            return;
        }

        showLoader();
    });

    window.addEventListener('load', finishInitialLoad);
    window.addEventListener('pageshow', function (event) {
        if (event.persisted) {
            hideLoader();
        }
    });

    if (document.readyState === 'complete') {
        finishInitialLoad();
    }
})();
