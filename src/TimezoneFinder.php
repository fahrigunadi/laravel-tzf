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
        $os = PHP_OS_FAMILY;

        $bin = $os === 'Windows' ? 'tzf-cli-windows.exe' : 'tzf-cli-linux';

        return sprintf('%s%sbin%s%s', __DIR__, DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR, $bin);
    }
}
