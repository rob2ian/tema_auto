<?php

declare(strict_types=1);

namespace Tests\Support;

/**
 * Inherited Methods
 * @method void wantTo($text)
 * @method void wantToTest($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause($vars = [])
 *
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{
   use _generated\AcceptanceTesterActions;

   /**
    * Define custom actions here
    */

   //Export in test data file
   public function exportInTestDataFile($filename, $data): void
   {
      file_put_contents('tests/Support/Data/' . $filename,  '<?php return ' . var_export($data, true) . ';');
   }

   //Import from test data file
   public function importFromTestDataFile($filename): mixed
   {
      return include 'tests/Support/Data/' . $filename;
   }

   //Prepend index 1 to start of the array and eliminate index 0
   public function offsetArray($arr): array
   {
      array_unshift($arr, 1);
      unset($arr[0]);
      return $arr;
   }
}
