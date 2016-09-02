//表单序列化
(function($){  
	//表单JSON序列化
    $.fn.serializeJson=function(){  
        var serializeObj={};  
        var array=this.serializeArray();  
        var str=this.serialize();  
        $(array).each(function(){  
            if(serializeObj[this.name]){  
                if($.isArray(serializeObj[this.name])){  
                    serializeObj[this.name].push(this.value);  
                }else{  
                    serializeObj[this.name]=[serializeObj[this.name],this.value];  
                }  
            }else{  
                serializeObj[this.name]=this.value;   
            }  
        });  
        return serializeObj;  
    };  
    //获取URL参数
    $.fn.getURLParameter=function(){  
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,''])[1].replace(/\+/g, '%20'))||null;
    };  
})(jQuery);  

function error_noty(text){
    noty({
        text: text,
        layout: "topCenter",
        type: "error",
        timeout: 3500,
        theme: "maleskineTheme"
    })
}