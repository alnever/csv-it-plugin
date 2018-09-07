/*

JavaSript function for the HTML It plugin

Functions allow to download results of the convertion/transformation


*/

(function($) {

	$(document).ready( function () {
		$("#csv-it-link").click(function () {
			// get a content
			var content = $('#csv-it-result').text();
			// create a BLOB object
			var blob = new Blob([content], { type:'text/csv' });
			// make the link downloadable
			$("#csv-it-link").attr("download","temporary.csv");
			// attach the blob to the link
			$("#csv-it-link").attr("href",URL.createObjectURL(blob));
		});
	});

})(jQuery);
