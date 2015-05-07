<?php
namespace App\Http\Controllers\admin;

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

        return view('parsers.index', ['parsers' => $parsers]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('parsers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
        //Get the uploaded file.
        $file = \Input::file('file_to_upload');
        $fileName = $file->getClientOriginalName();
        $fileSize = $file->getClientSize();
        $fileMimeType = $file->getClientMimeType();

        //Move the file from temporary storage to permanent storage
        $file->move(storage_path().'/imports/',$fileName);
        //Load the file for reading.
        $reader = \Excel::load(storage_path().'/imports/'.$fileName);
        // Getting all results
        $results = $reader->all();
        //Array to hold all column names.
        $fields = [];
        //Loop through results and load all the column names into fields array.
        foreach($results[0] as $key => $value) {
            array_push($fields, $key);
        }

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

		return response()
			->view('parsers.show')
			->with('parser', $parser);
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
