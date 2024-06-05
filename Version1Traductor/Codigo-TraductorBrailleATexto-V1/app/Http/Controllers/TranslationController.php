<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Translation;
use Illuminate\Support\Facades\Log;

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
}
