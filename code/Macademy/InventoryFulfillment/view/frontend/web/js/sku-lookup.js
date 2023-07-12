define([
    'uiComponent',
    'ko',
    'mage/storage',
    'jquery',
    'mage/translate',
    'Macademy_InventoryFulfillment/js/model/sku'
],function(
    Component,
    ko,
    storage,
    $,
    $t,
    skuModel
    ){

    'use strict';

    return Component.extend({

        defaults:{
          // template:"Macademy_InventoryFulfillment/sku-lookup",
            sku: skuModel.sku,
            placeholder: $t('Example: %1').replace('%1','24-MB56'),
            messageResponse:ko.observable(''),
            isSuccess:skuModel.isSuccess
        },
        initialize(){
            this._super();
            console.log('The sku lookup')
        },
        handleSubmit(){
            this.messageResponse('');
            this.isSuccess(false);
            $('body').trigger('processStart');

            storage.get(`rest/V1/products/${this.sku()}`)
                .done(response => {
                    console.log(response);
                    // this.messageResponse(`Product Found! <b>${response.name}</b>`);
                    this.messageResponse( $t('Product Found! %1').replace('%1',`<b>${response.name}</b>`));
                    this.isSuccess(true);
                })
                .fail(()=>{
                    // this.messageResponse($.mage.__('Product not found!'));
                    this.messageResponse($t('Product not found!'));
                    this.isSuccess(false);
                })
                .always(()=>{
                    $('body').trigger('processStop');
                })
        }
    });


})