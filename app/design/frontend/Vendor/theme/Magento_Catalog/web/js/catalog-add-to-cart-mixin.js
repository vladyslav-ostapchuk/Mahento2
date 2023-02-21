/**
 * 
 *https://magento.stackexchange.com/questions/141507/magento-2-open-minicart-when-item-is-added
   *https://circlesixdigital.com/a-great-use-for-require-js-mixins-the-catalog-add-to-cart-trick/
 */
define([
    'jquery'
], function ($) {
    return function () {
        $('[data-block="minicart"]').on('contentLoading', function () {
            $('[data-block="minicart"]').on('contentUpdated', function () {
                $('html, body').animate({ scrollTop: 0 }, 'slow');
                $('[data-block="minicart"]').find('[data-role="dropdownDialog"]').dropdownDialog("open");
            });
        });
    }
});