//Begin!
jQuery(document).ready(function(){

// Slider Init
	$(window).load(function() {
			$('.flexslider').flexslider( {
				keyboardNav: 'true',	
				start: function(slider){ // init the height of the first item on start
		            var $new_height = slider.slides.eq(0).height();
		                
		            /* add a current class to the active item */
		            slider.slides.removeClass('current');
		            slider.slides.eq(0).addClass('current');
		                
		            slider.container.height($new_height);
		                                                    
		        },          
		        before: function(slider){ // init the height of the next item before slide
		            var $animatingTo = slider.slides.eq(slider.animatingTo);
		            var $new_height = slider.slides.eq(slider.animatingTo).height();                
		            
		            /* add a current class to the active item */
		            slider.slides.removeClass('current');
		            $animatingTo.addClass('current');
		            
		            if($new_height != slider.container.height()){
		                slider.container.stop().animate({ height: $new_height  }, 600);
		            }
		        },        
		        after: function(slider){ // init the height of the next item after slide
		            var $animatingTo = slider.slides.eq(slider.animatingTo);
		            var $new_height = slider.slides.eq(slider.animatingTo).height();                
		            
		            /* add a current class to the active item */
		            slider.slides.removeClass('current');
		            $animatingTo.addClass('current');
		            
		            if($new_height != slider.container.height()){
		                slider.container.stop().animate({ height: $new_height  }, 600);
		            }
		        },
				end: function(slider){ // init the height of the last item on end
		            var $new_height = slider.slides.eq(0).height();
		                
		            /* add a current class to the active item */
		            slider.slides.removeClass('current');
		            slider.slides.eq(0).addClass('current');
		                
		            slider.container.height($new_height);
		                                                    
		        }		        
			});
    	$('#portfolio-slider').flexslider();	
		});

/*= Header Search Form
*************************************************/
    function change_search(){
        $input_node = jQuery('#header-search input[type="text"]');
        $input_node.focus(function(){
            jQuery(this).stop(true,true).animate({
                width:'130px'
            },100);
        });
        $input_node.blur(function(){
            jQuery(this).stop(true,true).animate({
                width:'100px'
            },100);
        })
    }
    change_search();

/*= Menu
---------------------------------------------------------------------*/
    jQuery('ul.nav').superfish({
        //animation: {height:'show'},   // slide-down effect without fade-in
        delay: 10,               // 1.2 second delay on mouseout
        dropShadows: true
    });

/*= Overlay Animation
---------------------------------------------------------------------*/

    function tj_overlay(){
        if(!($.browser.msie && ($.browser.version!='9.0'))){
            jQuery('li.portfolio img,li.post img,li.item img').parent('a').hover(
                function(){
                    jQuery(this).find('.overlay').stop(true,true).fadeIn();
                },function(){
                    jQuery(this).find('.overlay').stop(true,true).fadeOut();
            });
        }
    }

	tj_overlay();



// Quick Sand
    function control_quicksand(){

        jQuery('#filter').children('li').each(function(){
            $text = jQuery(this).find('a').text();
            $class = jQuery(this).attr('class');
            $class = $class.replace('cat-item','');
            jQuery(this).find('a').attr('href','');
            jQuery(this).find('a').attr('class',$class);
            jQuery(this).attr('class','');
        });
        
        jQuery('#filter').append('<li class="active" ><a class="all">All</a></li>');

        var $filterType = jQuery('#filter li.active a').attr('class');

        var $holder = jQuery('ul.ourHolder');

        var $data = $holder.clone();

        jQuery('#filter>li a').click(function(e) {
            
            jQuery('#filter li').removeClass('active');
            var $filterType = jQuery(this).attr('class');

            jQuery(this).parent().addClass('active');

            
            if ($filterType == 'all') {

                var $filteredData = $data.children('li');

            }else {

                var $filteredData = $data.find('li[data-type*=' + $filterType + ']');

            }

            $holder.quicksand($filteredData,{
                duration: 500,
                easing: 'easeInOutQuad'
            }, function() {
                //tj_prettyPhoto();
	            tj_overlay();
                        
            });
           
            return false;

        });

    }
    control_quicksand();

/*= Correct Css
---------------------------------------------------------------------*/
    function correct_css(){
        jQuery('embed').each(function(){
            jQuery(this).attr('wmode','opaque');
        });
    }
    correct_css();



/*= Show Calendar Name
---------------------------------------------------------------------*/

    function show_calendar_name(){
        //jQuery('.widget_calendar').children('h3').text('Calendar');
    }
    show_calendar_name();

/*= Remove Entry Img
---------------------------------------------------------------------*/

    function remove_entry_img(){
        //jQuery('div.entry p img,div.slides-post-content-img img').remove();
    }
    remove_entry_img();


//End ready!
})
