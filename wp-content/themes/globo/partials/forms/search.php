<?php
/**
 * The search form for the header
 *
 * @package globo
 */
?>
<form id="searchform" method="get" action="/index.php" class="search-form">
	<input type="text" name="s" id="s" size="15" placeholder="Search..." class="search-form__input"/>
	<input type="submit" value="Search" id="s_submit" class="search-form__submit" />
	<a href="#" class="search-form__dismiss">
		<i class="search-form__dismiss-icon">
			<svg class="fill-light">
				<use xlink:href="#dismiss-button-icon"></use>
			</svg>
		</i>
	</a>
</form>
