/*

JavaSript function for the HTML It plugin

Functions allow to download results of the convertion/transformation


*/

(function($) {

	$(document).ready( function () {

		$(".csv-it-link").click(function() {
			// get a content
			var content = $(this).parent().parent().find(".csv-it-result").text();
			// craete a blob from the content - the prefix will allow the Excel to read the utf-file correct
			var blob = new Blob(["\ufeff", content], { type:'text/text;charset=UTF-8;' });
			// set file name to download
			$(this).attr("download","temporary.csv");
			// attach the blob to the link
			$(this).attr("href",URL.createObjectURL(blob));
		});

	});

})(jQuery);
