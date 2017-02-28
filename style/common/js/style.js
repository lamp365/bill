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
})