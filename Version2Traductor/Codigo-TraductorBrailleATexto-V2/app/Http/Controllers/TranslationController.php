<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Translation;
use Illuminate\Support\Facades\Log;
use Mpdf\Mpdf;
use Intervention\Image\Facades\Image;

class TranslationController extends Controller
{
    public function translateToBraille(Request $request)
    {
        try {
            $text = $request->input('text');
            Log::info("Received text for translation: $text");
            $braille = $this->convertToBraille($text);
            Log::info("Translated to braille: $braille");
            return response()->json(['braille' => $braille]);
        } catch (\Exception $e) {
            Log::error("Error translating text: " . $e->getMessage());
            return response()->json(['error' => 'Translation failed'], 500);
        }
    }

    private function convertToBraille($text)
    {
        $brailleText = '';
        $uppercaseMarker = '⠨';  // Braille indicator for uppercase letters
        $numberMarker = '⠼';     // Braille indicator for numbers
        $isNumberSequence = false;

        for ($i = 0; $i < mb_strlen($text); $i++) {
            $char = mb_substr($text, $i, 1);

            // Detect new lines
            if ($char === "\n") {
                $brailleText .= "\n";  // Add a new line in the Braille text
                continue;
            }
            // Detect if the character is a number
            if (is_numeric($char)) {
                if (!$isNumberSequence) {
                    $brailleText .= $numberMarker;
                    $isNumberSequence = true;
                }
            } else {
                $isNumberSequence = false;
            }

            // Detect uppercase letters
            if (ctype_upper($char)) {
                $brailleText .= $uppercaseMarker;
                $char = mb_strtolower($char);
            }

            Log::info("Translating character: $char");
            $translation = Translation::where('caracterEspanol', $char)->first();
            if ($translation) {
                $brailleText .= $translation->braille;
            } else {
                Log::warning("Character not found: $char");
                $brailleText .= '?'; // O cualquier otro marcador para caracteres no encontrados
            }
        }

        return $brailleText;
    }

    public function downloadImage(Request $request)
    {
        try {
            $braille = $request->input('braille');
            Log::info("Received braille text for image generation: $braille");

            if (empty($braille)) {
                Log::error("No braille text provided");
                return response()->json(['error' => 'No braille text provided'], 400);
            }

            $lines = $this->splitTextIntoLines($braille, 60);
            $lineHeight = 60;
            $imageHeight = count($lines) * $lineHeight + 400;

            $img = Image::canvas(1000, $imageHeight, '#fff');

            foreach ($lines as $index => $line) {
                $img->text($line, 400, ($index + 1) * $lineHeight, function ($font) {
                    $font->file(public_path('fonts/DejaVuSans-Bold.ttf'));
                    $font->size(48);
                    $font->color('#000');
                    $font->align('center');
                    $font->valign('top');
                });
            }
            Log::info("Image generated successfully with braille text: $braille");

            $path = public_path('braille.png');
            $img->save($path);
            Log::info("Image saved at path: $path");

            return response()->download($path)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            Log::error("Error generating image: " . $e->getMessage());
            return response()->json(['error' => 'Image generation failed'], 500);
        }
    }

    private function splitTextIntoLines($text, $maxCharsPerLine)
    {
        $words = explode(' ', $text);
        $lines = [];
        $currentLine = '';

        foreach ($words as $word) {
            if (strlen($currentLine . ' ' . $word) > $maxCharsPerLine) {
                $lines[] = $currentLine;
                $currentLine = $word;
            } else {
                $currentLine .= ($currentLine ? ' ' : '') . $word;
            }
        }

        if ($currentLine) {
            $lines[] = $currentLine;
        }

        return $lines;
    }


    public function downloadPDF(Request $request)
    {
        try {
            $braille = $request->input('braille');
            $pdf = new Mpdf();
            $html = view('pdf_view', compact('braille'))->render();
            $pdf->WriteHTML($html);
            return response($pdf->Output('manual-writing.pdf', 'S'))->header('Content-Type', 'application/pdf');
        } catch (\Exception $e) {
            Log::error("Error generating PDF: " . $e->getMessage());
            return response()->json(['error' => 'PDF generation failed'], 500);
        }
    }
}
