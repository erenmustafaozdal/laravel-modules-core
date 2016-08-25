/*
 |--------------------------------------------------------------------------
 | Alpha, numeric, dash and underscores
 |--------------------------------------------------------------------------
 */
$.validator.addMethod("alpha_dash", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9-_]+$/i.test(value);
}, "Letters, numbers, dash and underscores only please");



/*
 |--------------------------------------------------------------------------
 | Url
 |--------------------------------------------------------------------------
 */
$.validator.addMethod("url", function(value, element) {
    return this.optional(element) || /^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(value);
}, "Valid url format please!");