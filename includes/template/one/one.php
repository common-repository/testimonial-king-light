<table class="form-table">
        <tbody>
            <tr>
            <th scope="row"><label for="gmctk-style-one">Styles :</label></th>
                <td><select name="gmctk_general_options[gmctk_style_one]"  id="gmctk-style-one" class="regular-text">
                        <option value="default"    <?php echo (esc_attr($general['gmctk_style_one']) == 'default')? 'selected':''; ?>>Default</option>
                        <option value="gmctkone"   <?php echo (esc_attr($general['gmctk_style_one']) == 'gmctkone')? 'selected':''; ?>>One</option>
                        <option value="gmctktwo"   <?php echo (esc_attr($general['gmctk_style_one']) == 'gmctktwo')? 'selected':''; ?>>Two</option>
                        <option value="gmctkthree" <?php echo (esc_attr($general['gmctk_style_one']) == 'gmctkthree')? 'selected':''; ?>>Three</option>
                        <option value="gmctkfour"  <?php echo (esc_attr($general['gmctk_style_one']) == 'gmctkfour')? 'selected':''; ?>>Four</option>

                    </select>
                    <p class="description">Select style to be applied on slider.This will change postion of image,content,layout.</p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="gmctk-background">Inner Background Colour :</label></th>
                <td><input name="gmctk_general_options[inner_background_colour_one]" type="text" id="gmctk-background" value="<?php echo esc_attr( $general['inner_background_colour_one'] ); ?>" class="regular-text gmctk-colour-picker">
                        <p class="description">Select background colour of the inner div.</p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="gmctk-background">Outer Background Colour :</label></th>
                <td><input name="gmctk_general_options[outer_background_colour_one]" type="text" id="gmctk-background" value="<?php echo esc_attr( $general['outer_background_colour_one'] ); ?>" class="regular-text gmctk-colour-picker">
                        <p class="description">Select background colour of the outer div.</p>
                </td>

            </tr>
            <tr>
                <th scope="row"><label for="gmctk-text-colour">Paragraph Colour :</label></th>
                <td><input name="gmctk_general_options[text_colour_one]" type="text" id="gmctk-text-colour" value="<?php echo esc_attr( $general['text_colour_one'] ); ?>" class="regular-text gmctk-colour-picker">
                        <p class="description">Select  colour for the discription text.</p>
                </td>
 
            </tr>
            <tr>
                <th scope="row"><label for="gmctk-meta-colour-title">Title Colour :</label></th>
                <td><input name="gmctk_general_options[meta_title_colour_one]" type="text" id="gmctk-meta-title-colour" value="<?php echo esc_attr( $general['meta_title_colour_one'] ); ?>" class="regular-text gmctk-colour-picker">
                            <p class="description">Select  colour for the Title text.</p>
                </td>

            </tr>
            <tr>
                <th scope="row"><label for="gmctk-meta-colour">Position Colour :</label></th>
                <td><input name="gmctk_general_options[meta_colour_one]" type="text" id="gmctk-meta-colour" value="<?php echo esc_attr( $general['meta_colour_one'] ); ?>" class="regular-text gmctk-colour-picker">
                            <p class="description">Select  colour for the position text.</p>
                </td>

            </tr>
            <tr>
            <th scope="row"><label for="gmctk-button">Show Buttons :</label></th>
                <td><select name="gmctk_general_options[gmctk_button_one]"  id="gmctk-button" class="regular-text">
                        <option value="block" <?php echo (esc_attr($general['gmctk_button_one']) == 'block')? 'selected':''; ?>>Yes</option>
                        <option value="none"  <?php echo (esc_attr($general['gmctk_button_one']) == 'none')? 'selected':''; ?>>No</option>
                    </select>
                            <p class="description">Select  slider buttons visibility here.</p>

                </td>
            </tr>
            <tr>
                <th scope="row"><label for="gmctk-button-colour">Buttons Colour :</label></th>
                <td><input name="gmctk_general_options[button_colour_one]" type="text" id="gmctk-button-colour" value="<?php echo esc_attr( $general['button_colour_one'] ); ?>" class="regular-text gmctk-colour-picker">
                            <p class="description">Select  colour for slider buttons  here.</p>

                </td>
            </tr>
            <tr>
            <th scope="row"><label for="gmctk-button-type">Buttons Type :</label></th>
                <td><select name="gmctk_general_options[gmctk_button_type_one]"  id="gmctk-button-type" class="regular-text">
                        <option value="0px" <?php echo (esc_attr($general['gmctk_button_type_one']) == '0px')? 'selected':''; ?>>Squre</option>
                        <option value="30px" <?php echo (esc_attr($general['gmctk_button_type_one']) == '30px')? 'selected':''; ?>>Circle</option>
                    </select>
                            <p class="description">Select  slider buttons type  here, this will change shape of the buttons.</p>

                </td>
            </tr>
            <tr>
            <th scope="row"><label for="gmctk-dots">Show Dots :</label></th>
                <td><select name="gmctk_general_options[gmctk_dots_one]"  id="gmctk-dots" class="regular-text">
                        <option value="block" <?php echo (esc_attr($general['gmctk_dots_one']) == 'block')? 'selected':''; ?>>Yes</option>
                        <option value="none" <?php echo (esc_attr($general['gmctk_dots_one']) == 'none')? 'selected':''; ?>>No</option>
                    </select>
                             <p class="description">Select visibility of slider dots.</p>
                    
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="gmctk-dots-colour">Dots Colour :</label></th>
                <td><input name="gmctk_general_options[dots_colour_one]" type="text" id="gmctk-dots-colour" value="<?php echo esc_attr( $general['dots_colour_one'] ); ?>" class="regular-text gmctk-colour-picker">
                              <p class="description">Select colour for slider dots.</p>
                </td>
            </tr>
            <tr>
            <th scope="row"><label for="gmctk-colour-animation">Colour Animation :</label></th>
                <td><select name="gmctk_general_options[colour_animation_one]"  id="gmctk-colour-animation" class="regular-text">
                        <option value="on"  <?php echo (esc_attr($general['colour_animation_one']) == 'on')? 'selected':''; ?>>On</option>
                        <option value="off" <?php echo (esc_attr($general['colour_animation_one']) == 'off')? 'selected':''; ?>>Off</option>
                    </select>
                              <p class="description">Select colour animation visibility. Note: this will hide inner and outer background colour.</p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="gmctk-background">Animation Colours :</label></th>
                <td><input name="gmctk_general_options[animation_colour_first_one]" type="text" id="animation-colour-first-one" value="<?php echo esc_attr( $general['animation_colour_first_one'] ); ?>" class="regular-text gmctk-colour-picker">
                <input name="gmctk_general_options[animation_colour_second_one]" type="text" id="animation-colour-second-one" value="<?php echo esc_attr( $general['animation_colour_second_one'] ); ?>" class="regular-text gmctk-colour-picker">
                              <p class="description">Select colour combination  for animation.</p>

                </td>
            </tr>
            <tr>
            <th scope="row"><label for="gmctk-image-type">Image Type :</label></th>
                <td><select name="gmctk_general_options[gmctk_image_type_one]"  id="gmctk-image-type" class="regular-text">
                        <option value="0px"  <?php echo (esc_attr($general['gmctk_image_type_one']) == '0px')? 'selected':''; ?>>Normal</option>
                        <option value="30px" <?php echo (esc_attr($general['gmctk_image_type_one']) == '30px')? 'selected':''; ?>>Round</option>
                        <option value="70px" <?php echo (esc_attr($general['gmctk_image_type_one']) == '70px')? 'selected':''; ?>>Circle</option>
                    </select>
                    <p class="description">Select image type to display.</p>

                </td>
            </tr>
            <tr>
            <th scope="row"><label for="gmctk-image-position">Image Position :</label></th>
                <td><select name="gmctk_general_options[gmctk_image_position_one]"  id="gmctk-image-position" class="regular-text">
                        <option value="left"   <?php echo (esc_attr($general['gmctk_image_position_one']) == 'left')? 'selected':''; ?>>Left</option>
                        <option value="top"    <?php echo (esc_attr($general['gmctk_image_position_one']) == 'top')? 'selected':''; ?>>Top</option>
                        <option value="right"  <?php echo (esc_attr($general['gmctk_image_position_one']) == 'right')? 'selected':''; ?>>Right</option>
                        <option value="bottom" <?php echo (esc_attr($general['gmctk_image_position_one']) == 'bottom')? 'selected':''; ?>>Bottom</option>
                    </select>
                             <p class="description">Select  position of the image.</p>
                </td>
            </tr>
            <tr>
            <th scope="row"><label for="gmctk-item-no-one">Number Of Items :</label></th>
                <td><select name="gmctk_general_options[gmctk_item_no_one]"  id="gmctk-item-no-one" class="regular-text">
                        <option value="one"   <?php echo (esc_attr($general['gmctk_item_no_one']) == 'one')? 'selected':''; ?>>One</option>
                        <option value="two"   <?php echo (esc_attr($general['gmctk_item_no_one']) == 'two')? 'selected':''; ?>>Two</option>
                    </select>
                            <p class="description">Select number of items to display per slide.</p>
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="gmctk-active">Active</label></th>
                <td><input name="gmctk_general_options[gmctk_active]" type="checkbox" id="gmctk-active" value="one" class="" <?php echo (esc_attr($general['gmctk_active']) == 'one')? 'checked':''; ?>/>
                            <p class="description">This will activate the current template.</p>
                </td>
            </tr>
        </tbody>
</table>

