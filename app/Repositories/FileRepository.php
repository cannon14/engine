<?php
/**
 * Created by PhpStorm.
 * User: risheebhatt
 * Date: 5/6/15
 * Time: 10:41 AM
 */
namespace App\Repositories;

use App\Models\Parser;

class FileRepository {

	public function process($file) {
		//Get the uploaded file.
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

		return $fields;
	}
}