<?php
function skpricing_table_admin_page()
	{
		$error = "";
		$message = "";
		add_thickbox();

		if(isset($_POST["action"]) && $_POST["action"]=="save_skpricing_table")
		{
			if($_POST["shortcodeId"]!="")
			{
				$skpricing_table_options = array(
					'columns' => $_POST['columns'],
					'rows' => $_POST['rows'],
					'hiddenRows' => $_POST['hiddenRows'],
					'hiddenRowsButtonExpandText' => $_POST["hiddenRowsButtonExpandText"],
					'hiddenRowsButtonCollapseText' => $_POST["hiddenRowsButtonCollapseText"],
					'css3CustomCss' => $_POST["css3CustomCss"],
					'kind' => $_POST['kind'],
					'styleForTable1' => $_POST["styleForTable1"],
					'styleForTable2' => $_POST["styleForTable2"],
					'styleForTable3' => $_POST["styleForTable3"],
					'hoverTypeForTable1' => $_POST["hoverTypeForTable1"],
					'hoverTypeForTable2' => $_POST["hoverTypeForTable2"],
					'hoverTypeForTable3' => $_POST["hoverTypeForTable3"],
					'responsive' => $_POST['responsive'],
					'responsiveHideCaptionColumn' => $_POST['responsiveHideCaptionColumn'],
					'responsiveSteps' => $_POST['responsiveSteps'],
					'responsiveStepWidth' => $_POST['responsiveStepWidth'],
					'responsiveButtonWidth' => $_POST['responsiveButtonWidth'],
					'responsiveHeaderFontSize' => $_POST['responsiveHeaderFontSize'],
					'responsivePriceFontSize' => $_POST['responsivePriceFontSize'],
					'responsivePermonthFontSize' => $_POST['responsivePermonthFontSize'],
					'responsiveContentFontSize' => $_POST['responsiveContentFontSize'],
					'responsiveButtonsFontSize' => $_POST['responsiveButtonsFontSize'],
					'priceFontCustom' => $_POST['priceFontCustom'],
					'priceFont' => $_POST['priceFont'],
					'priceFontSubset' => (isset($_POST['priceFontSubset']) ? $_POST['priceFontSubset'] : ''),
					'priceFontSize' => $_POST['priceFontSize'],
					'headerFontCustom' => $_POST['headerFontCustom'],
					'headerFont' => $_POST['headerFont'],
					'headerFontSubset' => (isset($_POST['headerFontSubset']) ? $_POST['headerFontSubset'] : ''),
					'headerFontSize' => $_POST['headerFontSize'],
					'permonthFontCustom' => $_POST['permonthFontCustom'],
					'permonthFont' => $_POST['permonthFont'],
					'permonthFontSubset' => (isset($_POST['permonthFontSubset']) ? $_POST['permonthFontSubset'] : ''),
					'permonthFontSize' => $_POST['permonthFontSize'],
					'contentFontCustom' => $_POST['contentFontCustom'],
					'contentFont' => $_POST['contentFont'],
					'contentFontSubset' => (isset($_POST['contentFontSubset']) ? $_POST['contentFontSubset'] : ''),
					'contentFontSize' => $_POST['contentFontSize'],
					'buttonsFontCustom' => $_POST['buttonsFontCustom'],
					'buttonsFont' => $_POST['buttonsFont'],
					'buttonsFontSubset' => (isset($_POST['buttonsFontSubset']) ? $_POST['buttonsFontSubset'] : ''),
					'buttonsFontSize' => $_POST['buttonsFontSize'],
					'colsAnimSel' => $_POST['colsAnimSel'],
					'widths' => $_POST['widths'],
					'responsiveWidths' => $_POST['responsiveWidths'],
					'colsBgImg' => $_POST['colsBgImg'],
					'colsBgColor' => $_POST['colsBgColor'],
					'colsTextColor' => $_POST['colsTextColor'],
					'aligments' => $_POST['aligments'],
					'actives' => $_POST['actives'],		
					'hiddens' => $_POST['hiddens'],
					'ribbons' => $_POST['ribbons'],
					'heights' => $_POST['heights'],
					'responsiveHeights' => $_POST['responsiveHeights'],
					'paddingsTop' => $_POST['paddingsTop'],
					'paddingsBottom' => $_POST['paddingsBottom'],
					'texts' => $_POST['texts'],
					'tooltips' => $_POST['tooltips']
				);
				//add if not exist or update if exist
				$updated = true;
				if(!get_option('skpricing_table_shortcode_settings_' . $_POST["shortcodeId"]))
					$updated = false;
				update_option('skpricing_table_shortcode_settings_' . $_POST["shortcodeId"], $skpricing_table_options);
				$message .= __("Settings saved!", "skpricing_table") . ($updated ? __(" (overwritten)", "skpricing_table") : "");
				$message .= "<br />" . __("Please use", "skpricing_table") . "<br />[skpricing_table id='" . $_POST["shortcodeId"] . "']<br />" . __("shortcode to put HostRider pricing table on your page.", "skpricing_table") . "";
			}
			else
			{
				$error .= __("Please fill 'Shortcode id' field!", "skpricing_table");
			}
		}
		else if(isset($_POST["action"]) && $_POST["action"]=="import_from_file")
		{
			$importedOptions = json_decode(file_get_contents($_FILES['import_from_file_input']['tmp_name']),true);
			$importedOptionsCount = count($importedOptions);
			$importedIds = "";
			for($i=0; $i<$importedOptionsCount; $i++)
			{
				$name = $importedOptions[$i]["name"];
				unset($importedOptions[$i]["name"]);
				$importedIds .= "<br />" . substr($name, 29);
				update_option($name, $importedOptions[$i]);
			}
			if($importedIds!="")
				$message .= sprintf(__("Import completed successfully! Imported pricing tables: %s", "skpricing_table"), $importedIds);
			else
				$error .= __("No data for import found!", "skpricing_table");
		}
		else if(isset($_POST["action"]) && $_POST["action"]=="restore_default_tables")
		{
			//delete current tables			
			
		$pricingTables = array(
				"skpricing_table_shortcode_settings_Web_Hosting_1",
				"skpricing_table_shortcode_settings_Web_Hosting_2",
				"skpricing_table_shortcode_settings_Web_Hosting_3",
				"skpricing_table_shortcode_settings_Web_Hosting_4",
				"skpricing_table_shortcode_settings_Web_Hosting_5",
				"skpricing_table_shortcode_settings_Web_Hosting_6",
				"skpricing_table_shortcode_settings_Web_Hosting_7",
				"skpricing_table_shortcode_settings_Web_Hosting_8",
				"skpricing_table_shortcode_settings_Web_Hosting_9",
				"skpricing_table_shortcode_settings_Web_Hosting_10",
				"skpricing_table_shortcode_settings_Web_Hosting_11",
				"skpricing_table_shortcode_settings_Web_Hosting_12",
				"skpricing_table_shortcode_settings_Web_Hosting_13",
				"skpricing_table_shortcode_settings_Web_Hosting_14",
				"skpricing_table_shortcode_settings_Web_Hosting_15",
				"skpricing_table_shortcode_settings_Medical_1",
				"skpricing_table_shortcode_settings_Medical_2",
				"skpricing_table_shortcode_settings_Medical_3",
				"skpricing_table_shortcode_settings_Medical_4",
				"skpricing_table_shortcode_settings_Medical_5",
				"skpricing_table_shortcode_settings_Medical_6",
				"skpricing_table_shortcode_settings_Blue_Hexa",
				"skpricing_table_shortcode_settings_Black_Pearl",
				"skpricing_table_shortcode_settings_Ocean_Green",
				"skpricing_table_shortcode_settings_Blood_Orange",
				"skpricing_table_shortcode_settings_Dark_Fantacy",
				"skpricing_table_shortcode_settings_Dark_Slice",
				"skpricing_table_shortcode_settings_Dark_Crayons",
				"skpricing_table_shortcode_settings_Grey_Slate",
			);
			
			foreach($pricingTables as $pricingTable)
				delete_option($pricingTable);
				
	    
			//create default tables
			
			$message = __("Default pricing tables restored successfully!", "skpricing_table");
		}
		else if(isset($_POST["action"]) && $_POST["action"]=="export_pricing_table"){
		$idsCount = count($_POST["exportIds"]);
		$optionsArray = array();
		$fileContent = "";
		
		for($i=0; $i<$idsCount; $i++)
		{
			$values = is_array(get_option($_POST["exportIds"][$i])) ?
				array_map('stripslashes_deep', get_option($_POST["exportIds"][$i])) :
				stripslashes(get_option($_POST["exportIds"][$i]));
			$optionsArray[$i] = $values;
			$optionsArray[$i]["name"] = $_POST["exportIds"][$i];
		}
		$fileContent .= @json_encode($optionsArray);
		$fileContent .= $optionsArray;
		//print_r($optionsArray);
		
       $file = plugin_dir_path( __FILE__ ) . "export.json"; 
       $data = file_put_contents( $file, $fileContent);
	   $url = plugins_url( 'partials/export.json', dirname(__FILE__) );
	   if($data){
				$message .= __("Export completed successfully! <a href='".$url."'  target='_blank'>Click Here</a> to Download", "skpricing_table");
	   }else{
				$error .= __("No data for export found!", "skpricing_table");}
				

   //       $text = 'Export File Successfully Stored in <b> '.$file.' </b>' ;
   //     if (false === get_option('my_option')) {
   //     $mesg = '<div class="notice notice-success is-dismissible"><p>'.$text.'</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>' ;
	//		add_option('skpricing_table_notice_export', $mesg);
	//	} else {
	//		 $mesg = '<div class="notice notice-success is-dismissible"><p>'.$text.'</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>' ;
	//		update_option('my_option', $mesg);
	//	}
			
		}
		$skPricingTableAllShortcodeIds = array();
		/*if(function_exists('is_multisite') && is_multisite()) 
		{
			global $blog_id;
			global $wpdb;
			$blogs = $wpdb->get_results("SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A);
			$query = "SELECT meta_key, meta_value FROM {$wpdb->sitemeta} WHERE site_id='" . $blog_id . "' AND meta_key LIKE '%skpricing_table_shortcode_settings%'";
			$allOptions = $wpdb->get_results($query, ARRAY_A);
			foreach($allOptions as $key => $value)
			{
				if(substr($value["meta_key"], 0, 28)=="skpricing_table_shortcode_settings")
					$skPricingTableAllShortcodeIds[] = $value["meta_key"];
			}
		}
		else
		{*/
			//get pricing tables list
			global $wpdb;
			$query = "SELECT option_name FROM {$wpdb->options}
					WHERE 
					option_name LIKE 'skpricing_table_shortcode_settings%'
					ORDER BY option_name";
			$pricing_tables_list = $wpdb->get_results($query);
			$skPricingTableAllShortcodeIds = array();
			foreach($pricing_tables_list as $pricing_table)
				$skPricingTableAllShortcodeIds[] = $pricing_table->option_name;
			/*$allOptions = get_alloptions();
			foreach($allOptions as $key => $value)
			{
				if(substr($key, 0, 28)=="skpricing_table_shortcode_settings")
					$skPricingTableAllShortcodeIds[] = $key;
			}*/
		//}
		//sort shortcode ids
		sort($skPricingTableAllShortcodeIds);
		?>
		<?php
		if($error!="" || $message!="")
		{
		?>
		<div class="<?php echo ($message!="" ? "updated" : "error"); ?> settings-error"> 
			<p style="line-height: 150%;font-weight: bold;">
				<?php echo ($message!="" ? $message : $error); ?>
			</p>
		</div>
		<?php
		}
		?>
		
		
		<div class="wrap hrpricing_wrapper">
			<div class="hrpricing_top-header"><h1><?php _e("HostRider Pricing Table", "skpricing_table"); ?></h1><img src="<?php echo plugins_url('../img/footer-logo1.png',__FILE__) ; ?>" alt="hr-logo" width="238"></div>
		<?php
		$shortcodesSelect = "
			<select name='inset'>
				<option value='-1'>" . __('choose shortcode...', 'skpricing_table') . "</option>
				<optgroup label='" . __('Table', 'skpricing_table') . " 1'>
					<option value='caption'>" . __('caption', 'skpricing_table') . "</option>
					<option value='header_title'>" . __('header title', 'skpricing_table') . "</option>
					<option value='price'>" . __('price', 'skpricing_table') . "</option>
					<option value='button'>" . __('button', 'skpricing_table') . "</option>
					<option value='button_orange'>" . __('button orange', 'skpricing_table') . "</option>
					<option value='button_yellow'>" . __('button yellow', 'skpricing_table') . "</option>
					<option value='button_lightgreen'>" . __('button lightgreen', 'skpricing_table') . "</option>
					<option value='button_green'>" . __('button green', 'skpricing_table') . "</option>
				</optgroup>
				<optgroup label='" . __('Table', 'skpricing_table') . " 2'>
					<option value='caption2'>" . __('caption', 'skpricing_table') . "</option>
					<option value='header_title2'>" . __('header title', 'skpricing_table') . "</option>
					<option value='price2'>" . __('price', 'skpricing_table') . "</option>
					<option value='button1'>" . __('button style', 'skpricing_table') . " 1</option>
					<option value='button2'>" . __('button style', 'skpricing_table') . " 2</option>
					<option value='button3'>" . __('button style', 'skpricing_table') . " 3</option>
					<option value='button4'>" . __('button style', 'skpricing_table') . " 4</option>
				</optgroup>
				<optgroup label='" . __('Table', 'skpricing_table') . " 3'>
					<option value='caption3'>" . __('caption', 'skpricing_table') . "</option>
					<option value='header_title3'>" . __('header title', 'skpricing_table') . "</option>
					<option value='price3'>" . __('Price with Button', 'skpricing_table') . "</option>
					<option value='buttont31'>" . __('button style', 'skpricing_table') . " 1</option>
					<option value='buttont32'>" . __('button style', 'skpricing_table') . " 2</option>
					<option value='buttont33'>" . __('button style', 'skpricing_table') . " 3</option>
				</optgroup>
				<optgroup label='" . __('Yes icons', 'skpricing_table') . "'>";
		for($i=0; $i<10; $i++)
			$shortcodesSelect .= "<option value='yes_" . ($i<9 ? "0" : "") . ($i+1) . "'>" . __('style', 'skpricing_table') . " " . ($i+1) . "</option>";
		for($i=0; $i<21; $i++)
			$shortcodesSelect .= "<option value='tick_" . ($i<9 ? "0" : "") . ($i+1) . "'>" . __('style', 'skpricing_table') . " " . ($i+1) . " " . __('(old)', 'skpricing_table') . "</option>";
		$shortcodesSelect .= "</optgroup>
				<optgroup label='" . __('No icons', 'skpricing_table') . "'>";
		for($i=0; $i<10; $i++)
			$shortcodesSelect .= "<option value='no_" . ($i<9 ? "0" : "") . ($i+1) . "'>" . __('style', 'skpricing_table') . " " . ($i+1) . "</option>";
		for($i=0; $i<21; $i++)
			$shortcodesSelect .= "<option value='cross_" . ($i<9 ? "0" : "") . ($i+1) . "'>" . __('style', 'skpricing_table') . " " . ($i+1) . " " . __('(old)', 'skpricing_table') . "</option>";
		$shortcodesSelect .= "</optgroup>
			</select>";
//			<span class='skpricing_table_tooltip skpricing_table_admin_info'>
//				<span>
//					<div class='skpricing_table_tooltip_column'>
//						<strong>" . __('Yes icons', 'skpricing_table') . "</strong>";
//						for($i=0; $i<10; $i++)
//							$shortcodesSelect .= "<div class='p_table_1'><span class='cskpricing_table_icon icon_yes_" . ($i<9 ? "0" : "") . ($i+1) . "'></span></div><label>&nbsp;" . __('style', 'skpricing_table') . " " . ($i+1) . "</label><br />";
//		$shortcodesSelect .= "
//					</div>					
//					<div class='skpricing_table_tooltip_column'>
//						<strong>" . __('Yes icons(old)', 'skpricing_table') . "</strong>";
//						for($i=0; $i<11; $i++)
//							$shortcodesSelect .= "<img src='" . plugins_url("../img/tick_" . ($i<9 ? "0" : "") . ($i+1) . ".png", __FILE__) . "' /><label>&nbsp;" . __('style', 'skpricing_table') . " " . ($i+1) . "</label><br />";
//		$shortcodesSelect .= "
//					</div>
//					<div class='skpricing_table_tooltip_column'>
//						<strong>" . __('Yes icons(old)', 'skpricing_table') . "</strong>";
//						for($i=11; $i<21; $i++)
//							$shortcodesSelect .= "<img src='" . plugins_url("../img/tick_" . ($i+1) . ".png",__FILE__) . "' /><label>&nbsp;style " . ($i+1) . "</label><br />";
//		$shortcodesSelect .= "
//					</div>
//					<div class='skpricing_table_tooltip_column'>
//						<strong>" . __('No icons', 'skpricing_table') . "</strong>";
//					for($i=0; $i<10; $i++)
//							$shortcodesSelect .= "<div class='p_table_1'><span class='skpricing_table_icon icon_no_" . ($i<9 ? "0" : "") . ($i+1) . "'></span></div><label>&nbsp;" . __('style', 'skpricing_table') . " " . ($i+1) . "</label><br />";
//		$shortcodesSelect .= "
//					</div>
//					<div class='skpricing_table_tooltip_column'>
//						<strong>" . __('No icons(old)', 'skpricing_table') . "</strong>";
//					for($i=0; $i<11; $i++)
//							$shortcodesSelect .= "<img src='" . plugins_url("../img/cross_" . ($i<9 ? "0" : "") . ($i+1) . ".png",__FILE__) . "' /><label>&nbsp;" . __('style', 'skpricing_table') . " " . ($i+1) . "</label><br />";
//		$shortcodesSelect .= "
//					</div>
//					<div class='skpricing_table_tooltip_column'>
//						<strong>" . __('No icons(old)', 'skpricing_table') . "</strong>";
//					for($i=11; $i<21; $i++)
//							$shortcodesSelect .= "<img src='" . plugins_url("../img/cross_" . ($i+1) . ".png",__FILE__) . "' /><label>&nbsp;" . __('style', 'skpricing_table') . " " . ($i+1) . "</label><br />";
//		$shortcodesSelect .= "
//					</div>
//				</span>
//			</span>

		//	<label>" . __('tooltip: ', 'skpricing_table') . "</label><input class='skpricing_table_tooltip_input' type='text' name='tooltips[]' value='' />";
		
		//get google fonts
		$fontsArray = get_option("skpricing_table_google_fonts");
		//update if option doesn't exist or it was modified more than 2 weeks ago
		if($fontsArray===FALSE || (time()-$fontsArray->last_update>2*7*24*60*60)) 
		{
			$google_api_url = 'http://dev.sketchus.com/data/fonts.txt'; /*====================================================================================== */
			$fontsJson = wp_remote_retrieve_body(wp_remote_get($google_api_url, array('sslverify' => false )));
			$fontsArray = json_decode($fontsJson);
			$fontsArray->last_update = time();		
			update_option("skpricing_table_google_fonts", $fontsArray);
		}
		
		$fontsHtml = "";
		$fontsCount = count($fontsArray->items);
		for($i=0; $i<$fontsCount; $i++)
		{
			$variantsCount = count($fontsArray->items[$i]->variants);
			if($variantsCount>1)
			{
				for($j=0; $j<$variantsCount; $j++)
				{
					$fontsHtml .= '<option value="' . $fontsArray->items[$i]->family . ":" . $fontsArray->items[$i]->variants[$j] . '">' . $fontsArray->items[$i]->family . ":" . $fontsArray->items[$i]->variants[$j] . '</option>';
				}
			}
			else
			{
				$fontsHtml .= '<option value="' . $fontsArray->items[$i]->family . '">' . $fontsArray->items[$i]->family . '</option>';
			}
		}
	
		?>
		
	
		<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="hrpricing_table_settings" enctype="multipart/form-data">
			<nav>
				<ul>
					
						<a class="thickbox" href="#TB_inline?width=700&height=350&inlineId=SelectTable" title="Select Table">
						<li id="hrpricing_link-1" class="hrpricing-bl-0">
							<?php _e('Select Table', 'skpricing_table'); ?>
							</li>
						</a>
					<a class="thickbox" id="testingTB" href="#TB_inline?width=700&height=550&inlineId=EditTable" title="Edit Table">
					<li id="hrpricing_link-2">
						
							<?php _e('Edit Table', 'skpricing_table'); ?>
							</li>
						</a>
					<a class="thickbox" href="#TB_inline?width=600&height=550&inlineId=ResponsiveSettings" title="Responsive Settings" >
					<li id="hrpricing_link-3">
						
							<?php _e('Responsive', 'skpricing_table'); ?>
							</li >
						</a>
					<a class="thickbox" href="#TB_inline?width=600&height=550&inlineId=FontsSettings" title="Fonts Settings">
					<li id="hrpricing_link-4">
						
							<?php _e('Fonts Settings', 'skpricing_table'); ?>
						
					</li>
					</a>
					
					<a class="thickbox" href="#TB_inline?width=600&height=550&inlineId=AnimationSettings" title="Animation Settings">
					<li id="hrpricing_link-5"><div class="hrpricing-magic-badge-red">Premium</div>
						
							<?php _e('Animation', 'skpricing_table'); ?>
							</li>
						</a> 
					<a  class="" href="https://www.hostrider.us/pricing-tables/" target="_blank" title="Premium Tables">
					<li id="hrpricing_link-6"><div class="hrpricing-magic-badge-red">Premium</div>

							<?php _e('Premium Tables', 'skpricing_table'); ?>
							</li>
						</a>
					<a class="thickbox" href="#TB_inline?width=600&height=550&inlineId=GetHelp" title="Get Help ?">
					<li id="hrpricing_link-7"><div class="hrpricing-magic-badge-green">Free</div>
							<?php _e('Get Help ?', 'skpricing_table'); ?>
							</li>
					</a>
					
				</ul>
			</nav>
			
				<div id="SelectTable" style="display:none;" title="Select Table">
					<table class="form-table hrpricing_form-table">
						<tbody>
						<tr valign="top">
						<th scope="row">
							<label for="editShortcodeId"><?php _e("PreInstalled Pricing Tables", "skpricing_table"); ?></label>
						</th>
						<td>
							<select name="editShortcodeId" id="editShortcodeId" class="skt_pricing_select">
								<option value="-1"><?php _e('choose...', 'skpricing_table'); ?></option>
								<?php
									for($i=0; $i<count($skPricingTableAllShortcodeIds); $i++)
										echo "<option value='$skPricingTableAllShortcodeIds[$i]'>" . substr($skPricingTableAllShortcodeIds[$i], 35) . "</option>";
								?>
							</select>
							<img style="display: none; cursor: pointer;" id="deleteButton" src="<?php echo plugins_url('../img/delete.png',__FILE__); ?>" alt="del" title="<?php _e('Delete this pricing table', 'skpricing_table'); ?>" />
							<span id="ajax_loader" style="display: none;"><img style="margin-bottom: -3px;" src="<?php echo plugins_url('../img/ajax-loader.gif',__FILE__) ; ?>" /></span>
							<span class="hrpricing_description"><?php _e("Choose the shortcode id for editing", "skpricing_table"); ?></span>
						</td>
					</tr>
						<tr valign="top">
								<th scope="row">								
								</th>
								<td>
									<div class="hrpricing_form-btn"><button id="SelectTableD" class="hrpricing-tbclose">Done</button></div>
									
								</td>
							</tr>
					</tbody>
					</table>			
				</div>
				<div  id="EditTable"  style="display:none;" title="Edit Table Settings">
				<div class="hrpricing_edittable-wrap">
					<table class="form-table">
						<tbody>
						<tr valign="top">
						<th scope="row">
							<label for="shortcodeId"><?php _e("Create Custom ShortCode", "skpricing_table"); ?></label>
						</th>
						<td>
							<input type="text" class="hrpricing_regular-text" value="" id="shortcodeId" name="shortcodeId" pattern="[a-zA-z0-9\_\-]+" title="<?php _e("Please use only listed characters: letters, numbers, hyphen(-) and underscore(_)", "skpricing_table"); ?>">
							<span class="hrpricing_description"><?php _e("Unique identifier for skpricing_table shortcode. Don't use special characters.", "skpricing_table"); ?></span>
						</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="kind"><?php _e('Type', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="kind" id="kind">
										<option value="1"><?php _e('Table', 'skpricing_table'); ?> 1</option>
										<option value="2"><?php _e('Table', 'skpricing_table'); ?> 2</option>
										<option value="3"><?php _e('Table', 'skpricing_table'); ?> 3</option>
									</select>
									<span class="hrpricing_description"><?php _e('One of two available kinds of table.', 'skpricing_table'); ?></span>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="style"><?php _e('Style', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="styleForTable1" id="styleForTable1">
										<option value="1"><?php _e('Style', 'skpricing_table'); ?> 1</option>
										<option value="2"><?php _e('Style', 'skpricing_table'); ?> 2</option>
										<option value="3"><?php _e('Style', 'skpricing_table'); ?> 3</option>
										<option value="4"><?php _e('Style', 'skpricing_table'); ?> 4</option>
										<option value="5"><?php _e('Style', 'skpricing_table'); ?> 5</option>
										<option value="6"><?php _e('Style', 'skpricing_table'); ?> 6</option>
										<option value="7"><?php _e('Style', 'skpricing_table'); ?> 7</option>
										<option value="8"><?php _e('Style', 'skpricing_table'); ?> 8</option>
										<option value="9"><?php _e('Style', 'skpricing_table'); ?> 9</option>
										<option value="10"><?php _e('Style', 'skpricing_table'); ?> 10</option>
										<option value="11"><?php _e('Style', 'skpricing_table'); ?> 11</option>
										<option value="12"><?php _e('Style', 'skpricing_table'); ?> 12</option>
										<option value="13"><?php _e('Style', 'skpricing_table'); ?> 13 <?php _e('(medicenter blue)', 'skpricing_table'); ?></option>
										<option value="14"><?php _e('Style', 'skpricing_table'); ?> 14 <?php _e('(medicenter green)', 'skpricing_table'); ?></option>
										<option value="15"><?php _e('Style', 'skpricing_table'); ?> 15 <?php _e('(medicenter orange)', 'skpricing_table'); ?></option>
										<option value="16"><?php _e('Style', 'skpricing_table'); ?> 16 <?php _e('(medicenter red)', 'skpricing_table'); ?></option>
										<option value="17"><?php _e('Style', 'skpricing_table'); ?> 17 <?php _e('(medicenter turquoise)', 'skpricing_table'); ?></option>
										<option value="18"><?php _e('Style', 'skpricing_table'); ?> 18 <?php _e('(medicenter violet)', 'skpricing_table'); ?></option>
									</select>
									<select name="styleForTable2" id="styleForTable2" style="display: none;">
										<option value="1"><?php _e('Style', 'skpricing_table'); ?> 1</option>
										<option value="2"><?php _e('Style', 'skpricing_table'); ?> 2</option>
										<option value="3"><?php _e('Style', 'skpricing_table'); ?> 3</option>
										<option value="4"><?php _e('Style', 'skpricing_table'); ?> 4</option>
										<option value="5"><?php _e('Style', 'skpricing_table'); ?> 5</option>
										<option value="6"><?php _e('Style', 'skpricing_table'); ?> 6</option>
										<option value="7"><?php _e('Style', 'skpricing_table'); ?> 7</option>
										<option value="8"><?php _e('Style', 'skpricing_table'); ?> 8</option>
									</select>
									<select name="styleForTable3" id="styleForTable3" style="display: none;">
										<option value="1"><?php _e('Style', 'skpricing_table'); ?> 1</option>
										<option value="2"><?php _e('Style', 'skpricing_table'); ?> 2</option>
										<option value="3"><?php _e('Style', 'skpricing_table'); ?> 3</option>
										<option value="4"><?php _e('Style', 'skpricing_table'); ?> 4</option>
										<option value="5"><?php _e('Style', 'skpricing_table'); ?> 5</option>
										<option value="6"><?php _e('Style', 'skpricing_table'); ?> 6</option>
										<option value="7"><?php _e('Style', 'skpricing_table'); ?> 7</option>
										<option value="8"><?php _e('Style', 'skpricing_table'); ?> 8</option>
										<option value="9"><?php _e('Style', 'skpricing_table'); ?> 9</option>
									</select>
									<span class="hrpricing_description"><?php _e('Specifies the style version of the table.', 'skpricing_table'); ?></span>
								</td>
							</tr>
							<tr valign="top" class="css3_hover_type_row">
								<th scope="row">
									<label for="hoverType"><?php _e('Hover type', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="hoverTypeForTable1" id="hoverTypeForTable1">
										<option value="active"><?php _e('Active', 'skpricing_table'); ?></option>
										<option value="light"><?php _e('Light', 'skpricing_table'); ?></option>
										<option value="disabled"><?php _e('Disabled', 'skpricing_table'); ?></option>
									</select>
									<select name="hoverTypeForTable2" id="hoverTypeForTable2" style="display: none;">
										<option value="active"><?php _e('Active', 'skpricing_table'); ?></option>
										<option value="disabled"><?php _e('Disabled', 'skpricing_table'); ?></option>
									</select>
									<select disabled name="hoverTypeForTable3" id="hoverTypeForTable3" style="display: none;">
										<option value="disabled" selected ><?php _e('Disabled', 'skpricing_table'); ?></option>
									</select>
									<span class="hrpricing_description"><?php _e('Specifies the hover effect for the columns.', 'skpricing_table'); ?></span>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="columns"><?php _e('Columns', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input style="float: left;" type="text" readonly class="hrpricing_regular-text" value="3" id="columns" name="columns" maxlength="2">
									<div class="hrpricing_table_less" title="<?php _e('less', 'skpricing_table'); ?>"><i class="fa fa-minus"></i></div>
									<div class="hrpricing_table_more" title="<?php _e('more', 'skpricing_table'); ?>"><i class="fa fa-plus"></i></div>
									<span style="float: left;margin-top: 2px;" class="hrpricing_description"><?php _e('Number of columns.', 'skpricing_table'); ?></span>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="rows"><?php _e('Rows', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input style="float: left;" type="text" readonly class="hrpricing_regular-text" value="9" id="rows" name="rows" maxlength="2">
									<a href="#" class="hrpricing_table_less" title="<?php _e('less', 'skpricing_table'); ?>"><i class="fa fa-minus"></i></a>
									<a href="#" class="hrpricing_table_more" title="<?php _e('more', 'skpricing_table'); ?>"><i class="fa fa-plus"></i></a>
									<span style="float: left;margin-top: 2px;" class="hrpricing_description"><?php _e('Number of rows.', 'skpricing_table'); ?></span>
								</td>
							</tr>
							<tr valign="top" id="hiddenSetTab3">
								<th scope="row">
									<label for="hiddenRows"><?php _e('Hidden rows', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input style="float: left;" type="text" readonly class="hrpricing_regular-text" value="0" id="hiddenRows" name="hiddenRows" maxlength="2">
									<a href="#" class="hrpricing_table_less skpricing_table_to_zero" title="<?php _e('less', 'skpricing_table'); ?>"><i class="fa fa-minus"></i></a>
									<a href="#" class="hrpricing_table_more" title="<?php _e('more', 'skpricing_table'); ?>"><i class="fa fa-plus"></i></a>
									<span style="float: left;margin-top: 2px;" class="hrpricing_description"><?php _e('Number of hidden rows<br />at the bottom (for long tables).', 'skpricing_table'); ?></span>
								</td>
							</tr>
							<tr valign="top" class="css3_hidden_rows_row">
								<th scope="row">
									<label for="hiddenRowsButtonExpandText"><?php _e('Hidden rows button expand text', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="hrpricing_regular-text" value="<?php _e('Click here to expand!', 'skpricing_table'); ?>" id="hiddenRowsButtonExpandText" name="hiddenRowsButtonExpandText">
								</td>
							</tr>
							<tr valign="top" class="css3_hidden_rows_row">
								<th scope="row">
									<label for="hiddenRowsButtonCollapseText"><?php _e('Hidden rows button collapse text', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="hrpricing_regular-text" value="<?php _e('Click here to collapse!', 'skpricing_table'); ?>" id="hiddenRowsButtonCollapseText" name="hiddenRowsButtonCollapseText">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="css3CustomCss"><?php _e('Custom CSS code', 'skpricing_table'); ?></label>
								</th>
								<td>
									<textarea id="css3CustomCss" name="css3CustomCss" style="width: 64%; height: 200px;"></textarea>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">								
								</th>
								<td>
									<div class="hrpricing_form-btn"><button id="EditTableD" class="hrpricing-tbclose">Done</button></div>
								</td>
							</tr>
						</tbody>
					</table>
					</div>
				</div>
				<div  id="ResponsiveSettings" title="Responsive Settings"  style="display:none;">
				<div class="hrpricing_edittable-wrap">
					<table class="form-table">
						<tbody>
							<tr valign="top">
								<th scope="row">
									<label for="responsive"><?php _e('Responsive', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="responsive" id="css3_responsive_width" style="width:20%">
										<option value="0"><?php _e('no', 'skpricing_table'); ?></option>
										<option value="1"><?php _e('yes', 'skpricing_table'); ?></option>
									</select>
									<span class="hrpricing_description"><?php _e('Enable or disable responsive feature (fit for different resolutions).', 'skpricing_table'); ?></span>
								</td>
							</tr>
							<tr valign="top" class="responsiveStepsRow">
								<th scope="row">
									<label for="responsiveSteps"><?php _e('Responsive steps (sizes)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input style="float: left;" type="text" readonly class="regular-text" value="3" id="responsiveSteps" name="responsiveSteps" maxlength="2">
									<a href="#" class="skpricing_table_less" title="<?php _e('less', 'skpricing_table'); ?>"></a>
									<a href="#" class="skpricing_table_more" title="<?php _e('more', 'skpricing_table'); ?>"></a>
								</td>
							</tr>
							<tr valign="top" class="responsiveStepRow responsiveStepRow1">
								<th scope="row">
									<label><?php _e('Screen width', 'skpricing_table'); ?> 1</label>
								</th>
								<td>
									<input type="text" class="hrpricing_regular-text" value="1009" name="responsiveStepWidth[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveStepRow responsiveStepRow2">
								<th scope="row">
									<label><?php _e('Screen width', 'skpricing_table'); ?> 2</label>
								</th>
								<td>
									<input type="text" class="hrpricing_regular-text" value="767" name="responsiveStepWidth[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveStepRow responsiveStepRow3">
								<th scope="row">
									<label><?php _e('Screen width', 'skpricing_table'); ?> 3</label>
								</th>
								<td>
									<input type="text" class="hrpricing_regular-text" value="479" name="responsiveStepWidth[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveButtonWidthRow responsiveButtonWidthRow1">
								<th scope="row">
									<label><?php _e('Responsive button width', 'skpricing_table'); ?> 1</label>
								</th>
								<td>
									<input type="text" class="hrpricing_regular-text" value="" name="responsiveButtonWidth[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveButtonWidthRow responsiveButtonWidthRow2">
								<th scope="row">
									<label><?php _e('Responsive button width', 'skpricing_table'); ?> 2</label>
								</th>
								<td>
									<input type="text" class="hrpricing_regular-text" value="" name="responsiveButtonWidth[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveButtonWidthRow responsiveButtonWidthRow3">
								<th scope="row">
									<label><?php _e('Responsive button width', 'skpricing_table'); ?> 3</label>
								</th>
								<td>
									<input type="text" class="hrpricing_regular-text" value="" name="responsiveButtonWidth[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveHideCaptionColumnRow">
								<th scope="row">
									<label for="responsiveHideCaptionColumn"><?php _e('Hide caption (first) column on small resolutions', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="responsiveHideCaptionColumn" id="responsiveHideCaptionColumn" style="width: 20%">
										<option value="0"><?php _e('no', 'skpricing_table'); ?></option>
										<option value="1"><?php _e('yes', 'skpricing_table'); ?></option>
									</select>
									<span class="hrpricing_description"><?php _e('If set to \'yes\' you can adjust screen width value in responsive.css file (line 5).', 'skpricing_table'); ?></span>
								</td>
							</tr>
								<tr valign="top">
								<th scope="row">								
								</th>
								<td>
									<div class="hrpricing_form-btn"><button   id="ResponsiveSettingsD" class="hrpricing-tbclose">Done</button></div>
								</td>
							</tr>
						</tbody>
					</table>
					</div>
				</div>
				<div  id="FontsSettings"  style="display:none;" title="Fonts Settings">
				<div class="hrpricing_edittable-wrap">
					<table class="form-table">
						<tbody>
							<tr valign="top">
								<th scope="row">
									<label class="skpricing_table_bold">
										<?php _e('Header font', 'skpricing_table'); ?>
									</label>
								</th>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="headerFontCustom"><?php _e('Enter font name', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" id="headerFontCustom" name="headerFontCustom">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="headerFont"><?php _e('or choose Google font', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="headerFont" id="headerFont" class="google_font_chooser" style="width: 25em">
										<option value=""><?php _e("Default", 'skpricing_table'); ?></option>
										<?php
											echo $fontsHtml;
										?>
									</select>
									<span id="ajax_loader_header_font" style="display: none;"><img style="margin-bottom: -3px;" src="<?php echo plugins_url('../img/ajax-loader.gif',__FILE__); ?>"</span>
								</td>
							</tr>
							<tr valign="top" class="fontSubsetRow">
								<th scope="row">
									<label for="headerFontSubset"><?php _e('Google font subset', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="headerFontSubset[]" id="headerFontSubset" class="fontSubset" multiple="multiple"></select>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="headerFontSize"><?php _e('Font size (in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" id="headerFontSize" name="headerFontSize">
								</td>
							</tr>
							<tr valign="top" class="responsiveHeaderFontSizeRow responsiveHeaderFontSizeRow1">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 1 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsiveHeaderFontSize[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveHeaderFontSizeRow responsiveHeaderFontSizeRow2">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 2 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsiveHeaderFontSize[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveHeaderFontSizeRow responsiveHeaderFontSizeRow3">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 3 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsiveHeaderFontSize[]">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label class="skpricing_table_bold">
										<?php _e('Price font', 'skpricing_table'); ?>
									</label>
								</th>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="priceFontCustom"><?php _e('Enter font name', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" id="priceFontCustom" name="priceFontCustom">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="priceFont"><?php _e('or choose Google font', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="priceFont" id="priceFont" class="google_font_chooser"  style="width: 25em">
										<option value=""><?php _e("Default", 'skpricing_table'); ?></option>
										<?php
											echo $fontsHtml;
										?>
									</select>
									<span id="ajax_loader_price_font" style="display: none;"><img style="margin-bottom: -3px;" src="<?php echo plugins_url("../img/ajax-loader.gif",__FILE__) ; ?>"></span>
								</td>
							</tr>
							<tr valign="top" class="fontSubsetRow">
								<th scope="row">
									<label for="priceFontSubset"><?php _e('Google font subset', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="priceFontSubset[]" id="priceFontSubset" class="fontSubset" multiple="multiple"></select>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="priceFontSize"><?php _e('Font size (in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" id="priceFontSize" name="priceFontSize">
								</td>
							</tr>
							<tr valign="top" class="responsivePriceFontSizeRow responsivePriceFontSizeRow1">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 1 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsivePriceFontSize[]">
								</td>
							</tr>
							<tr valign="top" class="responsivePriceFontSizeRow responsivePriceFontSizeRow2">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 2 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsivePriceFontSize[]">
								</td>
							</tr>
							<tr valign="top" class="responsivePriceFontSizeRow responsivePriceFontSizeRow3">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 3 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsivePriceFontSize[]">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label class="skpricing_table_bold">
										<?php _e('Per month font', 'skpricing_table'); ?>
									</label>
								</th>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="permonthFontCustom"><?php _e('Enter font name', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" id="permonthFontCustom" name="permonthFontCustom">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="permonthFont"><?php _e('or choose Google font', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="permonthFont" id="permonthFont" class="google_font_chooser"  style="width: 25em">
										<option value=""><?php _e("Default", 'skpricing_table'); ?></option>
										<?php
											echo $fontsHtml;
										?>
									</select>
									<span id="ajax_loader_header_font" style="display: none;"><img style="margin-bottom: -3px;" src="<?php echo plugins_url('../img/ajax-loader.gif',__FILE__); ?>"  /></span>
								</td>
							</tr>
							<tr valign="top" class="fontSubsetRow">
								<th scope="row">
									<label for="permonthFontSubset"><?php _e('Google font subset', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="permonthFontSubset[]" id="permonthFontSubset" class="fontSubset" multiple="multiple"  style="width: 25em"></select>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="permonthFontSize"><?php _e('Font size (in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" id="permonthFontSize" name="permonthFontSize">
								</td>
							</tr>
							<tr valign="top" class="responsivePermonthFontSizeRow responsivePermonthFontSizeRow1">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 1 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsivePermonthFontSize[]">
								</td>
							</tr>
							<tr valign="top" class="responsivePermonthFontSizeRow responsivePermonthFontSizeRow2">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 2 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsivePermonthFontSize[]">
								</td>
							</tr>
							<tr valign="top" class="responsivePermonthFontSizeRow responsivePermonthFontSizeRow3">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 3 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsivePermonthFontSize[]">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label class="skpricing_table_bold">
										<?php _e('Content font', 'skpricing_table'); ?>
									</label>
								</th>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="contentFontCustom"><?php _e('Enter font name', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" id="contentFontCustom" name="contentFontCustom">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="contentFont"><?php _e('or choose Google font', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="contentFont" id="contentFont" class="google_font_chooser"  style="width: 25em">
										<option value=""><?php _e("Default", 'skpricing_table'); ?></option>
										<?php
											echo $fontsHtml;
										?>
									</select>
									<span id="ajax_loader_header_font" style="display: none;"><img style="margin-bottom: -3px;" src="<?php echo plugins_url('../img/ajax-loader.gif',__FILE__); ?>"  /></span>
								</td>
							</tr>
							<tr valign="top" class="fontSubsetRow">
								<th scope="row">
									<label for="contentFontSubset"><?php _e('Google font subset', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="contentFontSubset[]" id="contentFontSubset" class="fontSubset" multiple="multiple"></select>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="contentFontSize"><?php _e('Font size (in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" id="contentFontSize" name="contentFontSize">
								</td>
							</tr>
							<tr valign="top" class="responsiveContentFontSizeRow responsiveContentFontSizeRow1">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 1 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsiveContentFontSize[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveContentFontSizeRow responsiveContentFontSizeRow2">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 2 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsiveContentFontSize[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveContentFontSizeRow responsiveContentFontSizeRow3">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 3 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsiveContentFontSize[]">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label class="skpricing_table_bold">
										<?php _e('Buttons font', 'skpricing_table'); ?>
									</label>
								</th>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="buttonsFontCustom"><?php _e('Enter font name', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" id="buttonsFontCustom" name="buttonsFontCustom">
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="buttonsFont"><?php _e('or choose Google font', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="buttonsFont" id="buttonsFont" class="google_font_chooser"  style="width: 25em">
										<option value=""><?php _e("Default", 'skpricing_table'); ?></option>
										<?php
											echo $fontsHtml;
										?>
									</select>
									<span id="ajax_loader_header_font" style="display: none;"><img style="margin-bottom: -3px;" src="<?php echo plugins_url('../img/ajax-loader.gif',__FILE__); ?>"  /></span>
								</td>
							</tr>
							<tr valign="top" class="fontSubsetRow">
								<th scope="row">
									<label for="buttonsFontSubset"><?php _e('Google font subset', 'skpricing_table'); ?></label>
								</th>
								<td>
									<select name="buttonsFontSubset[]" id="buttonsFontSubset" class="fontSubset" multiple="multiple"></select>
								</td>
							</tr>
							<tr valign="top">
								<th scope="row">
									<label for="buttonsFontSize"><?php _e('Font size (in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" id="buttonsFontSize" name="buttonsFontSize">
								</td>
							</tr>
							<tr valign="top" class="responsiveButtonsFontSizeRow responsiveButtonsFontSizeRow1">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 1 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsiveButtonsFontSize[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveButtonsFontSizeRow responsiveButtonsFontSizeRow2">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 2 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsiveButtonsFontSize[]">
								</td>
							</tr>
							<tr valign="top" class="responsiveButtonsFontSizeRow responsiveButtonsFontSizeRow3">
								<th scope="row">
									<label><?php _e('Responsive font size', 'skpricing_table'); ?> 3 <?php _e('(in px)', 'skpricing_table'); ?></label>
								</th>
								<td>
									<input type="text" class="regular-text" value="" name="responsiveButtonsFontSize[]">
								</td>
							</tr>
								<tr valign="top">
								<th scope="row">								
								</th>
								<td>
									<div class="hrpricing_form-btn"><button id="FontsSettingsD" class="hrpricing-tbclose">Done</button></div>
								</td>
							</tr>
						</tbody>
					</table>
					</div>
				</div>
				<div  id="AnimationSettings" title="Animation Settings"  style="display:none;">
				   <div class="hrpricing_edittable-wrap">
					<table class="form-table">
						<tbody>
							<tr valign="top">
								<th scope="row">
									<label for="slidingColumns"><?php _e('Animate Columns', 'skpricing_table'); ?></label>
								</th>
								<td>
								<select  name="colsAnimSel" id="colsAnimSel"  class="js--animations" style="width: 25em">
										<option value="-1">Choose</option>
										<optgroup label="Attention Seekers">
										<option value="bounce">bounce</option>
										<option value="flash">flash</option>
										<option value="pulse">pulse</option>
										<option value="rubberBand">rubberBand</option>
										<option value="shake">shake</option>
										<option value="swing">swing</option>
										<option value="tada">tada</option>
										<option value="wobble">wobble</option>
										<option value="jello">jello</option>
										</optgroup>

										<optgroup label="Bouncing Entrances">
										<option value="bounceIn">bounceIn</option>
										<option value="bounceInDown">bounceInDown</option>
										<option value="bounceInLeft">bounceInLeft</option>
										<option value="bounceInRight">bounceInRight</option>
										<option value="bounceInUp">bounceInUp</option>
										</optgroup>

										<optgroup label="Bouncing Exits">
										<option value="bounceOut">bounceOut</option>
										<option value="bounceOutDown">bounceOutDown</option>
										<option value="bounceOutLeft">bounceOutLeft</option>
										<option value="bounceOutRight">bounceOutRight</option>
										<option value="bounceOutUp">bounceOutUp</option>
										</optgroup>

										<optgroup label="Fading Entrances">
										<option value="fadeIn">fadeIn</option>
										<option value="fadeInDown">fadeInDown</option>
										<option value="fadeInDownBig">fadeInDownBig</option>
										<option value="fadeInLeft">fadeInLeft</option>
										<option value="fadeInLeftBig">fadeInLeftBig</option>
										<option value="fadeInRight">fadeInRight</option>
										<option value="fadeInRightBig">fadeInRightBig</option>
										<option value="fadeInUp">fadeInUp</option>
										<option value="fadeInUpBig">fadeInUpBig</option>
										</optgroup>

										<optgroup label="Fading Exits">
										<option value="fadeOut">fadeOut</option>
										<option value="fadeOutDown">fadeOutDown</option>
										<option value="fadeOutDownBig">fadeOutDownBig</option>
										<option value="fadeOutLeft">fadeOutLeft</option>
										<option value="fadeOutLeftBig">fadeOutLeftBig</option>
										<option value="fadeOutRight">fadeOutRight</option>
										<option value="fadeOutRightBig">fadeOutRightBig</option>
										<option value="fadeOutUp">fadeOutUp</option>
										<option value="fadeOutUpBig">fadeOutUpBig</option>
										</optgroup>

										<optgroup label="Flippers">
										<option value="flip">flip</option>
										<option value="flipInX">flipInX</option>
										<option value="flipInY">flipInY</option>
										<option value="flipOutX">flipOutX</option>
										<option value="flipOutY">flipOutY</option>
										</optgroup>

										<optgroup label="Lightspeed">
										<option value="lightSpeedIn">lightSpeedIn</option>
										<option value="lightSpeedOut">lightSpeedOut</option>
										</optgroup>

										<optgroup label="Rotating Entrances">
										<option value="rotateIn">rotateIn</option>
										<option value="rotateInDownLeft">rotateInDownLeft</option>
										<option value="rotateInDownRight">rotateInDownRight</option>
										<option value="rotateInUpLeft">rotateInUpLeft</option>
										<option value="rotateInUpRight">rotateInUpRight</option>
										</optgroup>

										<optgroup label="Rotating Exits">
										<option value="rotateOut">rotateOut</option>
										<option value="rotateOutDownLeft">rotateOutDownLeft</option>
										<option value="rotateOutDownRight">rotateOutDownRight</option>
										<option value="rotateOutUpLeft">rotateOutUpLeft</option>
										<option value="rotateOutUpRight">rotateOutUpRight</option>
										</optgroup>

										<optgroup label="Sliding Entrances">
										<option value="slideInUp">slideInUp</option>
										<option value="slideInDown">slideInDown</option>
										<option value="slideInLeft">slideInLeft</option>
										<option value="slideInRight">slideInRight</option>

										</optgroup>
										<optgroup label="Sliding Exits">
										<option value="slideOutUp">slideOutUp</option>
										<option value="slideOutDown">slideOutDown</option>
										<option value="slideOutLeft">slideOutLeft</option>
										<option value="slideOutRight">slideOutRight</option>
										
										</optgroup>
										
										<optgroup label="Zoom Entrances">
										<option value="zoomIn">zoomIn</option>
										<option value="zoomInDown">zoomInDown</option>
										<option value="zoomInLeft">zoomInLeft</option>
										<option value="zoomInRight">zoomInRight</option>
										<option value="zoomInUp">zoomInUp</option>
										</optgroup>
										
										<optgroup label="Zoom Exits">
										<option value="zoomOut">zoomOut</option>
										<option value="zoomOutDown">zoomOutDown</option>
										<option value="zoomOutLeft">zoomOutLeft</option>
										<option value="zoomOutRight">zoomOutRight</option>
										<option value="zoomOutUp">zoomOutUp</option>
										</optgroup>

										<optgroup label="Specials">
										<option value="hinge">hinge</option>
										<option value="rollIn">rollIn</option>
										<option value="rollOut">rollOut</option>
										</optgroup>
									</select>
								
									<span class="hrpricing_description"><?php _e('Enable or disable Animation for columns.', 'skpricing_table'); ?></span>
								</td>
								<td></td>
							</tr>
							
						</tbody>
					</table>
					
					<div class="skpricing-table-animate-conatiner">
						   <div id="skpricing-table-animate-col">   <p>A</p> </div>
						   <div id="skpricing-table-animate-col2">  <p>B</p> </div>
						   <div id="skpricing-table-animate-col3">  <p>C</p> </div>
							</div>
							
									<div class="hrpricing_textbtn-center"><button class="butt js--triggerAnimation hrpricing_animatebtn">Animate</button><button id="AnimationSettingsD" class="hrpricing-tbclose hrpricing_animatebtn">Done</button></div>
							
					</div>
				</div>
			
				<!--Tab closed 		-->

			 
<!--
			<div class="skpricing_table_selectbox">
			
			<select id="grid_cols"></select>
		    
			    <input type="button" id="preview" value="<?php _e('Preview', 'skpricing_table'); ?>" class="skpricing-save-button preview1" name="Preview">
				<input type="hidden" name="action" value="save_pricing_table" />
				<input type="submit" id="save_skpricing_table_2" value="<?php _e('Save Options', 'pricing_table'); ?>" class="skpricing-save-button" name="Submit">
				<span id="ajax_loader_save_2" style="display: none;"><img style="margin-bottom: -3px;" src="<?php echo plugins_url('../img/ajax-loader.gif',__FILE__); ?>"  /></span>

			</div>
-->
			<div class="hrpricing_headline-box"> 
			<h2 class="hrpricing_headline hrpricing_flex-70">Preview</h2>
				<h3 class="pricingTableShortcode">[skpricing_table_print]</h3><span>Shortcode</span>	
			<h2 class="hrpricing_headline hrpricing_flex-25  hr_pricing-text-none inputColVal"></h2> 
			
			</div>
		<div class="hrpricing_table-container">
		   <div class="hrpricing_table-section">
		   
				<div class="hrpricing_pricing-table-wrap">
				<?php
						 echo do_shortcode("[skpricing_table_print]");
							?>
			    </div>

			</div><br>
				<div class="hrpricing-flexbtn"> 
				<button type="button" id="preview" value="<?php _e('Preview', 'skpricing_table'); ?>" class="preview1" name="Preview">Preview</button>
				<input type="hidden" name="action" value="save_pricing_table" />
				<button  type="submit" id="save_skpricing_table_2" value="<?php _e('Save Options', 'pricing_table'); ?>" class="skpricing-save-button" name="Submit">Save</button>   
				<span id="ajax_loader_save_2" style="display: none;"><img style="margin-bottom: -3px;" src="<?php echo plugins_url('../img/ajax-loader.gif',__FILE__); ?>"  /></span>
				</div>	
		</div>
					<div class="hrpricing_headline-box"> 
			<h2 class="hrpricing_headline hrpricing_flex-70">Editing</h2>
			<h2 class="hrpricing_headline hrpricing_flex-25  hr_pricing-text-none inputColVal"></h2> 
			<div id="hrpricing-editing-left-button" class="hrpricing-btn-scroll-left"><i class="fa fa-arrow-left"></i></div><div id="hrpricing-editing-right-button" class="hrpricing-btn-scroll-right"><i class="fa fa-arrow-right"></i></div>
			</div>
		<div class="hrpricing_table-container">
		
			<div class="hrpricing_table-control-panel ">
			<div id="hrpricing-controlPanel">
			<h2 class="hrpricing_resp-visible inputColVal"></h2>
			<table id="hrpricing-dialog-wrap"> 
			<thead>
			<tr class="">
			<th  class="skpricing_table_admin_column1 hrpricing_column">
			
			<div class='hrpricing-inputSheet-wrap'>
			<h3>Column 1</h3>
						<div class='hrpricing-inputSheet'>
						<p> <?php _e('width (optional):', 'skpricing_table'); ?> </p>
				<input type="text" name="widths[]" value="">
				</div>
			<div class='hrpricing-inputSheet css3_responsive_width'><p><?php _e('responsive width', 'skpricing_table'); ?> 1 <?php _e('(optional)', 'skpricing_table'); ?> </p>
				<input class="css3_responsive_width css3_responsive_width1" type="text" name="responsiveWidths[]" value="" />
      		</div>
			<div class='hrpricing-inputSheet css3_responsive_width'><p><?php _e('responsive width', 'skpricing_table'); ?> 2 <?php _e('(optional)', 'skpricing_table'); ?> </p>
				<input class="css3_responsive_width css3_responsive_width2" type="text" name="responsiveWidths[]" value="" />
      		</div>
			<div class='hrpricing-inputSheet css3_responsive_width'><p><?php _e('responsive width', 'skpricing_table'); ?> 3 <?php _e('(optional)', 'skpricing_table'); ?> </p>
				<input class="css3_responsive_width css3_responsive_width3" type="text" name="responsiveWidths[]" value="" /> 
      		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('Columns Background Image :', 'skpricing_table'); ?> </p>
				<input class="skt3colsImage" name="colsBgImg[]" type="text" data-alpha="true" value="" /> 
      		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('Columns Background Color :', 'skpricing_table'); ?> </p>
				<input id="color_code" class="color-picker" name="colsBgColor[]" type="text" data-alpha="true" value="#FF0000" />
      		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('Columns Text Color :', 'skpricing_table'); ?> </p>
				<input id="color_code1" class="color-picker" name="colsTextColor[]" type="text" data-alpha="true" value=""/>
     		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('aligment (optional):', 'skpricing_table'); ?> </p>
				<select name="aligments[]">
                <option value="-1"><?php _e('choose...', 'skpricing_table'); ?></option>
                <option value="left"><?php _e('left', 'skpricing_table'); ?></option>
                <option value="center"><?php _e('center', 'skpricing_table'); ?></option>
                <option value="right"><?php _e('right', 'skpricing_table'); ?></option>
              </select>
			</div>
			<div class='hrpricing-inputSheet'><p><?php _e('active (optional):', 'skpricing_table'); ?> </p>
				
				<select name="actives[]" class="css3_active_column_select">
                <option value="-1"><?php _e('no', 'skpricing_table'); ?></option>
                <option value="1"><?php _e('yes', 'skpricing_table'); ?></option>
                </select>
				
      		</div>
      		<div class='hrpricing-inputSheet'><p><?php _e('disable/hidden (optional):', 'skpricing_table'); ?> </p>
				
				<select name="hiddens[]">
                <option value="-1"><?php _e('no', 'skpricing_table'); ?></option>
                <option value="1"><?php _e('yes', 'skpricing_table'); ?></option>
                </select>
			</div>
      		<div class='hrpricing-inputSheet'><p><?php _e('ribbon (optional):', 'skpricing_table'); ?> </p>
				<select name="ribbons[]">
								<option value="-1"><?php _e('choose...', 'skpricing_table'); ?></option>
								<optgroup label="Style 1">
									<option value="style1_best"><?php _e('best', 'skpricing_table'); ?></option>
									<option value="style1_buy"><?php _e('buy', 'skpricing_table'); ?></option>
									<option value="style1_free"><?php _e('free', 'skpricing_table'); ?></option>
									<option value="style1_free_caps"><?php _e('free (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_fresh"><?php _e('fresh', 'skpricing_table'); ?></option>
									<option value="style1_gift_caps"><?php _e('gift (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_heart"><?php _e('heart', 'skpricing_table'); ?></option>
									<option value="style1_hot"><?php _e('hot', 'skpricing_table'); ?></option>
									<option value="style1_hot_caps"><?php _e('hot (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_new"><?php _e('new', 'skpricing_table'); ?></option>
									<option value="style1_new_caps"><?php _e('new (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_no1"><?php _e('no. 1', 'skpricing_table'); ?></option>
									<option value="style1_off5"><?php _e('5% off', 'skpricing_table'); ?></option>
									<option value="style1_off10"><?php _e('10% off', 'skpricing_table'); ?></option>
									<option value="style1_off15"><?php _e('15% off', 'skpricing_table'); ?></option>
									<option value="style1_off20"><?php _e('20% off', 'skpricing_table'); ?></option>
									<option value="style1_off25"><?php _e('25% off', 'skpricing_table'); ?></option>
									<option value="style1_off30"><?php _e('30% off', 'skpricing_table'); ?></option>
									<option value="style1_off35"><?php _e('35% off', 'skpricing_table'); ?></option>
									<option value="style1_off40"><?php _e('40% off', 'skpricing_table'); ?></option>
									<option value="style1_off50"><?php _e('50% off', 'skpricing_table'); ?></option>
									<option value="style1_off75"><?php _e('75% off', 'skpricing_table'); ?></option>
									<option value="style1_pack"><?php _e('pack', 'skpricing_table'); ?></option>
									<option value="style1_pro"><?php _e('pro', 'skpricing_table'); ?></option>
									<option value="style1_sale"><?php _e('sale', 'skpricing_table'); ?></option>
									<option value="style1_save"><?php _e('save', 'skpricing_table'); ?></option>
									<option value="style1_save_caps"><?php _e('save (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_top"><?php _e('top', 'skpricing_table'); ?></option>
									<option value="style1_top_caps"><?php _e('top (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_trial"><?php _e('trial', 'skpricing_table'); ?></option>
								</optgroup>
								<optgroup label="Style 2">
									<option value="style2_best"><?php _e('best', 'skpricing_table'); ?></option>
									<option value="style2_buy"><?php _e('buy', 'skpricing_table'); ?></option>
									<option value="style2_free"><?php _e('free', 'skpricing_table'); ?></option>
									<option value="style2_free_caps"><?php _e('free (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_fresh"><?php _e('fresh', 'skpricing_table'); ?></option>
									<option value="style2_gift_caps"><?php _e('gift (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_heart"><?php _e('heart', 'skpricing_table'); ?></option>
									<option value="style2_hot"><?php _e('hot', 'skpricing_table'); ?></option>
									<option value="style2_hot_caps"><?php _e('hot (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_new"><?php _e('new', 'skpricing_table'); ?></option>
									<option value="style2_new_caps"><?php _e('new (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_no1"><?php _e('no. 1', 'skpricing_table'); ?></option>
									<option value="style2_off5"><?php _e('5% off', 'skpricing_table'); ?></option>
									<option value="style2_off10"><?php _e('10% off', 'skpricing_table'); ?></option>
									<option value="style2_off15"><?php _e('15% off', 'skpricing_table'); ?></option>
									<option value="style2_off20"><?php _e('20% off', 'skpricing_table'); ?></option>
									<option value="style2_off25"><?php _e('25% off', 'skpricing_table'); ?></option>
									<option value="style2_off30"><?php _e('30% off', 'skpricing_table'); ?></option>
									<option value="style2_off35"><?php _e('35% off', 'skpricing_table'); ?></option>
									<option value="style2_off40"><?php _e('40% off', 'skpricing_table'); ?></option>
									<option value="style2_off50"><?php _e('50% off', 'skpricing_table'); ?></option>
									<option value="style2_off75"><?php _e('75% off', 'skpricing_table'); ?></option>
									<option value="style2_pack"><?php _e('pack', 'skpricing_table'); ?></option>
									<option value="style2_pro"><?php _e('pro', 'skpricing_table'); ?></option>
									<option value="style2_sale"><?php _e('sale', 'skpricing_table'); ?></option>
									<option value="style2_save"><?php _e('save', 'skpricing_table'); ?></option>
									<option value="style2_save_caps"><?php _e('save (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_top"><?php _e('top', 'skpricing_table'); ?></option>
									<option value="style2_top_caps"><?php _e('top (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_trial"><?php _e('trial', 'skpricing_table'); ?></option>
								</optgroup>
								<optgroup label="Style 3">
									<option value="style3_best"><?php _e('Best Seller', 'skpricing_table'); ?></option>
									<option value="style2_buy"><?php _e('buy', 'skpricing_table'); ?></option>
									<option value="style2_free"><?php _e('free', 'skpricing_table'); ?></option>
									<option value="style2_free_caps"><?php _e('free (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_fresh"><?php _e('fresh', 'skpricing_table'); ?></option>
									<option value="style2_gift_caps"><?php _e('gift (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_heart"><?php _e('heart', 'skpricing_table'); ?></option>
									<option value="style2_hot"><?php _e('hot', 'skpricing_table'); ?></option>
									<option value="style2_hot_caps"><?php _e('hot (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_new"><?php _e('new', 'skpricing_table'); ?></option>
									<option value="style2_new_caps"><?php _e('new (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_no1"><?php _e('no. 1', 'skpricing_table'); ?></option>
									<option value="style2_off5"><?php _e('5% off', 'skpricing_table'); ?></option>
									<option value="style2_off10"><?php _e('10% off', 'skpricing_table'); ?></option>
									<option value="style2_off15"><?php _e('15% off', 'skpricing_table'); ?></option>
									<option value="style2_off20"><?php _e('20% off', 'skpricing_table'); ?></option>
									<option value="style2_off25"><?php _e('25% off', 'skpricing_table'); ?></option>
									<option value="style2_off30"><?php _e('30% off', 'skpricing_table'); ?></option>
									<option value="style2_off35"><?php _e('35% off', 'skpricing_table'); ?></option>
									<option value="style2_off40"><?php _e('40% off', 'skpricing_table'); ?></option>
									<option value="style2_off50"><?php _e('50% off', 'skpricing_table'); ?></option>
									<option value="style2_off75"><?php _e('75% off', 'skpricing_table'); ?></option>
									<option value="style2_pack"><?php _e('pack', 'skpricing_table'); ?></option>
									<option value="style2_pro"><?php _e('pro', 'skpricing_table'); ?></option>
									<option value="style2_sale"><?php _e('sale', 'skpricing_table'); ?></option>
									<option value="style2_save"><?php _e('save', 'skpricing_table'); ?></option>
									<option value="style2_save_caps"><?php _e('save (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_top"><?php _e('top', 'skpricing_table'); ?></option>
									<option value="style2_top_caps"><?php _e('top (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_trial"><?php _e('trial', 'skpricing_table'); ?></option>
								</optgroup>
							</select>
							</div>
						</div>
				 </th>
						 <th  class="skpricing_table_admin_column2 hrpricing_column">
						
		<div class='hrpricing-inputSheet-wrap'>
		 <h3>Column 2</h3>
						<div class='hrpricing-inputSheet'>
						<p> <?php _e('width (optional):', 'skpricing_table'); ?> </p>
				<input type="text" name="widths[]" value="">
				</div>
			<div class='hrpricing-inputSheet css3_responsive_width'><p><?php _e('responsive width', 'skpricing_table'); ?> 1 <?php _e('(optional)', 'skpricing_table'); ?> </p>
				<input class="css3_responsive_width css3_responsive_width1" type="text" name="responsiveWidths[]" value="" />
      		</div>
			<div class='hrpricing-inputSheet css3_responsive_width'><p><?php _e('responsive width', 'skpricing_table'); ?> 2 <?php _e('(optional)', 'skpricing_table'); ?> </p>
				<input class="css3_responsive_width css3_responsive_width2" type="text" name="responsiveWidths[]" value="" />
      		</div>
			<div class='hrpricing-inputSheet css3_responsive_width'><p><?php _e('responsive width', 'skpricing_table'); ?> 3 <?php _e('(optional)', 'skpricing_table'); ?> </p>
				<input class="css3_responsive_width css3_responsive_width3" type="text" name="responsiveWidths[]" value="" /> 
      		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('Columns Background Image :', 'skpricing_table'); ?> </p>
				<input class="skt3colsImage" name="colsBgImg[]" type="text" data-alpha="true" value="" /> 
      		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('Columns Background Color :', 'skpricing_table'); ?> </p>
				<input id="color_code2" class="color-picker" name="colsBgColor[]" type="text" data-alpha="true" value="" data-default-color="#effeff" />
      		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('Columns Text Color :', 'skpricing_table'); ?> </p>
				<input id="color_code" class="color-picker" name="colsTextColor[]" type="text" data-alpha="true" value="" data-default-color="#effeff"  />
     		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('aligment (optional):', 'skpricing_table'); ?> </p>
				<select name="aligments[]">
                <option value="-1"><?php _e('choose...', 'skpricing_table'); ?></option>
                <option value="left"><?php _e('left', 'skpricing_table'); ?></option>
                <option value="center"><?php _e('center', 'skpricing_table'); ?></option>
                <option value="right"><?php _e('right', 'skpricing_table'); ?></option>
              </select>
			</div>
			<div class='hrpricing-inputSheet'><p><?php _e('active (optional):', 'skpricing_table'); ?> </p>
				
				<select name="actives[]" class="css3_active_column_select">
                <option value="-1"><?php _e('no', 'skpricing_table'); ?></option>
                <option value="1"><?php _e('yes', 'skpricing_table'); ?></option>
                </select>
				
      		</div>
      		<div class='hrpricing-inputSheet'><p><?php _e('disable/hidden (optional):', 'skpricing_table'); ?> </p>
				
				<select name="hiddens[]">
                <option value="-1"><?php _e('no', 'skpricing_table'); ?></option>
                <option value="1"><?php _e('yes', 'skpricing_table'); ?></option>
                </select>
			</div>
      		<div class='hrpricing-inputSheet'><p><?php _e('ribbon (optional):', 'skpricing_table'); ?> </p>
				<select name="ribbons[]">
								<option value="-1"><?php _e('choose...', 'skpricing_table'); ?></option>
								<optgroup label="Style 1">
									<option value="style1_best"><?php _e('best', 'skpricing_table'); ?></option>
									<option value="style1_buy"><?php _e('buy', 'skpricing_table'); ?></option>
									<option value="style1_free"><?php _e('free', 'skpricing_table'); ?></option>
									<option value="style1_free_caps"><?php _e('free (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_fresh"><?php _e('fresh', 'skpricing_table'); ?></option>
									<option value="style1_gift_caps"><?php _e('gift (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_heart"><?php _e('heart', 'skpricing_table'); ?></option>
									<option value="style1_hot"><?php _e('hot', 'skpricing_table'); ?></option>
									<option value="style1_hot_caps"><?php _e('hot (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_new"><?php _e('new', 'skpricing_table'); ?></option>
									<option value="style1_new_caps"><?php _e('new (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_no1"><?php _e('no. 1', 'skpricing_table'); ?></option>
									<option value="style1_off5"><?php _e('5% off', 'skpricing_table'); ?></option>
									<option value="style1_off10"><?php _e('10% off', 'skpricing_table'); ?></option>
									<option value="style1_off15"><?php _e('15% off', 'skpricing_table'); ?></option>
									<option value="style1_off20"><?php _e('20% off', 'skpricing_table'); ?></option>
									<option value="style1_off25"><?php _e('25% off', 'skpricing_table'); ?></option>
									<option value="style1_off30"><?php _e('30% off', 'skpricing_table'); ?></option>
									<option value="style1_off35"><?php _e('35% off', 'skpricing_table'); ?></option>
									<option value="style1_off40"><?php _e('40% off', 'skpricing_table'); ?></option>
									<option value="style1_off50"><?php _e('50% off', 'skpricing_table'); ?></option>
									<option value="style1_off75"><?php _e('75% off', 'skpricing_table'); ?></option>
									<option value="style1_pack"><?php _e('pack', 'skpricing_table'); ?></option>
									<option value="style1_pro"><?php _e('pro', 'skpricing_table'); ?></option>
									<option value="style1_sale"><?php _e('sale', 'skpricing_table'); ?></option>
									<option value="style1_save"><?php _e('save', 'skpricing_table'); ?></option>
									<option value="style1_save_caps"><?php _e('save (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_top"><?php _e('top', 'skpricing_table'); ?></option>
									<option value="style1_top_caps"><?php _e('top (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_trial"><?php _e('trial', 'skpricing_table'); ?></option>
								</optgroup>
								<optgroup label="Style 2">
									<option value="style2_best"><?php _e('best', 'skpricing_table'); ?></option>
									<option value="style2_buy"><?php _e('buy', 'skpricing_table'); ?></option>
									<option value="style2_free"><?php _e('free', 'skpricing_table'); ?></option>
									<option value="style2_free_caps"><?php _e('free (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_fresh"><?php _e('fresh', 'skpricing_table'); ?></option>
									<option value="style2_gift_caps"><?php _e('gift (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_heart"><?php _e('heart', 'skpricing_table'); ?></option>
									<option value="style2_hot"><?php _e('hot', 'skpricing_table'); ?></option>
									<option value="style2_hot_caps"><?php _e('hot (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_new"><?php _e('new', 'skpricing_table'); ?></option>
									<option value="style2_new_caps"><?php _e('new (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_no1"><?php _e('no. 1', 'skpricing_table'); ?></option>
									<option value="style2_off5"><?php _e('5% off', 'skpricing_table'); ?></option>
									<option value="style2_off10"><?php _e('10% off', 'skpricing_table'); ?></option>
									<option value="style2_off15"><?php _e('15% off', 'skpricing_table'); ?></option>
									<option value="style2_off20"><?php _e('20% off', 'skpricing_table'); ?></option>
									<option value="style2_off25"><?php _e('25% off', 'skpricing_table'); ?></option>
									<option value="style2_off30"><?php _e('30% off', 'skpricing_table'); ?></option>
									<option value="style2_off35"><?php _e('35% off', 'skpricing_table'); ?></option>
									<option value="style2_off40"><?php _e('40% off', 'skpricing_table'); ?></option>
									<option value="style2_off50"><?php _e('50% off', 'skpricing_table'); ?></option>
									<option value="style2_off75"><?php _e('75% off', 'skpricing_table'); ?></option>
									<option value="style2_pack"><?php _e('pack', 'skpricing_table'); ?></option>
									<option value="style2_pro"><?php _e('pro', 'skpricing_table'); ?></option>
									<option value="style2_sale"><?php _e('sale', 'skpricing_table'); ?></option>
									<option value="style2_save"><?php _e('save', 'skpricing_table'); ?></option>
									<option value="style2_save_caps"><?php _e('save (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_top"><?php _e('top', 'skpricing_table'); ?></option>
									<option value="style2_top_caps"><?php _e('top (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_trial"><?php _e('trial', 'skpricing_table'); ?></option>
								</optgroup>
								<optgroup label="Style 3">
									<option value="style3_best"><?php _e('Best Seller', 'skpricing_table'); ?></option>
									<option value="style2_buy"><?php _e('buy', 'skpricing_table'); ?></option>
									<option value="style2_free"><?php _e('free', 'skpricing_table'); ?></option>
									<option value="style2_free_caps"><?php _e('free (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_fresh"><?php _e('fresh', 'skpricing_table'); ?></option>
									<option value="style2_gift_caps"><?php _e('gift (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_heart"><?php _e('heart', 'skpricing_table'); ?></option>
									<option value="style2_hot"><?php _e('hot', 'skpricing_table'); ?></option>
									<option value="style2_hot_caps"><?php _e('hot (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_new"><?php _e('new', 'skpricing_table'); ?></option>
									<option value="style2_new_caps"><?php _e('new (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_no1"><?php _e('no. 1', 'skpricing_table'); ?></option>
									<option value="style2_off5"><?php _e('5% off', 'skpricing_table'); ?></option>
									<option value="style2_off10"><?php _e('10% off', 'skpricing_table'); ?></option>
									<option value="style2_off15"><?php _e('15% off', 'skpricing_table'); ?></option>
									<option value="style2_off20"><?php _e('20% off', 'skpricing_table'); ?></option>
									<option value="style2_off25"><?php _e('25% off', 'skpricing_table'); ?></option>
									<option value="style2_off30"><?php _e('30% off', 'skpricing_table'); ?></option>
									<option value="style2_off35"><?php _e('35% off', 'skpricing_table'); ?></option>
									<option value="style2_off40"><?php _e('40% off', 'skpricing_table'); ?></option>
									<option value="style2_off50"><?php _e('50% off', 'skpricing_table'); ?></option>
									<option value="style2_off75"><?php _e('75% off', 'skpricing_table'); ?></option>
									<option value="style2_pack"><?php _e('pack', 'skpricing_table'); ?></option>
									<option value="style2_pro"><?php _e('pro', 'skpricing_table'); ?></option>
									<option value="style2_sale"><?php _e('sale', 'skpricing_table'); ?></option>
									<option value="style2_save"><?php _e('save', 'skpricing_table'); ?></option>
									<option value="style2_save_caps"><?php _e('save (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_top"><?php _e('top', 'skpricing_table'); ?></option>
									<option value="style2_top_caps"><?php _e('top (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_trial"><?php _e('trial', 'skpricing_table'); ?></option>
								</optgroup>
							</select>
							</div>
						</div>

						 </th>
						 <th class="skpricing_table_admin_column3 hrpricing_column">
						 
		<div class='hrpricing-inputSheet-wrap'>
		 <h3>Column 3</h3>
						<div class='hrpricing-inputSheet'>
						<p> <?php _e('width (optional):', 'skpricing_table'); ?> </p>
				<input type="text" name="widths[]" value="">
				</div>
			<div class='hrpricing-inputSheet css3_responsive_width'><p><?php _e('responsive width', 'skpricing_table'); ?> 1 <?php _e('(optional)', 'skpricing_table'); ?> </p>
				<input class="css3_responsive_width css3_responsive_width1" type="text" name="responsiveWidths[]" value="" />
      		</div>
			<div class='hrpricing-inputSheet css3_responsive_width'><p><?php _e('responsive width', 'skpricing_table'); ?> 2 <?php _e('(optional)', 'skpricing_table'); ?> </p>
				<input class="css3_responsive_width css3_responsive_width2" type="text" name="responsiveWidths[]" value="" />
      		</div>
			<div class='hrpricing-inputSheet css3_responsive_width'><p><?php _e('responsive width', 'skpricing_table'); ?> 3 <?php _e('(optional)', 'skpricing_table'); ?> </p>
				<input class="css3_responsive_width css3_responsive_width3" type="text" name="responsiveWidths[]" value="" /> 
      		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('Columns Background Image :', 'skpricing_table'); ?> </p>
				<input class="skt3colsImage" name="colsBgImg[]" type="text" data-alpha="true" value="" /> 
      		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('Columns Background Color :', 'skpricing_table'); ?> </p>
				<input id="color_code3" class="color-picker" name="colsBgColor[]" type="text" data-alpha="true" value="" data-default-color="#effeff" />
      		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('Columns Text Color :', 'skpricing_table'); ?> </p>
				<input id="color_code" class="color-picker" name="colsTextColor[]" type="text" data-alpha="true" value="" data-default-color="#effeff"  />
     		</div>
			<div class='hrpricing-inputSheet'><p><?php _e('aligment (optional):', 'skpricing_table'); ?> </p>
				<select name="aligments[]">
                <option value="-1"><?php _e('choose...', 'skpricing_table'); ?></option>
                <option value="left"><?php _e('left', 'skpricing_table'); ?></option>
                <option value="center"><?php _e('center', 'skpricing_table'); ?></option>
                <option value="right"><?php _e('right', 'skpricing_table'); ?></option>
              </select>
			</div>
			<div class='hrpricing-inputSheet'><p><?php _e('active (optional):', 'skpricing_table'); ?> </p>
				
				<select name="actives[]" class="css3_active_column_select">
                <option value="-1"><?php _e('no', 'skpricing_table'); ?></option>
                <option value="1"><?php _e('yes', 'skpricing_table'); ?></option>
                </select>
				
      		</div>
      		<div class='hrpricing-inputSheet'><p><?php _e('disable/hidden (optional):', 'skpricing_table'); ?> </p>
				
				<select name="hiddens[]">
                <option value="-1"><?php _e('no', 'skpricing_table'); ?></option>
                <option value="1"><?php _e('yes', 'skpricing_table'); ?></option>
                </select>
			</div>
      		<div class='hrpricing-inputSheet'><p><?php _e('ribbon (optional):', 'skpricing_table'); ?> </p>
				<select name="ribbons[]">
								<option value="-1"><?php _e('choose...', 'skpricing_table'); ?></option>
								<optgroup label="Style 1">
									<option value="style1_best"><?php _e('best', 'skpricing_table'); ?></option>
									<option value="style1_buy"><?php _e('buy', 'skpricing_table'); ?></option>
									<option value="style1_free"><?php _e('free', 'skpricing_table'); ?></option>
									<option value="style1_free_caps"><?php _e('free (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_fresh"><?php _e('fresh', 'skpricing_table'); ?></option>
									<option value="style1_gift_caps"><?php _e('gift (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_heart"><?php _e('heart', 'skpricing_table'); ?></option>
									<option value="style1_hot"><?php _e('hot', 'skpricing_table'); ?></option>
									<option value="style1_hot_caps"><?php _e('hot (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_new"><?php _e('new', 'skpricing_table'); ?></option>
									<option value="style1_new_caps"><?php _e('new (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_no1"><?php _e('no. 1', 'skpricing_table'); ?></option>
									<option value="style1_off5"><?php _e('5% off', 'skpricing_table'); ?></option>
									<option value="style1_off10"><?php _e('10% off', 'skpricing_table'); ?></option>
									<option value="style1_off15"><?php _e('15% off', 'skpricing_table'); ?></option>
									<option value="style1_off20"><?php _e('20% off', 'skpricing_table'); ?></option>
									<option value="style1_off25"><?php _e('25% off', 'skpricing_table'); ?></option>
									<option value="style1_off30"><?php _e('30% off', 'skpricing_table'); ?></option>
									<option value="style1_off35"><?php _e('35% off', 'skpricing_table'); ?></option>
									<option value="style1_off40"><?php _e('40% off', 'skpricing_table'); ?></option>
									<option value="style1_off50"><?php _e('50% off', 'skpricing_table'); ?></option>
									<option value="style1_off75"><?php _e('75% off', 'skpricing_table'); ?></option>
									<option value="style1_pack"><?php _e('pack', 'skpricing_table'); ?></option>
									<option value="style1_pro"><?php _e('pro', 'skpricing_table'); ?></option>
									<option value="style1_sale"><?php _e('sale', 'skpricing_table'); ?></option>
									<option value="style1_save"><?php _e('save', 'skpricing_table'); ?></option>
									<option value="style1_save_caps"><?php _e('save (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_top"><?php _e('top', 'skpricing_table'); ?></option>
									<option value="style1_top_caps"><?php _e('top (uppercase)', 'skpricing_table'); ?></option>
									<option value="style1_trial"><?php _e('trial', 'skpricing_table'); ?></option>
								</optgroup>
								<optgroup label="Style 2">
									<option value="style2_best"><?php _e('best', 'skpricing_table'); ?></option>
									<option value="style2_buy"><?php _e('buy', 'skpricing_table'); ?></option>
									<option value="style2_free"><?php _e('free', 'skpricing_table'); ?></option>
									<option value="style2_free_caps"><?php _e('free (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_fresh"><?php _e('fresh', 'skpricing_table'); ?></option>
									<option value="style2_gift_caps"><?php _e('gift (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_heart"><?php _e('heart', 'skpricing_table'); ?></option>
									<option value="style2_hot"><?php _e('hot', 'skpricing_table'); ?></option>
									<option value="style2_hot_caps"><?php _e('hot (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_new"><?php _e('new', 'skpricing_table'); ?></option>
									<option value="style2_new_caps"><?php _e('new (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_no1"><?php _e('no. 1', 'skpricing_table'); ?></option>
									<option value="style2_off5"><?php _e('5% off', 'skpricing_table'); ?></option>
									<option value="style2_off10"><?php _e('10% off', 'skpricing_table'); ?></option>
									<option value="style2_off15"><?php _e('15% off', 'skpricing_table'); ?></option>
									<option value="style2_off20"><?php _e('20% off', 'skpricing_table'); ?></option>
									<option value="style2_off25"><?php _e('25% off', 'skpricing_table'); ?></option>
									<option value="style2_off30"><?php _e('30% off', 'skpricing_table'); ?></option>
									<option value="style2_off35"><?php _e('35% off', 'skpricing_table'); ?></option>
									<option value="style2_off40"><?php _e('40% off', 'skpricing_table'); ?></option>
									<option value="style2_off50"><?php _e('50% off', 'skpricing_table'); ?></option>
									<option value="style2_off75"><?php _e('75% off', 'skpricing_table'); ?></option>
									<option value="style2_pack"><?php _e('pack', 'skpricing_table'); ?></option>
									<option value="style2_pro"><?php _e('pro', 'skpricing_table'); ?></option>
									<option value="style2_sale"><?php _e('sale', 'skpricing_table'); ?></option>
									<option value="style2_save"><?php _e('save', 'skpricing_table'); ?></option>
									<option value="style2_save_caps"><?php _e('save (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_top"><?php _e('top', 'skpricing_table'); ?></option>
									<option value="style2_top_caps"><?php _e('top (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_trial"><?php _e('trial', 'skpricing_table'); ?></option>
								</optgroup>
								<optgroup label="Style 3">
									<option value="style3_best"><?php _e('Best Seller', 'skpricing_table'); ?></option>
									<option value="style2_buy"><?php _e('buy', 'skpricing_table'); ?></option>
									<option value="style2_free"><?php _e('free', 'skpricing_table'); ?></option>
									<option value="style2_free_caps"><?php _e('free (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_fresh"><?php _e('fresh', 'skpricing_table'); ?></option>
									<option value="style2_gift_caps"><?php _e('gift (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_heart"><?php _e('heart', 'skpricing_table'); ?></option>
									<option value="style2_hot"><?php _e('hot', 'skpricing_table'); ?></option>
									<option value="style2_hot_caps"><?php _e('hot (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_new"><?php _e('new', 'skpricing_table'); ?></option>
									<option value="style2_new_caps"><?php _e('new (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_no1"><?php _e('no. 1', 'skpricing_table'); ?></option>
									<option value="style2_off5"><?php _e('5% off', 'skpricing_table'); ?></option>
									<option value="style2_off10"><?php _e('10% off', 'skpricing_table'); ?></option>
									<option value="style2_off15"><?php _e('15% off', 'skpricing_table'); ?></option>
									<option value="style2_off20"><?php _e('20% off', 'skpricing_table'); ?></option>
									<option value="style2_off25"><?php _e('25% off', 'skpricing_table'); ?></option>
									<option value="style2_off30"><?php _e('30% off', 'skpricing_table'); ?></option>
									<option value="style2_off35"><?php _e('35% off', 'skpricing_table'); ?></option>
									<option value="style2_off40"><?php _e('40% off', 'skpricing_table'); ?></option>
									<option value="style2_off50"><?php _e('50% off', 'skpricing_table'); ?></option>
									<option value="style2_off75"><?php _e('75% off', 'skpricing_table'); ?></option>
									<option value="style2_pack"><?php _e('pack', 'skpricing_table'); ?></option>
									<option value="style2_pro"><?php _e('pro', 'skpricing_table'); ?></option>
									<option value="style2_sale"><?php _e('sale', 'skpricing_table'); ?></option>
									<option value="style2_save"><?php _e('save', 'skpricing_table'); ?></option>
									<option value="style2_save_caps"><?php _e('save (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_top"><?php _e('top', 'skpricing_table'); ?></option>
									<option value="style2_top_caps"><?php _e('top (uppercase)', 'skpricing_table'); ?></option>
									<option value="style2_trial"><?php _e('trial', 'skpricing_table'); ?></option>
								</optgroup>
							</select>
							</div>
						</div>
			</th>
			</tr>
			</thead>
			<tbody class="hrpricing-tbody-rowClass">
			<tr class="skpricing_table_admin_row1">
			<td  class="skpricing_table_admin_column1 hrpricing_column">
						<div class="hrpricing-row-internalContainer">
							<h3>Row <span>Column 1</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]"></textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> 
								<p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
							</td>
							<td  class="skpricing_table_admin_column2 hrpricing_column">
						<div class="hrpricing-row-internalContainer">
							<h3>Row <span>Column 2</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">starter</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>

							</td>
						<td  class="skpricing_table_admin_column3 hrpricing_column">			
							
						<div class="hrpricing-row-internalContainer">
							<h3>Row <span>Column 3</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">econo</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
								</td>
			</tr>
			
			<tr class="skpricing_table_admin_row2">
			<td  class="skpricing_table_admin_column1 hrpricing_column">
							<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 1</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]"><h2 class="caption">choose <span>your</span> plan</h2></textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
							</td>
							<td  class="skpricing_table_admin_column2 hrpricing_column">
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 2</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]"><h1 class="col1">$<span>10</span></h1><h3 class="col1">per month</h3></textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>

							</td>
						<td  class="skpricing_table_admin_column3 hrpricing_column">			
							
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 3</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]"><h1 class="col1">$<span>30</span></h1><h3 class="col1">per month</h3></textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
			</tr>
			
						<tr class="skpricing_table_admin_row3">
			<td  class="skpricing_table_admin_column1 hrpricing_column">
							<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 1</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">Amount of space</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
							</td>
							<td  class="skpricing_table_admin_column2 hrpricing_column">
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 2</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">10GB</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>

							</td>
						<td  class="skpricing_table_admin_column3 hrpricing_column">			
							
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 3</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">30GB</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
								</td>
			</tr>
			
						<tr class="skpricing_table_admin_row4">
			<td  class="skpricing_table_admin_column1 hrpricing_column">
							<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 1</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">Bandwidth per month</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
							</td>
							<td  class="skpricing_table_admin_column2 hrpricing_column">
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 2</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">100GB</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>

							</td>
						<td  class="skpricing_table_admin_column3 hrpricing_column">			
							
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 3</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">200GB</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
								</td>
			</tr>
			
						<tr class="skpricing_table_admin_row5">
			<td  class="skpricing_table_admin_column1 hrpricing_column">
							<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 1</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">No. of e-mail accounts</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
							</td>
							<td  class="skpricing_table_admin_column2 hrpricing_column">
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 2</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">1</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>

							</td>
						<td  class="skpricing_table_admin_column3 hrpricing_column">			
							
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 3</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">10</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
								</td>
			</tr>
			
				<tr class="skpricing_table_admin_row6">
			<td  class="skpricing_table_admin_column1 hrpricing_column">
							<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 1</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">No. of MySql databases</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
							</td>
							<td  class="skpricing_table_admin_column2 hrpricing_column">
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 2</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">1</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>

							</td>
						<td  class="skpricing_table_admin_column3 hrpricing_column">			
							
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 3</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">10</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
								</td>
			</tr>
			
						<tr class="skpricing_table_admin_row7">
			<td  class="skpricing_table_admin_column1 hrpricing_column">
							<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 1</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">24h support</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
							</td>
							<td  class="skpricing_table_admin_column2 hrpricing_column">
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 2</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">Yes</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>

							</td>
						<td  class="skpricing_table_admin_column3 hrpricing_column">			
							
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 3</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">Yes</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
								</td>
			</tr>
			
						<tr class="skpricing_table_admin_row8">
			<td  class="skpricing_table_admin_column1 hrpricing_column">
							<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 1</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">Support tickets per mo.</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
							</td>
							<td  class="skpricing_table_admin_column2 hrpricing_column">
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 2</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">1</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>

							</td>
						<td  class="skpricing_table_admin_column3 hrpricing_column">			
							
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 3</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]">3</textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
								</td>
			</tr>
			
						<tr class="skpricing_table_admin_row9">
			<td  class="skpricing_table_admin_column1 hrpricing_column">
							<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 1</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]"></textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
							</td>
							<td  class="skpricing_table_admin_column2 hrpricing_column">
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 2</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]"><a href="#" class="sign_up radius3">sign up!</a></textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>

							</td>
						<td  class="skpricing_table_admin_column3 hrpricing_column">			
							
						<div class="hrpricing-row-internalContainer">
							<h3>Row  <span>Column 3</span></h3>
							<div class="hrpricing-dialog-table"> 
							  <label>HTML/Text</label>
										  <?php //wp_editor( "Test", "row11", $args); ?> 
										  <textarea name="texts[]"><a href="#" class="sign_up radius3">sign up!</a></textarea>
										  <label>Tooltips</label><input class='skpricing_table_tooltip_input' placeholder="Tooltip" type='text' name='tooltips[]' value='' /> <label>Shortcodes</label>
										  <?php echo $shortcodesSelect; ?>
									</div> 
								<div class="hrpricing-palet-wrap"> 
								<div class="hrpricing-row-palet"> 
								<div class="hrpricing-palet-box">
								<div class="hrpricing-palet-col25">
								<p>Height</p>
								<div class="hrpricing-palet-input"> 
								<input class="skpricing_table_short hrpricing-ml15" type="text" name="heights[]" value="" placeholder="Height" /> 
								</div>
								</div> 
								<div class="hrpricing-palet-col75">
								<p>Padding</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short hrpricing-mr5" type="text" name="paddingsTop[]" value="" placeholder="Top"/>
								<input class="skpricing_table_short" type="text" name="paddingsBottom[]" value="" placeholder="Bottom" />
								</div>
								</div>
								</div>
								<div class="hrpricing-palet-box css3_responsive_width"> <p>Responsive</p>
								<div class="hrpricing-palet-input">
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height1 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Desktop"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height2 hrpricing-mr5" type="text" name="responsiveHeights[]" value=""  placeholder="Tablet"/>
								<input class="skpricing_table_short css3_responsive_height css3_responsive_height3" type="text" name="responsiveHeights[]" value=""  placeholder="Mobile"/>
								</div>
								</div>
								</div>	 
								</div>
								</div>
								</td>
			</tr>
			</tbody>
			</table>

			</div>	
			</div>
			</div>
							<div class="hrpricing-flexbtn"> 
				<button type="button" id="preview" value="<?php _e('Preview', 'skpricing_table'); ?>" class="preview1" name="Preview">Preview</button>
				<input type="hidden" name="action" value="save_pricing_table" />
				<button  type="submit" id="save_skpricing_table_2" value="<?php _e('Save Options', 'pricing_table'); ?>" class="skpricing-save-button" name="Submit">Save</button>   
				<span id="ajax_loader_save_2" style="display: none;"><img style="margin-bottom: -3px;" src="<?php echo plugins_url('../img/ajax-loader.gif',__FILE__); ?>"  /></span>
				</div>	
				
				
			<div class="hrpricing_headline-box"> 
			<h2 class="hrpricing_headline hrpricing_flex-70">Export / Import / Restore Pricing Tables</h2>
			<h2 class="hrpricing_headline hrpricing_flex-25  hr_pricing-text-none inputColVal"></h2> 
			
			</div>

			<div class="hrpricing_table-container">
			<div class="hrpricing-media-fullwidth">
			<div class="hrpricing-media-card"> 
				
							<?php if(count($skPricingTableAllShortcodeIds)): ?>
							
									<h3><?php _e('Export', 'skpricing_table'); ?></h3>
									<div  class="hrpricing-table-mediaRow">
									<label for="exportIds"><?php _e('Choose tables for export', 'skpricing_table'); ?></label>
									</div>
									<div  class="hrpricing-table-mediaRow">
									<select name="exportIds[]" id="exportIds" multiple="multiple" style="height: 250px;">
										<?php
											for($i=0; $i<count($skPricingTableAllShortcodeIds); $i++)
												echo "<option value='$skPricingTableAllShortcodeIds[$i]' selected='selected'>" . substr($skPricingTableAllShortcodeIds[$i], 35) . "</option>";
										?>
									</select>
										</div>
										
							<?php endif; ?>										
					</div>
					<div class="hrpricing-media-card"> 
					
									<h3><?php _e('Import', 'skpricing_table'); ?></h3>
							
							<div  class="hrpricing-table-mediaRow">	
									<input type="file" id="import_from_file_input" name="import_from_file_input">
								</div>
							</tr>
							
					</div>
					<div class="hrpricing-media-card"> 
								<h3><?php _e('Restore Default Tables', 'skpricing_table'); ?></h3>
								
								
					</div>
					
					</div>
					<div class="hrpricing-media-fullwidth">
					<div class="hrpricing-media-card">
					<input type="submit" id="export_pricing_table" value="<?php _e('Export Table', 'pricing_table'); ?>" class="hrpricing-home-form-btn" name="Submit">					
					</div>
					<div class="hrpricing-media-card"> 
					<input type="submit" id="import_from_file" value="<?php _e('Import Tables', 'skpricing_table'); ?>" class="hrpricing-home-form-btn" name="Submit">
					</div>
					<div class="hrpricing-media-card"> 
					<input type="submit" id="restore_default_tables" value="<?php _e('Restore Tables', 'skpricing_table'); ?>" class="hrpricing-home-form-btn" name="Submit">
					
					</div>
			</div>
			</div>			
							</form>
							<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="skpricing_table_settings_hidden">
			<input type='hidden' id='skpricing_table_data_hidden' name='skpricing_table_data'/>
			<input type="hidden" id='skpricing_table_action_hidden' name="action" value="save_skpricing_table"/>
		</form>

           		<div class="hrpricing_headline-box"> 
			<h2 class="hrpricing_headline hrpricing_flex-70">Global Settings</h2>
			<h2 class="hrpricing_headline hrpricing_flex-25  hr_pricing-text-none inputColVal"></h2> 
			
			</div>
		<div class="hrpricing_table-container">
		   
		
		
		<?php
		$message = "";
		if(isset($_POST["action"]) && $_POST["action"]=="save_css3_global_settings")
		{
			$skpricing_table_global_options = array(
				'loadFiles' => $_POST['loadFiles']
			);
			update_option('skpricing_table_global_settings', $skpricing_table_global_options);
			$message .= "Settings saved!";
		}
		?>
		<br />
		<div class="clear"></div>

		<div class="wrap">
			<div class="icon32" id="icon-options-general"><br></div>
			<h2><?php _e('HostRider Pricing Table Global Settings', 'skpricing_table'); ?></h2>
		</div>
		<?php
		if($message!="")
		{
		?>
		<div class="<?php echo ($message!="" ? "updated" : "error"); ?> settings-error"> 
			<p style="line-height: 150%;font-weight: bold;">
				<?php echo ($message!="" ? $message : $error); ?>
			</p>
		</div>
		<?php
		}
		$skpricing_table_global_options = (array)get_option('skpricing_table_global_settings');
		?>
		<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" id="skpricing_table_global_settings">
			<table class="form-table">
				<tbody>
					<tr valign="top">
						<th scope="row">
							<label for="loadFiles"><?php _e('Load plugin files', 'skpricing_table'); ?></label>
						</th>
						<td>
							<select name="loadFiles" id="loadFiles">
								<option value="always"<?php echo (isset($skpricing_table_global_options['loadFiles']) && $skpricing_table_global_options['loadFiles']=='always' ? ' selected="selected"' : ''); ?>><?php _e('on every page', 'skpricing_table'); ?></option>
								<option value="when_used"<?php echo (isset($skpricing_table_global_options['loadFiles']) && $skpricing_table_global_options['loadFiles']=='when_used' ? ' selected="selected"' : ''); ?>><?php _e('only when used', 'skpricing_table'); ?></option>
							</select>
							<span class="description"><?php _e('If you see unstyled table on your page when using \'only when used\' option, please set \'on every page\' as some themes may not be compatibile with \'only when used\' option', 'skpricing_table'); ?></span>
						</td>
					</tr>
				</tbody>
			</table>
			
				<input type="hidden" name="action" value="save_css3_global_settings" />
				<input type="submit" id="save_skpricing_table_global" value="<?php _e('Save Settings', 'skpricing_table'); ?>" class="hrpricing-home-form-btn" name="Submit">
			</p>
		</form>
		   </div>
		     	<div  id="GetHelp" title="Get Help - Free"  style="display:none;">
					<div class="hrpricing_form-wrap"> 
					<h3>Get Free Support</h3>
					 <p>We will revert back to you within 24 working hours. Mail to <b>support@hostrider.us</b></p>
					 <div id="hrpricing-formSubmit-msg"></div>
						<form id="hrpricing-form-sendMail">
						<div class="hrpricing_form-control"> 
						<label>Your Name</label> <input type="text"  id="HRname" name="name" required> 
						</div> 
						<div class="hrpricing_form-control"> 
						<label>Your Email</label> <input type="text" id="HReml" name="email" required> 
						</div> 
						<div class="hrpricing_form-control"> 
						<label>Message</label> <textarea rows="10"  id="HRmsg" name="message" required></textarea> 
						</div> 
						<div class="hrpricing_form-btn"> 
						<div class="hrpricing-loadiing-img" style="display:none;"><img style="margin-bottom: -3px;" src="<?php echo plugins_url('../img/ajax-loader.gif',__FILE__); ?>"  /></div>
						<button id="hrpricing-send-mail">Send</button> <button id="GetHelpD" class="hrpricing-tbclose hrpricing_animatebtn">Close</button></div>
						<div>
						</div>
						</form>	
					
				</div>
				</div>
		 
		<?php
	}
