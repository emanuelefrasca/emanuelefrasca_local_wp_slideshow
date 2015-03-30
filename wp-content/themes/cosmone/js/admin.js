 jQuery(document).ready(function($) {


jQuery('.cosmone_shortcodes,.cosmone_shortcodes_textarea').magnificPopup({
  items: {
      src: '#cosmone_shortcodes_container',
      type: 'inline'
  }
});

jQuery('.cosmone_shortcodes_textarea').on("click",function(){
			var id = jQuery(this).next().find("textarea").attr("id");
			jQuery('#cosmone-shortcode-textarea').val(id);
		});																	   

jQuery('.cosmone_shortcodes_list li a.cosmone_shortcode_item').on("click",function(){
													  
  var obj       = jQuery(this);
  var shortcode = obj.data("shortcode");
  var form      = obj.parents("div#cosmone_shortcodes_container form");
 
   jQuery.ajax({
		type: "POST",
		url: cosmone_params.ajaxurl,
		dataType: "html",
		data: { shortcode: shortcode, action: "cosmone_shortcode_form" },
		success:function(data){
	
		   form.find(".cosmone_shortcodes_list").hide();
		   form.find("#cosmone-shortcodes-settings").show();
		   form.find("#cosmone-shortcodes-settings .current_shortcode").text(shortcode);
		   form.find("#cosmone-shortcodes-settings-inner").html(data);
		}
		});
	
});

jQuery(".cosmone-shortcodes-home").bind("click",function(){
            jQuery("#cosmone-shortcodes-settings").hide();
		    jQuery("#cosmone-shortcodes-settings-innter").html("");
		    jQuery(".cosmone_shortcodes_list").show();
		   
		});
		
// insert shortcode into editor
jQuery(".cosmone-shortcode-insert").bind("click",function(e){

    var obj       = jQuery(this);
	var form      = obj.parents("div#cosmone_shortcodes_container form");
	var shortcode = form.find("input#cosmone-curr-shortcode").val();

	jQuery.ajax({
		type: "POST",
		url: cosmone_params.ajaxurl,
		dataType: "html",
		data: { shortcode: shortcode, action: "cosmone_get_shortcode",attr:form.serializeArray()},
		
		success:function(data){
		
		jQuery.magnificPopup.close();
		form.find("#cosmone-shortcodes-settings").hide();
		form.find("#cosmone-shortcodes-settings-innter").html("");
		form.find(".cosmone_shortcodes_list").show();
        form.find(".cosmone-shortcode").val(data);
		if(jQuery('#cosmone-shortcode-textarea').val() !="" ){
			var textarea = jQuery('#cosmone-shortcode-textarea').val();
			if(textarea !== "undefined"){
		    var position = jQuery("#"+textarea).getCursorPosition();
			var content = jQuery("#"+textarea).val();
            var newContent = content.substr(0, position) + data + content.substr(position);
            jQuery("#"+textarea).val(newContent);
			
			}
			}else{
		window.cosmone_wpActiveEditor = window.wpActiveEditor;
		// Insert shortcode
		window.wp.media.editor.insert(data);
		// Restore previous editor
		window.wpActiveEditor = window.cosmone_wpActiveEditor;
		}
		},
		error:function(){
			jQuery.magnificPopup.close();
		// return false;
		}
		});
		// return false;
   });

 //preview shortcode

jQuery(".cosmone-shortcode-preview").bind("click",function(e){

    var obj       = jQuery(this);
	var form      = obj.parents("div#cosmone_shortcodes_container form");
	var shortcode = form.find("input#cosmone-curr-shortcode").val();

	jQuery.ajax({
		type: "POST",
		url: cosmone_params.ajaxurl,
		dataType: "html",
		data: { shortcode: shortcode, action: "cosmone_get_shortcode",attr:form.serializeArray()},
		
		success:function(data){
      
		jQuery.ajax({type: "POST",url: cosmone_params.ajaxurl,dataType: "html",data: { shortcode: data, action: "cosmone_shortcode_preview"},	
		success:function(content){
			jQuery("#cosmone-shortcode-preview").html(content);
	        tb_show(shortcode + " preview","#TB_inline?width=600&amp;inlineId=cosmone-shortcode-preview",null);
			}
		});
	
		},
		error:function(){
			
		// return false;
		}
		});
		// return false;
   });

  });
 
 //get the position
 
 (function ($, undefined) {
    $.fn.getCursorPosition = function () {
        var el = $(this).get(0);
        var pos = 0;
        if ('selectionStart' in el) {
            pos = el.selectionStart;
        } else if ('selection' in document) {
            el.focus();
            var Sel = document.selection.createRange();
            var SelLength = document.selection.createRange().text.length;
            Sel.moveStart('character', -el.value.length);
            pos = Sel.text.length - SelLength;
        }
        return pos;
    }
})(jQuery);