<?php


/*
Height Checker
A school is trying to take an annual photo of all the students. The students are asked to stand in a single file line 
in non-decreasing order by height. Let this ordering be represented by the integer array expected where expected[i] 
is the expected height of the ith student in line.

You are given an integer array heights representing the current order that the students are standing in. Each heights[i] 
is the height of the ith student in line (0-indexed).

Return the number of indices where heights[i] != expected[i].
Example 1:
Input: heights = [1,1,4,2,1,3]
Output: 3

Explanation:
heights:  [1,1,4,2,1,3]
expected: [1,1,1,2,3,4]
Indices 2, 4, and 5 do not match.
*/

$heights = [1, 1, 4, 2, 1, 3];
$heights2 = [5, 1, 2, 3, 4];
$heights3 = [1, 2, 3, 4, 5];

// OP1 - SORT
function bubbleSort($arr)
{
  // 1st -> Array order.
  for ($i = 0; $i < count($arr); $i++) {

    for ($j = 0; $j < count($arr) - 1; $j++) {
      if ($arr[$j] > $arr[$j + 1]) {
        $temp = $arr[$j + 1];
        $arr[$j + 1] = $arr[$j];
        $arr[$j] = $temp;
      }
    }
  }

  return $arr;
}

function heightChecker($arrHeights)
{
  // OP2 - SORT
  $arrExpected = $arrHeights;
  sort($arrExpected);
  // $arrExpected = bubbleSort($arrExpected);

  $differences = 0;
  // Compare each one.
  for ($i = 0; $i < count($arrHeights); $i++) {
    if ($arrExpected[$i] !== $arrHeights[$i]) {
      $differences++;
    }
  }
  return $differences;
}


$result =  heightChecker($heights);
echo $result;
$result =  heightChecker($heights2);
echo $result;
$result =  heightChecker($heights3);
echo $result;
