<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	 
	public static function activate() {
    $getMDoc="          CREATE 
                          
                        VIEW `getMDoc` AS
                            SELECT 
                                `wp_posts`.`ID` AS `ID`,
                                `wp_posts`.`post_author` AS `post_author`,
                                `wp_posts`.`post_date` AS `post_date`,
                                `wp_posts`.`post_date_gmt` AS `post_date_gmt`,
                                `wp_posts`.`post_content` AS `post_content`,
                                `wp_posts`.`post_title` AS `post_title`,
                                `wp_posts`.`post_excerpt` AS `post_excerpt`,
                                `wp_posts`.`post_status` AS `post_status`,
                                `wp_posts`.`comment_status` AS `comment_status`,
                                `wp_posts`.`ping_status` AS `ping_status`,
                                `wp_posts`.`post_password` AS `post_password`,
                                `wp_posts`.`post_name` AS `post_name`,
                                `wp_posts`.`to_ping` AS `to_ping`,
                                `wp_posts`.`pinged` AS `pinged`,
                                `wp_posts`.`post_modified` AS `post_modified`,
                                `wp_posts`.`post_modified_gmt` AS `post_modified_gmt`,
                                `wp_posts`.`post_content_filtered` AS `post_content_filtered`,
                                `wp_posts`.`post_parent` AS `post_parent`,
                                `wp_posts`.`guid` AS `guid`,
                                `wp_posts`.`menu_order` AS `menu_order`,
                                `wp_posts`.`post_type` AS `post_type`,
                                `wp_posts`.`post_mime_type` AS `post_mime_type`,
                                `wp_posts`.`comment_count` AS `comment_count`,
                                `wp_term_relationships`.`object_id` AS `object_id`,
                                `wp_term_relationships`.`term_taxonomy_id` AS `term_taxonomy_id`,
                                `wp_term_relationships`.`term_order` AS `term_order`
                            FROM
                                (`wp_posts`
                                JOIN `wp_term_relationships`)
                            WHERE
                                ((`wp_posts`.`post_type` = 'manual_documentation')
                                    AND (`wp_posts`.`post_status` = 'publish')
                                    AND (`wp_posts`.`ID` = `wp_term_relationships`.`object_id`))
                            GROUP BY `wp_posts`.`ID`
                            ORDER BY `wp_term_relationships`.`term_taxonomy_id` , `wp_posts`.`menu_order`
                            ";
	$clean_pagination="CREATE   PROCEDURE `clean_pagination`(
                        in idPost int,
                        in Content longtext
                        
                        )
                        BEGIN
                        UPDATE  `wp_posts`
                        SET
                        
                        `post_content` = Content
                        
                        
                        WHERE `ID` = idPost;
                        
                        END
                        	 ";
    $get_docs="
                        CREATE  PROCEDURE `get_docs`()
                        BEGIN
                        select * from
                        (SELECT 
                                *
                            FROM
                                (`wp_posts`
                                JOIN `wp_term_relationships`)
                            WHERE
                                ((`wp_posts`.`post_type` = 'manual_documentation')
                                    AND (`wp_posts`.`post_status` = 'publish')
                                  
                                    AND (`wp_posts`.`ID` = `wp_term_relationships`.`object_id`))
                            ORDER BY `wp_term_relationships`.`term_taxonomy_id` , `wp_posts`.`menu_order`) T0
                            group by ID;
                        END";
    $get_post_docs="
                        CREATE VIEW  `get_post_doc` AS
                            SELECT 
                                 `wp_posts`.`ID` AS `ID`,
                                 `wp_posts`.`post_author` AS `post_author`,
                                 `wp_posts`.`post_date` AS `post_date`,
                                 `wp_posts`.`post_date_gmt` AS `post_date_gmt`,
                                 `wp_posts`.`post_content` AS `post_content`,
                                 `wp_posts`.`post_title` AS `post_title`,
                                 `wp_posts`.`post_excerpt` AS `post_excerpt`,
                                 `wp_posts`.`post_status` AS `post_status`,
                                 `wp_posts`.`comment_status` AS `comment_status`,
                                 `wp_posts`.`ping_status` AS `ping_status`,
                                 `wp_posts`.`post_password` AS `post_password`,
                                 `wp_posts`.`post_name` AS `post_name`,
                                 `wp_posts`.`to_ping` AS `to_ping`,
                                 `wp_posts`.`pinged` AS `pinged`,
                                 `wp_posts`.`post_modified` AS `post_modified`,
                                 `wp_posts`.`post_modified_gmt` AS `post_modified_gmt`,
                                 `wp_posts`.`post_content_filtered` AS `post_content_filtered`,
                                 `wp_posts`.`post_parent` AS `post_parent`,
                                 `wp_posts`.`guid` AS `guid`,
                                 `wp_posts`.`menu_order` AS `menu_order`,
                                 `wp_posts`.`post_type` AS `post_type`,
                                 `wp_posts`.`post_mime_type` AS `post_mime_type`,
                                 `wp_posts`.`comment_count` AS `comment_count`,
                                 `wp_term_relationships`.`object_id` AS `object_id`,
                                 `wp_term_relationships`.`term_taxonomy_id` AS `term_taxonomy_id`,
                                 `wp_term_relationships`.`term_order` AS `term_order`
                            FROM
                                ( `wp_posts`
                                JOIN  `wp_term_relationships`)
                            WHERE
                                (( `wp_posts`.`post_type` = 'manual_documentation')
                                    AND ( `wp_posts`.`post_status` = 'publish')
                                    AND ( `wp_term_relationships`.`term_taxonomy_id` = 16)
                                    AND ( `wp_posts`.`ID` =  `wp_term_relationships`.`object_id`))
                            ORDER BY  `wp_term_relationships`.`term_taxonomy_id` ,  `wp_posts`.`menu_order`";
                            
    $insert_mistape= "
                            CREATE   PROCEDURE `insert_mistape`(in idPost int)
                                BEGIN
                                
                                UPDATE  `wp_posts`
                                SET
                                 
                                `post_content` = concat(`post_content`,'<div class=\"mistape_caption\"><p>Если вы нашли ошибку, пожалуйста, выделите фрагмент текста и нажмите <em>Ctrl+Enter</em>.</p></div>')
                                 
                                WHERE `ID` = idPost;
                                END
                        ";
    $get_post_0_lvl="       CREATE VIEW  `get_post_0_lvl` AS
                                SELECT 
                                     `wp_posts`.`ID` AS `ID`,
                                     `wp_posts`.`post_author` AS `post_author`,
                                     `wp_posts`.`post_date` AS `post_date`,
                                     `wp_posts`.`post_date_gmt` AS `post_date_gmt`,
                                     `wp_posts`.`post_content` AS `post_content`,
                                     `wp_posts`.`post_title` AS `post_title`,
                                     `wp_posts`.`post_excerpt` AS `post_excerpt`,
                                     `wp_posts`.`post_status` AS `post_status`,
                                     `wp_posts`.`comment_status` AS `comment_status`,
                                     `wp_posts`.`ping_status` AS `ping_status`,
                                     `wp_posts`.`post_password` AS `post_password`,
                                     `wp_posts`.`post_name` AS `post_name`,
                                     `wp_posts`.`to_ping` AS `to_ping`,
                                     `wp_posts`.`pinged` AS `pinged`,
                                     `wp_posts`.`post_modified` AS `post_modified`,
                                     `wp_posts`.`post_modified_gmt` AS `post_modified_gmt`,
                                     `wp_posts`.`post_content_filtered` AS `post_content_filtered`,
                                     `wp_posts`.`post_parent` AS `post_parent`,
                                     `wp_posts`.`guid` AS `guid`,
                                     `wp_posts`.`menu_order` AS `menu_order`,
                                     `wp_posts`.`post_type` AS `post_type`,
                                     `wp_posts`.`post_mime_type` AS `post_mime_type`,
                                     `wp_posts`.`comment_count` AS `comment_count`,
                                     `wp_term_relationships`.`object_id` AS `object_id`,
                                     `wp_term_relationships`.`term_taxonomy_id` AS `term_taxonomy_id`,
                                     `wp_term_relationships`.`term_order` AS `term_order`
                                FROM
                                    ( `wp_posts`
                                    JOIN  `wp_term_relationships`)
                                WHERE
                                    (( `wp_posts`.`post_type` = 'manual_documentation')
                                        AND ( `wp_posts`.`post_status` = 'publish')
                                        AND ( `wp_posts`.`post_parent` = 0)
                                        AND ( `wp_posts`.`ID` =  `wp_term_relationships`.`object_id`)
                                        AND ( `wp_term_relationships`.`term_taxonomy_id` <> 73))
                                ORDER BY  `wp_term_relationships`.`term_taxonomy_id` ,  `wp_posts`.`menu_order`
    
                                ";
    $get_post_n_lvl="
                            CREATE   PROCEDURE `get_post_n_lvl`(in idArticle int)
                            BEGIN
                            SELECT * 
                            FROM  wp_posts,  wp_term_relationships
                            where post_type='manual_documentation'
                            and post_status='publish'
                            and post_parent=idArticle
                            and ID=object_id
                            order by term_taxonomy_id,menu_order
                            ;
                            END
    
                            ";
    $insert_link_to_article="
                            CREATE PROCEDURE `insert_link_to_article`(
                            in idArticle int,
                            in l_link varchar (255),
                            in l_num int ,
                            in l_caprion varchar (255),
                            in r_link varchar (255),
                            in r_num int ,
                            in r_caprion varchar (255)
                            )
                            BEGIN
                       
                            UPDATE `wp_posts`
                            SET
                             
                            `post_content` = concat(`post_content`,' <section id=\"next_previous\" class=\"costom_pagination\">\n
                            <p class=\"previous-link\"><a href=\"',l_link,'\" rel=\"',l_num,'\"  >',l_caprion,'</a></p>\n
                            <p class=\"next-link\"><a href=\"',r_link,'\" rel=\"',r_num,'\" >',r_caprion,'</a></p>\n
                             </section>')
                             
                            WHERE `ID` =idArticle;
                            
                            END
    
    ";
     global $wpdb;
 
     $wpdb->get_results($getMDoc);
     $wpdb->get_results($clean_pagination);
     $wpdb->get_results($get_docs);
     $wpdb->get_results($get_post_docs);
     $wpdb->get_results($insert_mistape);
     $wpdb->get_results($get_post_0_lvl);
     $wpdb->get_results($get_post_n_lvl);
     $wpdb->get_results($insert_link_to_article);
	 

	 
	}

}
