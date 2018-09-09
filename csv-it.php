<?php

/*
 * CSV-converter class
 * @link
 * @since 1.0
 *
 * @package csv-it-plugin
 * @subpackage csv-it-plugin
*/

namespace CsvItPlugin;

class Csv_It {

  public function __construct() {
    add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
    add_shortcode('csv_it',array($this, 'shortcode'));
  }

  /*
  This method implements an injection of the plugin's style sheet
  */

  public function enqueue_styles() {
    wp_enqueue_style(
			"csv-it-css",
			sprintf("%scss/csv-it.css", plugin_dir_url(__FILE__)),
			null, null, 'all'
		);
  }

  /*
	* The method implements an injection of JavaScripts
	*/
	public function enqueue_scripts() {
		wp_enqueue_script(
			"scv-it-script",
			sprintf("%sjs/csv-it.js", plugin_dir_url(__FILE__)),
			array("jquery"),
			false, false
		);
	}

  /*
  The method implements a shortcode functionality
  */

  public function shortcode($atts = [], $content = "", $tag = null) {
    $atts = array_change_key_case($atts, CASE_LOWER);

    $content = do_shortcode($content);

    $separator = isset($atts["separator"]) ? $atts["separator"] : ",";

    return sprintf(
			'<div class="csv-it-block">
				<div class="csv-it-header">
					<a class="csv-it-link">
						<img src="%s" alt="CSV" title="CSV" width="20" height="20" />
					</a>
				</div>
				<div class="csv-it-source" name="csv-it-source">%s</div>
				<div class="csv-it-result" name="csv-it-result">%s</div>
			</div>',
			sprintf("%simg/csv-it.png", plugin_dir_url(__FILE__)), // image source file
			$content, // content (source)
			$this->prepare_csv($content,$separator) // Transformed content - the result of the convertion
		);

  }

  /*
  The method takes a content of the shortcode,
  obrains table rows and cells
  and create a csv version of the table data
  */

  public function prepare_csv($content, $separator) {
    $res = "<div class=''>";

    // simplify tags
    $content = preg_replace("/<table[^>]*>/", "<table>", $content);
    $content = preg_replace("/<tr[^>]*>/", "<tr>", $content);
    $content = preg_replace("/<td[^>]*>/", "<td>", $content);
    $content = preg_replace("/<th[^>]*>/", "<th>", $content);
    $content = preg_replace("/<thead[^>]*>/", "<thead>", $content);
    $content = preg_replace("/<tbody[^>]*>/", "<tbody>", $content);

    // strip all other tags
    $content = strip_tags($content,"<table><tr><td><th><thead><tbody>");

    // replace th tags with td, because they are equal for CSV format
    $content = preg_replace("/<th>/","<td>", $content);
    $content = preg_replace("/<\/th>/","</td>", $content);

    $content = str_replace("&nbsp;","",$content);

    // get all rows in content
    preg_match_all("/<tr>(.*?)<\/tr>/is", $content, $rows);
    foreach($rows[1] as $row) {

        // get all cells in each row
        preg_match_all("/<td>(.*?)<\/td>/is",$row, $cols);

        // create a CSV-row using table cells values
        $res .= implode($separator, $cols[1]);
        $res .= "\n";
    }

    $res .= "</div>";

    return $res;
  }

}


 ?>
