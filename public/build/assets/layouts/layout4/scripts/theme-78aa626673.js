var Theme = function () {

    var panel = $('.theme-panel');

    var lastSelectedLayout = '';

    var layoutOption = $('.layout-option', panel).val();
    var sidebarOption = $('.sidebar-option', panel).val();
    var headerOption = $('.page-header-option', panel).val();
    var footerOption = $('.page-footer-option', panel).val();
    var sidebarPosOption = $('.sidebar-pos-option', panel).val();
    var sidebarStyleOption = $('.sidebar-style-option', panel).val();
    var sidebarMenuOption = $('.sidebar-menu-option', panel).val();
    var headerTopDropdownStyle = $('.page-header-top-dropdown-style-option', panel).val();

    // Handle Theme Settings
    var handleTheme = function () {

        $('.sidebar-option', panel).val("default");
        $('.page-header-option', panel).val("fixed");
        $('.page-footer-option', panel).val("default");
        if ($('.sidebar-pos-option').attr("disabled") === false) {
            $('.sidebar-pos-option', panel).val(App.isRTL() ? 'right' : 'left');
        }

        //handle theme layout
        var resetLayout = function () {
            $("body").
            removeClass("page-boxed").
            removeClass("page-footer-fixed").
            removeClass("page-sidebar-fixed").
            removeClass("page-header-fixed").
            removeClass("page-sidebar-reversed");

            $('.page-header > .page-header-inner').removeClass("container");

            if ($('.page-container').parent(".container").size() === 1) {
                $('.page-container').insertAfter('body > .clearfix');
            }

            if ($('.page-footer > .container').size() === 1) {
                $('.page-footer').html($('.page-footer > .container').html());
            } else if ($('.page-footer').parent(".container").size() === 1) {
                $('.page-footer').insertAfter('.page-container');
                $('.scroll-to-top').insertAfter('.page-footer');
            }

            $(".top-menu > .navbar-nav > li.dropdown").removeClass("dropdown-dark");

            $('body > .container').remove();
        };

        var setLayout = function () {

            var layoutOption = $('.layout-option', panel).val();
            var sidebarOption = $('.sidebar-option', panel).val();
            var headerOption = $('.page-header-option', panel).val();
            var footerOption = $('.page-footer-option', panel).val();
            var sidebarPosOption = $('.sidebar-pos-option', panel).val();
            var sidebarMenuOption = $('.sidebar-menu-option', panel).val();
            var headerTopDropdownStyle = $('.page-header-top-dropdown-style-option', panel).val();


            if (sidebarOption == "fixed" && headerOption == "default") {
                bootbox.alert("<em>Varsayılan başlık</em> ayarı ile <em>kayan yan menü</em> desteklenmiyor. Lütfen <em>kayan yan menü</em> ayarını, <em>kayan başlık</em> ayarı ile birlikte kullan.");
                $('.page-header-option', panel).val("fixed");
                $('.sidebar-option', panel).val("fixed");
                return false;
            }
            // eğer sidebar menu hover ve sidebar fixed ise geri dön
            if (sidebarMenuOption === 'hover' && sidebarOption == 'fixed') {
                bootbox.alert("<em>Yan menü üzerine gelme</em> ayarı ile <em>kayan yan menü</em> uyumlu değil. Lütfen <em>yan menü üzerine gelme</em> ayarını, <em>varsayılan yan menü</em> ayarı ile birlikte kullan.");
                $('.sidebar-menu-option', panel).val("accordion");
                return false;
            }

            /**
             * Ajax işlemi yapılır ve başarılı ise devam edilir
             */
            $.ajax({
                type: 'GET',
                url: themeLayoutChangeApiUrl,
                data: {
                    layout              : layoutOption,
                    header              : headerOption,
                    headerTopDropdown   : headerTopDropdownStyle,
                    sidebar             : sidebarOption,
                    sidebarMenu         : sidebarMenuOption,
                    sidebarPos          : sidebarPosOption,
                    footer              : footerOption
                },
                success: function(data) {
                    resetLayout(); // reset layout to default state
                    handleLayoutChange(layoutOption);
                    handleHeaderChange(headerOption);
                    handleDropdownChange(headerTopDropdownStyle);
                    handleSidebarChange(sidebarOption);
                    handleSidebarMenuChange(sidebarMenuOption);
                    handleSidebarPositionChange(sidebarPosOption);
                    handleFooterChange(footerOption);

                    Layout.fixContentHeight(); // fix content height
                    Layout.initFixedSidebar(); // reinitialize fixed sidebar
                }
            });
        };

        // theme color change
        $('.theme-colors > li', panel).click(function () {
            var el = $(this);
            var color = el.attr("data-theme");
            $.ajax({
                type: 'GET',
                url: themeColorChangeApiUrl,
                data: {
                    color               : color
                },
                success: function(data) {
                    handleSetColor(color);
                    $('ul > li', panel).removeClass("active");
                    el.addClass("active");

                    var user_font = $('li.dropdown-user span.username');
                    switch (color)
                    {
                        case 'light':
                            user_font.removeClass('font-white');
                            break;
                        default:
                            user_font.addClass('font-white');
                            break;
                    }
                }
            });
        });

        // set default theme options:

        if ($("body").hasClass("page-boxed")) {
            $('.layout-option', panel).val("boxed");
        }

        if ($("body").hasClass("page-sidebar-fixed")) {
            $('.sidebar-option', panel).val("fixed");
        }

        if ($("body").hasClass("page-header-fixed")) {
            $('.page-header-option', panel).val("fixed");
        }

        if ($("body").hasClass("page-footer-fixed")) {
            $('.page-footer-option', panel).val("fixed");
        }

        if ($("body").hasClass("page-sidebar-reversed")) {
            $('.sidebar-pos-option', panel).val("right");
        }

        if ($(".page-sidebar-menu").hasClass("page-sidebar-menu-light")) {
            $('.sidebar-style-option', panel).val("light");
        }

        if ($(".page-sidebar-menu").hasClass("page-sidebar-menu-hover-submenu")) {
            $('.sidebar-menu-option', panel).val("hover");
        }        

        var sidebarOption = $('.sidebar-option', panel).val();
        var headerOption = $('.page-header-option', panel).val();
        var footerOption = $('.page-footer-option', panel).val();
        var sidebarPosOption = $('.sidebar-pos-option', panel).val();
        var sidebarStyleOption = $('.sidebar-style-option', panel).val();
        var sidebarMenuOption = $('.sidebar-menu-option', panel).val();

        $('.layout-option, .page-header-top-dropdown-style-option, .page-header-option, .sidebar-option, .page-footer-option, .sidebar-pos-option, .sidebar-style-option, .sidebar-menu-option', panel).change(setLayout);
    };

    var handleLayoutChange = function(layout)
    {
        if (layout === "boxed") {
            $("body").addClass("page-boxed");

            // set header
            $('.page-header > .page-header-inner').addClass("container");
            var cont = $('body > .clearfix').after('<div class="container"></div>');

            // set content
            $('.page-container').appendTo('body > .container');

            // set footer
            if (footerOption === 'fixed') {
                $('.page-footer').html('<div class="container">' + $('.page-footer').html() + '</div>');
            } else {
                $('.page-footer').appendTo('body > .container');
            }
        }

        if (lastSelectedLayout != layout) {
            //layout changed, run responsive handler:
            App.runResizeHandlers();
        }
        lastSelectedLayout = layout;
    };

    var handleHeaderChange = function(header)
    {
        if (header === 'fixed') {
            $("body").addClass("page-header-fixed");
            $(".page-header").removeClass("navbar-static-top").addClass("navbar-fixed-top");
        } else {
            $("body").removeClass("page-header-fixed");
            $(".page-header").removeClass("navbar-fixed-top").addClass("navbar-static-top");
        }
    };

    var handleDropdownChange = function(dropdown)
    {
        if (dropdown === 'dark') {
            $(".top-menu > .navbar-nav > li.dropdown").addClass("dropdown-dark");
        } else {
            $(".top-menu > .navbar-nav > li.dropdown").removeClass("dropdown-dark");
        }
    };

    var handleSidebarMenuChange = function(sidebarMenu)
    {
        if (sidebarMenu === 'hover') {
            $(".page-sidebar-menu").addClass("page-sidebar-menu-hover-submenu");
        } else {
            $(".page-sidebar-menu").removeClass("page-sidebar-menu-hover-submenu");
        }
    };

    var handleSidebarChange = function(sidebar)
    {
        if ($('body').hasClass('page-full-width') === false) {
            if (sidebar === 'fixed') {
                $("body").addClass("page-sidebar-fixed");
                $('.page-sidebar-menu').addClass("page-sidebar-menu-fixed");
                $('.page-sidebar-menu').removeClass("page-sidebar-menu-default");
                Layout.initFixedSidebarHoverEffect();
            } else {
                $("body").removeClass("page-sidebar-fixed");
                $('.page-sidebar-menu').addClass("page-sidebar-menu-default");
                $('.page-sidebar-menu').removeClass("page-sidebar-menu-fixed");
                $('.page-sidebar-menu').unbind('mouseenter').unbind('mouseleave');
            }
        }
    };

    var handleSidebarPositionChange = function(sidebarPosition)
    {
        if (sidebarPosition === 'right') {
            $("body").addClass("page-sidebar-reversed");
            $('#frontend-link').tooltip('destroy').tooltip({
                placement: 'left'
            });
        } else {
            $("body").removeClass("page-sidebar-reversed");
            $('#frontend-link').tooltip('destroy').tooltip({
                placement: 'right'
            });
        }
    };

    var handleFooterChange = function(footerOption)
    {
        if (footerOption === 'fixed') {
            $("body").addClass("page-footer-fixed");
        } else {
            $("body").removeClass("page-footer-fixed");
        }
    };

    var handleSetColor = function (color) {
        $('#style_color').attr("href", '/vendor/laravel-modules-core/assets/layouts/layout4/css/themes/' + color + "-theme.css");
        $('.logo-default').prop('src', '/' + logos[color]);
    };

    return {
        init: function()
        {
            handleTheme();
        },
        initLayoutChange: function(layout)
        {
            handleLayoutChange(layout);
            this.initLayout();
        },
        initHeaderChange: function(header)
        {
            handleHeaderChange(header);
            this.initLayout();
        },
        initDropdownChange: function(dropdown)
        {
            handleDropdownChange(dropdown);
            this.initLayout();
        },
        initSidebarChange: function(sidebar)
        {
            handleSidebarChange(sidebar);
            this.initLayout();
        },
        initSidebarMenuChange: function(sidebarMenu)
        {
            handleSidebarMenuChange(sidebarMenu);
            this.initLayout();
        },
        initSidebarPositionChange: function(sidebarPosition)
        {
            handleSidebarPositionChange(sidebarPosition);
            this.initLayout();
        },
        initFooterChange: function(footer)
        {
            handleFooterChange(footer);
            this.initLayout();
        },
        initLayout: function()
        {
            Layout.fixContentHeight(); // fix content height
            Layout.initFixedSidebar(); // reinitialize fixed sidebar
        }
    };

}();