<?php

namespace App\Helpers;

/**
 * contains some helpful functions
 */
class ArrayHelpers
{
	public static function chunkFile(string $path, callable $generator, int $chunkSize)
	{
		$file = fopen($path, 'r');
		$data = [];

		$firstline =  true;

		for ($ii = 1; ($row = fgetcsv($file, null, ',')) !== FALSE; $ii++) {
			if (!$firstline) {
				$data[] = $generator($row);
				if ($ii % $chunkSize == 0) {
					yield $data;
					$data = [];
				}
			}
			$firstline = false;
		}

		if (!empty($data)) {
			yield $data;
		}

		fclose($file);
	}

    public static function getIdFromList(string $searchTerm, array $idList)
    {
        if (empty($searchTerm) || $searchTerm === null) {
        	return NULL;
        }
        foreach ($idList as $key => $value) {
        	if($value == $searchTerm) {
        		return $key;
        	}
        }
    }
}