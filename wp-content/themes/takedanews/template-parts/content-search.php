<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package takedanews
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h4 class="newsletter__title"><a href="<?php echo get_the_permalink(); ?>"><?php echo emphasize(get_field('display_title', $latest->ID), get_search_query()); ?></a></h4>
    <h6 class="newsletter__date"><?php echo emphasize(get_field('display_date', $latest->ID), get_search_query()); ?></h6>

    <div class="newsletter__keyword-search-results">

	    <?php
	    // Show extracts from articles where the keywords are found
	    $section_count = get_post_meta(get_the_ID(), 'article_sections', true);
	    $found_count = 0; // used to make sure max. 3 results are displayed
	    if ($section_count) {
		    for ($i=0; $i<$section_count; $i++) {
		        // START SEARCHING SECTION TITLES FOR DISPLAY
		        $section_title_key = 'article_sections_' . $i . '_title';
			    $section_title = get_post_meta(get_the_ID(), $section_title_key, true); // the section title as a string
			    // use regex to find if the search query is found in the section title
			    $regex = '/(' . get_search_query(). ')/iu';

			    if (preg_match_all($regex, $section_title, $match)) {
				    // a match is found, so just display the emphasized title
				    if($found_count < 3) {
					    echo '...' . emphasize($section_title, get_search_query()); // display the title, highlighting the search term
					    $found_count++;
				    }
			    }
			    // END SEARCHING SECTION TITLES FOR DISPLAY

			    // START SEARCHING ARTICLES FOR DISPLAY
			    $section_articles_key = 'article_sections_'.$i.'_articles';
			    $article_count = get_post_meta(get_the_ID(), $section_articles_key, true);
			    if($article_count) {
				    for($j=0; $j<$article_count; $j++) { // loop through articles and extract sentences where search keyword(s) is/are found
					    // use regex to find the sentences where the search query is found
					    $regex = '/(' . get_search_query(). ')/iu';

					    // Search through article titles
					    $article_title_key = 'article_sections_'.$i.'_articles_'.$j.'_article_title';
					    $article_title = get_post_meta(get_the_ID(), $article_title_key, true); // the article title as a string
					    if (preg_match_all($regex, $article_title, $match)) {
						    // a match is found, so just display the emphasized title
						    if($found_count < 3) {
							    echo '...' . emphasize($article_title, get_search_query()); // display the title, highlighting the search term
							    $found_count++;
						    }
					    }

					    // Search through article content
					    $article_key = 'article_sections_'.$i.'_articles_'.$j.'_article_content';
					    $article_content = get_post_meta(get_the_ID(), $article_key, true); // the article content as a string
					    if (preg_match_all($regex, $article_content, $match)) {
						    // loop through each match
						    foreach ($match[0] as &$str)
							    $str = preg_replace('/(\\d+),(\\d+)/', "$1.$2", $str);
                            if($found_count < 3) {
	                            echo '...' . emphasize($str, get_search_query()); // display the sentence(s), highlighting the search term
	                            $found_count++;
                            }
					    }
				    }
			    }
			    // END SEARCHING ARTICLES FOR DISPLAY

			    // START SEARCHING WHAT THIS MEANS FOR TAKEDA FOR DISPLAY
			    $what_this_means_for_takeda_key = 'article_sections_'.$i.'_what_this_means_for_takeda';
			    if(get_post_meta(get_the_ID(), $what_this_means_for_takeda_key, true)) {
				    $what_this_means_for_takeda_content = get_post_meta(get_the_ID(), $what_this_means_for_takeda_key, true); // the content as a string
                    // use regex to find the sentences where the search query is found
                    $regex = '/[A-Z][^\\.;]*(' . get_search_query(). ')[^\\.;]*/';

                    if (preg_match_all($regex, $what_this_means_for_takeda_content, $match)) {
                        // loop through each match
                        foreach ($match[0] as &$str)
                            $str = preg_replace('/(\\d+),(\\d+)/', "$1.$2", $str);
                        if($found_count < 3) {
                            echo '...' . emphasize($str, get_search_query()); // display the sentence(s), highlighting the search term
                            $found_count++;
                        }
                    }
			    }
			    // END SEARCHING WHAT THIS MEANS FOR TAKEDA FOR DISPLAY

			    // START SEARCHING POTENTIAL ACTIONS FOR DISPLAY
			    $potential_actions_key = 'article_sections_'.$i.'_potential_actions';
			    if(get_post_meta(get_the_ID(), $potential_actions_key, true)) {
				    $potential_actions_content = get_post_meta(get_the_ID(), $potential_actions_key, true); // the content as a string
				    // use regex to find the sentences where the search query is found
				    $regex = '/[A-Z][^\\.;]*(' . get_search_query(). ')[^\\.;]*/';

				    if (preg_match_all($regex, $potential_actions_content, $match)) {
					    // loop through each match
					    foreach ($match[0] as &$str)
						    $str = preg_replace('/(\\d+),(\\d+)/', "$1.$2", $str);
					    if($found_count < 3) {
						    echo '...' . emphasize($str, get_search_query()); // display the sentence(s), highlighting the search term
						    $found_count++;
					    }
				    }
			    }
			    // END SEARCHING POTENTIAL ACTIONS FOR DISPLAY

		    }
	    };
	    if($found_count > 0) echo '...';
	    ?>

    </div> <!--/.newsletter__keyword-search-results-->


</article><!-- #post-<?php the_ID(); ?> -->
<hr>
