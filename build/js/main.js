//LET ME USE THE $ FOR JQUERY
window.$ = window.jQuery = jQuery;

let windowHeight = window.innerHeight;

EasingFunctions = {
    // no easing, no acceleration
    linear: t => t,
    // accelerating from zero velocity
    easeInQuad: t => t*t,
    // decelerating to zero velocity
    easeOutQuad: t => t*(2-t),
    // acceleration until halfway, then deceleration
    easeInOutQuad: t => t<.5 ? 2*t*t : -1+(4-2*t)*t,
    // accelerating from zero velocity
    easeInCubic: t => t*t*t,
    // decelerating to zero velocity
    easeOutCubic: t => (--t)*t*t+1,
    // acceleration until halfway, then deceleration
    easeInOutCubic: t => t<.5 ? 4*t*t*t : (t-1)*(2*t-2)*(2*t-2)+1,
    // accelerating from zero velocity
    easeInQuart: t => t*t*t*t,
    // decelerating to zero velocity
    easeOutQuart: t => 1-(--t)*t*t*t,
    // acceleration until halfway, then deceleration
    easeInOutQuart: t => t<.5 ? 8*t*t*t*t : 1-8*(--t)*t*t*t,
    // accelerating from zero velocity
    easeInQuint: t => t*t*t*t*t,
    // decelerating to zero velocity
    easeOutQuint: t => 1+(--t)*t*t*t*t,
    // acceleration until halfway, then deceleration
    easeInOutQuint: t => t<.5 ? 16*t*t*t*t*t : 1+16*(--t)*t*t*t*t
}

//Run mobile check and if on mobile, add mobile class to HTML tag.
let mounted = false;
mobilecheck = () => {
    var check = false;
    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
    return check;
};

let mobileDetected = mobilecheck(); 

if(mobileDetected == true){
    $("html").addClass("mobile");
};

//Initialize lazyloading.
let blazy = new Blazy({
    offset: 1000
});

//Add device agent specific classes.
let deviceAgent = navigator.userAgent.toLowerCase();

if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
    $("html").addClass("ios");
    $("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
    $("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
    $("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
    $("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
    $("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
    $("html").addClass("opera");
}

// Detect request animation frame
let scroll = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || window.oRequestAnimationFrame || /* IE Fallback, you can even fallback to onscroll*/ function(callback){ window.setTimeout(callback, 1000/60) };

//Navigational control.
navToggle = () => {
    $('body').toggleClass('nav-active');
    $('.hamburger--collapse').toggleClass('is-active');
}
$('.mobile-controls').on('click', function(){
    navToggle();
});


// Sticky Header
let header = $('header#header');
let headerHeight = header.height();
let promoBar = $('#promo-banner');
let promoHeight = promoBar.height() || 0;
let lastScrollY = window.scrollY;
let headerFixed = false;
let headerActive = false;

function stickyHeader()
{
    if(!promoBar.length) $('body').addClass('no-promo');
    
    function loop()
    {
        let delta = window.scrollY - lastScrollY; // 1(down), -1(up)

        if(window.scrollY > (headerHeight + promoHeight) && !headerFixed)
        {
            $('body').addClass('fixed');
            headerFixed = true;
        }

        if(window.scrollY <= (promoHeight) && headerFixed)
        {
            $('body').removeClass('fixed');
            headerFixed = false;
        }

        if(window.scrollY > (2 * (headerHeight + promoHeight)) && delta < 0 && !headerActive)
        {
            $('body').addClass('header-active');
            headerActive = true;
        }

        if(delta > 0 && headerActive)
        {
            $('body').removeClass('header-active');
            headerActive = false;
        }

        lastScrollY = window.scrollY;

        scroll(loop);
    }

    loop();
}
scroll(stickyHeader)


// RESOURCES QUERY SYSTEM 
if(document.getElementById('resource-module'))
{
    let button = $('.taxonomy button');
    let selectedFilters = {
		audiences : [],
		media_type : [],
        topics : []
	}; 
	let term, taxonomy, featuredBlock, resultsBlock, container, heading, isChecked, checkedTotal;
	
	function updateResults(button, data)
	{
		console.log(data);

		// 0 results with no selected options
		// Change header to 'nothing found'
		// Empty .results-inner
		if(!data.total && !checkedTotal)
		{
			console.log('test');
			$(container).hide();
			$(heading).empty().html('Nothing found');

			$(resultsBlock).hide();
			$(featuredBlock).show();
		}

		// 0 results with selected options
		if(!data.total && checkedTotal)
		{
			$(container).hide();
			$(heading).empty().html('Nothing found');

			$(resultsBlock).show();
			$(featuredBlock).hide();
		}

		// 1+
		// Update header
		// Add results to .results-inner
		if(data.total)
		{
			let string = 'Resources By Term: ';
			let counter = 0;

			for (const [key, value] of Object.entries(data.filters)) 
			{
				for(let i = 0; i < value.length; i++)
				{
					string += (counter) ? `<span id="term-${term}"><span class="comma">, </span>${value[i]}</span>` : `<span id="term-${term}">${value[i]}</span>`;
					counter++;
				}
			}

			$(heading).html(string); 
			$(container).html(data.html);

			$(featuredBlock).hide();
			$(resultsBlock).show();
			$(container).show();
		}
	}
    
    $(button).on('click', function(e)
	{
		let button = $(this);

		button.toggleClass('active');

		term = e.target.getAttribute('data-term'); 
		taxonomy = e.target.getAttribute('data-tax');
		featuredBlock = $('.results-container .featured');
		resultsBlock = $('#tax-query-results');
		container = $('#tax-query-results .results-inner');
		heading = $('#tax-query-results .results-header');
		isChecked =  $('.taxonomy button').hasClass('active');
		checkedTotal = $(document).find('.taxonomy button.active').length;

		if(button.hasClass('active'))
		{
			selectedFilters[taxonomy].push(term); 
		}
		else
		{
			let index = selectedFilters[taxonomy].indexOf(term);
			selectedFilters[taxonomy].splice(index, 1);
		}

		let dataObj = {
			'action' : 'get_resources', 
			'filters' : selectedFilters
		};

		$.ajax({
			url: loadmore_params.ajaxurl, // AJAX handler
			data: dataObj,
			dataType: 'json',
			type: 'POST',
			error: function(error)
			{
				console.log(error);
			}, 
			success: function(data)
			{
				updateResults(button, data);
			}
		});
	});
}


// FADE IN SCROLL HANDLER
let lastPosition = -1; // storing last scroll position which updates on throttled scroll listener - nothing takes place before it is changed
let slideUps = $('[data-scroll-effect]');
let slideUpArray = [];

function getFadeInModules()
{
    slideUpArray = []; // reset array

    // Setup array of elements and starting Y positions
    slideUps.each(function(i)
    {
        let ele = $(slideUps)[i];
        let height = $(ele).height();

        slideUpArray.push({ // no longer looking for value every time on scroll
            ele: ele,
            startY: $(ele).offset().top,
            height: height,
            type: $(ele).attr('data-scroll-effect')
        });
    });

    console.log(slideUpArray);
}

function letsTry(timestamp)
{
    getFadeInModules();

    function isElementInViewport(ele)
    {
        let offset = mobileDetected ? .35 : .35;
        let topViewport = window.pageYOffset;
        let bottomViewport = topViewport + windowHeight;
        let positionData = {inViewport: false, vertPosPercent: 0};
        let vertPosPercent = (bottomViewport - ele.startY) / (windowHeight * offset);

        if(vertPosPercent < 0) vertPosPercent = 0;
        if(vertPosPercent > 1) vertPosPercent = 1;

        positionData.vertPosPercent = vertPosPercent;

        if(vertPosPercent >= 0 || vertPosPercent <= 1) positionData.inViewport = true;

        return positionData;
    }

    function loop()
    {
        // Avoid calculations if not needed
        if (lastPosition == window.pageYOffset) // check position
        {
            scroll(loop);
            return false; // stops loop after firing once
        }

        lastPosition = window.pageYOffset; //update position

        // Loop through the elements so we can choose to animate or not
        for(let i = 0; i < slideUpArray.length; i++)
        {
            let ele = slideUpArray[i];
            let positionData = isElementInViewport(ele);
            let vertPosPercent = positionData.vertPosPercent;

            if(positionData.inViewport)
            {
                let easedPercent = EasingFunctions.easeInOutQuad(vertPosPercent);

                // All modules only fade in on mobile
                if(mobileDetected)
                {
                    $(ele.ele).css({
                        opacity: vertPosPercent
                    });

                    continue;
                }

                if(!ele.type)
                {
                    $(ele.ele).css({
                        opacity: vertPosPercent
                    });
                }

                if(ele.type == 'moduleSlideUp')
                {
                    $(ele.ele).css({
                        transform: 'scale('+ (.85 + (0.15 * vertPosPercent)) +')',
                        opacity: vertPosPercent
                    });
                }

                if(ele.type == 'moduleFadeIn')
                {
                    $(ele.ele).css({
                        opacity: vertPosPercent
                    });
                }

                if(ele.type == 'moduleSlideFromLeft')
                {
                    let easedPercent = EasingFunctions.easeInQuad(vertPosPercent);
                    $(ele.ele).css({
                        opacity: vertPosPercent,
                        transform: 'translate3d('+ (-100 + (easedPercent * 100)) +'%,0,0)'
                    })
                }

                if(ele.type == 'moduleSlideFromRight')
                {
                    let easedPercent = EasingFunctions.easeInQuad(vertPosPercent);
                    $(ele.ele).css({
                        opacity: vertPosPercent,
                        transform: 'translate3d('+ (100 - (easedPercent * 100)) +'%,0,0)'
                    })
                }

                if(ele.type == 'moduleSlideFromTop')
                {
                    $(ele.ele).css({
                        opacity: vertPosPercent,
                        transform: 'translate3d(0,'+ (-100 + (easedPercent * 100)) +'%, 0)'
                    })
                }

                if(ele.type == 'moduleSlideFromBottom')
                {
                    $(ele.ele).css({
                        opacity: vertPosPercent,
                        transform: 'translate3d(0,' + (100 - (easedPercent * 100)) + '%, 0)'
                    })
                }
            }
        }

        scroll( loop );
    }

    // Call the loop for the first time
    loop();
};
scroll(letsTry);