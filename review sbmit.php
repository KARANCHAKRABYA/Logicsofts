 <?php

                if( isset($_POST['submit_review']) ) {
                    $name         = sanitize_text_field($_POST['reviewername']);
                    $review_text  = sanitize_textarea_field($_POST['reviewtext']);
                    $review_title = sanitize_text_field($_POST['reviewtitle']);
                    $rating       = intval($_POST['ratings']);

                    $new_post = array(
                        'post_title'   => $name,          
                        'post_content' => $review_text,   
                        'post_status'  => 'draft',
                        'post_type'    => 'reviews',
                    );

                    $post_id = wp_insert_post($new_post);

                    if($post_id) {

                        update_post_meta($post_id, 'review_heading', $review_title);
                        update_post_meta($post_id, 'rating', $rating);

                        echo '<div class="alert alert-success">✅ Thank you! Your review has been submitted.</div>';
                    } else {
                        echo '<div class="alert alert-danger">❌ Error! Please try again.</div>';
                    }
                }
                ?>
