<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->param == 'sum') {
            $arr = [3, 9, 5, 9];
            $target = 8;
            $found = true;
            foreach ($arr as $key1 => $num1):
                foreach ($arr as $key2 => $num2) {
                    if ($num1 + $num2 == $target and $key1 != $key2 and $num1 != $num2) {
                        dd($num1 . " + " . $num2 . " = " . $num1 + $num2);
                    } else {
                        $found = false;
                    }
                }
            endforeach;
            if (!$found) {
                dd("numbers not found");
            }
        } elseif ($request->param == 'date') {
            $input = '20th Oct 2052';
            dd(date('Y-m-d', strtotime($input)));
        } elseif ($request->param == 'palindrome') {
            $string = "121";
            $length = strlen($string);
            $newString = '';
            for ($i = ($length - 1); $i >= 0; $i--) {
                $newString .= $string[$i];
            }
            if ($newString == $string) {
                dd("palindrome");
            }
            dd("not palindrome");
        } elseif ($request->param == 'binary') {
            function binarySearch($arr, $target)
            {
                $left = 0;
                $right = count($arr) - 1;
                while ($left <= $right) { // 3 <= 4
                    $mid = floor(($left + $right) / 2);
                    if ($arr[$mid] == $target) {
                        return $mid;
                    } elseif ($arr[$mid] < $target) {
                        $left = $mid + 1;
                    } else {
                        $right = $mid - 1;
                    }
                }
                return -1; // Not found
            }
            $arr = [1, 2, 3, 4, 5];
            dd("Present at: " . binarySearch($arr, 5) . " index"); // Output: 2 (Index of 3)

        }

        return view('site.home');
    }
}
