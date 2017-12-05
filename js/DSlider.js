/*
Designd  By  Mr.Wait . jQuerySlider 1.0
Date:2016-9
GitHub User:Mr-Wait

Thank you for download,and please get a star ,thank you !~
For example
<ul class="Slider" id="Slider">
            <li class="DSlider-item" data-title="11111"><img src="image/1.jpg" alt="11111"/></li>
            <li class="DSlider-item" data-title="22222"><img src="image/2.jpg" alt="22222"/></li>
            <li class="DSlider-item" data-title="33333"><img src="image/3.jpg" alt="33333"/></li>
            <li class="DSlider-item" data-title="44444"><img src="image/4.jpg" alt="44444"/></li>
            <li class="DSlider-item" data-title="55555"><img src="image/5.jpg" alt="55555"/></li>
</ul>
$("#Slider1").Slider({mode:'fade',isShowPage:false,isShowTitle:false});
*/


(function($){
      $.fn.Slider = function(options){
            options = $.extend({
            //开始索引 0开始
            startSlide: 0,
            //子元素选择器
            item: '.DSlider-item',
            //是否自适应
            isFlexible: false,
            //是否显示分页按钮
            isShowPage: true,
            //是否显示标题栏
            isShowTitle: true,
            //标题文本存放的属性 或者回调函数(需要返回值)
            titleAttr: 'data-title',
            //是否显示左右控制按钮
            isShowControls: true,
            //是否自动播放
            isAuto: true,
            //自动播放间隔时间
            intervalTime: 5000,
            //特效时间 
            affectTime: 300,
            //特效类型 string : fade || move
            mode: 'move',
            //方向 string: left || top
            direction: 'left',
             },options);

            var methods = {
                  init:function(items){
                        // 获取ul
                        this.$itemWrap =items;
                        // 获取li集合
                        this.$item = this.$itemWrap.children(options.item);
                        // 获取li元素个数
                        this.size = this.$item.size();
                        // 当前索引
                        this.curIndex = options.startSlide;
                        //基础布局
                        methods.setLayout(this.itemWrap);
                        // 自动播放
                        options.isAuto && methods.autoPlay();
                        // 弹性布局
                        options.isFlexible && $(window).on('resize',$.proxy(methods['resize'],this));
                  },
                  setLayout:function(){
                        this.$itemWrap.wrap("<div class='DSlider-wrap' />");
                        this.wrap =  this.$itemWrap.parent();
                        if(options.isShowControls){
                              this.$Controls = $("<div class='showControl'><a class='prev'></a><a class='next'></a></div>").appendTo(this.wrap);
                              methods.controlsClick(this.$itemWrap);
                        }
                        if(options.isShowTitle){
                              this.$Titles = $("<div class='showTitle' />").appendTo(this.wrap);
                              methods.setTitle(this.$itemWrap);
                        }
                        if(options.isShowPage){
                              this.$pages = $("<ul class='showPage' />");
                              for(var i=1;i<=this.size;i++){
                                    $("<a href='javascript:;'>"+i+"</a>").appendTo(this.$pages);
                              }
                              this.$pages.appendTo(this.wrap);
                              methods.setPage();
                              methods.pagesClick();
                        }
                        if(options.mode=="fade"){
                              methods.setFade();
                        }
                        methods.setCss();
                       
                  },
                  // 初始化分页
                  setPage:function(){
                        if(!options.isShowPage || !this.$pages)return;
                        this.$pages.find("a").eq(this.curIndex).addClass("active").siblings().removeClass("active");
                  },
                  // 初始化标题
                  setTitle:function(){
                        if(!options.isShowTitle || !this.$Titles)return;
                        var $curItem = this.$item.eq(this.curIndex);
                        $.isFunction(options.titleAttr) ? options.titleAttr.call($curItem,this.curIndex) : this.$Titles.html($curItem.attr(options.titleAttr)); 
                  },
                  // 左右控制按钮事件
                  controlsClick:function(){
                        var self = this;
                        self.$Controls.find(".next").on('click',function(){
                              if(self.curIndex+1 == self.size){
                                 methods[options.mode](self.$item.eq(0));   
                              }else{
                                 methods[options.mode](self.$item.eq(self.curIndex+1));   
                              }
                              
                        });
                        this.$Controls.find(".prev").on('click',function(){
                               if(self.curIndex == 0){
                                    methods[options.mode](self.$item.eq(self.size-1));                                                                     
                              }else{
                                    methods[options.mode](self.$item.eq(self.curIndex-1));   
                              }
                        });

                  },
                  // 分页事件
                  pagesClick:function(){
                        var self = this; 
                        self.$pages.find("a").on('click',function(){
                              var target = $(this);
                              var next = target.index();
                              if(self.curIndex!=next){
                                    methods[options.mode](target);                                                 
                              }
                        });
                  },
                  // 滑动效果
                  move:function(target){
                        if(options.mode!="move")return;
                        this.$itemWrap.stop();
                        target = (target.index()>=0) ? target : this.$item.eq(options.startSlide);
                        var targetIndex = target.index();                     
                        if(options.direction =="left"){
                              var liWidth = this.$item.width();
                              this.$itemWrap.animate({left:"-"+liWidth*targetIndex+"px"},options.affectTime);
                        }else if(options.direction =="top"){
                              var liHeight = this.$item.height();
                              this.$itemWrap.animate({top:"-"+liHeight*targetIndex+"px"},options.affectTime);
                        }                    
                        this.curIndex = targetIndex;                  
                        methods.setPage();
                        methods.setTitle();
                  },
                  // 初始化淡入淡出效果
                  setFade:function(){
                        this.$item.hide().eq(this.curIndex).show();
                  },
                  // 设置动画元素对应css
                  setCss:function(){
                        if(options.mode!="move" && options.mode!="fade") return;
                        if(!options.isFlexible){
                              this.wrap.width(this.$item.find("img").width());
                        }
                        if(options.mode=="move"){
                              if(options.direction=="left"){
                                    this.$itemWrap.css({"width":this.size*100 + "%","position":"relative"});
                                    this.$item.width(this.wrap.width());
                              }else if(options.direction=="top"){
                                    this.$itemWrap.css({"height":this.size*100+"%","position":"relative"});
                                    this.$item.height(this.wrap.height());
                                    this.$item.css({"clear":"left"});
                              }
                        }else{
                              this.$itemWrap.css("width","100%");
                              this.$item.css("position","absolute");
                        }

                  },
                  // 滑动效果
                  fade:function(target){
                        if(options.mode!="fade")return;
                        this.$itemWrap.stop();
                        target = (target.index()>=0) ? target : this.$item.eq(options.startSlide);
                        var targetIndex = target.index();
                        this.$item.fadeOut(options.affectTime).eq(targetIndex).fadeIn(options.affectTime);
                        this.curIndex = targetIndex;                  
                        methods.setPage();
                        methods.setTitle();  
                  },
                  // 自适应
                  resize:function(){
                        var self = this;
                        var wrapWidth = self.wrap.width();
                      
                       
                                   
                        self.$item.each(function(){                          
                             $(this).width(wrapWidth);
                        });
                  },
                  autoPlay:function(){
                        if(!options.isAuto)return;
                        var self =this;
                        clearInterval(this.playTimer);
                        this.playTimer =setInterval(function(){methods[options.mode](self.$item.eq(self.curIndex+1))},options.intervalTime);
                  }

            }
             return this.each(function(){
                  methods.init($(this));

             });
      }
})(window.jQuery);