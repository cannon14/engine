<?php
/**
 * Created by PhpStorm.
 * User: risheebhatt
 * Date: 5/6/15
 * Time: 10:22 AM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parser extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'parsers';

	/**
	 * Primary key for the parsers table.
	 *
	 * @var string
	 */
	protected $primaryKey = 'parser_id';
}