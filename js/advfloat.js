function FloatInit()
{
    var floatadvobj = document.getElementById("ad");
    floatadvobj.x = parseInt((document.body.clientWidth-floatadvobj.offsetWidth)*(Math.random()));
    floatadvobj.y = parseInt(100*(Math.random()));
    floatadvobj.xin = Math.random() > 0.5 ? true : false;
    floatadvobj.yin = Math.random() > 0.5 ? true : false;
    floatadvobj.step = 1;
    floatadvobj.itl = setInterval("FloatInterval('" + floatadvobj.id + "')", 15);
    floatadvobj.onmouseover = function(){clearInterval(this.itl);};
    floatadvobj.onmouseout = function(){this.itl = setInterval("FloatInterval('" + this.id + "')", 15);};
}

function FloatInterval(id)
{
    var obj=document.getElementById(id);
    var L=T=0;
    var R=document.body.clientWidth-obj.offsetWidth;
    var B=document.body.clientHeight-obj.offsetHeight;
    obj.style.left = (obj.x + document.body.scrollLeft) + "px";
    obj.style.top = (obj.y + document.body.scrollTop) + "px";
    obj.x=obj.x+obj.step*(obj.xin?1:-1);
    if (obj.x<L){obj.xin=true;obj.x=L;}
    if (obj.x>R){obj.xin=false;obj.x=R;}
    obj.y=obj.y+obj.step*(obj.yin?1:-1);
    if (obj.y<T){obj.yin=true;obj.y=T;}
    if (obj.y>B){obj.yin=false;obj.y=B;}
}

FloatInit();