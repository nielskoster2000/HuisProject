<?php

namespace App\Services;

use Illuminate\Support\Facades\File;

class JsonMergeService
{
    public function mergeJsonFiles(array $files): array
    {
        $mergedData = [];

        foreach ($files as $file) {
            $filePath = storage_path("json/$file");

            if (File::exists($filePath)) {
                $jsonData = json_decode(File::get($filePath), true);
                $mergedData = array_merge_recursive($mergedData, $jsonData ?? []);
            }
        }

        return $mergedData;
    }
}
