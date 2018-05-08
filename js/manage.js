/**
 * Created by wzy on 2017/6/7.
 */
var userName = window.sessionStorage.getItem("admin");
if(!userName){
    window.location.href = "admin.html";
}
$(".add-user").on("click",function(){
    $("ul li").removeClass("index");
    $(this).addClass("index");
    $(".flt").addClass("hide");
    $(".adduser").removeClass("hide");
    $("input[type=password]").val("");
    $(".redText").text("");
    $(".ipt-box input[type=checkbox]").attr("checked",false);
});
$(".upate-user").on("click",function(){
    $("ul li").removeClass("index");
    $(this).addClass("index");
    $(".flt").addClass("hide");
    $(".upateuser").removeClass("hide");
    $("input[type=password]").val("");
    $(".redText").text("");
    $(".upate-box input[type=checkbox]").attr("checked",false);
});
$(".change-pwd").on("click",function(){
    $("ul li").removeClass("index");
    $(this).addClass("index");
    $(".flt").addClass("hide");
    $(".changePwd").removeClass("hide");
    $("input[type=password],input[type=text]").val("");
    $(".redText").text("");
});
$(".out").on("click",function(){
    window.location.href = "admin.html";
});
$(".addBtn").on("click",function(){
    var arr = [];
    var addname = $(".addname").val().trim();
    var addpwd = $(".addpwd").val().trim();
    var addpwdAgain = $(".addpwd-again").val().trim();
    var reg = /^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{4}$/g;
    if(!addname){
        $(".adduser-text").text("请填写身份证号！");
        return;
    }else if(!addpwd){
        $(".adduser-text").text("请填写密码！");
        return;
    }else if(addpwd.length<6){
        $(".adduser-text").text("密码长度不够！");
        return;
    }else if(addpwd != addpwdAgain) {
        $(".adduser-text").text("两次密码设置不一样！");
        return;
    }else if(reg.test(addname)){
        $(".adduser-text").text("");
        for(var i=0;i<$(".ipt-box").length;i++){
            if($(".ipt-box input[type=checkbox]").eq(i).prop("checked")){
                arr.push($(".ipt-box input[type=checkbox]").eq(i).val())
            }
        }
        var addtype= arr.join(",");
        $.ajax({
            url:"php/adduser.php",
            type:"POST",
            data:{
                addname:addname,
                addpwd:addpwd,
                addtype:addtype
            },
            success:function(res){
                if(res == "success"){
                    $(".ipt-box input[type=checkbox]").attr("checked",false);
                    $("input[type=password],input[type=text]").val("");
                    $(".adduser-text").text("添加成功");
                    setTimeout(function(){
                        $(".adduser-text").text("");
                    },2000);
                }else if(res == "repeat"){
                    $(".adduser-text").text("账号已存在");
                    setTimeout(function(){
                        $(".adduser-text").text("");
                    },2000);
                }else{
                    $(".adduser-text").text("添加失败");
                    return;
                }
            },
            error:function(err){
                alert(err);
            }
        });
    }else{
        $(".adduser-text").text("身份证格式不正确！");
        return;
    }
});
$(".upateBtn").on("click",function(){
    var arr = [];
    var upatename = $(".upatename").val().trim();
    if(!upatename){
        $(".upate-text").text("请填写身份证号！");
        return;
    }else{
        $(".upate-text").text("");
        for(var i=0;i<$(".upate-box").length;i++){
            if($(".upate-box input[type=checkbox]").eq(i).prop("checked")){
                arr.push($(".upate-box input[type=checkbox]").eq(i).val())
            }
        }
        var upateType= arr.join(",");
        $.ajax({
            url:"php/upateuser.php",
            type:"POST",
            data:{
                upatename:upatename,
                upatetype:upateType
            },
            success:function(res){
                if(res == "success"){
                    $(".upate-box input[type=checkbox]").attr("checked",false);
                    $("input[type=text]").val("");
                    $(".upate-text").text("添加成功");
                    setTimeout(function(){
                        $(".upate-text").text("");
                    },2000);
                }else{
                    $(".upate-text").text("账号不存在");
                    return;
                }
            },
            error:function(err){
                alert(err);
            }
        });
    }
});
$(".del-oneBtn").on("click",function(){
    var arr = [];
    var delname = $(".upatename").val().trim();
    if(!delname){
        $(".upate-text").text("请填写身份证号！");
        return;
    }else{
        $(".upate-text").text("");
        for(var i=0;i<$(".upate-box").length;i++){
            if($(".upate-box input[type=checkbox]").eq(i).prop("checked")){
                arr.push($(".upate-box input[type=checkbox]").eq(i).val())
            }
        }
        var deltype= arr.join(",");
        $.ajax({
            url:"php/deluser.php",
            type:"POST",
            data:{
                delnum:"1",
                delname:delname,
                deltype:deltype
            },
            success:function(res){
                if(res == "success"){
                    $(".upate-box input[type=checkbox]").attr("checked",false);
                    $("input[type=text]").val("");
                    $(".upate-text").text("删除成功");
                    setTimeout(function(){
                        $(".upate-text").text("");
                    },2000);
                }else{
                    $(".upate-text").text("账号不存在");
                    return;
                }
            },
            error:function(err){
                alert(err);
            }
        });
    }
});
$(".del-allBtn").on("click",function(){
    var arr = [];
    var delname = $(".upatename").val().trim();
    if(!delname){
        $(".upate-text").text("请填写身份证号！");
        return;
    }else{
        $(".upate-text").text("");
        $.ajax({
            url:"php/deluser.php",
            type:"POST",
            data:{
                delnum:"2",
                delname:delname
            },
            success:function(res){
                if(res == "success"){
                    $(".upate-box input[type=checkbox]").attr("checked",false);
                    $("input[type=text]").val("");
                    $(".upate-text").text("删除成功");
                    setTimeout(function(){
                        $(".upate-text").text("");
                    },2000);
                }else{
                    $(".upate-text").text("账号不存在");
                    return;
                }
            },
            error:function(err){
                alert(err);
            }
        });
    }
});
$(".del-all").on("click",function(){
    if(confirm("确定要删除吗？")){
        $(".upate-text").text("");
        $.ajax({
            url: "php/deluser.php",
            type: "POST",
            data: {
                delnum: "3"
            },
            success: function (res) {
                if (res == "success") {
                    $(".upate-box input[type=checkbox]").attr("checked", false);
                    $("input[type=text]").val("");
                    $(".upate-text").text("删除成功");
                    setTimeout(function () {
                        $(".upate-text").text("");
                    }, 2000);
                }
            },
            error: function (err) {
                alert(err);
            }
        });
    }
});
$(".pwdBtn").on("click",function(){
    var pwdOld = $(".pwdOld").val().trim();
    var pwdNew = $(".pwdNew").val().trim();
    var pwdNewAgain = $(".pwdNewAgain").val().trim();
    if(pwdNew.length < 6){
        $(".changePwd-text").text("新密码长度不够！");
        return;
    }else if(pwdNew != pwdNewAgain){
        $(".changePwd-text").text("两次密码设置不一样！");
        return;
    }else if(pwdNew == pwdOld){
        $(".changePwd-text").text("新密码和旧密码不能相同!");
        return;
    }
    $.ajax({
        url:"php/change-admin.php",
        type:"POST",
        data:{
            oldPwd:pwdOld,
            newPwd:pwdNew
        },
        success:function(res){
            console.log(res)
            if(res == "success"){
                $(".changePwd-text").text("设置成功！");
                $(".changePwd input").val("");
                window.location.href = "admin.html";
            }else{
                $(".changePwd-text").text("设置失败！");
            }
        },
        error:function(err){
            alert(err);
        }
    });
});