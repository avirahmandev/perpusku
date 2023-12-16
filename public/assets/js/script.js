$(".alert-dismissible")
	.delay(5000)
	.slideUp(200, function () {
		$(this).alert("close");
	});

$(".card").hover(
	function () {
		$(this).addClass("shadow");
		$(this).css({
			transition: "transform 0.2s",
			transform: "translateY(-5px)",
		});
	},
	function () {
		$(this).removeClass("shadow");
		$(this).css({
			transition: "transform 0.2s",
			transform: "translateY(0)",
		});
	},
);

$(".circle").hover(
	function () {
		$(this).addClass("shadow");
	},
	function () {
		$(this).removeClass("shadow");
	},
);

// horizontall scroll
const horizons = document.querySelectorAll(".horizontal-scroll");
horizons.forEach(function (elem) {
	// loops for each horizontal elements
	elem.addEventListener("wheel", (event) => {
		event.preventDefault();
		elem.scrollBy(event.deltaY, 0);
	});
});
