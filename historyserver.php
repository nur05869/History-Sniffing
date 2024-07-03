
<?php
// Check if the "visited_majors" key exists in $_POST array
if (isset($_POST['visited_majors'])) {
  // Convert the string of visited majors to an array
  $visited = str_split($_POST['visited_majors']);
  // List of all possible majors
  // map the number to the major
  $num2major = [
    "1" => "Art History",
    "9" => "Chemistry",
    "2" => "Economics",
    "8" => "English",
    "3" => "Mathematics",
    "7" => "Physics"
  ];
  $visited_majors = array_intersect_key($num2major, array_flip($visited));

  $majors = [
    "Art History" => "https://www.stthomas.edu/catalog/current/arth/",
    "Chemistry" => "https://www.stthomas.edu/catalog/current/chem/",
    "Economics" => "https://www.stthomas.edu/catalog/current/econ/",
    "English" => "https://www.stthomas.edu/catalog/current/engl/",
    "Mathematics" => "https://www.stthomas.edu/catalog/current/math/",
    "Physics" => "https://www.stthomas.edu/catalog/current/physics/"

  ];

  // Determine which majors have not been visited
  $not_visited = array_diff_key($majors, array_flip($visited_majors));

  if (count($not_visited) > 0) {
    // Suggest a major that the user has not yet visited
    // Display the not visited majors
    echo '<h2>Have you ever considered studying</h2>';
    foreach ($not_visited as $major => $url) {
      echo '<a href="' . $url . '">' . $major . '</a><br/>';
    }
  } else {
    // User has visited all majors
    echo '<h2>It\'s time to choose a major!</h2>';
  }
}

?>
    
      
