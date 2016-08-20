var NoUiSlider = {

    /**
     * options
     */
    options: {},

    /**
     * no ui slider init
     */
    init: function(options)
    {
        // default settings
        this.options = $.extend(true, this.getDefaultOptions(), options);

        var formElements = this.getElement();
        var slider = document.getElementById(this.options.src);

        noUiSlider.create(slider, this.options.nouislider);

        // adding event listner
        slider.noUiSlider.on('update', function( values, handle ){
            var value = values[handle];

            if (formElements.length == 1) {
                formElements[0].value = value;
            } else if ( handle ) {
                formElements[0].value = value;
            } else {
                formElements[1].value = value;
            }
        });
    },

    /**
     * get element or elements
     */
    getElement: function()
    {
        var elements = [];
        if (typeof this.options.formElements == 'string') {
            elements.push(document.getElementById(this.options.formElements));
            return elements;
        }
        for ( var i = 0; i < this.options.formElements.length; i++ ) {
            elements.push(document.getElementById(this.options.formElements[i]));
        }
        return elements;
    },

    /**
     * get default options
     */
    getDefaultOptions: function()
    {
        return {
            src: 'nouislider',
            formElements: '', // string or array
            nouislider: {
                start: [0,100], // number,[number], [number,number]
                step: 10,
                margin: 10,
                limit: 100,
                connect: true, // "lower", "upper", true, false
                animate: true, // true, false
                animationDuration: 300,
                orientation: 'horizontal', // "vertical", "horizontal"
                behaviour: 'tap-drag',
                tooltips: [ wNumb({ decimals: 0 }), wNumb({ decimals: 0 }) ], // false,true,formatter,[formatter or false]
                range: {
                    'min': 0,
                    'max': 100
                },
                pips: {
                    mode: 'values',
                    values: [20, 80],
                    density: 4
                },
                format: wNumb({
                    decimals: 3,
                    thousand: '.',
                    postfix: ''
                })
            }
        };
    }

};