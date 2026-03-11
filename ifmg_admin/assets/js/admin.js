// Basic empty JavaScript file for admin panel
$(document).ready(function () {
    console.log('IFMG CMS Loaded');

    // Modal logic
    window.openModal = function (id) {
        $('#' + id).removeClass('hidden').addClass('flex');
        $('body').addClass('overflow-hidden');
    }

    $(document).on('click', '.close-modal', function () {
        $(this).closest('[role="dialog"]').addClass('hidden').removeClass('flex');
        $('body').removeClass('overflow-hidden');
    });

    // Close modal on outside click
    $(document).on('click', '[role="dialog"]', function (e) {
        if ($(e.target).is('[role="dialog"] > div:first-child')) {
            $(this).addClass('hidden').removeClass('flex');
            $('body').removeClass('overflow-hidden');
        }
    });

    // Profile Dropdown logic
    $('.profile-trigger').on('click', function (e) {
        e.stopPropagation();
        $('#profileDropdown').toggleClass('hidden');
    });

    $(document).on('click', function () {
        $('#profileDropdown').addClass('hidden');
    });

    // Language Tab switches
    $(document).on('click', '.lang-tab-btn', function () {
        const lang = $(this).data('lang');
        const $container = $(this).closest('.space-y-3');

        // Update buttons
        $container.find('.lang-tab-btn').removeClass('active bg-white text-navy-900 shadow-sm').addClass('text-gray-400');
        $(this).addClass('active bg-white text-navy-900 shadow-sm').removeClass('text-gray-400');

        // Show/Hide fields
        $container.find('.lang-field-container').addClass('hidden');
        $container.find('.lang-field-container[data-lang="' + lang + '"]').removeClass('hidden');
    });
});
