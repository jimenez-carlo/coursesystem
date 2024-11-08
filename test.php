<?php
function calculateString($input, $maxWords)
{
  $sentences = explode('. ', str_replace(['? ', '! '], '. ', $input));
  $result = "";
  $counter = 0;

  foreach ($sentences as $sentence) {
    $trimmedSentence = trim($sentence);
    if ($trimmedSentence === "") {
      continue;
    }

    $sentenceWords = str_word_count($trimmedSentence);

    if ($counter + $sentenceWords > $maxWords) {
      break;
    }
    $result .= ($result ? " " : "") . $trimmedSentence . ".";
    $counter += $sentenceWords;
  }

  return $result;
}

echo calculateString("How much is that doggie in the window? I do hope that doggie's forsale.", 9);
echo calculateString("How much is that doggie in the window? I do hope that doggie's forsale.", 100);
echo calculateString("How much is that doggie in the window? I do hope that doggie's forsale.", 0);
