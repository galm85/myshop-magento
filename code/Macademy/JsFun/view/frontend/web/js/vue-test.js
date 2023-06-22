define(['vue','jquery','Macademy_JsFun/js/jquery-log'],function(Vue,$){
    'use strict'


    $.log('This is the console output');

    return function(config,element){
        return new Vue({
            el:'#' + element.id,
            data:{
                message:config.message
            }
        })
    }


})
