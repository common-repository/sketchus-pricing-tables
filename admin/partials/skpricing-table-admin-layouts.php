<?php
				if($style==1){
					for ($i = 0; $i < $columns; $i++) {
					      if ($hiddens[$i] != 1) {
				          if ($i == 0){
                    $output .= '<div class="hrpricing-Cols skt3_host_plans column_0 ' . $style . ((int) $responsive ? ' column_' . $i . '_responsive' : '') . '" style="' . ($widths[0] > 0 ? ' width: ' . $widths[0] . (substr($widths[0], -1) != "%" && substr($widths[0], -2) != "px" ? "px" : "") . ';' : '') . '">';
					
						  if ((int) $ribbons[$i] != -1)
				$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/hostrider-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="skt3_hiimg"/>';
				
				 $output .= '<div class="skt3_planbox '. ((int) $actives[0] == 1 && !((int) $slidingcolumns && (int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' ' : '') .(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'">';
					
					       }else if($i > 0){
					  $output .= '<div class="hrpricing-Cols skt3_host_plans column_' . ($i % 4 == 0 ? 4 : $i % 4) . ((int) $responsive ? ' column_' . $i . '_responsive' : '') . '"' . ($widths[$i] > 0 ? ' style="width: ' . $widths[$i] . (substr($widths[$i], -1) != "%" && substr($widths[$i], -2) != "px" ? "px" : "") . ';"' : '') . '>';
					  
					    if ((int) $ribbons[$i] != -1)
				$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/hostrider-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="skt3_hiimg"/>';
				
				 $output .= '<div class="skt3_planbox'. ((int) $actives[$i] == 1 && !((int) $slidingcolumns && (int) $visiblecolumns > 0 && (int) $kind == 3) ? ' ' : '') .(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'">';
						}
                
				 $output .= '<ul class="skt3_price_des">';
				
				       for ($j = 0; $j < $rows; $j++) {
                    if ($j < 2) {
                        if ($j == 0){
                            $output .= '<li ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_title ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : ''). '">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? ''. $tooltips[$j * $columns + $i]  : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ?  : '')) . '</li>';
                        }
                        else if ($j == 1) {
                            $output .= '<li ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($columnsBgColor[$i])) ? ' style="' . (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : ''). (!empty($columnsTextColor[$i]) ? 'color: ' . $columnsTextColor[$i].';' : ''). ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_prices ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') .'">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '' . $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</li>';
                        }
                    } else if ($j + 1 == $rows) {
                        $output .= '<li' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . '">' . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ?  : '')) . '</li>';
                    } else {
                        $output .= '<li' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((int) $aligments[$i] != -1 ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($i > 0 ? ' align_center' : '') . ((int) $rows - $j - 2 < (int) $hiddenrows ? ' skpricing_table_hidden_row skpricing_table_hide' : '') . '">' . ((int) $responsive && (int) $responsivehidecaptioncolumn ?  $texts[$j * $columns]  : '') . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</li>';
						  }
				     }
                $output .= '</ul></div></div>';
                $currentColumn++;
				    }
				}
			 }
			  else if($style==2){
				for ($i = 0; $i < $columns; $i++) {
		       if ($hiddens[$i] != 1) {
                if ($i == 0){
                    $output .= '<div class="hrpricing-Cols skt3_controller column_0' . ((int) $actives[0] == 1 && !((int) $slidingcolumns && (int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_plan-highlight' : '') .  ((int) $responsive ? ' column_' . $i . '_responsive' : '') .(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : ''). '" style="'. ((int) $actives[0] == 1 ? 'border:4px solid ' . $columnsBgColor[$i].' !important; ' : '').($widths[0] > 0 ? 'width: ' . $widths[0] . (substr($widths[0], -1) != "%" && substr($widths[0], -2) != "px" ? "px" : "") . ';"' : '') . '">';
					
				 //if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
				 $output .= ((int) $actives[0] == 1 && !((int) $slidingcolumns && (int) $visiblecolumns > 0 && (int) $kind == 3) ?  '<p class="skt3_plan-recommended">Recommended</p>' : '');
					
                }else if($i > 0){
					  $output .= '<div class="hrpricing-Cols skt3_controller column_' . ($i % 4 == 0 ? 4 : $i % 4) . ((int) $actives[$i] == 1 && !((int) $slidingcolumns && (int) $visiblecolumns > 0 && (int) $kind == 3) ? ' skt3_plan-highlight' : '') . ((int) $responsive ? ' column_' . $i . '_responsive' : '') .(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : ''). '" style="'. ((int) $actives[$i] == 1 ? 'border:4px solid ' . $columnsBgColor[$i].' !important; ' : '').($widths[$i] > 0 ? 'width: ' . $widths[$i] . (substr($widths[$i], -1) != "%" && substr($widths[$i], -2) != "px" ? "px" : "") . ';' : '') . '">';
					  
				//	    if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
				 $output .= ((int) $actives[$i] == 1 && !((int) $slidingcolumns && (int) $visiblecolumns > 0 && (int) $kind == 3) ? '<p class="skt3_plan-recommended">Recommended</p>' : '');
				 }
                
				 $output .= '<div class="skt3_plan-features">';
				
                for ($j = 0; $j < $rows; $j++) {
                    if ($j < 2) {
                        if ($j == 0){
                            $output .= '<h3 ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($columnsBgColor[$i])) ? ' style="' . (!empty($columnsBgColor[$i]) ? 'color: ' . $columnsBgColor[$i].';' : ''). ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-title ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : ''). '">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? ''. $tooltips[$j * $columns + $i]  : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ?  : '')) . '</h3>';
                        }
                        else if ($j == 1) {
                            $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($columnsTextColor[$i])) ?  ' style="' . (!empty($columnsTextColor[$i]) ? 'color: ' . $columnsTextColor[$i].';' : ''). ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-price ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') .'">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '' . $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
                        }
                    } else if ($j + 1 == $rows) {
                        $output .= '<li' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($columnsBgColor[$i])) ?   ' style="' . ($actives[$i] == 1 ? 'background: ' . $columnsBgColor[$i].'; border-bottom: 2px solid '. $columnsBgColor[$i].';' : 'background: ' . $columnsTextColor[$i].'; border-bottom: 2px solid '. $columnsTextColor[$i].';'). ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-last' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . '">' . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ?  : '')) . '</li>';
                    } else {
                        $output .= '<li' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((int) $aligments[$i] != -1 ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($i > 0 ? ' align_center' : '') . ((int) $rows - $j - 2 < (int) $hiddenrows ? ' skpricing_table_hidden_row skpricing_table_hide' : '') . '">' . ((int) $responsive && (int) $responsivehidecaptioncolumn ?  $texts[$j * $columns]  : '') . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</li>';
				      }
				    }
				    $output .= '</div></div>';
				    $currentColumn++;
				    }
				}
	  }else if($style==3){
				for ($i = 0; $i < $columns; $i++) {
		       if ($hiddens[$i] != 1) {
                if ($i == 0){
                    $output .= '<div class="hrpricing-Cols column_0' . ((int) $actives[0] == 1 && !((int) $slidingcolumns && (int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_scale' : '') .  ((int) $responsive ? ' column_' . $i . '_responsive' : '') .(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : ''). '"' . ($widths[0] > 0 ? ' style="width: ' . $widths[0] . (substr($widths[0], -1) != "%" && substr($widths[0], -2) != "px" ? "px" : "") . ';"' : '') . '>';
					
				 //if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
					
                }else if($i > 0){
					  $output .= '<div class="hrpricing-Cols column_' . ($i % 4 == 0 ? 4 : $i % 4) . ((int) $actives[$i] == 1 && !((int) $slidingcolumns && (int) $visiblecolumns > 0 && (int) $kind == 3) ? ' skt3_scale' : '') . ((int) $responsive ? ' column_' . $i . '_responsive' : '') .(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : ''). '"' . ($widths[$i] > 0 ? ' style="width: ' . $widths[$i] . (substr($widths[$i], -1) != "%" && substr($widths[$i], -2) != "px" ? "px" : "") . ';"' : '') . '>';
					  
				//	    if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
				 }
                
				 $output .= '<div class="skt3_features">';
				
                for ($j = 0; $j < $rows; $j++) {
                    if ($j < 2) {
                        if ($j == 0){
                            $output .= '<div ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_deal ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : ''). '">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? ''. $tooltips[$j * $columns + $i]  : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ?  : '')) . '</div>';
                        }
                        else if ($j == 1) {
                            $output .= '<span ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($columnsBgColor[$i])) ? ' style="' . (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : ''). (!empty($columnsTextColor[$i]) ? 'color: ' . $columnsTextColor[$i].';' : ''). ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_price ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') .'">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '' . $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</span>';
                        }
                    } else if ($j + 1 == $rows) {
                        $output .= '<li' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-last' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . '">' . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ?  : '')) . '</li>';
                    } else {
                        $output .= '<li' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((int) $aligments[$i] != -1 ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($i > 0 ? ' align_center' : '') . ((int) $rows - $j - 2 < (int) $hiddenrows ? ' skpricing_table_hidden_row skpricing_table_hide' : '') . '">' . ((int) $responsive && (int) $responsivehidecaptioncolumn ?  $texts[$j * $columns]  : '') . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</li>';
				      }
				    }
				    $output .= '</div></div>';
				    $currentColumn++;
				    }
				}
	  }else if($style==4){	
		   
					 $output .= '<div class="skt3_center-width">'; 
					 $output .= '<div class="skt3_row package-row-sty-4">';
				for ($i = 0; $i < $columns; $i++) {
		       if ($hiddens[$i] != 1) {
                if ($i == 0){
                    $output .= '<div class="hrpricing-Cols column_0'.'"' . ($widths[0] > 0 ? ' style="width: ' . $widths[0] . (substr($widths[0], -1) != "%" && substr($widths[0], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div  style="' . (!empty($columnsBgColor[0]) ? 'background-color: ' . $columnsBgColor[0].';' : ''). (!empty($columnsTextColor[0]) ? 'color: ' . $columnsTextColor[0].';"' : '').' class="skt3_features-sty-4'.((int) $actives[0] == 1 & !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'">';
				
				 //if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
					
                }else if($i > 0){
					  $output .= '<div class="hrpricing-Cols column_' . ($i % 4 == 0 ? 4 : $i % 4) .'"' . ($widths[$i] > 0 ? ' style="width: ' . $widths[$i] . (substr($widths[$i], -1) != "%" && substr($widths[$i], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div  style="' . (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : ''). (!empty($columnsTextColor[$i]) ? 'color: ' . $columnsTextColor[$i].';"' : '').' class="skt3_features-sty-4'.((int) $actives[0] == 1 && !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'">';
					  //	    if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
				 }
                
		//		 $output .= '<div class="skt3_features-sty-4">';
				
                for ($j = 0; $j < $rows; $j++) {
                    if ($j < 2) {
                        if ($j == 0){
                            $output .= '<div ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_deal-sty-4 sp-text-center' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : ''). '">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? ''. $tooltips[$j * $columns + $i]  : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ?  : '')) . '</div>';
                        }
                        else if ($j == 1) {
                            $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_price-sty-4 sp-text-center' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') .'">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '' . $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
                        }
                    } else if ($j + 1 == $rows) {
                        $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-last-sty-4 ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . '">' . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ?  : '')) . '</p>';
                    } else {
                        $output .= '<p' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((int) $aligments[$i] != -1 ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-sty-4 sp-text-center' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($i > 0 ? ' align_center' : '') . ((int) $rows - $j - 2 < (int) $hiddenrows ? ' skpricing_table_hidden_row skpricing_table_hide' : '') . '">' . ((int) $responsive && (int) $responsivehidecaptioncolumn ?  $texts[$j * $columns]  : '') . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
				      }
				    }
				    $output .= '</div></div>';
				    $currentColumn++;
				    }
				}
				$output .= '</div></div></div>  <!--comment-->';
	  }else if($style==5){
		     		 $output .= '<div class="skt3_center-width ">';
					 $output .= '<div class="skt3_row package-row-sty-5 ">';
				for ($i = 0; $i < $columns; $i++) {
		       if ($hiddens[$i] != 1) {
                if ($i == 0){
                    $output .= '<div class="hrpricing-Cols column_0'.'"' . ($widths[0] > 0 ? ' style="'. (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';"' : '').' width: ' . $widths[0] . (substr($widths[0], -1) != "%" && substr($widths[0], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div class="skt3_features-sty-5 '.((int) $actives[0] == 1 & !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'" style="'. (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';"' : ''). '>';
				
				 //if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
					
                }else if($i > 0){
					  $output .= '<div class="hrpricing-Cols column_' . ($i % 4 == 0 ? 4 : $i % 4) .'"' . ($widths[$i] > 0 ? ' style="'. (!empty($columnsBgColor[$i]) ? ' background-color: ' . $columnsBgColor[$i].';"' : '').' width: ' . $widths[$i] . (substr($widths[$i], -1) != "%" && substr($widths[$i], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div class="skt3_features-sty-5  skt3_features-scale-sty-5 '.((int) $actives[0] == 1 && !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'" style="'. (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';"' : ''). '>';
					  //	    if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
				 }
                
				 $output .= '<div class="skt3_plan-features-sty-5">';
				
                for ($j = 0; $j < $rows; $j++) {
                    if ($j < 2) {
                        if ($j == 0){
                            $output .= '<div '. ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' .((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_deal-sty-5 '. ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : ''). '">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? ''. $tooltips[$j * $columns + $i]  : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ?  : '')) . '</div>';
                        }
                        else if ($j == 1) {
                            $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-sty-5 sp-text-center' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') .'">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '' . $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
                        }
                    } else if ($j + 1 == $rows) {
                        $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="'. ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-last-sty-5 ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . '">' . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ?  : '')) . '</p>';
                    } else {
                        $output .= '<p' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((int) $aligments[$i] != -1 ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-sty-5 sp-text-center' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($i > 0 ? ' align_center' : '') . ((int) $rows - $j - 2 < (int) $hiddenrows ? ' skpricing_table_hidden_row skpricing_table_hide' : '') . '">' . ((int) $responsive && (int) $responsivehidecaptioncolumn ?  $texts[$j * $columns]  : '') . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
				      }
				    }
				    $output .= '</div></div></div>';
				    $currentColumn++;
				    }
				}
				$output .= '</div></div></div>  <!--comment-->';
	  }else if($style==6){
					 $output .= '<div class="skt3_center-width">'; 
					 $output .= '<div class="skt3_row package-row-sty-6">';
				for ($i = 0; $i < $columns; $i++) {
		       if ($hiddens[$i] != 1) {
                if ($i == 0){
                    $output .= '<div class="hrpricing-Cols column_0'.'"' . ($widths[0] > 0 ? ' style="width: ' . $widths[0] . (substr($widths[0], -1) != "%" && substr($widths[0], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div class="skt3_features-sty-7 '.((int) $actives[0] == 1 & !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'">';
				
				 //if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
					
                }else if($i > 0){
					  $output .= '<div class="hrpricing-Cols column_' . ($i % 4 == 0 ? 4 : $i % 4) .'"' . ($widths[$i] > 0 ? ' style="width: ' . $widths[$i] . (substr($widths[$i], -1) != "%" && substr($widths[$i], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div class="skt3_features-sty-7 '.((int) $actives[0] == 1 && !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'">';	
					  //	    if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
				 }
                
				 $output .= '<div class="skt3_features-sty-6">';
				
                for ($j = 0; $j < $rows; $j++) {
                    if ($j < 2) {
                        if ($j == 0){
                            $output .= '<div ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) ||(!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' .(!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '') . (!empty($columnsTextColor[$i]) ? ' color: ' . $columnsTextColor[$i].';' : ''). ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_deal-sty-6 ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : ''). '">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? ''. $tooltips[$j * $columns + $i]  : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ?  : '')) . '</div>';
                        }
                        else if ($j == 1) {
                            $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-sty-6' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') .'">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '' . $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
                        }
                    } else if ($j + 1 == $rows) {
                        $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' .(!empty($columnsBgColor[$i]) ? ' background-color: ' . $columnsBgColor[$i].';' . 'border: 2px solid ' . $columnsBgColor[$i].';' : '') . (!empty($columnsTextColor[$i]) ? ' color: ' . $columnsTextColor[$i].';' : '') . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '').'"' : '') . ' class="skt3_plan-feature-last-sty-6 ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . '">' . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ?  : '')) . '</p>';
                    } else {
                        $output .= '<p' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((int) $aligments[$i] != -1 ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-sty-6' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($i > 0 ? ' align_center' : '') . ((int) $rows - $j - 2 < (int) $hiddenrows ? ' skpricing_table_hidden_row skpricing_table_hide' : '') . '">' . ((int) $responsive && (int) $responsivehidecaptioncolumn ?  $texts[$j * $columns]  : '') . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
				      }
				    }
				    $output .= '</div></div></div>';
				    $currentColumn++;
				    }
				}
				$output .= '</div></div></div>  <!--comment-->';
	  }else if($style==7){
					 $output .= '<div class="skt3_center-width">'; 
					 $output .= '<div class="skt3_row package-row-sty-7">';
				for ($i = 0; $i < $columns; $i++) {
		       if ($hiddens[$i] != 1) {
                if ($i == 0){
                    $output .= '<div class="hrpricing-Cols column_0'.'"' . ($widths[0] > 0 ? ' style="width: ' . $widths[0] . (substr($widths[0], -1) != "%" && substr($widths[0], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div class="skt3_features-sty-7 '.((int) $actives[0] == 1 & !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'" style="'. (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';"' : ''). '>';
				
				 //if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
					
                }else if($i > 0){
					  $output .= '<div class="hrpricing-Cols column_' . ($i % 4 == 0 ? 4 : $i % 4) .'"' . ($widths[$i] > 0 ? ' style="width: ' . $widths[$i] . (substr($widths[$i], -1) != "%" && substr($widths[$i], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div class="skt3_features-sty-7 '.((int) $actives[0] == 1 && !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'" style="'. (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';"' : ''). '>';
					  //	    if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
				 }
                
				 $output .= '<div class="skt3_features-sty-7">';
				
                for ($j = 0; $j < $rows; $j++) {
                    if ($j < 2) {
                        if ($j == 0){
                            $output .= '<div ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) ||(!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' .(!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '') . (!empty($columnsTextColor[$i]) ? ' color: ' . $columnsTextColor[$i].';' : ''). ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_deal-sty-7 ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : ''). '">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? ''. $tooltips[$j * $columns + $i]  : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ?  : '')) . '</div>';
                        }
                        else if ($j == 1) {
                            $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-sty-7' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') .'">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '' . $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
                        }
                    } else if ($j + 1 == $rows) {
                        $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '').'"' : '') . ' class="skt3_plan-feature-last-sty-7 ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . '">' . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ?  : '')) . '</p>';
                    } else {
                        $output .= '<p' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' . ((int) $aligments[$i] != -1 ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_plan-feature-para-sty-7' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($i > 0 ? ' align_center' : '') . ((int) $rows - $j - 2 < (int) $hiddenrows ? ' skpricing_table_hidden_row skpricing_table_hide' : '') . '">' . ((int) $responsive && (int) $responsivehidecaptioncolumn ?  $texts[$j * $columns]  : '') . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
				      }
				    }
				    $output .= '</div></div></div>';
				    $currentColumn++;
				    }
				}
				$output .= '</div></div></div>  <!--comment-->';
	  }else if($style==8){
					 $output .= '<div class="skt3_center-width">'; 
					 $output .= '<div class="skt3_row package-row-sty-8">';
				for ($i = 0; $i < $columns; $i++) {
		       if ($hiddens[$i] != 1) {
                if ($i == 0){
                    $output .= '<div class="hrpricing-Cols column_0'.'"' . ($widths[0] > 0 ? ' style="width: ' . $widths[0] . (substr($widths[0], -1) != "%" && substr($widths[0], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div class="skt3_features-sty-8 '.((int) $actives[0] == 1 & !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'">';
				
				 //if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
					
                }else if($i > 0){
					  $output .= '<div class="hrpricing-Cols column_' . ($i % 4 == 0 ? 4 : $i % 4) .'"' . ($widths[$i] > 0 ? ' style="width: ' . $widths[$i] . (substr($widths[$i], -1) != "%" && substr($widths[$i], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div class="skt3_features-sty-8 '.((int) $actives[0] == 1 && !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'">';
					  //	    if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
				 }
                
				 $output .= '<div class="skt3_features-sty-8">';
				
                for ($j = 0; $j < $rows; $j++) {
                    if ($j < 2) {
                        if ($j == 0){
                            $output .= '<div ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) ||(!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' .(!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '') . (!empty($columnsTextColor[$i]) ? ' color: ' . $columnsTextColor[$i].';' : ''). ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_deal-sty-8  swing' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : ''). '">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? ''. $tooltips[$j * $columns + $i]  : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ?  : '')) . '</div>';
                        }
                        else if ($j == 1) {
                            $output .= '<price ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' .(!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '') . (!empty($columnsTextColor[$i]) ? ' color: ' . $columnsTextColor[$i].';' : '') .((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') .'">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '' . $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</price> <sticker style="'.(!empty($columnsBgColor[$i]) ? 'border-left:12px solid transparent; border-right:12px solid transparent; border-top: 18px solid ' . $columnsBgColor[$i].';' : '') .'"></sticker><div class="skt3_pkg-features-sty-8" style="'.(!empty($columnsBgColor[$i]) ? 'background-color:' .$this->hex2rgba($columnsBgColor[$i],0.2).';' : '').'" >';
                        }
                    } else if ($j + 1 == $rows) {
                        $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' .(!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '') . (!empty($columnsTextColor[$i]) ? ' color: ' . $columnsTextColor[$i].';' : '') . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '').'"' : '') . ' class="skt3_plan-feature-last-sty-8 ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . '">' . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ?  : '')) . '</p>';
                    } else {
                        $output .= '<p' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="'. ((int) $aligments[$i] != -1 ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_package-list-sty-8' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($i > 0 ? ' align_center' : '') . ((int) $rows - $j - 2 < (int) $hiddenrows ? ' skpricing_table_hidden_row skpricing_table_hide' : '') . '">' . ((int) $responsive && (int) $responsivehidecaptioncolumn ?  $texts[$j * $columns]  : '') . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
				      }
				    }
				    $output .= '<!--before three div --></div></div></div></div>';
				    $currentColumn++;
				    }
				}
				$output .= '</div></div></div>  <!--comment-->';
	  }else if($style==9){
				  
					 $output .= '<div class="skt3_center-width">'; 
					 $output .= '<div class="skt3_row package-row-sty-9">';
				for ($i = 0; $i < $columns; $i++) {
		       if ($hiddens[$i] != 1) {
                if ($i == 0){
                    $output .= '<div class="hrpricing-Cols column_0'.'"' . ($widths[0] > 0 ? ' style="width: ' . $widths[0] . (substr($widths[0], -1) != "%" && substr($widths[0], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div class="skt3_features-sty-9 '.((int) $actives[0] == 1 & !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'">';
				
				 //if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
					
                }else if($i > 0){
					  $output .= '<div class="hrpricing-Cols column_' . ($i % 4 == 0 ? 4 : $i % 4) .'"' . ($widths[$i] > 0 ? ' style="width: ' . $widths[$i] . (substr($widths[$i], -1) != "%" && substr($widths[$i], -2) != "px" ? "px" : "") . ';"' : '') . '>' . '<div class="skt3_features-sty-9 '.((int) $actives[0] == 1 && !((int) $visiblecolumns > 0 && (int) $kind == 3) ?  ' skt3_active' : '').(!empty($colsanimsel) ?  ' '.$colsanimsel.''  : '').'">';
					  //	    if ((int) $ribbons[$i] != -1)
				//$output .= '<img width="134" src="'.WP_PLUGIN_URL .'/sketchus-pricing-tables/admin/img/ribbon_'.$ribbons[$i].'.png" class="hiimg"/>';
				
				 }
                
				 $output .= '<div class="skt3_features-sty-9">';
				
                for ($j = 0; $j < $rows; $j++) {
                    if ($j < 2) {
                        if ($j == 0){
                            $output .= '<package ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="'. ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : ''). '">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? ''. $tooltips[$j * $columns + $i]  : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ?  : '')) . '</package>';
                        }
                        else if ($j == 1) {
                            $output .= '<div ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' .(!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '') . (!empty($columnsTextColor[$i]) ? ' color: ' . $columnsTextColor[$i].';' : '') .((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_deal-sty-9 ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') .'">' . do_shortcode(($tooltips[$j * $columns + $i] != "" ? '' . $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . ($tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</div> <sticker style="'.(!empty($columnsBgColor[$i]) ? 'border-left:12px solid transparent; border-right:12px solid transparent; border-top: 18px solid ' . $columnsBgColor[$i].';' : '') .'"></sticker>';
                        }
                    } else if ($j + 1 == $rows) {
                        $output .= '<p ' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="' .(!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '') . (!empty($columnsTextColor[$i]) ? ' color: ' . $columnsTextColor[$i].';' : '') . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . (!empty($columnsBgColor[$i]) ? 'background-color: ' . $columnsBgColor[$i].';' : '').'"' : '') . ' class="skt3_plan-feature-last-sty-9 ' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . '">' . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? $tooltips[$j * $columns + $i] : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ?  : '')) . '</p>';
                    } else {
                        $output .= '<p' . ((!empty($aligments[$i]) && (int) $aligments[$i] != -1) || isset($heights[$j]) || (!empty($columnsTextColor[$i]) || !empty($columnsBgColor[$j])) || (!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) || (!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? ' style="'. ((int) $aligments[$i] != -1 ? 'text-align: ' . $aligments[$i] . ';' : '') . (isset($heights[$j]) ? 'height: ' . (int) $heights[$j] . 'px;' . ((int) $heights[$j] == 0 ? 'display: none;' : '') : '') . ((!empty($paddingsTop[$j]) && (int) $paddingsTop[$j] >= 0) ? 'padding-top: ' . $paddingsTop[$j] . 'px !important;' : '') . ((!empty($paddingsBottom[$j]) && (int) $paddingsBottom[$j] >= 0) ? 'padding-bottom: ' . $paddingsBottom[$j] . 'px !important;' : '') . '"' : '') . ' class="skt3_package-list-sty-9' . ((int) $responsive ? ' skpricing_table_row_' . $j . '_responsive' : '') . ($i > 0 ? ' align_center' : '') . ((int) $rows - $j - 2 < (int) $hiddenrows ? ' skpricing_table_hidden_row skpricing_table_hide' : '') . '">' . ((int) $responsive && (int) $responsivehidecaptioncolumn ?  $texts[$j * $columns]  : '') . do_shortcode((isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '<span class="skpricing_table_tooltip"><span>' . $tooltips[$j * $columns + $i] . '</span>' : '') . $texts[$j * $columns + $i] . (isset($tooltips[$j * $columns + $i]) && $tooltips[$j * $columns + $i] != "" ? '</span>' : '')) . '</p>';
				      }
				    }
				    $output .= '</div></div></div>';
				    $currentColumn++;
				    }
				}
				$output .= '</div></div></div>  <!--comment-->';
	  }