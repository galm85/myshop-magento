define([
    'ko'
],function(
    ko
){
    const boxConfiguration = ()=>{

        const divisor = 139;
        const data = {
            length: ko.observable(),
            width: ko.observable(),
            height: ko.observable(),
            weight: ko.observable(),
            unitsPerBox: ko.observable(),
            numberOfBoxes: ko.observable(),
        }

        data.dimensionalWeight =  ko.computed(()=>{
            const result = data.length() * data.width() * data.height() / divisor;
            return Math.round(result * data.numberOfBoxes());
        })

        data.totalWeight = ko.computed(()=>{
            const result = data.numberOfBoxes() * data.weight();
            return result;
        })

        data.billableWeight = ko.computed(()=>{
            return data.dimensionalWeight() > data.totalWeight() ? data.dimensionalWeight() : data.totalWeight();
        })

        return data;
    }

    return{
        boxConfigurations: ko.observableArray([boxConfiguration()]),
        add: function(){
            this.boxConfigurations.push(boxConfiguration());
        },
        delete: function(index){
            this.boxConfigurations.splice(index,1);
        }

    }
})