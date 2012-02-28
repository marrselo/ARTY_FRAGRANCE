$(document).ready(function(){
    ///swf
    $('a.media').media({autoplay: true});
	///lang
    $('#lang_code').msDropDown();
    ///previo imagen
    if($("img.view_img").length>0){
        $('img.view_img').click(function(e){
            $("#dialog").remove();
            var src=this.src;
            src=src.replace(/width\/\d*/, 'width/400');
            src=src.replace(/height\/\d*/, 'height/400');

            var img='<div id="dialog" title="Preview">'+
                    '<img src="'+src+'" alt="preview" />'+
                    '</div>';

            $(img).dialog({
                bgiframe: true,
                height: 450,
                width: 450,
                resizable: false,
                modal: true
            });
        });
        $('.view_img').css('cursor','pointer');
    }
    
    //fecha
	$('#datepicker').datepicker({
        changeMonth: true,
    	changeYear: true,
        yearRange: '1950:2020',
        dateFormat: 'dd/mm/yy'
    });
	$('#datepicker2').datepicker({
        changeMonth: true,
    	changeYear: true,
        yearRange: '1950:2020',
        dateFormat: 'dd/mm/yy'
    });

    if($('#textarea_fckeditor').length>0){
        var oFCKeditor = new FCKeditor('textarea_fckeditor');
        oFCKeditor.BasePath = getBaseUrl+"/scripts/fckeditor/";
        oFCKeditor.StylesXmlPath='../fckstyles_voxea.xml' ;
        oFCKeditor.Height = 500;
        oFCKeditor.ReplaceTextarea();
    }
    /*if($('#content').length>0){
        var oFCKeditor = new FCKeditor('content');
        oFCKeditor.BasePath = getBaseUrl+"/scripts/fckeditor/";
        oFCKeditor.StylesXmlPath='../fckstyles_voxea.xml' ;
        oFCKeditor.Height = 500;
        oFCKeditor.ReplaceTextarea();
    }*/
    if($('#textarea_fckeditor_mini').length>0){
        var oFCKeditor = new FCKeditor('textarea_fckeditor_mini');
        oFCKeditor.BasePath = getBaseUrl+"/scripts/fckeditor/";
        oFCKeditor.StylesXmlPath='../fckstyles_voxea.xml' ;
        oFCKeditor.ToolbarSet = 'Basic' ;
        oFCKeditor.Height = 120;
        //oFCKeditor.Width = FCKeditor_Width;
        oFCKeditor.ReplaceTextarea();
    }
    if($('#textarea_fckeditor_complete').length>0){
        var oFCKeditor = new FCKeditor('textarea_fckeditor_complete');
        oFCKeditor.BasePath = getBaseUrl+"/scripts/fckeditor/";
        oFCKeditor.StylesXmlPath='../fckstyles_voxea.xml' ;
        oFCKeditor.ToolbarSet = 'complete' ;
        oFCKeditor.Height = 500;
        //oFCKeditor.Width = FCKeditor_Width;
        oFCKeditor.ReplaceTextarea();
    }
        $('.adminchangelanguage').click(function(){
                var src=this.href;
		$.get(src, function(data){
                    location.reload(true)
                 });
                 return false;
	 });
});

$(window).ready(function(){
    //corrige PNG
	$.ifixpng('scripts/jquery.ifixpng/blank.gif');
  	$("img").ifixpng();
	$(".img_png").ifixpng();
	$("input[type='image']").ifixpng().css('cursor','pointer');
});
//

function getE(name)
{
	if (document.getElementById)
		var elem = document.getElementById(name);
	else if (document.all)
		var elem = document.all[name];
	else if (document.layers)
		var elem = document.layers[name];
	return elem;
}

function toggleLayer(whichLayer, flag)
{
	var style = getE(whichLayer).style;
	style.display = (flag == '') ? 'none' : 'block';
}

function openCloseLayer(whichLayer, action)
{
 	var style = getE(whichLayer).style;
	if (!action){
		style.display = style.display == 'none' ? 'block':'none';
                $.cookie(whichLayer, style.display == 'none' ? 'block':'none');
        }else if (action == 'open'){
		style.display = 'block';
        }else if (action == 'close'){
		style.display = 'none';
        }
       // alert($.cookie(whichLayer));
}
