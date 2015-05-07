<?php
namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FileRepository;
use App\Repositories\ParserRepository;

use Illuminate\Http\Request;

class ParserController extends Controller {

	private $parser;
	private $file;

	function __construct(ParserRepository $parser, FileRepository $file) {
		$this->parser = $parser;
		$this->file = $file;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$parsers = $this->parser->all();

		return view('parsers.index', ['parsers' => $parsers]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

		return redirect('parsers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$this->file->process(\Input::file('file_to_upload'));

		return redirect("parsers");
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

		$fields = json_decode($parser->parser_fields);

		return view('parsers.show', ['parser' => $parser, 'fields'=>$fields]);
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

		return view('parsers.edit', ['parser', $parser]);
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

		return redirect('parsers');
	}

}
