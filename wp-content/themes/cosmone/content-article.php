<article class="entry-box">
                        	<div class="row">
							<?php 
							$column = 12;
							if (  has_post_thumbnail() ) {
							$column = 6;
							?>
                            	<div class="col-md-6">
                        			<div class="entry-img"><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a></div>
                                </div>
								<?php }   ?>
                                <div class="col-md-<?php echo $column;?>">
                                	<div class="entry-main">
                                    	<div class="entry-header">
                                        	<div class="entry-meta">
                                            	<span class="entry-category"><i class="icon-folder-open"></i><?php the_category(', '); ?></span>
                                            </div>
                            				<h1 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                                			<div class="entry-meta">
                                    			<span class="entry-date"><i class="icon-time"></i> <a href="<?php echo get_day_link('', '', ''); ?>"><?php echo get_the_date("M d, Y");?></a></span> |
    											<span class="entry-author"><i class="icon-user"></i><?php echo get_the_author_link();?></span> |
    											<span class="entry-comments"><i class="icon-comments"></i><?php  comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', '');?></span>
    										</div>
                            			</div>
                           				<div class="entry-summary"><?php the_excerpt();?></div>
                            			<div class="entry-footer">
                                        	<div class="entry-meta">
    											<span class="entry-more"><a href="<?php the_permalink();?>"><?php _e("&gt;&gt;Read More","cosmone");?></a></span>
    										</div>
                                        </div>
                            		</div>
                                 </div>
                             </div>
                        </article>
					