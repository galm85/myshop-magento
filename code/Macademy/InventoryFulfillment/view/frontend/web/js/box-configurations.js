define([
    'uiComponent',
    'ko',
    'Macademy_InventoryFulfillment/js/model/box-configurations',
    'Macademy_InventoryFulfillment/js/model/sku'
],function(
    Component,
    ko,
    boxConfigurationsModel,
    skuModel
){
   'use strict';

   return Component.extend({

       defaults:{
           boxConfigurationsPrimitive:ko.observableArray(['abc','def']),
           boxConfigurationsObjects:ko.observableArray([
               {
                   length:20,
                   width:10,
                   height:30
               },
               {
                   length:12,
                   width:27,
                   height:9
               }
           ]),
           boxConfigurationsModel: boxConfigurationsModel,
       },

       initialize(){
           this._super();
           console.log('This is the boxConfiguration Component');
           skuModel.isSuccess.subscribe((value)=>{
               console.log('sku sucess: ',value);
           });
           skuModel.isSuccess.subscribe((value)=>{
               console.log('sku sucess old value: ',value);
           },null,'beforeChange');
        },

       handleAdd(){
           // this.boxConfigurations.push(boxConfiguration());
           boxConfigurationModel.add();
       },

       handleDelete(index){
            console.log('this',this);
            console.log('index',index);
            // this.boxConfigurations.splice(index,1);
           boxConfigurationModel.delete(index);
       },

       handleSubmit(){
           console.log('submit');
       }

    })
});