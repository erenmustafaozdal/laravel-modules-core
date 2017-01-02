/**
Core script to handle the entire theme and core functions
**/
var QuickSidebar = function () {

    // Handles quick sidebar toggler
    var handleQuickSidebarToggler = function () {
        // quick sidebar toggler
        $('.dropdown-quick-sidebar-toggler a, .page-quick-sidebar-toggler, .quick-sidebar-toggler').click(function (e) {
            $('body').toggleClass('page-quick-sidebar-open'); 
        });
    };

    // Handles quick sidebar settings
    var handleQuickSidebarSettings = function () {
        var wrapper = $('.page-quick-sidebar-wrapper');

        var initSettingssSlimScroll = function () {
            var settingsList = wrapper.find('.page-quick-sidebar-settings-list');
            var settingsListHeight;

            settingsListHeight = wrapper.height() - 80 - wrapper.find('.nav-justified > .nav-tabs').outerHeight();

            // alerts list
            App.destroySlimScroll(settingsList);
            settingsList.attr("data-height", settingsListHeight);
            App.initSlimScroll(settingsList);
        };

        initSettingssSlimScroll();
        App.addResizeHandler(initSettingssSlimScroll); // reinitialize on window resize
    };

    return {

        init: function () {
            //layout handlers
            handleQuickSidebarToggler(); // handles quick sidebar's toggler
            handleQuickSidebarSettings(); // handles quick sidebar's settings
        }
    };

}();

jQuery(document).ready(function() {
   QuickSidebar.init(); // init metronic core componets
});