$((function(){var e=document.getElementById("custom-file-label").innerHTML,t="";$(document).on("change",".custom-file-input",(function(e){var a=e.target;t=t||a.nextElementSibling.innerText,a.files[0]?a.nextElementSibling.innerText=a.files[0].name:a.nextElementSibling.innerText=t}));var a=$(".alert.alert-warning");a.length>0&&_.map(a,(function(e){var t=localStorage.getItem("storage-alerts");if(t=t?JSON.parse(t):{},$(e).data("alert-id")){if(t[$(e).data("alert-id")])return void $(e).alert("close");$(e).removeClass("hidden")}})),a.on("closed.bs.alert",(function(e){var t=$(e.target).data("alert-id");if(t){var a=localStorage.getItem("storage-alerts");(a=a?JSON.parse(a):{})[t]=!0,localStorage.setItem("storage-alerts",JSON.stringify(a))}}));var n=!1;$(document).on("click",".download-template",(function(e){if(e.preventDefault(),!n){var t=$(e.currentTarget),a=t.data("extension"),r=t.html();$.ajax({url:t.data("url"),method:"POST",data:{extension:a},xhrFields:{responseType:"blob"},beforeSend:function(){t.html(t.data("downloading")),t.addClass("text-secondary"),n=!0},success:function(e){var a=document.createElement("a"),n=window.URL.createObjectURL(e);a.href=n,a.download=t.data("filename"),document.body.append(a),a.click(),a.remove(),window.URL.revokeObjectURL(n)},error:function(e){Botble.handleError(e)},complete:function(){setTimeout((function(){t.html(r),t.removeClass("text-secondary"),n=!1}),2e3)}})}})),$(document).on("submit",".form-import-data",(function(t){t.preventDefault();var a=$(this),n=new FormData(a.get(0)),r=a.find("button[type=submit]");r.prop("disabled",!0).addClass("button-loading");var o=$("#imported-message"),l=$("#imported-listing"),s=$(".show-errors");$.ajax({url:a.attr("action"),type:a.attr("method")||"POST",data:n,cache:!1,processData:!1,contentType:!1,dataType:"json",beforeSend:function(){$(".main-form-message").addClass("hidden"),o.html("")},success:function(t){if(t.error)Botble.showError(t.message);else{Botble.showSuccess(t.message);var a="";t.data.failures&&_.map(t.data.failures,(function(e){var t="Row: "+e.row+" -  Attribute: "+e.attribute+" - Errors: "+e.errors.join(", ");a+="<li>"+t+"</li>"}));var n="alert alert-success";t.data.total_failed?(n=t.data.total_success?"alert alert-warning":"alert alert-danger",s.removeClass("hidden")):s.addClass("hidden"),o.removeClass().addClass(n).html(t.message),l.removeClass("hidden").html(a),document.getElementById("input-group-file").value="",document.getElementById("custom-file-label").innerHTML=e}r.prop("disabled",!1),r.removeClass("button-loading")},error:function(e){r.prop("disabled",!1),r.removeClass("button-loading"),Botble.handleError(e)},complete:function(){r.prop("disabled",!1),r.removeClass("button-loading"),$(".main-form-message").removeClass("hidden")}})}))}));