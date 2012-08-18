<?php

if (isset($_POST["display"])) {
	update_option("the_buffer_button_display", $_POST["display"]);
}

if (isset($_POST["style"])) {
	update_option("the_buffer_button_style", $_POST["style"]);
}

if (isset($_POST["twitter-username-to-mention"])) {
	update_option("the_buffer_button_twitter_username_to_mention", $_POST["twitter-username-to-mention"]);
}

?>

<div class="wrap">
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2>The Buffer Button Settings</h2>
	<form method="post">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="display">Display</label>
				</th>
				<td>
					<select name="display" id="display">
						<option <?php echo (get_option("the_buffer_button_display") == "before" ? "selected=\"selected\"" : ""); ?> value="before">Before the content</option>
						<option <?php echo (get_option("the_buffer_button_display") == "after" ? "selected=\"selected\"" : ""); ?> value="after">After the content</option>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="style">Style</label>
				</th>
				<td>
					<select name="style" id="style">
						<option <?php echo (get_option("the_buffer_button_style") == "vertical" ? "selected=\"selected\"" : ""); ?> value="vertical">Vertical</option>
						<option <?php echo (get_option("the_buffer_button_style") == "horizontal" ? "selected=\"selected\"" : ""); ?> value="horizontal">Horizontal</option>
						<option <?php echo (get_option("the_buffer_button_style") == "none" ? "selected=\"selected\"" : ""); ?> value="none">No count</option>
					</select>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="twitter-username-to-mention">Twitter username to mention</label>
				</th>
				<td>
					<input name="twitter-username-to-mention" type="text" id="twitter-username-to-mention" value="<?php echo get_option("the_buffer_button_twitter_username_to_mention"); ?>" class="regular-text" />
					<p class="description">@yourchoice</p>
				</td>
			</tr>
		</table>
		<p class="submit">
			<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes" />
		</p>
	</form>
</div>