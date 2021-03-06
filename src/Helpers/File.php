<?php

namespace Spatie\MediaLibrary\Helpers;

class File
{
    /**
     * Rename a file.
     *
     * @param string $fileNameWithDirectory
     * @param string $newFileNameWithoutDirectory
     *
     * @return string
     */
    public static function renameInDirectory($fileNameWithDirectory, $newFileNameWithoutDirectory)
    {
        $targetFile = pathinfo($fileNameWithDirectory, PATHINFO_DIRNAME).'/'.$newFileNameWithoutDirectory;

        rename($fileNameWithDirectory, $targetFile);

        return $targetFile;
    }

    /**
     * @param int $sizeInBytes
     *
     * @return string
     */
    public static function getHumanReadableSize($sizeInBytes)
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        if ($sizeInBytes == 0) {
            return '0 '.$units[1];
        }

        for ($i = 0; $sizeInBytes > 1024; ++$i) {
            $sizeInBytes /= 1024;
        }

        return round($sizeInBytes, 2).' '.$units[$i];
    }
}
