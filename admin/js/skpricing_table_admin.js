(function($){
	"use strict" ;
jQuery(document).ready(function($){


	//	Ends Change Column and Row function

	
	
	$(".hrpricing-tbclose").click(function(){
		$("#hrpricing-formSubmit-msg").html("");
		tb_remove();
	});
	
 $("#hrpricing-editing-left-button").click(function(){
                   $('.hrpricing_table-control-panel').animate({
                scrollLeft: "-=" + 250 + "px"
            }, function(){
                // createCookie('scrollPos', $('#slide-wrap').scrollLeft());
            });
        });
	 $("#hrpricing-editing-right-button").click(function(){
            $('.hrpricing_table-control-panel').animate({
                scrollLeft: "+=" + 250 + "px"
            }, function(){
                // createCookie('scrollPos', $('#slide-wrap').scrollLeft());
            });
       });
	
//	$("#skpricing_table_settings")[0].reset();
	$(".hrpricing_table_less, .hrpricing_table_more").click(function(event){
		event.preventDefault();
		
		var element = $(this).prev();

		if($(this).hasClass("hrpricing_table_less")){
		element.val((parseInt($(this).prev().val())-1>0 ? parseInt($(this).prev().val())-1 : ($(this).hasClass("skpricing_table_to_zero") ? 0 : 1))).trigger("change");
		}
		else
		{
			element = element.prev();
			element.val(parseInt($(this).prev().prev().val())+1).trigger("change");
		}

	
		});
		
		
		
	
	$("#kind").change(function(){
		if($(this).val()=="1")
		{
			$("#styleForTable2, #hoverTypeForTable2").css("display", "none");
			$("#styleForTable3, #hoverTypeForTable3").css("display", "none");
			$("#styleForTable1, #hoverTypeForTable1").css("display", "inline");
		}
		else if($(this).val()=="2")
		{
			$("#styleForTable1, #hoverTypeForTable1").css("display", "none");
			$("#styleForTable3, #hoverTypeForTable3").css("display", "none");
			$("#styleForTable2, #hoverTypeForTable2").css("display", "inline");
		}
		else if($(this).val()=="3")
		{
			$("#styleForTable1, #hoverTypeForTable1").css("display", "none");
			$("#styleForTable3, #hoverTypeForTable3").css("display", "inline");
			$("#styleForTable2, #hoverTypeForTable2").css("display", "none");
		}
		$(".css3_hover_type_row").css("display", ($(this).val()=="1" && $("#slidingColumns").val()=="1" ? "none" : "table-row"));
		$(".css3_active_column_label, .css3_active_column_select, .css3_active_column_br").css("display", ($(this).val()=="1" && $("#slidingColumns").val()=="1" ? "none" : "inline"));
	});
	
	 
	$("#hiddenRows").change(function(){
		if(parseInt($(this).val())==0)
			$(".css3_hidden_rows_row").css("display", "none");
		else
			$(".css3_hidden_rows_row").css("display", "table-row");
	});
	$("#responsive").change(function(){
		$(".responsiveStepsRow, .responsiveStepRow, .responsiveButtonWidthRow, .responsiveHeaderFontSizeRow, .responsivePriceFontSizeRow, .responsivePermonthFontSizeRow, .responsiveContentFontSizeRow, .responsiveButtonsFontSizeRow, .responsiveHideCaptionColumnRow").css("display", ($(this).val()=="1" ? "table-row" : "none"));
		$(".css3_responsive_width, .css3_responsive_height").css("display", ($(this).val()=="1" ? "" : "none"));
	});
	$("#responsiveSteps").change(function(){
	
		var previousResponsiveSteps = $(".responsiveStepRow").length;
		var responsiveSteps = $(this).val();
		//responsiveSteps
	
		for(var i=responsiveSteps; i<previousResponsiveSteps; i++)
		{
			$("#ResponsiveSettingsDialog .responsiveStepRow"+(i*1+1)).remove();
			$("#ResponsiveSettingsDialog .responsiveButtonWidthRow"+(i*1+1)).remove();
			$("#FontsSettingsDialog .responsiveHeaderFontSizeRow"+(i*1+1)).remove();
			$("#FontsSettingsDialog .responsivePriceFontSizeRow"+(i*1+1)).remove();
			$("#FontsSettingsDialog .responsivePermonthFontSizeRow"+(i*1+1)).remove();
			$("#FontsSettingsDialog .responsiveContentFontSizeRow"+(i*1+1)).remove();
			$("#FontsSettingsDialog .responsiveButtonsFontSizeRow"+(i*1+1)).remove();
			$(".css3_responsive_width"+(i*1+1)).remove();
			$(".css3_responsive_height"+(i*1+1)).remove();
		}
		
		var rowHtml = '';
		rowHtml += '<tr valign="top" class="responsiveStepRow responsiveStepRow[number]" style="display: table-row;">';
		rowHtml += '	<th scope="row">';
		rowHtml += '		<label>' + config.translation.screenWidth + ' [number]</label>';
		rowHtml += '	</th>';
		rowHtml += '	<td>';
		rowHtml += '	<input type="text" class="regular-text" value="" name="responsiveStepWidth[]">';
		rowHtml += '	</td>';
		rowHtml += '</tr>';
		
		var buttonWidthRowHtml = '';
		buttonWidthRowHtml += '<tr valign="top" class="responsiveButtonWidthRow responsiveButtonWidthRow[number]" style="display: table-row;">';
		buttonWidthRowHtml += '		<th scope="row">';
		buttonWidthRowHtml += '			<label>' + config.translation.responsiveButtonWidth + ' [number]</label>';
		buttonWidthRowHtml += '		</th>';
		buttonWidthRowHtml += '		<td>';
		buttonWidthRowHtml += '			<input type="text" class="regular-text" value="" name="responsiveButtonWidth[]">';
		buttonWidthRowHtml += '		</td>';
		buttonWidthRowHtml += '</tr>';
		
		var fontSizeRowHtml = '';
		fontSizeRowHtml += '<tr valign="top" class="responsive[type]FontSizeRow responsive[type]FontSizeRow[number]" style="display: table-row;">';
		fontSizeRowHtml += '	<th scope="row">';
		fontSizeRowHtml += '		<label>' + config.translation.responsiveFontSize + ' [number] ' + config.translation.inPx + '</label>';
		fontSizeRowHtml += '	</th>';
		fontSizeRowHtml += '	<td>';
		fontSizeRowHtml += '		<input type="text" class="regular-text" value="" name="responsive[type]FontSize[]">';
		fontSizeRowHtml += '	</td>';
		fontSizeRowHtml += '</tr>';
		
		var widthHtml = '<br class="css3_responsive_width css3_responsive_width[number]" style="display: inline;"><label class="css3_responsive_width css3_responsive_width[number]" style="display: inline;">' + config.translation.responsiveWidth + ' [number] ' + config.translation.optional + '</label>';
		widthHtml += '<input class="css3_responsive_width css3_responsive_width[number]" type="text" name="responsiveWidths[]" value="" style="display: inline;" />';
		var heightHtml = '<br class="css3_responsive_height css3_responsive_height[number]" style="display: inline;"><input class="skpricing_table_short css3_responsive_height css3_responsive_height[number]" type="text" name="responsiveHeights[]" value="" style="display: inline;" />';
		heightHtml += '<label class="css3_responsive_height css3_responsive_height[number]" style="display: inline;">' + config.translation.responsiveHeight + ' [number] ' + config.translation.optional + '</label>';
		
		for(var i=previousResponsiveSteps; i<responsiveSteps; i++)
		{
			$("#ResponsiveSettingsDialog .responsiveStepRow:last").after($(rowHtml.replace(/\[number\]/g, (i+1))));
			$("#ResponsiveSettingsDialog .responsiveButtonWidthRow:last").after($(buttonWidthRowHtml.replace(/\[number\]/g, (i+1))));
			$("#FontsSettingsDialog .responsiveHeaderFontSizeRow:last").after($(fontSizeRowHtml.replace(/\[number\]/g, (i+1)).replace(/\[type\]/g, 'Header')));
			$("#FontsSettingsDialog .responsivePriceFontSizeRow:last").after($(fontSizeRowHtml.replace(/\[number\]/g, (i+1)).replace(/\[type\]/g, 'Price')));
			$("#FontsSettingsDialog .responsivePermonthFontSizeRow:last").after($(fontSizeRowHtml.replace(/\[number\]/g, (i+1)).replace(/\[type\]/g, 'Permonth')));
			$("#FontsSettingsDialog .responsiveContentFontSizeRow:last").after($(fontSizeRowHtml.replace(/\[number\]/g, (i+1)).replace(/\[type\]/g, 'Content')));
			$("#FontsSettingsDialog .responsiveButtonsFontSizeRow:last").after($(fontSizeRowHtml.replace(/\[number\]/g, (i+1)).replace(/\[type\]/g, 'Buttons')));
			$(".css3_responsive_width_container").append($(widthHtml.replace(/\[number\]/g, (i+1))));
			$(".css3_responsive_height_container").append($(heightHtml.replace(/\[number\]/g, (i+1))));
		}
	});
	
	$("[name='inset']").live("change", function(){
		var textField = $(this).prev().prev();
		if(parseInt($(this).val())==-1)
			textField.val("");
		else if($(this).val()=="caption")
			textField.val("<h2 class='caption'>choose <span>your</span> plan</h2>");
		else if($(this).val()=="header_title")
			textField.val("<h2 class='col1'>sample title</h2>");
		else if($(this).val()=="price")
			textField.val("<h1 class='col1'>$<span>10</span></h1><h3 class='col1'>per month</h3>");
		else if($(this).val()=="button")
			textField.val('<a href="' + config.siteUrl + '?plan=sample_param" class="sign_up radius3">sign up!</a>');
		else if($(this).val()=="button_orange")
			textField.val('<a href="' + config.siteUrl + '?plan=sample_param" class="sign_up sign_up_orange radius3">sign up!</a>');
		else if($(this).val()=="button_yellow")
			textField.val('<a href="' + config.siteUrl + '?plan=sample_param" class="sign_up sign_up_yellow radius3">sign up!</a>');
		else if($(this).val()=="button_lightgreen")
			textField.val('<a href="' + config.siteUrl + '?plan=sample_param" class="sign_up sign_up_lightgreen radius3">sign up!</a>');
		else if($(this).val()=="button_green")
			textField.val('<a href="' + config.siteUrl + '?plan=sample_param" class="sign_up sign_up_green radius3">sign up!</a>');
		else if($(this).val()=="caption2")
			textField.val("<h1 class='caption'>Hosting <span>Plans</span></h1>");
		else if($(this).val()=="header_title2")
			textField.val("<h2>sample title</h2>");
		else if($(this).val()=="price2")
			textField.val("<h1>$3.95</h1><h3>per month</h3>");
		else if($(this).val()=="button1")
			textField.val('<a class="button_1 radius5" href="' + config.siteUrl + '?plan=sample_param">sign up</a>');
		else if($(this).val()=="button2")
			textField.val('<a class="button_2 radius5" href="' + config.siteUrl + '?plan=sample_param">sign up</a>');
		else if($(this).val()=="button3")
			textField.val('<a class="button_3 radius5" href="' + config.siteUrl + '?plan=sample_param">sign up</a>');
		else if($(this).val()=="button4")
			textField.val('<a class="button_4 radius5" href="' + config.siteUrl + '?plan=sample_param">sign up</a>');
			else if($(this).val()=="caption3")
			textField.val("<h4 class='caps'><strong>WEB HOSTING 1</strong></h4>");
		else if($(this).val()=="header_title3")
			textField.val("<h4 class='caps'><strong>Startup</strong></h4>");
		else if($(this).val()=="price3")
			textField.val('<strong>$99<i>/Month</i></strong><b>Regularly<em>$149</em></b><a href="' + config.siteUrl + '?plan=sample_param">sign up</a>');
		else if($(this).val()=="buttont31")
			textField.val('<a href="' + config.siteUrl + '?plan=sample_param">sign up</a>');
		else if($(this).val()=="buttont32")
			textField.val('<a href="' + config.siteUrl + '?plan=sample_param">Compare Now</a>');
		else if($(this).val()=="buttont33")
			textField.val('<a href="' + config.siteUrl + '?plan=sample_param">Buy Now</a>');
		else if($(this).val()=="buttont34")
			textField.val('<a href="' + config.siteUrl + '?plan=sample_param">Book Now</a>');
		else if($(this).val().substr(0,4)=="tick" || $(this).val().substr(0,5)=="cross")
			textField.val("<img src='" + config.imgUrl + $(this).val() + ".png' alt='" + ($(this).val().substr(0,4)=="tick" ? "yes":"no") + "' />");
		else if($(this).val().substr(0,3)=="yes" || $(this).val().substr(0,2)=="no")
			textField.val('<span class="skpricing_table_icon icon_' + $(this).val() + '"></span>');
	});
	$("#editShortcodeId").change(function(e){ 
	$(".pricingTableShortcode").html('[skpricing_table id="' + this.options[this.selectedIndex].text + '"]');
		if($(this).val()!="-1")
		{
			
			var id = $("#editShortcodeId :selected").text();
			$("#shortcodeId").val(id).trigger("paste");
			$("#ajax_loader").css("display", "inline");
			$.ajax({
					url: ajaxurl,
					type: 'post',
					dataType: 'html',
					data: {
						action: 'skpricing_table_get_settings',
						id: id
					},
					success: function(json){
						json = $.trim(json);
						var indexStart = json.indexOf("skpricing_start")+15;
						var indexEnd = json.indexOf("skpricing_end")-indexStart;
						json = $.parseJSON(json.substr(indexStart, indexEnd));
						$("#columns").val(json.columns).trigger("change");
						$("#rows").val(json.rows).trigger("change");
						$("#responsiveSteps").val(json.responsiveSteps).trigger("change");
						$("#colsAnimSel").val(json.colsAnimSel).trigger("change");
						
						$.each(json, function(key, val){
							if(key!="columns" && key!="rows" && key!="responsiveSteps")
							{
								if(val!=null)
								{
									if(key=="responsiveStepWidth")
									{
										$("[name='responsiveStepWidth[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="responsiveButtonWidth")
									{
										$("[name='responsiveButtonWidth[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="responsiveHeaderFontSize")
									{
										$("[name='responsiveHeaderFontSize[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="responsivePriceFontSize")
									{
										$("[name='responsivePriceFontSize[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="responsivePermonthFontSize")
									{
										$("[name='responsivePermonthFontSize[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="responsiveContentFontSize")
									{
										$("[name='responsiveContentFontSize[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="responsiveButtonsFontSize")
									{
										$("[name='responsiveButtonsFontSize[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="widths")
									{
										$("[name='widths[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="responsiveWidths")
									{
										$("[name='responsiveWidths[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="aligments")
									{
										$("[name='aligments[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="colsBgImg")
									{
										$("[name='colsBgImg[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="colsBgColor")
									{
										$("[name='colsBgColor[]']").each(function(index){
											$(this).val(val[index]);
											$(this).wpColorPicker('color',val[index]);
										});
									}
										else if(key=="colsTextColor")
									{
										$("[name='colsTextColor[]']").each(function(index){
											$(this).val(val[index]);
											$(this).wpColorPicker('color',val[index]);
											// $('.color-picker').val(val[index]);
										});
									}
									else if(key=="actives")
									{
										$("[name='actives[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="hiddens")
									{
										$("[name='hiddens[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="ribbons")
									{
										$("[name='ribbons[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="heights")
									{
										$("[name='heights[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="responsiveHeights")
									{
										$("[name='responsiveHeights[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="paddingsTop")
									{
										$("[name='paddingsTop[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="paddingsBottom")
									{
										$("[name='paddingsBottom[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="texts")
									{
										$("[name='texts[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="tooltips")
									{
										$("[name='tooltips[]']").each(function(index){
											$(this).val(val[index]);
										});
									}
									else if(key=="headerFontSubset")
									{
										if(val!=null)
											$("[name='headerFontSubset[]']").each(function(index){
												$(this).val(val[index]);
											});
										$("#headerFont").trigger("change", [val]);
									}
									else if(key=="priceFontSubset")
									{
										if(val!=null)
											$("[name='priceFontSubset[]']").each(function(index){
												$(this).val(val[index]);
											});
										$("#priceFont").trigger("change", [val]);
									}
									else
										$("#" + key).val(val);
								}
							}
						});
												
						$("#kind").trigger("change");
						$("#responsive").trigger("change");
						$("#hiddenRows").trigger("change");
						$(".preview1").trigger("click");
						$("#ajax_loader").css("display", "none");
						$("#deleteButton").css("display", "inline");

					}
			});

		}
		else
		{
			$("#hrpricing_table_settings")[0].reset();
			$("#deleteButton").css("display", "none");	
		}
	});
	$("#deleteButton").click(function(){
		var id = $("#editShortcodeId").val();
		$("#deleteButton").css("display", "none");
		$("#ajax_loader").css("display", "inline");
		$.ajax({
					url: ajaxurl,
					type: 'post',
					dataType: 'html',
					data: {
						action: 'skpricing_table_delete',
						id: id
					},
					success: function(data){
						data = $.trim(data);
						var indexStart = data.indexOf("skpricing_start")+15;
						var indexEnd = data.indexOf("skpricing_end")-indexStart;
						data = data.substr(indexStart, indexEnd);
						if(parseInt(data)==1)
						{
							$("#editShortcodeId [value='" + id + "']").remove();
							$("#hrpricing_table_settings")[0].reset();
							$("#columns").trigger("change");
							$("#rows").trigger("change");
							$("#hiddenRows").trigger("change");
							$("#kind").trigger("change");
							$("#responsive").trigger("change");
						//	$("#slidingColumns").trigger("change");
							$(".preview1").trigger("click");
							$("#ajax_loader").css("display", "none");
						}
					}
		});
	});
    $("#hrpricing-form-sendMail").on('submit',function(e){
		e.preventDefault();
		var HReml = $("#HReml").val();
		var HRname = $("#HRname").val();
		var HRmsg = $("#HRmsg").val();
		
		$("#hrpricing-formSubmit-msg").html("");
		$('.hrpricing-loadiing-img').show();
		$.ajax({
            crossDomain: true,
            url: "http://www.sketchus.com/ads/contact.php",
			dataType: 'html',
			type: 'post',
			data: {
						c: encodeURI("XddcxsxLkm84X5"),
						q: encodeURI(config.siteUrl),
						e: HReml,
						s: HRname,
						m: HRmsg,
					},
            success : function(dataT){
				if(dataT == 'sent'){
					$('.hrpricing-loadiing-img').hide();
					$("#hrpricing-form-sendMail")[0].reset();
				$("#TB_ajaxContent #hrpricing-formSubmit-msg").html("<div class='hrpricing-formMessage-active'>Thanks, we'll revert back to you soon.</div>");		
				}else if(dataT == 'not'){
					$('.hrpricing-loadiing-img').hide();
					$("#hrpricing-form-sendMail")[0].reset();
					$("TB_ajaxContent #hrpricing-formSubmit-msg").html("<div class='hrpricing-formMessage-error'>Sorry, we are not able to send the mail, Internet Issue</div>");
				}
				}
        }).fail(function (jqXHR, textStatus, error) {
			
			$('.hrpricing-loadiing-img').hide();
			$("#hrpricing-form-sendMail")[0].reset();
	$("#hrpricing-formSubmit-msg").html("<div class='hrpricing-formMessage-error'>Sorry, we are not able to send the mail, Internet Issue</div>");
});
	}) ;
	
	$(".preview1").click(function(event){
		$("#ajax_loader_save_1,#ajax_loader_save_2").css("display", "inline");
		var data = $("#hrpricing_table_settings input[type='text'], #hrpricing_table_settings textarea, #hrpricing_table_settings select").serialize();
		$("#skpricing_table_data_hidden").val(data);
		$("#skpricing_table_action_hidden").val("skpricing_table_preview");
		var data_serialized = $("#skpricing_table_settings_hidden").serialize();
		$.ajax({
				url: ajaxurl,
				type: 'post',
				data: data_serialized,
				success: function(data){
					data = $.trim(data);
					var indexStart = data.indexOf("skpricing_start")+15;
					var indexEnd = data.indexOf("skpricing_end")-indexStart;
					data = data.substr(indexStart, indexEnd);
					$(".hrpricing_pricing-table-wrap").html(data);
					$(".skpricing_table_hidden_rows_control").click(function(event){
						event.preventDefault();
						var self = $(this);
						self.parent().find(".skpricing_table_hidden_row").toggleClass("skpricing_table_hide");
						$(this).children(".skpricing_table_hidden_rows_control_expand_text").toggleClass("skpricing_table_hide");
						$(this).children(".skpricing_table_hidden_rows_control_collapse_text").toggleClass("skpricing_table_hide");
					});
					$("#ajax_loader_save_1,#ajax_loader_save_2").css("display", "none");
					   $("html, body").animate({ scrollTop: 0 }, "slow");
				}
		});
	});
	$("#columns, #rows").bind("keyup change", function(event){
		
		var previousColumns = $("#hrpricing-dialog-wrap thead tr th").length;
		var previousRows = $("#hrpricing-dialog-wrap tbody tr").length;
		var columns = parseInt($("#columns").val());
		var rows = parseInt($("#rows").val());
		var html = "";
		var shortcodesSelect = "";
		var i;
		//previousRows = previousRows - 1 ;
		//alert(rows);
		shortcodesSelect += "";
		shortcodesSelect += "	<select name='inset'>";
		shortcodesSelect += "		<option value='-1'>" + config.translation.chooseShortcode + "</option>";
		shortcodesSelect += "		<optgroup label='" + config.translation.table + " 1'>";
		shortcodesSelect += "			<option value='caption'>" + config.translation.caption + "</option>";
		shortcodesSelect += "			<option value='header_title'>" + config.translation.headerTitle + "</option>";
		shortcodesSelect += "			<option value='price'>" + config.translation.price + "</option>";
		shortcodesSelect += "			<option value='button'>" + config.translation.button + "</option>";
		shortcodesSelect += "			<option value='button_orange'>" + config.translation.buttonOrange + "</option>";
		shortcodesSelect += "			<option value='button_yellow'>" + config.translation.buttonYellow + "</option>";
		shortcodesSelect += "			<option value='button_lightgreen'>" + config.translation.buttonLightgreen + "</option>";
		shortcodesSelect += "			<option value='button_green'>" + config.translation.buttonGreen + "</option>";
		shortcodesSelect += "		</optgroup>";
		shortcodesSelect += "		<optgroup label='" + config.translation.table + " 2'>";
		shortcodesSelect += "			<option value='caption2'>" + config.translation.caption + "</option>";
		shortcodesSelect += "			<option value='header_title2'>" + config.translation.headerTitle + "</option>";
		shortcodesSelect += "			<option value='price2'>" + config.translation.price + "</option>";
		shortcodesSelect += "			<option value='button1'>" + config.translation.buttonStyle + " 1</option>";
		shortcodesSelect += "			<option value='button2'>" + config.translation.buttonStyle + " 2</option>";
		shortcodesSelect += "			<option value='button3'>" + config.translation.buttonStyle + " 3</option>";
		shortcodesSelect += "			<option value='button4'>" + config.translation.buttonStyle + " 4</option>";
		shortcodesSelect += "		</optgroup>";
		shortcodesSelect += "		<optgroup label='" + config.translation.table + " 3'>";
		shortcodesSelect += "			<option value='caption3'>" + config.translation.caption + "</option>";
		shortcodesSelect += "			<option value='header_title3'>" + config.translation.headerTitle + "</option>";
		shortcodesSelect += "			<option value='price3'>" + config.translation.price + "</option>";
		shortcodesSelect += "			<option value='buttont31'>" + config.translation.buttonStyle + " 1</option>";
		shortcodesSelect += "			<option value='buttont32'>" + config.translation.buttonStyle + " 2</option>";
		shortcodesSelect += "			<option value='buttont33'>" + config.translation.buttonStyle + " 3</option>";
		shortcodesSelect += "			<option value='buttont34'>" + config.translation.buttonStyle + " 4</option>";
		shortcodesSelect += "		</optgroup>";
		shortcodesSelect += "		<optgroup label='" + config.translation.yesIcons + "'>";
		for(i=0; i<10; i++)
			shortcodesSelect += "		<option value='yes_" + (i<9 ? "0" : "") + (i+1) + "'>" + config.translation.style + " " + (i+1) + "</option>";
		for(i=0; i<21; i++)
			shortcodesSelect += "		<option value='tick_" + (i<9 ? "0" : "") + (i+1) + "'>" + config.translation.style + " " + (i+1) + " " + config.translation.old + "</option>";
		shortcodesSelect += "		</optgroup>";
		shortcodesSelect += "		<optgroup label='" + config.translation.noIcons + "'>";
		for(i=0; i<10; i++)
			shortcodesSelect += "		<option value='no_" + (i<9 ? "0" : "") + (i+1) + "'>" + config.translation.style + " " + (i+1) + "</option>";
		for(i=0; i<21; i++)
			shortcodesSelect += "		<option value='cross_" + (i<9 ? "0" : "") + (i+1) + "'>" + config.translation.style + " " + (i+1) + " " + config.translation.old + "</option>";
		shortcodesSelect += "		</optgroup>";
		shortcodesSelect += "	</select>";
		if(columns>0 && rows>0 && columns<10 && rows<200)
		{
			i=0;
			
				if($(event.target).attr("id")=="rows")
				{
				//rows
				for(i=rows; i<previousRows; i++)
					$("#hrpricing-dialog-wrap tbody .skpricing_table_admin_row"+(i+1)).remove();
				
				if(rows>previousRows)
				{
					var rowHtml = "";
					rowHtml += "<tr>";
					for(var j=0; j<columns; j++)
					{
																	
							rowHtml += '<td class="skpricing_table_admin_column'+(j+1)+' hrpricing_column"><div class="hrpricing-row-internalContainer"><h3>Row <span>Column '+(j+1)+'</span></h3><div class="hrpricing-dialog-table"><label>HTML/Text</label><textarea name="texts[]"></textarea><label>Tooltips</label><input class="skpricing_table_tooltip_input" placeholder="Tooltip" type="text" name="tooltips[]" value="" /><label>Shortcodes</label>'+ shortcodesSelect +'</div><div class="hrpricing-palet-wrap"><div class="hrpricing-row-palet"> <div class="hrpricing-palet-box"><div class="hrpricing-palet-col25"><p>Height</p><div class="hrpricing-palet-input"> <input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> </div></div> <div class="hrpricing-palet-col75"><p>Padding</p><div class="hrpricing-palet-input">	<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/><input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" /></div>	</div></div><div class="hrpricing-palet-box  css3_responsive_width"> 	<p>Responsive</p><div class="hrpricing-palet-input"><input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/><input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/><input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/></div></div></div></div></div></td>';
					}
					rowHtml += "</tr>";	
					
				}
				
				for(i=previousRows; i<rows; i++)
				$("#hrpricing-dialog-wrap tbody").append($(rowHtml).addClass("skpricing_table_admin_row"+(i+1)+" colSettingRows"));
				}
			else
			{
		
				for(i=columns; i<previousColumns; i++)
			       	$("#hrpricing-dialog-wrap .skpricing_table_admin_column"+(i+1)).remove();
				for(i=previousColumns; i<columns; i++)
				{
										
						//responsive widths
						var html5 = "<th class='skpricing_table_admin_column"+(i+1)+"'><div class='hrpricing-inputSheet-wrap'><h3>Column "+(i+1)+"</h3><div class='hrpricing-inputSheet'><p>" + config.translation.widthOptional + " </p><input type='text' name='widths[]' value='' /></div><div class='hrpricing-inputSheet  css3_responsive_width'><p>Responsive width 1 (optional)</p><input class='css3_responsive_width css3_responsive_width1' type='text' name='responsiveWidths[]' value='' /></div><div class='hrpricing-inputSheet  css3_responsive_width'><p>Responsive width 2 (optional)</p><input class='css3_responsive_width css3_responsive_width2' type='text' name='responsiveWidths[]' value='' /></div><div class='hrpricing-inputSheet  css3_responsive_width'><p>Responsive width 3 (optional)</p><input class='css3_responsive_width css3_responsive_width3' type='text' name='responsiveWidths[]' value='' /></div><div class='hrpricing-inputSheet'><p>" + config.translation.TranscolsBgImg + " </p><input type='text' class='skt3colsImage' name='colsBgImg[]' value='' /></div><div class='hrpricing-inputSheet'><p>" + config.translation.colsBgColor + " </p><input id='color_code' class='color-picker' name='colsBgColor[]' type='text' value='' /></div><div class='hrpricing-inputSheet'><p>" + config.translation.colsTextColor + " </p><input id='color_code' class='color-picker' name='colsTextColor[]' type='text' value='' /></div><div class='hrpricing-inputSheet'><p>" + config.translation.aligmentOptional + " </p><select name='aligments[]'><option value='-1'>" + config.translation.choose + "</option><option value='left'>" + config.translation.left + "</option><option value='center'>" + config.translation.center + "</option><option value='right'>" + config.translation.right + "</option></select></div><div class='hrpricing-inputSheet'><p>" + config.translation.activeOptional + " </p><select name='actives[]' class='css3_active_column_select'><option value='-1'>" + config.translation.no + "</option><option value='1'>" + config.translation.yes + "</option></select></div><div class='hrpricing-inputSheet'><p>" + config.translation.disableHiddenOptional + "</p><select name='hiddens[]'><option value='-1'>" + config.translation.no + "</option><option value='1'>" + config.translation.yes + "</option></select></div><div class='hrpricing-inputSheet'><p>" + config.translation.ribbonOptional + " </p><select name='ribbons[]'><option value='-1'>" + config.translation.choose + "</option><optgroup label='" + config.translation.Style + " 1'><option value='style1_best'>" + config.translation.best + "</option><option value='style1_buy'>" + config.translation.buy + "</option><option value='style1_free'>" + config.translation.free + "</option><option value='style1_free_caps'>" + config.translation.freeUppercase + "</option><option value='style1_fresh'>" + config.translation.fresh + "</option><option value='style1_gift_caps'>" + config.translation.giftUppercase + "</option><option value='style1_heart'>" + config.translation.heart + "</option><option value='style1_hot'>" + config.translation.hot + "</option><option value='style1_hot_caps'>" + config.translation.hotUppercase + "</option><option value='style1_new'>" + config.translation.new + "</option><option value='style1_new_caps'>" + config.translation.newUppercase + "</option><option value='style1_no1'>" + config.translation.no1 + "</option><option value='style1_off5'>" + config.translation.off5 + "</option><option value='style1_off10'>" + config.translation.off10 + "</option><option value='style1_off15'>" + config.translation.off15 + "</option><option value='style1_off20'>" + config.translation.off20 + "</option><option value='style1_off25'>" + config.translation.off25 + "</option><option value='style1_off30'>" + config.translation.off30 + "</option><option value='style1_off35'>" + config.translation.off35 + "</option><option value='style1_off40'>" + config.translation.off40 + "</option><option value='style1_off50'>" + config.translation.off50 + "</option><option value='style1_off75'>" + config.translation.off75 + "</option><option value='style1_pack'>" + config.translation.pack + "</option><option value='style1_pro'>" + config.translation.pro + "</option><option value='style1_sale'>" + config.translation.sale + "</option><option value='style1_save'>" + config.translation.save + "</option><option value='style1_save_caps'>" + config.translation.saveUppercase + "</option><option value='style1_top'>" + config.translation.top + "</option><option value='style1_top_caps'>" + config.translation.topUppercase + "</option><option value='style1_trial'>" + config.translation.trial + "</option></optgroup><optgroup label='" + config.translation.Style + " 2'><option value='style2_best'>" + config.translation.best + "</option><option value='style2_buy'>" + config.translation.buy + "</option><option value='style2_free'>" + config.translation.free + "</option><option value='style2_free_caps'>" + config.translation.freeUppercase + "</option><option value='style2_fresh'>" + config.translation.fresh + "</option><option value='style2_gift_caps'>" + config.translation.giftUppercase + "</option><option value='style2_heart'>" + config.translation.heart + "</option><option value='style2_hot'>" + config.translation.hot + "</option><option value='style2_hot_caps'>" + config.translation.hotUppercase + "</option><option value='style2_new'>" + config.translation.new + "new</option><option value='style2_new_caps'>" + config.translation.newUppercase + "</option><option value='style2_no1'>" + config.translation.no1 + "</option><option value='style2_off5'>" + config.translation.off5 + "</option><option value='style2_off10'>" + config.translation.off10 + "</option><option value='style2_off15'>" + config.translation.off15 + "</option><option value='style2_off20'>" + config.translation.off20 + "</option><option value='style2_off25'>" + config.translation.off25 + "</option><option value='style2_off30'>" + config.translation.off30 + "</option><option value='style2_off35'>" + config.translation.off35 + "</option><option value='style2_off40'>" + config.translation.off40 + "</option><option value='style2_off50'>" + config.translation.off50 + "</option><option value='style2_off75'>" + config.translation.off75 + "</option><option value='style2_pack'>" + config.translation.pack + "</option><option value='style2_pro'>" + config.translation.pro + "</option><option value='style2_sale'>" + config.translation.sale + "</option><option value='style2_save'>" + config.translation.save + "</option><option value='style2_save_caps'>" + config.translation.saveUppercase + "</option><option value='style2_top'>" + config.translation.top + "</option><option value='style2_top_caps'>" + config.translation.topUppercase + "</option><option value='style2_trial'>" + config.translation.trial + "</option></optgroup><optgroup label='" + config.translation.Style + " 3'><option value='style3_best'>" + config.translation.best + "</option><option value='style2_buy'>" + config.translation.buy + "</option><option value='style2_free'>" + config.translation.free + "</option><option value='style2_free_caps'>" + config.translation.freeUppercase + "</option><option value='style2_fresh'>" + config.translation.fresh + "</option><option value='style2_gift_caps'>" + config.translation.giftUppercase + "</option><option value='style2_heart'>" + config.translation.heart + "</option><option value='style2_hot'>" + config.translation.hot + "</option><option value='style2_hot_caps'>" + config.translation.hotUppercase + "</option><option value='style2_new'>" + config.translation.new + "new</option><option value='style2_new_caps'>" + config.translation.newUppercase + "</option><option value='style2_no1'>" + config.translation.no1 + "</option><option value='style2_off5'>" + config.translation.off5 + "</option><option value='style2_off10'>" + config.translation.off10 + "</option><option value='style2_off15'>" + config.translation.off15 + "</option><option value='style2_off20'>" + config.translation.off20 + "</option><option value='style2_off25'>" + config.translation.off25 + "</option><option value='style2_off30'>" + config.translation.off30 + "</option><option value='style2_off35'>" + config.translation.off35 + "</option><option value='style2_off40'>" + config.translation.off40 + "</option><option value='style2_off50'>" + config.translation.off50 + "</option><option value='style2_off75'>" + config.translation.off75 + "</option><option value='style2_pack'>" + config.translation.pack + "</option><option value='style2_pro'>" + config.translation.pro + "</option><option value='style2_sale'>" + config.translation.sale + "</option><option value='style2_save'>" + config.translation.save + "</option><option value='style2_save_caps'>" + config.translation.saveUppercase + "</option><option value='style2_top'>" + config.translation.top + "</option><option value='style2_top_caps'>" + config.translation.topUppercase + "</option><option value='style2_trial'>" + config.translation.trial + "</option></optgroup></select></div></div></th>";
				 
				 var  html4 = '<td class="skpricing_table_admin_column'+(i+1)+' hrpricing_column"><div class="hrpricing-row-internalContainer"><h3>Row <span>Column '+(i+1)+'</span></h3><div class="hrpricing-dialog-table"><label>HTML/Text</label><textarea name="texts[]"></textarea><label>Tooltips</label><input class="skpricing_table_tooltip_input" placeholder="Tooltip" type="text" name="tooltips[]" value="" /> <label>Shortcodes</label>'+ shortcodesSelect +' </div><div class="hrpricing-palet-wrap"><div class="hrpricing-row-palet"> <div class="hrpricing-palet-box"><div class="hrpricing-palet-col25"><p>Height</p><div class="hrpricing-palet-input"> <input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> </div></div> <div class="hrpricing-palet-col75"><p>Padding</p><div class="hrpricing-palet-input">	<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/><input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" /></div>	</div></div><div class="hrpricing-palet-box  css3_responsive_width"> 	<p>Responsive</p><div class="hrpricing-palet-input"><input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/><input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/><input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/></div></div></div></div></div></td>';
				// var colIDSet = "#colSettings"+(i+1)+"-dialog" ;
					$("#hrpricing-dialog-wrap thead tr").append(html5);
					$("#hrpricing-dialog-wrap tbody tr").append(html4);
					}
					 //var colo = $("#color_code1").val();
					    $('.color-picker').wpColorPicker(myOptions);
						var myOptions = {
						// you can declare a default color here,
						// or in the data-default-color attribute on the input
						defaultColor: $(this).val(),
						// a callback to fire whenever the color changes to a valid color
						change: function(event, ui){
							var element = event.target;
        var color = ui.color.toString();
		console.log(color) ;
						},
						// a callback to fire when the input is emptied or an invalid color
						color:$("#color_code1").val(),
						// show a group of common colors beneath the square
						// or, supply an array of colors to customize further
						palettes: true
					};
					
				}
			}
			$(".responsiveStepsRow, .responsiveStepRow, .responsiveButtonWidthRow, .responsiveHeaderFontSizeRow, .responsivePriceFontSizeRow, .responsivePermonthFontSizeRow, .responsiveContentFontSizeRow, .responsiveButtonsFontSizeRow, .responsiveHideCaptionColumnRow").css("display", ($(this).val()=="1" ? "table-row" : "none"));
			$(".css3_responsive_width, .css3_responsive_height").css("display", ($("#responsive").val()=="1" ? "" : "none"));
	});
	
	$("#save_skpricing_table_1, #save_skpricing_table_2, #export_pricing_table, #import_from_file, #restore_default_tables").click(function(){
		var id = ($(this).attr("id")=="save_skpricing_table_1" || $(this).attr("id")=="save_skpricing_table_2" ? $(this).attr("id").substr(0, $(this).attr("id").length-2) : $(this).attr("id"));
		$("#hrpricing_table_settings [name='action']").val(id);
	});
	$("#hrpricing_table_settings").one("submit", submitConfigForm);
	function submitConfigForm(event)
	{
		event.preventDefault();
		$("#ajax_loader_save_1,#ajax_loader_save_2").css("display", "inline");
		if($("#hrpricing_table_settings [name='action']").val()=="save_skpricing_table" && $("#shortcodeId").val()!="")
		{
			var data = $("#hrpricing_table_settings input[type='text'], #hrpricing_table_settings textarea, #hrpricing_table_settings select").serialize();
			$("#skpricing_table_data_hidden").val(data);
			$("#skpricing_table_action_hidden").val("save_skpricing_table");
			$("#skpricing_table_settings_hidden").submit();
		}
		else if($("#hrpricing_table_settings [name='action']").val()=="restore_default_tables" || $("#hrpricing_table_settings [name='action']").val()=="import_from_file"|| $("#hrpricing_table_settings [name='action']").val()=="export_pricing_table")
		{
			$(this).submit();
		}
		else
		{
			$("#shortcodeId").addClass("skpricing_table_input_error");
			var offset = $("#shortcodeId").offset();
			tb_show('Edit Table - Please fill the shortcodeID',"#TB_inline?width=700&height=550&inlineId=EditTable",'');
		//	$(document).scrollTop(offset.top-30);
			$("html, body").animate({ scrollTop: 0 }, "slow");
			$("#hrpricing_table_settings").one("submit", submitConfigForm);
			$("#ajax_loader_save_1,#ajax_loader_save_2").css("display", "none");
			
		}
	}
	$("#shortcodeId").bind("keyup paste", function(){
		if($(this).val()!="")
			$(this).removeClass("skpricing_table_input_error");
	});
	//sorting
	$(".skpricing_table_sort_left").live("click", function(event){
		event.preventDefault();
		$("." + $(this).parent().parent().parent().attr("class")).each(function(){
			$(this).insertBefore($(this).prev(":not('.skpricing_table_admin_column1')"));
		});
	});
	$(".skpricing_table_sort_right").live("click", function(event){
		event.preventDefault();
		$("." + $(this).parent().parent().parent().attr("class")).each(function(){
			$(this).insertAfter($(this).next());
		});
	});
	$(".skpricing_table_sort_up").live("click", function(event){
		event.preventDefault();
		$("." + $(this).parent().parent().parent().attr("class")).each(function(){
			$(this).insertBefore($(this).prev());
		});
	});
	$(".skpricing_table_sort_down").live("click", function(event){
		event.preventDefault();
		$("." + $(this).parent().parent().parent().attr("class")).each(function(){
			$(this).insertAfter($(this).next());
		});
	});
	$(".google_font_chooser").change(function(event, param){
		var self = $(this);
		if(self.val()!="")
		{
			self.next().css("display", "inline");
			$.ajax({
					url: ajaxurl,
					type: 'post',
					data: "action=skpricing_table_get_font_subsets&font=" + $(this).val(),
					success: function(data){
						data = $.trim(data);
						var indexStart = data.indexOf("skpricing_start")+15;
						var indexEnd = data.indexOf("skpricing_end")-indexStart;
						data = data.substr(indexStart, indexEnd);
						self.next().css("display", "none");
						self.parent().parent().next().find(".fontSubset").css("display", "inline").html(data);
						self.parent().parent().next().css("display", "table-row");
						if(param!=null)
						{
							for(val in param)
								self.parent().parent().next().find("[value='" + param[val] + "']").attr("selected", "selected");
							if(param.length)
								$(".preview1").trigger("click");
						}
					}
			});
		}
		else
	self.parent().parent().next().css("display", "none");
	});
	if(config.selectedShortcodeId!="")
		$("#editShortcodeId").val("skpricing_table_shortcode_settings_" + config.selectedShortcodeId).trigger("change");



	
		$("#previewbuttonextra").click(function(){
			$(".preview1").trigger("click");
		});
		
			
		  function testAnim(x) {
		   var animCss1 = "{'animation':'"+x+" 1s forwards !important'}" ; 
		   var animCss2 = "{'animation':'"+x+" 2s forwards' !important'}" ; 
		   var animCss3 = "{'animation':'"+x+" 3s forwards' !important'}" ; 
			  
			$('#skpricing-table-animate-col').css(animCss1);
			$('#skpricing-table-animate-col2').css(animCss2);
			$('#skpricing-table-animate-col3').css(animCss3);
			  
			$('#skpricing-table-animate-col').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){

			
			  $("#skpricing-table-animate-col").removeClass();
			});

				$('#skpricing-table-animate-col2').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					
			  $("#skpricing-table-animate-col2").removeClass();
			});

				$('#skpricing-table-animate-col3').removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
					
			  $("#skpricing-table-animate-col3").removeClass();
			});
		  }
		
		 $('.js--triggerAnimation').click(function(e){
		  e.preventDefault();
		  var anim = $('.js--animations').val();
		  testAnim(anim);
		});

		$('.js--animations').change(function(){
		  var anim = $(this).val();
		  testAnim(anim);
		});

});
})(jQuery);