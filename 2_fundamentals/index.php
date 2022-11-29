<?php


###############
# ❓ conditionals
###############
// Syntax (classic, short, ternary)

// base syntax
if($condizione){
  // code...
} elseif($condizione) {
  // code...

} else {
  // code...

}
?> 

<!-- Short syntax -->

<?php if ($condizione) : ?>
  <!-- HTML -->
 <?php elseif ($condizione) : ?>
  <!-- HTML -->

 <?php else : ?>
  <!-- HTML -->

 <?php endif; ?>


<?php 

// Syntax Ternary 


//condition ? '' : '';



// examples

if(5 > 10) {
  echo 'Ciao';
} elseif(3 > 2) {
  echo 'Ciao 2';
} else {
  echo 'Ciao 3';
}


##################
# 👉 array
##################

# numeric Array 

$students = ['Andrea', 'Selene', 'Marco', 'Francesca', 'Lorenzo'];
var_dump($students);
//$students = array();


// access elements
var_dump($students[2]);

// add new elements
$students[] = 'Diego';
var_dump($students);



# associative Array
$student = [
  'name' => 'Benedetto',
  'lastname' => 'Bonaccorso',
  'age' => 22,
  'email' => 'benedetto@bonaccorso.com'
];


// access elements
var_dump($student['name']);

// add new elements
$student['address'] = '123 ocean drive CA';
var_dump($student);

# array manipolation

// push
array_push($students, 'Mattia');
var_dump($students);
// pop

// unshift

// shift

// in_array


#############
# ➰ Loops
############
$students_list = [
  [
    'name' => 'Benedetto',
    'lastname' => 'Bonaccorso',
    'age' => 22,
    'email' => 'benedetto@bonaccorso.com'
  ],
  [
    'name' => 'andrea',
    'lastname' => 'Bonaccorso',
    'age' => 22,
    'email' => 'andrea@bonaccorso.com'
  ],
  [
    'name' => 'giulia',
    'lastname' => 'Bonaccorso',
    'age' => 22,
    'email' => 'giulia@bonaccorso.com'
  ],
  ];


# foreach

// syntax
/* 
foreach($array as $element){

} 
// con chiave valore
foreach($array as $key => $element){

}
*/
var_dump('###########################################');
// example
foreach ($students_list as $student_element) {
  var_dump($student_element);
}

var_dump('*************************');


# for loop

// syntax
for ($i=0; $i < 10; $i++) { 
  # code...
}

for ($i = 0; $i < 10; $i++) :
  # code...
endfor;

  // example

  # while loop
  // syntax
  // variabile da definire
  /* $a = 0;
while ($a <= 10) {
  # code...
  $a++;
} */

  $a = 0;
  while ($a <= 10) :
    # code...
    $a++;
  endwhile;

// example

$arr = [
  'PHP' => [
    [
      'title' => ''
    ]
  ],
  'JS' => [
    [
      'title' => ''
    ]
  ]
    ];

foreach ($arr as $key => $articles) {
  # code...
  foreach($articles as $article ) {
    echo $article['title'];
  }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recap</title>
</head>
<body>
  
<ul>
  <?php foreach ($student as $key => $value) : ?>
    <li> <strong><?= $key?>:</strong> <?= $value?></li>
  <?php endforeach; ?>
</ul>

</body>
</html>