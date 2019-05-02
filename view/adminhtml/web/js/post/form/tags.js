define([
    'ko',
    'jquery',
    'Magento_Ui/js/form/element/abstract',
    'Rrosello_Blog/js/lib/jquery.tokenize'
], function (ko, $, Abstract) {
    'use strict';

    /**
     * Update value
     * @param {Object} viewModel
     * @param {String} value
     */
    function updateValue(viewModel, value) {
        viewModel.value(value);
    }

    ko.bindingHandlers.blogTags = {

        /**
         * Init binding
         * @param  {Object} element
         * @param  {Function} valueAccessor
         * @param  {Object} allBindings
         * @param  {Object} viewModel
         */
        init: function (element, valueAccessor, allBindings, viewModel) {
            if (valueAccessor()) {
                $('#' + element.id).tokenize({

                    /**
                     * Calls callback when event is triggered
                     * @param  {String} value
                     * @param  {String} text
                     * @param  {Object} tokenize
                     */
                    onAddToken: function (value, text, tokenize) {
                        updateValue(viewModel, tokenize.select.val());
                    },

                    /**
                     * Calls callback when event is triggered
                     * @param  {String} value
                     * @param  {Object} tokenize
                     */
                    onRemoveToken: function (value, tokenize) {
                        updateValue(viewModel, tokenize.select.val());
                    }
                });
            }
        }
    };

    return Abstract.extend({
        defaults: {
            template: 'Rrosello_Blog/js/post/form/tags'
        }
    });
});
