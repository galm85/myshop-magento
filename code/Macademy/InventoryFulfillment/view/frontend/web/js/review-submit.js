define([
    'uiComponent',
    'ko',
    'Macademy_InventoryFulfillment/js/model/box-configurations',
    'Macademy_InventoryFulfillment/js/model/sku',
    'mage/url',
    'mage/storage'
],function (Component,ko,boxConfigurationModel,skuModel,url,storage){

    'use strict';


    return Component.extend({
        defaults:{
            isTermsChecked:ko.observable(false),
            shipmentWeight:boxConfigurationModel.shipmentWeight(),
            billableWeight:boxConfigurationModel.billableWeight(),
            numberOfBoxes:boxConfigurationModel.numberOfBoxes(),
            boxConfigurationsIsSuccess:boxConfigurationModel.isSuccess,
            boxConfigurations:boxConfigurationModel.boxConfigurations,
            sku:skuModel.sku
        },
        initialize(){
            this._super();
            console.log('Review Submit Component');
            this.canSubmit = ko.computed(()=>{
                return skuModel.isSuccess()
                    && boxConfigurationModel.isSuccess()
                    && this.isTermsChecked();

            });
        },
        handleSubmit() {
            if(this.canSubmit()){
                console.log('the forms review has been submitted');
                storage.post(this.getUrl(),{
                    'sku':skuModel.sku(),
                    'boxConfigurations':ko.toJSON(boxConfigurationModel.boxConfigurations)
                }).done(response=>console.log('Response: ',response))
                  .fail(err => console.log('Error: ',err));
            }else{
                console.log('the forms review has an error');
            }

        },
        getUrl(){
            return url.build('inventory-fulfillment/index/post');
        }
    })


})