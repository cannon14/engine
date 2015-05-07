<?php namespace App\Http\Controllers\api\v1;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ParserRepository;

use Illuminate\Http\Request;

class ParserController extends Controller {

	private $parser;

	function __construct(ParserRepository $parser) {
		$this->parser = $parser;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		$parsers = $this->parser->all();
		$data = ['statusCode' => 200, 'payload' => $parsers];

		return response()->json($data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

		$fields = $this->file->process(\Input::file('file_to_upload'));

		return response()->json($fields);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		$parser = $this->parser->getById($id);


		return response()->json(['parser' => $parser]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$parser = $this->parser->getById($id);

		return response()
			->view('parsers.edit')
			->with('parser', $parser);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update($id) {
		$this->parser->update($id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id) {
		$this->parser->delete($id);
	}

}
