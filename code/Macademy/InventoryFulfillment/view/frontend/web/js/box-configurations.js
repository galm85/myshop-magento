define([
    'uiComponent',
    'ko'
],function(
    Component,
    ko
){
   'use strict';

   const boxConfiguration = ()=>{

       return{
           length: ko.observable(),
           width: ko.observable(),
           height: ko.observable(),
           weight: ko.observable(),
           unitsPerBox: ko.observable(),
           numberOfBoxes: ko.observable(),
       }
   }


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
           boxConfigurations: ko.observableArray([boxConfiguration()]),
       },

       initialize(){
           this._super();
           console.log('This is the boxConfiguration Component');
        },

       handleAdd(){
           this.boxConfigurations.push(boxConfiguration());
       },

       handleDelete(index){
            console.log('this',this);
            console.log('index',index);
            this.boxConfigurations.splice(index,1);
       },

       handleSubmit(){
           console.log('submit');
       }

    })
});