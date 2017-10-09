
/**
 * [ xTaber 切换 ]
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
(function($){
    $.fn.extend({
        xTaber: function(opt){
            var def = $.extend({
                /* @tab 触发事件标签 [true|false|obj]
                 * true 自动生成带数字的标签
                 * false 不显示tab
                 * obj 自定义tab
                 */
                tab: true, //默认为自动生成
                content:$('#xtaberWrap'),
                prev: null, //上一个按钮
                next: null, //下一个按钮
                /* @style 滚动的样式 [opacity|left|top|none]
                 * opacity 淡出淡入
                 * left 向左
                 * top 向上
                 * none 无效果
                 */
                style: 'opacity', //默认为opacity
                activeClass: 'current', //当前样式
                delay: 100, //操作延时
                speed: 300, //移动速度
                timeout: 3000, //间歇时间
                auto: false, //是否自动滚动
                setup: 1,//每次滚动多少个
                defaultShow: 1, //默认显示第n个
                mouseEvent: 'mouseover', //鼠标事件
                tabedCallback: null //切换后的回调函数
            }, opt);

            if(typeof def.setup != Number && def.setup < 1) def.setup = 1;
            // 内部通用变量
            var self = def.content,
                content = self.find('[rel="xtaberItems"]'),
                subItem = content.find('.xtaber-item'),
                itemLength = subItem.length,
                subItemHeight = 
                    parseInt(subItem.height())+
                    parseInt(subItem.css('marginTop'))+
                    parseInt(subItem.css('marginBottom'))+
                    parseInt(subItem.css('paddingTop'))+
                    parseInt(subItem.css('paddingBottom')),
                subItemWidth = 
                    parseInt(subItem.width())+
                    parseInt(subItem.css('marginLeft'))+
                    parseInt(subItem.css('marginRight'))+
                    parseInt(subItem.css('paddingLeft'))+
                    parseInt(subItem.css('paddingRight')),
                scrollHeight = subItemHeight * def.setup,
                scrollWidth = subItemWidth * def.setup,
                screenNum,
                current = 0,
                autoTimer,
                itemTimer,
                tabItem = null;

            //滚动屏数                
            if(def.setup == 1){
                screenNum = itemLength;
            }
            else{
                var inAll = (itemLength % def.setup),
                    num = parseInt(itemLength / def.setup);
                screenNum = (inAll > 0) ? (num+1) : num;
            }                

            var init = function(){
                // 自动生成tab
                if(def.tab && typeof def.tab != 'object'){
                    var tabHTML = '<ol rel="xtaberTabs" class="xtaber-tabs">';
                    for(var i=1; i<=screenNum; i++){
                        tabHTML += '<li rel="xtaberTabItem">'+i+'</li>';
                    }
                    tabHTML += '</ol>';
                    self.append(tabHTML);
                    def.tab = self.find('[rel="xtaberTabs"]');
                }
                else if(typeof def.tab == 'object'){
                    def.tab = self.find('[rel="xtaberTabs"]');
                }
                else{
                    def.tab = null;
                }

                if(def.tab != null){
                    tabItem = def.tab.find('[rel="xtaberTabItem"]');
                }

                if(typeof def.next == 'boolean' && def.next){
                    def.next = $('<span rel="xtaberNext">next</span>');
                    def.next.appendTo(self);
                }
                if(typeof def.prev == 'boolean' && def.prev){
                    def.prev = $('<span rel="xtaberPrev">prev</span>');
                    def.prev.appendTo(self);
                }

                switch(def.style){
                    case 'left':
                        setParent('left');
                        break;
                    case 'top':
                        setParent('top');
                        break;
                }

                goTo(def.defaultShow - 1);
                
                bindEvent();
                if(def.auto){
                    auto();
                }

            }
            //设置父级的样式
            var setParent = function(type){
                var wrapHeight,wrapWidht,contentWidth,contentHeight;
                if(type == 'top'){
                    contentHeight = subItemHeight * itemLength;
                    contentWidth = subItemWidth;
                }
                else if(type == 'left'){
                    contentHeight = subItemHeight;
                    contentWidth = subItemWidth * itemLength;
                }
                //alert(typeof(subItemWidth));
                content.css({
                    left: 0,
                    top: 0,
                    position: 'absolute',
                    width: contentWidth,
                    height: contentHeight
                });
            }

            var goTo = function(index){
                clearInterval(autoTimer);
                clearTimeout(itemTimer);
                current = index;
                switch(def.style){
                    case 'top':
                        content.stop().animate({'top': -(index * scrollHeight)}, def.speed);
                        break;
                    case 'left':
                        content.stop().animate({'left': -(index * scrollWidth)}, def.speed);
                        break;
                    case 'opacity':
                        subItem.eq(index).fadeIn().siblings().hide().stop();
                        break;
                    default:
                        subItem.eq(index).show().siblings().hide();
                        break;
                }
                if(def.tab != null){
                   tabItem.eq(index).addClass(def.activeClass).siblings().removeClass(def.activeClass);
                }
                if(def.auto){
                    auto()
                };
                if(def.tabedCallback){
                    def.tabedCallback();
                }

                if($('img[data-original]').length){
                    $(window).trigger('scroll');
                }
            }

            var auto = function(){
                if(def.auto){
                    clearInterval(autoTimer);
                    autoTimer = setInterval(function(){
                        if(current + 1 >= screenNum){
                                goTo(0);
                        }else{
                            goTo(current + 1);
                        }
                    }, def.timeout);
                }
            }
            //绑定事件
            var bindEvent = function(){
                if(def.tab != null){
                    tabItem.each(function(){
                        var el = $(this);
                        el.bind(def.mouseEvent, function(){
                            clearInterval(autoTimer);
                            clearTimeout(itemTimer);
                            itemTimer = setTimeout(function(){
                                goTo(el.index());
                            }, def.delay);
                        });
                        
                        el.bind('mouseleave', function(){
                            clearTimeout(itemTimer);
                            auto();
                        });
                    });
                }

                if(def.next){
                    def.next.click(function(){
                        var currentNum = (current + 1 >= screenNum) ? 0 : current + 1;
                        goTo(currentNum);  
                    });
                }
                
                if(def.prev){
                    def.prev.click(function(){
                        var currentNum = (current - 1 < 0) ? screenNum - 1 : current - 1;
                        goTo(currentNum);
                    });
                }
                
            }
            init();           
        }
    });
})(jQuery);

(function ($) {
    $.extend($.fn, {
        xGotop: function(opts){
            opts = $.extend({}, 
                {  
                    node: $('#gotop'), // 滚动的按钮
                    speed: 600, //滚动的速度
                    show: true
                }, opts);

            var init = function(){
                opts.node.find('.btn-top').bind('click', function() {
                    var doc = $(document).find("html,body");
                    if (doc.filter(":animated").size()) {
                        doc.stop()
                    }
                    doc.animate({
                        scrollTop: 0
                    },
                    opts.speed);
                    return false;
                });
                if(opts.show){
                    showState();
                }
            }

            var showState = function(){
                var state = $(document).scrollTop() > 0 ? 'show' : 'hide';
                opts.node[state]();
            }
            if(opts.show){
                $(window).bind('scroll', function(){
                    showState();
                });
            }
            init();
        }
    });
})(jQuery);



var baiduUn = function(){
    if($('#pop_test').get(0))
    $('#pop_test').appendTo($('.pop-test')).show();
};


(function(a,b){$window=a(b),a.fn.lazyload=function(c){function f(){var b=0;d.each(function(){var c=a(this);if(e.skip_invisible&&!c.is(":visible"))return;if(!a.abovethetop(this,e)&&!a.leftofbegin(this,e))if(!a.belowthefold(this,e)&&!a.rightoffold(this,e))c.trigger("appear");else if(++b>e.failure_limit)return!1})}var d=this,e={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:b,data_attribute:"original",skip_invisible:!0,appear:null,load:null};return c&&(undefined!==c.failurelimit&&(c.failure_limit=c.failurelimit,delete c.failurelimit),undefined!==c.effectspeed&&(c.effect_speed=c.effectspeed,delete c.effectspeed),a.extend(e,c)),$container=e.container===undefined||e.container===b?$window:a(e.container),0===e.event.indexOf("scroll")&&$container.bind(e.event,function(a){return f()}),this.each(function(){var b=this,c=a(b);b.loaded=!1,c.one("appear",function(){if(!this.loaded){if(e.appear){var f=d.length;e.appear.call(b,f,e)}a("<img />").bind("load",function(){c.hide().attr("src",c.data(e.data_attribute))[e.effect](e.effect_speed),b.loaded=!0;var f=a.grep(d,function(a){return!a.loaded});d=a(f);if(e.load){var g=d.length;e.load.call(b,g,e)}}).attr("src",c.data(e.data_attribute))}}),0!==e.event.indexOf("scroll")&&c.bind(e.event,function(a){b.loaded||c.trigger("appear")})}),$window.bind("resize",function(a){f()}),f(),this},a.belowthefold=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.height()+$window.scrollTop():e=$container.offset().top+$container.height(),e<=a(c).offset().top-d.threshold},a.rightoffold=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.width()+$window.scrollLeft():e=$container.offset().left+$container.width(),e<=a(c).offset().left-d.threshold},a.abovethetop=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.scrollTop():e=$container.offset().top,e>=a(c).offset().top+d.threshold+a(c).height()},a.leftofbegin=function(c,d){var e;return d.container===undefined||d.container===b?e=$window.scrollLeft():e=$container.offset().left,e>=a(c).offset().left+d.threshold+a(c).width()},a.inviewport=function(b,c){return!a.rightofscreen(b,c)&&!a.leftofscreen(b,c)&&!a.belowthefold(b,c)&&!a.abovethetop(b,c)},a.extend(a.expr[":"],{"below-the-fold":function(c){return a.belowthefold(c,{threshold:0,container:b})},"above-the-top":function(c){return!a.belowthefold(c,{threshold:0,container:b})},"right-of-screen":function(c){return a.rightoffold(c,{threshold:0,container:b})},"left-of-screen":function(c){return!a.rightoffold(c,{threshold:0,container:b})},"in-viewport":function(c){return!a.inviewport(c,{threshold:0,container:b})},"above-the-fold":function(c){return!a.belowthefold(c,{threshold:0,container:b})},"right-of-fold":function(c){return a.rightoffold(c,{threshold:0,container:b})},"left-of-fold":function(c){return!a.rightoffold(c,{threshold:0,container:b})}})})(jQuery,window);


var fixFN = function(obj, cls){
    var fixObj = $(obj),
        fixTop = fixObj.offset().top;
    $(window).bind('scroll', function(){
        var winTop = $(window).scrollTop(),
            fixType = (winTop >= fixTop) ? 'addClass':'removeClass'
        fixObj[fixType](cls);
    });
}
  

$(function(){

    $.fn.xGotop({
        node: $('#j_gotop')
    });
    
    $('.comm-tab-box').each(function(){
        var self = $(this);
        $.fn.xTaber({
            tab: self,
            content: self
        });
    });

    $('img[data-original]').lazyload({
        effect:'fadeIn',failurelimit: '150'
    });

    $.fn.xTaber({
        tab: $('.comm-tab-today'),
        content: $('.comm-tab-today'),
        defaultShow: 3
    });

    $.fn.xTaber({
        content: $('#foc_img'),
        style: 'left',
        auto: true
    });

    if($('#tushou_row').get(0)){
        $.fn.xTaber({
            content: $('#tushou_row'),
            style: 'left',
            tab: $('#tushou_row'),
            prev: $('#tushou_row').find('.btn-prev'),
            next: $('#tushou_row').find('.btn-next'),
            auto: false,
            timeOut: 8000
        });
    }

    if($('#pics_nav').get(0)){
        var picsNav = $('#pics_nav'),
            idx = picsNav.attr('idx'),
            picLen = picsNav.find('li').length,
            showDef = Math.ceil(idx/5);
        picsNav.find('li').eq(idx-1).addClass('current').siblings().removeClass('current');
        $.fn.xTaber({
            content: picsNav,
            style: 'left',
            tab: picsNav,
            prev: picsNav.find('.aprev'),
            next: picsNav.find('.anext'),
            setup: 5,
            defaultShow: showDef
        });
    }



    
    if($('#j_side').get(0)){
        fixFN('#j_side', 'fix-side');
    }

    if($('#m_navwrap').get(0)){
        fixFN('#m_navwrap', 'fix-menu');
    }

    $('.month-drop').hover(
        function(){$(this).addClass('month-drop-hover')},
        function(){$(this).removeClass('month-drop-hover')}
    );


});
