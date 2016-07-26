/*
 |--------------------------------------------------------------------------
 | Alpha, numeric, dash and underscores
 |--------------------------------------------------------------------------
 */
$.validator.addMethod("alpha_dash", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9-_]+$/i.test(value);
}, "Letters, numbers, dash and underscores only please");