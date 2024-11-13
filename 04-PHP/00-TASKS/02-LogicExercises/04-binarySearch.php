<?php

/*
Given an array of integers nums which is sorted in ascending order, and an integer target,
write a function to search target in nums. If target exists, then return its index. Otherwise, return -1.

You must write an algorithm with O(log n) runtime complexity.

*/

$numsExample = [-1, 0, 3, 5, 9, 12];
$numsExample2 = [-1, 0, 3, 5, 9, 12];

$targetExample = 9;
$targetExample2 = 2;

function search($nums, $target)
{
  // Start with the first element
  $left = 0;
  // End with the last element
  $right = count($nums) - 1;

  while ($left <= $right) {
    // Calculate the middle index to split the array
    $mid = $left + floor(($right - $left) / 2);

    if ($nums[$mid] == $target) {
      // Check if the middle element is the target
      return $mid;
    } elseif ($nums[$mid] < $target) {
      // If target is greater than the middle element, search in the right place
      $left = $mid + 1;
    } else {
      // If target is less than the middle element, search in the left place
      $right = $mid - 1;
    }
  }
  // -1 means not found
  return -1;
}

echo search($numsExample, $targetExample); // 4
echo search($numsExample2, $targetExample2); // -1