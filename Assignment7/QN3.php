<?php
// Abstract class

abstract class Person {
    protected $name;
    protected $email;
    protected $phone;

    public function __construct($name, $email, $phone) {
        $this->name  = $name;
        $this->email = $email;
        $this->phone = $phone;
    }

    // Abstract method
    abstract public function getRole();
}

// Student class 

class Student extends Person {
    private $studentId;
    private $course;
    private $semester;
    private $marks = [];

    public function __construct($name, $email, $phone, $studentId, $course, $semester) {
        parent::__construct($name, $email, $phone);
        $this->studentId = $studentId;
        $this->course = $course;
        $this->semester = $semester;
    }

    public function addMarks($subject, $mark) {
        $this->marks[$subject] = $mark;
    }

    public function calculateGPA() {
        if (count($this->marks) == 0) {
            return 0;
        }

        $total = array_sum($this->marks);
        $gpa = ($total / count($this->marks)) / 25; // GPA out of 4
        return round($gpa, 2);
    }

    public function getRole() {
        return "Student";
    }

    // Getters
    public function getStudentData() {
        return [
            'id' => $this->studentId,
            'name' => $this->name,
            'course' => $this->course,
            'semester' => $this->semester,
            'gpa' => $this->calculateGPA()
        ];
    }
}


// Teacher class

class Teacher extends Person {
    private $teacherId;
    private $department;
    private $subjects = [];

    public function __construct($name, $email, $phone, $teacherId, $department) {
        parent::__construct($name, $email, $phone);
        $this->teacherId = $teacherId;
        $this->department = $department;
    }

    public function addSubject($subject) {
        $this->subjects[] = $subject;
    }

    public function getRole() {
        return "Teacher";
    }

    public function getTeacherData() {
        return [
            'id' => $this->teacherId,
            'name' => $this->name,
            'department' => $this->department,
            'subjects' => implode(", ", $this->subjects)
        ];
    }
}


// Creating Objects

$students = [];
$teachers = [];

// Add Students
$s1 = new Student("Ayushma Dhamala", "ayushma@gmail.com", "9800000000", "S101", "BCA", "4th");
$s1->addMarks("OOP", 85);
$s1->addMarks("DBMS", 90);

$s2 = new Student("Suman KC", "suman@gmail.com", "9811111111", "S102", "BIM", "3rd");
$s2->addMarks("Math", 75);
$s2->addMarks("Statistics", 80);

$students[] = $s1;
$students[] = $s2;

// Add Teachers
$t1 = new Teacher("Mr. Sharma", "sharma@gmail.com", "9822222222", "T201", "Computer Science");
$t1->addSubject("OOP");
$t1->addSubject("DBMS");

$t2 = new Teacher("Ms. Rai", "rai@gmail.com", "9833333333", "T202", "Management");
$t2->addSubject("Statistics");

$teachers[] = $t1;
$teachers[] = $t2;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Displaying students and teachers in Table</title>
</head>
<body>
    <h2>Students List</h2>
<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Course</th>
    <th>Semester</th>
    <th>GPA</th>
</tr>

<?php
foreach ($students as $student) {
    $data = $student->getStudentData();
    echo "<tr>
            <td>{$data['id']}</td>
            <td>{$data['name']}</td>
            <td>{$data['course']}</td>
            <td>{$data['semester']}</td>
            <td>{$data['gpa']}</td>
          </tr>";
}
?>
</table>

<h2>Teachers List</h2>
<table border="1" cellpadding="8">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Department</th>
    <th>Subjects</th>
</tr>

<?php
foreach ($teachers as $teacher) {
    $data = $teacher->getTeacherData();
    echo "<tr>
            <td>{$data['id']}</td>
            <td>{$data['name']}</td>
            <td>{$data['department']}</td>
            <td>{$data['subjects']}</td>
          </tr>";
}
?>
</table>


</body>
</html>
