<?php

namespace FahriGunadi\TimezoneFinder;

class ComposerScripts
{
    /**
     * Downloads binary timezone finder to a target directory.
     */
    public static function downloadBinary()
    {
        $binaries = [
            'Windows' => 'tzf-cli-windows.exe',
            'Darwin' => 'tzf-cli-darwin',
            'Linux' => 'tzf-cli-linux',
        ];

        $binFileName = $binaries[PHP_OS_FAMILY] ?? 'tzf-cli-linux';

        $fileUrl = "https://github.com/fahrigunadi/tzf-bin/releases/download/v0.0.4/{$binFileName}";

        $binPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . $binFileName;

        echo "Starting download binaries...\n";

        try {
            if (file_exists($binPath)) {
                echo "Binary already exists, skipping download...\n";

                if (!is_executable($binPath)) {
                    chmod($binPath, 0755);
                }
                return;
            }

            // Ensure the directory for storing the archive exists
            $binDir = dirname($binPath);
            if (!is_dir($binDir)) {
                if (!mkdir($binDir, 0755, true)) {
                    throw new \Exception("Failed to create bin directory: " . $binDir);
                }
            }

            // --- Using cURL for robust download ---
            $ch = curl_init($fileUrl);
            if ($ch === false) {
                throw new \Exception("Failed to initialize cURL.");
            }

            // Open a local file stream to save the downloaded content
            $fp = fopen($binPath, 'wb'); // 'wb' mode for writing binary content
            if ($fp === false) {
                throw new \Exception("Failed to open local file for writing: " . $binPath);
            }

            // Configure cURL options
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_TIMEOUT, 300);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);

            // Execute the cURL request
            $success = curl_exec($ch);
            $curlError = curl_error($ch); // Get cURL error message if any
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get HTTP status code

            curl_close($ch); // Close the cURL session
            fclose($fp); // Close the local file stream

            // Check for cURL execution errors
            if ($success === false) {
                // If download failed, clean up the incomplete local file
                if (file_exists($binPath)) {
                    unlink($binPath);
                }
                throw new \Exception("cURL download failed: " . $curlError . " (HTTP Code: " . $httpCode . ")");
            }

            if (file_exists($binPath) && !is_executable($binPath)) {
                chmod($binPath, 0755);
            }
        } catch (\Exception $e) {
            throw $e;
        }

        echo "Finished download binaries...\n";
    }
}