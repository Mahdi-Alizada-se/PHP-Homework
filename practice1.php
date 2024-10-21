<?php
// 1Dynamic type converssation
function dynamicTypeConversion($input1, $input2) {
    if (is_numeric($input1) && is_numeric($input2)) {
        echo "Multiplication: " . ($input1 * $input2);
    } elseif (is_string($input1) && is_string($input2)) {
        $array = [$input1, $input2];
        sort($array);
        echo "Sorted Strings: " . implode(", ", $array);
    } else {
        echo "Concatenation: " . $input1 . $input2;
    }
}

// Test cases
dynamicTypeConversion(5, 10); 
echo "\n";
dynamicTypeConversion("apple", "banana"); 
echo "\n";
dynamicTypeConversion("apple", 10); 

// 2Constant functionality

define("EXCHANGE_RATE", 1.1);

function convertCurrency($amounts, $direction = 'USD_to_EUR') {
    $converted = [];
    foreach ($amounts as $amount) {
        if ($direction == 'USD_to_EUR') {
            $converted[] = $amount * EXCHANGE_RATE;
        } elseif ($direction == 'EUR_to_USD') {
            $converted[] = $amount / EXCHANGE_RATE;
        } else {
            echo "Invalid conversion direction!";
            return;
        }
    }
    return $converted;
}

// Test cases
$usdAmounts = [100, 200, 300];
$eurAmounts = convertCurrency($usdAmounts, 'USD_to_EUR');
print_r($eurAmounts);

$eurAmountsBack = convertCurrency($eurAmounts, 'EUR_to_USD');
print_r($eurAmountsBack);


// 3String Manipulation

function reverseWordsInSentences($paragraph) {
    $sentences = explode('.', $paragraph);
    $reversedSentences = [];

    foreach ($sentences as $sentence) {
        if (trim($sentence) != "") {
            $words = explode(' ', trim($sentence));
            $reversedWords = array_reverse($words);
            $reversedSentences[] = implode(' ', $reversedWords);
        }
    }

    return implode('. ', $reversedSentences) . ".";
}

// Test case
$paragraph = "PHP is a popular server-side scripting language. It is used for web development.";
echo reverseWordsInSentences($paragraph);

//4Data types and error handling
function detectDataType($variable) {
    try {
        $type = gettype($variable);

        if ($type == 'resource') {
            throw new Exception("Invalid type: Resource detected.");
        }

        echo "Data type: $type\n";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
}

// Test cases
detectDataType(42);  
detectDataType("Hello World");  
detectDataType([1, 2, 3]);  


//5 Complex Conditional Operations 

function isPrime($num) {
    if ($num <= 1) return false;
    if ($num == 2) return true;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function fizzBuzzPrime($num) {
    if (isPrime($num)) {
        echo "Prime";
    } elseif ($num % 3 == 0 && $num % 5 == 0) {
        echo "FizzBuzz";
    } elseif ($num % 3 == 0) {
        echo "Fizz";
    } elseif ($num % 5 == 0) {
        echo "Buzz";
    } else {
        echo $num;
    }
}

// Test cases
fizzBuzzPrime(15); 
echo "\n";
fizzBuzzPrime(3);   
echo "\n";
fizzBuzzPrime(5);  
echo "\n";
fizzBuzzPrime(7);   
echo "\n";
fizzBuzzPrime(8); 


//6 Bitwise Operators and Puzzle


function areIntegersEqual($a, $b) {
    
    return ($a ^ $b) === 0;
}

// Test cases
echo areIntegersEqual(5, 5) ? 'Equal' : 'Not Equal'; 
echo "\n";
echo areIntegersEqual(5, 10) ? 'Equal' : 'Not Equal'; 


//7Logical Operators in Complex Conditions

function complexDecision($condition1, $condition2, $condition3, $condition4) {
    
    $result = ($condition1 && $condition2) || (!$condition3 && $condition4);
    
    return $result;
}

// Test cases
$cond1 = true;
$cond2 = false;
$cond3 = true;
$cond4 = true;

echo complexDecision($cond1, $cond2, $cond3, $cond4) ? 'True' : 'False'; 
echo "\n";

$cond1 = true;
$cond2 = true;
$cond3 = false;
$cond4 = true;

echo complexDecision($cond1, $cond2, $cond3, $cond4) ? 'True' : 'False';  



// 8Nested Conditional Logic: Dynamic Discount Calculator

function calculateDiscount($yearsOfMembership, $isPremiumMember) {
    $discount = 0;

    
    if ($yearsOfMembership > 5) {
        $discount = 30;
    } elseif ($yearsOfMembership >= 3 && $yearsOfMembership <= 5) {
        $discount = 20;
    } else {
        $discount = 10;
    }

  
    if ($isPremiumMember) {
        $discount += 10;
    }

    return $discount;
}

// Test cases
echo "Discount for 6 years and premium: " . calculateDiscount(6, true) . "%\n";  
echo "Discount for 4 years and non-premium: " . calculateDiscount(4, false) . "%\n";  
echo "Discount for 2 years and premium: " . calculateDiscount(2, true) . "%\n"; 


// 9Ternary Challenges


function personalizedMessage($age, $isMember, $purchaseAmount) {
    return ($age < 18) ? "You are too young to make purchases." :
           ($isMember ? 
               (($purchaseAmount > 100) ? "Thank you for your loyalty! Enjoy your discount." : "Consider spending more to get a discount!") :
               (($purchaseAmount > 100) ? "Sign up for membership to get discounts on your large purchase." : "Welcome! No discounts for non-members."));
}

// Test cases
echo personalizedMessage(16, true, 50) . "\n"; 
echo personalizedMessage(25, true, 120) . "\n";
echo personalizedMessage(25, false, 50) . "\n"; 
echo personalizedMessage(30, false, 150) . "\n"; 




function simpleCalculator($input) {

    $parts = explode(" ", $input);


    if (count($parts) != 3 || !is_numeric($parts[0]) || !is_numeric($parts[2])) {
        return "Invalid input format.";
    }

    $num1 = (float)$parts[0];
    $operator = $parts[1];
    $num2 = (float)$parts[2];
    $result = "";

 
    switch ($operator) {
        case "+":
            $result = $num1 + $num2;
            break;
        case "-":
            $result = $num1 - $num2;
            break;
        case "*":
            $result = $num1 * $num2;
            break;
        case "/":
          
            if ($num2 == 0) {
                return "Error: Division by zero.";
            }
            $result = $num1 / $num2;
            break;
        default:
            return "Unsupported operator.";
    }

    return "Result: $result";
}

// Test cases
echo simpleCalculator("5 + 2") . "\n"; 
echo simpleCalculator("8 * 3") . "\n"; 
echo simpleCalculator("10 / 0") . "\n"; 
echo simpleCalculator("5 ? 2") . "\n";  
echo simpleCalculator("Invalid input") . "\n"; 

// 10 Nested Loops and Paterns

function printPattern($size) {
    for ($i = 1; $i <= $size; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $j . " ";
        }
        echo "\n";
    }
}

// Test case
$size = 4;  
printPattern($size);



// 11. Dynamic Loop Generaton

function sumSkippingEverySecond($size) {
    $randomArray = [];
    $sum = 0;

   
    for ($i = 0; $i < $size; $i++) {
        $randomArray[] = rand(1, 100);
    }

    for ($i = 0; $i < count($randomArray); $i++) {
        if ($i % 2 == 1) {
            continue;
        }
        $sum += $randomArray[$i];
    }

   
    echo "Generated Array: ";
    print_r($randomArray);
    echo "Sum (skipping every second number): $sum\n";
}

// Test case
$size = 10; 
sumSkippingEverySecond($size);

//12. Fibonacci Sequence with Loops

function generateFibonacci($limit) {
    $fibonacci = [];
    $a = 0;
    $b = 1;

    while ($a <= $limit) {
        $fibonacci[] = $a;
        $next = $a + $b;
        $a = $b;
        $b = $next;
    }

    return $fibonacci;
}

// Test case
$limit = 50; 
$fibonacciSequence = generateFibonacci($limit);
echo "Fibonacci Sequence up to $limit: ";
print_r($fibonacciSequence);

// 13. Prime Number Finder (Optmized Loop)

functionisPrime($num) {
    if ($num <= 1) return false;
    if ($num == 2) return true;
    
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function findPrimes($limit) {
    $primes = [];
    for ($i = 2; $i <= $limit; $i++) {
        if (isPrime($i)) {
            $primes[] = $i;
        }
    }
    return $primes;
}

// Test case
$limit = 50; 
$primeNumbers = findPrimes($limit);
echo "Prime Numbers up to $limit: ";
print_r($primeNumbers);

// 15. Array Sortng

function sortProductsByPrice($products) {
   
    arsort($products);
    return $products;
}

// Test case
$products = [
    "Laptop" => 1200,
    "Phone" => 800,
    "Tablet" => 600,
    "Monitor" => 300
];

$sortedProducts = sortProductsByPrice($products);
print_r($sortedProducts);

// 16. Mult-Dimensional Array Manipulaton

function findTopStudent($students) {
    $topStudent = '';
    $highestAverage = 0;

    foreach ($students as $student => $scores) {
        $average = array_sum($scores) / count($scores);
        if ($average > $highestAverage) {
            $highestAverage = $average;
            $topStudent = $student;
        }
    }

    echo "Top student: $topStudent, Average score: $highestAverage\n";
}

// Test case
$students = [
    "Alice" => [85, 90, 78],
    "Bob" => [88, 76, 91],
    "Charlie" => [92, 89, 95]
];

findTopStudent($students);


// 17. Array Search with Conditons

function findNumbersAboveThreshold($numbers, $threshold) {
    $result = array_filter($numbers, function($number) use ($threshold) {
        return $number > $threshold;
    });

    return $result;
}

// Test case
$numbers = [10, 25, 37, 45, 52, 5];
$threshold = 30;
$filteredNumbers = findNumbersAboveThreshold($numbers, $threshold);
print_r($filteredNumbers);


// 18. Array Mapping and Filter Challenge

function filterAndReverseWords($words) {
    
    $filteredWords = array_filter($words, function($word) {
        return !preg_match('/[aeiouAEIOU]/', $word);
    });


    $reversedWords = array_map('strrev', $filteredWords);

    return $reversedWords;
}

// Test case
$words = ["apple", "sky", "try", "banana", "gym"];
$modifiedArray = filterAndReverseWords($words);
print_r($modifiedArray);


// 19. Associatve Array Merge

function mergeStudentScores($scores1, $scores2) {
   
    foreach ($scores2 as $student => $score) {
        if (isset($scores1[$student])) {
            $scores1[$student] = max($scores1[$student], $score);
        } else {
            $scores1[$student] = $score;
        }
    }

    return $scores1;
}

// Test case
$scores1 = [
    "Alice" => 85,
    "Bob" => 90,
    "Charlie" => 78
];

$scores2 = [
    "Alice" => 88,
    "Bob" => 87,
    "David" => 92
];

$mergedScores = mergeStudentScores($scores1, $scores2);
print_r($mergedScores);



// 20. Recursive Function for Palindrome
function isPalindrome($str) {
    $len = strlen($str);
    if ($len <= 1) return true;
    if ($str[0] != $str[$len - 1]) return false;
    return isPalindrome(substr($str, 1, $len - 2));
}

// Test case
echo isPalindrome("racecar") ? "True\n" : "False\n";  


// 21. Anonymous Function with Array Processing
$numbers = [21, 42, 63, 84, 105];
$divisibleBy3And7 = array_filter($numbers, function($num) {
    return $num % 3 == 0 && $num % 7 == 0;
});

// Test case
print_r($divisibleBy3And7);  


// 22. Closure and Callback Functions
function applyCallback($array, $callback) {
    return array_map($callback, $array);
}

$callback = function($num) {
    return $num * 2;
};

// Test case
$numbers = [1, 2, 3, 4, 5];
$transformed = applyCallback($numbers, $callback);
print_r($transformed); 


// 23. Function Chaining
class StringManipulator {
    private $str;

    public function __construct($str) {
        $this->str = $str;
    }

    public function uppercase() {
        $this->str = strtoupper($this->str);
        return $this;
    }

    public function reverse() {
        $this->str = strrev($this->str);
        return $this;
    }

    public function addPrefix($prefix) {
        $this->str = $prefix . $this->str;
        return $this;
    }

    public function addSuffix($suffix) {
        $this->str = $this->str . $suffix;
        return $this;
    }

    public function get() {
        return $this->str;
    }
}

// Test case
$manipulatedString = (new StringManipulator("hello"))
    ->uppercase()
    ->reverse()
    ->addPrefix("Start-")
    ->addSuffix("-End")
    ->get();

echo $manipulatedString . "\n";  


// 24. Dynamic Function Creation
function createMathFunction($operation) {
    return function($a, $b) use ($operation) {
        switch ($operation) {
            case "add": return $a + $b;
            case "subtract": return $a - $b;
            case "multiply": return $a * $b;
            case "divide": return $b != 0 ? $a / $b : null;
            default: return null;
        }
    };
}

// Test case
$addFunction = createMathFunction("add");
echo $addFunction(10, 5) . "\n"; 


// 25. Higher-Order Functions
function applyTo2DArray($array, $function) {
    foreach ($array as &$subArray) {
        $subArray = array_map($function, $subArray);
    }
    return $array;
}

$multiplyBy2 = function($num) {
    return $num * 2;
};

// Test case
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
$transformedMatrix = applyTo2DArray($matrix, $multiplyBy2);
print_r($transformedMatrix);  


// 26. Memoization with Recursive Functions
function fibonacci($n, &$memo = []) {
    if ($n <= 1) return $n;
    if (isset($memo[$n])) return $memo[$n];
    $memo[$n] = fibonacci($n - 1, $memo) + fibonacci($n - 2, $memo);
    return $memo[$n];
}

// Test case
echo fibonacci(10) . "\n";  



































































































































































?>
