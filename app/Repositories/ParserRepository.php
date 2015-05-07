<?php
/**
 * Created by PhpStorm.
 * User: risheebhatt
 * Date: 5/6/15
 * Time: 10:41 AM
 */
namespace App\Repositories;

use App\Models\Parser;
use App\Repositories\RepositoryInterface;

class ParserRepository implements RepositoryInterface {

	public function all() {
		$parsers = Parser::all();

		return $parsers;
	}

	public function getById($id) {
		$parser = Parser::find($id);

		return $parser;
	}

	public function create() {
		// TODO: Implement create() method.
	}

	public function edit($id) {
		// TODO: Implement edit() method.
	}

	public function delete($id) {
		return Parser::find($id)->delete();
	}
}