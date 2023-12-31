require(['jquery','slick'],function($){

    let materialsSlider = $('.materials > .pagebuilder-column-group');

    if(materialsSlider.length){

        materialsSlider.slick({
            slidesToScroll:1,
            swipeToSlid:true,
            slidesToShow:6,
            dots:false,
            infinite:true,
            arrows:true,
            responsive:[
                {
                    breakpoint:768,
                    settings: {
                        centerPadding: '60px',
                        centerMode: true,
                        arrows:false,
                        slidesToShow: 2,
                    }
                }
            ]
        })
    }

})
