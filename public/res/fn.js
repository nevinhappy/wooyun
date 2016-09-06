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
 function isEmail(email){ 
    var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
    if (reg.test(email)) 
        return true;  
    else  
        return false;    
} 
function error_noty(text){
    noty({
        text: text,
        layout: "topCenter",
        type: "error",
        timeout: 3500,
        theme: "maleskineTheme"
    })
}
function passwordLevel(password) {
    if(password.length >=6) {
        if(/[a-zA-Z]+/.test(password) && /[0-9]+/.test(password) && /\W+\D+/.test(password)) {
            return 3;
        }else if(/[a-zA-Z]+/.test(password) || /[0-9]+/.test(password) || /\W+\D+/.test(password)) {
            if(/[a-zA-Z]+/.test(password) && /[0-9]+/.test(password)) {
                return 2;
            }else if(/\[a-zA-Z]+/.test(password) && /\W+\D+/.test(password)) {
                return 2;
            }else if(/[0-9]+/.test(password) && /\W+\D+/.test(password)) {
                return 2;
            }else{
                return 1;
            }
        }
    }else{
        return 1; 
    }
}