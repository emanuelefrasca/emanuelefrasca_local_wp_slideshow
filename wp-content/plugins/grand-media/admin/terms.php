<?php
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])){
	die('You are not allowed to call this page directly.');
}

/**
 * gmediaTerms()
 *
 * @return mixed content
 */
function gmediaTerms(){
	global $user_ID, $gmDB, $gmCore, $gmGallery, $gmProcessor;

	$url = add_query_arg(array('page' => $gmProcessor->page), admin_url('admin.php'));
	$endpoint = $gmGallery->options['endpoint'];

	$gm_screen_options = get_user_meta($user_ID, 'gm_screen_options', true);
	if(!is_array($gm_screen_options)){
		$gm_screen_options = array();
	}
	$gm_screen_options = array_merge($gmGallery->options['gm_screen_options'], $gm_screen_options);
	$orderby = !empty($gm_screen_options['orderby_gmedia_terms'])? $gm_screen_options['orderby_gmedia_terms'] : 'name';
	$order = !empty($gm_screen_options['sortorder_gmedia_terms'])? $gm_screen_options['sortorder_gmedia_terms'] : 'ASC';
	$per_page = !empty($gm_screen_options['per_page_gmedia_terms'])? $gm_screen_options['per_page_gmedia_terms'] : 30;

	$author = $gmCore->caps['gmedia_show_others_media']? 0 : $user_ID;

	$filter = ('selected' == $gmCore->_req('filter'))? $gmProcessor->selected_items : null;
	$search_string = $gmCore->_get('s', '');
	if('#' == substr($search_string, 0, 1)){
		$filter = substr($search_string, 1);
		$search_string = '';
	}
	$args = array(
		'orderby' => $gmCore->_get('orderby', $orderby),
		'order' => $gmCore->_get('order', $order),
		'search' => $search_string,
		'number' => $gmCore->_get('number', $per_page),
		'hide_empty' => $gmCore->_get('hide_empty', 0),
		'page' => $gmCore->_get('pager', 1),
		'include' => $filter
	);
	$args['offset'] = ($args['page'] - 1) * $args['number'];

	$taxonomy = $gmCore->_get('term', 'gmedia_album');

	$allow_edit = 0;
	switch($taxonomy){
		case 'gmedia_album':
			$allow_edit = $gmCore->caps['gmedia_album_manage'];
			$args['global'] = $gmCore->_get('author', $gmCore->caps['gmedia_edit_others_media']? '' : array(0, $user_ID));
			if(!$gmCore->caps['gmedia_show_others_media']){
				$args['global'] = wp_parse_id_list($args['global']);
				$args['global'] = array_intersect(array(0, $user_ID), $args['global']);
				if(empty($args['global'])){
					$args['global'] = array(0, $user_ID);
				}
			}
			break;
		case 'gmedia_tag':
			$allow_edit = $gmCore->caps['gmedia_tag_manage'];
			if('global' == $args['orderby']){
				$args['orderby'] = 'id';
			}
			break;
		case 'gmedia_category':
			$args = array();
			break;
	}
	$gmediaTerms = $gmDB->get_terms($taxonomy, $args);

	?>
	<div class="panel panel-default" id="gmedia-panel">
	<div class="panel-heading clearfix">

		<?php if('gmedia_category' != $taxonomy){ ?>
			<form class="form-inline gmedia-search-form" role="search" method="get">
				<div class="form-group">
					<input type="hidden" name="page" value="<?php echo $gmProcessor->page; ?>"/>
					<input type="hidden" name="term" value="<?php echo $taxonomy; ?>"/>
					<input id="gmedia-search" class="form-control input-sm" type="text" name="s"
					       placeholder="<?php _e('Search...', 'gmLang'); ?>"
					       value="<?php echo $gmCore->_get('s', ''); ?>"/>
				</div>
				<button type="submit" class="btn btn-default input-sm"><span class="glyphicon glyphicon-search"></span>
				</button>
			</form>
			<?php echo $gmDB->query_pager(); ?>
		<?php } ?>

		<div class="btn-toolbar pull-left">
			<?php if('gmedia_category' != $taxonomy){ ?>
				<div class="btn-group gm-checkgroup" id="cb_global-btn">
                    <span class="btn btn-default active"><input class="doaction" id="cb_global"
                                                                data-group="cb_term-object" type="checkbox"/></span>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only"><?php _e('Toggle Dropdown', 'gmLang'); ?></span>
					</button>
					<ul class="dropdown-menu" role="menu">
						<li><a data-select="total" href="#"><?php _e('All', 'gmLang'); ?></a></li>
						<li><a data-select="none" href="#"><?php _e('None', 'gmLang'); ?></a></li>
						<li class="divider"></li>
						<li><a data-select="reverse" href="#"
						       title="<?php _e('Reverse only visible items', 'gmLang'); ?>"><?php _e('Reverse', 'gmLang'); ?></a>
						</li>
					</ul>
				</div>
			<?php } ?>

			<div class="btn-group" style="margin-right:20px;">
				<a class="btn btn<?php echo ('gmedia_album' == $taxonomy)? "-primary active" : '-default'; ?>"
				   href="<?php echo add_query_arg(array('term' => 'gmedia_album'), $url); ?>"><?php _e('Albums', 'gmLang'); ?></a>
				<a class="btn btn<?php echo ('gmedia_tag' == $taxonomy)? "-primary active" : '-default'; ?>"
				   href="<?php echo add_query_arg(array('term' => 'gmedia_tag'), $url); ?>"><?php _e('Tags', 'gmLang'); ?></a>
				<a class="btn btn<?php echo ('gmedia_category' == $taxonomy)? "-primary active" : '-default'; ?>"
				   href="<?php echo add_query_arg(array('term' => 'gmedia_category'), $url); ?>"><?php _e('Categories', 'gmLang'); ?></a>
			</div>

			<?php if(('gmedia_category' != $taxonomy)){ ?>
				<div class="btn-group">
					<a class="btn btn-default" href="#"><?php _e('Action', 'gmLang'); ?></a>
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
						<span class="sr-only"><?php _e('Toggle Dropdown', 'gmLang'); ?></span>
					</button>
					<?php
					$rel_selected_show = 'rel-selected-show';
					$rel_selected_hide = 'rel-selected-hide';
					?>
					<ul class="dropdown-menu" role="menu">
						<li class="dropdown-header <?php echo $rel_selected_hide; ?>">
							<span><?php _e("Select items to see more actions", "gmLang"); ?></span></li>
						<li class="<?php echo $rel_selected_show;
						if(!$gmCore->caps['gmedia_terms_delete']){
							echo ' disabled';
						} ?>">
							<a href="<?php echo wp_nonce_url($gmCore->get_admin_url(array('delete' => 'selected'), array('filter')), 'gmedia_delete') ?>"
							   class="gmedia-delete"
							   data-confirm="<?php _e("You are about to permanently delete the selected items.\n\r'Cancel' to stop, 'OK' to delete.", "gmLang"); ?>"><?php _e('Delete Selected Items', 'gmLang'); ?></a>
						</li>
						<?php do_action('gmedia_term_action_list'); ?>
					</ul>
				</div>

				<form class="btn-group" id="gm-selected-btn" name="gm-selected-form"
				      action="<?php echo add_query_arg(array(
					      'term' => $taxonomy,
					      'filter' => 'selected'
				      ), $url); ?>" method="post">
					<button type="submit"
					        class="btn btn<?php echo ('selected' == $gmCore->_req('filter'))? '-success' : '-info' ?>"><?php printf(__('%s selected', 'gmLang'), '<span id="gm-selected-qty">' . count($gmProcessor->selected_items) . '</span>'); ?></button>
					<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span
							class="caret"></span>
						<span class="sr-only"><?php _e('Toggle Dropdown', 'gmLang'); ?></span></button>
					<input type="hidden" id="gm-selected" data-userid="<?php echo $user_ID; ?>"
					       data-key="<?php echo $taxonomy; ?>" name="selected_items"
					       value="<?php echo implode(',', $gmProcessor->selected_items); ?>"/>
					<ul class="dropdown-menu" role="menu">
						<li><a id="gm-selected-show" href="#show"><?php _e('Show only selected items', 'gmLang'); ?></a>
						</li>
						<li><a id="gm-selected-clear" href="#clear"><?php _e('Clear selected items', 'gmLang'); ?></a>
						</li>
					</ul>
				</form>
			<?php } ?>

		</div>
	</div>


	<?php if('gmedia_album' == $taxonomy){ ?>
		<?php if($allow_edit){ ?>
			<form method="post" id="gmedia-edit-term" name="gmAddTerms" class="panel-body" action="<?php echo $url; ?>"
			      style="padding-bottom:0; border-bottom:1px solid #ddd;">
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label><?php _e('Name', 'gmLang'); ?></label>
							<input type="text" class="form-control input-sm" name="term[name]"
							       placeholder="<?php _e('Album Name', 'gmLang'); ?>" required/>
						</div>
						<div class="form-group">
							<label><?php _e('Description', 'gmLang'); ?></label>
                            <textarea class="form-control input-sm" style="height:75px;" rows="2"
                                      name="term[description]"></textarea>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group row">
							<div class="col-xs-6">
								<label><?php _e('Order gmedia', 'gmLang'); ?></label>
								<select name="term[orderby]" class="form-control input-sm">
									<option value="custom"><?php _e('user defined', 'gmLang'); ?></option>
									<option selected="selected" value="ID"><?php _e('by ID', 'gmLang'); ?></option>
									<option value="title ID"><?php _e('by title', 'gmLang'); ?></option>
									<option value="gmuid"><?php _e('by filename', 'gmLang'); ?></option>
									<option value="date ID"><?php _e('by date', 'gmLang'); ?></option>
									<option value="modified ID"><?php _e('by last modified date', 'gmLang'); ?></option>
									<option value="rand"><?php _e('Random', 'gmLang'); ?></option>
								</select>
							</div>
							<div class="col-xs-6">
								<label><?php _e('Sort order', 'gmLang'); ?></label>
								<select name="term[order]" class="form-control input-sm">
									<option selected="selected" value="DESC"><?php _e('DESC', 'gmLang'); ?></option>
									<option value="ASC"><?php _e('ASC', 'gmLang'); ?></option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-xs-6">
								<label><?php _e('Status', 'gmLang'); ?></label>
								<select name="term[status]" class="form-control input-sm">
									<option selected="selected" value="public"><?php _e('Public', 'gmLang'); ?></option>
									<option value="private"><?php _e('Private', 'gmLang'); ?></option>
									<option value="draft"><?php _e('Draft', 'gmLang'); ?></option>
								</select>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label><?php _e('Author', 'gmLang'); ?></label>
									<?php $user_ids = $gmCore->caps['gmedia_delete_others_media']? $gmCore->get_editable_user_ids() : array($user_ID);
									if($user_ids && $gmCore->caps['gmedia_edit_others_media']){
										if(!in_array($user_ID, $user_ids)){
											array_push($user_ids, $user_ID);
										}
										wp_dropdown_users(array(
											'include' => $user_ids,
											'include_selected' => true,
											'name' => 'term[global]',
											'selected' => $user_ID,
											'class' => 'form-control input-sm',
											'multi' => true,
											'show_option_all' => __('Shared', 'gmLang')
										));
									} else{
										echo '<input type="hidden" name="term[global]" value="' . $user_ID . '"/>';
										echo '<div>' . get_the_author_meta('display_name', $user_ID) . '</div>';
									}
									?>
								</div>
								<div class="form-group">
									<?php
									wp_original_referer_field(true, 'previous');
									wp_nonce_field('GmediaTerms', 'term_save_wpnonce');
									?>
									<input type="hidden" name="term[taxonomy]" value="gmedia_album"/>
									<button style="display:block" type="submit" class="btn btn-primary btn-sm"
									        name="gmedia_album_save"><?php _e('Add New Album', 'gmLang'); ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		<?php } else{ ?>
			<div class="alert alert-warning alert-dismissible" role="alert" style="margin-bottom:0">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'gmLang'); ?></span>
				</button>
				<strong><?php _e('Info:', 'gmLang'); ?></strong> <?php _e('You are not allowed to add new terms', 'gmLang'); ?>
			</div>
		<?php } ?>
		<form class="list-group" id="gm-list-table" style="margin-bottom:4px;">
			<?php
			if(count($gmediaTerms)){
				foreach($gmediaTerms as $item){
					$termItems = array();
					$per_page = 7;
					if($item->count){
						$term_meta = $gmDB->get_metadata('gmedia_term', $item->term_id);
						$term_meta = array_map('reset', $term_meta);
						$term_meta = array_merge(array('orderby' => 'ID', 'order' => 'DESC'), $term_meta);
						/*
						$term_meta_default = array('orderby' => 'ID', 'order' => 'DESC');
						$term_meta = array_intersect_key($term_meta, $term_meta_default) + $term_meta_default;
						*/
						$args = array('no_found_rows' => true, 'per_page' => $per_page, 'album__in' => array($item->term_id), 'author' => $author, 'orderby' => $term_meta['orderby'], 'order' => $term_meta['order']);
						$termItems = $gmDB->get_gmedias($args);
					}
					$is_selected = in_array($item->term_id, $gmProcessor->selected_items)? true : false;
					$author_name = '';
					$list_row_class = $row_class = '';
					$allow_terms_delete = $gmCore->caps['gmedia_terms_delete'];
					if($item->global){
						if(($display_author_name = get_the_author_meta('display_name', $item->global))){
							$author_name .= sprintf(__('by %s', 'gmLang'), $display_author_name);
						} else{
							$author_name .= '(' . __('deleted author', 'gmLang') . ')';
						}
						if($item->global == $user_ID){
							$row_class .= ' current_user';
							$allow_edit = $gmCore->caps['gmedia_album_manage'];
							$allow_delete = $allow_terms_delete;
						} else{
							$row_class .= ' other_user';
							$allow_edit = $gmCore->caps['gmedia_edit_others_media'];
							$allow_delete = ($allow_edit && $allow_terms_delete);
						}
					} else{
						$author_name .= '(' . __('no author', 'gmLang') . ')';
						$row_class .= ' shared';
						$allow_edit = $gmCore->caps['gmedia_edit_others_media'];
						$allow_delete = ($allow_edit && $allow_terms_delete);
					}
					if('public' != $item->status){
						$author_name .= ' [' . $item->status . ']';
						if('private' == $item->status){
							$list_row_class = ' list-group-item-info';
						} elseif('draft' == $item->status){
							$list_row_class = ' list-group-item-warning';
						}
					}
					?>
					<div class="list-group-item term-list-item<?php echo $is_selected? ' active-row' : '';
					echo $list_row_class; ?>">
						<div class="row cb_term-object<?php echo $row_class; ?>">
							<div class="term_id">#<?php echo $item->term_id; ?></div>
							<div class="col-xs-6 term-label">
								<div class="checkbox">
									<input name="doaction[]"
									       type="checkbox"<?php echo $is_selected? ' checked="checked"' : ''; ?>
									       value="<?php echo $item->term_id; ?>"/>
									<?php if($allow_edit){ ?>
										<a class="term_name" href="<?php echo add_query_arg(array('edit_album' => $item->term_id), $url); ?>"><?php echo esc_html($item->name); ?></a>
									<?php } else{ ?>
										<span class="term_name"><?php echo esc_html($item->name); ?></span>
									<?php } ?>
									<span class="term_info_author"><?php echo $author_name; ?></span>

									<div class="object-actions">
										<?php
										$filter_icon = '<span class="badge">' . $item->count . '</span>';
										if($item->count){
											echo '<a title="' . __('Filter in Gmedia Library', 'gmLang') . '" href="' . $gmCore->get_admin_url(array('page' => 'GrandMedia', 'alb' => $item->term_id), array(), true) . '">' . $filter_icon . '</a>';
										} else{
											echo $filter_icon;
										}

										$gmedia_hashid = gmedia_hash_id_encode($item->term_id, 'album');
										if(get_option('permalink_structure')){
											$cloud_link = home_url(urlencode($endpoint) . '/a/' . $gmedia_hashid);
										} else{
											$cloud_link = add_query_arg(array("$endpoint" => $gmedia_hashid, 't' => 'a'), home_url('index.php'));
										}
										$share_icon = '<span class="glyphicon glyphicon-share"></span>';
										if('draft' !== $item->status){
											echo '<a target="_blank" data-target="#shareModal" data-share="' . $item->term_id . '" class="share-modal" title="' . __('Share', 'gmLang') . '" href="' . $cloud_link . '">' . $share_icon . '</a>';
										} else{
											echo "<span class='action-inactive'>$share_icon</span>";
										}

										$edit_icon = '<span class="glyphicon glyphicon-edit"></span>';
										if($allow_edit){
											echo '<a title="' . __('Edit', 'gmLang') . '" href="' . add_query_arg(array('edit_album' => $item->term_id), $url) . '">' . $edit_icon . '</a>';
										} else{
											echo "<span class='action-inactive'>$edit_icon</span>";
										}

										if($allow_terms_delete){
											$trash_icon = '<span class="glyphicon glyphicon-trash"></span>';
											if($allow_delete){
												echo '<a class="trash-icon" title="' . __('Delete', 'gmLang') . '" href="' . wp_nonce_url(add_query_arg(array(
														'term' => $taxonomy,
														'delete' => $item->term_id
													), $url), 'gmedia_delete') . '" data-confirm="' . __("You are about to permanently delete the selected items.\n\r'Cancel' to stop, 'OK' to delete.", "gmLang") . '">' . $trash_icon . '</a>';
											} else{
												echo "<span class='action-inactive'>$trash_icon</span>";
											}
										}
										?>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="term-images">
									<?php if(!empty($termItems)){
										foreach($termItems as $i){
											?>
											<img style="z-index:<?php echo $per_page --; ?>;"
											     src="<?php echo $gmCore->gm_get_media_image($i, 'thumb', false); ?>"
											     alt="<?php echo $i->ID; ?>"
											     title="<?php echo esc_attr($i->title); ?>"/>
										<?php
										}
									}
									if(count($termItems) < $item->count){
										echo '...';
									}
									?>
								</div>
							</div>
						</div>
						<?php if(!empty($item->description)){ ?>
							<div class="term-description"><?php echo nl2br(esc_html($item->description)); ?></div>
						<?php } ?>
					</div>
				<?php
				}
			} else{
				?>
				<div class="list-group-item">
					<div class="well well-lg text-center">
						<h4><?php _e('No items to show.', 'gmLang'); ?></h4>
					</div>
				</div>
			<?php } ?>
			<?php
			wp_original_referer_field(true, 'previous');
			wp_nonce_field('GmediaTerms');
			?>
		</form>


	<?php } elseif('gmedia_tag' == $taxonomy){ ?>
		<?php if($allow_edit){ ?>
			<form method="post" id="gmedia-edit-term" name="gmAddTerms" class="panel-body" action="<?php echo add_query_arg(array('term' => $taxonomy), $url); ?>"
			      style="padding-bottom:0; border-bottom:1px solid #ddd;">
				<div class="row">
					<div class="form-group col-xs-9">
						<label><?php _e('Tags', 'gmLang'); ?>
							<small class="text-muted">(<?php _e('you can type multiple tags separated by comma') ?>)
							</small>
						</label>
						<input type="text" class="form-control input-sm" name="term[name]"
						       placeholder="<?php _e('Tag Names', 'gmLang'); ?>" required/>
					</div>
					<div class="col-xs-3" style="padding-top:24px;">
						<?php
						wp_original_referer_field(true, 'previous');
						wp_nonce_field('GmediaTerms', 'term_save_wpnonce');
						?>
						<input type="hidden" name="term[taxonomy]" value="gmedia_tag"/>
						<button type="submit" class="btn btn-primary btn-sm"
						        name="gmedia_tag_add"><?php _e('Add New Tags', 'gmLang'); ?></button>
					</div>
				</div>
			</form>
		<?php } else{ ?>
			<div class="alert alert-warning alert-dismissible" role="alert" style="margin-bottom:0">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">&times;</span><span class="sr-only"><?php _e('Close', 'gmLang'); ?></span>
				</button>
				<strong><?php _e('Info:', 'gmLang'); ?></strong> <?php _e('You are not allowed to add new terms', 'gmLang'); ?>
			</div>
		<?php } ?>
		<form class="list-group" id="gm-list-table" style="margin-bottom:4px;">
			<?php
			if(count($gmediaTerms)){
				if($gmCore->caps['gmedia_edit_others_media']){
					$allow_edit = true;
					$allow_delete = $gmCore->caps['gmedia_terms_delete'];
				} else{
					$allow_edit = false;
					$allow_delete = false;
				}
			foreach($gmediaTerms as $item){
				$termItems = array();
				$per_page = 5;
				if($item->count){
					$args = array('no_found_rows' => true, 'per_page' => $per_page, 'orderby' => $gmGallery->options['in_tag_orderby'], 'order' => $gmGallery->options['in_tag_order'], 'tag_id' => $item->term_id, 'author' => $author);
					$termItems = $gmDB->get_gmedias($args);
				}
				$is_selected = in_array($item->term_id, $gmProcessor->selected_items)? true : false;
				?>
				<div class="list-group-item term-list-item<?php echo $is_selected? ' active-row' : ''; ?>">
					<div class="row cb_term-object" id="tag_<?php echo $item->term_id; ?>">
						<div class="term_id">#<?php echo $item->term_id; ?></div>
						<div class="col-xs-6 term-label">
							<div class="checkbox">
								<input name="doaction[]"
								       type="checkbox"<?php echo $is_selected? ' checked="checked"' : ''; ?>
								       value="<?php echo $item->term_id; ?>"/>
								<?php if($allow_edit){ ?>
									<a class="edit_tag_link"
									   href="#tag_<?php echo $item->term_id; ?>"><?php echo esc_html($item->name); ?></a>
									<span class="edit_tag_form" style="display:none;"><input class="edit_tag_input"
									                                                         type="text"
									                                                         data-tag_id="<?php echo $item->term_id; ?>"
									                                                         name="gmedia_tag_name[<?php echo $item->term_id; ?>]"
									                                                         value="<?php echo esc_attr($item->name); ?>"
									                                                         placeholder="<?php echo esc_attr($item->name); ?>"/><a
											href="#tag_<?php echo $item->term_id; ?>"
											class="edit_tag_save btn btn-link glyphicon glyphicon-pencil"></a></span>

								<?php } else{ ?>
									<span><?php echo esc_html($item->name); ?></span>
								<?php } ?>

								<div class="object-actions">
									<?php
									$filter_icon = '<span class="badge">' . $item->count . '</span>';
									if($item->count){
										echo '<a title="' . __('Filter in Gmedia Library', 'gmLang') . '" href="' . $gmCore->get_admin_url(array('page' => 'GrandMedia', 'tag__in' => $item->term_id), array(), true) . '">' . $filter_icon . '</a>';
									} else{
										echo $filter_icon;
									}

									$gmedia_hashid = gmedia_hash_id_encode($item->term_id, 'tag');
									if(get_option('permalink_structure')){
										$cloud_link = home_url(urlencode($endpoint) . '/t/' . $gmedia_hashid);
									} else{
										$cloud_link = add_query_arg(array("$endpoint" => $gmedia_hashid, 't' => 't'), home_url('index.php'));
									}
									$share_icon = '<span class="glyphicon glyphicon-share"></span>';
									echo '<a target="_blank" data-target="#shareModal" data-share="' . $item->term_id . '" class="share-modal" title="' . __('Share', 'gmLang') . '" href="' . $cloud_link . '">' . $share_icon . '</a>';

									/*
									$edit_icon = '<span class="glyphicon glyphicon-edit"></span>';
									if ( $allow_edit ){
										echo '<a class="edit_tag_link" title="' . __('Edit', 'gmLang') . '" href="#tag_' . $item->term_id . '">'.$edit_icon.'</a>';
									}
									*/

									if($allow_delete){
										$trash_icon = '<span class="glyphicon glyphicon-trash"></span>';
										echo '<a title="' . __('Delete', 'gmLang') . '" href="' . wp_nonce_url(add_query_arg(array(
												'term' => $taxonomy,
												'delete' => $item->term_id
											), $url), 'gmedia_delete') . '">' . $trash_icon . '</a>';
									}
									?>
								</div>
							</div>
						</div>
						<div class="col-xs-6 term-images">
							<?php if(!empty($termItems)){
								foreach($termItems as $i){
									?>
									<img style="z-index:<?php echo $per_page --; ?>;"
									     src="<?php echo $gmCore->gm_get_media_image($i, 'thumb', false); ?>"
									     alt="<?php echo $i->ID; ?>" title="<?php echo esc_attr($i->title); ?>"/>
								<?php
								}
							}
							if(count($termItems) < $item->count){
								echo '...';
							}
							?>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if ($allow_edit){ ?>
				<script type="text/javascript">
					jQuery(function($){
						$('#gm-list-table').data('edit', false);
						$('input.edit_tag_input').keypress(function(e){
							var tagdiv = $('#tag_' + $(this).data('tag_id'));
							var charCode = e.charCode || e.keyCode || e.which;
							if(charCode == 13){
								e.preventDefault();
								edit_tag(tagdiv);
							}
						}).blur(function(e){
							var tagdiv = $('#tag_' + $(this).data('tag_id'));
							edit_tag(tagdiv);
						});

						$('.edit_tag_link').click(function(e){
							e.preventDefault();
							var id = $(this).attr('href');
							$(this).hide();
							$(id).find('.edit_tag_form').show().find('input').focus();
							$('#gm-list-table').data('edit', true);
						});
						$('.edit_tag_save').click(function(e){
							e.preventDefault();
						});

						function edit_tag(tagdiv){
							var inp = tagdiv.find('.edit_tag_form input');
							var new_tag_name = $.trim(inp.val());
							var old_tag_name = inp.attr('placeholder');
							if((old_tag_name == new_tag_name) || ('' === new_tag_name) || $.isNumeric()){
								inp.val(old_tag_name);
								tagdiv.find('.edit_tag_form').hide();
								tagdiv.find('.edit_tag_link').show();
								return;
							}
							var post_data = {
								action: 'gmedia_tag_edit',
								tag_id: inp.data('tag_id'),
								tag_name: new_tag_name,
								_wpnonce: $('#_wpnonce').val()
							};
							$.post(ajaxurl, post_data, function(data, textStatus, jqXHR){
								console.log(data);
								if(data.error){
									//inp.val(inp.attr('placeholder'));
									$('#gmedia-panel').before(data.error);
								} else{
									//new_tag_name = new_tag_name.replace(/&/g, '&amp;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
									inp.attr('placeholder', new_tag_name);
									tagdiv.find('.edit_tag_link').text(new_tag_name).show();
									$('#gmedia-panel').before(data.msg);
									tagdiv.find('.edit_tag_form').hide();
								}
							});
						}
					});
				</script>
			<?php } ?>
			<?php
			} else {
			?>
				<div class="list-group-item">
					<div class="well well-lg text-center">
						<h4><?php _e('No items to show.', 'gmLang'); ?></h4>
					</div>
				</div>
			<?php } ?>
			<?php
			wp_original_referer_field(true, 'previous');
			wp_nonce_field('GmediaTerms');
			?>
		</form>


	<?php } elseif('gmedia_category' == $taxonomy){ ?>
		<div class="panel-body"></div>
		<div class="list-group" id="gm-list-table" style="margin-bottom:4px;">
			<?php
			$gmediaCategories = $gmGallery->options['taxonomies']['gmedia_category'];
			foreach($gmediaTerms as $item){
				$cat[$item->name] = $item;
			}
			unset($gmediaTerms);

			foreach($gmediaCategories as $name => $title){
				$termItems = array();
				$per_page = 10;
				if(isset($cat[$name])){
					$count = $cat[$name]->count;
					$term_id = $cat[$name]->term_id;
					if($count){
						$args = array('no_found_rows' => true, 'per_page' => $per_page, 'orderby' => $gmGallery->options['in_category_orderby'], 'order' => $gmGallery->options['in_category_order'], 'category__in' => array($term_id), 'author' => $author);
						$termItems = $gmDB->get_gmedias($args);
					}
				} else{
					$count = 0;
					$term_id = '##';
				}
				?>
				<div class="list-group-item term-list-item">
					<div class="row cb_term-object">
						<div class="term_id">#<?php echo $term_id; ?></div>
						<div class="col-xs-6" style="padding-top:10px; padding-bottom:10px;">
							<?php echo esc_html($title); ?>
							<div class="object-actions">
								<?php
								$filter_icon = '<span class="badge">' . $count . '</span>';
								if($count){
									echo '<a title="' . __('Filter in Gmedia Library', 'gmLang') . '" href="' . $gmCore->get_admin_url(array('page' => 'GrandMedia', 'cat' => $term_id), array(), true) . '">' . $filter_icon . '</a>';
								} else{
									echo $filter_icon;
								}

								$share_icon = '<span class="glyphicon glyphicon-share"></span>';
								if(isset($cat[$name]->term_id)){
									$gmedia_hashid = gmedia_hash_id_encode($term_id, 'tag');
									if(get_option('permalink_structure')){
										$cloud_link = home_url(urlencode($endpoint) . '/k/' . $gmedia_hashid);
									} else{
										$cloud_link = add_query_arg(array("$endpoint" => $gmedia_hashid, 't' => 'k'), home_url('index.php'));
									}
									echo '<a target="_blank" data-target="#shareModal" data-share="' . $term_id . '" class="share-modal" title="' . __('Share', 'gmLang') . '" href="' . $cloud_link . '">' . $share_icon . '</a>';
								} else{
									echo "<span class='action-inactive'>$share_icon</span>";
								}

								/*
								$edit_icon = '<span class="glyphicon glyphicon-edit"></span>';
								echo '<a title="' . __('Edit', 'gmLang') . '" href="' . add_query_arg( array( 'edit_album' => $item->term_id ), $url ) . '">'.$edit_icon.'</a>';
								*/
								?>
							</div>
						</div>
						<div class="col-xs-6 term-images">
							<?php if(!empty($termItems)){
								foreach($termItems as $i){
									?>
									<img style="z-index:<?php echo $per_page --; ?>;"
									     src="<?php echo $gmCore->gm_get_media_image($i, 'thumb', false); ?>"
									     alt="<?php echo $i->ID; ?>" title="<?php echo esc_attr($i->title); ?>"/>
								<?php
								}
							}
							if(count($termItems) < $count){
								echo '...';
							}
							?>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	<?php } ?>

	</div>

	<div class="modal fade gmedia-modal" id="shareModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title"><?php _e('GmediaCloud Page'); ?></h4>
				</div>
				<form class="modal-body" method="post" id="shareForm">
					<div class="form-group">
						<label><?php _e('Link to page', 'gmLang'); ?></label>
						<input name="sharelink" type="text" class="form-control sharelink" readonly="readonly" value=""/>
					</div>
					<div class="form-group">
						<label><?php _e('Send this link to', 'gmLang'); ?></label>
						<input name="email" type="email" class="form-control sharetoemail" value="" placeholder="<?php _e('Email', 'gmLang'); ?>"/>
						<textarea name="message" cols="20" rows="3" class="form-control" placeholder="<?php _e('Message (optional)', 'gmLang'); ?>"></textarea>
					</div>
					<input type="hidden" name="action" value="gmedia_share_page"/>
					<?php wp_nonce_field('share_modal', '_sharenonce'); ?>
				</form>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary sharebutton" disabled="disabled"><?php _e('Send', 'gmLang'); ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php _e('Close', 'gmLang'); ?></button>
				</div>
			</div>
		</div>
	</div>

<?php
}


/**
 * gmediaAlbumEdit()
 *
 * @return mixed content
 */
function gmediaAlbumEdit(){
	global $gmDB, $gmCore, $gmProcessor, $gmGallery, $user_ID;

	if(!$gmCore->caps['gmedia_album_manage']){
		die('-1');
	}

	$url = add_query_arg(array('page' => $gmProcessor->page), admin_url('admin.php'));

	$gm_screen_options = get_user_meta($user_ID, 'gm_screen_options', true);
	if(!is_array($gm_screen_options)){
		$gm_screen_options = array();
	}
	$gm_screen_options = array_merge($gmGallery->options['gm_screen_options'], $gm_screen_options);

	$taxonomy = 'gmedia_album';
	$term_id = $gmCore->_get('edit_album');

	$term = $gmDB->get_term($term_id, $taxonomy);

	if(!empty($term) && !is_wp_error($term)){

		$term_meta = $gmDB->get_metadata('gmedia_term', $term->term_id);
		$term_meta = array_map('reset', $term_meta);
		$term_meta = array_merge(array('orderby' => 'ID', 'order' => 'DESC'), $term_meta);
		$per_page = !empty($gm_screen_options['per_page_sort_gmedia'])? $gm_screen_options['per_page_sort_gmedia'] : 60;
		$cur_page = $gmCore->_get('pager', 1);
		$pager_html = '';

		$termItems = array();
		if($term->count){
			$args = array(
				'album__in' => $term->term_id,
				'orderby' => $term_meta['orderby'],
				'order' => $term_meta['order'],
				'per_page' => $per_page,
				'page' => $cur_page
			);
			$termItems = $gmDB->get_gmedias($args);

			$pager_html = $gmDB->query_pager();
		}

		?>
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<div class="btn-toolbar pull-left">
					<div class="btn-group" style="margin-right:20px;">
						<a class="btn btn-primary active" href="<?php echo add_query_arg(array('term' => 'gmedia_album'), $url); ?>"><?php _e('Albums', 'gmLang'); ?></a>
						<a class="btn btn-default" href="<?php echo add_query_arg(array('term' => 'gmedia_tag'), $url); ?>"><?php _e('Tags', 'gmLang'); ?></a>
						<a class="btn btn-default" href="<?php echo add_query_arg(array('term' => 'gmedia_category'), $url); ?>"><?php _e('Categories', 'gmLang'); ?></a>
					</div>

					<div class="btn-group">
						<a class="btn btn-default" href="#"><?php _e('Action', 'gmLang'); ?></a>
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
							<span class="sr-only"><?php _e('Toggle Dropdown', 'gmLang'); ?></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo add_query_arg(array(
									'page' => 'GrandMedia',
									'alb' => $term->term_id
								), admin_url('admin.php')); ?>"><?php _e('Show Album in Gmedia Library', 'gmLang'); ?></a>
							</li>
						</ul>
					</div>
				</div>

			</div>

			<form method="post" id="gmedia-edit-term" name="gmEditTerm" class="panel-body">
				<h4 style="margin-top:0;">
					<span class="pull-right"><?php echo __('ID', 'gmLang') . ": {$term->term_id}"; ?></span>
					<?php _e('Edit Album'); ?>: <em><?php echo esc_html($term->name); ?></em>
				</h4>

				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label><?php _e('Name', 'gmLang'); ?></label>
							<input type="text" class="form-control input-sm" name="term[name]"
							       value="<?php echo esc_attr($term->name); ?>"
							       placeholder="<?php _e('Album Name', 'gmLang'); ?>" required/>
						</div>
						<div class="form-group">
							<label><?php _e('Description', 'gmLang'); ?></label>
                            <textarea class="form-control input-sm" style="height:53px;" rows="2"
                                      name="term[description]"><?php echo $term->description; ?></textarea>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="row">
							<div class="col-xs-6">
								<div class="form-group">
									<label><?php _e('Status', 'gmLang'); ?></label>
									<select name="term[status]" class="form-control input-sm">
										<option
											value="public"<?php selected($term->status, 'public'); ?>><?php _e('Public', 'gmLang'); ?></option>
										<option
											value="private"<?php selected($term->status, 'private'); ?>><?php _e('Private', 'gmLang'); ?></option>
										<option
											value="draft"<?php selected($term->status, 'draft'); ?>><?php _e('Draft', 'gmLang'); ?></option>
									</select>
								</div>
								<div class="form-group">
									<div class="checkbox"><label><input type="checkbox" name="term[status_global]" value="1"> <?php _e('Apply Status for all items in album', 'gmLang'); ?></label></div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="form-group">
									<label><?php _e('Author', 'gmLang'); ?></label>
									<?php $user_ids = $gmCore->caps['gmedia_delete_others_media']? $gmCore->get_editable_user_ids() : array($user_ID);
									if($user_ids && $gmCore->caps['gmedia_edit_others_media']){
										if(!in_array($user_ID, $user_ids)){
											array_push($user_ids, $user_ID);
										}
										$selected_user = get_the_author_meta('display_name', $term->global)? $term->global : 0;
										wp_dropdown_users(array(
											'include' => $user_ids,
											'include_selected' => true,
											'name' => 'term[global]',
											'selected' => $selected_user,
											'class' => 'form-control input-sm',
											'multi' => true,
											'show_option_all' => __('Shared', 'gmLang')
										));
									} else{
										echo '<input type="hidden" name="term[global]" value="' . $user_ID . '"/>';
										echo '<div>' . get_the_author_meta('display_name', $user_ID) . '</div>';
									}
									?>
								</div>
								<div class="form-group">
									<?php wp_nonce_field('GmediaTerms', 'term_save_wpnonce'); ?>
									<input type="hidden" name="term[term_id]" value="<?php echo $term->term_id; ?>"/>
									<input type="hidden" name="term[taxonomy]" value="gmedia_album"/>
									<button style="display:block" type="submit" class="btn btn-primary btn-sm"
									        name="gmedia_album_save"><?php _e('Update', 'gmLang'); ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h4 style="margin:7px 0;" class="pull-left"><?php _e('Sort Album'); ?></h4>

				<?php echo $pager_html; ?>

			</div>
			<form method="post" id="gmedia-sort-term" name="gmSortTerm" class="panel-body">
				<div class="order-form" style="border-bottom:1px solid #ddd; margin-bottom:15px;">
					<div class="row">
						<div class="col-xs-3">
							<div class="form-group">
								<label><?php _e('Order gmedia', 'gmLang'); ?></label>
								<select name="term[orderby]" id="gmedia_term_orderby" class="form-control input-sm">
									<option value="custom"<?php selected($term_meta['orderby'], 'custom'); ?>><?php _e('Custom Order', 'gmLang'); ?></option>
									<option value="ID"<?php selected($term_meta['orderby'], 'ID'); ?>><?php _e('by ID', 'gmLang'); ?></option>
									<option value="title ID"<?php selected($term_meta['orderby'], 'title ID'); ?>><?php _e('by title', 'gmLang'); ?></option>
									<option value="gmuid"<?php selected($term_meta['orderby'], 'gmuid'); ?>><?php _e('by filename', 'gmLang'); ?></option>
									<option value="date ID"<?php selected($term_meta['orderby'], 'date ID'); ?>><?php _e('by date', 'gmLang'); ?></option>
									<option value="modified ID"<?php selected($term_meta['orderby'], 'modified ID'); ?>><?php _e('by last modified date', 'gmLang'); ?></option>
									<option value="rand"<?php selected($term_meta['orderby'], 'rand'); ?>><?php _e('Random', 'gmLang'); ?></option>
								</select>
							</div>
						</div>
						<div class="col-xs-3">
							<div class="form-group">
								<label><?php _e('Sort order', 'gmLang'); ?></label>
								<select name="term[order]" class="form-control input-sm">
									<option value="DESC"<?php selected($term_meta['order'], 'DESC'); ?>><?php _e('DESC', 'gmLang'); ?></option>
									<option value="ASC"<?php selected($term_meta['order'], 'ASC'); ?>><?php _e('ASC', 'gmLang'); ?></option>
								</select>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group pull-left" style="margin-right:30px;">
								<label style="visibility:hidden;">-</label>
								<div class="checkbox"><label><input id="reset_order_option" type="checkbox" name="term[reset_custom_order]" value="1"> <?php _e('Reset custom order', 'gmLang'); ?></label></div>
							</div>
							<div class="form-group pull-left">
								<label style="visibility:hidden;">-</label>
								<button style="display:block" type="submit" class="btn btn-primary btn-sm"
								        name="gmedia_term_sort_save"><?php _e('Update', 'gmLang'); ?></button>
							</div>
							<?php wp_nonce_field('GmediaTerms', 'term_save_wpnonce'); ?>
							<input type="hidden" name="term[term_id]" value="<?php echo $term->term_id; ?>"/>
							<input type="hidden" name="term[taxonomy]" value="gmedia_album"/>
						</div>
					</div>
					<p><?php _e('Use your mouse (drag&drop) for custom sorting of images or manually enter index number in top right field of each image.') ?></p>
				</div>
				<div class="termItems clearfix" id="termItems">
					<?php if(!empty($termItems)){
						foreach($termItems as $item){
							?>
							<div class="gm-img-thumbnail" data-gmid="<?php echo $item->ID; ?>"><?php
								?><img src="<?php echo $gmCore->gm_get_media_image($item, 'thumb', false); ?>" alt="<?php echo $item->ID; ?>" title="<?php echo esc_attr($item->title); ?>"/><?php
								?><input type="text" name="term[gmedia_ids][<?php echo $item->ID; ?>]" value="<?php echo isset($item->gmedia_order)? $item->gmedia_order : '0'; ?>"/><?php
								?><span class="label label-default">ID: <?php echo $item->ID; ?></span><?php
								?>
								<div class="gm-img-thumb-title"><?php echo esc_html($item->title); ?></div>
							</div>
						<?php
						}
					} ?>

				</div>
			</form>
			<div class="panel-footer clearfix" style="margin-top:20px;"><?php echo $pager_html; ?>
				<div class="well well-sm pull-left"
				     style="margin:0;"><?php printf(__('Total items: %d'), $term->count); ?></div>
			</div>

			<script type="text/javascript">
				jQuery(function($){
					var img_order_asc = <?php echo ('ASC' == $term_meta['order'])? 'true' : 'false'; ?>;
					var sortdiv = $('#termItems');
					var items = $('.gm-img-thumbnail', sortdiv);

					sortdiv.sortable({
						items: '.gm-img-thumbnail',
						handle: 'img',
						placeholder: 'gm-img-thumbnail ui-highlight-placeholder',
						forcePlaceholderSize: true,
						//revert: true,
						stop: function(event, ui){
							$('#gmedia_term_orderby').val('custom');
							var cur_order, prev_order, next_order;
							var self = ui.item,
								prev_item = self.prev(),
								next_item = self.next();
							prev_order = prev_item.length? parseInt($('input', prev_item).val()) : 0;
							if(img_order_asc){
								cur_order = prev_order + 1;
								$('input', self).val(cur_order);
								while(next_item.length){
									next_order = parseInt(next_item.find('input').val());
									if(cur_order < next_order){
										break;
									}
									cur_order += 1;
									next_item.find('input').val(cur_order);
									next_item = next_item.next();
								}

							} else{
								next_order = next_item.length? parseInt($('input', next_item).val()) : (prev_order? (prev_order - 1) : 0);
								cur_order = next_order + 1;
								$('input', self).val(cur_order);
								while(prev_item.length){
									prev_order = parseInt(prev_item.find('input').val());
									if(cur_order < prev_order){
										break;
									}
									cur_order += 1;
									prev_item.find('input').val(cur_order);
									prev_item = prev_item.prev();
								}
							}
						}
					});

					$('input', items).on('change', function(){
						$('#gmedia_term_orderby').val('custom');
						sortdiv.css({height: sortdiv.height()});
						var items = $('.gm-img-thumbnail', sortdiv);

						var new_order = $.isNumeric($(this).val())? parseInt($(this).val()) : -1;
						$(this).val(new_order).closest('.gm-img-thumbnail').css({zIndex: 1000});

						var ipos = [];
						items.each(function(i, el){
							var pos = $(el).position();
							$.data(el, 'pos', pos);
							ipos[i] = pos;
						});

						var order = img_order_asc? 'asc' : 'desc';
						items.tsort('input', {
							useVal: true,
							order: order
						}, 'span.label', {order: order}).each(function(i, el){
							var from = $.data(el, 'pos');
							var to = ipos[i];
							$(el).css({position: 'absolute', top: from.top, left: from.left}).animate({
								top: to.top,
								left: to.left
							}, 500);
						}).promise().done(function(){
							items.removeAttr('style');
							sortdiv.removeAttr('style');
						});

						$(this).val(((0 > new_order)? 0 : new_order));
					});
				});
			</script>

		</div>
	<?php
	} else{

	}
}
