/**
 * Created by HP on 2016/12/13.
 */
function tip(msg,type,time){
    var div = $("#poptip");
    var content =$("#poptip_content");
    if(div.length<=0){
        div = $("<div id='poptip'></div>").appendTo(document.body);
        if(type!='success' && type!='danger'){
            type = 'success';
        }
        content =$("<div id='poptip_content' class='tip_"+type+"'>" + msg + "</div>").appendTo(document.body);
    }else{
        content.html(msg);
        content.show();
        div.show();
    }
    if(time) {
        time =  isNaN(time)? '2000' : time;
        setTimeout(function(){
            content.fadeOut(500);
            div.fadeOut(500);

        },time);
    }
}
function tip_close(){
    $("#poptip").fadeOut(500);
    $("#poptip_content").fadeOut(500);
}

$(".search_btn").click(function(){
    var s_time = $("#starttime").val();
    var e_time = $("#endtime").val();
    if(s_time == '' || e_time == ''){
        alert("对不起，请先选择时间");
        return '';
    }
    if(s_time > e_time){
        alert('对不起，时间选择有误','起始时间必须小于结束时间');
        return '';
    }
    var url = $(".hide_search_url").val();
    url = url +"&s_time="+s_time+"&e_time="+e_time;
    window.location.href = url;
});

$(".addCat").click(function(){
    var url = $(this).data('url');
    $.ajaxLoad(url,{},function(){
        $('#alterModal').modal('show');
    });
});

function sel_parent_cat(obj){
    var url     = $("#hide_get_url").val();
    var ajaxurl = $("#hide_cat_url").val();
    url         = url.substr(0,url.length-5); //字符串截取
    ajaxurl     = ajaxurl.substr(0,ajaxurl.length-5); //字符串截取

    var pid = $(obj).val();
    url     = url +"/pid/"+pid;
    ajaxurl = ajaxurl +"/pid/"+pid;
    if(pid == 0){
        var mark = $(obj).closest('.total_sel').find(".sel_son_cat").data('local');
        if(mark == 1)
            window.location.href = url;
        else{
            var html ="<option value='0'>请选择父分类</option>";
            $(obj).closest('.total_sel').find(".sel_son_cat").html(html);
        }
    }else{
        $.getJSON(ajaxurl,function(data){
            if(data.code == 200){
                var html ="<option value='0'>请选择子分类</option>";
                var res  = data.msg;
                for(var i =0;i<res.length;i++){
                    var shuju = res[i];
                    html +="<option value='"+shuju.id+"'>"+shuju.name+"</option>";
                }
                $(obj).closest('.total_sel').find(".sel_son_cat").html(html);
            }else{
                alert(data.msg);
            }
        },'json')
    }
}

function sel_son_cat(obj){
    var s_cat_id = $(obj).val();
    var p_cat_id = $(obj).closest('.total_sel').find(".sel_parent_cat").val();
    var mark = $(obj).data('mark');
    var url     = $("#hide_get_url").val();
    url         = url.substr(0,url.length-5); //字符串截取
    url = url +"/"+p_cat_id+"/"+s_cat_id;
    console.log(url,mark);
    if(mark == 1){
        //window.location.href = url;
    }
}

$(".addBill").click(function(){
   var url = $(this).data('url');
    $.ajaxLoad(url,{},function(){
        $('#alterModal').modal('show');
    });
});