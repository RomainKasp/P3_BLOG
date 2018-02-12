<?PHP
	REQUIRE("./public/func.inc.php");
	REQUIRE("./public/header.php");
	REQUIRE("./public/menu.php");
	echo $content;
	REQUIRE($content);
	REQUIRE("./public/footer.php");