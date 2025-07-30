<?php

namespace FahriGunadi\TimezoneFinder;

class TimezoneFinder
{
    public function timezoneName(float $latitude, float $longitude): ?string
    {
        $bin = $this->binPath();

        $timezone = trim(shell_exec("$bin $latitude $longitude"), " \n\r\t\v\x00\"");

        if (! $timezone) {
            return null;
        }

        return $timezone;
    }

    protected function binPath(): string
    {
        $binaries = [
            'Windows' => 'tzf-cli-windows.exe',
            'Darwin' => 'tzf-cli-darwin',
            'Linux' => 'tzf-cli-linux',
        ];

        $binFileName = $binaries[PHP_OS_FAMILY] ?? 'tzf-cli-linux';

        $fullBinPath = __DIR__ . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . $binFileName;

        if (file_exists($fullBinPath) && !is_executable($fullBinPath)) {
            chmod($fullBinPath, 0755);
        }

        return $fullBinPath;
    }
}
