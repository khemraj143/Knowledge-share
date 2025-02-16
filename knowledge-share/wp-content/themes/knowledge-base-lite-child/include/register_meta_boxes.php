<?php
// Register Meta Box
add_action("add_meta_boxes", "register_meta_boxes");
function register_meta_boxes() {
    // Make sure this filter is returning valid data.
    $post_mbs = apply_filters("register_post_mb", array());

    if ($post_mbs && is_array($post_mbs)) {
        $mb_name = isset($post_mbs["mb_name"]) ? $post_mbs["mb_name"] : "";
        $mb_post = isset($post_mbs["post_type"]) ? $post_mbs["post_type"] : "";

        if (!$mb_name || !$mb_post) {
            return false;
        }

        $mb_id = isset($post_mbs["mb_id"]) ? $post_mbs["mb_id"] : str_replace(" ", "_", strtolower(trim($mb_name)));
        $mb_position = isset($post_mbs["position"]) ? $post_mbs["position"] : "advanced";

        add_meta_box($mb_id, $mb_name, 'register_posts_meta_boxes', $mb_post, $mb_position);
    }
}

// Meta callback function
function register_posts_meta_boxes($post) {
    $post_mbs = apply_filters("register_post_mb", array());
    $mb_name = isset($post_mbs["mb_name"]) ? $post_mbs["mb_name"] : "";
    $mb_id = isset($post_mbs["mb_id"]) ? $post_mbs["mb_id"] : str_replace(" ", "_", strtolower(trim($mb_name)));
    $mb_fields = isset($post_mbs["fields"]) && is_array($post_mbs["fields"]) ? $post_mbs["fields"] : 0;
    $fields_data = get_post_meta($post->ID, $mb_id . '_keys', true);
    $mb_fields_data = $fields_data ? explode(",", $fields_data) : array();
    $html = '<div class="' . $mb_id . "_" . $post->ID . ' mb_post_box">';
    $mb_field_keys = array();
    $count = 100;

    if ($mb_fields) {
        foreach ($mb_fields as $key => $field) {
            switch ($key) {
                case "input":
                    if ($field) {
                        foreach ($field as $fld_key => $inputs) {
                            $name = isset($inputs["name"]) ? $inputs["name"] : $key . "_". $count;
                            $type = isset($inputs["type"]) ? $inputs["type"] : "text";
                            $placeholder = isset($inputs["placeholder"]) ? 'placeholder="' . $inputs["placeholder"] . '"' : "";
                            $id = isset($inputs["id"]) ? 'id="' . $inputs["id"] . '"' : 'id="' . $name . '"';
                            $class = isset($inputs["class"]) ? 'class="' . $inputs["class"] . '"' : 'class="mb_' . $key . '_field"';
                            $min = isset($inputs["min"]) ? 'min="'.$inputs["min"].'"' : "";
                            $max = isset($inputs["max"]) ? 'max="'.$inputs["max"].'"' : "";
                            $meta_value = $mb_fields_data && in_array($name, $mb_fields_data) ? get_post_meta($post->ID, $name, true) : "";
                            $label = isset($inputs["label"]) && $inputs["is_label"] ? '<label for="' . $id . '">' . $inputs["label"] . '</label>' : "";
                            $html .= '<div id="mb_' . $type . '_' . $fld_key . '" class="mb_' . $key . ' mb-elements">' . $label . '<input type="' . $type . '" name="' . $name . '" value="' . $meta_value . '" ' . $placeholder . ' ' . $id . ' ' . $class . ' '.$min.' '.$max.' ></div>';
                            $mb_field_keys[] = $name;
                            $count += 1;
                        }
                    }
                    break;
                    
                case "radio":
                    if ($field) {
                        foreach ($field as $radio_key => $radios) {
                            $name = isset($radios["name"]) ? $radios["name"] : $key . "_" . $count;
                            $id = isset($radios["id"]) ? 'id="' . $radios["id"] . '"' : 'id="' . $name . '"';
                            $class = isset($radios["class"]) ? 'class="' . $radios["class"] . '"' : 'class="mb_' . $key . '_field"';
                            $value = isset($radios["value"]) ? $radios["value"] : "";
                            $meta_value = $mb_fields_data && in_array($name, $mb_fields_data) ? get_post_meta($post->ID, $name, true) : "";
                            $label = isset($radios["label"]) && $radios["is_label"] ? '<label for="' . $id . '">' . $radios["label"] . '</label>' : '';
                            $html .= '<div id="mb_radio_' . $count . '" class="mb_radio mb-elements">' . $label;
                            if (is_array($value)) {
                                foreach ($value as $opt_key => $opt_value) {
                                    $opt_val = is_string($opt_key) ? $opt_key : $opt_value;
                                    $checked = $meta_value && ($meta_value == $opt_val) ? "checked" : "";
                                    $html .= '<p><input type="' . $key . '" ' . $id . ' ' . $class . ' name="' . $name . '" value="' . $opt_val . '" '.$checked.'>' . $opt_value . '</p>';
                                }
                            } else {
                                $checked = $meta_value && ($meta_value == $value) ? "checked" : "";
                                $html .= '<p><input type="' . $key . '" ' . $id . ' ' . $class . ' name="' . $name . '" value="' . $value . '" '.$checked.'>' . $value . '</p>';
                            }
                            $html .= '</div>';
                            $mb_field_keys[] = $name;
                            $count += 1;
                        }
                    }
                    break;

                case "select":
                    if ($field) {
                        foreach ($field as $slc_key => $dropdown) {
                            $name = isset($dropdown["name"]) ? $dropdown["name"] : $key . "_". $count;
                            $value = isset($dropdown["value"]) ? $dropdown["value"] : "";
                            $id = isset($dropdown["id"]) ? 'id="' . $dropdown["id"] . '"' : 'id="' . $name . '"';
                            $label = isset($dropdown["label"]) && $dropdown["is_label"] ? '<label for="' . $name . '">' . $dropdown["label"] . '</label>' : '';
                            $multi = isset($dropdown["is_multiple"]) && $dropdown["is_multiple"] ? "multiple" : "";
                            $meta_value = $mb_fields_data && in_array($name, $mb_fields_data) ? get_post_meta($post->ID, $name, true) : "";
                            $class = isset($dropdown["class"]) ? 'class="' . $dropdown["class"] . ' '.$multi.'"' : 'class="mb_' . $key . '_field '.$multi.'"';
                            
                            $html .= '<div class="mb_select_' . $count . ' mb-elements">' . $label . '<select name="' . $name . '" ' . $id . ' ' . $class . ' '.$multi.'>';
                            if (is_array($value)) {
                                foreach ($value as $opt_key => $opt_value) {
                                    $option = is_string($opt_key) ? $opt_key : $opt_value;
                                    $checked = $meta_value && ($meta_value == $option) ? "checked" : "";
                                    $html .= '<option value="' . $option . '" '.$checked.'>' . $opt_value . '</option>';
                                }
                            }
                            $html .= '</select></div>';
                            $mb_field_keys[] = $name;
                            $count += 1;
                        }
                    }
                    break;

                case "textarea":
                    if ($field) {
                        foreach ($field as $ta_key => $textareas) {
                            $name = isset($textareas["name"]) ? $textareas["name"] : $key . "_". $count;
                            $value = isset($textareas["value"]) ? $textareas["value"] : "";
                            $id = isset($textareas["id"]) ? 'id="' . $textareas["id"] . '"' : 'id="' . $name . '"';
                            $class = isset($textareas["class"]) ? 'class="' . $textareas["class"] . '"' : 'class="mb_' . $key . '_field"';
                            $meta_value = $mb_fields_data && in_array($name, $mb_fields_data) ? get_post_meta($post->ID, $name, true) : "";
                            $label = isset($textareas["label"]) && $textareas["is_label"] ? '<label for="' . $name . '">' . $textareas["label"] . '</label>' : '';
                            $html .= '<div class="mb_textarea_' . $count . ' mb_textarea mb-elements">' . $label . '<textarea name="' . $name . '" ' . $placeholder . ' ' . $id . ' ' . $class . '>' . $meta_value . '</textarea></div>';
                            $mb_field_keys[] = $name;
                            $count += 1;
                        }
                    }
                    break;

                case "taxonomy":
                    if ($field) {
                        foreach ($field as $term_key => $terms_data) {
                            $name = isset($terms_data["name"]) ? $terms_data["name"] : $key . "_". $count;
                            $value = isset($terms_data["value"]) ? $terms_data["value"] : "";
                            $id = isset($terms_data["id"]) ? 'id="' . $terms_data["id"] . '"' : 'id="' . $name . '"';
                            $taxonomy = isset($terms_data["taxonomy"]) ? $terms_data["taxonomy"] : "category";
                            $multi = isset($terms_data["is_multiple"]) && $terms_data["is_multiple"] ? "multiple" : "";
                            $class = isset($terms_data["class"]) ? 'class="mb_' . $key . '_field ' . $terms_data["class"] . ' '.$multi.'"' : 'class="mb_' . $key . '_field '.$multi.'"';
                            $meta_value = $mb_fields_data && in_array($name, $mb_fields_data) ? get_post_meta($post->ID, $name, true) : "";
                            $terms = get_terms($taxonomy, ['hide_empty' => false]);

                            $label = isset($terms_data["label"]) && $terms_data["is_label"] ? '<label for="' . $name . '">' . $terms_data["label"] . '</label>' : '';
                            $html .= '<div class="mb_taxonomy_' . $count . ' mb_taxonomy mb-elements">' . $label;
                            if(isset($terms->errors)){
                                $html .= '<p>Terms data not available.</p>';
                            }else{
                                $html .= '<select name="' . $name . '" ' . $id . ' ' . $class . ' '.$multi.' data-post="'.$post->ID.'" data-tax="'.$taxonomy.'">';
                                foreach ($terms as $term) {
                                    $checked = $meta_value && ($meta_value == $term->term_id) ? "selected" : "";
                                    $html .= '<option value="' . $term->term_id . '" '.$checked.'>' . $term->name . '</option>';
                                }
                                $html .= '</select>';
                            }
                            $html .= '</div>';
                            $mb_field_keys[] = $name;
                            $count += 1;
                        }
                    }
                    break;

                case "post":
                    if ($field) {
                        foreach ($field as $post_key => $fld_posts) {
                            $name = isset($fld_posts["name"]) ? $fld_posts["name"] : $key . "_". $count;
                            $value = isset($fld_posts["value"]) ? $fld_posts["value"] : "";
                            $id = isset($fld_posts["id"]) ? 'id="' . $fld_posts["id"] . '"' : 'id="' . $name . '"';
                            $post_type = isset($fld_posts["post_type"]) ? $fld_posts["post_type"] : 'post';
                            $multi = isset($fld_posts["is_multiple"]) && $fld_posts["is_multiple"] ? "multiple" : "";
                            $class = isset($fld_posts["class"]) ? 'class="' . $fld_posts["class"] . ' '.$multi.'"' : 'class="mb_' . $key . '_field '.$multi.'"';
                            $meta_value = $mb_fields_data && in_array($name, $mb_fields_data) ? get_post_meta($post->ID, $name, true) : "";
                            $posts = get_posts(['post_type' => $post_type, 'numberposts' => -1, 'post_status' => 'publish']);
                            
                            $label = isset($fld_posts["label"]) && $fld_posts["is_label"] ? '<label for="' . $name . '">' . $fld_posts["label"] . '</label>' : '';
                            $html .= '<div class="mb_posts_' . $count . ' mb_wp_posts mb-elements">' . $label;
                            if($posts){
                                $html .= '<select name="' . $name . '" ' . $id . ' ' . $class . ' '.$multi.'>';
                                foreach ($posts as $post_item) {
                                    $checked = $meta_value && ($meta_value == $post_item->ID) ? "selected" : "";
                                    $html .= '<option value="' . $post_item->ID . '" '.$checked.'>' . $post_item->post_title . '</option>';
                                }
                                $html .= '</select>';
                            }else{
                                $html .= '<p>Posts data not available.</p>';
                            }
                            
                            $html .= '</div>';
                            $mb_field_keys[] = $name;
                            $count += 1;
                        }
                    }
                    break;
            }
        }
        update_option("ks_posts_meta_boxes", $count++);
    }

    $html .= '<input type="hidden" name="' . $mb_id . '_keys" value="' . implode(',', $mb_field_keys) . '">';
    $html .= '</div>';
    echo $html;
}

// Save meta value with save post hook
add_action("save_post", "save_mb_custom_fields_data");
function save_mb_custom_fields_data($post_id) {
    // Check for autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

    // Get meta box data
    $post_mbs = apply_filters("register_post_mb", array());
    $mb_name = isset($post_mbs["mb_name"]) ? $post_mbs["mb_name"] : "";
    $mb_id = isset($post_mbs["mb_id"]) ? $post_mbs["mb_id"] : str_replace(" ", "_", strtolower(trim($mb_name)));
    $keys = isset($_POST[$mb_id . '_keys']) ? explode(',', $_POST[$mb_id . '_keys']) : array();

    if ($keys) {
        foreach ($keys as $mb_key) {
            if (isset($_POST[$mb_key])) {
                update_post_meta($post_id, $mb_key, $_POST[$mb_key]);
            }
        }
        if (isset($_POST[$mb_id . '_keys'])) {
            update_post_meta($post_id, $mb_id . '_keys', $_POST[$mb_id . '_keys']);
        }
    }

    return $post_id;
}

// show meta value after post content
// add_filter( 'the_content', function( $content ) {
// 	$meta_val = get_post_meta( get_the_ID(), 'wpdocs-meta-name', true );
// 	return $content . $meta_val;
// } );