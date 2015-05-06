<?php
namespace tests\controllers\api\v1;

use Carbon\Carbon;
use Faker\Factory as Faker;
use TestCase;
use App\Parser;

class ParserControllerTest extends TestCase {

	public function setup() {
		parent::setup();
		$this->createParsers();
	}

	public function tearDown() {
		$this->deleteParsers();
		parent::tearDown();
	}

	/**
	 * Test that index call return parsers.
	 *
	 * @return void
	 */
	public function testIndex() {
		$response = $this->call('GET', 'ParserController@index');

		$this->assertEquals(404, $response->getStatusCode());
	}

	private function createParsers() {

		$faker = Faker::create();

		$fields = [$faker->word, $faker->word, $faker->word, $faker->word, $faker->word, $faker->word, $faker->word, $faker->word, $faker->word];

		for ($i = 0; $i < 10; $i++) {
			$parser = new Parser();
			$parser->parser_name = $faker->colorName;
			$parser->parser_description = $faker->paragraph();
			$parser->parser_fields = json_encode($fields);
			$parser->for_test_only = 1;
			$parser->save();
		}
	}

	private function deleteParsers() {
		$parsers = Parser::where('for_test_only', '=', 1)
			->get();

		foreach ($parsers as $parser) {
		}
	}

}
