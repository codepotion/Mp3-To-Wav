<?php
$core_file = 'kitna-haseen-chehra';
// Path to the MP3 file
$mp3_file = "$core_file.mp3";

// Path to the WAV file to be created
$wav_file = "$core_file.wav";

// Set desired parameters for WAV conversion
$bitrate     = '192k';  // Bitrate (e.g., 128k, 192k)
$sample_rate = '44100';  // Sample rate (e.g., 44100, 48000)
$channels    = '2';  // Number of audio channels (1 for mono, 2 for stereo)
$codec       = 'pcm_s16le';  // WAV audio codec (default: pcm_s16le)

// Build the ffmpeg command with custom parameters
$ffmpeg_command = "ffmpeg -i " . escapeshellarg($mp3_file) .
    " -ab " . escapeshellarg($bitrate) .
    " -ar " . escapeshellarg($sample_rate) .
    " -ac " . escapeshellarg($channels) .
    " -c:a " . escapeshellarg($codec) .
    " " . escapeshellarg($wav_file);

// Execute the command
exec($ffmpeg_command);

// Check if the conversion was successful
if (file_exists($wav_file)) {
    echo "Conversion successful. WAV file created: " . $wav_file;
}
else {
    echo "Conversion failed.";
}
// End
